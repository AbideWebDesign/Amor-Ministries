<?php
/**
 * Block Name: Pattern Hero Banner
 *
 * This is the template that displays the hero banner.
 */

// get group field (array)
$banner_content = get_field('pattern_hero_banner_content');
$type = $banner_content['type'];

?>

<div class="container-pattern-hero">
	
	<div class="pattern-hero-banner">
		
		<div class="container">
			
			<?php if ( $type == 'Form' ): ?>
			
				<div class="row justify-content-center">
					
					<div class="col-md-8">
						
						<h2 class="text-dark text-center"><?php echo $banner_content['title']; ?></h2>
							
						<p class="lead text-center mb-5"><?php echo $banner_content['text']; ?></p>
					
					</div>
					
					<div class="col-md-11 col-lg-9 col-xl-7">
								
						<div class="bg-light p-4">
							
							<?php if ( $banner_content['form_title'] ): ?>
							
								<h3 class="mb-3"><?php echo $banner_content['form_title']; ?></h3>
								
							<?php endif; ?>
							
							<?php echo do_shortcode('[gravityform id=" ' . $banner_content['form'] . '" title="false" description="false" ajax="true"]'); ?>
					
						</div>
						
					</div>
					
				</div>
			
			<?php else: ?>
			
				<div class="row justify-content-center">		
							
					<div class="col-md-8 col-lg-6 text-center">
						
						<div class="hero-header">
							
							<h2 class="text-dark"><?php echo $banner_content['title']; ?></h2>
							
							<p class="lead mb-3"><?php echo $banner_content['text']; ?></p>
							
							<?php if ( $banner_content['include_button'] ): ?>
							
								<div class="mt-4">
								
									<?php echo get_button( $banner_content ); ?>
									
								</div>
							
							<?php endif; ?>
							
						</div>
					</div>
									
				</div>
			
			<?php endif; ?>
			
		</div>
		
	</div>
	
</div>