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
$logo = get_field('logo', 'options');
$logo_scroll = get_field('logo_scroll', 'options');

$logo_src = wp_get_attachment_image_src($logo['id'], 'full', false);
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
		$(window).scroll(function() {
				  
			  /* affix after scrolling 100px */
			  if ($(document).scrollTop() > 100) {
				  
			  	$('.navbar').addClass('affix');
			  	$('#header-logo').hide();
			  	$('#header-logo').attr('width', '200');
			  	$('#header-logo').attr('src', '<?php echo $logo_scroll_src[0]; ?>');
			  	$('#header-logo').show();
			  	
			  } else {
				  
			  	$('.navbar').removeClass('affix');
			  	$('#header-logo').hide();
			  	$('#header-logo').attr('width', '300');
			  	$('#header-logo').attr('src', '<?php echo $logo_src[0]; ?>');
			  	$('#header-logo').show();
			  	
			  }
		});	
		
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
<div class="site" id="page">
	
	<div id="wrapper-navbar" class="<?php echo $header_class; ?>">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'amor' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-lg fixed-top <?php echo $navbar_color; ?>" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'amor' ); ?>
			</h2>

		
			<div class="container">
			
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><img id="header-logo" src="<?php echo $logo_src[0]; ?>" class="img-fluid logo" width="300" alt="Amor Ministries" /></a>
				
				<div class="d-flex">
					
					<?php if ( get_field('page_type') != 'Donation' ): ?>
							
						<div class="d-lg-none mr-2">
							<a href="<?php echo home_url('/donate'); ?>" class="btn btn-sm btn-yellow">Donate</a>
						</div>		
						
					<?php endif; ?>
					

				</div>

								
				
				
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
