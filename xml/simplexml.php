<?php
$sxml = simplexml_load_file("catalog.xml");
?>	
<html>
	<head>
		<title>Каталог</title>
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="1" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
<?php

for($i = 0 ;$i < count($sxml); $i++){
    echo "<tr>";
    echo "<td>" . $sxml->book[$i]->author . "</td>";
    echo "<td>" . $sxml->book[$i]->title . "</td>";
    echo "<td>" . $sxml->book[$i]->pubyear. "</td>";
    echo "<td>" . $sxml->book[$i]->price . "</td>";
    echo "</tr>";
}
?>
	</table>
</body>
</html>