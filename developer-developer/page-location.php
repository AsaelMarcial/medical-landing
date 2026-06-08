<?php
/**
 * Template Name: Ubicación
 * Template for location-specific landing pages (Xalapa / Veracruz).
 */

get_header();

$city = '';
$is_xalapa = false;
if (is_page('nefrologo-xalapa') || is_page('nefrologo-en-xalapa')) {
    $city = 'Xalapa';
    $is_xalapa = true;
} elseif (is_page('nefrologo-veracruz') || is_page('nefrologo-en-veracruz')) {
    $city = 'Veracruz';
}

$address = $is_xalapa ? get_theme_mod('address_xalapa', '') : get_theme_mod('address_veracruz', '');
?>

<main id="main-content">

    <!-- Hero -->
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-24" data-animate="fade-up">
        <div class="container-custom">
            <div class="max-w-3xl">
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php printf(esc_html__('Nefrólogo en %s', 'developer-developer'), esc_html($city)); ?>
                </p>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-6">
                    <?php printf(esc_html__('Especialista en Enfermedades Renales en %s, Veracruz', 'developer-developer'), esc_html($city)); ?>
                </h1>
                <p class="text-lg text-text-muted leading-relaxed mb-8">
                    <?php printf(esc_html__('Consulta de nefrología en %s con atención personalizada. Diagnóstico, tratamiento y prevención de enfermedades del riñón con el respaldo de años de experiencia y certificaciones vigentes.', 'developer-developer'), esc_html($city)); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, me gustaría agendar una cita en ' . $city)); ?>" class="btn-whatsapp" target="_blank" rel="noopener">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        <?php esc_html_e('Agendar por WhatsApp', 'developer-developer'); ?>
                    </a>
                    <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="btn-secondary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <?php esc_html_e('Llamar Ahora', 'developer-developer'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services available -->
    <section class="bg-background section-padding" data-animate="fade-up">
        <div class="container-custom">
            <h2 class="text-3xl font-bold text-center mb-10">
                <?php printf(esc_html__('Servicios disponibles en %s', 'developer-developer'), esc_html($city)); ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-animate="stagger">
                <?php
                $services_list = [
                    ['Consulta Nefrológica', 'Evaluación completa de función renal y diagnóstico.'],
                    ['Hemodiálisis', 'Tratamiento dialítico con tecnología de última generación.'],
                    ['Trasplante Renal', 'Evaluación pre y post trasplante.'],
                    ['Hipertensión Arterial', 'Control de hipertensión de origen renal.'],
                    ['Nefropatía Diabética', 'Prevención y tratamiento del daño renal por diabetes.'],
                    ['Litiasis Renal', 'Diagnóstico y manejo de cálculos renales.'],
                ];
                foreach ($services_list as $service) : ?>
                    <div class="flex items-start gap-3 p-4 rounded-lg bg-surface">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <div>
                            <h3 class="font-semibold text-primary text-sm"><?php echo esc_html($service[0]); ?></h3>
                            <p class="text-text-muted text-xs mt-1"><?php echo esc_html($service[1]); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Location Details -->
    <section class="bg-surface section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Map -->
                <div class="aspect-video bg-gray-100 rounded-xl overflow-hidden shadow-lg relative">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-12 h-12 text-secondary mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-text-muted text-sm"><?php printf(esc_html__('Mapa de %s', 'developer-developer'), esc_html($city)); ?></p>
                            <p class="text-xs text-text-muted mt-1"><?php esc_html_e('(Configurar Google Maps embed)', 'developer-developer'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div>
                    <h2 class="text-2xl font-bold text-primary mb-6">
                        <?php printf(esc_html__('Consultorio en %s', 'developer-developer'), esc_html($city)); ?>
                    </h2>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <div>
                                <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Dirección', 'developer-developer'); ?></h3>
                                <address class="text-text-muted text-sm not-italic mt-1">
                                    <?php echo nl2br(esc_html($address ?: 'Dirección del consultorio')); ?>
                                </address>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Horarios', 'developer-developer'); ?></h3>
                                <p class="text-text-muted text-sm mt-1"><?php esc_html_e('Lunes a Viernes: 9:00 - 18:00', 'developer-developer'); ?></p>
                                <p class="text-text-muted text-sm"><?php esc_html_e('Sábado: 9:00 - 14:00', 'developer-developer'); ?></p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div>
                                <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Teléfono', 'developer-developer'); ?></h3>
                                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="text-secondary text-sm font-medium hover:text-primary transition-colors">
                                    <?php echo esc_html(get_theme_mod('phone_number', 'Configurar teléfono')); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, quisiera una cita en ' . $city)); ?>" class="btn-whatsapp text-sm" target="_blank" rel="noopener">
                            <?php esc_html_e('Agendar por WhatsApp', 'developer-developer'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="btn-secondary text-sm">
                            <?php esc_html_e('Formulario de Contacto', 'developer-developer'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <?php get_template_part('template-parts/components/cta-section'); ?>

</main>

<?php get_footer(); ?>
