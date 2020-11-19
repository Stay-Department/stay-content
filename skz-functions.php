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
   wp_register_style( 'widget_cta_css', plugins_url( 'skz-content.css', __FILE__ ) );
   wp_enqueue_style( 'widget_cta_css' );

   wp_register_script('imagesloaded_js', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery') );
   wp_register_script('isotope_js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', array('jquery'));
   wp_register_script('widget_js', plugin_dir_url(__FILE__) . 'skz-content.js');


   wp_enqueue_script('imagesloaded_js');
   wp_enqueue_script('isotope_js');
   wp_enqueue_script('widget_js');

 }

 add_action( 'wp_enqueue_scripts', 'skz_content_enqueue_styles' );
