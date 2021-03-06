<?php
/**
 * Block Name: Icon Group
 *
 * This is the template that displays the icon group block.
 */

// Get group field (array)
$group_content = get_field('icon_group_content');

?>

<div class="icon-group <?php echo $group_content['padding_type']; ?> bg-white">

	<div class="container">
		
		<?php if ( $group_content['include_title'] || $group_content['include_text'] ): ?>
			
			<div class="row justify-content-center mb-4">
				
				<div class="col-lg-8 text-center">
										
					<?php if ( $group_content['include_title'] ): ?>
					
						<h2 class="mb-3"><?php echo $group_content['title']; ?></h2>
						
					<?php endif; ?>
					
					<?php if ( $group_content['include_text'] ): ?>
					
						<div class="lead mb-0">
						
							<?php echo $group_content['text']; ?>
						
						</div>
						
					<?php endif; ?>
					
				</div>
				
			</div>
				
		<?php endif; ?>
	
		<div class="row justify-content-center">
			
			<?php while ( have_rows( 'icon_group_content' ) ): the_row(); ?>
			
				<?php while ( have_rows( 'icon_group' ) ): the_row(); ?>
				
					<?php $image = get_sub_field('icon'); ?>
				
					<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
						
						<div class="text-center mb-4 px-5">
							
							<?php if ( get_sub_field('type') == 'Icon' ): ?>
							
								<?php echo wp_get_attachment_image( $image['id'], 'Icon', false, array('class'=>'icon img-fluid') ); ?>
								
							<?php else: ?>
							
								<?php $image_classes = ( get_sub_field('style') == 'Rounded' ? 'img-fluid rounded-circle' : 'img-fluid rounded' ); ?>
								
								<?php $image_size = ( get_sub_field('style') == 'Rounded' ? 'Image Group Rounded' : 'Image Group' ); ?>
							
								<?php echo wp_get_attachment_image( $image['id'], $image_size, false, array( 'class' => $image_classes ) ); ?>
							
							<?php endif; ?>
							
						</div>

						<h3 class="text-center"><?php the_sub_field('icon_title'); ?></h3>
						
						<p class="mb-3"><?php the_sub_field('icon_text'); ?></p>
						
						<?php if ( get_sub_field('include_link') ): ?>
						
							<div class="text-center">
								
								<a class="btn-text" href="<?php the_sub_field('icon_link'); ?>"><?php the_sub_field('icon_link_label'); ?></a>
							
							</div>
						
						<?php endif; ?>
						
					</div>
					
					<div class="w-100 d-md-none d-lg-none"></div>
				
				<?php endwhile; ?>
			
			<?php endwhile; ?>
			
		</div>
		
	</div>
		
</div>