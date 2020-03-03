<?php
/**
 * Template Name: Password Reset 
 *
 * @package amor
 */

get_header(); ?>

<div id="primary" class="content-area py-2">

	<div class="page-wrapper-pattern mb-5"></div>
		
	<div class="container">
	
		<div class="row justify-content-center">
	
			<div class="col-xl-4">
	
				<h2 class="text-center mb-3"><?php _e('Password Reset','csdschools'); ?></h2>		
				
				<div class="bg-light p-4 mb-5">
	
					<?php
					
					global $wpdb;
					
					$error = '';
					$success = '';
					
					// check if we're in reset form
					if ( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) {
	
						$email = trim( $_POST['user_login'] );
						
						if ( empty( $email ) ) {
							
							$error = 'Please enter a username or e-mail address.';
						
						} elseif ( ! is_email( $email ) ) {
							
							$error = 'This username or email does not exist';
						
						} elseif ( ! email_exists( $email ) ) {
							
							$error = 'There is no user registered with that email address.';
						
						} else {
							
							$random_password = wp_generate_password( 12, false );
							
							$user = get_user_by( 'email', $email );
							
							$update_user = wp_update_user( array (
									'ID' => $user->ID, 
									'user_pass' => $random_password
								)
							);
							
							// if  update user return true then lets send user an email containing the new password
							if ( $update_user ) {
								
								$email_message = get_field('reset_password_email', 'options'); 
								
								$to = $email;
								$subject = 'Amor Ministires - Password Reset';
								$sender = 'Amor Ministries';
								
								$message = $email_message . '<br><strong>New Amor Password: </strong>' . $random_password;
								
								$headers[] = 'MIME-Version: 1.0' . "\r\n";
								$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers[] = "X-Mailer: PHP \r\n";
								$headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";
								
								$mail = wp_mail( $to, $subject, $message, $headers );
								
								if ( $mail ) {
									
									$success = 'Check your email address for your new password!';
									
								} else {
							
									$error = 'Something went wrong updating your account.';
									
								}
							
							}
							
						}
						
						if ( ! empty( $error ) ) {
						
							echo '<div class="alert alert-danger"><p class="mb-0 small"><strong>ERROR:</strong> '. $error .'</p></div>';
							
						}
						
						if ( ! empty( $success ) ) {
						
							echo '<div class="alert alert-warning"><p class="mb-0 small">'. $success .'</p></div>';
					
						}
					}
					?>

					<!--html code-->
					<form id="forgot-password" method="post">
						
						<p>Please enter your username or email address. You will receive an email your new password.</p>
						
						<div class="form-group">
						
							<label for="user_login">Username or Email:</label>
							
							<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
							
							<input type="text" name="user_login" id="user_login" class="form-control" value="<?php echo $user_login; ?>" />
						
						</div>
						
						<input type="hidden" name="action" value="reset" />
						
						<input type="submit" value="Get New Password" class="btn btn-primary btn-block" id="submit" />
						
						<p class="meta text-center pt-4 mb-0"><a href="<?php echo home_url('/login/'); ?>" title="Lost Password">Return to Login</a></p>
						
					</form>
				
				</div>
				
			</div>
			
		</div>
					
	</div>		
	
</div>

<?php get_footer(); ?>