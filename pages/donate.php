<?php 
/*************************************************************************
**  Page Name	:	donate.php
**    purpose	:	Donation Page 
**
**
**  CSS classes	: .panel (from Foundation CSS)
**	
**  
*************************************************************************/
?>
<div class="panel">
	<h2>Donate to the Cause</h2>
	<p>The site and streams survive on donations.  All of out hosting and bandwidth bills are paid using your contributions.  Any remainder is used to help expand out service offerings.  There are a few ways to help support the station through the use of paypal donations with a credit card of even an electronic check. <br/><br />
    Please see options below.<br />  
	Note.  We use PayPal for payment processing, but you do NOT have to have a PayPal account to make a donation.
	</p>
        <div style='clear: both;'></div>

		<fieldset style='margin: 15px; padding: 15px; width: 40%;  float: left;'>
		<h2>Single Payment</h2>
		<hr />
		<div style='margin-top: 10px;'>
				<p>You specify the amount you want to donate.  Major credit cards accepted. No paypal account required. Enter your donation amount and click "Make a Donation" to continue.</p>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style='text-align: left; padding-: 3px;margin-top: 10px;'>
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="paypal@tech-noid.net">
			<input type="hidden" name="item_name" value="Tech-Noid Systems Donation from <?php get_ip_address();?>">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="tax" value="0">
			<strong style='font-size: 2.1em;color: #C20A0A; margin-right: 2px;'>$</strong><input type="text" name="amount" value="0.00" style='font-size: 1.2em; width: 50px; font-weight: bold; color: #000; border: 1px solid #a1a1a1; background-color: #D5D5D5;'>
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="bn" value="PP-DonationsBF">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style='margin-bottom: -3px;'>
			</form>
			<p>* amounts entered should reflect U.S. Dollar.</p>
		</div>
		</fieldset>

		<fieldset style='margin: 15px; padding: 15px; width: 36%; margin-left: 1%; float: right;'>
		<h2>Subscription</h2>
		<hr />
		<div style='margin-top: 10px;'>
				<p>This is a monthly "subscription" which allows you to send us a donation from your account every month. (REMEMBER: this is a recurring payment!)</p>
	
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style='text-align: left;margin-top: 10px;'>
			<input type="hidden" name="cmd" value="_xclick-subscriptions">
			<input type="hidden" name="business" value="paypal@tech-noid.net">
			<input type="hidden" name="item_name" value="Tech-Noid Systems Donation Subscription from <?php get_ip_address();?>">
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="bn" value="PP-SubscriptionsBF">
			<strong style='font-size: 2.1em;color: #C20A0A; margin-right: 2px;'>$</strong><input type="text" name="a3" value="0.00" style='font-size: 1.2em; width: 50px; font-weight: bold; color: #000; border: 1px solid #a1a1a1; background-color: #D5D5D5;'>
			<input type="hidden" name="p3" value="1">
			<input type="hidden" name="t3" value="M">
			<input type="hidden" name="src" value="1">
			<input type="hidden" name="sra" value="1">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but24.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style='margin-bottom: -3px;'>
			</form>
			<p>* amounts entered should reflect U.S. Dollar.</p>
		</div>
		</fieldset>
		<div style='clear: both;'></div>
		<h2 style='text-align: center;'>Thank You For Your Support!</h2>
</div>