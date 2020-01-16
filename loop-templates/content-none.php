<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'amor' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">
	
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'amor' ); ?></p>
			<?php get_search_form(); ?>
			
	</div><!-- .page-content -->

</section><!-- .no-results -->
