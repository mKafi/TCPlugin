<?php get_header();	
	
	$current_user = wp_get_current_user();	
	$paypal_meta = get_user_meta($current_user->ID, 'paypal_id1', TRUE); 
	if(isset($_POST['paypal_id1']) && !empty($_POST['paypal_id1']) && isset($_POST['paypal_id2']) && !empty($_POST['paypal_id2'])){
		if($_POST['paypal_id1'] == $_POST['paypal_id2']){
			
			
			if($paypal_meta){
				update_user_meta( $current_user->ID, 'paypal_id1', $_POST['paypal_id2'], $paypal_meta );
			}
			else{
				add_user_meta( $current_user->ID, 'paypal_id1', $_POST['paypal_id2'], TRUE );
			}
		}
	}
	$paypal_meta = get_user_meta($current_user->ID, 'paypal_id1', TRUE); 
	?>
	
	<div id="primary" class="mainBdy row content-area">		
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
					<h1 class="entry-title"><?php the_title(); ?></h1>										
					
					<div class="current_campaign campaings">						
						<form class="payable_accounts" action="" method="post">
							<label>Paypal account</label>
							<input type="email" required="required" name="paypal_id1" value="<?php if(!empty($paypal_meta)) echo $paypal_meta; ?>" placeholder="Enter paypal account id"/> 
							<input type="email" required="required" name="paypal_id2" value="<?php if(!empty($paypal_meta)) echo $paypal_meta; ?>" placeholder="Re-type paypal account id"/> 
							<div class="desc-text">Enter the paypal id where admin can send your profit amount. Two fields value above will must same</div>
							
							<input type="submit" value="Submit" name="add_paypal"/>
						</form>	
						<br/><br/>	
						
						
						<?php 
						
						$campaigns = array();
						
						?>
						
						
						<h3>All your campaigns</h3>					
						
						
						<table class="campaign-grid">
							<thead>
								<th>Sl</th>
								<th>Campaign</th>
								<th>Period</th>
								<th>Unit price</th>
								<th>Goal</th>
								<th>Profit</th>
							</thead>
							<tbody>
								<?php 
								if(count($campaigns)>0){
									?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php 
								}
								else{
									?><tr><td colspan="5">There is no campaign yet</td></tr><?php 
								}
								?>
								
							</tbody>
						</table>
					</div>
					
					<!--
					<header class="entry-header">						
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>						
							<div class="entry-thumbnail">							
								<?php the_post_thumbnail(); ?>						
							</div>						
						<?php endif; ?>	
					</header>
					-->
					
					<div class="entry-content">						
						<?php the_content(); ?>						
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>					
					</div><!-- .entry-content -->					
					
					<footer class="entry-meta">						
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>					
					</footer><!-- .entry-meta -->				
				</article><!-- #post -->				
				<?php comments_template(); ?>			
			
			<?php endwhile; ?>		
		</div><!-- #content -->				
		
		
		<div class="right-pane tcdesign">
			<?php 
			wp_nav_menu( array('menu' => 'TCDesign Top' ) );
			get_sidebar();
			?>
		</div>
	</div><!-- #primary -->	
<?php get_footer(); ?>