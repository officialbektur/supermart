<?php

// получаем массив данных о загружаемых файлах
$images = $_FILES["images"];

// переменная для формирования читаемого массива с файлами
$normalizeImages = [];

// перебираем всех ключи name, tmp_name и т.д.
foreach ($images as $key_name => $value) {
    // перебираем все значения текущего ключа
    foreach ($value as $key => $item) {
        // упаковываем все в переменную @normalizeImages
        $normalizeImages[$key][$key_name] = $item;
    }
}
$index = 1;
foreach ($normalizeImages as $image) {

	if ($image["name"] == False) {
    	// в случае ошибки пропускаем итерацию
		continue;
	}
    // типы файлов, которые можно загружать
    $types = ["image/jpeg", "image/png", "image/webp", "video/mp4"];

    // ищем в массиве с типами тип текущего файла
    if (!in_array($image["type"], $types)) {
    	// в случае ошибки пропускаем итерацию
    	//die('Incorrect file type');
		continue;
	}

    // определяем размер файла в мегабайтах
    $fileSize = $image["size"] / 1000000;
    // максимальный размер файла в мегабайтах
    $maxSize = 3;

    // проверяем, чтобы размер файла не превышал ограничение
    if ($fileSize > $maxSize) {
        // в случае ошибки пропускаем итерацию
        // die('Incorrect file size');
		continue;
    }

    // создаем папку uploads в корне проекта, если её нет
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }
	$rand = rand(0, 1e6);
    // изнаем расширение текущего файла
    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    // формируем уникальное имя с помощью функции time()
    $fileName = "№" . $index . "---" . $rand . "---" . md5(time() . $image["name"] . $rand) . ".$extension";
    // загружаем файл и проверяем
    // если во премя загрузки файла произошла ошибка, возвращаем die()
    if (!move_uploaded_file($image["tmp_name"], "uploads/" . $fileName)) {
        // в случае ошибки пропускаем итерацию
        die('Error upload file');
    }
	$index++;
}