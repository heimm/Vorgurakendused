<?php
require_once('funk.php');
session_start();
connect_db();

$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

switch($page){
	case "login":
		logi();
	break;
	case "loomad":
		kuva_puurid();
	break;
	case "logout":
		logout();
	break;
	case "lisa":
		lisa();
	break;
	default:
		include_once('views/v2rav.html');
	break;
}

include_once('views/foot.html');

?>