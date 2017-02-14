<?php
session_start();
$nChars = 5;
$randStr = "";
for($i=0; $i<$nChars; $i++){
   $randASCII = rand(65, 90); 
   $randStr .= chr($randASCII);
}
$_SESSION['randStr'] = $randStr;


$img = imageCreateFromJpeg("images/noise.jpg");
//imageAntiAlias($img, true);

$blue = imageColorAllocate($img, 0, 0, 255);
$x = 20;
$y = 30;
$deltaX = 40; 
for($i = 0; $i < $nChars; $i++){
    $angle = -30 + rand(10,60);
    $size = rand(18, 30);
    imageTtfText($img, $size, $angle, $x, $y, $blue, "fonts/bellb.ttf",$randStr{$i});
    $x += $deltaX;
}
header("Content-Type: image/jpeg");
imageJpeg($img);
	
	
?>
