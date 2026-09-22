<?php
/** Run: wp eval-file wp-content/themes/med-landing-dev/scripts/verify-migration-170.php */
$counts = ['page' => ['es' => 0, 'en' => 0], 'servicio' => ['es' => 0, 'en' => 0]];
$keys = [];
foreach (get_posts(['post_type' => ['page', 'servicio'], 'post_status' => 'publish', 'numberposts' => -1, 'suppress_filters' => true]) as $post) {
    $lang = pll_get_post_language($post->ID);
    $pair = pll_get_post_translations($post->ID);
    if (!isset($counts[$post->post_type][$lang]) || empty($pair['es']) || empty($pair['en']) || $pair['es'] === $pair['en']) {
        WP_CLI::error('Invalid language pair for ' . $post->ID);
    }
    $counts[$post->post_type][$lang]++;
    if ('servicio' === $post->post_type) {
        $key = get_post_meta($post->ID, '_developer_service_key', true) . ':' . $lang;
        if (isset($keys[$key]) || str_starts_with($key, ':')) {
            WP_CLI::error('Missing or duplicate stable key: ' . $key);
        }
        $keys[$key] = $post->ID;
    }
    if ('en' === $lang && !str_contains(get_permalink($post), '/en/')) {
        WP_CLI::error('English URL missing prefix: ' . $post->ID);
    }
}
if ($counts !== ['page' => ['es' => 10, 'en' => 10], 'servicio' => ['es' => 17, 'en' => 17]]) {
    WP_CLI::error(wp_json_encode($counts));
}
$proteinuria = get_page_by_path('proteinuria-hematuria', OBJECT, 'servicio');
if ('es' !== pll_get_post_language($proteinuria->ID)) {
    WP_CLI::error('Spanish proteinuria was not restored.');
}
if (array_keys(developer_get_locations()) !== ['xalapa', 'optima']) {
    WP_CLI::error('Unexpected locations.');
}
WP_CLI::success('17 service pairs, 10 page pairs, unique stable keys and correct language URLs.');
