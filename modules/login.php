<?php
if(isset($_POST['login']) && isset($_POST['password'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	
	$res = mysqli_query($db, "SELECT username, password, salt FROM config WHERE id=1");
	$row = mysqli_fetch_assoc($res);
	
	$password = md5($password.':'.$row['salt']);
	if($row['username'] == $login && $row['password'] == $password) {
		auth_user();
	} else {
		$data['error'] = 'Wrong login or password';
	}
}

load_tpl('login');