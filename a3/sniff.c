#include <pcap.h>
#include <ctype.h>
#include <string.h>
#include <stdlib.h>

#define LINE_LEN 16

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

int main()
{
	struct pcap_pkthdr header; // The header that pcap gives us
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
	while(1) {
	  packet = pcap_next(pcap_handle, &header);
	  if(packet == NULL) {
	    fprintf(stderr, "Getting next packet either failed or timed-out. Unable to determine which.\n");
	    exit(3);
	  }
	  printf("Got a %d byte packet:\n", header.len);
	  prettyPrintPacket(packet, &header);
	  printf("***************************************\n");
	}
  	pcap_close(pcap_handle);
}
