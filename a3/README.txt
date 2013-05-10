Strategy for sniffd

Detects port sniffing - seems to only work on remote hosts i.e. not this host.

My strategy is to keep a record for every destination address we see.

This record would include not only the destination address but a start and end port, defining a consecutive range of ports that have been recently accessed at that address.

By updating and keeping these records, it would become immediately aparent if several consecutive ports were accessed at a given address.  If the size of that range of accessed ports goes above a certain limit, we would know that a port scan was occuring.

To allow for easily removing old records, the time of last access is also stored in each record.  If the array of records becomes filled and a new destination address is seen, the oldest record is removed.

This works because port scans happen quickly so it is unlikely that other traffic will slip in and mess up the port range in the middle of an attack on a given host.

As I mentioned, if I'm running this from 10.1.1.10, I can't seem to port scan 10.1.1.10 and have my script pick it up - not sure why.
Also, if the scan takes a long time, and other traffic not in the rang comes accross, this code will not detect the scan.  For this reason, the port range size limit is set relatively low at 20 ports, so we're more likely to see long attacks.
