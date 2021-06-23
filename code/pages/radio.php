<div class="panel">

	<h2>Tech-Noid Systems Radio</h2>
	<hr />
	<?php SAMradio_playing(); ?>
    <br /><br />
    <?php SAMradio_listeners(); ?>
	<hr />
    <h4>Up Next:</h4>
    	<ul>
    	<?php SAMradio_queue(); ?>
        </ul>
    <hr />
    <h4>Recently Played:</h4>
    	<ul>
		<?php SAMradio_recent(); ?>
    	</ul>
    <br/>
</div>
