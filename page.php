<?php get_header(); ?>
		
		
		<h1><a href="<?php echo site_url();?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php


		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();?>
				<p><?php the_title(); ?></p>
		</header>	
			<div id="content">
					<?php
					the_content();
			
					edit_post_link('Edit', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');
				endwhile;
			else : 

					echo 'Eventually something will be shown here, none seem to be present now, sad.';

			endif; 

			?>
    	</div>

								
<?php get_footer(); ?>