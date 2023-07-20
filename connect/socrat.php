<?php
	function getbrosocrat($num) {
		if (!is_numeric($num)) {
			return false;
		}
		if ($num >= 1e3 and $num < 1e6) {
			if ($num < 11e2) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e2 and $num < 1e4) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e4 and $num < 1e5) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'k';
		} else if ($num >= 1e6 and $num < 1e9) {
			if ($num < 11e5) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e5 and $num < 1e7) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e7 and $num < 1e8) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'M';
		} else if ($num >= 1e9 and $num < 1e12) {
			if ($num < 11e8) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e8 and $num < 1e10) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e10 and $num < 1e11) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'B';
		} else if ($num >= 1e12 and $num < 1e15) {
			if ($num < 11e11) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e11 and $num < 1e13) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e13 and $num < 1e14) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Триллион';
		} else if ($num >= 1e15 and $num < 1e18) {
			if ($num < 11e14) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e14 and $num < 1e16) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e16 and $num < 1e17) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Квадриллион';
		} else if ($num >= 1e18 and $num < 1e21) {
			if ($num < 11e17) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e17 and $num < 1e19) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e19 and $num < 1e20) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Квинтиллион';
		} else if ($num >= 1e21 and $num < 1e24) {
			if ($num < 11e20) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e20 and $num < 1e22) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e22 and $num < 1e23) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Секстиллион';
		} else if ($num >= 1e24 and $num < 1e27) {
			if ($num < 11e23) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e23 and $num < 1e25) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e25 and $num < 1e26) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Септиллион';
		} else if ($num >= 1e27 and $num < 1e30) {
			if ($num < 11e26) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e26 and $num < 1e28) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e28 and $num < 1e29) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Октиллион';
		} else if ($num >= 1e30 and $num < 1e33) {
			if ($num < 11e29) {
				$ddd = substr($num, 0, 1);
			} else if ($num >= 11e29 and $num < 1e31) {
				$ddd1 = substr($num, 0, 1);
				$ddd2 = substr($num, 1, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else if ($num >= 1e31 and $num < 1e32) {
				$ddd1 = substr($num, 0, 2);
				$ddd2 = substr($num, 2, 1);
				$ddd = $ddd1 . "," . $ddd2;
			} else {
				$ddd1 = substr($num, 0, 3);
				$ddd2 = substr($num, 3, 1);
				$ddd = $ddd1 . "," . $ddd2;
			}
			return $ddd . 'Нониллион';
		} else {
			return $num;
		}
	}
	function number_format_short( $precision = 1 ) {
		if ($precision < 1000) {
			// 0 - 900
			$n_format = $n;
			$suffix = '';
		} else if ($precision < 900000) {
			// 0.9k-850k
			$n_format = number_format($precision / 1000, $precision, ',', '');
			$suffix = 'Тысячи';
		} else if ($precision < 900000000) {
			// 0.9m-850m
			$n_format = number_format($precision / 1000000, $precision, ',', '');
			$suffix = 'Миллион';
		} else if ($precision < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($precision / 1000000000, $precision, ',', '');
			$suffix = 'Миллиард';
		} else {
			// 0.9t+
			$n_format = number_format($precision / 1000000000000, $precision, ',', '');
			$suffix = 'Триллион';
		}
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
		return $n_format . $suffix;
	}
?>