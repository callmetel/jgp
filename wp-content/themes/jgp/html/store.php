<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
	<title>Heres2CoolStuff</title>
	<link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
	<?php include 'store/header-script.php'; ?>
</head>
<body>
	<div id="bg-h2c" class="subpage-bg">
		<div class="wrap-subpg">
			
			<?php include 'store/standard-nav.php'; ?>

			<header id="sub-pg-header" class="header fadeIn-scaleUp">
				<?php include 'store/header.php'; ?>
			</header>	

			<!-- Sections are pages within this page triggered with jquery -->
			
			<section id="our-story" class="is-inactive">
				<?php include 'store/our-story/our-story.php'; ?>
			</section>

			<section id="location" class="is-inactive">
				<?php include 'store/location/map.php'; ?>
				<div class="divider"></div>
				<?php include 'store/location/location-info.php'; ?>
			</section>
			
			<section id="donate" class="is-inactive">
				<?php include 'store/donate/description.php'; ?>
				<?php include 'store/donate/donate-btn.php'; ?>
			</section>
		</div>
		<?php include 'partials/footer.php'; ?>
	</div>
	<?php include 'partials/script.php'; ?>
	<?php include 'store/scripts.php'; ?>
</body>
</html>

