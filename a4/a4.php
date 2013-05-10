<!DOCTYPE html>

<html>

<head>
<title>COMP 116: Introduction to Computer Security - Assignment 4: Capture the Flags</title>

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
<h2>Assignment 4: Capture the Flags - Phrase That Pays Edition</h2>
<h3>Due: Monday, April 9th at 11:59 PM</h3>
<p class="note">This assignment is worth 25 points.  You must work on this assignment individually!</p>

<h3>Overview</h3>
<p>In this traditional game, you will exploit vulnerabilities on a <span class="stress">web server</span> to gain access to files you should not have access to.  Your goal is to find a few "flags" placed on the server.  You will also need to explain how to patch the vulnerabilities.</p>

<p>This year, I will not tell you how many flags there are on the server.  In addition, the flags that I have placed on the server are all clues to a "phrase that pays."  To win the game and the grand prize, you must figure out the phrase.</p>

<p>About the web server: it is a Ubuntu 11.11 server, 32-bit, with all system updates installed as Sunday, March 25, 2012.  MySQL, PHP, Tomcat, and a slew of other software are loaded on successful start of the server.  There is no GUI or desktop manager installed on the server.  <span class="stress">There are flags planted on the box.</span>  A flag can be either a text file named <code>FLAG.txt</code> on the filesystem or embedded inside of a file on the filesystem starting with <code>FLAG:</code> (yes, the colon matters).</p>

<h3>Instructions</h3>
<p>Download and run the new Ubuntu VM: <code><a href="../CTF.zip">CTF.zip</a> (1.50 GB; MD5 checksum=a20190862c778369b066a176bb913209)</code>.  To access the web server (VM) from your web browser (host), you have to determine the server's IP address first (for me it is <code>192.168.156.133</code>).  Once you can communicate with the web server, happy hacking!</p>

<p class="stress">For each flag that you find, please answer or provide:</p>
<ul>
<li>Provide a screenshot of the flag (and follow additional directions, if instructed...)</li>
<li>Where is the exact location of the flag (path or file name)?</li>
<li>What exploit or methodology did you use to find the flag?</li>
<li>If the exploit pertains to configuration or insecure programming, provide a patch for the vulnerability.  That is, rewrite the snippet of code or describe how the configuration change.</li>
</ul>

<h4 class="note">IMPORTANT: If you complete this assignment using an "unscientific", "legal cheating" method (read: assuming physical access to the box, the VM), <span class="stress">you will receive no credit for this assignment!</span>  In addition, if you fail to follow directions for a flag (see above), it will not count!</h4>

<h3>Hints</h3>
<ul>
<li>The game requires Internet access.</li>
<li>The password pair <code>ubuntu:!templinpw!</code> will not work. :-)</li>
<li>I do not need to tell you the number of users on the server.</li>
<li>It is important that you tinker / break / bang on the website / web application.</li>
<li>Use your creativity.  That is, if you were a bad guy, what would do?</li>
<li>Be sure to view the source of all the web pages and relevant files.</li>
<li>At least one exploit will result in a reverse shell.</li>
<li>It is wise to use both Firefox and Chrome web browsers.</li>
<li>There are more than 4 flags on the server.</li>
<li><a href="http://www.metasploit.com/" target="_blank">Metasploit</a> may be your friend.</li>
<li>The game is riddled with vulnerabilities.</li>
</ul>

<h3>Submitting the Assignment</h3>
<p>Please provide a report of your findings. The usual procedures:</p>
<ul>
<li>Submit all your files via <code>provide</code>.  That is, <code>provide comp116 a4 *</code></li>
<li>You are allowed a maximum of five (5) submissions.</li>
<li>Files must not be bigger than 5MB total.</li>
<li class="note">No late assignments accepted! (you can still use extension tokens, of course)</li>
</ul>

<h3 class="note">If You Have Determined The "Phrase That Pays"...</h3>
<p>E-mail me...</p>
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
