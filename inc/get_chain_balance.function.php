<?php
function get_chain_balance($account, $platform, $round=true) {

	$curl_options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_ENCODING       => "",
		CURLOPT_USERAGENT      => "",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_SSL_VERIFYPEER => false
	);

	if($platform == 'ETH') {
		
		$api = "https://api.blockcypher.com/v1/eth/main/addrs/$account/balance";

		$ch = curl_init($api);
		curl_setopt_array( $ch, $curl_options );

		$request = curl_exec($ch);
		$response = json_decode($request);
		
		if($round) {
			$res = round($response->balance/1000000000000000000, 4);
		} else {
			$res = $response->balance;
		}
		
	} elseif ($platform == 'BTC') {
		
		$api = "https://api.blockcypher.com/v1/btc/main/addrs/$account/balance";
		
		$ch = curl_init($api);
		curl_setopt_array($ch, $curl_options);
		
		$request = curl_exec($ch);
		$response = json_decode($request);
		
		if($round) {
			$res = round($response->balance/100000000, 4);
		} else {
			$res = $response->balance;
		}
		
	} else $res = false;
	
	return $res;
	
}