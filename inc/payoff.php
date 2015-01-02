<?php 
class PayoffData extends WP_List_Table {
		
        public $table_data;

        public function table_data() {
        	
			$hdd_data = array();
			
			$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => '',
				'category_name'    => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'product',
				'post_mime_type'   => '',
				'taxonomy'   		=> 'TCampaign',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'tax_query' => array(
						array(
							'taxonomy' => 'TCampaign',
							'field' => 'slug',
							'terms' => array('campaign-product')
						)
					),
				'suppress_filters' => true 
			); 
			
			$posts_array = get_posts( $args );
			
			$campaigns = array();
			foreach($posts_array AS $k=>$v){
				$p_meta = get_post_meta($v->ID);
				
				if($v->post_author){
					$user_info = get_userdata($v->post_author);      
					$first_name = $user_info->first_name;
					$last_name = $user_info->last_name;
				
					$campaigns[$k]['title'] = '<a href="'.get_permalink($v->ID).'">'.$v->post_title.'</a>';
					$campaigns[$k]['t_sales'] = $p_meta['total_sales'][0];
					$campaigns[$k]['designer'] = $first_name.' '.$last_name;
					
					$campaigns[$k]['unit_price'] = $p_meta['unit_price'][0];
					$campaigns[$k]['unit_profit'] = $p_meta['unit_profit'][0];
					$campaigns[$k]['total_profit'] = $p_meta['total_profit'][0];
					$campaigns[$k]['pay_now'] = '<a href="'.admin_url().'/admin.php?page=payoff&uid='.$v->post_author.'&amount='.$p_meta['total_profit'][0].'"><span class="btn_payoff" id="author_'.$v->post_author.'">Pay now</span></a>';
					/* $campaigns[$k]['pay_now'] = 'Pay button'; */
					
				}
				/* echo '<pre>'; print_r(get_post_meta($v->ID)); echo '</pre>';  */
			}
			
			/* 
			
			foreach( $drives as $key => $drive ) {				
				$hdd_data[$key]['first'] = $drive[0];
				$hdd_data[$key]['second'] = $drive[1];
				$hdd_data[$key]['third'] = $drive[2];
			}
			*/
			
			$this->table_data = $campaigns;
		}
		
        public function get_columns() {
			$columns = array(				
				'title' 				=> 'Campaign',
				't_sales' 				=> 'Total Sales',
				'designer' 				=> 'Designer',
				'unit_price' 			=> 'Unit price',
				'unit_profit' 			=> 'Unit profit',
				'total_profit' 			=> 'Total profit',
				'pay_now' 				=> 'Pay now',
			);
			return $columns;
		}

        public function sortable_columns() {
			$sortable_columns = array(			    
			    'title' 	=> array('title', true),
				't_sales' 			=> array('t_sales', true),
				'designer' 			=> array('designer', true),
				'unit_price' 			=> array('unit_price', true),
				'unit_profit' 			=> array('unit_profit', true),
				'total_profit' 			=> array('total_profit', true),
				'pay_now' 				=> array('pay_now',false),
			);

			return $sortable_columns;

		}

        public function column_default( $item, $column_name ) {
			switch( $column_name ) {
				case 'title':
				case 't_sales':
				case 'designer':
				case 'unit_price':
				case 'unit_profit':
				case 'total_profit':
				case 'pay_now':
			  	
				return $item[ $column_name ];
					default:
				return print_r( $item, true );
			}
		}
		
        public function usort_reorder( $a, $b ) {

			  /* If no sort, default to title. */
			  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'title';

			  /* If no order, default to asc. */
			  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';

			  /* Determine sort order. */
			  $result = strcmp( $a[$orderby], $b[$orderby] );

			  /* Send final sort direction to usort. */
			  return ( $order === 'asc' ) ? $result : -$result;

		}
		
        public function prepare() {
		
			$columns = $this->get_columns();
			$hidden = array();
				
			$sortable = $this->sortable_columns();
			$this->_column_headers = array($columns, $hidden, $sortable);
				
			$this->table_data();
			usort( $this->table_data, array( &$this, 'usort_reorder' ) );
					
			$per_page = 10;
			$current_page 	= $this->get_pagenum();
			$total_items 	= count($this->table_data);

			
			$this->found_data = array_slice($this->table_data,(($current_page - 1) * $per_page), $per_page);
			
			$this->set_pagination_args(
										array(
											'total_items' => $total_items,
											'per_page'    => $per_page
										) 
			);
			
			$this->items = $this->found_data;

		}	/* prepare() */

}

if((isset($_GET['uid']) && is_numeric($_GET['uid']) && $_GET['uid'] > 0) && (isset($_GET['amount']) && is_numeric($_GET['amount']) && $_GET['amount'] > 0)){
	$user_info = get_userdata($_GET['uid']);
	/* echo '<pre>'; print_R($user_info); echo '</pre>';  */
	?>
	<div class="wrap">
		<h2 class="dat-wrap"><span class="dashicons dashicons-randomize"></span>Payoff</h2>
	</div>
	
	<p>You are paying to the designer for his profit amount. </p><br/>
	<form action="" method="post" class="paybtn-cont">
		<div class="pay-notice">The amount <span>$<?php echo $_GET['amount']; ?></span> will sent this email <span><?php echo $user_info->user_email; ?><span></div>
		
		<input type="text" name="payable_amount" value="<?php echo $_GET['amount']; ?> USD "/>
		<input type="submit" class="bntPaynow" id="bntPaynow" value ="Yes. Confirm" />
		
	</form>
	<?php 
}
else{


$response = <<<EOD
	<div class="wrap">
		<h2 class="dat-wrap"><span class="dashicons dashicons-randomize"></span>Successfull Campaigns</h2>
	</div>
	
    <div class="wrap">
        <form method="post">
EOD;

        echo $response;

		$ListTable = new PayoffData();
		$ListTable->prepare();
		$ListTable->display();
		
$response = <<<EOD

		</form>
	
	</div>
	
EOD;

echo $response;
}
	