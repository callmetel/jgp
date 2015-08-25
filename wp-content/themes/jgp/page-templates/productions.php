<?php 

/*
	Template Name: Productions

*/

get_header(); ?>

	<?php 

	if ( have_posts() ):
		
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
			
			<?php include 'partials/productions/productions-nav.php'; ?>
			<?php include 'partials/subpg_header.php'; ?>
			<?php include 'partials/productions/header.php'; ?>
			<?php include 'partials/productions/about-us.php'; ?>
			<?php include 'partials/productions/plays-grid.php'; ?>
			
			<?php include 'partials/subpg_footer.php'; ?>
			<?php include 'partials/productions/plays-lightbox.php'; ?>
			

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>
