<?php
auth_check();

if(isset($_POST['selection']) && isset($_FILES['file_to_execute'])) {
	$selections = explode(',', $_POST['selection']);
	
	//prepairing file
	$tmp_name = $_FILES["file_to_execute"]["tmp_name"];
	$file_name = basename($_FILES["file_to_execute"]["name"]);
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$hash = sha1(md5($file_name.date('Y-m-d H:i:s')).mt_rand());
	$_file_name = $hash.'.'.$ext;
	if(move_uploaded_file($tmp_name, "exec/$_file_name")) {
		if(count($selections) > 0) {
			foreach($selections as $uid) {
				$query = "INSERT INTO `tasks` (`user_id`, `command`, `status`) VALUES ('".intval($uid)."', '".$_file_name."', '0')";
				if(!mysqli_query($db, $query)) {
					$data['error'] = "database error";
					break;
				}
			}
			if(!isset($data['error'])) {
				$data['success'] = true;
			}
		} else {
			$data['error'] = "missing users";
		}
	} else {
		$data['error'] = "can't get uploaded file";
	}
} else {
	$data['error'] = "missing data";
}

print(json_encode($data));