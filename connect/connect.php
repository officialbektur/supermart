<?php
	// Подключение к localhost
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'im');


	// Подключение к базе данных сайта
	// define('HOST', 'sql212.ezyro.com');
	// define('USER', 'ezyro_33325041');
	// define('PASSWORD', 'q1q2q3');
	// define('DATABASE', 'ezyro_33325041_im');
	/*
		* Подключаемся к базе данных с помощью функции mysqli_connect()
	*/
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	/*
		* Делаем проверку соединения
		* Если есть ошибки, останавливаем код и выводим сообщение с ошибкой
	*/
	if (!$connect) {
		// include "errorconnect.php";
		exit();
	}
	mysqli_set_charset($connect, "utf8");
	header('Content-Type: text/html; charset=utf-8');
?>