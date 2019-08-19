<?php get_header(); ?>

		<h1><a href="<?php echo site_url();?>"><?php bloginfo( 'name' ); ?></a></h1>


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
					echo '<h2>Nothingness!</h2></header><section id="content"><p>Got nothing!</p>';

			endif; 
			?>

  
  		<?php if ( get_theme_mod( 'eventually_nav_mode' )	== 'navposts' ):?>
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
						
			</footer> <!-- /archive-nav -->
		<?php endif?>
    </section> <!-- /content -->
								
<?php get_footer(); ?>