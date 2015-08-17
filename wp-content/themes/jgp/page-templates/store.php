<?php 

/*
	Template Name: Store

*/

get_header(); ?>

	<?php 

	if ( have_posts() ):
		
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
		
			<?php include 'partials/store/store_nav.php'; ?>
			<?php include 'partials/subpg_header.php'; ?>
			<?php include 'partials/store/header.php'; ?>
			<?php include 'partials/store/our-story.php'; ?>
			<?php include 'partials/store/location.php'; ?>
			<?php include 'partials/store/donate.php'; ?>
			<?php include 'partials/subpg_footer.php'; ?>

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>
