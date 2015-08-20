<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
	<title>JGP</title> <!--Look into getting favicon for logo-->
	<link type="text/css" rel="stylesheet" href="../assets/css/style.css">
</head>
<body id="bg-index">

	<?php include 'partials/mobile-nav.php'; ?>
	<?php include 'partials/header.php'; ?>

	<section id="about">
		<div class="wrap about-shape-container">
			<?php include 'about-description.php' ?>
		</div>
	</section>

	<section id="contact">
		<div class="wrap">
			<?php include 'partials/icons.php'; ?>
			<?php include 'partials/contact-heading'; ?>
			<?php include 'partials/contact-form'; ?>
		</div>
	</section>
	<?php include 'partials/fixed-nav.php'; ?>
</body>
</html>