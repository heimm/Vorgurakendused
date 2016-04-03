<?php
$korvpallurid = array(
	array('nimi'=>'LeBron James', 'vanus'=>31, 'rahvus'=> 'ameeriklasest','pikkus'=>2.03, 'klubi'=>'Cleveland Cavaliers', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/LeBron_James_%2815662939969%29.jpg/419px-LeBron_James_%2815662939969%29.jpg','koduleht'=>'http://lebronjames.com/'),
	array('nimi'=>'Kevin Durant', 'vanus'=>27, 'rahvus'=> 'ameeriklasest','pikkus'=>2.06, 'klubi'=>'Oklahoma City Thunder', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Kevin_Durant_Feb_2014.jpg/625px-Kevin_Durant_Feb_2014.jpg','koduleht'=>'http://kevindurant.com/'),
    array('nimi'=>'Dirk Nowitzki', 'vanus'=>37,'rahvus'=> 'sakslasest', 'pikkus'=>2.13, 'klubi'=>'Dallas Mavericks', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/NowitzkiWizards2.jpg/400px-NowitzkiWizards2.jpg','koduleht'=>'http://www.swish41.com/'),
    array('nimi'=>'Kobe Bryant', 'vanus'=>37, 'rahvus'=> 'ameeriklasest','pikkus'=>1.98, 'klubi'=>'Los Angeles Lakers', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Kobe_Bryant_2014.jpg/629px-Kobe_Bryant_2014.jpg','koduleht'=>'hhttp://www.kobebryant.com/kobe-bryant-merchandise.php'),
    array('nimi'=>'Derrick Rose', 'vanus'=>27, 'rahvus'=> 'ameeriklasest','pikkus'=>1.91, 'klubi'=>'Chicago Bulls', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Derrick_Rose_2.jpg/492px-Derrick_Rose_2.jpg','koduleht'=>'http://drosehoops.com/'),
    array('nimi'=>'Tony Parker','vanus'=>33, 'rahvus'=> 'prantslasest','pikkus'=>1.88, 'klubi'=>'San Antonio Spurs', 'linkpilt'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Parker_khomar.JPG/448px-Parker_khomar.JPG','koduleht'=>'http://tp9.net/')
	);
foreach ($korvpallurid as $korvpallur) {
    include("korvpall.html");
}
 ?>