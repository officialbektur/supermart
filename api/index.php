<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/connect/connect.php';
	require_once 'function.php';

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: *, Authorization');
	header('Access-Control-Allow-Methods: *');
	header('Access-Control-Allow-Credentials: ture');
	header('Content-type: json/application');

	$q = $_GET['q'];
	$params = explode('/', $q);

	$paramList = array();
	foreach ($params as $param) {
		if (isset($param)) {
			$paramList[] = $param;
		}
	}
	$type = $paramList[0];
	$table = $paramList[1];
	$id = false;
	$rec = false;
	$page = false;
	$col = false;
	$length = false;
	if (isset($paramList[2])) {
		if (is_numeric($paramList[2])) {
			$id = $paramList[2];
		} else if ($paramList[2] == 'rec') {
			$rec = $paramList[2];
		} else if ($paramList[2] == 'page' && $paramList[4] == 'col') {
			$page = $paramList[3];
			$col = $paramList[5];
		} else if ($paramList[2] == 'length') {
			$length = $paramList[2];
		}
	}

	$crudMethods = array(
		'GET' => 'GET',
		'POST' => 'POST',
		'CREATE' => 'CREATE',
		'UPDATE' => 'UPDATE',
		'DELETE' => 'DELETE'
	);

	$tableLists = array(
		'category' => 'category',
		'categories' => 'categories',
		'searchhint' => 'searchhint',
		'products' => 'products'
	);

	function getRСS($str1, $str2) {
		// getResultСomparisonStrong
		if (strcasecmp($str1, $str2) === 0) {
			return true;
		} else {
			return false;
		}
	}

	$method = $_SERVER['REQUEST_METHOD'];

	if (isset($type)) {
		if (getRСS($type, $crudMethods['GET']) && getRСS($method, $crudMethods['GET'])) {
			if (getRСS($table, $tableLists['category'])) {
				if ($id) {
					if (is_numeric($id)) {
						$id = (int)($id);
						$category->getCategory($connect, $id);
					}
				} else {
					$category->getCategories($connect);
				}
			} else if (getRСS($table, $tableLists['categories'])) {
				$category->getArrayCategories($connect);
			} else if (getRСS($table, $tableLists['searchhint'])) {
				if ($id) {
					if (is_numeric($id)) {
						$id = (int)($id);
						$searchHint->getSearchHint($connect, $id);
					}
				} else {
					$searchHint->getSearchHints($connect);
				}
			} else if (getRСS($table, $tableLists['products'])) {
				if ($id) {
					if (is_numeric($id)) {
						$id = (int)($id);
						$product->getProduct($connect, $id);
					}
				} else if ($rec && $rec == 'rec') {
						$product->getProductsRec($connect);
				} else if (is_numeric($page) && is_numeric($col)) {
					$product->getProducts($connect, $page, $col);
				} else if ($length) {
					$product->getProductsLength($connect);
				}
			}
		} else if (getRСS($type, $crudMethods['CREATE']) && getRСS($method, $crudMethods['POST'])) {
			if (getRСS($table, $tableLists['category'])) {
				$category->сreateCategory($connect, $_POST);
			} elseif (getRСS($table, $tableLists['searchhint'])) {
				$searchHint->сreateSearchHint($connect, $_POST);
			} elseif (getRСS($table, $tableLists['products'])) {
				$product->сreateProduct($connect, $_POST);
			}
		} else if (getRСS($type, $crudMethods['UPDATE']) && getRСS($method, $crudMethods['POST'])) {
			if (isset($id)) {
				if (is_numeric($id)) {
					$id = (int)($id);
					if (getRСS($table, $tableLists['category'])) {
						$category->updateCategory($connect, $id, $_POST);
					} elseif (getRСS($table, $tableLists['searchhint'])) {
						$searchHint->updateSearchHint($connect, $id, $_POST);
					} elseif (getRСS($table, $tableLists['products'])) {
						$product->updateProduct($connect, $id, $_POST);
					}
				}
			}
		} else if (getRСS($type, $crudMethods['DELETE']) && getRСS($method, $crudMethods['DELETE'])) {
			if (isset($id)) {
				if (is_numeric($id)) {
					$id = (int)($id);
					if (getRСS($table, $tableLists['category'])) {
						$category->deleteCategory($connect, $id);
					} elseif (getRСS($table, $tableLists['searchhint'])) {
						$searchHint->deleteSearchHint($connect, $id);
					} elseif (getRСS($table, $tableLists['products'])) {
						$product->deleteProduct($connect, $id);
					}
				}
			}
		}
	}
	mysqli_close($connect);
?>