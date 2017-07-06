<?php
require_once('inc/is_correct_chain_addr.function.php');


$account = $_REQUEST['account'];
$account_key = preg_replace("/[^a-zA-Z0-9]+/", "", $_REQUEST['account_key']);
$task_id = intval($_REQUEST['task_id']);

if(is_correct_chain_addr('0x'.$account, 'ETH')) {
	$query = "SELECT id FROM users WHERE `zbr_addr`='".$account."' AND `key`='".$account_key."'";
	$res = mysqli_query($db, $query);
	if(mysqli_num_rows($res) > 0) {
		$row = mysqli_fetch_assoc($res);
		$query2 = "UPDATE tasks SET status=1 WHERE user_id='".$row['id']."' AND id='".$task_id."'";
		if(mysqli_query($db, $query2)){
			$data['success'] = true;
		} else {
			$data['error'] = 'database error';
		}
	} else {
		$data['error'] = 'wrong account or account_key';
	}
} else {
	$data['error'] = 'incorrect account_addr';
}

print(json_encode($data));