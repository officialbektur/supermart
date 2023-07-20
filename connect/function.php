<?php
	require "connect.php";
	/*
		*Распечатка массива
	*/
	function print_arr($array) {
		echo "<pre>" . print_r($array, true) . "</pre>";
	}
	function get_allProducts() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-info`");
		return $allProducts;
	}
	function get_product_images($imagesId) {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-media` WHERE `product-id` = '$imagesId'");
		return $allProducts;
	}
	function get_product_images_limit($imagesId) {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-media` WHERE `product-id` = '$imagesId' ORDER BY `product-id` LIMIT 4");
		return $allProducts;
	}
	function get_product_media_lagth($imagesId) {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-media` WHERE `product-id` = '$imagesId'");
		$leanthd = mysqli_num_rows($allProducts);
		return $leanthd;
	}
	function get_product_images_lagth($imagesId) {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-media` WHERE `type` = 'image' AND `product-id` = '$imagesId'");
		$leanthd = mysqli_num_rows($allProducts);
		return $leanthd;
	}
	function get_product_tovar() {
		global $connect;
		$id = $_GET['id'];
		$idContent = $connect->query("SELECT * FROM `product-info` WHERE `id` = '$id'");
		return $idContent;
	}
	function get_product_comments($commentId) {
		global $connect;
		$allComments = $connect->query("SELECT * FROM `product-comentary` WHERE `product-id` = '$commentId' ORDER BY `product-comentary`.`date` DESC LIMIT 10");
		return $allComments;
	}
	function get_product_comments_lagth($commentId) {
		global $connect;
		$allComments = $connect->query("SELECT COUNT(`id`) AS 'length' FROM `product-comentary` WHERE `product-id` = '$commentId'");
		$allComment = mysqli_fetch_assoc($allComments);
		$allComment = $allComment['length'];
		return $allComment;
	}
	function get_product_rating($productId) {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-comentary` WHERE `product-id` = '$productId'");
		$col = mysqli_num_rows($allProducts);
		if ($col > 0) {
			for ($i=0; $i < $col; $i++) {
				$getRating[] = mysqli_fetch_assoc($allProducts)["rating"];
			}
			$res = array_sum($getRating) / $col;
			$result = number_format($res, 1);
		} else {
			$result = 0;
		}
		return $result;
	}
	function get_product_rec() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-info` WHERE `rec` = 'yes' ORDER BY `rec` LIMIT 10");
		return $allProducts;
	}
	function get_product_rec_lagth() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-info` WHERE `rec` = 'yes' ORDER BY `rec` LIMIT 10");
		$leanthd = mysqli_num_rows($allProducts);
		return $leanthd;
	}
	function get_product_norec() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-info` WHERE `rec` = 'no' ORDER BY `rec` LIMIT 10");
		return $allProducts;
	}
	function get_product_norec_lagth() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-info` WHERE `rec` = 'no' ORDER BY `rec` LIMIT 10");
		$leanthd = mysqli_num_rows($allProducts);
		return $leanthd;
	}
	function get_cat() {
		global $connect;
		$allCat = $connect->query("SELECT * FROM `product-categories`");
		$arr_cat = array();
		while ($row = mysqli_fetch_assoc($allCat)) {
			$arr_cat[$row['id']] = $row;
		}
		return $arr_cat;
	}
	function map_tree($dataset) {
		$tree = array();
		foreach ($dataset as $id =>& $node) {
			if (!isset($node['name'])) {
				continue;
			}
			if (!$node['parent']) {
				$tree[$id] =& $node;
			} else {
				$dataset[$node['parent']]['childs'][$id] =& $node;
			}
		}
		return $tree;
	}
	function categories_to_string($data) {
		foreach ($data as $item) {
			$string .= categories_to_template($item);
		}
		return $string;
	}
	function categories_filter__to_string($data) {
		foreach ($data as $item) {
			$string .= categories_filter_to_template($item);
		}
		return $string;
	}
	function categories_to_template($category) {
		ob_start();
		include "category_template.php";
		return ob_get_clean();
	}
	function categories_filter_to_template($category) {
		ob_start();
		include "category_filter_template.php";
		return ob_get_clean();
	}
	function getCreadcrumbs($array, $id) {
		if (!$id) {
			return false;
		}
		$count = count($array);
		$breadcrumbs_array = array();
		for($i = 0; $i < $count; $i++) {
			if (isset($array[$id])) {
				$breadcrumbs_array[$array[$id]["id"]] = $array[$id]["name"];
				$id = $array[$id]["parent"];
			} else break;
		}
		return array_reverse($breadcrumbs_array, true);
	}
	// для всех товаров
	function breadcrumbs($id) {
		if (!$id) {
			return false;
		}
		$breadcrumbs = '';
		$breadcrumbs_array = getCreadcrumbs(get_cat(), $id);
		foreach ($breadcrumbs_array as $title) {
			$breadcrumbs .= $title . "-";
		}
		$breadcrumbs = rtrim($breadcrumbs, "-");
		return $breadcrumbs;
	}
	// для одного товара
	function breadcrumb($id) {
		if (!$id) {
			return false;
		}
		$breadcrumbs = '';
		$breadcrumbs_array = getCreadcrumbs(get_cat(), $id);
		if (isset($breadcrumbs_array)) {
			foreach ($breadcrumbs_array as $id => $title) {
				$breadcrumbs .= "<a href='categories.php?category={$id}'>{$title}</a> / ";
			}
			$breadcrumbs = rtrim($breadcrumbs, ' / ');
			// $breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
		}
		return $breadcrumbs;
	}
	function cats_id($array, $id) {
		if (!$id) {
			return false;
		}
		$data = '';
		foreach ($array as $item) {
			if ($item["parent"] == $id) {
				$data .= $item["id"] . ",";
				$data .= cats_id($array, $item["id"]);
			}
		}
		return $data;
	}
	function get_product_cat($ids) {
		global $connect;
		if ($ids) {
			$allProducts = $connect->query("SELECT * FROM `product-info` WHERE `category` IN($ids)");
		}
		return $allProducts;
	}
	function descPrint($id) {
		if (!$id) {
			return false;
		}
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-description` WHERE `product-id` = '$id'");
		return mysqli_fetch_assoc($allProducts)["description"];
	}
	function productMetaInfo($id) {
		if (!$id) {
			return false;
		}
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-meta` WHERE `product-id` = '$id'");
		foreach ($allProducts as $meta) {
			$allProduct .= "<a href='meta.php?meta='>" . $meta["meta"] . "</a>, ";
		}
		$allProduct = rtrim($allProduct, ', ');
		return $allProduct;
	}
	function searchHint() {
		global $connect;
		$allProducts = $connect->query("SELECT * FROM `product-searchhint` ORDER BY `product-searchhint`.`id` ASC");
		return $allProducts;
	}
	function search() {
		global $connect;
		$searchInput = explode(" ", trim($_GET["searchInput"]));
		$count = count($searchInput);
		$array = array();
		$i = 0;
		$allProducts = '';
		foreach ($searchInput as $key) {
			$i++;
			if ($i < $count) {
				$array[] = "CONCAT (`title`, `price-old`, `price-now`) LIKE '%" . $key . "%' OR ";
			}else {
				$array[] = "CONCAT (`title`, `price-old`, `price-now`) LIKE '%" . $key . "%'";
			}
			$sql = "SELECT * FROM `product-info` WHERE ". implode("", $array);
			$allProducts = mysqli_query($connect, $sql);
		}
		return $allProducts;
	}
?>