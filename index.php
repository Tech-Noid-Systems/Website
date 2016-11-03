<?php 
/*************************************************************************
**  Page Name	:	index.php
**    purpose	:	Tech-Noid Systems Site
**
**  CSS classes	: 
**		foundation.css 	- container, row, four, six, eight, twelve, columns,
**						block-grid, three-up 
**		tns.css			- blank, spacer, stalking, twitter, facebook, gplus
**  
*************************************************************************/
?>

<?php
/* include the header info for the site */
require('header.php');

/* include global configs and functions/classes */
require_once("includes/tns-functions.php");
require_once("includes/station_functions.php"); 
?>

<!-- tnsBAR -->
<?php //require('tns-bar.php'); ?>
<!-- /tnsBAR -->
<div class="spacer"></div>
	<!-- container -->
	<div class="container">
		<!-- Top of Site -->
		<div class="row">
        	<!-- Site Top Block --> 
			<div class="twelve columns">
            	<div class="row">
                	<!--Left Side of Header - Logo Gfx Here -->
                	<div class="four columns">
                    	<div class="eight columns centered">
                        <img id="logo" src="images/TechnoidSystemsGrayscale.png" alt="Station Logo" />
                        </div>
                    </div>
                    <!-- Right Side Header Start - Stalking Buttons Here -->
                    <div class="eight columns">                    		
                    	<div class="blank">
                        	<div class="six columns centered">
								<ul class="block-grid three-up stalking">
                            		<li class="twitter"><a href="http://twitter.com/TechNoidSystems"  target="_blank"></a></li>
                            		<li class="facebook"><a href="http://www.facebook.com/TechNoidSystems"  target="_blank"></a></li>
                            		<li class="gplus"><a href="http://plus.google.com/b/111679731030043792529/"  target="_blank"></a></li>
                            	</ul>
                            </div>
                        </div>
                        <!-- Menu System Here - bottom of right side header -->
                        <?php require('menu.php'); ?>
                        <!-- End Menu System Here -->
                    	<div class="spacer"></div>
                    </div>
                </div>
			</div>
           	<!-- /Site Top Block--> 
		</div>
		<!-- /Top of Site -->
        <!-- Body of Site -->
		<div class="row">
			<!--  Content Area (left side)  -->
			<div class="eight columns content">
 				<?php require('switcher.php'); ?>
			</div>
			<!--  End Content Area (left side)  -->
			<!--  Side Bar Area (right side)  -->
			<div class="four columns sidebar">			
				<?php require('sidebar.php'); ?>		
            </div>
			<!--  End Side Bar Area (right side)  -->
		</div>
		<!-- End Body of Site -->
<?php require('footer.php'); ?>