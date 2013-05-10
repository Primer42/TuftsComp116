#include <pcap.h>
#include <netinet/tcp.h>
#include <netinet/ip.h>
#include <netinet/udp.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <ctype.h>
#include <time.h>
#include <string.h>
#include <stdlib.h>
#include <stdio.h>

#define LINE_LEN 16
#define MAX_NUM_RECORDS 1024
#define SIZE_ETHERNET 14
#define MIN_PORTS_IN_SCAN 20


struct portRange {
  u_short startPort;
  u_short endPort;
};

struct ipAddrRecord {
  struct in_addr destAddr;
  struct portRange pr;
  time_t lastAccess;
};

void addPortToRange(struct portRange* pr, u_short newPort) {
  //see if the new port is at the end of the range
  if(newPort == pr->endPort + 1) {
    //increment the end port
    pr->endPort += 1;
  } else if (newPort == pr->startPort - 1) {
    //we're going down - decrement the start port
    pr->startPort -=1;
  } else if(newPort < pr->startPort || newPort >pr->endPort) {
    //new port is outside of existing range, and not directly extending it
    //remake the range, as we're probably not being scanned
    pr->startPort = newPort;
    pr->endPort = newPort;
  } else {
    //do nothing
  }
}

void testForScanning(struct ipAddrRecord ipr) {
  //figure how big the range of scanned ports is
  u_short portRangeSize = ipr.pr.endPort - ipr.pr.startPort;
  //if it's too big, someone is being scanned
  if(portRangeSize > MIN_PORTS_IN_SCAN) {
    printf("Port scanning detected - %hu ports have been scanned on %s\n", portRangeSize, inet_ntoa(ipr.destAddr));
  }

}

void printCharLine(const u_char* packet, int startIndex, int endIndex) {
  int i;
  for(i = startIndex; i < endIndex; ++i) {
    u_char c = packet[i];
    if(isalnum(c)) {
      printf("%c", c);
    } else {
      printf(".");
    }
  }
}

void printTcpHeader(struct tcphdr* tcpheader) {
  printf("TCP source port: %hu\n", tcpheader->source);
  printf("TCP destination port: %hu\n", tcpheader->dest);
  printf("TCP sequence number: %u\n", tcpheader->seq);
  printf("TCP acknowledgement number: %u\n", tcpheader->ack_seq);
  printf("Header is %d bytes long\n", sizeof(tcpheader));
  printf("TCP flags:");
  if(tcpheader->fin)
    printf("FIN ");
  if(tcpheader->syn)
    printf("SYN ");
  if(tcpheader->res1)
    printf("res1 ");
  if(tcpheader->psh)
    printf("PUSH ");
  if(tcpheader->ack)
    printf("ACK ");
  if(tcpheader->urg)
    printf("URG ");
  if(tcpheader->doff)
    printf("doff ");
  if(tcpheader->res2)
    printf("res2 ");
  printf("\n");
}

void printIpHeader(struct ip* ipheader) {
  printf("IP Source address: '%s'\n", inet_ntoa(ipheader->ip_src));
  printf("IP Destination addres: '%s'\n", inet_ntoa(ipheader->ip_dst));
}

void prettyPrintPacket(const u_char* packet, struct pcap_pkthdr* header) {
  int hexIndex, charIndex, i;
  charIndex = 0;
  for(hexIndex = 0; hexIndex < header->len; ++hexIndex) {
    if(hexIndex > 0 && hexIndex % LINE_LEN == 0) {
      printf("| ");
      printCharLine(packet, charIndex, hexIndex);
      charIndex = hexIndex;
      printf("\n");
    }
    printf("%x ", (int) packet[hexIndex]);
    //add the extra space for single character hex values to make things pretty
    if((int) packet[hexIndex] < 16) {
      printf(" " );
    }
  }

  //see where we ended, and if we need to finish the line
  //hexIndex == 1 mod LINE_LEN if it did the last charater of a line, incremented and saw that hex_index == header->len == 1 mod LINE_LEN
  if(hexIndex % LINE_LEN != 1) {
    //put in the correct number of spaces
    //only if they're needed
    if(hexIndex % LINE_LEN != 0) {
      for(i = 0; i < (LINE_LEN - (hexIndex % LINE_LEN)) * 3; ++i) {
	printf(" ");
      }
    }
    printf("| ");
    //print the char line
    printCharLine(packet, charIndex, hexIndex);
  }
  printf("\n");
}

