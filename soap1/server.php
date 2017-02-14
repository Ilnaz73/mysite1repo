<?php
    class StockService {
		// Описание метода Web-сервиса
		function getStock($id) {	
			$stock = array(
				"1" => 100,
				"2" => 200,
				"3" => 300,
				"4" => 400,
				"5" => 500
			);
			if (isset($stock[$id])) {
				$quantity = $stock[$id];		
				return $quantity;
			} else {
				throw new SoapFault("Server", "Несуществующий id товара");
			}	
		}
    }
	//$a = new StockService();
	//echo $a->getStock("2");
	// Отключение кэширования WSDL-документа
	ini_set("soap.wsdl_cache_enabled", "0");
	
	// Создание SOAP-сервер
	$server = new SoapServer("http://mysite/soap1/stock.wsdl");
	
	// Добавить класс к серверу
	$server->setClass("StockService");
	
	// Запуск сервера
	$server->handle();
?>