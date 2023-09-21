<?php
require $_SERVER['DOCUMENT_ROOT'] . "/connect/socrat.php";
class Category {
	public function getCategories($connect) {
		$query = "SELECT * FROM `product-categories`";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "No posts found"
			];
		} else {
			$postsList = [];
			while ($post = mysqli_fetch_assoc($postsResult)) {
				$postsList[] = $post;
			}
			$res = $postsList;
		}


		echo json_encode($res);
	}
	public function getArrayCategories($connect) {
		$query = "SELECT * FROM `product-categories`";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "No posts found"
			];
		} else {
			$arr_cat = array();
			while ($row = mysqli_fetch_assoc($postsResult)) {
				$arr_cat[$row['id']] = $row;
			}
			$treeCategory = array();
			foreach ($arr_cat as $id =>& $node) {
				if (!isset($node['name'])) {
					continue;
				}
				if (!$node['parent']) {
					$treeCategory[$id] =& $node;
				} else {
					$arr_cat[$node['parent']]['childs'][$id] =& $node;
				}
			}
			$res = $treeCategory;
		}
		echo json_encode($res);
	}
	public function getCategory($connect, $id) {
		$query = "SELECT * FROM `product-categories` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			$result = mysqli_fetch_assoc($postsResult);
			$res = $result;
		}

		// Возвращаем результат в виде значения
		echo json_encode($res);
	}
	public function сreateCategory($connect, $data) {
		$name = $data['name'];
		$parent = $data['parent'];

		// Подготовленный запрос для добавления записи
		$query = "INSERT INTO `product-categories` (`name`, `parent`) VALUES (?, ?)";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'si', $name, $parent);
		mysqli_stmt_execute($stmt);

		if (mysqli_stmt_affected_rows($stmt) > 0) {
			http_response_code(201);
			$postId = mysqli_insert_id($connect);
			$res = [
				"status" => true,
				"message" => "Post is created",
				"post_id" => $postId
			];
		} else {
			http_response_code(500);
			$res = [
				"status" => false,
				"message" => "Failed to add post"
			];
		}

		// Возвращаем результат добавления в виде значения
		echo json_encode($res);
	}
	public function updateCategory($connect, $id, $data) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-categories` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			$name = $data['name'];
			$parent = $data['parent'];

			// Подготовленный запрос для обновления записи
			$updateQuery = "UPDATE `product-categories` SET `name` = ?, `parent` = ? WHERE `id` = ?";
			$updateStmt = mysqli_prepare($connect, $updateQuery);
			mysqli_stmt_bind_param($updateStmt, 'ssi', $name, $parent, $id);
			mysqli_stmt_execute($updateStmt);

			if (mysqli_stmt_affected_rows($updateStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is updated"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to update post"
				];
			}
		}

		// Возвращаем результат обновления в виде значения
		echo json_encode($res);
	}
	public function deleteCategory($connect, $id) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-categories` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			// Подготовленный запрос для удаления записи
			$deleteQuery = "DELETE FROM `product-categories` WHERE `id` = ?";
			$deleteStmt = mysqli_prepare($connect, $deleteQuery);
			mysqli_stmt_bind_param($deleteStmt, 'i', $id);
			mysqli_stmt_execute($deleteStmt);

			if (mysqli_stmt_affected_rows($deleteStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is deleted"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to delete post"
				];
			}
		}

		// Возвращаем результат удаления в виде значения
		echo json_encode($res);
	}
}
$category = new Category();



