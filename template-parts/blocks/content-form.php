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
?>
<?php if ( $group_content['title'] ): ?>
	
	<div class="wrapper-sm text-center">
		
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

<?php endif; ?>
<div class="wrapper wrapper-form bg-<?php echo $bg_color_class; ?>">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-md-11 col-lg-9 col-xl-7">
				
					
				<div class="bg-light p-4">
					
					
					
					<?php echo do_shortcode('[gravityform id="' . $form_id . '" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]'); ?>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>