<?php
/**
 * Theme basic setup
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'amor_setup' );

if ( ! function_exists( 'amor_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function amor_setup() {


		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'amor' ),
			'footer1' => __( 'Footer Column 1', 'amor' ),
			'footer2' => __( 'Footer Column 2', 'amor' ),
			'footer3' => __( 'Footer Column 3', 'amor' ),
			'footer4' => __( 'Footer Column 4', 'amor' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
	}
}

// Disable Wordpress Scalling Feature
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );

add_image_size('Hero Banner', 2880, 800, true);
add_image_size('Hero Banner Mobile', 1280, 491, true);
add_image_size('Hero Banner Foreground', 600, 400, true);
add_image_size('Side Cover', 1067, 1600, true);
add_image_size('Icon', 240, 240);
add_image_size('Side', 1170, 846, true);
add_image_size('Background', 3400, 2000, true);
add_image_size('Card', 500, 348, true);
add_image_size('Image Group', 595, 395, true);
add_image_size('Image Group Rounded', 405, 405, true);


add_filter( 'excerpt_more', 'amor_custom_excerpt_more' );

if ( ! function_exists( 'amor_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function amor_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'amor_all_excerpts_get_more_link' );

if ( ! function_exists( 'amor_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function amor_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary amor-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
			'amor' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

/**
 * ACF Option Groups
 *
 */
if ( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Alerts',
		'menu_title'	=> 'Alerts',
		'menu_slug' 	=> 'alerts',
		'icon_url' 		=> 'dashicons-megaphone',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/*
 * Admin bar customizations
 *
 */
function admin_bar_render() {
	
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_menu('searchwp');
    $wp_admin_bar->remove_menu('delete-cache');
	$wp_admin_bar->remove_menu('litespeed-menu');
	
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );

/*
 * Change admin bar labels
 *
 */
function change_admin_labels( $wp_admin_bar ) {
	
	if ( check_user_role( array( 'fundraiser' ) ) ) { 
		
		$my_account = $wp_admin_bar->get_node('my-account');
		
		$newtext = str_replace( 'Howdy,', '<span class="dashicons dashicons-menu"></span>', $my_account->title );
		
		$wp_admin_bar->add_node( array(
			'id' => 'my-account',
			'title' => $newtext,
		) );	
	
	}
	
}
add_action( 'admin_bar_menu', 'change_admin_labels', 25);

/*
 * Remove unused dashboard widgets
 *
 */
function remove_dashboard_widgets() {
	
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/*
 * Hide admin notifications for non-admins
 *
 */
function hide_update_msg_non_admins(){
	
	if ( !current_user_can( 'manage_options' ) ) { // non-admin users
    	
    	echo '<style>#setting-error-tgmpa>.updated settings-error notice is-dismissible, .update-nag, .updated { display: none; }</style>';
        
	}
}
add_action( 'admin_head', 'hide_update_msg_non_admins');

/*
 * Add custom favicon to admin pages
 *
 */
function add_login_favicon() {
	
	$favicon_url = get_stylesheet_directory_uri() . '/favicon.png';

	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	
}
add_action('login_head', 'add_login_favicon');
add_action('admin_head', 'add_login_favicon');
add_action('wp_head', 'add_login_favicon');
/*
 * Remove absolute styling on mobile when logged in
 *
 */
function admin_bar_style_override() {
	
	if ( is_user_logged_in() ) {
		
		?>
		
		<style>
		
			#wpadminbar {
				position: fixed;
			}
			#directory-categorydiv, .ac-message, #ac-pro-version, #direct-feedback, .installer-plugin-update-tr, .plugins .dashicons, .shortpixel-notice, #emr-news, .wrap.emr_upload_form .option-flex-wrapper, .emr_upload_form #message {
				display: none;
			}
			form#your-profile > h3, form#your-profile .user-profile-picture, form#your-profile .user-description-wrap, form#your-profile .user-display-name-wrap, form#your-profile .user-nickname-wrap, form#your-profile .show-admin-bar, .user-comment-shortcuts-wrap, form#your-profile .yoast-settings, form#your-profile .user-rich-editing-wrap, form#your-profile .user-admin-color-wrap, form#your-profile .user-url-wrap, form#your-profile .user-facebook-wrap, form#your-profile .user-instagram-wrap, form#your-profile .user-linkedin-wrap, form#your-profile .user-myspace-wrap, form#your-profile .user-pinterest-wrap, form#your-profile .user-soundcloud-wrap, form#your-profile .user-tumblr-wrap, form#your-profile .user-twitter-wrap, form#your-profile .user-youtube-wrap, form#your-profile .user-wikipedia-wrap  {
				display: none;
			}
			#your-profile h2 {
				display: none;
			}
	<?php
		
		if ( check_user_role ( array( 'fundraiser' ) ) ) {
		
			echo ".dashicons{font-family: dashicons !important;}#wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {background-color: #0f71b6; color: white;} #wpadminbar #wp-admin-bar-my-account.with-avatar #wp-admin-bar-user-actions>li {margin-left: 20px;} #wpadminbar, #wpadminbar .menupop .ab-sub-wrapper, #wpadminbar .shortlink-input {background-color: #0f71b6;} .avatar, #screen-meta-links, .user-sessions-wrap, #adminmenumain, #wp-admin-bar-site-name, #wp-admin-bar-user-info, #wp-admin-bar-edit { display: none !important; } #wpcontent, #wpfooter { margin-left: 0; } #admin-fundraiser-link { background-color: #fbd402; position: absolute; top: 20px; right: 20px; padding: 10px; width: auto;}";
			
		}
		
	}
	
	echo "</style>";
	
}
add_action('wp_head', 'admin_bar_style_override');
add_action('admin_head', 'admin_bar_style_override');

