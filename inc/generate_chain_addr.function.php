<?php
function generate_chain_addr($coin){
	global $config;
	
	$post = array(
		"token" => $config['blockcypher_token']
	);

	$curl_options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_ENCODING       => "",
		CURLOPT_USERAGENT      => "",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POST           => true,
		CURLOPT_POSTFIELDS     => http_build_query($post)
	);

	$api = 'https://api.blockcypher.com/v1/'.strtolower($coin).'/main/addrs?token='.$config['blockcypher_token'];

	$ch = curl_init($api);
	curl_setopt_array($ch, $curl_options);

	$request = curl_exec($ch);
	curl_close($ch);
	
	$response = json_decode($request);

	return $response;
}