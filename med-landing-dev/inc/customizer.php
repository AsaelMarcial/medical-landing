<?php
/**
 * Theme Customizer settings.
 */

function developer_customize_register($wp_customize) {
    // Section: Contact Info
    $wp_customize->add_section('developer_contact', [
        'title'    => __('Información de Contacto', 'med-landing-dev'),
        'priority' => 30,
    ]);

    // Doctor Name
    $wp_customize->add_setting('doctor_name', ['default' => 'Dr. Edgar Eduardo Hernández Enríquez', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('doctor_name', [
        'label'   => __('Nombre del Doctor', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'text',
    ]);

    // Doctor Specialty
    $wp_customize->add_setting('doctor_specialty', ['default' => 'Nefrología', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('doctor_specialty', [
        'label'   => __('Especialidad', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'text',
    ]);

    // Clinic Name
    $wp_customize->add_setting('clinic_name', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('clinic_name', [
        'label'   => __('Nombre del Consultorio', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'text',
    ]);

    // Phone
    $wp_customize->add_setting('phone_number', ['default' => '229 446 6698', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('phone_number', [
        'label'   => __('Teléfono', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'tel',
    ]);

    // WhatsApp
    $wp_customize->add_setting('whatsapp_number', ['default' => '2294466698', 'sanitize_callback' => 'developer_sanitize_whatsapp_number']);
    $wp_customize->add_control('whatsapp_number', [
        'label'       => __('WhatsApp (con código de país)', 'med-landing-dev'),
        'description' => __('Acepta 10 dígitos, +52, espacios o guiones. Ejemplo: 228 123 4567.', 'med-landing-dev'),
        'section'     => 'developer_contact',
        'type'        => 'text',
    ]);

    $wp_customize->add_setting('whatsapp_message', [
        'default'           => 'Hola, me gustaría solicitar información para agendar una cita.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('whatsapp_message', [
        'label'       => __('Mensaje inicial de WhatsApp', 'med-landing-dev'),
        'description' => __('Se utiliza como mensaje general; las páginas pueden añadir contexto específico.', 'med-landing-dev'),
        'section'     => 'developer_contact',
        'type'        => 'textarea',
    ]);

    // Email
    $wp_customize->add_setting('contact_email', ['default' => '', 'sanitize_callback' => 'sanitize_email']);
    $wp_customize->add_control('contact_email', [
        'label'   => __('Email de Contacto', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'email',
    ]);

    $wp_customize->add_setting('fluent_form_id', ['default' => 0, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('fluent_form_id', [
        'label'       => __('ID del formulario Fluent Forms', 'med-landing-dev'),
        'description' => __('Déjalo en 0 hasta crear y probar el formulario de contacto.', 'med-landing-dev'),
        'section'     => 'developer_contact',
        'type'        => 'number',
        'input_attrs' => [
            'min'  => 0,
            'step' => 1,
        ],
    ]);

    // Doctor Description
    $wp_customize->add_setting('doctor_description', [
        'default'           => 'Atención especializada en enfermedades del riñón, diálisis, hemodiálisis, accesos vasculares y salud renal en Xalapa y Boca del Río, Veracruz.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('doctor_description', [
        'label'   => __('Descripción corta del Doctor', 'med-landing-dev'),
        'section' => 'developer_contact',
        'type'    => 'textarea',
    ]);

    // Section: Addresses
    $wp_customize->add_section('developer_addresses', [
        'title'    => __('Direcciones', 'med-landing-dev'),
        'priority' => 31,
    ]);

    // Xalapa Address
    $wp_customize->add_setting('address_xalapa', [
        'default'           => 'Torre Hakim | Local 909',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('address_xalapa', [
        'label'   => __('Dirección Xalapa', 'med-landing-dev'),
        'section' => 'developer_addresses',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('maps_url_xalapa', [
        'default'           => 'https://maps.app.goo.gl/JJZw4PL8UMG7SBa17',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('maps_url_xalapa', [
        'label'   => __('Enlace de Google Maps - Xalapa', 'med-landing-dev'),
        'section' => 'developer_addresses',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('map_embed_url_xalapa', [
        'default'           => developer_get_location('xalapa')['map_embed_url'],
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('map_embed_url_xalapa', [
        'label'       => __('URL de mapa insertado - Xalapa', 'med-landing-dev'),
        'description' => __('Usa únicamente el valor src del iframe de Google Maps.', 'med-landing-dev'),
        'section'     => 'developer_addresses',
        'type'        => 'url',
    ]);

    // Boca del Rio Address
    $wp_customize->add_setting('address_veracruz', [
        'default'           => 'Hospital MediMAC | Consultorio 37 | Avenida Calzada Juan Pablo II, Plaza Urban Center',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('address_veracruz', [
        'label'   => __('Dirección Boca del Río', 'med-landing-dev'),
        'section' => 'developer_addresses',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('maps_url_veracruz', [
        'default'           => 'https://maps.app.goo.gl/T3aZ7gXx3MWDn3e98',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('maps_url_veracruz', [
        'label'   => __('Enlace de Google Maps - Boca del Río', 'med-landing-dev'),
        'section' => 'developer_addresses',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('map_embed_url_veracruz', [
        'default'           => developer_get_location('veracruz')['map_embed_url'],
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('map_embed_url_veracruz', [
        'label'       => __('URL de mapa insertado - Boca del Río', 'med-landing-dev'),
        'description' => __('Usa únicamente el valor src del iframe de Google Maps.', 'med-landing-dev'),
        'section'     => 'developer_addresses',
        'type'        => 'url',
    ]);

    // Section: Social
    $wp_customize->add_section('developer_social', [
        'title'    => __('Redes Sociales', 'med-landing-dev'),
        'priority' => 32,
    ]);

    $social_networks = ['facebook', 'instagram', 'linkedin'];
    foreach ($social_networks as $network) {
        $default_url = 'instagram' === $network ? 'https://www.instagram.com/dr.edgarhernandez.nefro/' : '';
        $wp_customize->add_setting("social_{$network}", ['default' => $default_url, 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("social_{$network}", [
            'label'   => ucfirst($network),
            'section' => 'developer_social',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'developer_customize_register');
