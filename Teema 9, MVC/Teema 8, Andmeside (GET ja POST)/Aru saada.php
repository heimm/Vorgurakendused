<?php
$dir = "big"; // kausta nimi, mida avada
$failid = array(); // massiiv, kuhu lisatakse leitud failid
if ($dh = opendir($dir)) { // kui funktsioon opendir vastava sisendiga õnnestub, siis jäta viide kaustale meelde muutujasse $dh ning läbi järgnev koodiblokk
  while (($file = readdir($dh)) !== false) { // seni, kuni funktsiooniga readdir vastavas kaustas saab kätte mingi kirje (fail/kaust), salvesta see kirje muutujasse $file ning läbi järgnev koodiblokk
    if(!is_dir($file)) { // juhul, kui saadud kirje ei ole kaust, siis lisa antud kirje failide massiivi
      $failid[] = $file;
    }
  }
  closedir($dh); // kui kausta lugemine on läbi, sulge ühendus kaustaga.
} else { // kui funktsioon opendir luhtub(kaust puudub), siis esita veateade ja lõpeta programmi töö
  die("Ei suuda avada kataloogi $dir");
}
print_r($failid);// kuva failide massiivi sisu
?>