// Add custom field to fundraiser profile page
function add_fundraiser_field( $user ) {

	if ( check_user_role( array( 'fundraiser' ) ) ) { 

		?>
		
		    <div id="admin-fundraiser-link" class="form-table">
		    	<strong>Fundraiser Page Link:</strong> <a href="<?php echo home_url(); ?>/fundraiser/<?php echo $user->user_nicename; ?>"><?php echo home_url(); ?>/fundraiser/<?php echo $user->user_nicename; ?></a>
		    </div>
		           
		<?php
		
	}
	
}
add_action( 'show_user_profile', 'add_fundraiser_field' );
add_action( 'edit_user_profile', 'add_fundraiser_field' );

// Helper function to check user roles
function check_user_role($roles, $user_id = null) {
	
	if ( $user_id ) {
		
		$user = get_userdata( $user_id );
		
	} else {

		$user = wp_get_current_user();

	}

	if ( empty( $user ) ) {
		
		return false;
		
	}
	
	foreach ( $user->roles as $role ) {
		
		if ( in_array($role, $roles) ) {
			
			return true;
		
		}
	
	}
	
	return false;
}

// Custom Login functions

function redirect_login_page() {
	
	global $page_id;
	
	$login_page = home_url( '/login/' );
	
	$page = basename($_SERVER['REQUEST_URI']);

	if ( $page == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		wp_redirect($login_page);
		
		exit;
	
	}
	
}
add_action('init', 'redirect_login_page');

function redirect_lostpassword_page() {
    
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
	    
        if ( is_user_logged_in() ) {
        
            $this->redirect_logged_in_user();
        
            exit;
        
        }
 
        wp_redirect( home_url( 'password-reset' ) );
        
        exit;
        
    }
    
}
add_action( 'login_form_lostpassword', 'redirect_lostpassword_page');

function login_failed() {
	
    $login_page  = home_url( '/login/' );
    
    wp_redirect($login_page . "?login=failed");
    
    exit;

}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
    
    $login_page  = home_url( '/login/' );
    
    if ( $username == "" || $password == "" ) {
		
		wp_redirect( $login_page . "?login=empty" );
        
		exit;
    
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

// Auto login to site after GF User Registration form submission
function user_registration_autologin( $user_id, $config, $entry, $password ) {

	wp_set_auth_cookie( $user_id, false, '' );
}
add_action( 'gform_user_registered','user_registration_autologin', 10, 4 );