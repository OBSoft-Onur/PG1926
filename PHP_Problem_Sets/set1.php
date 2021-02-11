<?php

$sixOclock = date("06:00:00");
$tenOclock = date("10:00:00");
$fiveOclock = date("17:00:00");
$eightOclock = date("20:00:00");
$midnight = date("00:00:00");
$datenow = date("H:i:s");


if ($datenow >= $sixOclock && $datenow <= $tenOclock) {
	echo 'Günaydın...';
} else if($datenow > $tenOclock && $datenow <= $fiveOclock){
	echo 'İyi Günler...';
}else if($datenow > $fiveOclock && $datenow <= $eightOclock){
	echo 'İyi Akşamlar...';
}else if($datenow > $eightOclock && $datenow <= $midnight){
echo 'İyi Geceler...';
}else{
	echo 'Esenlikler Dilerim Efenim...';
}
echo '<br>'.$datenow;





?>