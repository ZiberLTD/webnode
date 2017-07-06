<?php
// installation
// step 1 config
require_once('inc/functions.php');

if(!file_exists('inc/config.php')) {
	if(!isset($_POST['sitehost'])) {
		require_once('step1.php');
	} else {
		$sitehost = $_POST['sitehost'];
		$blockcypher_token = $_POST['blockcypher_token'];
		$db_host = $_POST['db_host'];
		$db_user = $_POST['db_user'];
		$db_pass = $_POST['db_pass'];
		$db_name = $_POST['db_name'];
		
		$config = '<?php'."\n".
		'$config["sitehost"] = "'.$sitehost.'";'."\n".
		'$config["blockcypher_token"] = "'.$blockcypher_token.'";'."\n".
		'$config["db"]["host"] = "'.$db_host.'";'."\n".
		'$config["db"]["user"] = "'.$db_user.'";'."\n".
		'$config["db"]["password"] = "'.$db_pass.'";'."\n".
		'$config["db"]["name"] = "'.$db_name.'";';
		
		$fh = fopen('inc/config.php', 'w+');
		fwrite($fh, $config);
		fclose($fh);
		
		header("Location: $sitehost");
	}
} else {
	require_once('inc/config.php');
	db_connect();
	
	//step 2 db
	$query = "SELECT 1 FROM `config` UNION
	SELECT 1 FROM `guests` UNION
	SELECT 1 FROM `tasks` UNION
	SELECT 1 FROM `users`";
	if(!mysqli_query($db, $query)) {
		$query = file_get_contents('install/db.sql');
		if(!mysqli_multi_query($db, $query)){
			echo 'database error:'.mysqli_error($db);		
		} else {
			require_once('step2.php');
		}
	} else {
		$query = "SELECT 1 FROM `config` WHERE id=1";
		$res = mysqli_query($db, $query);
		if(mysqli_num_rows($res) == 0) {
			//step 3 admin account
			if(isset($_POST['username']) && isset($_POST['password'])){
				$username = $_POST['username'];
				$salt = sha1(md5($username.date('d-m-Y H:i:s').mt_rand().$_POST['password']));
				$password = md5($_POST['password'].':'.$salt);
				$query = "INSERT INTO `config` (`id`, `username`, `password`, `salt`) VALUES ('1', '".$username."', '".$password."', '".$salt."')";
				mysqli_query($db, $query);
				header("Location: ".$config['sitehost']);
			} else {
				require_once('step3.php');
			}
		} else {
			require_once('step4.php');
		}
		db_close();
	}
}