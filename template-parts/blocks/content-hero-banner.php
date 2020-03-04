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
<style>
	@media only screen and (max-width: 1200px) {
		.container-hero .hero-banner:after {
			background-image: url( <?php echo $image_mobile[0]; ?> );
		}	
	}
</style>

<div class="container-hero">

	<div class="hero-banner <?php echo $banner_classes; ?>" style="background-image: url( <?php echo $image[0]; ?> )">

		<div class="container">

			<div class="row <?php echo ($banner_settings['banner_type'] == 'Default' ? $banner_settings['text_position'] : 'justify-content-between'); ?>">

				<div class="col-md-10 col-lg-7 col-xl-7 <?php echo ($banner_settings['banner_type'] == 'Donation' || $banner_settings['banner_type'] == 'Donation-Image' ? 'align-self-center ' . $banner_settings['text_position_donation'] : ''); ?>">

					<div class="hero-header <?php echo $banner_settings['text_color']; ?><?php echo ($banner_settings['banner_type'] == 'Donation-Image' ? ' text-center' : ''); ?>">

						<?php if ( $banner_settings['banner_type'] != 'Donation-Image' ): ?>
						
							<h1><?php echo $banner_content['title']; ?></h1>
						
						
						<?php else: ?>
						
							<?php $foreground_img = wp_get_attachment_image_src( $banner_content['foreground_image']['id'], 'Hero Banner Foreground' ); ?>
							
							<img src="<?php echo $foreground_img[0]; ?>" class="img-fluid mb-3" />
							
						<?php endif; ?>

						<p class="lead mb-0"><?php echo $banner_content['text']; ?></p>
						
						<?php if ( $banner_content['include_button'] ): ?>
						
							<div class="mt-3">
								
								<?php echo get_button( $banner_content ); ?>
								
							</div>
						
						<?php endif; ?>
						
					</div>

				</div>
				
				<?php if ( $banner_settings['banner_type'] == 'Donation' || $banner_settings['banner_type'] == 'Donation-Image' ): ?>
				
					<?php $form_id = $banner_content['form']; ?>
					
					<div class="col-md-8 col-lg-5 col-xl-4 mt-4 mt-lg-0 align-self-center">
						
						<?php echo do_shortcode('[gravityform id="' . $form_id . '" title="true" description="false" ajax="true" tabindex="49"]'); ?>

					</div>
				
				<?php endif; ?>

			</div>

		</div>

	</div>

</div>