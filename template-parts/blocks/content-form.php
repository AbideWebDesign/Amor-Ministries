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
	
<div class="wrapper-sm pb-0 text-center">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-md-10 col-lg-8">			
	
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
				
				<?php if ( $group_content['include_second_button'] ): ?>
				
					<div class="d-flex justify-content-center mb-4 text-center bg-light p-3">
											
						<?php if ( isset($group_content['second_button_title']) ): ?>
							
							<div class="align-self-center mr-3">
							
								<p class="mb-0"><strong><?php echo $group_content['second_button_title']; ?></strong></p>
								
							</div>
						
						<?php endif; ?>
						
						<div class="">
								
							<?php echo get_button($group_content); ?>
							
						</div>
						
					</div>
				
				<?php endif; ?>
				
				<div class="bg-light p-4">
					
					<?php echo do_shortcode('[gravityform id="' . $form_id . '" title="true" description="false" ajax="true" tabindex="49"]'); ?>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>