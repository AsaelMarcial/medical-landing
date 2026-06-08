<?php
/**
 * Custom Post Types.
 */

function developer_register_post_types() {
    // CPT: Servicios
    register_post_type('servicio', [
        'labels' => [
            'name'               => __('Servicios', 'developer-developer'),
            'singular_name'      => __('Servicio', 'developer-developer'),
            'add_new'            => __('Agregar Servicio', 'developer-developer'),
            'add_new_item'       => __('Agregar Nuevo Servicio', 'developer-developer'),
            'edit_item'          => __('Editar Servicio', 'developer-developer'),
            'view_item'          => __('Ver Servicio', 'developer-developer'),
            'all_items'          => __('Todos los Servicios', 'developer-developer'),
            'search_items'       => __('Buscar Servicios', 'developer-developer'),
            'not_found'          => __('No se encontraron servicios', 'developer-developer'),
        ],
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => ['slug' => 'servicios', 'with_front' => false],
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'menu_icon'          => 'dashicons-heart',
        'show_in_rest'       => true,
    ]);
}
add_action('init', 'developer_register_post_types');
