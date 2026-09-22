<?php
/** Stable medical entities. Rank Math supplies page and website metadata. */
function developer_output_schema() {
    if (is_404() || is_search() || !(is_front_page() || developer_is_page_translation('sobre-el-doctor') || developer_is_page_translation('nefrologo-xalapa') || developer_is_page_translation('contacto'))) {
        return;
    }
    $root = home_url('/');
    $credentials = developer_get_professional_credentials();
    $locations = developer_get_locations();
    $graph = [];
    $offices = [];
    foreach ($locations as $key => $location) {
        $id = $root . '#' . $key;
        $offices[] = ['@id' => $id];
        $entity = [
            '@type' => 'MedicalBusiness', '@id' => $id,
            'name' => developer_get_doctor_name() . ' — ' . $location['venue'],
            'medicalSpecialty' => 'Nephrology', 'url' => $location['page_url'],
            'parentOrganization' => ['@id' => $root . '#physician'],
            'address' => ['@type' => 'PostalAddress', 'streetAddress' => $location['address'], 'addressLocality' => 'Xalapa', 'addressRegion' => 'Veracruz', 'addressCountry' => 'MX'],
            'hasMap' => $location['maps_url'],
        ];
        if (is_numeric($location['latitude']) && is_numeric($location['longitude'])) {
            $entity['geo'] = ['@type' => 'GeoCoordinates', 'latitude' => $location['latitude'], 'longitude' => $location['longitude']];
        }
        $graph[] = $entity;
    }
    $graph[] = [
        '@type' => 'Physician', '@id' => $root . '#physician',
        'name' => developer_get_doctor_name(), 'url' => $root,
        'description' => developer_get_doctor_description(), 'medicalSpecialty' => 'Nephrology',
        'image' => developer_get_doctor_photo_url('large'), 'location' => $offices,
        'sameAs' => array_values(array_filter([developer_get_facebook_url(), developer_get_instagram_url(), $credentials['conacem_url']])),
        'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'Appointments via WhatsApp', 'url' => developer_get_whatsapp_url(), 'availableLanguage' => ['Spanish', 'English']],
        'identifier' => [
            ['@type' => 'PropertyValue', 'name' => 'Cédula profesional', 'value' => $credentials['professional_license']],
            ['@type' => 'PropertyValue', 'name' => 'Cédula de especialidad', 'value' => $credentials['specialty_license']],
            ['@type' => 'PropertyValue', 'name' => 'COFEPRIS', 'value' => $credentials['cofepris']],
        ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) . '</script>' . "\n";
}
add_action('wp_head', 'developer_output_schema');
