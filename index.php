<?php get_header(); ?>

		<h1><?php bloginfo( 'name' ); ?></h1>
		<?php if ( !empty( get_bloginfo( 'description' ) )) { ?>
						<p><?php bloginfo( 'description' ); ?></p>
		<?php } ?>
		</header>	
		
		<div id="content">
			<!-- content -->
			<?php

			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();
					the_content();
			
					edit_post_link('Edit', '<p class="edit-this"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> ', '</p>');
				endwhile;
			else : 

					echo '<p>This is a new WordPress calling card theme built on the <a href="https://html5up.net/eventually">HTML5Up template Eventually</a>. It features a background of slide show of images that are added as header images in the Customizer. A menu of social media links can be added.</p>
<p>Content on the front is drawn from the most recent post (this text will disappear when a new post beyond "Hello World!" exists, just delete that one, eh?). And Pages can be used as links from the front page. This <em>eventually</em> (get it?) could use by you as a calling card site or a regular series of changing messages. </p>';

			endif; 

			?>
    	</div>

								
<?php get_footer(); ?>