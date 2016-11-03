<?php
/*
	This is the DJ queue page for the radio station
*/

# test to see if we are logged in

#session_start();
#
#if (!isset($_SESSION['user'])) {
#	header("Location: login.php");
#}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Tech-Noid Systems Radio</title>

<body>
	<div id="header">
		<div class="inside">
		</div>

	
	</div>
	
	<!-- [END] #header -->
<br />
	<div id="primary">
	<div class="inside">
    <div id="server1">
      <h1>Tech-Noid Systems Radio Broadcast Page </h1>
	  <p>To broadcast on the station, you will need to connect your local encoder to one of our relays listed below.<br> When you submit the form below it will place you into the playlist queue and you will see a count down<br> from 10 to zero, when the counter reaches zero (0) you will be live. If you become disconnected from the<br> relay, the main station feed will resume playback of the station playlist, and you will have to re-cue<br> via this form to put yourself back on the air.</p>

	  <br>
<h2>Your Show Title & Info</h2>
<form method="post" action="queued.php"> 
<p><input type="text" width="50" name="artist" /> DJ/Host
<br><br>
<input type="text" width="80" name="title" /> Show Title
</p><br>

<h2> Choose a Relay</h2>
Select the relay location closest to you, then connect to it with your local encoder.<br>(Ensure the url/port/pw you selected matches your local encoder.)<br>

<p><input type="radio" value="USA" name="relay" Checked>USA (Default)<br />
url:- dislinux.tech-noid.net<br>
port:- 11128<br>
pw:- t3chn01ddj<br>
<br>
<input type="radio" value="EU" name="relay">EU<br />
url:- dislinux.tech-noid.net<br>
port:- 11128<br>
pw:- t3chn01ddj<br>
<br>
<input type="radio" value="Other" name="relay">Other<br />
url:- ??<br>
port:- ????<br>
pw:- ????????<br></p>

<br>
<h2> Would you like a recording of the show added to the podcast?</h2>

<p><input type="radio" value="Yes" name="podcast" Checked>Yes Please (Default)<br />

<input type="radio" value="No" name="podcast">No Thanks<br /></p>

<br>
<br>
<font color="#FF0000">IMPORTANT: check that your local encoder is connected to the relay you selected above <b><i>before</i></b>  you add yourself to the station queue.</font>
<br>
<br>
<input type="submit" value="Add Me To The Queue" />
</form>
<br />
----------
<h1>Support the Cause!</h1>

<br>
<p>If you would like to help support the station, please donate a dollar or 2 to help us pay for the server bills<br> This is by no means expected but is always appreciated!</p><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="dnb4me_209@yahoo.com">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="bn" value="PP-DonationsBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

	</div>
	</div>
	</div>
<br />

<hr class="hide" />
	<div id="footer">
		<div class="inside">
						<p class="copyright">&#169; 2008-2010 <a href="/">Tech-Noid Systems (tech-noid.net)</a></p>

			<p class="attributes"><img src="/images/minisigns.gif" /></p><br>
		</div>
	</div><div align="center"><br></div>
	<!-- [END] #footer -->	

	<!-- 13 queries. 2.603 seconds. -->
	</body>
</html>
<br />