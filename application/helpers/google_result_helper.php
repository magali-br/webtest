<?php

	$query=$argv[1];

	//$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=$query";
	// $url = "http://localhost/~magali/webtest/index.php/welcome/googletest/ß$query";

	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, $url);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $body = curl_exec($ch);
	// curl_close($ch);

	// $json = json_decode($body);

	// print $json->responseData->cursor->estimatedResultCount;

	$params = array('q' => $query);
	$content = file_get_contents('http://www.google.com/search?' . http_build_query($params));
	preg_match('/About (.*) results/i', $content, $matches);
	echo !empty($matches[1]) ? $matches[1] : 0;

?>