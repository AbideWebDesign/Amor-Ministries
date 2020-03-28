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
$logo_dark = get_field('logo_dark', 'options');
$logo_light = get_field('logo_light', 'options');
$logo_scroll = get_field('logo_scroll', 'options');

$logo_dark_src = wp_get_attachment_image_src($logo_dark['id'], 'full', false);
$logo_light_src = wp_get_attachment_image_src($logo_light['id'], 'full', false);
$logo_scroll_src = wp_get_attachment_image_src($logo_scroll['id'], 'full', false);

// Get header type
if ( get_field('header_type') == 'Transparent' ) {
	
	$header_class = 'header-clear';
	$navbar_color = get_field('navbar_color'); 
	
} else {
	
	$header_class = 'header-white';
	$navbar_color = 'navbar-light';

}

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
			  	$('.logo').hide();
			  	$('.logo').attr('width', '200');
			  	$('#header-dark-logo').attr('src', '<?php echo $logo_scroll_src[0]; ?>');
			  	$('#header-light-logo').attr('src', '<?php echo $logo_scroll_src[0]; ?>');
			  	$('.logo').show();
			  	
			  } else {
				  
			  	$('.navbar').removeClass('affix');
			  	$('.logo').hide();
			  	$('.logo').attr('width', '300');
			  	$('#header-dark-logo').attr('src', '<?php echo $logo_dark_src[0]; ?>');
			  	$('#header-light-logo').attr('src', '<?php echo $logo_light_src[0]; ?>');
			  	$('.logo').show();
			  	
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

<?php global $post; ?>

<?php if ( has_block('acf/hero-banner', $post) ): ?>

	<body <?php body_class('has-hero-banner'); ?>>

<?php else: ?>

	<body <?php body_class(); ?>>

<?php endif; ?>

<?php get_template_part('template-parts/blocks/content', 'alert'); ?>

<div class="site" id="page">
	
	<div id="wrapper-navbar" class="<?php echo $header_class; ?>">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'amor' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-lg fixed-top <?php echo $navbar_color; ?> <?php echo ( has_alert() ? 'has-alert' : ''); ?>" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				
				<?php esc_html_e( 'Main Navigation', 'amor' ); ?>
			
			</h2>
		
			<div class="container">
			
				<a class="navbar-brand navbar-brand-light" href="<?php echo home_url(); ?>"><img id="header-light-logo" src="<?php echo $logo_light_src[0]; ?>" class="img-fluid logo" width="300" alt="Amor Ministries" /></a>
				
				<a class="navbar-brand navbar-brand-dark" href="<?php echo home_url(); ?>"><img id="header-dark-logo" src="<?php echo $logo_dark_src[0]; ?>" class="img-fluid logo" width="300" alt="Amor Ministries" /></a>

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

	</div><!-- #wrapper-navbar end -->
