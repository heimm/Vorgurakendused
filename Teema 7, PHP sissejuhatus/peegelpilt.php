<?php
peegelPilt("tagurpidi");
function peegelPilt($string){
$sonaPikkus = strlen($string);
  for ($i=1; $i <= $sonaPikkus ; $i++) {
    $koht = $sonaPikkus - $i;
    echo "$string[$koht]";
  }
}
 ?>