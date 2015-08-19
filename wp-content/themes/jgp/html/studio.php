<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
	<title>JGP Studio</title>
	<link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
	<div id="bg-studio" class="subpage-bg">
		<div class="wrap-subpg">

			<?php include 'studio/nav.php'; ?>

			<header id="sub-pg-header" class="header fadeIn-scaleUp">
				<?php include 'studio/header.php'; ?>
			</header>

			<!-- Sections are pages within this page triggered with jquery -->
			
			<section id="events" class="is-inactive">
				<?php include 'studio/events/events-carousel.php'; ?>
			</section>

			<section id="booking" class="is-inactive 2-col-grid">
				<?php include 'studio/booking/form-description.php'; ?>
				<div class="divider"></div>
				<?php include 'studio/booking/booking-form.php'; ?>
			</section>

			<section id="contact" class="is-inactive">
				<?php  include 'studio/contact/contact.php'; ?>
			</section>

			<section id="calendar" class="is-inactive">
				<?php include 'partials/calendar.php'; ?>
			</section>

		</div>
		<?php include 'partials/footer.php'; ?>
	</div>
	<?php include 'partials/script.php'; ?>
	<?php include 'studio/scripts.php'; ?>
</body>
</html>