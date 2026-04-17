<?php
get_header();
?>

	<main id="primary" class="site-main page-contact">
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/page', 'header' ); ?>

			<section class="cheveux-page-content py-5">
				<div class="container">
					<div class="row g-5">
						<div class="col-lg-5">
							<div class="contact-details">
								<h2 class="h3 mb-4">Get in touch</h2>
								<p>Use this area for your salon address, hours, phone number, or a short message.</p>

								<ul class="list-unstyled">
									<li><strong>Phone:</strong> (000) 000-0000</li>
									<li><strong>Email:</strong> hello@example.com</li>
									<li><strong>Hours:</strong> Tue–Sat, 9am–6pm</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-7">
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php
		endwhile;
		?>
	</main>

<?php
get_footer();
