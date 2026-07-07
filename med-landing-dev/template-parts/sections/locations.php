<?php
$locations = developer_get_locations();
?>

<section class="bg-surface section-padding" data-animate="fade-up">
    <div class="container-custom">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Consultorios', 'med-landing-dev'); ?>
            </h2>
            <p class="text-text-muted text-lg">
                <?php esc_html_e('Consulta de nefrología en Xalapa y Boca del Río, Veracruz.', 'med-landing-dev'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-animate="stagger">
            <?php foreach ($locations as $location) : ?>
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="aspect-video">
                        <iframe
                            src="<?php echo esc_url($location['map_embed_url']); ?>"
                            title="<?php echo esc_attr(sprintf(__('Mapa del consultorio en %s', 'med-landing-dev'), $location['city'])); ?>"
                            class="h-full w-full border-0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-primary mb-2">
                            <?php echo esc_html($location['venue'] . ' · ' . $location['office']); ?>
                        </h3>
                        <p class="mb-2 text-sm font-semibold text-accent">
                            <?php echo esc_html($location['city'] . ', ' . $location['region']); ?>
                        </p>

                        <?php if ($location['address']) : ?>
                            <address class="text-text-muted text-sm not-italic leading-relaxed mb-4">
                                <?php echo nl2br(esc_html($location['address'])); ?>
                            </address>
                        <?php endif; ?>

                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="<?php echo esc_url($location['page_url']); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-secondary px-4 py-2 text-sm font-semibold text-secondary transition-colors hover:bg-secondary hover:text-white">
                                <?php esc_html_e('Más información', 'med-landing-dev'); ?>
                            </a>

                            <a href="<?php echo esc_url($location['maps_url']); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-gold/35 px-4 py-2 text-sm font-semibold text-primary transition-colors hover:bg-gold/60" target="_blank" rel="noopener">
                                <?php esc_html_e('Cómo llegar', 'med-landing-dev'); ?>
                            </a>

                            <?php if (developer_get_whatsapp_number()) : ?>
                                <a href="<?php echo esc_url(developer_get_whatsapp_url(sprintf(__('Hola, quisiera una cita en %s.', 'med-landing-dev'), $location['city']))); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg bg-whatsapp px-4 py-2 text-sm font-semibold text-whatsapp-ink transition-colors hover:bg-whatsapp-dark hover:text-white" target="_blank" rel="noopener">
                                    <?php esc_html_e('Agendar aquí', 'med-landing-dev'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
