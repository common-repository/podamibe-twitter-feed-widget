<?php
/*
Plugin Name:       Podamibe Twitter Feed Widget
Plugin URI:        http://podamibenepal.com/wordpress-plugins/
Description:       This plugin is used for displaying twitter feeds on your desired sidebars with various settings.
Version:           1.0.3
Author:            Podamibe Nepal
Author URI:        http://podamibenepal.com/ 
License:           GPLv2 or later
Text Domain:       ptf
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'PTF_PATH', plugin_dir_path( __FILE__ ) );
include( PTF_PATH . 'inc/podamibe-twitter-widget.php');

/**
 * Register and enqueue the required script
 */

function ptf_color_enqueue() {	    
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'ptf-box-color-js', plugin_dir_url( __FILE__ ) . 'assets/ptf-color-picker.js', array( 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'ptf_color_enqueue' );

function ptf_register_widget_scripts() {
	wp_enqueue_style( 'ptf-main-style', plugin_dir_url( __FILE__ ) . 'assets/ptf-style.css');
	wp_register_style( 'ptf-font-awesome', plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css');
	wp_enqueue_style( 'ptf-font-awesome' );
}
add_action( 'wp_enqueue_scripts', 'ptf_register_widget_scripts' );

function ptf_main_js_enqueue() {	    
	wp_register_script( 'ptf-main-js', plugin_dir_url( __FILE__ ) . 'assets/ptf-main-js.js' );
	wp_enqueue_script( 'ptf-main-js' );
}
add_action( 'wp_enqueue_scripts', 'ptf_main_js_enqueue' );