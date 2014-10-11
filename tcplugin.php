<?php 
/* 
Plugin Name: TC T-shirt Design
Description: 
Author: dATomato team - dT-65
Author URI: '';
Version: 0.01

*/

function tcplugin_ajaxurl() {
	?> <script type="text/javascript">	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	</script> <?php
}
add_action('wp_head','tcplugin_ajaxurl');

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

function tc_initialize(){
	include(plugin_dir_path(__FILE__).'/inc/tccmb.php');
}
add_action( 'tcplugin_init', 'tc_initialize' );


function design_tshirt($attr){
	include(plugin_dir_path(__FILE__).'/inc/tcd_header.php');
	include(plugin_dir_path(__FILE__).'/inc/tcd_body.php');	
	include(plugin_dir_path(__FILE__).'/inc/tcd_footer.php');
	
}
add_shortcode('TCDesign','design_tshirt');



/* add option page starts */

function register_tcircle_settings(){	
	register_setting( 'tc-settings-group', 'rate_per_word' );
	register_setting( 'tc-settings-group', 'rate_per_image' );
}

function page_tcircle_options(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	include(plugin_dir_path(__FILE__).'/inc/tcd_options.php');
}


add_action( 'admin_menu', 'tcoption_settings' );
function tcoption_settings() {	
	add_action( 'admin_init', 'register_tcircle_settings' );
	add_options_page( 'TCircle Options', 'TCircle Options', 'manage_options', 'tcircle-options', 'page_tcircle_options' );
}







/* add option page ends */



/* choose product from a category starts */
function get_post_gallery_imges($item_id){
	$images = array(); 
	$args = array( 
		'post_type' => 'attachment', 
		'posts_per_page' => -1, 
		'post_status' =>'any', 
		'post_parent' => $item_id, 
		'exclude' => get_post_thumbnail_id($item_id) 
	);
	
	/* echo '<pre>'; print_r($args); echo '</pre>'; */
	
	$attachments = get_posts( $args );
	
	
	
	if ( $attachments ) {
		$x = 1;
		foreach ( $attachments as $attachment ) {
			$images[$x] = wp_get_attachment_url( $attachment->ID );
			$x = $x + 1;
		}
	}
	
	/* echo '<pre>'; print_r($images); echo '</pre>';   */
	return $images;
}

function get_products_by_cat(){
	if(isset($_POST['cat']) && !empty($_POST['cat'] )){		
		$args = array(
			'posts_per_page'   => 10,
			'offset'           => 0,
			'product_cat'      => $_POST['cat'],
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'product',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		); 
		
		$posts_array = get_posts( $args );
		$post_data = array();
		foreach($posts_array AS $vals){
			
			
			$gallery_images = get_post_gallery_imges($vals->ID);
			
			$post_data[]=array(
				'url'=>wp_get_attachment_thumb_url( get_post_thumbnail_id($vals->ID)),				
				'title' => $vals->post_title,		
				'prod_id' => $vals->ID,
				'gallery' => $gallery_images
			);
		}
		if(!empty($post_data)){
			echo json_encode($post_data);
		}
	}	
	die();
}
add_action('wp_ajax_noprev_getproduct','get_products_by_cat');
add_action('wp_ajax_getproduct','get_products_by_cat');
/* choose product from a category ends */


function get_productinfo_by_id(){
	if(isset($_POST['pid']) && !empty($_POST['pid'] )){
		global $wpdb;
		$price = get_post_meta( $_POST['pid'], '_regular_price', true);
		$sale = get_post_meta( $_POST['pid'], '_sale_price', true);		
		echo json_encode(array('sale'=>$sale,'price'=>$price));
	}
	die();
}
add_action('wp_ajax_noprev_getproductinfo','get_productinfo_by_id');
add_action('wp_ajax_getproductinfo','get_productinfo_by_id');
