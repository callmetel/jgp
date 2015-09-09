<?php 

/*
	Template Name: Studio

*/

get_header(); ?>

	<?php 

	if ( have_posts() ):
		
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
			
			<?php include 'partials/studio/nav.php'; ?>
			<?php include 'partials/subpg_header.php'; ?>
			<?php include 'partials/studio/header.php'; ?>
			<?php include 'partials/studio/events-gallery.php'; ?>
			<?php include 'partials/studio/form-description.php'; ?>
			<?php include 'partials/studio/booking-form.php'; ?>
			<?php include 'partials/studio/contact.php'; ?>
			<?php include 'partials/studio/calendar.php'; ?>

			
			<?php include 'partials/subpg_footer.php'; ?>
			<?php include 'partials/studio/events-lightbox.php'; ?>
		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>
