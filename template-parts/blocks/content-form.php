<?php
/**
 * Block Name: Form
 *
 * This is the template that displays full width forms.
 */

$group_content = get_field('group_content');
$bg_color = get_field('background_color');
$bg_color_class = get_color_class($bg_color);
$form_id = $group_content['form']; 

if ( $group_content['small_form'] ) {
	
	$form_col_classes = 'col-md-8 col-lg-5 col-xl-4 form form-sm';

} else {
	
	$form_col_classes = 'col-md-11 col-lg-9 col-xl-7 form';
	
}

?>

<?php if ( $group_content['title'] ): ?>
	
<div class="wrapper-sm pb-0">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-md-10 col-lg-8 text-center">			
	
				<h1><?php echo $group_content['title']; ?></h1>
				
				<?php if ( $group_content['text'] ): ?>
				
					<div class="lead">
						
						<?php echo $group_content['text']; ?>
						
					</div>
				
				<?php endif; ?>
				
			</div>
		
		</div>
	
	</div>

</div>

<?php endif; ?>

<div class="wrapper wrapper-form bg-<?php echo $bg_color_class; ?>">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="<?php echo $form_col_classes; ?>">
				
				<?php if ( $group_content['include_button'] ): ?>
				
					<div class="d-flex justify-content-center mb-4 text-center bg-light p-3">
											
						<?php if ( $group_content['primary_button_title'] ): ?>
							
							<div class="align-self-center mr-3">
							
								<p class="mb-0"><strong><?php echo $group_content['primary_button_title']; ?></strong></p>
								
							</div>
						
						<?php endif; ?>
						
						<div>

							<a href="<?php echo $group_content['primary']['button_link']['url']; ?>" class="btn btn-<?php echo  get_color_class( $group_content['primary']['button_color'] ); ?>"><?php echo $group_content['primary']['button_label']; ?></a>
							
						</div>
						
					</div>
					
					<?php if ( $group_content['include_second_button'] ): ?>
					
						<div class="d-flex justify-content-center mb-4 text-center bg-light p-3">
											
						<?php if ( $group_content['secondary_button_title'] ): ?>
							
							<div class="align-self-center mr-3">
							
								<p class="mb-0"><strong><?php echo $group_content['secondary_button_title']; ?></strong></p>
								
							</div>
						
						<?php endif; ?>
						
						<div>

							<a href="<?php echo $group_content['secondary']['button_link']['url']; ?>" class="btn btn-<?php echo  get_color_class( $group_content['secondary']['button_color'] ); ?>"><?php echo $group_content['secondary']['button_label']; ?></a>
							
						</div>
						
					</div>

					
					<?php endif; ?>
				
				<?php endif; ?>
				
				<div class="bg-light p-4">
					
					<?php echo do_shortcode('[gravityform id="' . $form_id . '" title="true" description="false" ajax="true" tabindex="49"]'); ?>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>