struct ipAddrRecord* findRecord(struct ipAddrRecord* records, int* numRecords, struct in_addr ipAddr) {
  int i;
  struct ipAddrRecord* curRecord = records;
  for(i = 0; i < *numRecords; i++, curRecord++) {
    //    if(strncmp(inet_ntoa(curRecord->destAddr), ipAddrStr, strlen(ipAddrStr)) == 0)  {
    if(curRecord->destAddr.s_addr == ipAddr.s_addr) {
      return curRecord;
    }
  }
  //couldn't find it - add it
  int indexToAdd = *numRecords;
  (*numRecords)++;
  if(*numRecords >= MAX_NUM_RECORDS) {
    *numRecords = MAX_NUM_RECORDS;
    time_t oldestRecordTime = records[0].lastAccess;
    curRecord = records;
    //find the oldest record to replace
    for(i = 0; i < *numRecords; i++, curRecord++) {
      if(curRecord->lastAccess < oldestRecordTime) {
	indexToAdd = i;
	oldestRecordTime = curRecord->lastAccess;
      }
    }
  }
  
  //add it
  memcpy(&(records[indexToAdd].destAddr), &ipAddr, sizeof(struct in_addr));
  records[indexToAdd].pr.startPort = 0;
  records[indexToAdd].pr.endPort = 0;
  records[indexToAdd].lastAccess = time(NULL);
  
  return records + indexToAdd;
}

int main()
{
  struct pcap_pkthdr header; // the header that pcap gives us
  const u_char *packet; // The actual packet
  char errbuf[PCAP_ERRBUF_SIZE]; // Error string
  char *device; // Interface / device to sniff on
  pcap_t *pcap_handle; // Session handle

  device = pcap_lookupdev(errbuf);
  if(device == NULL) {
    fprintf(stderr, "Could not open find a device: %s\n", errbuf);
    exit(1);
  }
  printf("Sniffing on device '%s'\n", device);
  //set the error buf to '/0's so that we can get any warning messages
  //from pcap_open_live
  memset(errbuf, '\0', PCAP_ERRBUF_SIZE);
  pcap_handle = pcap_open_live(device, 4096, 1, 0, errbuf);
  //handle error from pcap_open_live
  if(pcap_handle == NULL) {
    fprintf(stderr, "pcap could not open a live connection to %s: %s\n", device, errbuf);
    exit(2);
  }
  //handle a warning from pcap_open_live
  if(strlen(errbuf)) {
    fprintf(stderr, "Warning opening live connection to %s: %s\n", device, errbuf);
  }

  //make the records array and it's size
  struct ipAddrRecord* records = (struct ipAddrRecord*) malloc(sizeof(struct ipAddrRecord) * MAX_NUM_RECORDS);
  int numRecords = 0;

  while(1) {
    packet = pcap_next(pcap_handle, &header);
    if(packet == NULL) {
      fprintf(stderr, "Getting next packet either failed or timed-out. Unable to determine which.\n");
      exit(3);
    }
     struct ip* ip = (struct ip*) (packet + SIZE_ETHERNET);
     struct ipAddrRecord* curRecord = findRecord(records, &numRecords, ip->ip_dst);
     curRecord->lastAccess = time(NULL);

     //figure out the destination port, either from a TCP or UDP packet
     unsigned short destPort = 0;
     if(ip->ip_p == IPPROTO_TCP) {
       struct tcphdr* tcphdr = (struct tcphdr*) (packet + SIZE_ETHERNET + ip->ip_hl*4);
       destPort = ntohs(tcphdr->dest);
     } else if(ip->ip_p == IPPROTO_UDP) {
       struct udphdr* udphdr = (struct udphdr*) (packet + SIZE_ETHERNET + ip->ip_hl*4);
       destPort = ntohs(udphdr->dest);
     } else {
       //neither TCP or UDP - go on with the next packet
       continue;
     }

     //add the port to the port range
     addPortToRange(&(curRecord->pr), destPort);

     //test for scanning
     testForScanning(*curRecord);
  }
  pcap_close(pcap_handle);
}
