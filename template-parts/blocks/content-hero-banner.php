<?php
/**
 * Block Name: Hero Banner
 *
 * This is the template that displays the hero banner.
 */

// get group field (array)
$banner_settings = get_field('hero_banner_settings');
$banner_content = get_field('hero_banner_content');

$image = wp_get_attachment_image_src( $banner_content['image']['id'], 'Hero Banner' );
$image_mobile = wp_get_attachment_image_src( $banner_content['image_mobile']['id'], 'Hero Banner Mobile' );

if ( $banner_settings['banner_type'] == 'Default' ) {

	$banner_classes = 'hero-banner-default';
	
} elseif ( $banner_settings['banner_type'] == 'Donation' ) {
	
	$banner_classes = 'hero-banner-donation';
	
} elseif ( $banner_settings['banner_type'] == 'Donation-Image' ) {

	$banner_classes = 'hero-banner-donation-image';
	
}
?>	

<div class="container-hero" style="background-image: url( <?php echo $image[0]; ?> )">

	<div class="hero-banner <?php echo $banner_classes; ?>">

		<div class="container">

			<div class="row <?php echo ($banner_settings['banner_type'] == 'Default' ? $banner_settings['text_position'] : 'justify-content-between'); ?>">

				<div class="col-12 col-md-10 col-lg-8 col-xl-7 <?php echo ($banner_settings['banner_type'] == 'Donation' || $banner_settings['banner_type'] == 'Donation-Image' ? 'align-self-center ' . $banner_settings['text_position_donation'] : ''); ?>">

					<div class="hero-header <?php echo $banner_settings['text_color']; ?><?php echo ($banner_settings['banner_type'] == 'Donation-Image' ? ' text-center' : ''); ?>">

						<?php if ( $banner_settings['banner_type'] != 'Donation-Image' && $banner_content['title'] != '' ): ?>
						
							<h1 class="mb-0"><?php echo $banner_content['title']; ?></h1>
						
						<?php else: ?>
						
							<?php $foreground_img = wp_get_attachment_image_src( $banner_content['foreground_image']['id'], 'Hero Banner Foreground' ); ?>
							
							<img src="<?php echo $foreground_img[0]; ?>" class="img-fluid" />
							
						<?php endif; ?>

						<?php if ( $banner_content['text'] != '' ): ?>
						
							<p class="lead mt-3 mb-0"><?php echo $banner_content['text']; ?></p>
							
						<?php endif; ?>
						
						<?php if ( $banner_content['include_button'] ): ?>
						
							<div class="mt-3">
								
								<?php echo get_button( $banner_content ); ?>
								
							</div>
						
						<?php endif; ?>
						
					</div>

				</div>
				
				<?php if ( $banner_settings['banner_type'] == 'Donation' || $banner_settings['banner_type'] == 'Donation-Image' ): ?>
				
					<?php $form_id = $banner_content['form']; ?>
					
					<div class="col-md-8 col-lg-4 col-xl-4 mt-4 mt-lg-0 align-self-center">
						
						<?php echo do_shortcode('[gravityform id="' . $form_id . '" title="true" description="false" ajax="true" tabindex="49" field_values="monthly=Make this a monthly gift"]'); ?>

					</div>
				
				<?php endif; ?>

			</div>

		</div>

	</div>
	
	<div class="hero-banner-bg-mobile d-lg-none" style="background-image: url( <?php echo $image_mobile[0]; ?> )"></div>
	
	<?php if ( $banner_settings['include_overlay'] ): ?>
	
		<div class="bg-overlay"></div>
	
	<?php endif; ?>

</div>

<?php echo get_template_part('template-parts/blocks/content', 'progress-bar', array( 'banner_settings'=> $banner_content ) ); ?>