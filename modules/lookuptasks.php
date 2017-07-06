<?php
auth_check();

$query = "SELECT T1.id, T1.command, T1.status, T2.zbr_addr
FROM
	(SELECT id, user_id, command, status FROM tasks
	GROUP BY user_id) T1,
	(SELECT id, zbr_addr FROM users
	GROUP BY id) T2
WHERE T1.user_id = T2.id";

$res = mysqli_query($db, $query);
while($row = mysqli_fetch_assoc($res)) {
	$data['tasks'][] = $row;
}

load_tpl('tasks', 'general');