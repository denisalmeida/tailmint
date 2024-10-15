<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mx-auto max-w-screen-lg mt-14">
		<div class="mb-3">
			<span class="text-lg"> <?php the_category(', '); ?> </span> -
			<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-500"><?php echo get_the_date(); ?></time>
		</div>
		<header class="entry-header mb-4">
			<?php the_title( sprintf( '<h1 class="entry-title sm:text-4xl md:text-[40px] font-bold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<?php
			$categories = wp_get_post_categories( get_the_ID() );
			if ( $categories ) {
				$args = array(
					'category__in'   => $categories,
					'post__not_in'   => array( get_the_ID() ),
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1
				);
				$related_posts_query = new WP_Query( $args );
			}
		?>
		<?php if ( $related_posts_query->have_posts() ) : ?>
			<div class="pt-12 mt-12 border-t border-t-gray-300">
				<h2 class="text-3xl font-medium"><?php _e( 'Related posts', 'tailmint'); ?></h2>
			</div>
			<div class="container mx-auto mt-12 grid grid-cols-2 sm:grid-cols-1 md:grid-cols-3 gap-8">
				<?php
					while ( $related_posts_query->have_posts() ) {
						$related_posts_query->the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					}
					wp_reset_postdata();
				?>
			</div>
		<?php endif ?>
	</div>
</article>
