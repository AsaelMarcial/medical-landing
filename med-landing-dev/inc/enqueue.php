<?php
/**
 * Enqueue scripts and styles.
 */

function developer_enqueue_assets() {
    // Main stylesheet (Tailwind output)
    wp_enqueue_style(
        'developer-style',
        get_stylesheet_uri(),
        [],
        DEVELOPER_THEME_VERSION
    );

    wp_enqueue_script(
        'developer-navigation',
        DEVELOPER_THEME_URI . '/assets/js/navigation.js',
        [],
        DEVELOPER_THEME_VERSION,
        ['strategy' => 'defer', 'in_footer' => true]
    );
}
add_action('wp_enqueue_scripts', 'developer_enqueue_assets');

function developer_trim_frontend_assets() {
    if (is_admin()) {
        return;
    }

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'developer_trim_frontend_assets', 20);

function developer_disable_unused_wp_frontend_assets() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_generator');
}
add_action('init', 'developer_disable_unused_wp_frontend_assets');

function developer_preload_lcp_image() {
    if (!is_front_page() || !function_exists('developer_has_doctor_photo') || !developer_has_doctor_photo()) {
        return;
    }

    $format = file_exists(developer_get_doctor_photo_path('large', 'webp')) ? 'webp' : 'jpg';
    $large = developer_get_doctor_photo_url('large', $format);
    $medium = developer_get_doctor_photo_url('medium', $format);

    printf(
        '<link rel="preload" as="image" href="%1$s" imagesrcset="%2$s 720w, %1$s 1080w" imagesizes="(min-width: 1024px) 36rem, (min-width: 768px) 28rem, 90vw" fetchpriority="high">%3$s',
        esc_url($large),
        esc_url($medium),
        "\n"
    );
}
add_action('wp_head', 'developer_preload_lcp_image', 1);
