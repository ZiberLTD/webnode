<?php
auth_check();

function call_contract_method($method, $params){
	global $config;
	
	$curl_options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_HTTPHEADER     => array("Content-type: application/json"),
		CURLOPT_ENCODING       => "",
		CURLOPT_USERAGENT      => "",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POST           => true,
		CURLOPT_POSTFIELDS     => json_encode($params)
	);
	
	$api = 'https://api.blockcypher.com/v1/eth/main/contracts/86a4c4c902245d01fc827fc4e04eccc6cf563477/'.$method.'?token='.$config['blockcypher_token'];

	$ch = curl_init($api);
	curl_setopt_array($ch, $curl_options);

	$request = curl_exec($ch);
	curl_close($ch);
	
	$response = json_decode($request);

	return $response;
}


$call = array(
	'private' => '5a4ce9f35943d24f39b9974a137a44e4e281e57b650d021e0b727a7605020567',
	'gas_limit' => 20000
);

dd(call_contract_method('greet', $call));

//

