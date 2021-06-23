<?php 
/*************************************************************************
**  Page Name	:	tns-bar.php
**    purpose	:	Tech-Noid Systems User Bar
**					--  user login system
**					--  DJ Control Panel 
**
**  CSS classes	: 
**		foundation.css 	- container, five, seven, columns, right, 
**						  hide-on-phone, small, round, black, button
**		tns.css			- login-bar, submit
**  
*************************************************************************/
?>

<div id="tnsBAR" class="container">
	<div class="row">
    
		<div class="five columns">
			<strong class="left">Welcome Back:<br /><br /><?php echo('iHaveAveryLongUserName')?></strong>
           	<span class="right hide-on-phones">
            	<a href="#" class="small round black button">User Panel</a>
            	<a href="#" class="small round black button">Go Live</a>
            </span>
		</div>
		
        <div class="seven columns">
			<form class="login-bar right hide-on-phones">
           		<input type="text" name="username" placeholder="username" class="small" />
           		<input type="password" name="password" placeholder="password" class="small" />
           		<input type="submit" value="Submit" name="submit" class="submit small round black button" />
			</form>
		</div>
     
	</div>
</div>