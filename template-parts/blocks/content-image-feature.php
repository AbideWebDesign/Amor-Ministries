<?php
/**
 * Block Name: Image Feature
 *
 * This is the template that displays the side by side block.
 */

// Get group field(s) (array)
$group_settings = get_field('side_by_side_settings');
$group_content = get_field('side_by_side_content');

// Setup Setting Fields
$text_position = $group_settings['text_position'];
$bg_color = $group_settings['background_color'];
$bg_color_class = get_color_class($bg_color);
$light_color_check = get_color_text_class($bg_color_class);

// Setup Content Fields
$title = $group_content['title'];
$text = $group_content['text'];
$image = wp_get_attachment_image_src( $group_content['image']['id'], 'Side Cover' );

// Setup helper classes
$text_color_class = ( $light_color_check ? 'text-white' : '' );

if ( $text_position == 'Right' ) {
	
	$text_align_class = 'text-lg-left';
	$col_classes = 'order-1 mr-auto';
	
} else {
	
	$text_align_class = 'text-lg-right';
	$row_position_class = '';
	$col_classes = 'ml-auto';
	
}

?>
<div class="container-fluid bg-<?php echo $bg_color_class; ?> <?php echo $text_color_class; ?>">
	<div class="image-feature row justify-content-between <?php echo $postion_class; ?>">
		<div class="side col-lg-6 col-xl-5 align-self-center <?php echo $col_classes; ?>">
			<div class="inner text-center <?php echo $text_align_class; ?>">
				<h2><?php echo $title ?></h2>
				
				<div class="lead">
				
					<?php echo $text; ?>
					
				</div>
				
				<?php if ( $group_content['include_button'] ): ?>
				
					<?php echo get_button( $group_content ); ?>
				
				<?php endif; ?>
				
			</div>
		</div>
		<div class="side col-lg-6 cover-image" style="background-image: url(<?php echo $image[0]; ?> );"></div>
	</div>
</div>
