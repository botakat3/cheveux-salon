<?php
/**
 * Template Name: Blank Full Width
 */
get_header();
?>

	<div id="primary" class="content-area w-100">
		<main id="main" class="site-main w-100">

			<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			?>

		</main>
	</div>

<?php get_footer(); ?>
