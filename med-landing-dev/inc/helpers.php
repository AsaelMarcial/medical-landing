<?php
/**
 * Helper functions.
 */

function developer_get_doctor_name() {
    $name = trim((string) get_theme_mod('doctor_name', ''));

    return developer_translate_string($name ?: 'Dr. Edgar Eduardo Hernández Enríquez');
}

function developer_get_doctor_specialty() {
    $specialty = trim((string) get_theme_mod('doctor_specialty', ''));

    if (!$specialty && 'en' === developer_get_current_language()) {
        return 'Nephrology';
    }

    return developer_translate_string($specialty ?: 'Nefrología');
}

function developer_get_doctor_description() {
    $description = trim((string) get_theme_mod('doctor_description', ''));

    if (!$description && 'en' === developer_get_current_language()) {
        return 'Specialized care for kidney diseases, dialysis, hemodialysis access and renal health in Xalapa and Boca del Río, Veracruz.';
    }

    return developer_translate_string($description ?: 'Atención especializada en enfermedades del riñón, diálisis, hemodiálisis, accesos vasculares y salud renal en Xalapa y Boca del Río, Veracruz.');
}

function developer_get_professional_credentials() {
    return [
        'professional_license' => '11751221',
        'specialty_license'    => '14852016',
        'certification'        => 'Certificación vigente por el Consejo Mexicano de Nefrología (2025-2030)',
        'cofepris'             => '2530092002A00059',
        'conacem_url'          => 'https://conacem.org.mx/buscador',
        'cofepris_url'         => 'https://www.gob.mx/cofepris/acciones-y-programas/autorizacion-publicitaria',
    ];
}

function developer_get_professional_training() {
    return [
        'Coordinador y profesor del Programa Académico de Clínica de Lesión Renal Aguda en hospital de tercer nivel.',
        'Médico egresado de la Universidad Veracruzana y del Instituto Mexicano del Seguro Social (IMSS) en la UMAE Hospital de Especialidades No. 14, Centro Médico Nacional "Dr. Adolfo Ruiz Cortines", Veracruz.',
    ];
}

function developer_get_memberships() {
    return [
        'Instituto Mexicano de Investigaciones Nefrológicas',
        'Sociedad Latinoamericana de Nefrología e Hipertensión',
        'American Society of Nephrology',
    ];
}

function developer_get_doctor_photo_url($size = 'large') {
    $photos = [
        'medium' => 'dredgar-profesional-720.jpg',
        'large'  => 'dredgar-profesional-1080.jpg',
    ];

    $filename = isset($photos[$size]) ? $photos[$size] : $photos['large'];

    return DEVELOPER_THEME_URI . '/assets/images/doctor/' . $filename;
}

function developer_get_doctor_photo_path($size = 'large') {
    $photos = [
        'medium' => 'dredgar-profesional-720.jpg',
        'large'  => 'dredgar-profesional-1080.jpg',
    ];

    $filename = isset($photos[$size]) ? $photos[$size] : $photos['large'];

    return DEVELOPER_THEME_DIR . '/assets/images/doctor/' . $filename;
}

function developer_has_doctor_photo() {
    return file_exists(developer_get_doctor_photo_path('large'));
}

function developer_get_service_categories() {
    return [
        'enfermedades' => __('Enfermedades del riñón', 'med-landing-dev'),
        'terapias'     => __('Terapias de reemplazo renal', 'med-landing-dev'),
        'procedimientos' => __('Procedimientos nefrológicos', 'med-landing-dev'),
    ];
}

function developer_get_service_category_descriptions() {
    return [
        'enfermedades' => __('Valoración de enfermedades y alteraciones que pueden afectar la función renal, la orina, la presión arterial o el equilibrio de líquidos y minerales.', 'med-landing-dev'),
        'terapias'     => __('Acompañamiento para terapias de reemplazo renal cuando la función del riñón requiere soporte especializado.', 'med-landing-dev'),
        'procedimientos' => __('Procedimientos nefrológicos seleccionados y coordinación de accesos para pacientes que lo requieren.', 'med-landing-dev'),
    ];
}

function developer_get_service_query_args($extra_args = []) {
    $language = developer_get_current_language();
    $args = [
        'post_type'      => 'servicio',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'meta_query'     => [
            [
                'relation' => 'OR',
                [
                    'key'   => '_developer_service_language',
                    'value' => $language,
                ],
                [
                    'key'     => '_developer_service_language',
                    'compare' => 'NOT EXISTS',
                ],
            ],
        ],
    ];

    if (function_exists('pll_current_language')) {
        $args['lang'] = $language;
    }

    if (isset($extra_args['meta_query']) && is_array($extra_args['meta_query'])) {
        $args['meta_query'] = array_merge($args['meta_query'], $extra_args['meta_query']);
        unset($extra_args['meta_query']);
    }

    return array_merge($args, $extra_args);
}

