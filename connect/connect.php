<?php
	// Подключение к localhost
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'im');


	// Подключение к базе данных сайта
	// define('HOST', 'sql103.ezyro.com');
	// define('USER', 'ezyro_30362188');
	// define('PASSWORD', 'q1q2q3');
	// define('DATABASE', 'ezyro_30362188_passwordavnanswers');
	/*
		* Подключаемся к базе данных с помощью функции mysqli_connect()
	*/
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	/*
		* Делаем проверку соединения
		* Если есть ошибки, останавливаем код и выводим сообщение с ошибкой
	*/
	if (!$connect) {
		include "errorconnect.php";
		exit();
	}
	mysqli_set_charset($connect, "utf8");
	header('Content-Type: text/html; charset=utf-8');
?>