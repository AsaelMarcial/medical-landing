<?php
/**
 * Theme setup.
 */

function developer_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary'   => __('Menú Principal', 'med-landing-dev'),
        'footer'    => __('Menú Footer', 'med-landing-dev'),
    ]);

    load_theme_textdomain('med-landing-dev', DEVELOPER_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'developer_theme_setup');

function developer_output_fallback_site_icon() {
    if (has_site_icon()) {
        return;
    }

    printf(
        '<link rel="icon" href="%1$s" sizes="512x512">%2$s',
        esc_url(developer_get_brand_logo_url('favicon')),
        "\n"
    );
}
add_action('wp_head', 'developer_output_fallback_site_icon', 2);
