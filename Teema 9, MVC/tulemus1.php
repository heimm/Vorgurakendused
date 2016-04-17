<?php
require_once('head.html');
?>
	<h3>Valiku tulemus</h3>
	<p>Siia tuleb valiku tulemus, mida saab kuvada ainult PHP abil :)</p>
	<?php
	$pildiMassiiv = array("pildid/nameless1.jpg",
	"pildid/nameless2.jpg",
	"pildid/nameless3.jpg",
	"pildid/nameless4.jpg",
	"pildid/nameless5.jpg",
	"pildid/nameless6.jpg");
	if(isset($_GET['pilt'])){
		echo "PILT VALITUD";
		$value = $_GET['pilt'];
		foreach ($pildiMassiiv as $key => $value) {
			if ($value == $key) {
				echo "<br>";
				echo "Pilt on andmebaasis";
			}
		}
		}
	if (empty($_GET['pilt'])) {
		echo "PALUN VALI PILT!";
	}
	require_once('foot.html')
	?>