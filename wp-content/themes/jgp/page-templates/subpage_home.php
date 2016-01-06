<?php 

/*
	Template Name: Subpage Home

*/

get_header(); ?>

	<?php 

	if ( have_posts() ):
		
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
			
			<?php 
				if ( is_page( 'Heres2CoolStuff' ) ):
					get_template( 'Store' );
				elseif ( is_page( 'Productions' ) ):
					get_template( 'Productions');
				elseif ( is_page( 'JGPStudio') ):
					get_template( 'Studio' );
				else:
					get_404_template( '404' );
			?>

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>