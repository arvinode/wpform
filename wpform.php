<?php
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 * Requires Plugins:  my-plugin, yet-another-plugin
 */

/*
 * Register the "book" custom post type
 */
function wpform_setup_post_type() {
    register_post_type( 'book', [
        'public' => true
    ] );
}

add_action( 'init', 'wpform_setup_post_type' );


/*
 * Activate the plugin
 */
function wpform_activate() {

    // Register the custom post type
    wpform_setup_post_type();

    // Refresh WordPress rewrite rules
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'wpform_activate' );


/*
 * Deactivate the plugin
 */
function wpform_deactivate() {

    // Refresh WordPress rewrite rules
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'wpform_deactivate' );