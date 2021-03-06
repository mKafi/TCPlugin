<?php 
/* 
Plugin Name: T-shirt Design
Description: 
Author: dATomato team - dT-65
Author URI: '';
Version: 0.01

*/


if ( ! class_exists( 'WP_List_Table' ) ) { require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' ); }
	
function tcplugin_ajaxurl() {	
	?> 
	<script type="text/javascript">	
		ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	baseurl = '<?php  echo plugins_url(); ?>';	site_url = '<?php  echo site_url(); ?>'; 
		icon_price = parseFloat( <?php echo esc_attr( get_option('per_text_rate') ); ?> , 10);
		text_price = parseFloat( <?php echo esc_attr( get_option('per_image_rate') ); ?> , 10);
	</script> 
	<?php
}
add_action('wp_head','tcplugin_ajaxurl');

function style_scripts() {        
	wp_enqueue_style( 'tcplugin_style', plugins_url( '/css/tcplugin_style.css', __FILE__ ));		
	
	wp_register_script('formjquery_js', 'http://malsup.github.com/jquery.form.js', array('jquery'), null, false );	
    wp_enqueue_script('formjquery_js');
    
	wp_register_script('easyzoom_js', plugins_url( '/js/easyzoom.js', __FILE__ ), array('jquery'), null, false );	
    wp_enqueue_script('easyzoom_js');
    
	wp_register_script('mycustom_js', plugins_url( '/js/tcplugin_script.js', __FILE__ ), array('jquery'), null, false );	
    wp_enqueue_script('mycustom_js');
	
	wp_register_script('footer_js', plugins_url( '/js/foot_script.js', __FILE__ ), array('jquery'), null, true );	
    wp_enqueue_script('footer_js');
	
	/* 
	wp_register_script('ajuploader_js', plugins_url( '/js/jquery.wallform.js', __FILE__ ), array('jquery'), null, false );
	wp_enqueue_script('ajuploader_js');
	*/
	
}
add_action( 'wp_enqueue_scripts', 'style_scripts', 20, 1);


function admin_style_scripts(){
	wp_register_style( 'tcplugin_admin_style', plugins_url('/css/tcplugin_admin_style.css',__FILE__), false, '1.0.0' );
    wp_enqueue_style( 'tcplugin_admin_style' );
}
add_action( 'admin_enqueue_scripts', 'admin_style_scripts' );



function get_design_page(){
	include('inc/get_settings.php');
}

function register_tcsettings(){
	register_setting( 'tcd-settings-group', 'per_text_rate' );
	register_setting( 'tcd-settings-group', 'per_image_rate' );	
	register_setting( 'tcd-settings-group', 'print_area_width' );	
	register_setting( 'tcd-settings-group', 'print_area_height' );	
}

function tc_design(){
    add_menu_page( 'TC Design', 'TC Design', 'manage_options', 'tc-design', 'get_design_page', plugins_url('images/T-Shirt_ico.png',__FILE__));
	add_action( 'admin_init', 'register_tcsettings' );
	
	
}
add_action( 'admin_menu', 'tc_design' );


function tcdesign_payoff(){
	add_menu_page( 'Payoff', 'Payoff', 'manage_options', 'payoff', 'get_payoff_page', plugins_url('images/payoff.png',__FILE__));	
}
add_action( 'admin_menu', 'tcdesign_payoff' );

function get_payoff_page(){

	include(plugin_dir_path(__FILE__).'/inc/admin/payoff.php');
}


function tc_initialize(){
	
	include(plugin_dir_path(__FILE__).'/inc/admin/tccmb.php');
}
add_action( 'tcplugin_init', 'tc_initialize' );


function design_tshirt($attr){ 
	include(plugin_dir_path(__FILE__).'/inc/tcd_header.php');
	include(plugin_dir_path(__FILE__).'/inc/tcd_body.php');	
	include(plugin_dir_path(__FILE__).'/inc/tcd_footer.php');
}
add_shortcode('TCDesign','design_tshirt');



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

function get_product_by_cat_slug($pslug){
	if(isset($pslug) && !empty($pslug)){
		$args = array(
			'posts_per_page'   => 10,
			'offset'           => 0,
			'product_cat'      => $pslug,
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
		
		return $post_data;	
	}
	else{
		return FALSE;
	}
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
		$sale = $price = $width = $height = 0;
		/* 
		$price = get_post_meta( $_POST['pid'], '_regular_price', true);
		$sale = get_post_meta( $_POST['pid'], '_sale_price', true);		
		 */
		
		$tcplugin_10_19 = get_post_meta($_POST['pid'],'tcplugin_10_19',TRUE); 
		
		
		$sale = $tcplugin_10_19;
		
		$width = get_post_meta($_POST['pid'],'pr_width',TRUE);
		$height = get_post_meta($_POST['pid'],'pr_height',TRUE);
		
		echo json_encode(array('sale'=>$sale,'price'=>$price,'width'=>$width,'height'=>$height));
	}
	die();
}
add_action('wp_ajax_nopriv_getproductinfo','get_productinfo_by_id');
add_action('wp_ajax_getproductinfo','get_productinfo_by_id');

/* ajax login starts */
function ajaxs_login(){
	if ( !is_user_logged_in() ) {
		$creds = array();
		$creds['user_login'] = $_POST['usr_email'];
		$creds['user_password'] = $_POST['usr_pass'];
		$creds['remember'] = true;    
		if (filter_var($creds['user_login'], FILTER_VALIDATE_EMAIL)) {
			$usr = get_user_by( 'email', $creds['user_login'] );
			$creds['user_login']  = $usr->user_login;	
		}	
		$user = wp_signon( $creds, false );
		
		if ( is_wp_error($user) ){
			echo 'error';
		}
		else{
			echo $user->ID;
		}
	}
	die();
}
add_action('wp_ajax_nopriv_ajloging','ajaxs_login');
add_action('wp_ajax_ajloging','ajaxs_login');


function ajaxs_register(){
	if ( !is_user_logged_in() ) {
		$creds = array();
		if (filter_var($_POST['usr_email'], FILTER_VALIDATE_EMAIL)) {
			$creds['user_login'] = $_POST['usr_email'];
			$creds['user_password'] = $_POST['usr_pass'];
		
			$user_name =$creds['user_login']; 
			$user_email = $creds['user_login']; 		 
			
			$user_id = username_exists( $user_name ); 
			
			if (!$user_id){				
				$user_id = wp_create_user( $user_name, $creds['user_password'], $user_email ); 
			}
		
			if($user_id){	
				$ucreds = array();
				$ucreds['user_login'] = $user_name;
				$ucreds['user_password'] = $creds['user_password'];
				$ucreds['remember'] = true; 
				$ruser = wp_signon( $ucreds, false );
				
				if ( is_wp_error($ruser) ){
					echo 'error';
				}
				else{
					echo $ruser->ID;
				}
			}
		}			
	}
	die();
}
add_action('wp_ajax_nopriv_ajregister','ajaxs_register');
add_action('wp_ajax_ajregister','ajaxs_register');



/* ajax login ends */

function create_new_campaign(){
		
	if(isset($_POST['action']) && !empty($_POST['action'] ) && $_POST['action'] == 'create_camp'){
		global $wpdb;
		
		
		$prod_info = array();
		$prod_info['title'] = $_POST['camp_name'];			
		$prod_info['body'] = $_POST['camp_desc'];
		$prod_info['tags'] = explode(",",$_POST['camp_tags']);
		
		$prod_info['uid'] = get_current_user_id();
		
		if(!empty($_POST['camp_length'])){			
			$prod_info['camp_length'] = $_POST['camp_length'];
		}
		
		$pt = explode(" ", $_POST['camp_name']);
		$sku = '';
		if(!empty($pt) && count($pt) > 0){
			if(count($pt)==1){
				$sku = substr($pt[0],0,3).rand(111,99999);
			}
			else{
				foreach($pt AS $pw){
					$sku .= substr($pw,0,1);
				}
				$sku .= rand(101,9999);	
			}
		}
		
		$prod_info['sku'] = strtoupper($sku);
		
		
		if(!empty($_POST['full_image_name'])){
			$prod_info['full_image_name'] = $_POST['full_image_name'];
		}		
		
		if(!empty($_POST['image_name'])){
			$prod_info['image_name'] = $_POST['image_name'];
		}
		
		$prod_info['unit_price'] = '';
		if(!empty($_POST['unit_price'])){
			$prod_info['unit_price'] = $_POST['unit_price'];
		}
		
		$prod_info['unit_profit'] = '';
		if(!empty($_POST['unit_profit'])){
			$prod_info['unit_profit'] = $_POST['unit_profit'];
		}
		
		$prod_info['total_profit'] = '';
		if(!empty($_POST['total_profit'])){
			$prod_info['total_profit'] = $_POST['total_profit'];
		}
		
		$prod_info['sales_goal'] = 10;
		if(!empty($_POST['sales_goal'])){
			$prod_info['sales_goal'] = $_POST['sales_goal'];
		}
		
		$prod_info['uid'] = get_current_user_id();
		
		$post_id = create_new_campaign_product($prod_info);
		
		if($post_id){ echo get_permalink( $post_id ); } 
		die();
	}
	die();
}
add_action('wp_ajax_nopriv_create_camp','create_new_campaign');
add_action('wp_ajax_create_camp','create_new_campaign');

function save_camp_image(){		
	
	/* echo '<pre>'; print_r($_POST); echo '</pre>'; */
	
	
	$data = $_POST['data'];
	list($type, $data) = explode(';', $data);
	list(, $data) = explode(',', $data);
	$data = base64_decode($data);		
	$img_name = 'tshirt'.time().'.png';
	
	$upload_dir = wp_upload_dir();	
	
	$target_path_image = $upload_dir['path'].'/'.$img_name;
	
	file_put_contents($target_path_image, $data);
	
	echo json_encode(array('action'=>'done','img'=>$img_name));	
	die();
}
add_action('wp_ajax_nopriv_save_img','save_camp_image');
add_action('wp_ajax_save_img','save_camp_image');



function upload_own_img(){
	if($_FILES['upload_own']['error']==0 && ($_FILES['upload_own']['error']=='image/png' || $_FILES['upload_own']['error']=='image/jpg' || $_FILES['upload_own']['error']=='image/gif' || $_FILES['upload_own']['error']=='image/jpeg')){
		$upload_dir = wp_upload_dir();		
		$filename = $upload_dir['path'].'/'.$_FILES['upload_own']['name'];		
		$foo = move_uploaded_file($_FILES['upload_own']['tmp_name'], $filename);
		if($foo){
			echo $upload_dir['url'].'/'.$_FILES['upload_own']['name'];
		}
		else{
			echo 'not uploaded';
		}
	}	
	die();
}
add_action('wp_ajax_nopriv_ownfileupload','upload_own_img');
add_action('wp_ajax_ownfileupload','upload_own_img');





include('inc/admin/tccmb.php');
include('inc/campaign_status.php');	
include_once('inc/custom-post-fields.php');
include_once('inc/custom-widgets.php');


/* success & unsuccess campaign starts */

function add_admin_menu_separator($position) {

	global $menu;
	$index = 0;

	foreach($menu as $offset => $section) {
		if (substr($section[2],0,9)=='separator')
			$index++;
		if ($offset>=$position) {
			$menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
			break;
		}
	}

	ksort( $menu );
}
function admin_menu_separator() {
	add_admin_menu_separator(99);
}
add_action('admin_menu','admin_menu_separator');

function teecircle_campaign_settings(){		
	add_menu_page( 'Campaign status', 'Campaign status', 'edit_posts', 'teecircle-settings', 'my_plugin_function', '' );		
}
add_action('admin_menu', 'teecircle_campaign_settings');
/* success & unsuccess campaign ends */



/* custom template loading starts  */
add_filter('single_template', 'my_custom_template');
function my_custom_template($single) {
    global $wp_query, $post;
	/* Checks for single template by post type */
	if ($post->post_type == "campaign"){
		$file_path = plugin_dir_path( __FILE__ ).'tpl/single-campaign.php';		
		if(file_exists($file_path)){ 
			return $file_path;
		} 
	}
    return $single;
}

add_filter('page_template', 'my_custom_page_template');	
function my_custom_page_template($page){
	global $post;	
	if ($post->post_type == "page"){
		$page_data = @get_page_by_title( get_option('tc_website_design_page') );		
		if(($post->post_content == '[TCDesign]') && ($page_data->post_content == '[TCDesign]')){
			$file_path = plugin_dir_path( __FILE__ ).'tpl/design-page.php';		
			if(file_exists($file_path)){ 
				return $file_path;
			}	
		} 
	} 
	return $page;
}
/* custom template loading ends  */

/* register activation and deactivation hook */
register_activation_hook(__FILE__,'tcdesign_installhook'); 
register_deactivation_hook( __FILE__, 'tcdesign_uninstallhook' );

function tcdesign_installhook() {
    global $wpdb;
	$page_list = array(
		'dashboard'=>'Campaign',
		'account-settings'=>'Account Settings'
	);
	
	foreach($page_list AS $k=>$v){
		$the_page_title = $v;
		$the_page_name = $k;
		
		$the_page = get_page_by_title( $the_page_title );
		
		delete_option($the_page_name.'_title');
		add_option($the_page_name.'_title', $the_page_title, '', 'yes');
    
		delete_option($the_page_name);
		add_option($the_page_name, $the_page_name, '', 'yes');
		
		if(isset($the_page->ID) && !empty($the_page->ID)){
			delete_option($the_page->ID .'_page_id');
			add_option($the_page->ID.'_page_id', '0', '', 'yes');
		}
	
		if ( ! $the_page ) {
			$_p = array();
			$_p['post_title'] = $the_page_title;
			$_p['post_content'] = "";
			$_p['post_status'] = 'publish';
			$_p['post_type'] = 'page';
			$_p['comment_status'] = 'closed';
			$_p['ping_status'] = 'closed';
			$_p['post_category'] = array(1);

			$the_page_id = wp_insert_post( $_p );

		}
		else {
			$the_page_id = $the_page->ID;
			$the_page->post_status = 'publish';
			$the_page_id = wp_update_post( $the_page );

		}
		delete_option( $k.'_page_id' );
		add_option( $k.'_page_id', $the_page_id );
	}
	
	
	$menu_exists = wp_get_nav_menu_object( 'TCDesign Top' );	
	if( !$menu_exists){
		$menu_id = wp_create_nav_menu('TCDesign Top');
		foreach($page_list AS $k=>$v){
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title' =>  __($v),
				'menu-item-classes' => $k,
				'menu-item-url' => home_url( '/'.$k.'/' ), 
				'menu-item-status' => 'publish')				
			);
		}
	}
	
}

