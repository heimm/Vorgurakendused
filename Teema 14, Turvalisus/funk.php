<?php
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}
function kuva_puurid(){
	global $connection;
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
	$p= mysqli_query($connection, "select distinct(PUUR) as puur from merlenhe_loomaaed order by puur asc");
	$puurid=array();
	while ($r=mysqli_fetch_assoc($p)){
		$l=mysqli_query($connection, "SELECT * FROM merlenhe_loomaaed WHERE  puur=".mysqli_real_escape_string($connection, $r['puur']));
		while ($row=mysqli_fetch_assoc($l)) {
			$puurid[$r['puur']][]=$row;
		}
	}
}
	include_once('views/puurid.html');
}
function logi(){
	global $connection;
	if(!empty($_SESSION["user"])){
		header("Location: ?page=loomad");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["user"] == '' || $_POST["pass"] == ''){
				$errors =array();
				if(empty($_POST["user"])) {
					$errors[] = "Palun sisesta kasutajanimi!";
				}
				if(empty($_POST["pass"]))
					$errors[] = "Palun sisesta parool!";
				}else{
					$kasutaja = mysqli_real_escape_string ($connection, $_POST["user"]);
					$parool = mysqli_real_escape_string ($connection, $_POST["pass"]);
					$sql = "SELECT id,role FROM merlenhe_kylastajad WHERE username='$kasutaja' AND passw=sha1('$parool')";
					$result = mysqli_query($connection, $sql);
					$rida = mysqli_num_rows($result);
					$role = mysqli_fetch_assoc($result);
					if($rida){
						$_SESSION["role"] = $role["role"];
						$_SESSION["user"] = $_POST["user"];
						header("Location: ?page=loomad");
					}else{
						header("Location: ?page=login");
					}
				}
			}else{
			}
		}
include('views/login.html');
	}
function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}
function lisa(){
	global $connection;
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
		if($_SESSION["role"] == 'admin'){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["nimi"] == '' || $_POST["puur"] == '' ){
				$errors =array();
				if(empty($_POST["nimi"])) {
					$errors[] = "Palun sisesta nimi!";
				}
				if(empty($_POST["puur"])){
					$errors[] = "Palun sisesta puur!";
				}
				}else{
					upload('liik');
					$nimi = mysqli_real_escape_string ($connection, $_POST["nimi"]);
					$puur = mysqli_real_escape_string ($connection, $_POST["puur"]);
					$liik = mysqli_real_escape_string ($connection, "pildid/".$_FILES["liik"]["name"]);
					$sql = "INSERT INTO merlenhe_loomaaed (nimi, PUUR, liik) VALUES ('$nimi','$puur','$liik')";
					$result = mysqli_query($connection, $sql);
					$id = mysqli_insert_id($connection);
					if($id){
						header("Location: ?page=loomad");
					}else{
						header("Location: ?page=loomavorm");
					}
}
}
}else{
	header("Location: ?page=loomad");
 }
}
include_once('views/loomavorm.html');
}
function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));
	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}
function hangi_loom($id){
	global $connection;
	$vaartus = mysqli_real_escape_string($connection, $id);
	$sql ="SELECT nimi, vanus, liik, PUUR FROM merlenhe_loomaaed WHERE id='$id'";
	$result = mysqli_query($connection, $sql) or die("Sellist looma pole!!!");
	$looma_info = array();
	while($rida = mysqli_fetch_assoc($result)){
	$looma_info=$rida;
	}
 return $looma_info;
}
function muuda() {
	global $connection;
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
		if($_SESSION["role"] == 'admin'){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["id"] == ''){
				header("Location: ?page=loomad");
				}else{
					$muutuja = hangi_loom($_POST["id"]);
				
					$eraldi_id = $_POST["id"];
					upload('liik');
					$nimi = mysqli_real_escape_string ($connection, $_POST["nimi"]);
					$puur = mysqli_real_escape_string ($connection,  $_POST["puur"]);
					$liik = mysqli_real_escape_string ($connection,"pildid/".$_FILES["liik"]["name"]);
					$muutuja = [
						"nimi" => $nimi,
						"PUUR" => $puur,
						"liik" => $liik,
					];
					$sql = "UPDATE merlenhe_loomaaed SET nimi='$nimi', PUUR ='$puur', liik = '$liik' WHERE id='$eraldi_id'";
					$result = mysqli_query($connection, $sql);
					$rida = mysqli_affected_rows($connection);
					if($rida){
						header("Location: ?page=loomad");
					}else{
						header("Location: ?page=pealeht");
					}
}
}
}else{
	header("Location: ?page=loomad");
 }
}
include_once('views/editvorm.html');
}
?>