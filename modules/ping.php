<?php
require_once('inc/is_correct_chain_addr.function.php');


$account = $_REQUEST['account'];
$account_key = preg_replace("/[^a-zA-Z0-9]+/", "", $_REQUEST['account_key']);

if(is_correct_chain_addr('0x'.$account, 'ETH')) {
	$query = "SELECT id FROM users WHERE `zbr_addr`='".$account."' AND `key`='".$account_key."'";
	$res = mysqli_query($db, $query);
	if(mysqli_num_rows($res) > 0) {
		$data['success'] = true;
		$row = mysqli_fetch_assoc($res);
		$query2 = "SELECT id, command FROM tasks WHERE user_id='".$row['id']."' AND status='0'";
		$res2 = mysqli_query($db, $query2);
		if(mysqli_num_rows($res2) > 0) {
			while($row2 = mysqli_fetch_assoc($res2)){
				$data['task'][] = array('task_id' => $row2['id'], 'command' => get_url('exec').$row2['command']);
			}
		} else {
			$data['tasks'] = false;
		}
	} else {
		$data['error'] = 'wrong account or account_key';
	}
} else {
	$data['error'] = 'incorrect account_addr';
}

print(json_encode($data));