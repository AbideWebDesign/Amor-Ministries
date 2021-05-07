<?php
/**
 * Amor functions and definitions
 *
 * @package amor
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/AbideWebDesign/Amor-Ministries/',
	__FILE__,
	'Amor-Ministries'
);

$amor_includes = array(
	'/setup.php',														// Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/pagination.php',                      // Custom pagination for this theme.
	'/class-wp-bootstrap-navwalker.php',   
	'/editor.php',                          // Load Editor functions.
	'/page-blocks.php',											// Load ACF page blocks.
	'/fundraiser.php',
);

foreach ( $amor_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}