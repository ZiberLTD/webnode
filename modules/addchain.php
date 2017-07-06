<?php
auth_check();
require_once('inc/get_chain_balance.function.php');

if(isset($_POST['chain_type']) && isset($_POST['chain_addr'])) {
	$chain_type = preg_replace("/[^a-zA-Z0-9]+/", "", $_POST['chain_type']);
	$chain_addr = addslashes($_POST['chain_addr']);
	
	if($chain_type == 'BTC' || $chain_type == 'ETH') {
		if($chain_balance = get_chain_balance($chain_addr, $chain_type)){
			$zbr_addr = md5($chain_addr.rand(1000,9999));
			$zbr_balance = round($chain_balance/10, 4);
			$key = md5(date('d-m-Y h:i:s').rand(1000,9999));
			
			$query = "INSERT INTO users (`zbr_addr`, `zbr_balance`, `key`, `chain_type`, `chain_addr`, `chain_balance`) VALUES ('$zbr_addr', '$zbr_balance', '$key', '$chain_type', '$chain_addr', '$chain_balance')";
			if($res = mysqli_query($db, $query)) {
				$data['success'] = "The $chain_addr wallet with the balance <code>$chain_balance</code> was successfully added";
			} else {
				$data['error'] = "Failed to insert data into database <br>".mysqli_error($db);
			}
		} else {
			$data['error'] = "Failed to get a wallet bill";
		}
	}
}

load_tpl('add_chain', 'general');