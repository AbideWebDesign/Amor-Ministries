<?php
/**
 * Block Name: Pattern Hero Banner
 *
 * This is the template that displays the hero banner.
 */

// get group field (array)
$banner_content = get_field('pattern_hero_banner_content');
$type = $banner_content['type'];

if ( $type == 'Form' ) {
	
	$row_class = 'row';
	$col_class = 'col-lg-8 align-self-center';
	
} else {
	
	$row_class = 'row justify-content-center';
	$col_class = 'col-md-8 col-lg-6 text-center';
	
}
?>

<div class="container-pattern-hero">
	<div class="pattern-hero-banner">
		<div class="container">
			<div class="<?php echo $row_class; ?>">				
				<div class="<?php echo $col_class; ?>">
					<div class="hero-header">
						<h2 class="mb-3"><?php echo $banner_content['title']; ?></h2>
						<p class="lead mb-3"><?php echo $banner_content['text']; ?></p>
						
						<?php if ( $banner_content['include_button'] ): ?>
						
							<?php echo get_button( $banner_content ); ?>
						
						<?php endif; ?>
						
					</div>
				</div>
				
				<?php if ( $type == 'Form' ): ?>
				
					<div class="col-lg-4">
						<div class="bg-light p-4">
							
							<?php if ( $banner_content['form_title'] ): ?>
							
								<h3 class="mb-3"><?php echo $banner_content['form_title']; ?></h3>
								
							<?php endif; ?>
							
							<?php echo do_shortcode('[gravityform id=" ' . $banner_content['form'] . '" title="false" description="false" ajax="true"]'); ?>
					
						</div>
					</div>
				
				<?php endif; ?>
								
			</div>
		</div>
	</div>
</div>