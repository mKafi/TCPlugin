<?php 
/* 
Plugin Name: TC T-shirt Design
Description: 
Author: dATomato team - dT-65
Author URI: '';
Version: 0.01

*/

function style_scripts() {        
	wp_enqueue_style( 'tcplugin_style', plugins_url( '/css/tcplugin_style.css', __FILE__ ));	
	wp_register_script('mycustom_js', plugins_url( '/js/tcplugin_script.js', __FILE__ ), array('jquery'), null, false );
    wp_enqueue_script('mycustom_js');	
}
add_action( 'wp_enqueue_scripts', 'style_scripts', 20, 1);


function admin_style_scripts(){
	wp_register_style( 'tcplugin_admin_style', plugins_url('/css/tcplugin_admin_style.css',__FILE__), false, '1.0.0' );
    wp_enqueue_style( 'tcplugin_admin_style' );
}
add_action( 'admin_enqueue_scripts', 'admin_style_scripts' );

function get_design_page(){
	include('inc/get_design.php');
}

function tc_design(){
    add_menu_page( 'TC Design', 'TC Design', 'manage_options', 'tc-design', 'get_design_page', plugins_url('images/T-Shirt_ico.png',__FILE__), 6 );
}
add_action( 'admin_menu', 'tc_design' );


function design_tshirt($attr){
	include(plugin_dir_path(__FILE__).'/inc/tcd_header.php');
	include(plugin_dir_path(__FILE__).'/inc/tcd_body.php');	
	include(plugin_dir_path(__FILE__).'/inc/tcd_footer.php');
	
}
add_shortcode('TCDesign','design_tshirt');
