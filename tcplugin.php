<?php 
/* 
Plugin Name: TC T-shirt Design
Description: 
Author: dATomato team - dT-65
Author URI: '';
Version: 0.01

*/

function tcplugin_ajaxurl() {
	
	?> <script type="text/javascript">	ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	</script> <?php
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
add_action('wp_ajax_nopriv_getproduct','get_products_by_cat');
add_action('wp_ajax_getproduct','get_products_by_cat');
/* choose product from a category ends */


function get_productinfo_by_id(){
	if(isset($_POST['pid']) && !empty($_POST['pid'] )){
		global $wpdb;
		$sale = $price = 0;
		/* 
		$price = get_post_meta( $_POST['pid'], '_regular_price', true);
		$sale = get_post_meta( $_POST['pid'], '_sale_price', true);		
		 */
		
		$tcplugin_10_19 = get_post_meta($_POST['pid'],'tcplugin_10_19',TRUE); 
		$sale = $tcplugin_10_19;
		
		echo json_encode(array('sale'=>$sale,'price'=>$price));
	}
	die();
}
add_action('wp_ajax_nopriv_getproductinfo','get_productinfo_by_id');
add_action('wp_ajax_getproductinfo','get_productinfo_by_id');


function create_new_campaign(){
	if(isset($_POST['action']) && !empty($_POST['action'] ) && $_POST['action'] == 'create_camp'){
		global $wpdb;
		
		echo '<pre>'; print_R($_POST); echo '</pre>'; 
		
		echo $title = $_POST['camp_name'];	
		echo '<br/>'.$slug = preg_replace("/ /", '-', strtolower($title));
		
		/* 
		$post_id = wp_insert_post(
	     array(
		        'comment_status'  => 'closed',
		        'ping_status'   => 'closed',
		        'post_author'   => '1',
		        'post_name'   => $slug,
		        'post_title'    => $title,
		        'post_status'   => 'publish',
		        'post_type'   => 'campaign',
				'post_content'   =>  $_POST['camp_desc'],
				'tags_input' => explode(",",$_POST['camp_tags'])
		      )
	    );
		 */
		
		/* echo $post_id; */
		
		$cur_post_id = $post_id;

		/* image data processing starts */
		$data = $_POST['data'];
		list($type, $data) = explode(';', $data);
		list(, $data) = explode(',', $data);
		$data = base64_decode($data);		
		$target_path_image = get_home_path().'wp-content/uploads/'.date("Y").'/'.date('m').'/newtshirt.png';		
		file_put_contents($target_path_image, $data);
		/* image data processing ends */
		
		/* image addition to post starts */
		
		/* $parent_post_id = $post_id;
		$filename = $target_path_image;
		$filetype = wp_check_filetype( basename( $filename ), null );
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id ); */
		
		/* iamge addition to post ends */
	}
	die();
}
add_action('wp_ajax_nopriv_create_camp','create_new_campaign');
add_action('wp_ajax_create_camp','create_new_campaign');

function save_camp_image(){
	
}
add_action('wp_ajax_nopriv_save_img','save_camp_image');
add_action('wp_ajax_create_save_img','save_camp_image');