function tcdesign_uninstallhook() {
    global $wpdb;
	$page_list = array(
		'dashboard'=>'Dashboard',		
		'draft'=>'Draft',
		'get-paid'=>'Get Paid',
		'account-settings'=>'Account Settings'
	);
	
	foreach($page_list AS $k=>$v){
	
		$the_page_title = get_option( $v );
		$the_page_name = get_option( $k );
		
		$the_page = get_page_by_title( $the_page_title );
		
		$the_page_id = get_option( $the_page->ID );
		if( $the_page_id ) {
			wp_delete_post( $the_page_id ); 
		}
		delete_option($the_page_title);
		delete_option($the_page_name);
		delete_option($the_page_id);
	}
}

// Register Custom Taxonomy
function tcircle_campaign() {

	$labels = array(
		'name'                       => _x( 'TCampaigns', 'Taxonomy General Name', 'tcplugin' ),
		'singular_name'              => _x( 'TCampaign', 'Taxonomy Singular Name', 'tcplugin' ),
		'menu_name'                  => __( 'TCampaign', 'tcplugin' ),
		'all_items'                  => __( 'All TCampaign', 'tcplugin' ),
		'parent_item'                => __( 'Parent TCampaign', 'tcplugin' ),
		'parent_item_colon'          => __( 'Parent TCampaign', 'tcplugin' ),
		'new_item_name'              => __( 'NewTCampaign Name', 'tcplugin' ),
		'add_new_item'               => __( 'Add New TCampaign', 'tcplugin' ),
		'edit_item'                  => __( 'Edit TCampaign', 'tcplugin' ),
		'update_item'                => __( 'Update TCampaign', 'tcplugin' ),
		'separate_items_with_commas' => __( 'Separate TCampaign with commas', 'tcplugin' ),
		'search_items'               => __( 'Search TCampaign', 'tcplugin' ),
		'add_or_remove_items'        => __( 'Add or remove TCampaign', 'tcplugin' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'tcplugin' ),
		'not_found'                  => __( 'TCampaign Not Found', 'tcplugin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'TCampaign', array( 'product' ), $args );
	
	
}

// Hook into the 'init' action
add_action( 'init', 'tcircle_campaign', 0 );

function create_new_campaign_product($prod_info){
	/* echo '<pre>'; print_R($prod_info); echo '</pre>';  */
		
	$post = array(
		'post_author' => $prod_info['uid'],
		'post_content' => $prod_info['body'],
		'post_status' => "publish",
		'post_title' => $prod_info['title'],
		'post_parent' => '',
		'post_type' => "product",
		
    );
	
	/* Create post */
    $post_id = wp_insert_post( $post, TRUE );
    if($post_id){
		/* 
		$attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
		add_post_meta($post_id, '_thumbnail_id', $attach_id);
		*/
		
		$upload_dir = wp_upload_dir();		
		$filename = $upload_dir['url'].'/'.$prod_info['full_image_name'];
		
		if(!empty($prod_info['full_image_name'])){
			add_post_meta($post_id, 'full_image_name', $filename, TRUE); 
		}
		
		$parent_post_id = $post_id;		
		$filename = $upload_dir['url'].'/'.$prod_info['image_name'];
				
		$filetype = @wp_check_filetype( basename( $filename ), null );
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = @wp_insert_attachment( $attachment, $filename, $parent_post_id );
		@set_post_thumbnail( $parent_post_id, $attach_id ); 
		
		add_post_meta($post_id, '_thumbnail_id', $attach_id);
		
		/*  
		wp_set_post_categories( $post_ID, $post_categories, $append );
		wp_set_post_terms( $post_id, $terms, $taxonomy, $append ); 
		*/
		
		wp_set_object_terms( $post_id, 'campaign-product', 'TCampaign' ); 
		wp_set_object_terms( $post_id, $prod_info['tags'], 'product_tag' ); 
		
    }
	
    
    update_post_meta( $post_id, '_visibility', 'visible' );
    update_post_meta( $post_id, '_stock_status', 'instock');
    update_post_meta( $post_id, 'total_sales', '0');
    update_post_meta( $post_id, '_downloadable', 'no');
    update_post_meta( $post_id, '_virtual', 'yes');
    update_post_meta( $post_id, '_regular_price', $prod_info['unit_price'] );
    update_post_meta( $post_id, '_sale_price', $prod_info['unit_price'] );
    update_post_meta( $post_id, '_purchase_note', "" );
    update_post_meta( $post_id, '_featured', "no" );
    update_post_meta( $post_id, '_weight', "" );
    update_post_meta( $post_id, '_length', "" );
    update_post_meta( $post_id, '_width', "" );
    update_post_meta( $post_id, '_height', "" );
    update_post_meta( $post_id, '_sku', $prod_info['sku']);
    update_post_meta( $post_id, '_product_attributes', array());
    update_post_meta( $post_id, '_sale_price_dates_from', "" );
    update_post_meta( $post_id, '_sale_price_dates_to', "" );
    update_post_meta( $post_id, '_price', $prod_info['unit_price'] );
    update_post_meta( $post_id, '_sold_individually', "" );
    update_post_meta( $post_id, '_manage_stock', "no" );
    update_post_meta( $post_id, '_backorders', "no" );
    update_post_meta( $post_id, '_stock', "" );
    update_post_meta( $post_id, 'campaign_until', date("d M Y",time() + ($prod_info['camp_length'] * 60*60*24)));
		
    update_post_meta( $post_id, 'unit_price', $prod_info['unit_price']);
    update_post_meta( $post_id, 'unit_profit', $prod_info['unit_profit']);
    update_post_meta( $post_id, 'total_profit', $prod_info['total_profit']);
    update_post_meta( $post_id, 'sales_goal', $prod_info['sales_goal']);

    /* file paths will be stored in an array keyed off md5(file path) */
    /* $downdloadArray =array('name'=>"Test", 'file' => $uploadDIR['baseurl']."/video/".$video); */
	
    /* $file_path =md5($uploadDIR['baseurl']."/video/".$video); */

    /* $_file_paths[  $file_path  ] = $downdloadArray; 
    update_post_meta( $post_id, '_downloadable_files ', $_file_paths);
    update_post_meta( $post_id, '_download_limit', '');
    update_post_meta( $post_id, '_download_expiry', '');
    update_post_meta( $post_id, '_download_type', '');
    update_post_meta( $post_id, '_product_image_gallery', '');
	
	*/
	
	return $post_id;
}

add_filter( 'page_template', 'dashboard_page_template' );
function dashboard_page_template( $page_template ){
    if ( is_page( 'dashboard' ) ) {        
		$page_template = dirname( __FILE__ ) . '/inc/dashboard_tpl.php';
    }
	/*
	if ( is_page( 'draft' ) ) {        
		$page_template = dirname( __FILE__ ) . '/inc/draft_tpl.php';
    }
	*/
	if ( is_page( 'my-account' ) ) {        
		$page_template = dirname( __FILE__ ) . '/inc/my_account_tpl.php';
    }
	if ( is_page( 'account-settings' ) ) {        
		$page_template = dirname( __FILE__ ) . '/inc/account_settings_tpl.php';
    }
	
    return $page_template;
}

function add_login_out_item_to_menu( $items, $args ){
	if($args->menu == 'Main menu'){
		$redirect = ( is_home() ) ? false : get_permalink();
		if( is_user_logged_in( ) ) {
			$items .= '<li id="log-in-out-link" class="menu-item menu-type-link"><a href="' . wp_logout_url( $redirect ) . '" title="' .  __( 'Logout' ) .'">' . __( 'Logout' ) . '</a></li>'; }
		else  { $items .= '<li id="log-in-out-link" class="menu-item menu-type-link"><a href="' . site_url().'/my-account' . '" title="' .  __( 'Login' ) .'">' . __( 'Login' ) . '</a></li>'; }
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'add_login_out_item_to_menu', 50, 2 );

