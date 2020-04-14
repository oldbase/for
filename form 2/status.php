<?

include "config.php";

// функция, отвечающая за запросы к сайту и получению массива данных.
function post($url = null, $params = null, $proxy = null, $proxy_userpwd = null) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

	if(isset($params['params'])) {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params['params']);
	}

	if(isset($params['headers'])) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
	}

	if(isset($params['cookies'])) {
		curl_setopt($ch, CURLOPT_COOKIE, $params['cookies']);
	}

	if($proxy) {
		curl_setopt($ch, CURLOPT_PROXY, $proxy);

		if($proxy_userpwd) {
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_userpwd);
		}
	}

	$result = curl_exec($ch);
	$result_explode = explode("\r\n\r\n", $result);

	$headers = ((isset($result_explode[0])) ? $result_explode[0]."\r\n" : '').''.((isset($result_explode[1])) ? $result_explode[1] : '');
	$content = $result_explode[count($result_explode) - 1];

	preg_match_all('|Set-Cookie: (.*);|U', $headers, $parse_cookies);

	$cookies = implode(';', $parse_cookies[1]);

	curl_close($ch);

	return array('headers' => $headers, 'cookies' => $cookies, 'content' => $content);
}

if (isset($_REQUEST["PaRes"]) && isset($_REQUEST["MD"])){
	
	$requestData = json_decode(file_get_contents("temp/" . $_REQUEST["MD"]), true);
	//unlink("temp/" . $_REQUEST["MD"]);
	
	$payParams = [
		'initialOperationTicket' => $requestData['operationTicket'],
		'initialOperation' => $requestData['initialOperation'],
		'confirmationData' => [
			'3DSecure' => $_REQUEST["PaRes"]
		],
	];
	
	$payParams['confirmationData'] = json_encode($payParams['confirmationData'], true);
	
	$get_main_page = post('https://api.tinkoff.ru/v1/confirm?origin=web%2Cib5%2Cplatform&sessionid='.$_REQUEST['session_id'], [
		'params' => http_build_query($payParams)
	]);

	$output = json_decode($get_main_page['content'], true);

	if ($output['resultCode'] == 'OK') {
		if ($success_url) {
			header("Location: " . $success_url);
		}
		else {
			echo "Оплата прошла успешно!";
		}
	} else {
		if ($error_url) {
			header("Location: " . $error_url . "?error_mess=" . $output["plainMessage"]);
		}
		else {
			echo "При оплате произошла ошибка: " . $output["plainMessage"];
		}
	}
	
}

?>