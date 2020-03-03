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

?>
<div id="wrapper-footer-bottom" class="mt-5 py-3 bg-primary fixed-bottom">
	
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

