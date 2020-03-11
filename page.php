<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

global $post;

?>

<div class="page-wrapper">

	<?php if ( get_field('header_type') == 'White' && get_field('page_type') != 'Form' && !has_block('acf/hero-banner', $post)  ): ?>
	
		<div class="page-wrapper-pattern"></div>
	
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'loop-templates/content', 'page' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #page-wrapper -->

<?php get_footer();
