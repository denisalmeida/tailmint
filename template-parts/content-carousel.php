<?php if ( is_front_page() ) : ?>
    <?php $sticky = get_option( 'sticky_posts' ); ?>
    <?php if ( !empty( $sticky ) ) : ?>
        <?
            $args = array(
                'post__in' => $sticky,
                'ignore_sticky_posts' => 1,
                'posts_per_page' => 10,
            );
            $sticky_query = new WP_Query( $args );
        ?>
        <?php if ( $sticky_query->have_posts() ) : ?>
            <div id="slider">
                <?php while ( $sticky_query->have_posts() ) :
                    $sticky_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <div>
                        <div class="relative h-[50vh] overflow-hidden w-full">
                            <img src="<?php echo esc_url( $thumbnail_url ); ?>" class="absolute brightness-[.3] object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 z-30 sm:px-5">
                                <div class="mx-auto sm:w-full md:w-2/4 flex flex-col text-white text-center">
                                    <div class="md:text-2xl sm:text-lg">
                                        <span class="text-sm"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <h2 class="md:text-6xl sm:text-3xl font-medium my-5">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $('#slider').slick({
                        arrows: false,
                        dots: true,
                        infinite: true,
                        speed: 700,
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        fade: true,
                        cssEase: 'linear'
                    });
                });
            </script>
        <?php endif ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="w-full h-[50vh] flex items-center px-5 bg-gradient-to-r from-emerald-900 from-10% to-emerald-500 to-90%">
            <div class="container mx-auto">
                <div class="sm:w-full md:w-2/3">
                    <h1 class="text-3xl lg:text-5xl tracking-tight font-bold text-white mb-6">
                        Take your WordPress theme development to the next level, featuring the simplicity of <a href="https://tailwindcss.com" class="text-secondary">Tailwind CSS</a>.
                    </h1>
                    <p class="text-gray-200 text-xl font-medium">Offers a convenient starting point for crafting WordPress themes with Tailwind CSS, including out-of-the-box support for the block editor.</p>

                </div>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>

