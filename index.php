<?php get_header(); ?>

		<h1><?php bloginfo( 'name' ); ?></h1>

			<!-- content -->
			<?php

			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();
					
					echo '<h2>';
					the_title();
					echo '</h2></header><section id="content">';
					
					the_content();
			
					edit_post_link('Edit', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');
				endwhile;
			else : 
			
				if ( empty( get_bloginfo( 'description' ) )) {
					echo '<h2>A WordPress Calling Card Theme</h2></header>';
				} else {
					echo '<h2>' . bloginfo( 'description' ) . '</h2></header>';
				}
					

					echo '<section id="content"><p>This is a new WordPress calling card theme built on the <a href="https://html5up.net/eventually">HTML5Up template Eventually</a>. It features a background of slide show of images that are added as header images in the Customizer. A menu of social media links can be added.</p>
<p>Content on the front is drawn from the most recent post (this text will disappear when a new post beyond "Hello World!" exists, just delete that one, eh?). And Pages can be used as links from the front page. This <em>eventually</em> (get it?) could use by you as a calling card site or a regular series of changing messages. </p>';

			endif; 
			?>


		<?php if ( get_theme_mod( 'eventually_nav_mode' )== 'navposts' ):?>
			<footer class="archive-nav">
				
				<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
				?>

	
			
					<?php
					if (!empty( $prev_post )): ?>
				
						<a class="post-nav-prev" title="<?php _e('Previous', 'eventually'); echo ': ' . esc_attr( get_the_title($prev_post) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">&larr;</a>
					<?php endif; ?>
				
					<?php
					if (!empty( $next_post )): ?>
					
						<a class="post-nav-next" title="<?php _e('Next', 'eventually'); echo ': ' . esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"> &rarr;</a>
			
					<?php endif; ?>
									

			
				<div class="clear"></div>
		<?php endif?>
						
			</footer> <!-- /archive-nav -->
						
</section> <!-- /content -->

								
<?php get_footer(); ?>