function developer_get_service_catalog() {
    return [
        [
            'title'    => 'Enfermedad renal crónica',
            'slug'     => 'enfermedad-renal-cronica',
            'category' => 'enfermedades',
            'excerpt'  => 'Valoración y seguimiento especializado de la enfermedad renal crónica para detectar progresión, factores de riesgo y necesidades de tratamiento.',
            'reasons'  => ['Disminución de la función renal en estudios de laboratorio', 'Creatinina elevada o filtrado glomerular reducido', 'Antecedente de diabetes, hipertensión u otras enfermedades crónicas'],
            'approach' => 'La consulta integra antecedentes, estudios de sangre y orina, presión arterial, medicamentos actuales y metas de seguimiento para cuidar la función renal.',
        ],
        [
            'title'    => 'Diabetes e hipertensión con daño renal',
            'slug'     => 'diabetes-hipertension-dano-renal',
            'category' => 'enfermedades',
            'excerpt'  => 'Atención nefrológica para personas con diabetes o hipertensión que presentan datos de daño renal o riesgo de progresión.',
            'reasons'  => ['Diabetes con albuminuria o proteinuria', 'Hipertensión de larga evolución', 'Cambios en creatinina, filtrado glomerular o examen general de orina'],
            'approach' => 'Se revisan factores de riesgo, tratamiento actual, metas de presión y glucosa, y medidas para reducir el avance del daño renal cuando sea posible.',
        ],
        [
            'title'    => 'Lesión renal aguda',
            'slug'     => 'lesion-renal-aguda',
            'category' => 'enfermedades',
            'excerpt'  => 'Valoración de cambios recientes en la función renal asociados a enfermedades agudas, hospitalización, medicamentos o deshidratación.',
            'reasons'  => ['Aumento reciente de creatinina', 'Disminución importante del volumen de orina', 'Antecedente de infección, cirugía, contraste o medicamentos nefrotóxicos'],
            'approach' => 'La valoración busca identificar causas probables, gravedad, riesgos y necesidad de seguimiento estrecho o atención hospitalaria según el caso.',
        ],
        [
            'title'    => 'Proteinuria y hematuria',
            'slug'     => 'proteinuria-hematuria',
            'category' => 'enfermedades',
            'excerpt'  => 'Estudio de proteínas o sangre en orina para identificar posibles alteraciones renales y definir el seguimiento adecuado.',
            'reasons'  => ['Proteínas detectadas en examen de orina', 'Sangre microscópica o visible en orina', 'Edema, presión alta o antecedentes familiares de enfermedad renal'],
            'approach' => 'Se interpretan estudios urinarios, función renal y contexto clínico para decidir si se requieren pruebas adicionales o vigilancia especializada.',
        ],
        [
            'title'    => 'Infecciones urinarias recurrentes',
            'slug'     => 'infecciones-urinarias-recurrentes',
            'category' => 'enfermedades',
            'excerpt'  => 'Evaluación de infecciones urinarias repetidas, especialmente cuando hay factores de riesgo, daño renal o dudas diagnósticas.',
            'reasons'  => ['Infecciones urinarias frecuentes', 'Fiebre, dolor lumbar o recurrencias después de tratamiento', 'Antecedente de litiasis, embarazo, diabetes o enfermedad renal'],
            'approach' => 'La atención revisa cultivos, tratamientos previos, factores predisponentes y signos que ameriten estudio renal o urológico complementario.',
        ],
        [
            'title'    => 'Alteraciones de electrolitos',
            'slug'     => 'alteraciones-electrolitos',
            'category' => 'enfermedades',
            'excerpt'  => 'Valoración de sodio, potasio, calcio, fósforo, magnesio y equilibrio ácido-base cuando se encuentran fuera de rango.',
            'reasons'  => ['Potasio alto o bajo', 'Sodio bajo o elevado', 'Alteraciones minerales asociadas a riñón, medicamentos o enfermedades sistémicas'],
            'approach' => 'Se analiza el patrón de laboratorio, medicamentos, hidratación y función renal para orientar el manejo de forma individualizada.',
        ],
        [
            'title'    => 'Litiasis renal',
            'slug'     => 'litiasis-renal',
            'category' => 'enfermedades',
            'excerpt'  => 'Seguimiento nefrológico de piedras en los riñones y evaluación de factores metabólicos que favorecen recurrencias.',
            'reasons'  => ['Cálculos renales repetidos', 'Dolor tipo cólico o antecedentes de expulsión de piedras', 'Alteraciones en calcio, ácido úrico u orina de 24 horas'],
            'approach' => 'La consulta puede incluir revisión de imágenes, estudios metabólicos y recomendaciones preventivas ajustadas al tipo de riesgo.',
        ],
        [
            'title'    => 'Enfermedades glomerulares',
            'slug'     => 'enfermedades-glomerulares',
            'category' => 'enfermedades',
            'excerpt'  => 'Evaluación de enfermedades que afectan los filtros del riñón y pueden manifestarse con proteinuria, hematuria o deterioro renal.',
            'reasons'  => ['Proteinuria persistente', 'Hematuria con sospecha renal', 'Edema, presión alta o alteraciones inmunológicas asociadas'],
            'approach' => 'Se revisan estudios de orina, sangre, autoinmunidad e indicación de vigilancia estrecha o biopsia renal cuando esté justificado.',
        ],
        [
            'title'    => 'Síndromes cardiorrenales',
            'slug'     => 'sindromes-cardiorrenales',
            'category' => 'enfermedades',
            'excerpt'  => 'Atención de la interacción entre corazón y riñón en pacientes con insuficiencia cardiaca, retención de líquidos o función renal vulnerable.',
            'reasons'  => ['Insuficiencia cardiaca con cambios en función renal', 'Retención de líquidos o ajuste complejo de diuréticos', 'Hospitalizaciones por descompensación cardiaca y renal'],
            'approach' => 'La valoración busca equilibrar control de volumen, presión arterial, función renal y tratamientos cardiovasculares junto con el equipo tratante.',
        ],
        [
            'title'    => 'Hipertensión arterial difícil de controlar',
            'slug'     => 'hipertension-arterial-dificil-control',
            'category' => 'enfermedades',
            'excerpt'  => 'Evaluación nefrológica de presión arterial persistente o resistente, especialmente cuando existe sospecha de causa renal.',
            'reasons'  => ['Presión alta pese a varios medicamentos', 'Hipertensión con daño renal o proteinuria', 'Inicio temprano, cifras muy elevadas o alteraciones de potasio'],
            'approach' => 'Se revisan mediciones, adherencia, medicamentos, función renal y posibles causas secundarias para orientar ajustes seguros.',
        ],
        [
            'title'    => 'Enfermedad renal en embarazo',
            'slug'     => 'enfermedad-renal-embarazo',
            'category' => 'enfermedades',
            'excerpt'  => 'Valoración de enfermedad renal, hipertensión, proteinuria o alteraciones urinarias durante el embarazo o planificación reproductiva.',
            'reasons'  => ['Embarazo con enfermedad renal previa', 'Proteinuria o hipertensión durante la gestación', 'Antecedente de preeclampsia o alteración renal'],
            'approach' => 'La atención se enfoca en valoración de riesgos, seguimiento renal y coordinación con ginecología/medicina materno fetal cuando corresponda.',
        ],
        [
            'title'    => 'Evaluación y seguimiento para trasplante renal',
            'slug'     => 'evaluacion-seguimiento-trasplante-renal',
            'category' => 'enfermedades',
            'excerpt'  => 'Acompañamiento nefrológico para pacientes en protocolo, preparación o seguimiento relacionado con trasplante renal.',
            'reasons'  => ['Enfermedad renal avanzada', 'Necesidad de orientación sobre protocolo de trasplante', 'Seguimiento posterior a trasplante renal'],
            'approach' => 'La consulta revisa historia renal, tratamientos, estudios disponibles y coordinación con centros o equipos de trasplante.',
        ],
        [
            'title'    => 'Diálisis peritoneal',
            'slug'     => 'dialisis-peritoneal',
            'category' => 'terapias',
            'excerpt'  => 'Orientación y seguimiento de diálisis peritoneal como terapia de reemplazo renal, de acuerdo con la condición de cada paciente.',
            'reasons'  => ['Enfermedad renal avanzada', 'Dudas sobre modalidades de diálisis', 'Seguimiento de tratamiento de diálisis peritoneal'],
            'approach' => 'Se revisan indicaciones, cuidados, metas de tratamiento, datos de alarma y coordinación con la unidad de terapia renal.',
        ],
        [
            'title'    => 'Hemodiálisis',
            'slug'     => 'hemodialisis',
            'category' => 'terapias',
            'excerpt'  => 'Valoración y seguimiento de pacientes en hemodiálisis o con necesidad de iniciar terapia de reemplazo renal.',
            'reasons'  => ['Enfermedad renal avanzada con síntomas o alteraciones de laboratorio', 'Paciente ya integrado a hemodiálisis', 'Dudas sobre acceso vascular, metas o complicaciones'],
            'approach' => 'La atención revisa estudios, estado clínico, acceso vascular y coordinación con la unidad de hemodiálisis.',
        ],
        [
            'title'    => 'Catéteres de hemodiálisis',
            'slug'     => 'cateteres-hemodialisis',
            'category' => 'procedimientos',
            'excerpt'  => 'Colocación y valoración de catéteres de hemodiálisis temporales y tunelizados cuando el caso lo requiere.',
            'reasons'  => ['Necesidad de acceso para hemodiálisis', 'Catéter temporal o tunelizado indicado por el equipo tratante', 'Problemas relacionados con el acceso actual'],
            'approach' => 'Se valora la indicación, riesgos, sitio de colocación y cuidados posteriores, con consentimiento informado y criterios clínicos.',
        ],
        [
            'title'    => 'Accesos vasculares complejos',
            'slug'     => 'accesos-vasculares-complejos',
            'category' => 'procedimientos',
            'excerpt'  => 'Evaluación de accesos vasculares para pacientes con hemodiálisis y situaciones complejas de acceso.',
            'reasons'  => ['Dificultad para acceso vascular', 'Antecedentes de accesos fallidos', 'Necesidad de planeación para terapia de hemodiálisis'],
            'approach' => 'La valoración integra historia de accesos, estudios disponibles y coordinación con el equipo correspondiente para definir opciones.',
        ],
        [
            'title'    => 'Biopsia renal de riñón nativo y trasplante',
            'slug'     => 'biopsia-renal-rinon-nativo-trasplante',
            'category' => 'procedimientos',
            'excerpt'  => 'Valoración de indicación de biopsia renal en riñón nativo o trasplantado cuando se requiere aclarar el diagnóstico.',
            'reasons'  => ['Proteinuria, hematuria o deterioro renal sin causa clara', 'Sospecha de enfermedad glomerular', 'Seguimiento de riñón trasplantado con indicación médica'],
            'approach' => 'Se revisan beneficios, riesgos, estudios previos, contraindicaciones y cuidados necesarios antes y después del procedimiento.',
        ],
    ];
}

