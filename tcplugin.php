<?php 
/* 
Plugin Name: TC T-shirt Design
Description: 
Author: dATomato team - dT-65
Author URI: '';
Version: 0.01

*/

function get_design_page(){
	include('inc/get_design.php');
}

function tc_design(){
    add_menu_page( 'TC Design', 'TC Design', 'manage_options', 'tc-design', 'get_design_page', plugins_url('images/T-Shirt_ico.png',__FILE__), 6 );
}
add_action( 'admin_menu', 'tc_design' );
