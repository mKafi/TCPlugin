<?php get_header(); ?>

	<div id="primary" class="mainBdy row content-area ">
		<div id="campaign-image" class="same-line site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>
						
					</header><!-- .entry-header -->
					
					<div class="entry-content">
						
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						
						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</div><!-- .entry-content -->

					

				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
		
		
		<div class="same-line campaing-info">
			<?php the_content(); ?>
			<?php 
			
			$meta_values = get_post_meta( get_the_ID() );
			
			/* echo '<pre>'; print_r($meta_values); echo '</pre>';	  */
			$image_file = '';
			if(isset($meta_values['full_image_name'][0])){				
				$image_file = $meta_values['full_image_name'][0];	 
			}
			
			?>
			
			<div class="info-row">
				<label>Campaign Length</label>
				<div class="opt-value"> <?php echo $meta_values['campaign_length'][0];	?> Day's</div>
			</div>
			
			<div class="info-row">
				<label>Campaign Url</label>
				<div class="opt-value"> <?php echo $meta_values['campaign_url'][0];	?></div>
			</div>
			
			<div class="info-row">
				<a href="<?php echo $image_file; ?>" target="_blank"><label>Download Full Image</label></a>				
			</div>
			
			
			<?php 
			if(isset($meta_values['buyer_can_pickup'][0])){
				?><div class="info-row"> <label>Buyer can pickup: Yes</label> </div> <?php 
			}
			?>
			
			<?php 
			if(isset($meta_values['shipping_first_name'][0])){
				?>
				<div class="info-row"> 
					<label>Shipping to </label> 
					<div class="opt-value"> 
						<?php if(isset($meta_values['shipping_first_name'][0])) echo $meta_values['shipping_first_name'][0]; if(isset($meta_values['shipping_last_name'][0])) echo ' '.$meta_values['shipping_last_name'][0]; ?><br/>
						<?php if(isset($meta_values['shipping_first_address'][0])) echo $meta_values['shipping_first_address'][0]; if(isset($meta_values['shipping_second_address'][0])) echo '<br/>'.$meta_values['shipping_second_address'][0]; ?><br/>
						<?php if(isset($meta_values['shipping_city'][0])) echo $meta_values['shipping_city'][0]; if(isset($meta_values['shipping_zip'][0])) echo ' ,'.$meta_values['shipping_zip'][0]; ?><br/>
						<?php if(isset($meta_values['shipping_state'][0])) echo $meta_values['shipping_state'][0]; ?><br/>						
					</div>
				</div> <?php 
			}
			?>
			
		</div>
		<div class="cleared"></div>
		
	</div><!-- #primary -->
	
<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>