function developer_get_service_catalog_for_language($language = '') {
    $language = $language ?: developer_get_current_language();
    $services = developer_get_service_catalog();

    if ('en' !== $language) {
        return $services;
    }

    return array_map('developer_get_service_english_data', $services);
}

function developer_get_services_by_category($category, $language = '') {
    return array_values(array_filter(
        developer_get_service_catalog_for_language($language),
        function ($service) use ($category) {
            return !empty($service['category']) && $category === $service['category'];
        }
    ));
}

function developer_get_service_permalink($service) {
    if (empty($service['slug'])) {
        return '';
    }

    $post = get_page_by_path($service['slug'], OBJECT, 'servicio');

    if (!$post) {
        return '';
    }

    if (function_exists('pll_get_post')) {
        $translated_post_id = pll_get_post($post->ID, developer_get_current_language());

        if ($translated_post_id) {
            return get_permalink($translated_post_id);
        }
    }

    return get_permalink($post);
}

function developer_get_service_by_slug($slug) {
    foreach (developer_get_service_catalog() as $service) {
        if ($slug === $service['slug']) {
            return $service;
        }
    }

    return null;
}

function developer_get_service_english_data($service) {
    $translations = [
        'enfermedad-renal-cronica' => ['title' => 'Chronic kidney disease', 'slug' => 'chronic-kidney-disease', 'excerpt' => 'Specialized assessment and follow-up for chronic kidney disease, kidney function changes and progression risk.'],
        'diabetes-hipertension-dano-renal' => ['title' => 'Diabetes and hypertension with kidney damage', 'slug' => 'diabetes-hypertension-kidney-damage', 'excerpt' => 'Nephrology care for kidney damage associated with diabetes, hypertension, albuminuria or reduced kidney function.'],
        'lesion-renal-aguda' => ['title' => 'Acute kidney injury', 'slug' => 'acute-kidney-injury', 'excerpt' => 'Assessment of recent kidney function changes related to acute illness, hospitalization, dehydration, contrast or medications.'],
        'proteinuria-hematuria' => ['title' => 'Proteinuria and hematuria', 'slug' => 'proteinuria-hematuria', 'excerpt' => 'Evaluation of protein or blood in urine when kidney involvement needs to be ruled out or followed.'],
        'infecciones-urinarias-recurrentes' => ['title' => 'Recurrent urinary tract infections', 'slug' => 'recurrent-urinary-tract-infections', 'excerpt' => 'Evaluation of recurrent urinary infections, especially when kidney risk factors or diagnostic uncertainty are present.'],
        'alteraciones-electrolitos' => ['title' => 'Electrolyte disorders', 'slug' => 'electrolyte-disorders', 'excerpt' => 'Assessment of sodium, potassium, calcium, phosphorus, magnesium and acid-base abnormalities.'],
        'litiasis-renal' => ['title' => 'Kidney stones', 'slug' => 'kidney-stones', 'excerpt' => 'Nephrology follow-up for kidney stones and metabolic factors that may increase recurrence risk.'],
        'enfermedades-glomerulares' => ['title' => 'Glomerular diseases', 'slug' => 'glomerular-diseases', 'excerpt' => 'Evaluation of kidney filter diseases that may present with proteinuria, hematuria, edema or kidney function decline.'],
        'sindromes-cardiorrenales' => ['title' => 'Cardiorenal syndromes', 'slug' => 'cardiorenal-syndromes', 'excerpt' => 'Care for the interaction between heart and kidney disease in patients with fluid retention or vulnerable kidney function.'],
        'hipertension-arterial-dificil-control' => ['title' => 'Difficult-to-control hypertension', 'slug' => 'difficult-to-control-hypertension', 'excerpt' => 'Nephrology assessment for persistent or resistant high blood pressure, especially when kidney causes are suspected.'],
        'enfermedad-renal-embarazo' => ['title' => 'Kidney disease in pregnancy', 'slug' => 'kidney-disease-pregnancy', 'excerpt' => 'Assessment of kidney disease, hypertension, proteinuria or urinary abnormalities during pregnancy.'],
        'evaluacion-seguimiento-trasplante-renal' => ['title' => 'Kidney transplant evaluation and follow-up', 'slug' => 'kidney-transplant-evaluation-follow-up', 'excerpt' => 'Nephrology guidance for patients in kidney transplant evaluation, preparation or follow-up.'],
        'dialisis-peritoneal' => ['title' => 'Peritoneal dialysis', 'slug' => 'peritoneal-dialysis', 'excerpt' => 'Guidance and follow-up for peritoneal dialysis as renal replacement therapy.'],
        'hemodialisis' => ['title' => 'Hemodialysis', 'slug' => 'hemodialysis', 'excerpt' => 'Assessment and follow-up for patients on hemodialysis or preparing for renal replacement therapy.'],
        'cateteres-hemodialisis' => ['title' => 'Hemodialysis catheters', 'slug' => 'hemodialysis-catheters', 'excerpt' => 'Assessment and placement of temporary or tunneled hemodialysis catheters when clinically indicated.'],
        'accesos-vasculares-complejos' => ['title' => 'Complex vascular access', 'slug' => 'complex-vascular-access', 'excerpt' => 'Evaluation of vascular access options for hemodialysis patients with complex access needs.'],
        'biopsia-renal-rinon-nativo-trasplante' => ['title' => 'Native and transplant kidney biopsy', 'slug' => 'native-transplant-kidney-biopsy', 'excerpt' => 'Assessment of kidney biopsy indication when diagnostic clarification is needed.'],
    ];

    if (empty($translations[$service['slug']])) {
        return $service;
    }

    $translated = $service;
    $translated['title'] = $translations[$service['slug']]['title'];
    $translated['slug'] = $translations[$service['slug']]['slug'];
    $translated['excerpt'] = $translations[$service['slug']]['excerpt'];
    $translated['reasons'] = [
        'You have abnormal kidney tests or symptoms related to this condition.',
        'A physician suggested nephrology evaluation or follow-up.',
        'You need specialized guidance in Xalapa or Boca del Río.',
    ];
    $translated['approach'] = 'The visit reviews symptoms, medical history, medications, laboratory results and available imaging to guide the next clinical steps. These English texts are provisional and should be professionally reviewed before final publication.';

    return $translated;
}

