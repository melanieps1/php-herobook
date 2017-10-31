<!DOCTYPE html>
<html>
<head>
	<title>Herobook</title>

	<link rel="stylesheet" type="text/css" href="app/style.css">
</head>
<body>

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

	<div class="header">
		<h1>Herobook</h1>
		<h3><i>Facebook for Superheroes</i></h3>
	</div>

	<p class="subtitle">Check out your superfriends!</p>

	<?php
	
		include('database.php');

		function getHeroes() {
			$request = pg_query(getDb(), "select * from heroes order by id asc");
			return pg_fetch_all($request);
		}

	?>

	<ul>

	<?php
		foreach (getHeroes() as $hero) {
	?>

	<li>

		<div class="profileCards">
			
			<div class="imageContainer">
				<img src="<?= $hero["image_url"] ?>" height="150">
			</div>
				<br>
			<div class="nameAboutPreview">
				<div>
					<strong><?= $hero["name"] ?></strong>
				</div>

				<div>
					<p><?= $hero["about_me"] ?></p>
				</div>
			</div>

		</div>
		
	</li>

	<?php
		} 
	?>

	</ul>

</body>
</html>