<?php get_header();	?>
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