function developer_get_service_basic_info($slug) {
    $basics = [
        'enfermedad-renal-cronica' => 'La enfermedad renal crónica ocurre cuando los riñones pierden función de forma gradual. En etapas tempranas puede no causar síntomas, por eso se vigila con estudios de sangre y orina, especialmente en personas con diabetes, hipertensión, enfermedad cardiovascular o antecedentes familiares.',
        'diabetes-hipertension-dano-renal' => 'La diabetes y la hipertensión son causas frecuentes de daño renal. El seguimiento nefrológico ayuda a interpretar creatinina, filtrado glomerular, albúmina en orina y presión arterial para reducir riesgos de progresión.',
        'lesion-renal-aguda' => 'La lesión renal aguda es una disminución rápida de la función del riñón, que puede aparecer en días o semanas por infecciones, deshidratación, cirugías, medicamentos, contraste o enfermedades graves. Requiere valoración oportuna porque puede evolucionar con rapidez.',
        'proteinuria-hematuria' => 'La proteinuria significa presencia anormal de proteínas en orina; la hematuria significa sangre en orina. Pueden relacionarse con infecciones, cálculos, inflamación glomerular u otros problemas del tracto urinario, por lo que requieren interpretación médica.',
        'infecciones-urinarias-recurrentes' => 'Las infecciones urinarias recurrentes son episodios repetidos de infección en vías urinarias. Cuando son frecuentes, complicadas o se acompañan de alteraciones renales, conviene valorar factores de riesgo, estudios previos y necesidad de seguimiento especializado.',
        'alteraciones-electrolitos' => 'Los electrolitos como sodio, potasio, cloro y bicarbonato ayudan al equilibrio de líquidos, nervios, músculos y corazón. Sus alteraciones pueden asociarse con enfermedad renal, medicamentos, deshidratación u otros trastornos.',
        'litiasis-renal' => 'La litiasis renal ocurre cuando se forman cálculos en el riñón o vías urinarias. Puede causar dolor intenso, sangre en la orina, infección u obstrucción; después de un evento es útil revisar causas y prevención de recurrencias.',
        'enfermedades-glomerulares' => 'Las enfermedades glomerulares afectan los filtros microscópicos del riñón. Pueden manifestarse con proteínas o sangre en orina, hinchazón, presión alta o deterioro de la función renal.',
        'sindromes-cardiorrenales' => 'Los síndromes cardiorrenales describen la interacción entre corazón y riñón, donde la disfunción de un órgano puede afectar al otro. Son relevantes en insuficiencia cardiaca, retención de líquidos, presión alta y cambios de función renal.',
        'hipertension-dificil-control' => 'La hipertensión difícil de controlar puede dañar el riñón y también ser consecuencia de enfermedad renal. La valoración busca causas secundarias, efecto de medicamentos, adherencia, dieta, mediciones y daño a órganos.',
        'enfermedad-renal-embarazo' => 'La enfermedad renal durante el embarazo requiere vigilancia coordinada porque la presión arterial, la proteína en orina y la función renal pueden influir en la salud de la madre y del bebé.',
        'evaluacion-trasplante-renal' => 'La evaluación para trasplante renal incluye preparación, estudios, revisión de riesgos y seguimiento con el equipo de trasplante. El nefrólogo ayuda a orientar el proceso antes y después del procedimiento.',
        'dialisis-peritoneal' => 'La diálisis peritoneal es una terapia de reemplazo renal que utiliza el peritoneo como membrana para ayudar a eliminar desechos y exceso de líquidos cuando los riñones ya no cumplen esa función suficiente.',
        'hemodialisis' => 'La hemodiálisis es una terapia de reemplazo renal que filtra la sangre mediante una máquina y un acceso vascular. Requiere seguimiento para controlar líquidos, laboratorios, presión y complicaciones.',
        'cateteres-hemodialisis' => 'Los catéteres de hemodiálisis pueden ser temporales o tunelizados y se usan como acceso vascular cuando se necesita iniciar o continuar hemodiálisis según la situación clínica.',
        'accesos-vasculares-complejos' => 'Los accesos vasculares son esenciales para hemodiálisis. En casos complejos se revisan antecedentes, accesos previos, vasos disponibles, riesgos y coordinación con el equipo tratante.',
        'biopsia-renal-rinon-nativo-trasplante' => 'La biopsia renal obtiene una muestra pequeña de tejido para estudiar ciertos problemas del riñón nativo o trasplantado. Se indica cuando la información puede cambiar el diagnóstico o manejo.',
    ];

    return isset($basics[$slug]) ? $basics[$slug] : '';
}

