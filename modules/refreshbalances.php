<?php
require_once('inc/get_chain_balance.function.php');

$res = mysqli_query($db, 'SELECT id, chain_type, chain_addr, chain_balance FROM users');

while($row = mysqli_fetch_assoc($res)) {
	$prev_chain_balance = $row['chain_balance'];
	$cur_chain_balance = get_chain_balance($row['chain_addr'], $row['chain_type']);
	if($prev_chain_balance != $cur_chain_balance) {
		$query = "UPDATE users SET chain_balance=$cur_chain_balance, chain_balance_prev=$prev_chain_balance WHERE id=".$row['id'];
		mysqli_query($db, $query);
	}
}