class SearchHint {
	public function getSearchHints($connect) {
		$query = "SELECT * FROM `product-searchhint` ORDER BY `product-searchhint`.`id` ASC LIMIT 5";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "No posts found"
			];
		} else {
			$postsList = [];
			while ($post = mysqli_fetch_assoc($postsResult)) {
				$postsList[] = $post;
			}
			$res = $postsList;
		}

		echo json_encode($res);
	}
	public function getSearchHint($connect, $id) {
		$query = "SELECT * FROM `product-searchhint` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			$result = mysqli_fetch_assoc($postsResult);
			$res = $result;
		}

		// Возвращаем результат в виде значения
		echo json_encode($res);
	}
	public function сreateSearchHint($connect, $data) {
		$title = $data['title'];

		// Подготовленный запрос для добавления записи
		$query = "INSERT INTO `product-searchhint` (`title`) VALUES (?)";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 's', $title);
		mysqli_stmt_execute($stmt);

		if (mysqli_stmt_affected_rows($stmt) > 0) {
			http_response_code(201);
			$postId = mysqli_insert_id($connect);
			$res = [
				"status" => true,
				"message" => "Post is created",
				"post_id" => $postId
			];
		} else {
			http_response_code(500);
			$res = [
				"status" => false,
				"message" => "Failed to add post"
			];
		}

		// Возвращаем результат добавления в виде значения
		echo json_encode($res);
	}
	public function updateSearchHint($connect, $id, $data) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-searchhint` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			$name = $data['name'];

			// Подготовленный запрос для обновления записи
			$updateQuery = "UPDATE `product-searchhint` SET `name` = ? WHERE `id` = ?";
			$updateStmt = mysqli_prepare($connect, $updateQuery);
			mysqli_stmt_bind_param($updateStmt, 'si', $name, $id);
			mysqli_stmt_execute($updateStmt);

			if (mysqli_stmt_affected_rows($updateStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is updated"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to update post"
				];
			}
		}

		// Возвращаем результат обновления в виде значения
		echo json_encode($res);
	}
	public function deleteSearchHint($connect, $id) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-searchhint` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			// Подготовленный запрос для удаления записи
			$deleteQuery = "DELETE FROM `product-searchhint` WHERE `id` = ?";
			$deleteStmt = mysqli_prepare($connect, $deleteQuery);
			mysqli_stmt_bind_param($deleteStmt, 'i', $id);
			mysqli_stmt_execute($deleteStmt);

			if (mysqli_stmt_affected_rows($deleteStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is deleted"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to delete post"
				];
			}
		}

		// Возвращаем результат удаления в виде значения
		echo json_encode($res);
	}
}
$searchHint = new SearchHint();


