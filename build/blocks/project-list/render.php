<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */



$query = new WP_Query([
	'post_type' => 'project',
	'orderby' => 'title',
	'order' => 'ASC',
]);

?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="row row-cols-1 row-cols-md-1 g-4">

	<!-- The loop -->
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		?>
	<div class="col">
		<div class="card mb-3 h-100">
			<div class="row g-0 h-100">
				<div class="col-md-4">
					<div class="card-img w-100 h-100" >
						<?php
						$image_url = get_field('thumbnail', get_the_ID());

						if ($image_url) : ?>

							<img
								src="<?php echo esc_url($image_url); ?>"
								class="project-image img-fluid"
								alt="<?php echo esc_attr(get_the_title()); ?>"
							>
						<?php endif; ?>
					</div>

				</div>
				<div class="col-md-8">
					<div class="card-body p-4">
						<h2 class="card-title"><?= get_the_title() ?></h2>
						<?php
						$desc  = get_field('project_description');

						if ($desc): ?>
							<p class="card-text p-3"><?php echo esc_html($desc); ?></p>
						<?php endif; ?>
						<div class="tools-section p-3">
							<h6>Tools Used</h6>
							<div class="tools-list ">
								<?php
								$tools = get_post_meta(get_the_ID(), 'tools', true);

								if (!empty($tools) && is_array($tools)) {
									foreach ($tools as $tool) {
										echo '<span class="tool-pill">' . esc_html($tool) . '</span> ';
									}
								}
								?>
							</div>
						</div>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary rounded-pill w-100 mt-auto">
							View Project
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
	</div>
</div>
