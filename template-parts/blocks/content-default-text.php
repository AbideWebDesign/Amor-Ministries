<?php
/**
 * Block Name: Default Text
 *
 * This is the template that displays the default text block.
 */
 
// Get Group settings (array)
$group_settings = get_field('default_text_settings');

// Get Group content (array)
$group_content = get_field('default_text_content');

if ( $group_settings['type'] == 'text-sidebar' ) {
 
	$image = wp_get_attachment_image_src( $group_content['image']['id'], 'Side' );
 
} elseif ( $group_settings['type'] == 'text-bg' ) {
 
	$bg_img = wp_get_attachment_image_src( $group_content['background_image']['id'], 'Background' );
 
}


?>

<div class="<?php echo $group_settings['padding_type']; ?> wrapper-default-text">

	<div class="container">
	
		<?php 
		
		if ( $group_settings['type'] == 'text-sidebar' ): // Text with Sidebar
		 
		 	$text_position = $group_settings['text_position'];
			$image = wp_get_attachment_image_src( $group_content['image']['id'], 'Side' );
			$img_col_classes = 'col-md-5 col-lg-6 mb-4 align-self-center';
			
			// Setup helper classes
			if ( $text_position == 'Right' ) {
		
				$text_col_classes = 'col-md-7 col-lg-5 pl-lg-5 align-self-center order-2';
				$img_col_classes .= ' order-1';
				
			} else {
				
				$text_col_classes = 'col-md-8 col-lg-5 offset-lg-1 pr-5 align-self-center order-2 order-lg-1';
				$img_col_classes .= ' order-1 order-md-2';
				
			}
			
		?>
			
			<div class="row">
				
				<div class="<?php echo $text_col_classes; ?>">
					
					<?php if ( isset( $group_content['content_title'] ) ): ?>
					
						<h2><?php echo $group_content['content_title']; ?></h2>
					
					<?php endif; ?>
					
					<?php echo $group_content['content']; ?>
					
					<?php if ( $group_content['include_button'] ): ?>
					
						<div class="mt-4 <?php echo $group_content['button_position']; ?>">
						
							<?php echo get_button( $group_content ); ?>
							
						</div>
					
					<?php endif; ?>
					
				</div>
				
				<div class="<?php echo $img_col_classes; ?>">
					
					<img src="<?php echo $image[0]; ?>" alt="<?php $image[1]; ?>" class="img-fluid" />
					
				</div>
				
			</div>


	<?php elseif ( $group_settings['type'] == 'text' ): ?>
	
			<div class="row justify-content-center">
				
				<div class="col-lg-9 col-xl-7">
					
					<?php if ( isset( $group_content['content_title'] ) ): ?>
					
						<h2><?php echo $group_content['content_title']; ?></h2>
					
					<?php endif; ?>
					
					<?php echo $group_content['content']; ?>
					
					<?php if ( $group_content['include_button'] ): ?>
					
						<div class="mt-4 <?php echo $group_content['button_position']; ?>">
						
							<?php echo get_button( $group_content ); ?>
							
						</div>
					
					<?php endif; ?>
					
				</div>
				
			</div>

	<?php elseif ( $group_settings['type'] == 'lead' ): ?>	
			
			<div class="row justify-content-center">
				
				<div class="col-lg-10 text-center">
					
					<?php if ( isset( $group_content['content_title'] ) ): ?>
					
						<h1><?php echo $group_content['content_title']; ?></h1>
					
					<?php endif; ?>
				
					<div class="lead mb-0">
						
						<?php echo $group_content['content']; ?>
						
					</div>
						
					<?php if ( $group_content['include_button'] ): ?>
					
						<div class="mt-4 <?php echo $group_content['button_position']; ?>">
						
							<?php echo get_button( $group_content ); ?>
							
						</div>
					
					<?php endif; ?>
					
				</div>
				
			</div>

	<?php endif; ?>
	
	</div>
	
</div>