function developer_build_service_content($service) {
    $reasons = '';
    $basic_info = developer_get_service_basic_info($service['slug']);

    foreach ($service['reasons'] as $reason) {
        $reasons .= '<li>' . esc_html($reason) . '</li>';
    }

    return '<h2>Qué es</h2>'
        . '<p>' . esc_html($basic_info ?: $service['excerpt']) . '</p>'
        . '<h2>Cuándo consultar</h2>'
        . '<p>' . esc_html($service['excerpt']) . '</p>'
        . '<h2>Motivos frecuentes de valoración</h2>'
        . '<ul>' . $reasons . '</ul>'
        . '<h2>Enfoque del especialista</h2>'
        . '<p>' . esc_html($service['approach']) . '</p>'
        . '<h2>Atención en Xalapa y Boca del Río</h2>'
        . '<p>El Dr. Edgar Eduardo Hernández Enríquez ofrece consulta de nefrología en Torre Hakim, Xalapa, y Hospital MediMAC, Boca del Río. Para agendar o resolver dudas iniciales, utiliza el botón de WhatsApp o la página de contacto.</p>'
        . '<p><strong>Nota médica:</strong> Esta información es educativa y no sustituye una valoración médica individual. Si tienes síntomas intensos, deterioro súbito o una urgencia, acude a un servicio de atención inmediata.</p>';
}

