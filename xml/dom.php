<?php
    $dom = new DOMDocument();
    $dom->load("catalog.xml");
    $root = $dom->documentElement;
    //echo $root->nodeType;
	/*
	ЗАДАНИЕ 1
	- Создайте объект DOM
	- Загрузите XML-документ в объект
	- Получите корневой элемент
	*/
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
$childrens = $root->childNodes;
foreach ($childrens as $book){   
    if($book->nodeType == 1){
        echo "<tr>";
        $booksch = $book->childNodes;
        foreach ($booksch as $bookchild){
            if($bookchild->nodeType == 1){
            echo "<td>";   
            echo $bookchild->textContent . "<br>";
            echo "</td>";
            }
        }
        echo "</tr>";
    }
    //echo $book->textContent;
}
	/*
	ЗАДАНИЕ 2
	- Заполните таблицу необходимыми данными
	*/
?>
	</table>
</body>
</html>





