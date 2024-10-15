<?php get_header(); ?>
	<?php if ( is_archive() ) : ?>
		<div class="mx-auto container text-center mt-14">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
	<?php elseif ( is_search() ) : ?>
		<div class="mx-auto container text-center mt-14">
			<h1 class="text-4xl font-bold mb-1">Resultados de busca</h1>
			<span class="text-2xl text-gray-500"> para: "<span class="text-gray-800 font-semibold">
				<?php echo get_search_query() ?></span>"
			</span>
		</div>
	<?php endif; ?>
<?php if ( have_posts() ) : ?>
	<div class="container mx-auto my-16 grid grid-cols-2 sm:grid-cols-1 md:grid-cols-3 gap-8">
		<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			}
		?>
	</div>
<?php else : ?>
	<?php get_template_part( 'template-parts/content-none' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
