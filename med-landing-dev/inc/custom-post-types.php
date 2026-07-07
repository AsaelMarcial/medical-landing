<?php
/**
 * Custom Post Types.
 */

function developer_register_post_types() {
    // CPT: Servicios
    register_post_type('servicio', [
        'labels' => [
            'name'               => __('Servicios', 'med-landing-dev'),
            'singular_name'      => __('Servicio', 'med-landing-dev'),
            'add_new'            => __('Agregar Servicio', 'med-landing-dev'),
            'add_new_item'       => __('Agregar Nuevo Servicio', 'med-landing-dev'),
            'edit_item'          => __('Editar Servicio', 'med-landing-dev'),
            'view_item'          => __('Ver Servicio', 'med-landing-dev'),
            'all_items'          => __('Todos los Servicios', 'med-landing-dev'),
            'search_items'       => __('Buscar Servicios', 'med-landing-dev'),
            'not_found'          => __('No se encontraron servicios', 'med-landing-dev'),
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
