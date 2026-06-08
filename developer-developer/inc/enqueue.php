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

    // Alpine.js
    wp_enqueue_script(
        'alpinejs',
        'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
        [],
        null,
        ['strategy' => 'defer']
    );

    // GSAP
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js',
        [],
        null,
        true
    );

    // GSAP ScrollTrigger
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js',
        ['gsap'],
        null,
        true
    );

    // Theme animations
    wp_enqueue_script(
        'developer-animations',
        DEVELOPER_THEME_URI . '/assets/js/animations.js',
        ['gsap', 'gsap-scrolltrigger'],
        DEVELOPER_THEME_VERSION,
        true
    );

    // Theme navigation (Alpine components)
    wp_enqueue_script(
        'developer-navigation',
        DEVELOPER_THEME_URI . '/assets/js/navigation.js',
        ['alpinejs'],
        DEVELOPER_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'developer_enqueue_assets');

function developer_preload_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'developer_preload_fonts', 1);
