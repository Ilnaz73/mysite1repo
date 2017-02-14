<?php
$tDate = mktime(0, 0, 0, 1, 12, 2016);
echo $tDate, "<br>";
$myDate = getDate();
echo "<pre>";
print_r($myDate);
echo "</pre>";
echo date($tDate);

$t = daysToBirthday(mktime(0, 0, 0, 2, 4, 2017));
echo $t, "<br>";
echo date();


function daysToBirthday($birthday){
  $now = mktime(getDate());
  $timeToBirthday = $birthday - $now;
  return $timeToBirthday;
}
?>
