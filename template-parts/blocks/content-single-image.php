<?php $image = get_field('single_image'); ?>

<?php $caption = wp_get_attachment_caption( $image ); ?>

<div class="py-0">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-lg-10 col-xl-8">
				
				<?php echo wp_get_attachment_image( $image, 'Full', false, array('class'=>'img-fluid') ); ?>
				
				<?php if ( $caption ): ?>
				
					<div class="text-center text-sm mt-1"><strong><?php echo $caption; ?></strong></div>
				
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</div>
	
</div>