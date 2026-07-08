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

/**
 * Auto-create pages and menu on theme activation.
 */
function developer_theme_activation() {
    if (get_option('developer_theme_setup_done')) {
        return;
    }

    $pages = [
        [
            'title'    => 'Inicio',
            'slug'     => 'inicio',
            'template' => '',
        ],
        [
            'title'    => 'Sobre el Doctor',
            'slug'     => 'sobre-el-doctor',
            'template' => 'page-about.php',
        ],
        [
            'title'    => 'Servicios',
            'slug'     => 'servicios',
            'template' => 'page-services.php',
        ],
        [
            'title'    => 'Contacto',
            'slug'     => 'contacto',
            'template' => 'page-contact.php',
        ],
        [
            'title'    => 'Nefrólogo en Xalapa',
            'slug'     => 'nefrologo-xalapa',
            'template' => 'page-location.php',
        ],
        [
            'title'    => 'Nefrólogo en Boca del Río',
            'slug'     => 'nefrologo-veracruz',
            'template' => 'page-location.php',
        ],
    ];

    $page_ids = [];

    foreach ($pages as $page_data) {
        $existing = get_page_by_path($page_data['slug']);
        if ($existing) {
            $page_ids[$page_data['slug']] = $existing->ID;
            continue;
        }

        $page_id = wp_insert_post([
            'post_title'   => $page_data['title'],
            'post_name'    => $page_data['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);

        if ($page_id && !is_wp_error($page_id) && !empty($page_data['template'])) {
            update_post_meta($page_id, '_wp_page_template', $page_data['template']);
        }

        if ($page_id && !is_wp_error($page_id)) {
            $page_ids[$page_data['slug']] = $page_id;
        }
    }

    // Set front page
    if (isset($page_ids['inicio'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['inicio']);
    }

    // Create primary menu
    $menu_name = 'Principal';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        if (!is_wp_error($menu_id)) {
            $menu_items = [
                'inicio'            => 'Inicio',
                'sobre-el-doctor'   => 'Sobre el Doctor',
                'servicios'         => 'Servicios',
                'nefrologo-xalapa'  => 'Xalapa',
                'nefrologo-veracruz' => 'Boca del Río',
                'contacto'          => 'Contacto',
            ];

            $position = 0;
            foreach ($menu_items as $slug => $title) {
                if (isset($page_ids[$slug])) {
                    wp_update_nav_menu_item($menu_id, 0, [
                        'menu-item-title'     => $title,
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $page_ids[$slug],
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $position++,
                    ]);
                }
            }

            $locations = get_theme_mod('nav_menu_locations', []);
            $locations['primary'] = $menu_id;
            $locations['footer'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    update_option('developer_theme_setup_done', true);

    // Flush rewrite rules for CPT
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'developer_theme_activation');

function developer_update_location_labels() {
    if ('1' === get_option('developer_location_labels_version')) {
        return;
    }

    $location_page = get_page_by_path('nefrologo-veracruz');

    if ($location_page && 'Nefrólogo en Boca del Río' !== $location_page->post_title) {
        wp_update_post([
            'ID'         => $location_page->ID,
            'post_title' => 'Nefrólogo en Boca del Río',
        ]);

        $menus = wp_get_nav_menus();

        foreach ($menus as $menu) {
            $items = wp_get_nav_menu_items($menu->term_id);

            foreach ($items ?: [] as $item) {
                if ('page' === $item->object && (int) $item->object_id === (int) $location_page->ID) {
                    wp_update_nav_menu_item($menu->term_id, $item->ID, [
                        'menu-item-title'     => 'Boca del Río',
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $location_page->ID,
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                        'menu-item-parent-id' => $item->menu_item_parent,
                        'menu-item-position'  => $item->menu_order,
                    ]);
                }
            }
        }
    }

    update_option('developer_location_labels_version', '1');
}
add_action('init', 'developer_update_location_labels');

function developer_seed_professional_profile() {
    if ('4' === get_option('developer_professional_profile_version')) {
        return;
    }

    $theme_mod_defaults = [
        'doctor_name'        => 'Dr. Edgar Eduardo Hernández Enríquez',
        'doctor_specialty'   => 'Nefrología',
        'doctor_description' => 'Atención especializada en enfermedades del riñón, diálisis, hemodiálisis, accesos vasculares y salud renal en Xalapa y Boca del Río, Veracruz.',
        'phone_number'       => '229 446 6698',
        'whatsapp_number'    => '2294466698',
        'social_instagram'   => 'https://www.instagram.com/dr.edgarhernandez.nefro/',
    ];

    foreach ($theme_mod_defaults as $key => $value) {
        $current = trim((string) get_theme_mod($key, ''));

        if ('' === $current || ('whatsapp_number' === $key && '522281565985' === developer_normalize_whatsapp_number($current))) {
            set_theme_mod($key, $value);
        }
    }

    developer_ensure_legal_pages();
    developer_seed_service_posts();

    update_option('developer_professional_profile_version', '4');
    flush_rewrite_rules(false);
}
add_action('init', 'developer_seed_professional_profile', 20);

function developer_ensure_legal_pages() {
    $page_ids = [];

    foreach (developer_get_legal_pages_catalog() as $legal_page) {
        $existing = get_page_by_path($legal_page['slug']);
        $content = wp_kses_post($legal_page['content']);

        if ($existing) {
            $page_ids[$legal_page['slug']] = (int) $existing->ID;
            continue;
        }

        $page_id = wp_insert_post([
            'post_title'   => $legal_page['title'],
            'post_name'    => $legal_page['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => $content,
            'post_excerpt' => $legal_page['summary'],
        ]);

        if ($page_id && !is_wp_error($page_id)) {
            $page_ids[$legal_page['slug']] = (int) $page_id;

            if (function_exists('pll_set_post_language')) {
                pll_set_post_language($page_id, 'es');
            }
        }
    }

    $legacy_content = '<p>Contenido pendiente de revisión legal. Este espacio se completará con el texto definitivo proporcionado y aprobado por el responsable del sitio.</p>';
    $legacy_existing = get_page_by_path('aviso-legal');
    $legacy_index = '<p>Esta página concentra los documentos legales del sitio. Los textos son bases informativas pendientes de revisión legal final.</p><ul>';

    foreach (developer_get_legal_pages_catalog() as $legal_page) {
        $legacy_index .= '<li><a href="' . esc_url(developer_get_legal_page_url($legal_page['slug'])) . '">' . esc_html($legal_page['title']) . '</a>: ' . esc_html($legal_page['summary']) . '</li>';
    }

    $legacy_index .= '</ul>';

    if ($legacy_existing) {
        $current_content = trim(wp_strip_all_tags((string) $legacy_existing->post_content));
        $placeholder_content = trim(wp_strip_all_tags($legacy_content));

        if ('' === $current_content || $current_content === $placeholder_content) {
            wp_update_post([
                'ID'           => $legacy_existing->ID,
                'post_title'   => 'Aviso legal',
                'post_content' => wp_kses_post($legacy_index),
            ]);
        }

        $page_ids['aviso-legal'] = (int) $legacy_existing->ID;
    } else {
        $legacy_page_id = wp_insert_post([
            'post_title'   => 'Aviso legal',
            'post_name'    => 'aviso-legal',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => wp_kses_post($legacy_index),
        ]);

        if ($legacy_page_id && !is_wp_error($legacy_page_id)) {
            $page_ids['aviso-legal'] = (int) $legacy_page_id;
        }
    }

    return $page_ids;
}

function developer_seed_service_posts() {
    $services = developer_get_service_catalog();
    $position = 0;

    foreach ($services as $service) {
        $spanish_post_id = developer_upsert_seed_service_post($service, 'es', $position++);

        if ($spanish_post_id && function_exists('pll_set_post_language') && function_exists('pll_save_post_translations')) {
            $english_service = developer_get_service_english_data($service);
            $english_post_id = developer_upsert_seed_service_post($english_service, 'en', $position++, $service['slug']);

            if ($english_post_id) {
                pll_set_post_language($spanish_post_id, 'es');
                pll_set_post_language($english_post_id, 'en');
                pll_save_post_translations([
                    'es' => $spanish_post_id,
                    'en' => $english_post_id,
                ]);
            }
        }
    }
}

function developer_upsert_seed_service_post($service, $language = 'es', $position = 0, $source_slug = '') {
    $existing = get_page_by_path($service['slug'], OBJECT, 'servicio');
    $content = 'en' === $language ? developer_build_service_content_en($service) : developer_build_service_content($service);
    $post_data = [
        'post_title'   => $service['title'],
        'post_name'    => $service['slug'],
        'post_status'  => 'publish',
        'post_type'    => 'servicio',
        'post_excerpt' => $service['excerpt'],
        'post_content' => $content,
        'menu_order'   => $position,
    ];

    if ($existing) {
        $managed_version = get_post_meta($existing->ID, '_developer_seed_version', true);

        if (in_array($managed_version, ['1', '2', '3'], true)) {
            $post_data['ID'] = $existing->ID;
            wp_update_post($post_data);
            update_post_meta($existing->ID, '_developer_seed_version', '3');
            update_post_meta($existing->ID, '_developer_service_category', $service['category']);
            update_post_meta($existing->ID, '_developer_service_language', $language);

            if ($source_slug) {
                update_post_meta($existing->ID, '_developer_service_source_slug', $source_slug);
            }
        }

        return (int) $existing->ID;
    }

    $post_id = wp_insert_post($post_data);

    if ($post_id && !is_wp_error($post_id)) {
        update_post_meta($post_id, '_developer_seed_version', '3');
        update_post_meta($post_id, '_developer_service_category', $service['category']);
        update_post_meta($post_id, '_developer_service_language', $language);

        if ($source_slug) {
            update_post_meta($post_id, '_developer_service_source_slug', $source_slug);
        }

        return (int) $post_id;
    }

    return 0;
}
