<?php 
/*************************************************************************
**  Page Name	:	sidebar.php
**    purpose	:	Site Sidebar 
***
**  CSS classes	: 
**		foundation.css 	- panel
**		tns.css			- div.sidebar, h3.sidebar-header, div.sidebar-content
**  
*************************************************************************/
?>

<div>
	<div class="panel">
		<?php SAMradio_playing(); ?>
   		<?php SAMradio_listeners(); ?>
		<hr />
	<h2>Tune In</h2>
	<br />
    	<h4><a href="http://radio.tech-noid.net:9000/listen.pls" title="Tech-Noid Systems - 128k MP3 Listen Link" target="_new">128k MP3</a></h4>
        <h4><a href="http://radio.tech-noid.net:8000/listen.pls" title="Tech-Noid Systems - 64k MP3 Listen Link" target="_new">64k MP3</a></h4>
    	<h4><a href="http://radio.tech-noid.net:10000/listen.pls" title="Tech-Noid Systems - AAC+ Listen Link" target="_new">AAC+</a></h4>
        <h4>Webplayer (coming soon)</h4>
	</div>



	<div class="panel">
		<h2>Donation Ticker</h2>
        <hr />
        <h3> Coming Soon </h3>
	</div>
    
	<div class="panel">
		<h2>Show Archives</h2>
        <hr />
        <h3> Coming Soon </h3>
	</div>



</div>

