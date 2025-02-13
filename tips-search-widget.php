<?php
/**
 * The plugin is used to display Tips Verse data on your site.  
 *
 * @link              https://www.c-metric.com/
 * @since             1.0.0
 * @package           tips-auth
 *
 * @wordpress-plugin
 * Plugin Name:       TIPs: Find the Verse Widget For Customer  
 * Plugin URI:        https://www.c-metric.com/
 * Description:       This plugin allows you to display TIPs verse data directly within your website. This plugin enables seamless integration of TIPs content, allowing customers to easily access and view specific verses without leaving your site.
 * Version:           1.0.0
 * Author:            cmetric
 * Author URI:        https://www.c-metric.com/
 * License:           GPL-2.0+
 */

 

// If this file is called directly, abort.

if (! defined( 'ABSPATH' ) ) {
	die( "Please don't try to access this file directly." );
}
if ( ! defined( 'PLUGIN_NAME' ) ) {
	define( 'PLUGIN_NAME', 'tips-search-widget' );
}
if ( ! defined( 'TIPS_SEARCH_WIDGET_VERSION' ) ) {
	define( 'TIPS_SEARCH_WIDGET_VERSION', '0.0.1' );
}

if ( ! defined( 'TIPS_SEARCH_WIDGET_PLUGIN_URL' ) ) {
    define( 'TIPS_SEARCH_WIDGET_PLUGIN_URL', __FILE__ );
}

if ( ! defined( 'TIPS_SEARCH_WIDGET_DIR' ) ) {
    define( 'TIPS_SEARCH_WIDGET_DIR', plugin_dir_path( TIPS_SEARCH_WIDGET_PLUGIN_URL ) );
}

if ( ! defined( 'TIPS_SEARCH_WIDGET_URL' ) ) {
	define( 'TIPS_SEARCH_WIDGET_URL', plugin_dir_url( __FILE__ )  );
}

if ( ! defined( 'TIPS_SEARCH_WIDGET_BASENAME' ) ) {

	define( 'TIPS_SEARCH_WIDGET_BASENAME', plugin_basename( TIPS_SEARCH_WIDGET_PLUGIN_URL ) );

}
if ( ! defined( 'TIPS_SEARCH_WIDGET_TEXT_DOMAIN' ) ) {
	define( 'TIPS_SEARCH_WIDGET_TEXT_DOMAIN', 'tips-search-widget' );
}

if ( ! defined( 'TIPS_SEARCH_WIDGET_SLUG' ) ) {
	define( 'TIPS_SEARCH_WIDGET_SLUG', 'tips-search-widget' );
}
if ( ! defined( 'TIPS_SEARCH_WIDGET_API_URL' ) ) {
	define( 'TIPS_SEARCH_WIDGET_API_URL', 'https://tips.translation.bible/' );
}


// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-tips-search-widget-activation.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-tips-search-widget-common.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-tips-search-widget-api-common.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-tips-search-widget-class.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-tips-find-settings.php';

// Activation hook
register_activation_hook(__FILE__, array('Tips_Search_Widget_Activation', 'activate'));

// Initialize classes

$tips_data_management_active = new Tips_Search_Widget_Activation();
$tips_common = new Tips_Common();
$tips_api_common = new Tips_API_Common();


