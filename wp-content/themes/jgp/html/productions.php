<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
	<title>John Graves Productions</title>
	<link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
	<div id="bg-productions" class="subpage-bg">
		<div class="wrap-subpg">

			<?php include 'productions/productions-nav.php'; ?>
			
			<header id="sub-pg-header" class="header fadeIn-scaleUp">
				<?php include 'productions/header.php'; ?>
			</header>


			<!-- Sections are pages within this page triggered with jquery -->

			<section id="about-us" class="is-inactive">
				<?php include 'productions/about/about-us.php'; ?>
			</section>

			<section id="plays" class="is-inactive">
				<?php include 'productions/plays/plays-grid.php'; ?>
			</section>

			<section id="auditions" class="is-inactive">
				<?php include 'productions/auditions/booking-text.php'; ?>
				<div class="divider"></div>
				<?php include 'productions/auditions/booking-form.php'; ?>
			</section>

			<section id="tickets" class="is-inactive is-scrollable">
				<?php include 'productions/tickets/tickets-list.php'; ?>
				<?php include 'productions/tickets/upcoming-events.php'; ?>
				<?php include 'productions/tickets/past-events.php'; ?>
			</section>

			<section id="classes" class="is-inactive is-scrollable">
				<?php include 'productions/classes/class-list.php'; ?>
			</section>
		</div>
		
		<?php include 'partials/footer.php'; ?>
	</div>

	<?php include 'productions/plays/play-lightbox.php'; ?>
	<?php include 'productions/classes/class-lightbox.php'; ?>
	
	<?php include 'productions/scripts.php'; ?>
	<?php include 'partials/script.php'; ?>

</body>
</html>

				