<?php
/*
	SAM scripts for tech-noid.net
	--  various functions to pull info from the station dtatabases

	coded by:	Aaron Cupp (disfigure at tech-noid.net)
	orig date:	Sept 07, 2008
	version:	1.0
	updated:	04/02/2010  ver 1.0.1
*/

/*
	Show what is playing on the station right now
*/

function SAMradio_playing() {
	global $starttime, $curtime, $secsRemain, $artist, $title;
	// Open the database connection to SAM
	$connection = mysql_connect("master.tech-noid.net", "", "");
	mysql_select_db("samdb", $connection);

   	$result = mysql_query ("SELECT artist, title, duration, date_played, album FROM historylist ORDER BY date_played DESC LIMIT 1", $connection);
	
	// While there are still rows in the result set, fetch the current row into the array $row
	while ($row = mysql_fetch_array($result)) {
		
		$artist = $row["artist"];
		$title = $row["title"];
		$album = $row["album"];

		echo "<b>Now Playing:&nbsp;</b><br /><br /> 
			  <b>Artist:&nbsp;</b>$artist <br />
			  <b>Title:&nbsp;</b>$title<br />
			  <b>Album:&nbsp;</b>$album<br />";
			   
	}      
   	// Close the database connection
	mysql_close($connection);
}

/*
	Show the station queue
*/
function SAMradio_queue() {
	// Open the database connection to SAM
	$connection = mysql_connect("master.tech-noid.net", "", "");
	mysql_select_db("samdb", $connection);
		
	// Run the query on the database through the connection
   	$result = mysql_query ("SELECT songlist.*, queuelist.requestID as requestID FROM queuelist, songlist WHERE (queuelist.songID = songlist.ID) ORDER BY queuelist.sortID ASC LIMIT 5", $connection);
	
	// While there are still rows in the result set, fetch the current row into the array $row
	while ($row = mysql_fetch_array($result)) {
		$artist = $row["artist"];
		$title = $row["title"];
		echo "<li>$artist - $title </li>";
	}
   	// Close the database connection
	mysql_close($connection);
}

/*
	Return the recent tracks to be played on the station
*/
function SAMradio_recent() {
	// Open the database connection to SAM
	$connection = mysql_connect("master.tech-noid.net", "", "");
	mysql_select_db("samdb", $connection);
	
	// Run the query on the winestore through the connection
   	$result = mysql_query ("SELECT artist, title FROM historylist ORDER BY date_played DESC LIMIT 1,5", $connection);
	
	// While there are still rows in the result set, fetch the current row into the array $row
	while ($row = mysql_fetch_array($result)) {
		$artist = $row["artist"];
		$title = $row["title"];
		echo "<li>$artist - $title </li>";
	}
   	// Close the database connection
	mysql_close($connection);
}


function SAMradio_listeners() {
	// Open the database connection to SAM
	$connection = mysql_connect("master.tech-noid.net", "", "");
	mysql_select_db("samdb", $connection);
	
	
	$result = mysql_query ("SELECT viewers FROM relay_counts ORDER BY id DESC LIMIT 1", $connection);
	while ($row = mysql_fetch_array($result)) {
		$listeners = $row["viewers"];
	}	
	
	echo "<b>Listener Count:</b><br /> &nbsp;&nbsp $listeners <br />";
	
	// close the database connection
	mysql_close($connection);
}


?>
