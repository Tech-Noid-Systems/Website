<?php
/*
	ADMIN PAGE
		-- will be the place to make 
			1. schedule entries for station
			2. new dj login accounts
*/

# test to see if we are logged in
session_start();

if (!isset($_SESSION['user'])) {
	header("Location: login.php");
}


#  include some extra stuff
include ('includes/dbc.php'); 
include ('includes/schedule_functions.php');



##
##
#  check to see if we are registering new user
if ($_POST['Submit'] == 'Register') {
	# verify the information
	if (strlen($_POST['email']) < 5) {
		header("Location: admin.php?msg=ERROR: Incorrect email. Please enter valid email address..");
		exit();
    }
	if (empty($_POST['pass1'])) { 
		header("Location: admin.php?msg=ERROR: Password is empty empty..");
		exit();
	}
	
	# check for duplicate entry
	$rs_duplicates = mysql_query("select id from users where user_email='$_POST[email]'");
	$duplicates = mysql_num_rows($rs_duplicates);
	if ($duplicates > 0) {	
		header("Location: admin.php?msg=ERROR: User account already exists..");
		exit();
	}
	
	# if we made it this far we are a new account
	# time to send an email to the new user
	$md5pass = md5($_POST['pass1']);
	$activ_code = rand(1000,9999);
	$server = $_SERVER['HTTP_HOST'];
	$host = ereg_replace('www.','',$server);
	mysql_query("INSERT INTO users (`user_name`,`user_email`,`user_pwd`,`joined`,`activation_code`,`user_type`)
				  VALUES ('$_POST[user_name]','$_POST[email]','$md5pass',now(),'$activ_code','$_POST[type]')") or die(mysql_error());
	
	# build the email for the new user
	$message = 
"Thank you for registering for a dj login at $server. 
DO NOT share your login information with any other djs or people (inside or outside of the station).

Here are the login details...\n\n
____________________________________________
*** DJ LOGIN INFORMATION  ***** \n

DJ Login Page :   http://radio.techno-dnb.com/login.php 
Registered Email: $_POST[email] 
DJ Site Login :   $_POST[user_name] 
Password:         $_POST[pass2] 
Activation Code:  $activ_code \n\n

____________________________________________
*** ACTIVATION LINK ***** \n
Activation Link: http://$server/activate.php?usr=$_POST[email]&code=$activ_code \n\n

_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	mail($_POST['email'] , "Login Activation", $message,
    "From: \"Auto-Response\" <notifications@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
	#echo("Registration Successful! Activation code email sent to new dj!");	
	header("Location: admin.php?msg=NOTICE: Registration Successful! Activation code email sent to new dj!");
	exit;
}	

	
	
	
	
##
##
#  check to see if we are submitting the schedule data
if ($_POST['Submit'] == 'Schedule') {

	# grab the info from the input page
	$artist = $_POST["Artist"];
	$title = $_POST["Title"];
	$day = $_POST["Sched_day"];
	$startTime = $_POST["Start_time"];
	$endTime = $_POST["End_time"];
	$location = $_POST["Location"];
	$note1info = $_POST["Note1"];
	$note2info = $_POST["Note2"];
	$note3info = $_POST["Note3"];
	$note1site = $_POST["Note1site"];
	$note2site = $_POST["Note2site"];
	$note3site = $_POST["Note3site"];
	$sched_class = $_POST["schedClass"];

	# are the notes supposed to be a web links as well?
	# note 1
	if ($note1site == "null")
		$note1 = $note1info;
	elseif ($note1site == NULL)
		$note1 = $note1info;
	else
		$note1 = "<a href=\"" . $note1site . "\" target=\"_blank\">" . $note1info . "</a>";

	# note 2
	if ($note2site == "null")
		$note2 = $note2info;
	elseif ($note2site == NULL)
		$note2 = $note2info;
	else
		$note2 = "<a href=\"" . $note2site . "\" target=\"_blank\">" . $note2info . "</a>";

	# note 3
	if ($note3site == "null")
		$note3 = $note3info;
	elseif ($note3site == NULL)
		$note3 = $note3info;
	else
		$note3 = "<a href=\"" . $note3site . "\" target=\"_blank\">" . $note3info . "</a>";
	
	# convert the times
	$conv_startTime = build_start_time($day, $startTime);
	$conv_endTime = build_end_time($day, $endTime);
	
	# waste some more memory
	$schedArtist = $artist;
	$schedTitle = $title; 
	$schedLocation = $location;
	$schedStartTime = $conv_startTime; 
	$schedEndTime = $conv_endTime; 
	$schedTableClass = $sched_class; 
	$schedNote1 = $note1; 
	$schedNote2 = $note2; 
	$schedNote3 = $note3;
	
	# build our input query
	
	mysql_query("INSERT INTO show_schedule (`artist`, `title`, `start_time`, `end_time`, `location`, `note1`, `note2`, `note3`, `type_flag`)
				  VALUES ('$schedArtist','$schedTitle','$schedStartTime','$schedEndTime','$schedLocation','$schedNote1','$schedNote2','$schedNote3','$schedTableClass')") or die(mysql_error());
	
	header("Location: admin.php?msg=NOTICE: New Schedule Entry Added");
	exit();
}

?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0.1//EN">
<!-- $Id Exp $ -->
<!--Generated by quanta Plus template - freely use and distribute-->
<html>

<head>
	<title>techno-dnb.com Schedule and DJ Admin Interface</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link> 

    <style type="text/css">
    </style>

    <script language="javascript"> 
    function Change1()
    {
        if (document.frmSchedule.check1.checked == true) 
            { document.frmSchedule.text1.disabled = false; document.frmSchedule.text1.value = "http://"; }
        else
            { document.frmSchedule.text1.disabled = true; document.frmSchedule.text1.value = "null"; }
    }
    function Change2()
    {
        if (document.frmSchedule.check2.checked == true) 
            { document.frmSchedule.text2.disabled = false; document.frmSchedule.text2.value = "http://"; }
        else
            { document.frmSchedule.text2.disabled = true; document.frmSchedule.text2.value = "null"; }
    }
    function Change3()
    {
        if (document.frmSchedule.check3.checked == true) 
            { document.frmSchedule.text3.disabled = false; document.frmSchedule.text3.value = "http://"; }
        else
            { document.frmSchedule.text3.disabled = true; document.frmSchedule.text3.value = "null"; }
    }
    </script> 
</head>
<body>

<!-- This is the stylesheet for the app -->
<link href="includes/styles.css" rel="stylesheet" type="text/css">

<!-- Display messages in the header -->
<?php if (isset($_GET['msg'])) { echo "<div class=\"msg\"> $_GET[msg] </div>"; } ?>
<p>&nbsp;</p>

<!-- 
	This is the Admin Application 
		there are two portions to this app
		1.  shcedule maker
		2.  login maker
-->
<table width="65%" border="0" cellpadding="0" cellspacing="0">
	<tr> 
		<td bgcolor="d5e8f9" class="mnuheader"><strong><font size="5">Schedule Maker</font></strong></td>
	</tr>
	<tr>
		<!-- This is the Schedule Maker functions of the application -->
		<td bgcolor="e5ecf9" class="forumposts">
		<form name="frmSchedule" action="admin.php" method="post">
			Artist Name: <input type="text" name="Artist" size="40" />
			<br><br>
			Show Name:	<input type="text" name="Title" size="40" />
			<br><br>
			Day of Week:
			<select name="Sched_day">
				<option value="0">Sunday</option>
				<option value="1">Monday</option>
				<option value="2">Tuesday</option>
				<option value="3">Wednesday</option>
				<option value="4">Thursday</option>
				<option value="5">Friday</option>
				<option value="6">Saturday</option>
			</select>
			Start Time:
			<select name="Start_time">
				<option value="0">12:00am</option>
				<option value="3600">01:00am</option>
				<option value="7200">02:00am</option>
				<option value="10800">03:00am</option>
				<option value="14400">04:00am</option>
				<option value="18000">05:00am</option>
				<option value="21600">06:00am</option>
				<option value="25200">07:00am</option>
				<option value="28800">08:00am</option>
				<option value="32400">09:00am</option>
				<option value="36000">10:00am</option>
				<option value="39600">11:00am</option>
				<option value="43200">12:00pm</option>
				<option value="46800">01:00pm</option>
				<option value="50400">02:00pm</option>
				<option value="54000">03:00pm</option>
				<option value="57600">04:00pm</option>
				<option value="61200">05:00pm</option>
				<option value="64800">06:00pm</option>
				<option value="68400">07:00pm</option>
				<option value="72000">08:00pm</option>
				<option value="75600">09:00pm</option>
				<option value="79200">10:00pm</option>
				<option value="82800">11:00pm</option>
			</select>
			End Time:
			<select name="End_time">
				<option value="86400">12:00am</option>
				<option value="3600">01:00am</option>
				<option value="7200">02:00am</option>
				<option value="10800">03:00am</option>
				<option value="14400">04:00am</option>
				<option value="18000">05:00am</option>
				<option value="21600">06:00am</option>
				<option value="25200">07:00am</option>
				<option value="28800">08:00am</option>
				<option value="32400">09:00am</option>
				<option value="36000">10:00am</option>
				<option value="39600">11:00am</option>
				<option value="43200">12:00pm</option>
				<option value="46800">01:00pm</option>
				<option value="50400">02:00pm</option>
				<option value="54000">03:00pm</option>
				<option value="57600">04:00pm</option>
				<option value="61200">05:00pm</option>
				<option value="64800">06:00pm</option>
				<option value="68400">07:00pm</option>
				<option value="72000">08:00pm</option>
				<option value="75600">09:00pm</option>
				<option value="79200">10:00pm</option>
				<option value="82800">11:00pm</option>
			</select>
			<br><br>
			Location (City, State, Country):<br><input type="text" name="Location" size="40" /><br><br>
			Show Note #1: - click for www <input type="checkbox" name="check1" onClick="Change1()"/> <br><input type="text" name="Note1" size="40" /> 
			<input type="text" name="Note1site" id="text1" value="null" size="40" disabled="true"/><br><br>
			Show Note #2: - click for www <input type="checkbox" name="check2" onClick="Change2()"/> <br><input type="text" name="Note2" size="40" /> 
			<input type="text" name="Note2site" id="text2" value="null" size="40" disabled="true"/><br><br>
			Show Note #3: - click for www <input type="checkbox" name="check3" onClick="Change3()"/> <br><input type="text" name="Note3" size="40" /> 
			<input type="text" name="Note3site" id="text3" value="null" size="40" disabled="true"/><br><br>
			<input type="radio" name="schedClass" value="required" checked="true" />  Regular Show
			<input type="radio" name="schedClass" value="tenative" />  Semi-Regular Show<br>
			<input type="submit" value="Schedule" name="Submit"/> <input type="reset" value="Reset Form" name="cancel" />
		</form>
		</td>
	</tr>
	
	
	
	<!-- This is the Login Maker functions of the application -->
	<tr> 
		<td bgcolor="d5e8f9" class="mnuheader"><strong><font size="5">Login Maker</font></strong></td>
	</tr>
	<tr> 
		<td bgcolor="e5ecf9" class="forumposts">
		<form name="frmLogin" method="post" action="admin.php" style="padding:5px;">
			Login: <input name="user_name" type="text" id="user_name" />  
			Email: <input name="email" type="text" id="email" />  
			<br><br>
			Password: <input name="pass1" type="password" id="pass1" />
			<br><br>
			Retype Password: <input name="pass2" type="password" id="pass2" />
			<br><br>
			Account Type: 
			<input type="radio" name="type" value="admin" /> Admin
			<input type="radio" name="type" value="dj" /> DJ
			<br><br>
			<input type="submit" name="Submit" value="Register"> <input type="reset" value="Reset Form" name="cancel" />
		</form>
		</td>
	</tr>

	</table>

</body>
</html>

<?php
?>