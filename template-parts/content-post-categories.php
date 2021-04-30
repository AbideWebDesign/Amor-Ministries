<div class="bg-light wrapper-sm">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-12">
				
				<h3 class="mb-4"><?php _e('Topics'); ?></h3>
				
				<?php $categories = get_the_category(); ?>
				
				<?php foreach ( $categories as $category ): ?>
				
					<?php  printf( '<a class="btn btn-primary mr-1 mb-2" href="%1$s"><span class="text-muted">#</span> %2$s</a><br />', esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name ) ); ?>
				
				<?php endforeach; ?>
				
			</div>
			
		</div>
		
	</div>
	
</div>