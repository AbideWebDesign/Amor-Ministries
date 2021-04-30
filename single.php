<?php
/**
 * The template for displaying all single posts
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header( 'blog' );

?>

<div  id="single-wrapper" class="wrapper-sm-bottom">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				
				<div class="my-1">
					
					<div class="m-auto">
						
						<div class="sharethis-inline-share-buttons"></div>
						
					</div>
					
				</div>

			</main><!-- #main -->

		</div><!-- .row -->
		
	</div>

</div>
		
<?php if ( $explore = get_field('post_explore_more') ): ?>

	<?php get_template_part('template-parts/blocks/content', 'divider-alt'); ?>
	
	<div class="wrapper-sm">
		
		<div class="container">
							
			<div class="row justify-content-center">
				
				<div class="col-lg-10 col-xl-8 mb-3"><h3><?php _e('Explore More'); ?></h3></div>
					
				<?php foreach( $explore as $p ): ?>
				
					<?php $permalink = get_permalink( $p ); ?>
		      
		      <?php $title = get_the_title( $p ); ?>
		      
		      <div class="col-lg-10 col-xl-8 mb-4">
		        
		        <div class="row">
			        
			        <div class="col-md-4">
				        
				        <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail( $p, 'Card', false, array( 'class' => 'img-fluid' ) ); ?></a>
				        
			        </div>
			        
			        <div class="col-md-8 align-self-center">
				        
				        <a href="<?php echo $permalink; ?>"><h4 class="mb-0"><?php echo $title; ?></h4></a>
				        
				        <div class="text-sm text-muted"><?php echo get_the_date( 'F j, Y', $p ); ?></div>
				        
				        <div class="mt-3"><?php echo get_the_excerpt( $p ); ?></div>
				        
			        </div>
			        
		        </div>
		        
		      </div>
				
				<?php endforeach; ?>
				
			</div>
			
		</div>
		
	</div>
		
<?php endif; ?>

<?php get_template_part('template-parts/content-post', 'categories'); ?>

<?php get_footer();