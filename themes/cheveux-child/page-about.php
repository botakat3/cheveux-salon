<?php
get_header();
?>

	<main id="primary" class="site-main page-about">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</main>

<?php
get_footer();
