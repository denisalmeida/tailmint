<article id="post-<?php the_ID(); ?>" class="overflow-hidden rounded-lg shadow transition hover:shadow-lg grid grid-rows-[auto_1fr_auto]">
  <?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			<img class="rounded-t object-cover h-40 w-full row-[1]" loading=”lazy” src="<?php echo esc_url( $featured_image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
		</a>
	<?php else : ?>
		<a href="<?php the_permalink(); ?>">
			<div class="rounded object-cover h-40 w-full bg-gray-300 relative row-[1]">
				<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="absolute left-1/2 top-1/2 block -translate-x-1/2 -translate-y-1/2">
					<path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M15 8h.01" />
					<path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
					<path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
					<path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
				</svg>
			</div>
		</a>
	<?php endif; ?>
	<div class="bg-white p-6 row-[2]">
		<div>
			<?php
				$categories = get_the_category();
				foreach ( $categories as $category ) {
					echo '<span class="whitespace-nowrap rounded-full bg-green-100 px-2.5 py-0.5 text-xs text-green-700" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</span>';
				}
			?>
		</div>
		<a href="<?php the_permalink(); ?>">
			<h3 class="mt-2 text-xl font-semibold text-gray-900"><?php the_title(); ?></h3>
		</a>
		<div class="mt-2 flex flex-wrap gap-1">
			<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
				<?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
			</p>
		</div>
	</div>
  	<time datetime="2022-10-10" class="block text-xs text-gray-500  px-6 pb-6 row-[3]"><?php echo get_the_date(); ?></time>
</article>