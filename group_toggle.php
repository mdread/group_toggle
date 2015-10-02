<?php
/**
 * Plugin Name: GroupToggle Shortcode
 * Plugin URI: https://github.com/mdread/group_toggle
 * Description: This plugin adds a shortcode(group_toggle) to toggle visibility of a group of objects.
 * Version: 1.0.0
 * Author: Daniel Camarda
 * Author URI: https://github.com/mdread
 * License: MIT
 */


function group_toggle($atts, $content = null) {
    extract(shortcode_atts(array(
        "title" => 'Show / Hide'
    ), $atts));

		return '<div class="group-toggle" style="margin-bottom:10px;">' .
							'<div class="group-toggle-title">' .
								'<button type="button" class="btn btn-default btn-lg btn-block">' . $title . '</button>' .
							'</div>' .
							'<div class="group-toggle-content" style="display: none;">' .
								do_shortcode($content) .
							'</div>' .
						'</div>';
}
add_shortcode("group_toggle", "group_toggle");

function enqueue_grouptoggle() {
	wp_enqueue_style( 'grouptoggle-style', plugin_dir_url( __FILE__ ) . '/css/grouptoggle.css', array(), '1.0' );
	wp_enqueue_script( 'grouptoggle-script' , plugin_dir_url( __FILE__ ) . '/js/grouptoggle.js' , array('jquery'), '1.0');
}
add_action( 'wp_enqueue_scripts', 'enqueue_grouptoggle' );


function add_button_grouptoggle() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin_grouptoggle');
     add_filter('mce_buttons', 'register_button_grouptoggle');
   }
}
add_action('init', 'add_button_grouptoggle');

function register_button_grouptoggle($buttons) {
   array_push($buttons, "group_toggle");
   return $buttons;
}

function add_plugin_grouptoggle($plugin_array) {
   $plugin_array['group_toggle'] = plugin_dir_url( __FILE__ ) . '/js/grouptoggle-mcebutton.js';
   return $plugin_array;
}
?>
