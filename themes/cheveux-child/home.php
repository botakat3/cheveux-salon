<?php get_header(); ?>

	<section class="hair-blog">
		<div class="container-fluid px-lg-5 py-5">

			<header class="hair-blog__header">
				<div class="row align-items-end gy-4">
					<div class="col-lg-8">
						<p class="hair-blog__eyebrow mb-3">HAIR TIPS</p>
						<h1 class="hair-blog__title mb-3">Blog</h1>
						<p class="hair-blog__intro mb-0">
							Expert tips, product picks, and everyday guidance to help you keep your hair healthy, styled, and feeling its best.
						</p>
					</div>

					<div class="col-lg-4">
						<div class="hair-blog__top-actions d-flex flex-column align-items-lg-end gap-3">
							<form role="search" method="get" class="hair-blog__search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<label class="screen-reader-text" for="hair-blog-search">
									Search posts
								</label>
								<div class="hair-blog__search-wrap">
									<input
										type="search"
										id="hair-blog-search"
										class="hair-blog__search-input"
										placeholder="Search posts"
										value="<?php echo get_search_query(); ?>"
										name="s"
									/>
									<input type="hidden" name="post_type" value="post" />
									<button type="submit" class="hair-blog__search-button">Search</button>
								</div>
							</form>

							<div class="hair-blog__tags d-flex flex-wrap justify-content-lg-end gap-2">

								<!-- All button -->
								<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="hair-blog__tag">
									All
								</a>

								<?php
								$categories = get_categories(array(
									'taxonomy'   => 'category',
									'hide_empty' => true,
								));

								foreach ($categories as $category) :
									?>
									<a
										href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
										class="hair-blog__tag"
									>
										<?php echo esc_html( $category->name ); ?>
									</a>
								<?php endforeach; ?>

							</div>
						</div>
					</div>
				</div>
			</header>

			<hr class="hair-blog__divider">

			<?php
			$featured_posts = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
				'post_status'    => 'publish',
			));
			?>

			<?php if ( $featured_posts->have_posts() ) : ?>
				<section class="hair-blog__featured">
					<div class="row g-4">
						<?php while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>
							<div class="col-lg-6">
								<article class="blog-card blog-card--featured h-100">
									<a href="<?php the_permalink(); ?>" class="blog-card__link text-decoration-none">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="blog-card__image blog-card__image--featured">
												<?php the_post_thumbnail( 'large' ); ?>
											</div>
										<?php endif; ?>

										<div class="blog-card__content">
											<p class="blog-card__meta mb-2">
												<?php
												$categories = get_the_category();
												if ( ! empty( $categories ) ) {
													echo esc_html( $categories[0]->name );
												} else {
													echo 'Hair Tips';
												}
												?>
											</p>

											<h2 class="blog-card__title blog-card__title--featured mb-0">
												<?php the_title(); ?>
											</h2>
										</div>
									</a>
								</article>
							</div>
						<?php endwhile; ?>
					</div>
				</section>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

			<hr class="hair-blog__divider">

			<?php
			$paged = max( 1, get_query_var( 'paged' ) );
			$posts_grid = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => 6,
				'post_status'    => 'publish',
				'offset'         => 2 + ( ( $paged - 1 ) * 6 ),
			));
			?>

			<?php if ( $posts_grid->have_posts() ) : ?>
				<section class="hair-blog__grid">
					<div class="row g-4">
						<?php while ( $posts_grid->have_posts() ) : $posts_grid->the_post(); ?>
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
												if ( ! empty( $categories ) ) {
													echo esc_html( $categories[0]->name );
												} else {
													echo 'Hair Tips';
												}
												?>
											</p>

											<h3 class="blog-card__title blog-card__title--small mb-0">
												<?php the_title(); ?>
											</h3>
										</div>
									</a>
								</article>
							</div>
						<?php endwhile; ?>
					</div>
				</section>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

			<div class="hair-blog__pagination d-flex justify-content-between align-items-center mt-5">
				<div>
					<?php previous_posts_link( 'Previous' ); ?>
				</div>
				<div>
					<?php next_posts_link( 'Next', $posts_grid->max_num_pages ); ?>
				</div>
			</div>

			<hr class="hair-blog__divider">

			<section class="hair-blog__newsletter py-4 ">
				<div class="row align-items-start gy-4">
					<div class="col-lg-5">
						<p class="hair-blog__eyebrow mb-3">NEWSLETTER</p>
						<h2 class="hair-blog__newsletter-title mb-0 w-100">
							Get the latest hair tips into your inbox
						</h2>
						<p class="hair-blog__newsletter-text mb-0">
							Stay up to date with styling advice, product recommendations, and salon updates curated by the Cheveux team.
						</p>

					</div>

					<div class="col-lg-7 pt-lg-5">
						<div class="hair-blog__newsletter-form">
							<?php echo do_shortcode('[mailpoet_form id="1"]'); ?>
						</div>

					</div>


				</div>
			</section>

		</div>
	</section>

<?php get_footer(); ?>
