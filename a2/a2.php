<!DOCTYPE html>

<html>

<head>
<title>COMP 116: Introduction to Computer Security - Assignment 2: Packet Analysis of DEF CON Packets</title>

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

<div id="content">
<h2>Assignment 2: Packet Analysis of DEF CON Packets</h2>
<h3>Due: Thursday, February 16th at 11:59 PM</h3>
<p class="note">This assignment is worth 15 points.</p>

<h3>Overview</h3>
<p>A <code>.pcap</code> file contains packet captures and is commonly used in many libpcap-based applications such as Wireshark, ettercap, and EtherApe.  In this assignment, you will analyze over 200,000 packets from arguably the world's most dangerous network: the <a href="http://www.defcon.org/" target="_blank">DEFCON&reg; Hacking Conference</a> in Las Vegas, NV.  Each year, I volunteer many hours at the infamous <a href="http://www.wallofsheep.com/" target="_blank">Wall of Sheep &reg;</a> demonstration to find users who use e-mail, websites, and other services insecurely (i.e., unencrypted).  Each year, I collect over 10 GB of traffic.  This is your opportunity to work with <span class="stress">a lot</span> of real data!</p>

<h3>Instructions</h3>
<p>I have posted a good half of the packets I collected at <a href="../data/wos_1/">http://www.cs.tufts.edu/comp/116/data/wos_1/</a>.  Each file is exactly 100MB.  Everyone will analyze the first pcap file <a href="../data/wos_1/dc18_wos_00001_20100730183633"><code>dc18_wos_00001_20100730183633</code></a>.  In addition, each student will be assigned a different set of packets to analyze.  The list of who will be analyzing what set of packets will be public because it is very possible that you may need to depend on the student with the packet set number before or after you.  You should analyze your packets using Wireshark first.  For each packet set (set #1 and the set assigned to you), please answer the following:</p>

<ol>
<li>What is the MD5 checksum of your packet set?</li>
<li>How many packets are there in your set?</li>
<li>How many plaintext usernames and passwords pairs are there in your packet set?  Which packet(s) (provide number) contained the information?  Describe your methodology in obtaining the information.</li>
<li>If you found usernames and passwords, describe how you verify them <span class="stress">without</span> logging on to the website or service with it (<span class="note">and please do not do this as it is illegal!)</span>?</li>
<li>How many <span class="stress">complete</span> TCP connections are there?</li>
<li>Provide a mapping of destination addresses and hostnames for your packet set.  Describe your methodology.</li>
<li>Provide a summary of the all protocols used.  What was the most popular protocol used?  Describe your methodology.</li>
<li>How can you reconstruct the files downloaded given a packet set?  What could possibly go wrong?</li>
<li>Describe any suspicious packets or incidents in your set and describe your methodology.</li>
</ol>

<h3>Tools</h3>
<p>You are allowed to use tools to help you answer the questions above, including:</p>
<ul>
<li>Wireshark</li>
<li>tcpdump</li>
<li>ettercap</li>
<li>dsniff</li>
<li>EtherApe</li>
</ul>
<p>Most of the tools are installed on the Ubuntu virtual machine I provided.</p>

<h3>Packet Set Assignment</h3>
<ul>
<li>34. Ted</li>
<li>33. Hashem</li>
<li>32. Dan</li>
<li>31. Shahab</li>
<li>30. Scholtz</li>
<li>29. Goodrich</li>
<li>28. White</li>
<li>27. Warnick</li>
<li>26. Rothstein</li>
<li>25. Aronoff</li>
<li>24. Hamlin</li>
<li>23. Ellis</li>
<li>22. Adrienne</li>
<li>21. Nichols</li>
<li>20. Lessard</li>
<li>19. Richard</li>
<li>18. JJ</li>
<li>17. Daneel</li>
<li>16. Xihan</li>
<li>15. Timmerman</li>
<li>14. Wooldridge</li>
<li>13. Smith</li>
<li>12. Jeff</li>
</ul>

<h3>Notes</h3>
<ul>
<li>I did not install the GUI desktop on the Ubuntu VM for good reasons. If you want to install the full Ubuntu desktop GUI on the VM, run <code>sudo apt-get install ubuntu-desktop</code></li>
</ul>

<h3>Submitting the Assignment</h3>
<ul>
<li>Submit all your files via <code>provide</code>.  Example: <code>provide comp116 a2 a2.txt screenshot1.png</code></li>
<li>You are allowed a maximum of three (3) submissions.</li>
<li>Files must not be bigger than 5MB total.</li>
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
