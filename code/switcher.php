<?php 
/*************************************************************************
**  Page Name	:	switcher.php
**    purpose	:	Page Switcher
**              	- part of the site menu system 
**
*************************************************************************/
?>
<div>
<?php 
	$page = $_GET['id'];
	switch ($page){
		case "radio":
			include('pages/radio.php');
			break;
			
		case "chatroom":
			include('pages/chatroom.php');
			break;
			
		case "contact":
			include('pages/contact.php');
			break;
			
		case "donate":
			include('pages/donate.php');
			break;
			
		default:
			include('pages/landing.php');
			break;		
	}
?>
</div>

