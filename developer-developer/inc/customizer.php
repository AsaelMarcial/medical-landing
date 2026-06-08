<?php
/**
 * Theme Customizer settings.
 */

function developer_customize_register($wp_customize) {
    // Section: Contact Info
    $wp_customize->add_section('developer_contact', [
        'title'    => __('Información de Contacto', 'developer-developer'),
        'priority' => 30,
    ]);

    // Doctor Name
    $wp_customize->add_setting('doctor_name', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('doctor_name', [
        'label'   => __('Nombre del Doctor', 'developer-developer'),
        'section' => 'developer_contact',
        'type'    => 'text',
    ]);

    // Clinic Name
    $wp_customize->add_setting('clinic_name', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('clinic_name', [
        'label'   => __('Nombre del Consultorio', 'developer-developer'),
        'section' => 'developer_contact',
        'type'    => 'text',
    ]);

    // Phone
    $wp_customize->add_setting('phone_number', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('phone_number', [
        'label'   => __('Teléfono', 'developer-developer'),
        'section' => 'developer_contact',
        'type'    => 'tel',
    ]);

    // WhatsApp
    $wp_customize->add_setting('whatsapp_number', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('whatsapp_number', [
        'label'       => __('WhatsApp (con código de país)', 'developer-developer'),
        'description' => __('Ej: 522281234567', 'developer-developer'),
        'section'     => 'developer_contact',
        'type'        => 'text',
    ]);

    // Email
    $wp_customize->add_setting('contact_email', ['default' => '', 'sanitize_callback' => 'sanitize_email']);
    $wp_customize->add_control('contact_email', [
        'label'   => __('Email de Contacto', 'developer-developer'),
        'section' => 'developer_contact',
        'type'    => 'email',
    ]);

    // Doctor Description
    $wp_customize->add_setting('doctor_description', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('doctor_description', [
        'label'   => __('Descripción corta del Doctor', 'developer-developer'),
        'section' => 'developer_contact',
        'type'    => 'textarea',
    ]);

    // Section: Addresses
    $wp_customize->add_section('developer_addresses', [
        'title'    => __('Direcciones', 'developer-developer'),
        'priority' => 31,
    ]);

    // Xalapa Address
    $wp_customize->add_setting('address_xalapa', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('address_xalapa', [
        'label'   => __('Dirección Xalapa', 'developer-developer'),
        'section' => 'developer_addresses',
        'type'    => 'textarea',
    ]);

    // Veracruz Address
    $wp_customize->add_setting('address_veracruz', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('address_veracruz', [
        'label'   => __('Dirección Veracruz', 'developer-developer'),
        'section' => 'developer_addresses',
        'type'    => 'textarea',
    ]);

    // Section: Social
    $wp_customize->add_section('developer_social', [
        'title'    => __('Redes Sociales', 'developer-developer'),
        'priority' => 32,
    ]);

    $social_networks = ['facebook', 'instagram', 'linkedin'];
    foreach ($social_networks as $network) {
        $wp_customize->add_setting("social_{$network}", ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("social_{$network}", [
            'label'   => ucfirst($network),
            'section' => 'developer_social',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'developer_customize_register');
