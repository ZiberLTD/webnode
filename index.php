<?php
if(file_exists('install/install.php')){
	require_once('install/install.php');
	die();
}

require_once('inc/config.php');
require_once('inc/functions.php');

session_start();
db_connect();

// ROUTE
if(isset($_GET['path'])) {
	$module = preg_replace("/[^a-zA-Z0-9]+/", "", $_GET['path']);
	$module_abs_path = 'modules/'.$module.'.php';
} else {
	if(!auth_check(false)) {
		$module_abs_path = 'modules/login.php';
	} else {
		$module_abs_path = 'modules/statistics.php';
	}
}

if(file_exists($module_abs_path)) {
	require_once($module_abs_path);
} else die('404'); // TODO: Create template for 404 Page load_tpl('404');
// ROUTE ends;

db_close();