function developer_build_service_content_en($service) {
    $reasons = '';

    foreach ($service['reasons'] as $reason) {
        $reasons .= '<li>' . esc_html($reason) . '</li>';
    }

    return '<h2>When to seek nephrology care</h2>'
        . '<p>' . esc_html($service['excerpt']) . '</p>'
        . '<h2>Common reasons for assessment</h2>'
        . '<ul>' . $reasons . '</ul>'
        . '<h2>Specialist approach</h2>'
        . '<p>' . esc_html($service['approach']) . '</p>'
        . '<h2>Care in Xalapa and Boca del Río</h2>'
        . '<p>Dr. Edgar Eduardo Hernández Enríquez provides nephrology consultation at Torre Hakim in Xalapa and Hospital MediMAC in Boca del Río. Use WhatsApp or the contact page to request information about an appointment.</p>'
        . '<p><strong>Medical note:</strong> This content is educational and does not replace an individual medical assessment. If you have severe symptoms, sudden deterioration or an emergency, seek immediate medical care.</p>';
}

function developer_translate_string($string) {
    if ($string && function_exists('pll__')) {
        return pll__($string);
    }

    return $string;
}

function developer_get_current_language() {
    if (function_exists('pll_current_language')) {
        $language = pll_current_language('slug');

        if ($language) {
            return $language;
        }
    }

    return 0 === strpos((string) get_locale(), 'en_') ? 'en' : 'es';
}

