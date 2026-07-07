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

    // Google Fonts - Inter + Playfair Display
    wp_enqueue_style(
        'developer-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap',
        [],
        null
    );

    // Register Alpine components before Alpine starts.
    wp_enqueue_script(
        'developer-navigation',
        DEVELOPER_THEME_URI . '/assets/js/navigation.js',
        [],
        DEVELOPER_THEME_VERSION,
        ['strategy' => 'defer', 'in_footer' => true]
    );

    // Alpine.js
    wp_enqueue_script(
        'alpinejs',
        'https://cdn.jsdelivr.net/npm/alpinejs@3.15.12/dist/cdn.min.js',
        ['developer-navigation'],
        '3.15.12',
        ['strategy' => 'defer']
    );

    // GSAP
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.15.0/dist/gsap.min.js',
        [],
        '3.15.0',
        ['strategy' => 'defer', 'in_footer' => true]
    );

    // GSAP ScrollTrigger
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.15.0/dist/ScrollTrigger.min.js',
        ['gsap'],
        '3.15.0',
        ['strategy' => 'defer', 'in_footer' => true]
    );

    // Theme animations
    wp_enqueue_script(
        'developer-animations',
        DEVELOPER_THEME_URI . '/assets/js/animations.js',
        ['gsap', 'gsap-scrolltrigger'],
        DEVELOPER_THEME_VERSION,
        ['strategy' => 'defer', 'in_footer' => true]
    );

}
add_action('wp_enqueue_scripts', 'developer_enqueue_assets');

function developer_preload_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'developer_preload_fonts', 1);