class Products {
	public function getProducts($connect, $page, $col) {
		$query = "SELECT * FROM `product-info` WHERE `status` = 'active' LIMIT $page,$col";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			$res = [
				"status" => false,
				"message" => "No posts found"
			];
		} else {
			function get_cat() {
				global $connect;
				$query = "SELECT * FROM `product-categories`";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_execute($stmt);
				$postsResult = mysqli_stmt_get_result($stmt);
				$arr_cat = array();
				while ($row = mysqli_fetch_assoc($postsResult)) {
					$arr_cat[$row['id']] = $row;
				}
				return $arr_cat;
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
			function get_product_rating($productId) {
				global $connect;
				$query = "SELECT * FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$col = mysqli_num_rows($getResult);
				if ($col > 0) {
					for ($i=0; $i < $col; $i++) {
						$getRating[] = mysqli_fetch_assoc($getResult)["rating"];
					}
					$res = array_sum($getRating) / $col;
					$result = number_format($res, 1);
				} else {
					$result = 0;
				}
				return $result;
			}
			function get_product_image($productId) {
				global $connect;
				$query = "SELECT `id`,`src-average` FROM `product-media` WHERE `product-id` = ? AND `type` = 'image'";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$result = array();
				foreach ($getResult as $key) {
					$result[] = $key['src-average'];
				}
				return $result;
			}
			function get_product_media_length($productId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-media` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_product_image_length($productId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-media` WHERE `product-id` = ? AND `type` = 'image'";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_product_comments_length($commentId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $commentId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			$postsList = array();
			while ($post = mysqli_fetch_assoc($postsResult)) {
				$newArray = array();
				foreach ($post as $key => $value) {
					$newArray[$key] = $value;
					if ($key === "category") {
						$newArray['category'] = getCreadcrumbs(get_cat(), $post['category']);
						$newArray['categoryId'] = $post['category'];
					}
					if ($key === "priceNow") {

						$newArray["mediaLength"] = get_product_media_length($post['id']);
						$newArray["imageLength"] = get_product_image_length($post['id']);
						$image = get_product_image($post['id']);
						if (count($image) === 0) {
							$image = get_product_image(0);
						}
						$newArray["image"] = $image;
						$newArray["rating"] = get_product_rating($post['id']);
						$newArray["commentsLength"] = getbrosocrat(get_product_comments_length($post['id']));
					}
				}

				$postsList[] = $newArray;
			}
			$res = $postsList;
		}

		echo json_encode($res);
	}
	public function getProductsLength($connect) {
		$query = "SELECT COUNT(`id`) AS 'length' FROM `product-info` WHERE `status` = 'active'";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found",
				"length" => mysqli_fetch_assoc($postsResult)['length']
			];
		}else {
			$res = mysqli_fetch_assoc($postsResult)['length'];
		}
		echo json_encode($res);
	}
	public function getProductsRec($connect) {
		$query = "SELECT * FROM `product-info` WHERE `status` = 'active' AND `rec` = 'yes'";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		}else {
			function get_cat() {
				global $connect;
				$query = "SELECT * FROM `product-categories`";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_execute($stmt);
				$postsResult = mysqli_stmt_get_result($stmt);
				$arr_cat = array();
				while ($row = mysqli_fetch_assoc($postsResult)) {
					$arr_cat[$row['id']] = $row;
				}
				return $arr_cat;
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
			function get_product_rating($productId) {
				global $connect;
				$query = "SELECT * FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$col = mysqli_num_rows($getResult);
				if ($col > 0) {
					for ($i=0; $i < $col; $i++) {
						$getRating[] = mysqli_fetch_assoc($getResult)["rating"];
					}
					$res = array_sum($getRating) / $col;
					$result = number_format($res, 1);
				} else {
					$result = 0;
				}
				return $result;
			}
			function get_product_image($productId) {
				global $connect;
				$query = "SELECT `id`,`src-average` FROM `product-media` WHERE `product-id` = ? AND `type` = 'image'";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$result = array();
				foreach ($getResult as $key) {
					$result[] = $key['src-average'];
				}
				return $result;
			}
			function get_product_media_length($productId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-media` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_product_image_length($productId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-media` WHERE `product-id` = ? AND `type` = 'image'";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_product_comments_length($commentId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $commentId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			$postsList = array();
			while ($post = mysqli_fetch_assoc($postsResult)) {
				$newArray = array();
				foreach ($post as $key => $value) {
					$newArray[$key] = $value;
					if ($key === "category") {
						$newArray['category'] = getCreadcrumbs(get_cat(), $post['category']);
						$newArray['categoryId'] = $post['category'];
					}
					if ($key === "priceNow") {

						$newArray["mediaLength"] = get_product_media_length($post['id']);
						$newArray["imageLength"] = get_product_image_length($post['id']);
						$image = get_product_image($post['id']);
						if (count($image) === 0) {
							$image = get_product_image(0);
						}
						$newArray["image"] = $image;
						$newArray["rating"] = get_product_rating($post['id']);
						$newArray["commentsLength"] = getbrosocrat(get_product_comments_length($post['id']));
					}
				}

				$postsList[] = $newArray;
			}
			$res = $postsList;
		}

		echo json_encode($res);
	}
	public function getProduct($connect, $id) {
		$query = "SELECT * FROM `product-info` WHERE `status` = 'active' AND `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postsResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postsResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			function get_cat() {
				global $connect;
				$query = "SELECT * FROM `product-categories`";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_execute($stmt);
				$postsResult = mysqli_stmt_get_result($stmt);
				$arr_cat = array();
				while ($row = mysqli_fetch_assoc($postsResult)) {
					$arr_cat[$row['id']] = $row;
				}
				return $arr_cat;
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
			function get_product_description($productId) {
				global $connect;
				$query = "SELECT * FROM `product-description` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$col = mysqli_num_rows($getResult);
				$getResult = mysqli_fetch_assoc($getResult);
				if ($col > 0) {
					return $getResult['description'];
				} else {
					return false;
				}
			}
			function get_product_rating($productId) {
				global $connect;
				$query = "SELECT * FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$col = mysqli_num_rows($getResult);
				if ($col > 0) {
					for ($i=0; $i < $col; $i++) {
						$getRating[] = mysqli_fetch_assoc($getResult)["rating"];
					}
					$res = array_sum($getRating) / $col;
					$result = number_format($res, 1);
				} else {
					$result = 0;
				}
				return $result;
			}
			function get_product_image($productId) {
				global $connect;
				$query = "SELECT `id`,`src-average` FROM `product-media` WHERE `product-id` = ? AND `type` = 'image'";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$result = array();
				foreach ($getResult as $key) {
					$result[] .= $key['src-average'];
				}
				return $result;
			}
			function get_product_media($productId) {
				global $connect;
				$query = "SELECT * FROM `product-media` WHERE `product-id` = ? AND `status` = 'active' ORDER BY `type` DESC, `number` ASC";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$result = array();
				while ($row = mysqli_fetch_assoc($getResult)) {
					$mediaItem = array();
					$mediaItem['type'] = $row['type'];
					if ($row['type'] == 'video') {
						$mediaItem['srcVideo'] = $row['src-video'];
						$mediaItem['srcPreview'] = $row['src-max'];
					} else {
						$mediaItem['srcMax'] = $row['src-max'];
						$mediaItem['srcMin'] = $row['src-min'];
					}
					$result[] = $mediaItem;
				}
				return $result;
			}
			function get_product_media_length($productId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-media` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_product_comments_length($commentId) {
				global $connect;
				$query = "SELECT COUNT(`id`) AS `length` FROM `product-comentary` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $commentId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$getResult = mysqli_fetch_assoc($getResult);
				return $getResult['length'];
			}
			function get_meta($productId) {
				global $connect;
				$query = "SELECT * FROM `product-meta` WHERE `product-id` = ?";
				$stmt = mysqli_prepare($connect, $query);
				mysqli_stmt_bind_param($stmt, 'i', $productId);
				mysqli_stmt_execute($stmt);
				$getResult = mysqli_stmt_get_result($stmt);
				$col = mysqli_num_rows($getResult);
				if (!isset($col) && !$col > 0) {
					return false;
				}
				$arr_cat = array();
				while ($row = mysqli_fetch_assoc($getResult)) {
					$arr_cat[] = $row['meta'];
				}
				return $arr_cat;
			}
			$result = mysqli_fetch_assoc($postsResult);
			$result['category'] = getCreadcrumbs(get_cat(), $result['category']);
			$newArray = array();
			foreach ($result as $key => $value) {
				$newArray[$key] = $value;
				if ($key === "priceNow") {
					$newArray["mediaLength"] = get_product_media_length($poresultst['id']);
					$media = get_product_media($result['id']);
					if (count($media) === 0) {
						$media = get_product_image(0);
					}
					$newArray["media"] = $media;
					$newArray["rating"] = get_product_rating($result['id']);
					$newArray["commentsLength"] = getbrosocrat(get_product_comments_length($result['id']));
					$newArray["description"] = get_product_description($result['id']);
					$newArray["meta"] = get_meta($result['id']);
				}
			}
			$res = $newArray;
		}

		// Возвращаем результат в виде значения
		echo json_encode($res);
	}
	public function сreateProduct($connect, $data) {
		$title = $data['title'];
		$category = $data['category'];
		$priceOld = $data['priceOld'];
		$priceNow = $data['priceNow'];
		$discount = $data['discount'];
		$hit = $data['hit'];
		$rec = $data['rec'];
		$status = $data['status'];

		// Подготовленный запрос для добавления записи
		$query = "INSERT INTO `product-info` (`title`, `category`, `priceOld`, `priceNow`, `discount`, `hit`, `rec`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'siiissss', $title, $category, $priceOld, $priceNow, $discount, $hit, $rec, $status);
		mysqli_stmt_execute($stmt);

		if (mysqli_stmt_affected_rows($stmt) > 0) {
			http_response_code(201);
			$postId = mysqli_insert_id($connect);
			$res = [
				"status" => true,
				"message" => "Post is created",
				"post_id" => $postId
			];
		} else {
			http_response_code(500);
			$res = [
				"status" => false,
				"message" => "Failed to add post"
			];
		}

		// Возвращаем результат добавления в виде значения
		echo json_encode($res);
	}
	public function updateProduct($connect, $id, $data) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-info` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			$title = $data['title'];
			$category = $data['category'];
			$priceOld = $data['priceOld'];
			$priceNow = $data['priceNow'];
			$discount = $data['discount'];
			$hit = $data['hit'];
			$rec = $data['rec'];
			$status = $data['status'];

			// Подготовленный запрос для обновления записи
			$updateQuery = "INSERT INTO `product-info` (`title`, `category`, `priceOld`, `priceNow`, `discount`, `hit`, `rec`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$updateStmt = mysqli_prepare($connect, $updateQuery);
			mysqli_stmt_bind_param($updateStmt, 'siiissss', $title, $category, $priceOld, $priceNow, $discount, $hit, $rec, $status);
			mysqli_stmt_execute($updateStmt);
			if (mysqli_stmt_affected_rows($updateStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is updated"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to update post"
				];
			}
		}

		// Возвращаем результат обновления в виде значения
		echo json_encode($res);
	}
	public function deleteProduct($connect, $id) {
		// Подготовленный запрос для выборки записи
		$query = "SELECT * FROM `product-info` WHERE `id` = ?";
		$stmt = mysqli_prepare($connect, $query);
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		$postResult = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($postResult) === 0) {
			http_response_code(404);
			$res = [
				"status" => false,
				"message" => "Post not found"
			];
		} else {
			// Подготовленный запрос для удаления записи
			$deleteQuery = "DELETE FROM `product-info` WHERE `id` = ?";
			$deleteStmt = mysqli_prepare($connect, $deleteQuery);
			mysqli_stmt_bind_param($deleteStmt, 'i', $id);
			mysqli_stmt_execute($deleteStmt);

			if (mysqli_stmt_affected_rows($deleteStmt) > 0) {
				http_response_code(200);
				$res = [
					"status" => true,
					"message" => "Post is deleted"
				];
			} else {
				http_response_code(500);
				$res = [
					"status" => false,
					"message" => "Failed to delete post"
				];
			}
		}

		// Возвращаем результат удаления в виде значения
		echo json_encode($res);
	}
}
$product = new Products();

?>