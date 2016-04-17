<?php
require_once('head.html');
  $pildiMassiiv = array("pildid/nameless1.jpg",
  "pildid/nameless2.jpg",
  "pildid/nameless3.jpg",
  "pildid/nameless4.jpg",
  "pildid/nameless5.jpg",
  "pildid/nameless6.jpg");
$page = "";
if (!empty($_GET['page'])) {
  $page = $_GET['page'];
}
switch($page){
	case "galerii":
		include("galerii.html");
	break;
	case "vote":
		include("vote.html");
	break;
	case "tulemus":
		include("tulemus.html");
	break;
	default:
		include("pealeht.html");
	break;
}
require_once('foot.html');
?>