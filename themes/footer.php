<?php
/**
 * Footer template for Cheveux Child
 */
?>

<footer class="cheveux-footer">
	<div class="cheveux-footer__inner container-fluid">
		<div class="cheveux-footer__top">
			<div class="cheveux-footer__brand">
				<h2 class="cheveux-footer__title"><?php bloginfo( 'name' ); ?></h2>
				<p class="cheveux-footer__text">
					Effortless beauty, elevated.
				</p>
			</div>

			<div class="cheveux-footer__nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'cheveux-footer-menu',
					'fallback_cb'    => false,
				) );
				?>
			</div>

			<div class="cheveux-footer__info">
				<p><strong>Phone</strong><br>(000) 000-0000</p>
				<p><strong>Email</strong><br>hello@example.com</p>
				<p><strong>Hours</strong><br>Tue–Sat, 9am–6pm</p>
			</div>
		</div>

		<div class="cheveux-footer__bottom">
			<p class="mb-0">
				&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
			</p>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
