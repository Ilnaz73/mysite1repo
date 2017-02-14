<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <?php
  $rows = 10;
  $cols = 10;
  echo "<table border='1' style='text-align: center;'>\n";
  for($row = 1; $row <= $rows; $row++){
    echo "\t<tr>\n";
    for($col = 1; $col <= $cols; $col++){
      echo "\t\t<td>";
      echo $row * $col;
      echo "</td>\n";
    }
    echo "\t</tr>\n";
  }
  echo "</table>\n";
  ?>
  </body>
</html>
