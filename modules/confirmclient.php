<?php
require_once('inc/is_correct_chain_addr.function.php');
require_once('inc/generate_chain_addr.function.php');
require_once('inc/get_chain_balance.function.php');

$uid = $_REQUEST['uid'];

if(preg_match("/^[a-zA-Z0-9]{40}$/", $uid)) {
	$query = "SELECT chain_type, chain_addr, confirm_addr, confirm_addr_priv_key, confirm_addr_pub_key, confirm_addr_wif FROM guests WHERE uid='$uid'";
	$res = mysqli_query($db, $query);
	if(mysqli_num_rows($res) > 0) {
		$row = mysqli_fetch_assoc($res);
		$confirm_ballance = get_chain_balance($row['confirm_addr'], $row['chain_type'], false);
		if($confirm_ballance > 0) {
			if($zbr = generate_chain_addr('ETH')){
				$account_key = sha1(md5($zbr->address).md5(mt_rand()));
				$chain_balance = get_chain_balance($row['chain_addr'], $row['chain_type']);
				$query = "INSERT INTO users (`key`, `zbr_addr`, `zbr_addr_pub_key`, `zbr_addr_priv_key`, `zbr_balance`, `chain_type`, `chain_addr`, `chain_balance`) VALUES ('".$account_key."', '".$zbr->address."', '".$zbr->public."', '".$zbr->private."', '0.0000', '".$row['chain_type']."', '".$row['chain_addr']."', '".$chain_balance."')";
				$query2 = "DELETE FROM guests WHERE chain_addr='".$row['chain_addr']."'";
				if(mysqli_query($db, $query) && mysqli_query($db, $query2)) {
					$data['success'] = true;
					$data['account'] = $zbr->address;
					$data['account_key'] = $account_key;
				} else {
					$data['error'] = "sql error: ".mysqli_error($db);
				}
			} else {
				$data['error'] = "can't generate zbr addr";
			}
		} else {
			$data['error'] = "unconfirmed soon";
		}
	} else {
		$data['error'] = "uid not found";
	}
} else {
	$data['error'] = "incorrect uid";
}

print(json_encode($data));