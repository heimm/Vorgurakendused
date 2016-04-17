<?php
require_once('head.html');
?>
	<h3>Fotod</h3>
	<div id="gallery">
		<?php
			$pildiMassiiv = array("pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");
				//http://stackoverflow.com/questions/10258345/php-simple-foreach-loop-with-html
				foreach ($pildiMassiiv as $value => $indeks) { ?>
					<img src="<?php echo $indeks?>" alt= "nimetu <?php echo $value +1?>" />
				<?php } ?>
	</div>
	<?php
	require_once('foot.html')
	?>