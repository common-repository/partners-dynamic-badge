<?php 
/*Plugin Name: Partners Dynamic Badge
Description: This plugin enables Partners to add the new Partners dynamic badge on their posts, pages or widgets with zero hassle.
Author: Aassaf Trafikant
Version: 1.2
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directl

define("GPDB_PLUGIN_ID", "GPDB");
define("GPDB_PLUGIN_NAME", "Partners Dynamic Badge");

add_action( 'admin_menu', 'GPDB_settings_menu' );
add_action('admin_head', 'GPDB_admin_styles');
add_shortcode( 'gpbadge', 'GPDB_gpbadge' );
add_filter('widget_text','do_shortcode');

function GPDB_settings_menu(){
	add_options_page(
		GPDB_PLUGIN_NAME,
		GPDB_PLUGIN_NAME,
		8,
		GPDB_PLUGIN_ID,
		'render_GPDB_settings_page'
	 );
}

function GPDB_admin_styles() {
	wp_register_style( GPDB_PLUGIN_ID . '-admin-style', plugins_url( 'css/gpdb-admin-style.css', __FILE__) ); 

	wp_enqueue_style( GPDB_PLUGIN_ID . '-admin-style' );
}

function render_GPDB_settings_page() {
	include_once ("settings.php");
}

function GPDB_gpbadge(){
	return '<script src="https://apis.google.com/js/platform.js" async defer></script><div class="g-partnersbadge" data-agency-id="'. get_option( 'gpdb-number' ) . '"></div>';
}