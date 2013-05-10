<!DOCTYPE html>

<html>

<head>
<title>COMP 116: Introduction to Computer Security - Assignment 3: Programming with pcap / libpcap</title>

<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="description" content="Introduction to Computer Security" />
<meta name="keywords" content="Ming Chow, Tufts University, Computer Science" />
<meta name="robots" content="index,follow" />
<link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="/comp/116/mobile.css" type="text/css" />
<link rel="stylesheet" href="/comp/116/navigation1.css" type="text/css" />
</head>

<body>

<div id="header">
<h2>Introduction to Computer Security</h2>
<h3>Tufts University<br/>
Department of Computer Science<br/>
Spring 2012</h3>
</div>

<div id="nav">
<h4>Navigation</h4>
<ul>
<li><a href="../index.php">Course Information</a></li>
<li><a href="../news.php">News</a></li>
<li><a href="../lectures/">Syllabus and Lectures</a></li>
<li><a href="index.php" id="current">Assignments</a></li>
<li><a href="../resources.php">Resources</a></li>
</ul>
</div>

<div id="content"><h2>Assignment 3: Programming with pcap / libpcap</h2>
<h3>Due: Sunday, March 4th at 11:59 PM</h3>
<p class="note">This assignment is worth 25 points.</p>

<h3>Overview</h3>
<p>So far in the class, we have used tools such as tcpdump, Wireshark, dsniff, nmap, and EtherApe.  They all have one thing in common: they were use the pcap (packet capture) API via libpcap library on Linux.  In this assignment, you will be programming in C and using libpcap.  libpcap is a standard programming library used to smooth out the inconsistencies of raw sockets on multiple architectures.  The motivations of this assignment are to:</p>
<ul>
<li>Work further with network packets.</li>
<li>Hone your programming skills as well as develop programming practices necessary for successful network programming.</li>
<li>Utilize an important API and apply it understand some of the network attacks that we have covered so far.</li>
</ul>

<h3>Instructions</h3>
<p>Using pcap is easy.  Dumping packets into readable form is interesting.  You will need to review the IP and TCP header layouts from the class notes.  It is urged that you use the Ubuntu VM or a Linux environment for this assignment.  My Ubuntu VM does not have libpcap installed.  To install it, run <code>sudo apt-get install libpcap*.dev</code>.  Using C, you will write three different packet sniffers:</p>

<p>1. (5 points) A simple packet sniffer using libpcap.  To help you get started, I have written a good chunk of it already: <a href="sniff.c"><code>sniff.c</code></a>.  However, there are two problems with the code:</p>
<ol>
<li>It does not handle pcap errors.</li>
<li>It does not emit the raw packets.</li>
</ol>
<p>Modify the program so that it handle pcap errors and output packets in the following format:</p>
<pre>
00 1e e5 7f e2 83 00 17 f2 e6 96 55 08 00 45 00 | ...........U..E.
00 3a 43 b3 00 00 ff 11 06 cf c0 a8 01 66 d0 43 | .:C..........f.C
de de dc 47 00 35 00 26 af 86 d0 33 01 00 00 01 | ...G.5.&amp;...3....
00 00 00 00 00 00 03 77 77 77 04 65 73 70 6e 03 | .......www.espn.
63 6f 6d 00 00 01 00 01                         | com.....
</pre>

<p>To compile and run:</p>
<ul>
<li><code>gcc -o sniff sniff.c -l pcap</code></li>
<li><code>sudo ./sniff</code></li>
</ul>

<p>2. (10 points) Copy <code>sniff.c</code> to <code>sniff2.c</code> and add two functions to it:</p>
<ul>
<li><code>print_tcp_header()</code> - Given a TCP header data structure, print out the following fields in a meaningful manner:
<ul>
<li>Source Port</li>
<li>Destination Port</li>
<li>Sequence #</li>
<li>Acknowledgement #</li>
<li>Header Size</li>
<li>Flags</li>
</ul>
</li>
<li><code>print_ip_header()</code> - Given an IP header data structure, print out the following fields in a
meaningful manner:
<ul>
<li>Source Address</li>
<li>Destination Address</li>
</ul>
</li>
</ul>
<p class="note">IMPORTANT: Please also print the size of packet data (in bytes)!</p>
<p>You are permitted to write helper functions.  <span class="stress">Please also display packet number as well (i.e., counter).</span>  To compile and run:</p>
<ul>
<li><code>gcc -o sniff2 sniff2.c -l pcap</code></li>
<li><code>sudo ./sniff2</code></li>
</ul>

<p>3. (10 points) Copy <code>sniff2.c</code> to <code>sniffd.c</code>.  Modify <code>sniffd.c</code> so it can detect <span class="stress">one</span> of the following attacks:</p>
<ul>
<li>TCP SYN flood</li>
<li>Port scanning</li>
<li>Duplicate ARP replies</li>
</ul>

<p class="note">Important: Do not output all the packets to the console, only output a message when an attack occurs!  Finally, you must describe your strategy in a <code>README.txt</code> file!</p>

<h3>References</h3>
<ul>
<li><a href="http://www.tcpdump.org/pcap.html" target="_blank">http://www.tcpdump.org/pcap.html</a></li>
<li><a href="http://www.tcpdump.org/pcap3_man.html" target="_blank">http://www.tcpdump.org/pcap3_man.html</a></li>
<li><a href="http://www.tcpdump.org/" target="_blank">http://www.tcpdump.org/</a></li>
<li><a href="http://randu.org/tutorials/c/" target="_blank">http://randu.org/tutorials/c/</a> - A C programming review</li>
</ul>

<h3>Policies and Guidelines</h3>
<ul>
<li>The programs must continually display packet information onto the console (not to a file) until user force quits or presses Control-C.</li>
<li>Your code must be written in C, not C++.</li>
<li>No collaboration of any sort in algorithms or code.</li>
<li>If your program does not compile, you will receive no credit for the part of the assignment.</li>
<li>If your program dumps core during our testing, you will receive no credit for the part of the part of the assignment.</li>
<li>Poor design, documentation, or code structure will probably reduce your grade by making it hard for you to produce a working program and hard for me to understand it; egregious failures in these areas will cause your grade to be lowered even if your implementation performs adequately.</li>
<li>It is better to have partial functionality working solidly than lots of code that doesn't actually do anything correctly.</li>
</ul>

<h3>Submitting the Assignment</h3>
<ul>
<li>Submit all your files via <code>provide</code>.  That is, <code>provide comp116 a3 README.txt sniff.c sniff2.c sniff2.c</code></li>
<li>You are allowed a maximum of five (5) submissions.</li>
<li>Files must not be bigger than 1MB total.</li>
<li class="note">No late assignments accepted! (you can still use extension tokens, of course)</li>
</ul>

</div>

<div id="footer">
<hr/>
<p><a href="mailto:mchow@cs.tufts.edu">mchow@cs.tufts.edu</a></p>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-582953-12']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
