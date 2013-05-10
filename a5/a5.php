<!DOCTYPE html>

<html>

<head>
<title>COMP 116: Introduction to Computer Security - Assignment 5: Forensics</title>

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
<h2>Assignment 5: Forensics</h2>
<h3>Due: Sunday, April 22nd at 11:59 PM</h3>
<p class="note">This assignment is worth 25 points.  You must work on this assignment individually!</p>

<p>For the first two questions, you must examine two images to determine any differences and reveal any hidden information.  Consider image "a" as the original image.  Complete the following template form (one form for each question): <a href="form.doc">form.doc</a></p>

<p>1 (5 points). <a href="nr-a.jpg"><code>nr-a.jpg</code></a> and <a href="nr-b.jpg"><code>nr-b.jpg</code></a></p>

<p>2 (5 points). <a href="bsod-a.jpg"><code>bsod-a.jpg</code></a> and <a href="bsod-b.jpg"><code>bsod-b.jpg</code></a></p>

<p>3 (15 points). Authorities recently seized a local resident's laptop and smartphone.  The person is suspected of stalking a famous celebrity.  An image of suspect's SD card is available for investigation: <code><a href="sdcard.dd">sdcard.dd</a> (478 MB; MD5 checksum = d6f40756ee839175a88e7bd70bb90883)</code>.  Your job is to conduct a forensic examination of the image and document any evidence to the person's actions.  Please answer the following questions.  Your answers should be complete but concise.  None of the questions should require more than one or two paragraphs to answer.</p>
<ol>
<li>What is the disk format of the SD card?</li>
<li>What type of phone does the suspect have?  Please note carrier and operating system with version number.  Please elaborate how you determined this information.</li>
<li>What other apps are installed on the phone?  Please elaborate how you determined this information.</li>
<li>List some of the incriminating evidence that you found.  Please elaborate where and how you uncovered the evidence.</li>
<li>Did the suspect move or try to delete any files before his arrest?  Please list the name(s) of the file(s) and any indications of their contents that you can find.</li>
<li>Are there any encrypted files?  If so, please attach the contents and a brief description of how you obtained the contents.</li>
<li>Who is the celebrity that the suspect has been stalking?</li>
</ol>

<h3>Hints</h3>
<ul>
<li>Should you need a word list for cracking purposes, use <a href="http://goo.gl/9UcLi" target="_blank">http://goo.gl/9UcLi</a></li>
</ul>

<h3>Submitting the Assignment</h3>
<ul>
<li>Submit all your files via <code>provide</code>.  Example: <code>provide comp116 a5 *</code> (where <code>*</code> is all the files in your current working directory)</li>
<li>You are allowed a maximum of five (5) submissions.</li>
<li>The entire submission must not be bigger than 10MB total.</li>
<li>Lateness is one (1) point per each two (2) days late.</li>
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
