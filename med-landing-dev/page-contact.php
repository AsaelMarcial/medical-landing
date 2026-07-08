<?php
/**
 * Template Name: Contacto
 */

get_header();

$locations = developer_get_locations();
$credentials = developer_get_professional_credentials();
$instagram_url = developer_get_instagram_url();
?>

<main id="main-content">

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-20" data-animate="fade-up">
        <div class="container-custom text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-4">
                <?php esc_html_e('Contacto', 'med-landing-dev'); ?>
            </h1>
            <p class="text-lg text-text-muted max-w-2xl mx-auto">
                <?php esc_html_e('Estamos para ayudarte. Agenda tu cita o envíanos un mensaje.', 'med-landing-dev'); ?>
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="bg-background section-padding">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
                <!-- Form (3 cols) -->
                <div class="lg:col-span-3" data-animate="fade-up">
                    <h2 class="text-2xl font-bold text-primary mb-6">
                        <?php esc_html_e('Envíanos un mensaje', 'med-landing-dev'); ?>
                    </h2>

                    <?php
                    $fluent_form_id = absint(get_theme_mod('fluent_form_id', 0));

                    if ($fluent_form_id && shortcode_exists('fluentform')) {
                        echo do_shortcode('[fluentform id="' . $fluent_form_id . '"]');
                    } else { ?>
                        <div class="rounded-2xl border border-primary/10 bg-surface p-6 sm:p-8" role="status">
                            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary">
                                <svg aria-hidden="true" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z"/></svg>
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-primary">
                                <?php esc_html_e('Formulario en configuración', 'med-landing-dev'); ?>
                            </h3>
                            <p class="mb-6 leading-relaxed text-text-muted">
                                <?php esc_html_e('El formulario de citas se habilitará después de configurar su recepción y aviso de privacidad. Mientras tanto, utiliza los canales de contacto disponibles o consulta las ubicaciones.', 'med-landing-dev'); ?>
                            </p>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <?php if (developer_get_whatsapp_number()) : ?>
                                    <a href="<?php echo esc_url(developer_get_whatsapp_url(__('Hola, me gustaría solicitar información para una cita.', 'med-landing-dev'))); ?>" class="btn-whatsapp" target="_blank" rel="noopener">
                                        <?php esc_html_e('Escribir por WhatsApp', 'med-landing-dev'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (developer_get_phone_number()) : ?>
                                    <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="btn-secondary">
                                        <?php esc_html_e('Llamar ahora', 'med-landing-dev'); ?>
                                    </a>
                                <?php endif; ?>
                                <a href="#contact-locations" class="btn-primary">
                                    <?php esc_html_e('Ver ubicaciones', 'med-landing-dev'); ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- Contact Info (2 cols) -->
                <div class="lg:col-span-2 space-y-8" data-animate="fade-up">
                    <!-- Quick contact -->
                    <div class="bg-surface rounded-xl p-6">
                        <h2 class="text-lg font-bold text-primary mb-4"><?php esc_html_e('Contacto directo', 'med-landing-dev'); ?></h2>
                        <div class="space-y-4">
                            <?php if ($phone = developer_get_phone_number()) : ?>
                                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="flex items-center gap-3 text-text hover:text-secondary transition-colors">
                                    <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php echo esc_html($phone); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($whatsapp = developer_get_whatsapp_number()) : ?>
                                <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" target="_blank" rel="noopener" class="flex min-h-12 items-center gap-3 text-text transition-colors hover:text-whatsapp">
                                    <div class="w-10 h-10 bg-whatsapp/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-whatsapp" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php esc_html_e('WhatsApp', 'med-landing-dev'); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($email = get_theme_mod('contact_email')) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-center gap-3 text-text hover:text-secondary transition-colors">
                                    <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php echo esc_html($email); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($instagram_url) : ?>
                                <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" class="flex min-h-12 items-center gap-3 text-text transition-colors hover:text-accent">
                                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php esc_html_e('Instagram oficial', 'med-landing-dev'); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php foreach ($locations as $location) : ?>
                        <div class="bg-surface rounded-xl p-6">
                            <h3 class="text-lg font-bold text-primary mb-1"><?php echo esc_html($location['venue']); ?></h3>
                            <p class="mb-2 text-sm font-semibold text-accent">
                                <?php echo esc_html($location['office'] . ' · ' . $location['city'] . ', ' . $location['region']); ?>
                            </p>
                            <address class="text-text-muted text-sm not-italic leading-relaxed mb-4">
                                <?php echo nl2br(esc_html($location['address'])); ?>
                            </address>
                            <div class="flex flex-wrap gap-x-4 gap-y-2">
                                <a href="<?php echo esc_url($location['page_url']); ?>" class="text-secondary text-sm font-semibold hover:text-primary transition-colors">
                                    <?php esc_html_e('Ver detalles →', 'med-landing-dev'); ?>
                                </a>
                                <a href="<?php echo esc_url($location['maps_url']); ?>" class="text-secondary text-sm font-semibold hover:text-primary transition-colors" target="_blank" rel="noopener">
                                    <?php esc_html_e('Cómo llegar →', 'med-landing-dev'); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="bg-surface rounded-xl p-6">
                        <h3 class="text-lg font-bold text-primary mb-3"><?php esc_html_e('Disponibilidad', 'med-landing-dev'); ?></h3>
                        <p class="mb-3 text-sm text-text-muted">
                            <?php esc_html_e('Confirma horarios y disponibilidad al solicitar tu cita.', 'med-landing-dev'); ?>
                        </p>
                        <p class="text-xs font-semibold text-primary">
                            <?php echo esc_html(sprintf('COFEPRIS: %s', $credentials['cofepris'])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-locations" class="scroll-mt-24 bg-surface section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="mx-auto mb-10 max-w-2xl text-center">
                <h2 class="mb-3 text-3xl font-bold text-primary"><?php esc_html_e('Ubicaciones de consulta', 'med-landing-dev'); ?></h2>
                <p class="text-text-muted"><?php esc_html_e('Consulta el mapa y abre la ruta de la sede que prefieras.', 'med-landing-dev'); ?></p>
            </div>
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <?php foreach ($locations as $location) : ?>
                    <?php get_template_part('template-parts/components/location-map', null, ['location' => $location]); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
