<?php
/**
 * Block Name: Pattern Hero Banner
 *
 * This is the template that displays the hero banner.
 */

// get group field (array)
$banner_content = get_field('pattern_hero_banner_content');

?>

<div class="container-pattern-hero">
	<div class="pattern-hero-banner">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="hero-header">
						<h2 class="mb-3"><?php echo $banner_content['title']; ?></h2>
						<p class="lead mb-3"><?php echo $banner_content['text']; ?></p>
						
						<?php if ( $banner_content['include_button'] ): ?>
						
							<?php echo get_button( $banner_content ); ?>
						
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>