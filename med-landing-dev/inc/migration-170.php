<?php
/** Explicit, versioned migration. Never writes content during a web request. */
add_filter('pll_get_post_types', static function ($types) {
    $types['servicio'] = 'servicio';
    return $types;
});

function developer_migration_170_snapshot() {
    $records = [];
    foreach (get_posts(['post_type' => ['page', 'servicio', 'nav_menu_item'], 'post_status' => 'any', 'numberposts' => -1, 'orderby' => 'ID', 'order' => 'ASC', 'suppress_filters' => true]) as $post) {
        $records[] = ['post' => $post->to_array(), 'meta' => get_post_meta($post->ID), 'language' => pll_get_post_language($post->ID), 'translations' => pll_get_post_translations($post->ID), 'url' => get_permalink($post->ID)];
    }
    return ['records' => $records, 'polylang' => get_option('polylang'), 'theme_mods' => get_theme_mods(), 'active_plugins' => get_option('active_plugins'), 'redirects' => get_option('developer_redirects_170', []), 'rank_math' => [get_option('rank_math_modules'), get_option('rank-math-options-titles'), get_option('rank-math-options-sitemap'), get_option('rank_math_setup_completed')]];
}

function developer_migration_170_write($data, $language, $key, $template = '') {
    if (!empty($data['ID'])) {
        $previous = get_post($data['ID'], ARRAY_A);
        $baseline = json_decode(file_get_contents(__DIR__ . '/migration-170-baseline.json'), true);
        $values = [];
        foreach (['post_type', 'post_name', 'post_title', 'post_content', 'post_excerpt'] as $field) {
            $values[] = str_replace([home_url(), 'http://127.0.0.1:18082', 'https://nefrologoedgar.com.mx'], 'SITE_ORIGIN', $previous[$field]);
        }
        $expected = $baseline[$previous['post_type'] . ':' . $previous['post_name']] ?? '';
        if (!hash_equals($expected, hash('sha256', implode("\0", $values)))) {
            throw new RuntimeException('Unreviewed content changes in post ' . $data['ID'] . '; refusing to overwrite.');
        }
    }
    $id = wp_insert_post(wp_slash($data), true);
    if (is_wp_error($id)) {
        throw new RuntimeException($id->get_error_message());
    }
    pll_set_post_language($id, $language);
    update_post_meta($id, '_developer_content_key', $key);
    if ('servicio' === $data['post_type']) {
        update_post_meta($id, '_developer_service_key', $key);
        update_post_meta($id, '_developer_service_language', $language);
        update_post_meta($id, '_developer_service_source_slug', $key);
    }
    if ($template) {
        update_post_meta($id, '_wp_page_template', $template);
    }
    update_post_meta($id, 'rank_math_description', $data['post_excerpt'] ?? '');
    update_post_meta($id, 'rank_math_title', $data['post_title'] . ('en' === $language ? ' | Nephrologist in Xalapa' : ' | Nefrólogo en Xalapa'));
    return $id;
}

function developer_migration_170_pair($ids) {
    if (empty($ids['es']) || empty($ids['en']) || $ids['es'] === $ids['en']) {
        throw new RuntimeException('Translation IDs must be distinct.');
    }
    pll_save_post_translations($ids);
}

