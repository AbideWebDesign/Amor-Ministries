<?php $banner_content = get_field('hero_banner_content'); ?>

<?php if ( $banner_content['include_progress_bar'] ): ?>

	<?php $goal = $banner_content['fundraiser_goal']; ?>
		
	<?php $progress = get_fundraiser_progress( $goal, $banner_content['form'] ); ?>
	
	<?php $total = get_fundraiser_total( $goal, $banner_content['form'] ); ?>
	
	<div class="bg-light py-3">
		
		<div class="container">
			
			<div class="row justify-content-center">
				
				<div class="col-12 col-md-auto align-self-center text-center text-md-left">
					
					<h4 class="mb-1"><?php echo _e('Fundraising Goal: $'); ?><?php echo $goal; ?></h4>
					
					<h4 class="mb-3 mb-md-0"><?php echo _e('Total Raised: $'); ?><?php echo $total; ?></h4>
					
				</div>
				
				<div class="col-12 col-md-auto flex-grow-1">
					
					<div class="progress h-100">
						
						<div class="progress-bar" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
						
						<h4></h4>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

<?php endif; ?>