<?php
/**
 * Block Name: Alert Bar
 *
 * This is the template that displays the alert bar at the top of the page.
 */

global $post;
?>

<?php if ( have_rows( 'alerts', 'options' ) ): ?>
						
	<?php while ( have_rows( 'alerts', 'options' ) ): the_row(); ?>
		
		<?php $pages = get_sub_field('pages'); ?>
			
		<?php if ( in_array( $post->ID, $pages ) ): ?>
			
			<?php $bg_color = get_sub_field('background_color'); ?>

			<?php $bg_color_class = get_color_class($bg_color); ?>
			
			<?php $light_color_check = get_color_text_class($bg_color_class); ?>
			
			<?php $text_color_class = ( $light_color_check ? 'text-white' : '' ); ?>
			
			<div id="alert" class="bg-<?php echo $bg_color_class; ?> <?php echo $text_color_class; ?> text-center">
	 
				<div class="container">
					 
					<div class="row justify-content-center">
						
						<div class="col-12">
				 
							<?php the_sub_field('alert_message'); ?>
						 	
						</div>
						
					</div>
					
				</div>
				 
			</div>
			
		<?php endif; ?>
			
	<?php endwhile; ?>
	
<?php endif; ?>
 
