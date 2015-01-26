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
	
	<div class="full-width tcdesign-top-cont">
		<div class="row">
			<?php wp_nav_menu( array('menu' => 'TCDesign Top' ) ); ?>
		</div>
	</div>
	
	<div id="primary" class="mainBdy row content-area">		
		<div id="" class="site-content" role="main">
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
						
					</div>
					
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