<?php
/**
 * Plugin Name: Stay Department
 * Plugin URI: https://staydepartment.com
 * Description: A menu for accessing content items.
 * Version: 1.0
 * Author: Rhylen Nguyen
 * Author URI: https://rhylennguyen.com
 */

function skz_content_enqueue_styles() {
  wp_register_style( 'widget_cta_css', plugins_url( 'skz_content.css', __FILE__ ) );
  wp_enqueue_style( 'widget_cta_css' );

  wp_enqueue_script('widget', plugin_dir_url(__FILE__) . 'skz-content.js');
  wp_enqueue_script('widget');
}

add_action( 'wp_enqueue_scripts', 'skz_content_enqueue_styles' );

add_action('admin_menu', 'skz_plugin_setup_menu');

function skz_plugin_setup_menu()
{
      add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'skz_init' );
}

function skz_init(){
    echo "<h1>Hello World!</h1>";
}

function skz_Content($atts) {

}

function skz_Add_Filter($atts) {

}

function skz_Add_Show($atts) {

}

function skz_Add_Episodes($atts) {

}
