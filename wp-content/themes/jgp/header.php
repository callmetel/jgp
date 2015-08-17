<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
	<title>JGP</title> <!--Look into getting favicon for logo-->
	<?php wp_head(); ?>
</head>
<?php 

		if( is_front_page() ):
			$get_home_class = array('bg-index');
		else:
			$get_home_class = array('');
		endif;
?>
<body <?php body_class( $get_home_class ); ?>>
