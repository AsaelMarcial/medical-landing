<?php
/**
 * Schema Markup (JSON-LD).
 */

function developer_output_schema() {
    if (is_front_page()) {
        developer_physician_schema();
        developer_medical_organization_schema();
        developer_local_business_schema('xalapa');
        developer_local_business_schema('veracruz');
    }

    if (is_page('nefrologo-xalapa') || is_page('nefrologo-en-xalapa')) {
        developer_local_business_schema('xalapa');
    }

    if (is_page('nefrologo-veracruz') || is_page('nefrologo-en-veracruz')) {
        developer_local_business_schema('veracruz');
    }
}
add_action('wp_head', 'developer_output_schema');

function developer_physician_schema() {
    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => 'Physician',
        'name'             => get_theme_mod('doctor_name', 'Dr. Nombre Apellido'),
        'description'      => get_theme_mod('doctor_description', 'Médico Nefrólogo especialista en enfermedades renales'),
        'medicalSpecialty' => 'Nephrology',
        'url'              => home_url('/'),
        'telephone'        => get_theme_mod('phone_number', ''),
        'email'            => get_theme_mod('contact_email', ''),
        'image'            => get_theme_mod('custom_logo') ? wp_get_attachment_url(get_theme_mod('custom_logo')) : '',
        'address'          => [
            [
                '@type'           => 'PostalAddress',
                'streetAddress'   => get_theme_mod('address_xalapa', ''),
                'addressLocality' => 'Xalapa',
                'addressRegion'   => 'Veracruz',
                'addressCountry'  => 'MX',
            ],
            [
                '@type'           => 'PostalAddress',
                'streetAddress'   => get_theme_mod('address_veracruz', ''),
                'addressLocality' => 'Veracruz',
                'addressRegion'   => 'Veracruz',
                'addressCountry'  => 'MX',
            ],
        ],
        'availableService' => [
            ['@type' => 'MedicalProcedure', 'name' => 'Consulta Nefrológica'],
            ['@type' => 'MedicalProcedure', 'name' => 'Hemodiálisis'],
            ['@type' => 'MedicalProcedure', 'name' => 'Evaluación para Trasplante Renal'],
            ['@type' => 'MedicalProcedure', 'name' => 'Tratamiento de Hipertensión Arterial'],
            ['@type' => 'MedicalProcedure', 'name' => 'Nefropatía Diabética'],
            ['@type' => 'MedicalProcedure', 'name' => 'Litiasis Renal'],
        ],
    ];

    developer_render_schema($schema);
}

function developer_medical_organization_schema() {
    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => 'MedicalOrganization',
        'name'             => get_theme_mod('clinic_name', 'Consultorio de Nefrología'),
        'url'              => home_url('/'),
        'telephone'        => get_theme_mod('phone_number', ''),
        'email'            => get_theme_mod('contact_email', ''),
        'medicalSpecialty' => 'Nephrology',
        'openingHours'     => ['Mo-Fr 09:00-18:00', 'Sa 09:00-14:00'],
    ];

    developer_render_schema($schema);
}

function developer_local_business_schema($location = 'xalapa') {
    $is_xalapa = ($location === 'xalapa');

    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => ['MedicalBusiness', 'LocalBusiness'],
        'name'             => get_theme_mod('doctor_name', 'Dr. Nombre Apellido') . ' - ' . ($is_xalapa ? 'Xalapa' : 'Veracruz'),
        'description'      => sprintf('Nefrólogo en %s, Veracruz. Especialista en enfermedades renales, hemodiálisis y trasplante renal.', $is_xalapa ? 'Xalapa' : 'Veracruz'),
        'url'              => home_url($is_xalapa ? '/nefrologo-xalapa/' : '/nefrologo-veracruz/'),
        'telephone'        => get_theme_mod('phone_number', ''),
        'email'            => get_theme_mod('contact_email', ''),
        'medicalSpecialty' => 'Nephrology',
        'address'          => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_theme_mod($is_xalapa ? 'address_xalapa' : 'address_veracruz', ''),
            'addressLocality' => $is_xalapa ? 'Xalapa' : 'Veracruz',
            'addressRegion'   => 'Veracruz',
            'postalCode'      => '',
            'addressCountry'  => 'MX',
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '09:00',
                'closes'    => '18:00',
            ],
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens'     => '09:00',
                'closes'    => '14:00',
            ],
        ],
        'priceRange' => '$$',
    ];

    developer_render_schema($schema);
}

function developer_render_schema($schema) {
    $schema = array_filter($schema, function ($value) {
        return !empty($value);
    });
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
