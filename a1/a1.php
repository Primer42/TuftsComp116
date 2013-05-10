<!DOCTYPE html>

<html>
<head>
<title>COMP 116: Introduction to Computer Security - Assignment 1: Security Policy and Reconnaissance</title>

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
<h2>Assignment 1: Security Policy and Reconnaissance</h2>
<h3>Due: Thursday, February 9th at 11:59 PM</h3>
<p class="note">This assignment is worth 30 points.  You must work on this assignment individually.</p>

<p>1. Thanks to recent developments in cloud computing, you have decided to enter the lucrative venture of file sharing.  As questionable the venture is, file sharing is here to stay.  There is a number of critical issues that you need to deal with.  For you, the more data that you collect, the better.  But as a good citizen, you also want to keep users informed.  Write a short security policy (that especially addresses many privacy concerns) to users.  This policy will be posted as the home page of your service.  Some issues to ponder include:</p>
<ol>
<li>What will your subscription model be?</li>
<li>What files will you allow users to share?  Any size limit to the files?</li>
<li>Is there a download limit (file size) for free users?  How will you track that information?</li>
<li>What data will you be collecting?</li>
<li>How long will you be keeping the data for?</li>
<li>Internally, who is authorized to see all the data and for what purposes?</li>
<li>Will users have the ability to view and control (e.g., purge) the data that you are collecting?</li>
<li>Will the data be shared with any other parties?</li>
<li>How about banning and reporting users?</li>
</ol>
<p>A good place to help you write the policy is to peruse the SANS Security Policy Project at <a href="http://www.sans.org/security-resources/policies/" target="_blank">http://www.sans.org/security-resources/policies/</a></p>

<p>2. Download the <a href="../Ubuntu.zip">Ubuntu</a> virtual machine (VM) (~1.26 GB, MD5 checksum = <code>589e48e188c8fef8354efcf2a7130a10</code>).  The "administrator" username is <code>defcon</code> and the password is <code>!templinpw!</code>.  The VM has user accounts and passwords.  Using a password cracker of your choice (John the Ripper anyone?), crack as many of the passwords that you can on VM besides <code>defcon</code> (that have login:password)and answer the following questions:</p>
<ul>
<li>How many accounts with passwords are there, including <code>ubuntu</code>?</li>
<li>Which password cracker did you use?</li>
<li>Briefly explain your methodology</li>
<li>How long did it take to crack the passwords?</li>
<li>Which passwords were the easiest to crack?  How long did it take to crack those? (see hint below)</li>
<li>How many users beside <code>defcon</code> that are administrators of the server?</li>
</ul>

<p class="note">Important: Please provide a screenshot of your cracking program displaying the logins and their corresponding password in plaintext.</p>
<p>Hints:</p>
<ul>
<li>Many popular software packages have been installed on the VM including Git, Subversion, and ettercap.</li>
<li>You are also free to use other wordlists.  Perhaps check out the <a href="http://www.metasploit.com/" target="_blank">Metasploit project</a>.</li>
<li>Please <span class="stress">do not</span> install and use the Ubuntu version of John the Ripper as it is broken!  That is, via <code>sudo apt-get install john</code> --do not use this!</li>
<li>I have provided a tarball of the latest stable release of John the Ripper in the <code>pentest</code> directory of <code>defcon</code> but you will need to install it on your own!</li>
</ul>

<p>3. Because this is largely a hands-on course, it is essential that you learn many of the fundamental Unix / Linux commands, an important skill for any good security practitioner.  Please learn and tinker with the following commands and answer the questions below.  <span class="note">Please note: many will require flags!</span></p>

<p><code>ls, rm, mkdir, rmdir, cd, pwd, ln, chmod, umask, ping, cut, sort, which, grep, whereis, finger, w, who, whoami, last, file, strings, top, ps, nice, nohup, kill, signal, more, less, ifconfig, arp, nslookup, cat, uname, history, netstat, ifconfig, traceroute, dig, man, lsof, crontab, nc, uniq, id, groups, df, du</code></p>
<ul>
<li>How would you find the path to the <code>perl</code> command?</li>
<li>What command can you use to find out your IP address and MAC address?</li>
<li>What command can you use to show all the processes that are running on the system?</li>
<li>What command can you use to get more details about running processes listening on ports?</li>
<li>What one command could you use to list every file, <span class="stress">including hidden files</span>, on the entire system, showing their owner, location, and access time?</li>
<li>Assume you found a file named <code>/tmp/tini</code>.  What command could you use to find out what type of file this was?</li>
<li>So you discovered that <code>/tmp/tini</code> is a binary executable.  What command could you use to extract any readable information from the file without running it?  Also, try this on a compressed file such a ZIP or JAR</li>
<li>What command can you use to see the most active processes on a system?</li>
<li>What command can you use to find the IP address-to-MAC address mappings for systems on the local network?</li>
<li>What command can you use to find the IP addresses of other machines? (few acceptable answers)</li>
</ul>

<h3>Submitting the Assignment</h3>
<ul>
<li>Submit all your files via <code>provide</code>.  Example: <code>provide comp116 a1 a1.doc screenshot.png</code>
<ul>
<li>If you are new to Tufts CS, you must SSH into <code>linux.cs.tufts.edu</code>.  To obtain or reset your Tufts CS account, go to <a href="https://www.eecs.tufts.edu/~accounts/" target="_blank">https://www.eecs.tufts.edu/~accounts/</a></li>
</ul>
</li>
<li>You are allowed a maximum of three (3) submissions.</li>
<li>Files must not be bigger than 5MB total.</li>
<li class="note">No late assignments accepted!</li>
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
