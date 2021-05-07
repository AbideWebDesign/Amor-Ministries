<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get logo field (array)
$logo_scroll = get_field('logo_blog', 'options');
$logo_scroll_src = wp_get_attachment_image_src($logo_scroll['id'], 'full', false);

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<script>
		
	( function($) {
		
		/**
		* Header sticky navbar
		*
		* Change image on scroll
		*
		*/
		
		$( window ).scroll( function() {
				  
			  /* affix after scrolling 70px */
			  if ( $(document).scrollTop() > 50 ) {
				  
			  	$('.navbar').addClass('affix');
			  	
			  } else {
				  
			  	$('.navbar').removeClass('affix');
			  	
			  }
		} );	
		
	})(jQuery);	
	
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162055320-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-162055320-1');
	</script>

</head>
<body <?php body_class(); ?>>
<?php global $post; ?>

<?php get_template_part('template-parts/blocks/content', 'alert'); ?>

<div class="site" id="page">
	
	<div id="wrapper-navbar" class="fixed-top">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'amor' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-lg  navbar-dark <?php echo ( has_alert() ? 'has-alert' : ''); ?>" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				
				<?php esc_html_e( 'Main Navigation', 'amor' ); ?>
			
			</h2>
		
			<div class="container">
							
				<a class="navbar-brand navbar-brand-dark" href="<?php echo home_url(); ?>"><img id="header-dark-logo" src="<?php echo $logo_scroll_src[0]; ?>" class="img-fluid logo" width="200" alt="Amor Ministries" /></a>

				<div class="d-flex">
					
					<?php if ( get_field('page_type') != 'Donation' ): ?>
							
						<div class="d-lg-none mr-2">
							
							<a href="<?php echo home_url('/donate'); ?>" class="btn btn-sm btn-yellow">Donate</a>
						
						</div>		
						
					<?php endif; ?>
					
					<div class="col-auto d-lg-none align-self-center">
					
						<?php shiftnav_toggle( 'shiftnav-main' , '' , array( 'icon' => 'bars' , 'class' => 'shiftnav-toggle-button') ); ?>
					
					</div>
				</div>

				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'd-none d-lg-block',
						'container_id'    => 'navbarNavXL',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Amor_WP_Bootstrap_Navwalker(),
					)
				); ?>
				
				
				
			</div><!-- .container -->

		</nav><!-- .site-navigation -->
		
		<?php if ( is_single() || is_category() ): ?>
	
			<div class="bg-light py-3">
				
				<div class="container">
					
					<div class="row">
						
						<div class="col-auto">
							
							<a href="<?php echo home_url('/stories'); ?>" class="btn-text"><?php _e('Recent Stories'); ?></a>
							
						</div>
						
						<div class="col-auto">
							
							<div class="dropdown">
							
								<a href="#" class="btn-text" role="button" id="cats-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php _e('Categories'); ?> <i class="fa fa-chevron-down"></i></a>
									
								<div class="dropdown-menu" aria-labelledby="cats-dropdown">
									
									<?php $categories = get_categories( array( 'orderby' => 'name', 'order' => 'ASC' ) ); ?>
									
									<?php foreach ( $categories as $cat ): ?>
									
										<div class="border-bottom py-1">
											
											<a class="dropdown-item" href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a>
											
										</div>
									
									<?php endforeach; ?>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
		
		<?php endif; ?>

	</div><!-- #wrapper-navbar end -->