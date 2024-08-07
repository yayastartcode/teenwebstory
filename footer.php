
<?php
				// If Single or Archive (Category, Tag, Author or a Date based page).
				if ( is_single() || is_archive() ) :
			?>
					</div><!-- /.col -->

					<?php
						get_sidebar();
					?>

				</div><!-- /.row -->
			<?php
				endif;
			?>
		</main><!-- /#main -->
		<footer id="footer">
			<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form role="search" method="get" action="<?php echo home_url('/'); ?>">
      <input type="text" placeholder="Search.." name="s" value="<?php the_search_query(); ?>">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
			 <nav class="mobile-nav">
	<a href="/" class="bloc-icon">
		<img src="https://www.svgrepo.com/show/160019/home.svg" alt="">
	</a>
		<a href="#" class="bloc-icon" onclick="openSearch()">
		<img src="https://www.svgrepo.com/show/532555/search.svg" alt="">
	</a>
	<a href="#" class="bloc-icon">
		<img src="https://www.svgrepo.com/show/532275/heart-half-stroke.svg" alt="">
	</a>

    </nav>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p><?php printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'teen-web-story' ), wp_date( 'Y' ), get_bloginfo( 'name', 'display' ) ); ?></p>
					</div>

					<?php
						if ( has_nav_menu( 'footer-menu' ) ) : // See function register_nav_menus() in functions.php
							/*
								Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
								Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
								!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
							*/
							wp_nav_menu(
								array(
									'container'       => 'nav',
									'container_class' => 'col-md-6',
									//'fallback_cb'     => 'WP_Bootstrap4_Navwalker_Footer::fallback',
									'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
									'theme_location'  => 'footer-menu',
									'items_wrap'      => '<ul class="menu nav justify-content-end">%3$s</ul>',
								)
							);
						endif;

						if ( is_active_sidebar( 'third_widget_area' ) ) :
					?>
						<div class="col-md-12">
							<?php
								dynamic_sidebar( 'third_widget_area' );

								if ( current_user_can( 'manage_options' ) ) :
							?>
								<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge bg-secondary"><?php esc_html_e( 'Edit', 'teen-web-story' ); ?></a></span><!-- Show Edit Widget link -->
							<?php
								endif;
							?>
						</div>
					<?php
						endif;
					?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
	<script>
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
     
</body>
</html>