if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('med-landing finalize-170', function () {
        if (!get_option('developer_migration_170')) {
            WP_CLI::error('Run migrate-170 first.');
        }
        // A fresh process loads the new Polylang and Rank Math configuration.
        PLL()->model->clean_languages_cache();
        if (class_exists('\RankMath\Sitemap\Cache')) {
            \RankMath\Sitemap\Cache::invalidate_storage();
        }
        flush_rewrite_rules(false);
        WP_CLI::success('Language and sitemap caches refreshed using 1.7.0 settings.');
    });
    WP_CLI::add_command('med-landing migrate-170', function ($args, $flags) {
        if (!function_exists('pll_set_post_language') || !defined('RANK_MATH_VERSION')) {
            WP_CLI::error('Polylang and Rank Math must be active.');
        }
        if (get_option('developer_migration_170')) {
            WP_CLI::success('1.7.0 already applied; no content or settings changed.');
            return;
        }
        $snapshot = developer_migration_170_snapshot();
        $hash = hash('sha256', wp_json_encode($snapshot));
        if (empty($flags['apply'])) {
            WP_CLI::log('Dry run: 17 ES/EN service pairs, 10 page pairs, two Xalapa locations.');
            WP_CLI::log('Expected state: ' . $hash);
            WP_CLI::log('Apply with --apply --expect=' . $hash . ' --snapshot=/private/path/migration-170.json');
            return;
        }
        if (!hash_equals($hash, (string) ($flags['expect'] ?? ''))) {
            WP_CLI::error('Content/settings changed or missing --expect. Run dry-run again and review.');
        }
        $path = $flags['snapshot'] ?? '';
        $parent = realpath(dirname($path));
        if (!$path || !$parent || is_file($path) || str_starts_with($parent . '/', realpath(ABSPATH) . '/')) {
            WP_CLI::error('Supply a new snapshot path outside the web root.');
        }
        $handle = fopen($path, 'x');
        if (!$handle) {
            WP_CLI::error('Cannot create recovery snapshot.');
        }
        chmod($path, 0600);
        fwrite($handle, wp_json_encode($snapshot, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        fclose($handle);
        try {
            $redirects = [];
            foreach (developer_get_service_catalog() as $service) {
                $english = developer_get_service_english_data($service);
                $es = get_page_by_path($service['slug'], OBJECT, 'servicio');
                $en = get_page_by_path($english['slug'], OBJECT, 'servicio');
                // The historical proteinuria collision is deliberately restored to Spanish.
                $ids = [];
                foreach (['es' => [$service, $es], 'en' => [$english, $en]] as $lang => [$item, $existing]) {
                    $content = 'en' === $lang ? developer_build_service_content_en($item) : developer_build_service_content($item);
                    $needs_review = in_array($service['slug'], ['cateteres-hemodialisis', 'biopsia-renal-rinon-nativo-trasplante'], true);
                    $published_content = $content;
                    if ($needs_review && $existing && !get_option('developer_clinical_copy_170_approved', false)) {
                        // Preserve the existing clinical copy until review; update the retired location only.
                        $published_content = str_replace(
                            ['Xalapa y Boca del Río', 'Xalapa and Boca del Río', 'Xalapa or Boca del Río', 'Torre Hakim, Xalapa, y Hospital MediMAC, Boca del Río', 'Torre Hakim in Xalapa and Hospital MediMAC in Boca del Río', ' These English texts are provisional and should be professionally reviewed before final publication.'],
                            ['Xalapa', 'Xalapa', 'Xalapa', 'Torre Hakim y Policlinica Óptima, Xalapa', 'Torre Hakim and Policlinica Óptima in Xalapa', ''],
                            $existing->post_content
                        );
                    }
                    $ids[$lang] = developer_migration_170_write([
                        'ID' => $existing ? $existing->ID : 0, 'post_type' => 'servicio', 'post_status' => 'publish',
                        'post_name' => $item['slug'], 'post_title' => $item['title'], 'post_excerpt' => $item['excerpt'],
                        'post_content' => $published_content,
                    ], $lang, $service['slug']);
                    update_post_meta($ids[$lang], '_developer_service_category', $service['category']);
                    if ($needs_review) {
                        update_post_meta($ids[$lang], '_developer_clinical_content_170', $content);
                    }
                }
                developer_migration_170_pair($ids);
                $redirects['/servicios/' . $english['slug'] . '/'] = '/en/servicios/' . $english['slug'] . '/';
            }
            $pages = [
                'inicio' => ['Inicio', 'Home', 'home', ''],
                'sobre-el-doctor' => ['Sobre el Doctor', 'About the doctor', 'about-the-doctor', 'page-about.php'],
                'servicios' => ['Servicios', 'Services', 'services', 'page-services.php'],
                'contacto' => ['Contacto', 'Contact', 'contact', 'page-contact.php'],
                'nefrologo-xalapa' => ['Nefrólogo en Xalapa', 'Nephrologist in Xalapa', 'nephrologist-xalapa', 'page-location.php'],
            ];
            $legal_es = developer_get_legal_pages_catalog();
            $legal_en = developer_get_legal_pages_en();
            foreach ($legal_es as $key => $item) {
                $pages[$key] = [$item['title'], $legal_en[$key]['title'], $legal_en[$key]['slug'], ''];
            }
            $pages['aviso-legal'] = ['Aviso legal', 'Website policies', 'website-policies', ''];
            $page_ids = [];
            foreach ($pages as $key => [$title_es, $title_en, $slug_en, $template]) {
                $ids = [];
                foreach (['es' => [$key, $title_es], 'en' => [$slug_en, $title_en]] as $lang => [$slug, $title]) {
                    $existing = get_page_by_path($slug);
                    $legal = 'es' === $lang ? ($legal_es[$key] ?? []) : ($legal_en[$key] ?? []);
                    $ids[$lang] = developer_migration_170_write([
                        'ID' => $existing ? $existing->ID : 0, 'post_type' => 'page', 'post_status' => 'publish', 'post_name' => $slug,
                        'post_title' => $title, 'post_content' => $legal['content'] ?? ($existing ? $existing->post_content : ''),
                        'post_excerpt' => $legal['summary'] ?? ('es' === $lang ? 'Consulta de nefrología en Torre Hakim y Policlinica Óptima, Xalapa. Citas por WhatsApp.' : 'Nephrology consultation at Torre Hakim and Policlinica Óptima in Xalapa. Book via WhatsApp.'),
                    ], $lang, $key, $template);
                }
                developer_migration_170_pair($ids);
                $page_ids[$key] = $ids;
            }
            foreach (['es', 'en'] as $lang) {
                $content = '<ul>';
                foreach ($legal_es as $key => $item) {
                    $content .= '<li><a href="' . esc_url(get_permalink($page_ids[$key][$lang])) . '">' . esc_html('es' === $lang ? $item['title'] : $legal_en[$key]['title']) . '</a></li>';
                }
                wp_update_post(['ID' => $page_ids['aviso-legal'][$lang], 'post_content' => $content . '</ul>']);
            }
            update_option('page_on_front', $page_ids['inicio']['es']);
            update_option('show_on_front', 'page');
            $menus = [];
            foreach (['es', 'en'] as $lang) {
                $menu = wp_create_nav_menu('Medical 1.7.0 ' . strtoupper($lang));
                if (is_wp_error($menu)) {
                    throw new RuntimeException($menu->get_error_message());
                }
                $labels = 'es' === $lang ? ['Inicio', 'Doctor', 'Servicios', 'Procedimientos', 'Consultorios'] : ['Home', 'Doctor', 'Services', 'Procedures', 'Locations'];
                foreach (['inicio', 'sobre-el-doctor', 'servicios', 'procedimientos', 'nefrologo-xalapa'] as $position => $key) {
                    $target = 'procedimientos' === $key ? 'servicios' : $key;
                    $url = 'inicio' === $key ? home_url('en' === $lang ? '/en/' : '/') : get_permalink($page_ids[$target][$lang]) . ('procedimientos' === $key ? '#procedimientos' : '');
                    wp_update_nav_menu_item($menu, 0, ['menu-item-title' => $labels[$position], 'menu-item-url' => $url, 'menu-item-status' => 'publish', 'menu-item-type' => 'custom', 'menu-item-position' => $position + 1]);
                }
                $menus[$lang] = $menu;
            }
            update_option('developer_menus_170', $menus);
            set_theme_mod('nav_menu_locations', ['primary' => $menus['es'], 'footer' => $menus['es']]);
            $old = get_page_by_path('nefrologo-veracruz');
            if ($old) {
                wp_update_post(['ID' => $old->ID, 'post_status' => 'draft']);
            }
            $redirects['/nefrologo-veracruz/'] = '/nefrologo-xalapa/';
            update_option('developer_redirects_170', $redirects);
            $pll = get_option('polylang', []);
            $pll['post_types'] = array_values(array_unique(array_merge($pll['post_types'] ?? [], ['servicio'])));
            $pll['force_lang'] = 1;
            $pll['hide_default'] = true;
            $pll['redirect_lang'] = true;
            $pll['default_lang'] = 'es';
            $pll['browser'] = false;
            update_option('polylang', $pll);
            PLL()->model->clean_languages_cache();
            update_option('blogdescription', 'Nefrólogo en Xalapa. Consultorios en Torre Hakim y Policlinica Óptima. Citas por WhatsApp.');
            set_theme_mod('social_facebook', 'https://www.facebook.com/p/Dr-Edgar-E-Hern%C3%A1ndez-Enr%C3%ADquez-Nefr%C3%B3logo-61573780418595/');
            set_theme_mod('doctor_description', '');
            remove_theme_mod('fluent_form_id');
            $modules = get_option('rank_math_modules', []);
            $modules[] = 'sitemap';
            update_option('rank_math_modules', array_values(array_unique(array_diff($modules, ['local-seo']))));
            update_option('rank_math_setup_completed', true);
            // Official free-plugin "skip account connection" setting; no remote account is needed for SEO.
            update_option('rank_math_registration_skip', true);
            $sitemap = get_option('rank-math-options-sitemap', []);
            $sitemap['pt_servicio_sitemap'] = 'on';
            $sitemap['pt_page_sitemap'] = 'on';
            $sitemap['pt_post_sitemap'] = 'off';
            $sitemap['tax_category_sitemap'] = 'off';
            $sitemap['tax_post_tag_sitemap'] = 'off';
            update_option('rank-math-options-sitemap', $sitemap);
            $forms_used = false;
            foreach ($snapshot['records'] as $record) {
                if (preg_match('/\[(?:fluentform|fluentforms)|wp:fluentform/i', $record['post']['post_content'])) {
                    $forms_used = true;
                }
            }
            if (!$forms_used) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
                deactivate_plugins('fluentform/fluentform.php');
            }
            flush_rewrite_rules(false);
            update_option('developer_migration_170', ['completed' => gmdate('c'), 'snapshot' => $path, 'before_hash' => $hash, 'pages' => $page_ids]);
            WP_CLI::success('1.7.0 applied. Next run: wp med-landing finalize-170, then verification checks.');
        } catch (Throwable $error) {
            WP_CLI::error('Migration interrupted: ' . $error->getMessage() . '. Restore the coordinated database/code backup before retrying. Snapshot: ' . $path);
        }
    });
}
