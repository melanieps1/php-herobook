<!DOCTYPE html>
<html>
<head>
	<title>Herobook</title>

	<link rel="stylesheet" type="text/css" href="app/style.css">
</head>
<body>

	<div class="header">
		<h1>Herobook</h1>
		<h3><i>Facebook for Superheroes</i></h3>
	</div>

	<p class="subtitle">Check out your superfriends!</p>

	<?php

		include('./database.php');
	
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