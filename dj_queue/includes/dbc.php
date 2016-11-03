<?php
/*
	DATABASE CONNECTION INFO
*/

$db_ip = '192.168.1.6:3306';
$db_user = '';
$db_pass = '';

$db_name = 'samdb';

$link = mysql_connect($db_ip, $db_user, $db_pass) or die("Unable to connect to database server.");
$db = mysql_select_db($db_name, $link) or die("Unable to access database.");

?>