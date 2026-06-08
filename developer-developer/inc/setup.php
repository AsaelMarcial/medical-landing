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
        'primary'   => __('Menú Principal', 'developer-developer'),
        'footer'    => __('Menú Footer', 'developer-developer'),
    ]);

    load_theme_textdomain('developer-developer', DEVELOPER_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'developer_theme_setup');

function developer_deregister_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'developer_deregister_jquery', 1);

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
            'title'    => 'Nefrólogo en Veracruz',
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
                'nefrologo-veracruz' => 'Veracruz',
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
