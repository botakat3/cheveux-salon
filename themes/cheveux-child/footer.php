<?php
/**
 * Footer template for Cheveux Child
 */
?>

<footer class="cheveux-footer bg-black text-white p-5 d-flex align-items-center">
	<div class="container-fluid px-lg-5">
		<div class="row justify-content-between align-items-end gy-5">

			<div class="col-lg-4">
				<div class="d-flex flex-column gap-2">
					<?php if ( has_custom_logo() ) : ?>
						<div class="cheveux-footer__brand">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<a class="cheveux-footer__logo text-white text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							Cheveux
						</a>
					<?php endif; ?>

					<p class="mb-0 text-white-50 small">
						All Rights Reserved, <?php echo date( 'Y' ); ?>
					</p>
				</div>
			</div>

			<div class="col-lg-2">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container'       => 'nav',
					'container_class' => 'footer-nav',
					'menu_class'      => 'list-unstyled d-flex flex-column gap-3 mb-0',
					'fallback_cb'     => false,
				) );
				?>
			</div>

			<div class="col-lg-3">
				<div class="d-flex flex-column gap-3">
					<h3 class="mb-0 fw-normal cheveux-footer__social-title">Get to know us</h3>

					<div class="d-flex align-items-center gap-3">
						<a href="#" class="text-white text-decoration-none cheveux-footer__social-link" aria-label="LinkedIn">
							in
						</a>
						<a href="#" class="text-white text-decoration-none cheveux-footer__social-link" aria-label="X">
							X
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
