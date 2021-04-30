<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header( 'blog' );

?>

<div id="blog-wrapper" class="wrapper-sm-bottom">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col-12 text-center">
				
				<h1 class="mb-4"><?php _e('Stories'); ?></h1>
				
			</div>
			
			<div class="col-12">
				
				<main class="site-main" id="main">
	
					<?php if ( have_posts() ) : ?>
						
						<div class="row">
						
							<?php while ( have_posts() ) : the_post(); ?>
								
								<div class="col-md-6 col-lg-4 mb-3">
									
									<?php get_template_part( 'loop-templates/content', 'single' ); ?>
									
								</div>
		
							<?php endwhile; ?>
							
						</div>
	
					<?php else : ?>
	
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
	
					<?php endif; ?>
	
				</main><!-- #main -->

				<?php amor_pagination(); ?>
				
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_template_part('template-parts/content-category', 'list'); ?>

<?php get_footer();
