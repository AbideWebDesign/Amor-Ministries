<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header( 'blog' );

?>

<div id="archive-wrapper" class="wrapper-sm-bottom">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
	
			<div class="col-12 wrapper-sm text-center">
				
				<h1 class="mb-4">
					
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
						
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
						
				</h1>
				
			</div>
			
		</div>
				
		<?php if ( have_posts() ) : ?>

			<div class="row">
					
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="col-md-6 col-lg-4 mb-3">
						
						<?php get_template_part( 'loop-templates/content', 'single'); ?>
						
					</div>

				<?php endwhile; ?>
				
			</div>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<?php amor_pagination(); ?>

	</div><!-- #content -->

</div><!-- #archive-wrapper -->
	
<?php get_template_part('template-parts/content-category', 'list'); ?>

<?php get_footer();
