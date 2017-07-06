<?php
auth_check();

$request = json_decode($_POST['request']);

if($request->cmd == 'get'){
	$limit = intval($request->limit);
	$offset = intval($request->offset);
	$sort = '';
	
	if(property_exists($request, 'sort')) {
		$sort_by = addslashes($request->sort[0]->field);
		if($request->sort[0]->direction == 'asc' || $request->sort[0]->direction == 'desc') {
			$direction = strtoupper($request->sort[0]->direction);
		} else {
			$direction = "ASC";
		}
		$sort = "ORDER BY $sort_by $direction";
	}
	
	$res = mysqli_query($db, "SELECT id as recid, zbr_addr, zbr_balance, chain_type, chain_addr, chain_balance, chain_balance_prev FROM users $sort LIMIT $offset, $limit");
	$data['records'] = array();
	while($row = mysqli_fetch_assoc($res)) {
		$data['records'][] = $row;
	}

	$res = mysqli_query($db, 'SELECT count(*) FROM users');
	$row_count = mysqli_fetch_array($res);
	$data['total'] = $row_count[0];
	$data['status'] = 'success';
	
	$response = json_encode($data);
	
	print($response);
}