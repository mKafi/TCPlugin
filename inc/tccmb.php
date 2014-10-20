<?php 
/**
* Registering meta boxes
*
* All the definitions of meta boxes are listed below with comments.
* Please read them CAREFULLY.
*
* You also should read the changelog to know what has been changed before updating.
*
* For more information, please visit:
* @link http://www.deluxeblogtips.com/meta-box/
*/
add_filter( 'rwmb_meta_boxes', 'tcplugin_register_meta_boxes' );
/**
* Register meta boxes
*
* Remember to change "tcplugin" to actual prefix in your project
*
* @return void
*/
function tcplugin_register_meta_boxes( $meta_boxes )
{
/**
* prefix of meta keys (optional)
* Use underscore (_) at the beginning to make keys hidden
* Alt.: You also can make prefix empty to disable it
*/
// Better has an underscore as last sign
$prefix = 'tcplugin_';


// 1st meta box
$custom_fields = array();

$custom_fields = array(		
	// TEXT
	array(
	// Field name - Will be used as label
	'name' => __( 'Base price for 10 - 19', 'meta-box' ),
	// Field ID, i.e. the meta key
	'id' => "{$prefix}10_19",
	// Field description (optional)
	'desc' => __( 'Enter a base price for 10 to 19 products', 'meta-box' ),
	'type' => 'text',
	// Default value (optional)
	'std' => __( '', 'meta-box' ),
	// CLONES: Add to make the field cloneable (i.e. have multiple value)
	'clone' => false,
	)
);

$lot = 10;
$range = 99;
for($i = 20; $i < $range; $i+= $lot){	
	$custom_fields[] = array(
		// Field name - Will be used as label
		'name' => __( 'Base price for '. $i . ' - '. ($i + ($lot-1)) , 'meta-box' ),
		// Field ID, i.e. the meta key
		'id' => "{$prefix}".$i.'_'.($lot-1),
		// Field description (optional)
		'desc' => __( 'Enter a base price for '.$i.' to '. ($i+($lot-1)) .' products', 'meta-box' ),
		'type' => 'text',
		// Default value (optional)
		'std' => __( '', 'meta-box' ),
		// CLONES: Add to make the field cloneable (i.e. have multiple value)
		'clone' => false,
	);
}


$lot = 25;
$range = 199;
for($i = 100; $i < $range; $i+= $lot){
	$custom_fields[] = array(
		// Field name - Will be used as label
		'name' => __( 'Base price for '. $i . ' - '. ($i + ($lot-1)) , 'meta-box' ),
		// Field ID, i.e. the meta key
		'id' => "{$prefix}".$i.'_'.$lot-1,
		// Field description (optional)
		'desc' => __( 'Enter a base price for '.$i.' to '. ($i+($lot-1)) .' products', 'meta-box' ),
		'type' => 'text',
		// Default value (optional)
		'std' => __( '', 'meta-box' ),
		// CLONES: Add to make the field cloneable (i.e. have multiple value)
		'clone' => false,
	);
}
$lot = 50;
$range = 250;
for($i = 200; $i < $range; $i+= $lot){
	$custom_fields[] = array(
		// Field name - Will be used as label
		'name' => __( 'Base price for '. $i . ' - '. ($i + ($lot-1)) , 'meta-box' ),
		// Field ID, i.e. the meta key
		'id' => "{$prefix}".$i.'_'.$lot-1,
		// Field description (optional)
		'desc' => __( 'Enter a base price for '.$i.' to '. ($i+($lot-1)) .' products', 'meta-box' ),
		'type' => 'text',
		// Default value (optional)
		'std' => __( '', 'meta-box' ),
		// CLONES: Add to make the field cloneable (i.e. have multiple value)
		'clone' => false,
	);
}


$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'baseprice_on_quantity_19',
	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Base price on Quantity', 'meta-box' ),
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'product' ),
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',
	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',
	// Auto save: true, false (default). Optional.
	'autosave' => true,
	// List of meta fields
	'fields' => $custom_fields,
	'validation' => array(
		'rules' => array(
			"{$prefix}10_19" => array(
				'required' => true,
				'minlength' => 1,				
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}10_19" => array(
				'required' => __( 'Base price for 10 to 19 is required', 'meta-box' ),
				'minlength' => __( 'Enter a minimum valid value for price', 'meta-box' ),
			),
		)
	)
);


return $meta_boxes;
}