<?php
/**
 * The template for displaying fundraiser pages
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="page-wrapper">

	<?php get_template_part( 'loop-templates/content', 'fundraiser' ); ?>
	
</div><!-- #page-wrapper -->

<?php get_footer();