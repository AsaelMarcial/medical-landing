<?php
/**
 * SEO fallbacks for production.
 *
 * Rank Math remains the preferred SEO UI, but on fresh installs it may not
 * output metadata until its setup is completed. These fallbacks keep critical
 * title, meta description and social tags healthy meanwhile.
 */

function developer_rank_math_controls_frontend() {
    return defined('RANK_MATH_VERSION') && (bool) get_option('rank_math_setup_completed', false);
}

function developer_get_seo_title() {
    if (is_front_page()) {
        return 'Dr. Edgar E. Hernández | Nefrólogo en Xalapa y Boca del Río';
    }

    if (is_singular('servicio')) {
        return get_the_title() . ' | Nefrólogo en Xalapa y Boca del Río';
    }

    if (developer_is_page_translation('sobre-el-doctor')) {
        return 'Sobre el Dr. Edgar Eduardo Hernández Enríquez | Nefrología';
    }

    if (developer_is_page_translation('servicios')) {
        return 'Servicios de nefrología | Enfermedades del riñón, diálisis y hemodiálisis';
    }

    if (developer_is_page_translation('contacto')) {
        return 'Contacto y citas | Nefrólogo en Xalapa y Boca del Río';
    }

    if (developer_is_page_translation('nefrologo-xalapa')) {
        return 'Nefrólogo en Xalapa | Dr. Edgar E. Hernández';
    }

    if (developer_is_page_translation('nefrologo-veracruz')) {
        return 'Nefrólogo en Boca del Río, Veracruz | Dr. Edgar E. Hernández';
    }

    if (is_singular()) {
        return get_the_title() . ' | Dr. Edgar E. Hernández';
    }

    return get_bloginfo('name');
}

function developer_get_seo_description() {
    if (is_front_page()) {
        return 'Atención especializada en enfermedades del riñón con el Dr. Edgar Eduardo Hernández Enríquez. Consultas de nefrología en Xalapa y Boca del Río, Veracruz.';
    }

    if (is_singular('servicio')) {
        $excerpt = trim((string) get_the_excerpt());

        return wp_trim_words(
            $excerpt ?: 'Consulta con especialista en nefrología en Xalapa y Boca del Río, Veracruz.',
            28,
            ''
        );
    }

    $descriptions = [
        'sobre-el-doctor'   => 'Conoce la formación, certificación y cédulas profesionales del Dr. Edgar Eduardo Hernández Enríquez, especialista en nefrología en Veracruz.',
        'servicios'         => 'Valoración y tratamiento de enfermedad renal crónica, diabetes, hipertensión, litiasis renal, diálisis, hemodiálisis y procedimientos nefrológicos.',
        'contacto'          => 'Agenda una consulta de nefrología en Xalapa o Boca del Río. Teléfono y WhatsApp para citas con el Dr. Edgar E. Hernández.',
        'nefrologo-xalapa'  => 'Consulta de nefrología en Xalapa, Veracruz, en Torre Hakim Local 909. Atención especializada en salud renal.',
        'nefrologo-veracruz' => 'Consulta de nefrología en Boca del Río, Veracruz, Hospital MediMAC Consultorio 37. Atención especializada en enfermedades del riñón.',
    ];

    foreach ($descriptions as $slug => $description) {
        if (developer_is_page_translation($slug)) {
            return $description;
        }
    }

    return get_bloginfo('description') ?: developer_get_doctor_description();
}

function developer_filter_document_title_parts($parts) {
    if (developer_rank_math_controls_frontend()) {
        return $parts;
    }

    return [
        'title' => developer_get_seo_title(),
    ];
}
add_filter('document_title_parts', 'developer_filter_document_title_parts', 20);

function developer_filter_document_title_separator() {
    return '|';
}
add_filter('document_title_separator', 'developer_filter_document_title_separator');

function developer_filter_robots($robots) {
    if ('1' === (string) get_option('blog_public')) {
        unset($robots['noindex'], $robots['nofollow']);
        $robots['index'] = true;
        $robots['follow'] = true;
    }

    $robots['max-image-preview'] = 'large';

    return $robots;
}
add_filter('wp_robots', 'developer_filter_robots', 20);

function developer_output_seo_fallback_meta() {
    if (developer_rank_math_controls_frontend() || is_admin() || is_feed()) {
        return;
    }

    $title = developer_get_seo_title();
    $description = developer_get_seo_description();
    $url = is_singular() ? get_permalink() : home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
    $url = is_front_page() ? home_url('/') : $url;
    $image = developer_has_doctor_photo() ? developer_get_doctor_photo_url('large') : developer_get_brand_logo_url('composition');
    $locale = 'en' === developer_get_current_language() ? 'en_US' : 'es_MX';

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:locale" content="' . esc_attr($locale) . '">' . "\n";
    echo '<meta property="og:type" content="' . (is_singular('post') ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";

    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
        echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    }

    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
}
add_action('wp_head', 'developer_output_seo_fallback_meta', 4);

function developer_filter_robots_txt($output, $public) {
    $lines = [
        'User-agent: *',
    ];

    if ('1' === (string) $public) {
        $lines[] = 'Disallow: /wp-admin/';
        $lines[] = 'Allow: /wp-admin/admin-ajax.php';
    } else {
        $lines[] = 'Disallow: /';
    }

    $lines[] = '';
    $lines[] = 'Sitemap: ' . home_url('/wp-sitemap.xml');

    return implode("\n", $lines) . "\n";
}
add_filter('robots_txt', 'developer_filter_robots_txt', 20, 2);

function developer_filter_sitemap_provider($provider, $name) {
    if ('users' === $name) {
        return false;
    }

    return $provider;
}
add_filter('wp_sitemaps_add_provider', 'developer_filter_sitemap_provider', 20, 2);