function developer_get_home_url($language = '') {
    if (function_exists('pll_home_url')) {
        return pll_home_url($language ?: developer_get_current_language());
    }

    return home_url('/');
}

function developer_get_page_url($slug) {
    $page = get_page_by_path($slug);

    if ($page) {
        if (function_exists('pll_get_post')) {
            $translated_page_id = pll_get_post($page->ID, developer_get_current_language());

            if ($translated_page_id) {
                return get_permalink($translated_page_id);
            }

            return developer_get_home_url();
        }

        return get_permalink($page);
    }

    return home_url('/' . trim($slug, '/') . '/');
}

function developer_is_page_translation($slug) {
    if (is_page($slug)) {
        return true;
    }

    if (!function_exists('pll_get_post') || !is_page()) {
        return false;
    }

    $source_page = get_page_by_path($slug);

    if (!$source_page) {
        return false;
    }

    return (int) get_queried_object_id() === (int) pll_get_post($source_page->ID, developer_get_current_language());
}

function developer_get_language_options() {
    if (!function_exists('pll_the_languages')) {
        return [];
    }

    $languages = pll_the_languages([
        'raw'                    => 1,
        'hide_if_empty'          => 0,
        'hide_if_no_translation' => 0,
    ]);

    if (!is_array($languages)) {
        return [];
    }

    foreach ($languages as &$language) {
        if (!empty($language['no_translation']) && function_exists('pll_home_url')) {
            $language['url'] = pll_home_url($language['slug']);
        }
    }
    unset($language);

    return $languages;
}

function developer_get_language_switch_target() {
    $languages = developer_get_language_options();

    if (count($languages) < 2) {
        return null;
    }

    $current_language = developer_get_current_language();
    $target_slug = 'en' === $current_language ? 'es' : 'en';

    foreach ($languages as $language) {
        if ($target_slug === $language['slug']) {
            return $language;
        }
    }

    foreach ($languages as $language) {
        if (empty($language['current_lang'])) {
            return $language;
        }
    }

    return null;
}

function developer_get_locations() {
    $locations = [
        'xalapa' => [
            'key'          => 'xalapa',
            'city'         => 'Xalapa',
            'region'       => 'Veracruz',
            'venue'        => 'Torre Hakim',
            'office'       => 'Local 909',
            'address'      => 'Torre Hakim | Local 909',
            'maps_url'     => 'https://maps.app.goo.gl/JJZw4PL8UMG7SBa17',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.0004230665904!2d-96.9308932!3d19.5415954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85db31b1581ad18f%3A0xf724115dac0f89e0!2sNefr%C3%B3logo%20%7C%20Dr.%20Edgar%20E.%20Hern%C3%A1ndez%20Enr%C3%ADquez!5e0!3m2!1ses!2smx!4v1780886089045!5m2!1ses!2smx',
            'latitude'     => 19.5415954,
            'longitude'    => -96.9308932,
            'page_url'     => '',
        ],
        'veracruz' => [
            'key'          => 'veracruz',
            'city'         => 'Boca del Río',
            'region'       => 'Veracruz',
            'venue'        => 'Hospital MediMAC',
            'office'       => 'Consultorio 37',
            'address'      => 'Hospital MediMAC | Consultorio 37 | Avenida Calzada Juan Pablo II, Plaza Urban Center',
            'maps_url'     => 'https://maps.app.goo.gl/T3aZ7gXx3MWDn3e98',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.7894838609877!2d-96.1189766!3d19.1606901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c341dc708383c9%3A0xd8562fdb80821ddf!2sHospital%20MediMAC%20Boca%20del%20R%C3%ADo!5e0!3m2!1ses!2smx!4v1780886114624!5m2!1ses!2smx',
            'latitude'     => 19.1606901,
            'longitude'    => -96.1189766,
            'page_url'     => '',
        ],
    ];

    foreach ($locations as $key => $location) {
        $locations[$key]['address'] = trim((string) get_theme_mod("address_{$key}", $location['address']));
        $locations[$key]['maps_url'] = trim((string) get_theme_mod("maps_url_{$key}", $location['maps_url']));
        $locations[$key]['map_embed_url'] = trim((string) get_theme_mod("map_embed_url_{$key}", $location['map_embed_url']));
        $locations[$key]['address'] = developer_translate_string($locations[$key]['address']);
        $locations[$key]['page_url'] = developer_get_page_url('xalapa' === $key ? 'nefrologo-xalapa' : 'nefrologo-veracruz');
    }

    return $locations;
}

function developer_get_location($location = 'xalapa') {
    $locations = developer_get_locations();

    return isset($locations[$location]) ? $locations[$location] : $locations['xalapa'];
}

function developer_get_brand_asset_url($filename) {
    return DEVELOPER_THEME_URI . '/assets/images/brand/' . ltrim($filename, '/');
}

function developer_get_custom_logo_url() {
    $custom_logo_id = get_theme_mod('custom_logo');

    if (!$custom_logo_id) {
        return '';
    }

    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

    return $logo ? $logo[0] : '';
}

