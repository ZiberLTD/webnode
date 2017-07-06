<?php
function is_correct_chain_addr($addr, $coin) {
	if($coin == 'ETH') {
		$res = preg_match("/^[a-zA-Z0-9]{42}$/", $addr);
	} elseif ($coin == 'BTC') {
		$res = preg_match("/^[a-zA-Z0-9]{26,35}$/", $addr);
	} else $res = false;
	
	return $res;
}