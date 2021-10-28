<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- post title -->
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<!-- /post title -->

		<p><?php html5wp_excerpt( 'html5wp_index' ); // Build your custom callback length in functions.php. ?></p>

<?php endwhile; ?>

<?php else : ?>

	<!-- article -->
	<article>
		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
