<?php
require_once('head.html');
?>

	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus1.php" method="GET">

			<?php
				$pildiMassiiv= array("pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");
			foreach ($pildiMassiiv as $index => $value) {?>


			<p>

			<label for="p<?php echo $index +1?>">
				<img src="<?php echo $value?>" alt="nimetu <?php echo $index + 1?>" height="100" />
			</label>
			<input type="radio" value="<?php echo $index +1?>" id="p<?php echo $index +1?>" name="pilt"/>

		</p>

		<?php }?>

		<br/>
		<input type="submit" value="Valin!"/>
	</form>
	<?php
	require_once('foot.html')
	?>