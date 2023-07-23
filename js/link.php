<script src="/js/lazyload.min.js?<?php echo md5(time())?>"></script>
<?php

	$fileJs = '/js/';

	$nameFiles = [
		'libs',
		'categories',
		'search',
		'api'
	];

	foreach ($nameFiles as $nameFile) {

		$url = $fileJs . $nameFile . '/';
		$urlScandir = $_SERVER['DOCUMENT_ROOT'] . $fileJs . $nameFile . '/';

		$files = scandir($urlScandir);

		for ($i=0; $i < count($files); $i++) {

			if ($files[$i] == "." || $files[$i] == "..") {
				continue;
			}

			$file  = '<script src="'. $url . trim($files[$i]) . '?' . md5(time()) . '"></script>';
			print($file);
		}
	}

?>
<script src="/js/script.js?<?php echo md5(time())?>"></script>
<script src="/js/mycode.js?<?php echo md5(time())?>"></script>