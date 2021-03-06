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

	<?php if ( get_field('header_type') == 'White' && get_field('page_type') != 'Form' ): ?>
	
		<div class="page-wrapper-pattern"></div>
	
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'loop-templates/content', 'fundraiser' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #page-wrapper -->

<?php get_footer();