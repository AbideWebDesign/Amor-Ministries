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

?>
<style>
	@media only screen and (max-width: 1200px) {
		.container-hero .hero-banner:after {
			background-image: url( <?php echo $image_mobile[0]; ?> );
		}	
	}
</style>
<div class="container-hero">
	<div class="hero-banner" style="background-image: url( <?php echo $image[0]; ?> )">
		<div class="container">
			<div class="row <?php echo $banner_settings['text_position']; ?>">
				<div class="col-md-8 col-lg-6">
					<div class="hero-header <?php echo $banner_settings['text_color']; ?> <?php echo $text_align; ?>">
						<h1><?php echo $banner_content['title']; ?></h1>
						<p class="lead"><?php echo $banner_content['text']; ?></p>
						
						<?php if ( $banner_content['include_button'] ): ?>
						
							<?php echo get_button( $banner_content ); ?>
						
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>