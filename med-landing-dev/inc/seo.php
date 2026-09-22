<?php
/** Rank Math owns metadata; fallbacks operate only when it is unavailable. */
function developer_rank_math_controls_frontend() {
    return defined('RANK_MATH_VERSION') && (bool) get_option('rank_math_setup_completed', false) && !\RankMath\Helper::is_invalid_registration();
}
add_filter('rank_math/frontend/title', static function ($title) {
    return is_front_page() ? developer_get_seo_title() : $title;
});
add_filter('rank_math/frontend/description', static function ($description) {
    return is_front_page() ? developer_get_seo_description() : $description;
});
add_filter('rank_math/frontend/canonical', static function ($canonical) {
    return is_front_page() ? developer_get_home_url() : $canonical;
});
function developer_get_seo_title() {
    if (is_404()) {
        return developer_text('Página no encontrada', 'Page not found') . ' | Dr. Edgar E. Hernández';
    }
    if (is_front_page()) {
        return developer_text('Dr. Edgar E. Hernández | Nefrólogo en Xalapa', 'Dr. Edgar E. Hernández | Nephrologist in Xalapa');
    }
    return get_the_title() . developer_text(' | Nefrólogo en Xalapa', ' | Nephrologist in Xalapa');
}
function developer_get_seo_description() {
    if (is_singular() && has_excerpt()) {
        return wp_strip_all_tags(get_the_excerpt());
    }
    return developer_text('Consulta de nefrología con el Dr. Edgar Eduardo Hernández Enríquez en Torre Hakim y Policlinica Óptima, Xalapa. Agenda por WhatsApp.', 'Nephrology consultation with Dr. Edgar Eduardo Hernández Enríquez at Torre Hakim and Policlinica Óptima, Xalapa. Book via WhatsApp.');
}
add_filter('document_title_parts', static function ($parts) {
    return developer_rank_math_controls_frontend() ? $parts : ['title' => developer_get_seo_title()];
}, 20);
add_filter('wp_robots', static function ($robots) {
    if (is_404() || is_search()) {
        unset($robots['index']);
        $robots['noindex'] = true;
    }
    $robots['max-image-preview'] = 'large';
    return $robots;
}, 20);
add_filter('rank_math/frontend/robots', static function ($robots) {
    if (is_404() || is_search() || '1' !== (string) get_option('blog_public')) {
        $robots['index'] = 'noindex';
    }
    return $robots;
});
add_action('wp_head', static function () {
    if (developer_rank_math_controls_frontend() || is_admin() || is_feed() || is_404() || is_search()) {
        return;
    }
    $title = developer_get_seo_title();
    $description = developer_get_seo_description();
    $url = is_front_page() ? developer_get_home_url() : get_permalink();
    $image = developer_get_doctor_photo_url('large');
    foreach (['description' => $description, 'twitter:card' => 'summary_large_image', 'twitter:title' => $title, 'twitter:description' => $description, 'twitter:image' => $image] as $name => $value) {
        printf('<meta name="%s" content="%s">' . "\n", esc_attr($name), esc_attr($value));
    }
    foreach (['og:title' => $title, 'og:description' => $description, 'og:url' => $url, 'og:type' => 'website', 'og:image' => $image, 'og:locale' => developer_text('es_MX', 'en_US')] as $name => $value) {
        printf('<meta property="%s" content="%s">' . "\n", esc_attr($name), esc_attr($value));
    }
}, 4);
add_filter('robots_txt', static function ($output, $public) {
    if ('1' !== (string) $public) {
        return "User-agent: *\nDisallow: /\n";
    }
    return "User-agent: *\nDisallow: /wp-admin/\nAllow: /wp-admin/admin-ajax.php\n\nSitemap: " . home_url(developer_rank_math_controls_frontend() ? '/sitemap_index.xml' : '/wp-sitemap.xml') . "\n";
}, 20, 2);
add_filter('wp_sitemaps_add_provider', static function ($provider, $name) {
    return 'users' === $name ? false : $provider;
}, 20, 2);
add_action('template_redirect', static function () {
    if (!in_array($_SERVER['REQUEST_METHOD'] ?? 'GET', ['GET', 'HEAD'], true)) {
        return;
    }
    $path = wp_parse_url(wp_unslash($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH);
    $redirects = get_option('developer_redirects_170', []);
    if (developer_rank_math_controls_frontend()) {
        $redirects['/wp-sitemap.xml'] = '/sitemap_index.xml';
    }
    if (isset($redirects[$path])) {
        wp_safe_redirect(home_url($redirects[$path]), 301, 'Medical Landing 1.7.0');
        exit;
    }
}, 1);
// Keep the theme's medical entities authoritative without duplicate local entities.
add_filter('rank_math/json_ld', static function ($data) {
    foreach ($data as $key => $entity) {
        if (array_intersect((array) ($entity['@type'] ?? []), ['Physician', 'MedicalBusiness', 'LocalBusiness', 'MedicalOrganization'])) {
            unset($data[$key]);
        }
    }
    return $data;
}, 99);
