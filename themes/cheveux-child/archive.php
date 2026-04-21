<?php get_header(); ?>

	<section class="hair-blog">
		<div class="container-fluid px-lg-5 py-5">

			<div class="hair-post__back mt-5">
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hair-post__back-link">
					← Back to Hair Tips
				</a>
			</div>

			<header class="hair-blog__header">
				<div class="row align-items-end gy-4">
					<div class="col-lg-8">
						<p class="hair-blog__eyebrow mb-3">
							<?php
							if ( is_category() ) {
								echo 'CATEGORY';
							} elseif ( is_tag() ) {
								echo 'TAG';
							} else {
								echo 'ARCHIVE';
							}
							?>
						</p>

						<h1 class="hair-blog__title mb-3"><?php single_term_title(); ?></h1>

						<?php if ( term_description() ) : ?>
							<div class="hair-blog__intro mb-0">
								<?php echo term_description(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</header>

			<hr class="hair-blog__divider">

			<?php if ( have_posts() ) : ?>
				<section class="hair-blog__grid">
					<div class="row g-4">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-6 col-lg-4">
								<article class="blog-card blog-card--small h-100">
									<a href="<?php the_permalink(); ?>" class="blog-card__link text-decoration-none">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="blog-card__image blog-card__image--small">
												<?php the_post_thumbnail( 'medium_large' ); ?>
											</div>
										<?php endif; ?>

										<div class="blog-card__content">
											<p class="blog-card__meta mb-2">
												<?php
												$categories = get_the_category();
												echo ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Hair Tips';
												?>
											</p>
											<h2 class="blog-card__title blog-card__title--small mb-0"><?php the_title(); ?></h2>
										</div>
									</a>
								</article>
							</div>
						<?php endwhile; ?>
					</div>
				</section>

				<div class="hair-blog__pagination d-flex justify-content-between align-items-center mt-5">
					<div><?php previous_posts_link( 'Previous' ); ?></div>
					<div><?php next_posts_link( 'Next' ); ?></div>
				</div>
			<?php else : ?>
				<p>No posts found.</p>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>
