<?php
	try {
		// Создание SOAP-клиента
		$client = new SoapClient("http://mysite/soap1/stock.wsdl");
		
		// Посылка SOAP-запроса c получением результат
		$result = $client->getStock("2");
		echo "Текущий запас на складе: ", $result;
	} catch (SoapFault $exception) {
		echo $exception->getMessage();	
	}
?>