function developer_get_brand_logo_url($context = 'header') {
    if (in_array($context, ['header', 'mobile'], true)) {
        $custom_logo_url = developer_get_custom_logo_url();

        if ($custom_logo_url) {
            return $custom_logo_url;
        }
    }

    $logos = [
        'header'      => 'logo-horizontal-premium.png',
        'mobile'      => 'logo-isotipo-premium.png',
        'footer'      => 'logo-horizontal-negativo.png',
        'composition' => 'logo-principal-premium.png',
        'favicon'     => 'logo-isotipo-premium.png',
    ];

    $filename = isset($logos[$context]) ? $logos[$context] : $logos['header'];

    return developer_get_brand_asset_url($filename);
}

function developer_normalize_whatsapp_number($number) {
    $number = preg_replace('/\D+/', '', (string) $number);

    if (13 === strlen($number) && 0 === strpos($number, '521')) {
        $number = '52' . substr($number, 3);
    }

    if (10 === strlen($number)) {
        $number = '52' . $number;
    }

    return $number;
}

function developer_sanitize_whatsapp_number($number) {
    return developer_normalize_whatsapp_number($number);
}

function developer_get_whatsapp_number() {
    return developer_normalize_whatsapp_number(get_theme_mod('whatsapp_number', '2294466698'));
}

function developer_get_whatsapp_message($message = '') {
    $configured_message = trim((string) get_theme_mod('whatsapp_message', ''));
    $default_message = 'Hola, me gustaría solicitar información para agendar una cita.';

    if ($message) {
        return $message;
    }

    if (!$configured_message || $default_message === $configured_message) {
        return __('Hola, me gustaría solicitar información para agendar una cita.', 'med-landing-dev');
    }

    return developer_translate_string($configured_message);
}

function developer_get_whatsapp_url($message = '') {
    $number = developer_get_whatsapp_number();

    if (empty($number)) {
        return '';
    }

    $url = 'https://wa.me/' . rawurlencode($number);
    $message = developer_get_whatsapp_message($message);

    if ($message) {
        $url .= '?text=' . rawurlencode($message);
    }

    return $url;
}

function developer_get_phone_url() {
    $phone = developer_get_phone_number();
    if (empty($phone)) {
        return '';
    }
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}

function developer_get_phone_number() {
    return trim((string) get_theme_mod('phone_number', '229 446 6698'));
}

function developer_get_svg_icon($name) {
    $path = DEVELOPER_THEME_DIR . '/assets/images/icons/' . $name . '.svg';
    if (file_exists($path)) {
        return file_get_contents($path);
    }
    return '';
}

function developer_register_polylang_strings() {
    if (!function_exists('pll_register_string')) {
        return;
    }

    $strings = [
        'doctor_name'        => developer_get_doctor_name(),
        'doctor_specialty'   => trim((string) get_theme_mod('doctor_specialty', 'Nefrología')),
        'doctor_description' => trim((string) get_theme_mod('doctor_description', 'Atención especializada en enfermedades del riñón, diálisis, hemodiálisis, accesos vasculares y salud renal en Xalapa y Boca del Río, Veracruz.')),
        'whatsapp_message'    => trim((string) get_theme_mod('whatsapp_message', 'Hola, me gustaría solicitar información para agendar una cita.')),
        'address_xalapa'     => trim((string) get_theme_mod('address_xalapa', 'Torre Hakim | Local 909')),
        'address_veracruz'   => trim((string) get_theme_mod('address_veracruz', 'Hospital MediMAC | Consultorio 37 | Avenida Calzada Juan Pablo II, Plaza Urban Center')),
    ];

    foreach (developer_get_professional_training() as $index => $training) {
        $strings['training_' . $index] = $training;
    }

    foreach (developer_get_memberships() as $index => $membership) {
        $strings['membership_' . $index] = $membership;
    }

    foreach ($strings as $name => $string) {
        pll_register_string(
            'med_landing_' . $name,
            $string,
            'Medical Landing',
            in_array($name, ['doctor_description', 'whatsapp_message', 'address_xalapa', 'address_veracruz'], true)
        );
    }
}
add_action('init', 'developer_register_polylang_strings');

function developer_polylang_admin_notice() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (!function_exists('pll_languages_list')) {
        $message = __('El botón de idioma necesita Polylang activo y configurado.', 'med-landing-dev');
    } else {
        $languages = pll_languages_list(['fields' => 'slug']);

        if (in_array('es', $languages, true) && in_array('en', $languages, true)) {
            return;
        }

        $message = __('Configura español e inglés en Polylang para mostrar el botón de idioma.', 'med-landing-dev');
    }

    printf(
        '<div class="notice notice-warning"><p><strong>%1$s</strong> %2$s</p></div>',
        esc_html__('Medical Landing:', 'med-landing-dev'),
        esc_html($message)
    );
}
add_action('admin_notices', 'developer_polylang_admin_notice');
add_action('network_admin_notices', 'developer_polylang_admin_notice');
