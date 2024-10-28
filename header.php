<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-gray-900 antialiased font-body font-base' ); ?>>
<?php do_action( 'tailmint_site_before' ); ?>
<?php wp_body_open(); ?>
<div id="page" class="min-h-screen flex flex-col">
    <header class="site-header sticky top-0 left-0 z-50 w-full py-3 text-dark bg-white drop-shadow-md">
        <?php do_action( 'tailmint_header' ); ?>
        <div class="container mx-auto flex flex-wrap items-center content-between py-2">
            <div>
                <a href="<?php echo get_bloginfo( 'url' ); ?>" class="<?php echo has_custom_logo() ? '' : 'font-bold text-3xl'; ?>">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
                        <img class="w-16" src="<?php echo esc_url( $image[0] ); ?>" alt="">
                    <?php else : ?>
                        <?php echo get_bloginfo( 'name' ); ?>
                    <?php endif ?>
                </a>
            </div>
            <button id="menu-toggle" class="inline-flex items-center text-sm ml-4 rounded-lg md:hidden sm:ml-auto" type="button">
                <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <?php
				wp_nav_menu(
					array(
						'container_id'    => 'main-menu',
						'container_class' => 'md:ml-auto sm:hidden md:block',
						'menu_class'      => 'flex sm:flex-col sm:gap-3 md:gap-10 md:flex-row',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-4',
						'fallback_cb'     => false,
					)
				);
			?>
        </div>
    </header>
    <main class="site-content flex flex-col flex-grow">
        <?php get_template_part( 'template-parts/content-carousel' ); ?>
        <?php do_action( 'tailmint_content_start' ); ?>

