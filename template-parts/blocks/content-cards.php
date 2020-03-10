<?php
/**
 * Block Name: Cards
 *
 * This is the template that displays the card group block.
 */

// Get group field (array)
$group_content = get_field('card_group_content');

?>

<?php if ( $group_content['include_title'] ): ?>

	<div class="card-group-top d-flex flex-column flex-sm-row  justify-content-center">
		
		<div class="card-group-header bg-primary text-white text-center<?php echo ( $group_content['include_button'] ? ' card-has-button' : ''); ?>">
			
			<h2><?php echo $group_content['title']; ?></h2>	
				
			<p class="lead"><?php echo $group_content['text']; ?></p>
			
		</div>
		
		<?php if ( $group_content['include_button'] ): ?>
			
			
			<div class="card-group-button">
			
				<?php echo get_button( $group_content ); ?>
				
			</div>
			
		<?php endif; ?>
		
	</div>

<?php endif; ?>

<div class="card-group wrapper bg-white">

	<div class="container">
			
		<div class="row justify-content-center">
			
			<?php while ( have_rows( 'card_group_content' ) ): the_row(); ?>
			
				<?php while ( have_rows( 'cards_group' ) ): the_row(); ?>
				
					<?php $card_color = get_sub_field('card_color'); ?>
					
					<?php $card_color_class = get_color_class($card_color); ?>
					
					<?php $card_image = get_sub_field('card_image'); ?>
					
					<div class="col-md-8 col-lg-4 mb-4 mb-lg-0">
						
						<a class="card-group-link" href="<?php the_sub_field('card_link'); ?>">
						
							<div class="card-group-content text-white bg-<?php echo $card_color_class; ?>">
							
								<?php echo wp_get_attachment_image( $card_image, 'Card', false, array('class'=>'img-fluid') ); ?>
							
								<div class="p-4 text-center">
							
									<?php if ( get_sub_field('card_title') ): ?>
							
										<h3><?php the_sub_field('card_title'); ?></h3>
										
									<?php endif; ?>
						
									<p class="mb-0"><?php the_sub_field('card_text'); ?></p>
									
								</div>
								
							</div>
							
						</a>
												
					</div>
				
				<?php endwhile; ?>
			
			<?php endwhile; ?>
			
		</div>
		
	</div>
		
</div>