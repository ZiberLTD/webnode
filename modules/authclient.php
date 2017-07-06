<?php
require_once('inc/is_correct_chain_addr.function.php');
require_once('inc/generate_chain_addr.function.php');

$chain_addr = $_REQUEST['chain_addr'];
$chain_type = $_REQUEST['chain_type'];

if(is_correct_chain_addr($chain_addr, $chain_type)){
	$query = "SELECT id FROM users WHERE chain_addr='".$chain_addr."'";
	$res = mysqli_query($db, $query);
	if(mysqli_num_rows($res) == 0) {
		if($confirm = generate_chain_addr($chain_type)) {
			$uid = sha1(md5($_REQUEST['chain_addr'].rand(10000,99999).date('Y-m-d H:i:s')));
			if($chain_type == 'BTC') {
				$wif = $confirm->wif;
				$addr_prefix = '';
			} else {
				$wif = '';
				$addr_prefix = '0x';
			}
			
			$query = "INSERT INTO guests (`uid`, `chain_addr`, `chain_type`, `confirm_addr`, `confirm_addr_priv_key`, `confirm_addr_pub_key`, `confirm_addr_wif`) VALUES ('$uid', '$chain_addr', '$chain_type', '".$confirm->address."', '".$confirm->private."', '".$confirm->public."', '".$wif."')";
			if(mysqli_query($db, $query)) {
				$data['success'] = true;
				$data['uid'] = $uid;
				$data['confirm_address'] = $addr_prefix.$confirm->address;
				$data['confirm_address_private_key'] = $confirm->private;
				$data['confirm_address_public_key'] = $confirm->public;
				if($chain_type == 'BTC') {
					$data['confirm_address_wif'] = $confirm->wif;
				}
			} else {
				$data['error'] = "db error: ".mysqli_error($db);
			}
		} else {
			$data['error'] = "can't generate $chain_type address";
		}
	} else {
		$data['error'] = "chain allready registred in system";
	}
} else {
	$data['error'] = "incorrect address or unknown chain type";
}

print(json_encode($data));