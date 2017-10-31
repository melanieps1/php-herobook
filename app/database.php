<?php

	function getDb() {

		$raw_url = 'postgres://fzxlldskryzffn:fc7a92eb175bae58664859f4d22df0a6f26c09134072cf23846acc2223d7b9dd@ec2-54-243-60-48.compute-1.amazonaws.com:5432/d26vtivma4uu8s';

		// if (file_exists('.env')) {
		// 	require __DIR__ . '/vendor/autoload.php';
		// 	$dotenv = new Dotenv\Dotenv(__DIR__);
		// 	$dotenv->load();
		// }

		$url = parse_url($raw_url);

		// var_dump($url); (shows you the URL breakdown ('host' =>, 'port' =>, etc.) on the localhost)

		$db_port = $url['port'];
		$db_host = $url['host'];
		$db_user = $url['user'];
		$db_pass = $url['pass'];
		$db_name = substr($url['path'], 1);

		$db = pg_connect(
		"host=" . $db_host . 
		" port=" . $db_port . 
		" dbname=" . $db_name . 
		" user=" . $db_user . 
		" password=" . $db_pass);
		return $db;
	}

?>