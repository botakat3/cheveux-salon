<?php
/**
 * Footer template for Cheveux Child
 */
?>

<footer class="cheveux-footer py-5 px-4 px-lg-5">
	<div class="container-fluid d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center">

		<div class="footer-brand mb-3 mb-lg-0">
			<?php bloginfo( 'name' ); ?>
		</div>

		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => false,
			'menu_class'     => 'footer-menu d-flex flex-column flex-lg-row gap-3 gap-lg-4',
		) );
		?>

	</div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
