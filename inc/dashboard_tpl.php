<?php get_header();	?>
	<div class="full-width tcdesign-top-cont">
		<div class="row"><?php 
		wp_nav_menu( array('menu' => 'TCDesign Top' ) );			
		?>
		</div>
	</div>
	<div id="primary" class="mainBdy row content-area">		
		<div id="" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
					<h1 class="entry-title"><?php the_title(); ?></h1>										
					
					
					<?php 					
					$campaigns = array();
					$posts_array = array();
					if ( is_user_logged_in() ){
						global $current_user;						
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
							'suppress_filters' => true,
							'author' => $current_user->ID
						); 
						
						$campaigns = get_posts( $args );
					}
					
					/* echo "<pre>"; print_r($campaigns); echo "<pre>";  */
					
					?>
					
					
					<h3>All your campaigns</h3>					
					
					
					<table class="campaign-grid">
						<thead>
							<th>Sl</th>
							<th>Image</th>
							<th>Campaign</th>
							<th>Period</th>
							<th>Unit price</th>
							<th>Goal</th>
							<th>Sold</th>
							<th>Profit</th>
							<th>Status</th>
						</thead>
						<tbody>
							<?php 
							$c=1;
							if(count($campaigns)>0){
								foreach($campaigns AS $cmp){									
									$cp_meta = get_post_meta($cmp->ID);
									
									if($cp_meta['sales_goal'][0] >= $cp_meta['total_sales'][0]) { $status = 'S'; } else { $status = 'U'; }
									
									/* echo "<pre>"; print_r($cp_meta); echo "<pre>";  */
									
								
									?>
									<tr>
										<td><?php echo $c++; ?></td>
										<td><?php echo '<a href="'.site_url().'/product/'.$cmp->post_name.'"><img src="'.$cp_meta['full_image_name'][0].'" alt="CpIMG" class="my-camp-img"/></a>'; ?></td>
										<td><?php echo '<a href="'.site_url().'/product/'.$cmp->post_name.'">'.$cmp->post_title.'</a>'; ?></td>
										<td><?php echo $cp_meta['campaign_until'][0]; ?></td>
										<td><?php echo '$'.$cp_meta['unit_price'][0]; ?></td>
										<td><?php echo $cp_meta['sales_goal'][0]; ?></td>
										
										<td><?php echo $cp_meta['total_sales'][0]; ?></td>
										
										<td><?php echo $cp_meta['unit_profit'][0]; ?></td>
										<td><?php echo $status; ?></td>
									</tr>
									<?php 
								}
							}
							else{
								?><tr><td colspan="6">There is no campaign yet</td></tr><?php 
							}
							?>
							 
						</tbody>
					</table>
					<div class="desc_text">*** 'S' - Successfull Campaign. 'U' - Unsuccessfull Campaign</div>
					
					<div class="grnLnk"><a href="<?php $page = get_page_by_title( get_option('tc_website_design_page') ); echo @get_permalink($page->ID); ?>">Launch a campaign</a></div> 
					
					<header class="entry-header">						
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>						
							<div class="entry-thumbnail">							
								<?php the_post_thumbnail(); ?>						
							</div>						
						<?php endif; ?>	
					</header>
					
					
					<div class="entry-content">						
						<?php the_content(); ?>						
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tcircle' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>					
					</div><!-- .entry-content -->					
					
				</article><!-- #post -->				
				<?php comments_template(); ?>			
			
			<?php endwhile; ?>		
		</div><!-- #content -->			
		
	</div><!-- #primary -->	
<?php get_footer(); ?>