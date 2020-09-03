<?php
/**
 * Template Name: Login 
 *
 * @package amor
 */

if ( is_user_logged_in() ):
	
	wp_redirect(home_url() . '/wp-admin');
	
	exit;	

endif;

get_header(); ?>

<div id="primary" class="content-area py-2">
	
	<div class="page-wrapper-pattern mb-5"></div>
	
	<div class="container">
	
		<div class="row justify-content-center align-self-center">
			
			<div class="col-md-6 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3">
				
				<h2 class="text-center mb-3">Login</h2>
				
				<div class="bg-light p-4 mb-5">
					
					<?php while ( have_posts() ) : the_post(); ?>
				
						<?php if ( ! is_user_logged_in() ): // Display WordPress login form: ?>
													
							<?php if ( isset( $_GET['login'] ) && !$_GET['login'] == 'empty' ): ?>
							
								<div class="alert alert-danger">
									
									<?php if ( $_GET['login'] == 'failed' ): ?>
									
										<p class="mb-0 small"><strong>ERROR</strong>: Your Username and Password combination is incorrect.</p>
									
									<?php endif; ?>
									
								</div>
								
							<?php endif; ?>
							
							<?php 
						    
						    $args = array(
						        'redirect' => home_url() . '/wp-admin', 
						        'form_id' => 'loginform',
						        'label_username' => __( 'Username', 'amor' ),
						        'label_password' => __( 'Password', 'amor' ),
						        'label_remember' => __( 'Remember Me', 'amor' ),
						        'label_log_in' => __( 'Sign in', 'amor' ),
						        'remember' => true
						    );
						    
						    wp_login_form( $args );
						
							?>
							
							<p class="meta text-center mb-0"><a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Forgot password?</a></p>
	
						<?php else: // If logged in: ?>
							
							<?php wp_redirect( home_url() ); ?> 
							
							<?php exit; ?>
						
						<?php endif; ?>
			
					<?php endwhile; ?>
					
				</div>
				
			</div>
			
			<div class="col col-lg-4 col-xl-3 offset-xl-1 align-self-center mb-4 mb-lg-0">

				<?php the_field('login_assistance_message', 'options'); ?>

			</div>
			
		</div>
					
	</div>
			
</div>

<?php get_footer(); ?>