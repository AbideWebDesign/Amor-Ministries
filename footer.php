<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$footer_logo = get_field('footer_logo', 'options'); 
$links_section = get_field('links_section', 'options');
$social_links = get_field('social_section', 'options');

?>

<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer">
		
		<div class="container">
	
			<div class="row justify-content-center justify-content-md-between">
	
				<div class="col-auto col-md-6 col-lg-3 col-xl-3 order-1 order-md-0">
					
					<div class="mb-3">
						
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $footer_logo['url']; ?>" class="img-fluid" width="175" /></a>
					
					</div>
					
					<div class="mb-2">
					
						<p class="mb-0"><?php the_field('footer_text', 'options'); ?></p>
					
					</div>
					
					<div class="mb-0">
					
						<ul class="list-inline">
							<li class="list-inline-item"><a href="<?php echo $social_links['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $social_links['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $social_links['instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $social_links['blog']; ?>"><i class="fa fa-rss"></i></a></li>
						</ul>
					
					</div>
	
				</div><!--col-lg-6 end -->
				
				<div class="col-md-6 col-lg-9 col-xl-8 order-0 order-md-1 mb-4 mb-md-0">
					
					<div class="row mb-2">
					
						<div class="col-6 col-lg-3">
							
							<h6><?php echo $links_section['column_1_title']; ?></h6>
							<?php wp_nav_menu( array( 'theme_location'  => 'footer1' ) ); ?>
							
						</div>
					
						<div class="col-6 col-lg-3">
							
							<h6><?php echo $links_section['column_2_title']; ?></h6>
							<?php wp_nav_menu( array( 'theme_location'  => 'footer2' ) ); ?>
							
						</div>
					
						<div class="col-6 col-lg-3">
							
							<h6><?php echo $links_section['column_3_title']; ?></h6>
							<?php wp_nav_menu( array( 'theme_location'  => 'footer3' ) ); ?>
							
						</div>
						
						<div class="col-6 col-lg-3">
							
							<h6><?php echo $links_section['column_4_title']; ?></h6>
							<?php wp_nav_menu( array( 'theme_location'  => 'footer4' ) ); ?>
							
						</div>
						
					</div>
					
				</div><!--col-lg-6 end -->
	
			</div><!-- row end -->
	
		</div><!-- container end -->
		
	</footer><!-- footer -->

</div><!-- wrapper-footer end -->	

<div id="wrapper-footer-bottom" class="py-3 bg-primary">
	
	<div class="container">
		
		<div class="row justify-content-center no-gutters">
			
			<div class="col-lg-auto mb-1 mb-lg-0 text-center text-lg-left">
				
				<?php the_field('footer_bottom_text', 'options'); ?>
			
			</div>
			
			<div class="col-lg-auto text-center text-lg-left">
				
				<p class="pl-1"><a href="https://abidewebdesign.com" target="_blank">Website Designed and Maintained by Abide Web Design</a></p>
				
			</div>
			
		</div>
		
	</div>
	
</div><!-- wrapper-footer-bottom end -->

</div>

<?php wp_footer(); ?>

</body>

</html>

