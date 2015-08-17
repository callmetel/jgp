<?php 

/*
	Template Name: Studio

*/

get_header(); ?>

	<?php 

	if ( have_posts() ):
		
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
			
			<?php include 'partials/home/main-header.php'; ?>
			<?php include 'partials/home/section-about.php'; ?>
			<?php include 'partials/home/section-contact.php'; ?>

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>
