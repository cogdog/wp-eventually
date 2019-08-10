		<!-- Footer -->
			<footer id="footer">
			
			<!-- begin social menu -->
				<?php 
				if (  has_nav_menu( 'eventually-social' ) ) {
					wp_nav_menu( array( 'theme_location' => 'eventually-social', 'menu_class' => 'icons' ) );
				} 
				?>
			<!-- end social menu -->
				
				
				<ul class="copyright">
					<li><?php eventually_footer_text()?></li>
					<li>web work: <a href="http://cog.dog">cog.dog</a></li>
					<li>theme: <a href="https://github.com/cogdog/wp-eventually">WP Eventually</a> based on <a href="https://html5up.net/eventually">HTML5 UP</a></li>
				</ul>
			</footer>
			
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

	<?php wp_footer(); ?>
	</body>
</html>


