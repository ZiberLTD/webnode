<?php

function dd($data) {
	echo '<pre>';
	print_r($data);
	die();
}

function db_connect() {
	global $db, $config;
	$db = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['name']);
}

function db_close() {
	global $db;
	mysqli_close($db);
}

function load_tpl($tpl_name, $layout=false) {
	global $data;
	if($layout) {
		$template = $tpl_name;
		require_once('templates/'.$layout.'.php');
	} else {
		require_once('templates/'.$tpl_name.'.php');
	}
}

function media($url) {
	global $config;
	return $config['sitehost'].'media/'.$url;
}

function get_url($url) {
	global $config;
	return $config['sitehost'].$url.'/';
}

function auth_user() {
	global $config;
	$_SESSION['auth'] = true;
	header("Location: ".$config['sitehost']);
	exit();
}

function logout_user() {
	global $config;
	$_SESSION['auth'] = false;
	header("Location: ".$config['sitehost']);
	exit();
}

function auth_check($redir=true) {
	global $config;
	if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
		if($redir) {
			header("Location: ".$config['sitehost']);
			exit();
		} else return false;
	} else return true;
}