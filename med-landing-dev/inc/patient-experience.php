<?php
/** Shared patient-facing data and components. */

function developer_text($spanish, $english) {
    return 'en' === developer_get_current_language() ? $english : $spanish;
}
add_filter('wp_nav_menu_args', static function ($args) {
    $menus = get_option('developer_menus_170', []);
    if (in_array($args['theme_location'] ?? '', ['primary', 'footer'], true) && isset($menus[developer_get_current_language()])) {
        $args['menu'] = $menus[developer_get_current_language()];
        $args['theme_location'] = '';
    }
    return $args;
}, 20);

function developer_get_facebook_url() {
    return trim((string) get_theme_mod('social_facebook', 'https://www.facebook.com/p/Dr-Edgar-E-Hern%C3%A1ndez-Enr%C3%ADquez-Nefr%C3%B3logo-61573780418595/'));
}

function developer_whatsapp_button($args = []) {
    get_template_part('template-parts/components/whatsapp-button', null, $args);
}

function developer_council_logo() {
    printf('<img src="%s" alt="Consejo Mexicano de Nefrología" width="2112" height="1048" loading="lazy" class="council-logo">', esc_url(DEVELOPER_THEME_URI . '/assets/images/brand/consejo-mexicano-nefrologia.png'));
}

function developer_get_procedures() {
    $catalog = array_column(developer_get_service_catalog(), null, 'slug');
    $catheter = developer_get_service_permalink($catalog['cateteres-hemodialisis']);
    $biopsy = developer_get_service_permalink($catalog['biopsia-renal-rinon-nativo-trasplante']);
    return [
        ['key' => 'temporal', 'title' => developer_text('Catéter de hemodiálisis temporal', 'Temporary hemodialysis catheter'), 'description' => developer_text('Valoración de acceso temporal para hemodiálisis según la situación clínica.', 'Assessment of temporary hemodialysis access according to the clinical situation.'), 'url' => $catheter . '#temporal'],
        ['key' => 'tunelizado', 'title' => developer_text('Catéter de hemodiálisis tunelizado', 'Tunneled hemodialysis catheter'), 'description' => developer_text('Valoración y seguimiento de catéteres tunelizados para hemodiálisis.', 'Assessment and follow-up of tunneled hemodialysis catheters.'), 'url' => $catheter . '#tunelizado'],
        ['key' => 'biopsia', 'title' => developer_text('Biopsia renal', 'Kidney biopsy'), 'description' => developer_text('Valoración de biopsia en riñón nativo o trasplantado para aclarar el diagnóstico.', 'Assessment of native or transplant kidney biopsy to clarify the diagnosis.'), 'url' => $biopsy],
    ];
}

function developer_social_links($footer = false) {
    $class = $footer ? 'social-link social-link-footer' : 'social-link';
    foreach (['Facebook' => developer_get_facebook_url(), 'Instagram' => developer_get_instagram_url()] as $name => $url) {
        if (!$url) {
            continue;
        }
        printf('<a class="%s" href="%s" target="_blank" rel="noopener noreferrer">%s <span aria-hidden="true">↗</span></a>', esc_attr($class), esc_url($url), esc_html($name));
    }
}

/** New clinical expansion remains hidden until the physician approves its copy. */
add_filter('the_content', static function ($content) {
    if (is_singular('servicio') && in_the_loop() && is_main_query() && get_option('developer_clinical_copy_170_approved', false)) {
        $reviewed = get_post_meta(get_the_ID(), '_developer_clinical_content_170', true);
        return $reviewed ?: $content;
    }
    return $content;
}, 8);

function developer_procedure_details($key) {
    if ('cateteres-hemodialisis' !== $key && 'biopsia-renal-rinon-nativo-trasplante' !== $key) {
        return;
    }
    if ('cateteres-hemodialisis' === $key) {
        foreach (developer_get_procedures() as $procedure) {
            if ('biopsia' === $procedure['key']) {
                continue;
            }
            echo '<h2 id="' . esc_attr($procedure['key']) . '">' . esc_html($procedure['title']) . '</h2><p>' . esc_html($procedure['description']) . '</p>';
            if (get_option('developer_clinical_copy_170_approved', false)) {
                $detail = 'temporal' === $procedure['key']
                    ? developer_text('Puede utilizarse cuando se necesita acceso para hemodiálisis y aún no se dispone de otro acceso adecuado. La elección depende de la urgencia y del plan de tratamiento.', 'It may be used when hemodialysis access is needed and another suitable access is not yet available. The choice depends on urgency and the treatment plan.')
                    : developer_text('Tiene un trayecto bajo la piel y puede considerarse cuando se prevé continuar con acceso por catéter. Requiere cuidados y seguimiento; no equivale a un acceso definitivo para todas las personas.', 'It has a segment under the skin and may be considered when ongoing catheter access is expected. It requires care and follow-up; it is not a definitive access for every patient.');
                echo '<p>' . esc_html($detail) . '</p>';
            }
            developer_whatsapp_button(['context' => $procedure['title'], 'placement' => 'procedure']);
        }
    }
    if (!get_option('developer_clinical_copy_170_approved', false)) {
        return;
    }
    if ('biopsia-renal-rinon-nativo-trasplante' === $key) {
        echo '<h2>' . esc_html(developer_text('Finalidad de la biopsia renal', 'Purpose of a kidney biopsy')) . '</h2><p>' . esc_html(developer_text('El análisis de una pequeña muestra de tejido renal puede ayudar a aclarar la causa de ciertas alteraciones y orientar el tratamiento. No todas las personas con enfermedad renal necesitan una biopsia; su utilidad y sus riesgos se valoran de forma individual.', 'Analysis of a small kidney tissue sample may help clarify the cause of certain abnormalities and guide treatment. Not everyone with kidney disease needs a biopsy; its usefulness and risks are assessed individually.')) . '</p>';
    }
    echo '<h2>' . esc_html(developer_text('Valoración previa', 'Prior assessment')) . '</h2><p>' . esc_html(developer_text('La indicación se decide después de revisar el motivo de consulta, los antecedentes y los estudios disponibles. Durante la valoración se explican las alternativas, los riesgos y los cuidados que correspondan a tu caso.', 'The indication is decided after reviewing the reason for consultation, medical history and available test results. The assessment includes an explanation of alternatives, risks and care relevant to your case.')) . '</p><p>' . esc_html(developer_text('La sede y las condiciones para realizar el procedimiento se confirman de forma individual. Solicita información por WhatsApp; enviar un mensaje no confirma una cita ni sustituye la valoración médica.', 'The location and arrangements for the procedure are confirmed individually. Request information via WhatsApp; sending a message does not confirm an appointment or replace a medical assessment.')) . '</p>';
}
