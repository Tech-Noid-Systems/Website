<?PHP

# test to see if we are logged in

#session_start();
#if (!isset($_SESSION['user'])) {
#	header("Location: login.php");
#}

	// this is the script to do the damage.
	//   we get fired via the submit button on the dj page.
  
	$ARTIST = $_POST['artist'];
	$TITLE = $_POST['title'];
	$RELAY = $_POST['relay'];
	$ARCHIVE = $_POST['podcast'];
	//$DATE

//which relay did we choose?
switch($RELAY)
	{
	case 'SHOUTCAST':
		$stream = "http://master.tech-noid.net:11128";
		break;
	case 'ICECAST':
		$stream = "http://master.tech-noid.net:11228/dj_feed";
		break;
	default:
		$stream = "http://master.tech-noid.net:11128";
}

//make and check the link....can we connect to the mysql server?  
$link = mysql_connect ('master.tech-noid.net:3306', '', '');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
//select and check is we can use the database
$db_selected = mysql_select_db('samdb', $link);
if (!$db_selected) {
    die ('Can\'t use SAMDB : ' . mysql_error());
}
// build a query to insert the dj data inot the SAM sql database
$query = "INSERT INTO djqueue (artist, title, relay, archive)VALUES ('".$ARTIST."','".$TITLE."','".$stream."','".$ARCHIVE."')";

$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
?>

<?PHP
	// time to touch the livefeed event in SAM to kick us free
	$url = 'http://master.tech-noid.net:1221/event/livefeed';
	$xml = simplexml_load_file($url);
	
	if ($xml) {
		print " ";

		if( $xml->Errors )
		{
			// If there was an error in the response, print a warning.
			print " ";
		}
		else
		{
			print " ";
		}
	}
	// If there was no XML response, print an error
	else {
		print " ";
	}
?>    
	

<div id="introduction">
<div id="home_intro_content">
    <div id="server1">
		<h2>Stream 1 DJ Queue Page </h2>
		<br>		
		<b>
		You are in the process of being placed into the station queue.<br>
		Make sure you are connected to the relay and ready to play.<br>
		When the timer reaches 0 (zero) you will be live on the station.<br>
		Page will refresh back to the main site once queued.<br>
		</b>		
		<br>
    </div>
    
    <div id="content-borders">

<script language="JavaScript"> 
	var countDownInterval=10; 
	var countDownTime=countDownInterval+1; 

function countDown(){ 
	countDownTime--; 
	if (countDownTime <=0){ 
		countDownTime=countDownInterval; 
		clearTimeout(counter) 
		window.location="http://www.tech-noid.net"; 
		return 
	} 
	if (document.all) //if IE 4+ 
		document.all.countDownText.innerText = countDownTime+" "; 
		else if (document.getElementById) //else if NS6+ 
		document.getElementById("countDownText").innerHTML=countDownTime+" " 
	else if (document.layers){ //CHANGE TEXT BELOW TO YOUR OWN 
		document.c_reload.document.c_reload2.document.write('<h3>Live Stream Launching in   <b id="countDownText">'+countDownTime+' </b>   seconds</h3>') 
		document.c_reload.document.c_reload2.document.close() 
	} 
counter=setTimeout("countDown()", 1000); 
} 

function startit(){ 
	if (document.all||document.getElementById) //CHANGE TEXT BELOW TO YOUR OWN 
		document.write('<h3>Live Stream Launching in   <b id="countDownText">'+countDownTime+' </b>   seconds</h3>') 
		countDown() 
} 

if (document.all||document.getElementById) 
startit() 
else 
window.onload=startit 
setTimeout("location.href='http://www.tech-noid.net'" , t) 
</script> 		

</div>    
</div>
