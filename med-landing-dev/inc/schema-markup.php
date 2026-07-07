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

    if (developer_is_page_translation('nefrologo-xalapa')) {
        developer_local_business_schema('xalapa');
    }

    if (developer_is_page_translation('nefrologo-veracruz')) {
        developer_local_business_schema('veracruz');
    }
}
add_action('wp_head', 'developer_output_schema');

function developer_physician_schema() {
    $addresses = [];
    $locations = developer_get_locations();
    $credentials = developer_get_professional_credentials();
    $same_as = array_filter([
        get_theme_mod('social_instagram', 'https://www.instagram.com/dr.edgarhernandez.nefro/'),
        $credentials['conacem_url'],
    ]);
    $service_topics = array_map(
        static function ($service) {
            return $service['title'];
        },
        developer_get_service_catalog()
    );

    foreach ($locations as $location) {
        if ($location['address']) {
            $addresses[] = developer_schema_address($location);
        }
    }

    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => 'Physician',
        'name'             => developer_get_doctor_name(),
        'description'      => developer_get_doctor_description(),
        'medicalSpecialty' => 'Nephrology',
        'url'              => developer_get_home_url(),
        'image'            => developer_has_doctor_photo() ? developer_get_doctor_photo_url('large') : '',
        'telephone'        => developer_get_phone_number(),
        'email'            => get_theme_mod('contact_email', ''),
        'sameAs'           => $same_as,
        'knowsAbout'       => $service_topics,
        'identifier'       => [
            [
                '@type' => 'PropertyValue',
                'name'  => 'Cédula profesional',
                'value' => $credentials['professional_license'],
            ],
            [
                '@type' => 'PropertyValue',
                'name'  => 'Cédula de especialidad',
                'value' => $credentials['specialty_license'],
            ],
            [
                '@type' => 'PropertyValue',
                'name'  => 'COFEPRIS',
                'value' => $credentials['cofepris'],
            ],
        ],
        'address'          => $addresses,
    ];

    developer_render_schema($schema);
}

function developer_medical_organization_schema() {
    $clinic_name = trim((string) get_theme_mod('clinic_name', ''));

    if (!$clinic_name) {
        return;
    }

    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => 'MedicalOrganization',
        'name'             => $clinic_name,
        'url'              => developer_get_home_url(),
        'telephone'        => developer_get_phone_number(),
        'email'            => get_theme_mod('contact_email', ''),
        'medicalSpecialty' => 'Nephrology',
    ];

    developer_render_schema($schema);
}

function developer_local_business_schema($location = 'xalapa') {
    $location_data = developer_get_location($location);

    if (!$location_data['address']) {
        return;
    }

    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => ['MedicalBusiness', 'LocalBusiness'],
        'name'             => developer_get_doctor_name() . ' - ' . $location_data['venue'],
        'description'      => sprintf(
            /* translators: %s: city name. */
            __('Consulta de nefrología en %s, Veracruz.', 'med-landing-dev'),
            $location_data['city']
        ),
        'url'              => $location_data['page_url'],
        'telephone'        => developer_get_phone_number(),
        'email'            => get_theme_mod('contact_email', ''),
        'medicalSpecialty' => 'Nephrology',
        'address'          => developer_schema_address($location_data),
        'hasMap'           => $location_data['maps_url'],
        'geo'              => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => $location_data['latitude'],
            'longitude' => $location_data['longitude'],
        ],
    ];

    developer_render_schema($schema);
}

function developer_schema_address($location) {
    return [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $location['address'],
        'addressLocality' => $location['city'],
        'addressRegion'   => $location['region'],
        'addressCountry'  => 'MX',
    ];
}

function developer_clean_schema_value($value) {
    if (is_array($value)) {
        $cleaned = [];

        foreach ($value as $key => $item) {
            $clean_item = developer_clean_schema_value($item);

            if (null !== $clean_item && [] !== $clean_item) {
                $cleaned[$key] = $clean_item;
            }
        }

        return $cleaned;
    }

    if (null === $value || '' === $value) {
        return null;
    }

    return $value;
}

function developer_render_schema($schema) {
    $schema = developer_clean_schema_value($schema);

    if (!$schema) {
        return;
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
