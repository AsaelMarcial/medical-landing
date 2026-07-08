<?php
$credentials = developer_get_professional_credentials();
$instagram_url = developer_get_instagram_url();
?>

<section class="section-padding bg-surface" data-animate="fade-up">
    <div class="container-custom">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Atención renal certificada', 'med-landing-dev'); ?>
            </h2>
            <p class="text-text-muted text-lg">
                <?php esc_html_e('Consulta especializada en nefrología con información profesional verificable y sedes en Xalapa y Boca del Río, Veracruz.', 'med-landing-dev'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4 max-w-6xl mx-auto" data-animate="stagger">
            <div class="rounded-2xl border border-primary/10 bg-white p-6 text-center shadow-sm">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Certificación vigente', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2"><?php echo esc_html($credentials['certification']); ?></p>
            </div>

            <div class="rounded-2xl border border-primary/10 bg-white p-6 text-center shadow-sm">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Cédulas profesionales', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2">
                    <?php echo esc_html(sprintf('Céd. Prof. %1$s · Céd. Esp. %2$s', $credentials['professional_license'], $credentials['specialty_license'])); ?>
                </p>
            </div>

            <div class="rounded-2xl border border-primary/10 bg-white p-6 text-center shadow-sm">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Xalapa y Boca del Río', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2"><?php esc_html_e('Dos consultorios con el mismo teléfono de contacto para agendar cita.', 'med-landing-dev'); ?></p>
            </div>

            <?php if ($instagram_url) : ?>
                <div class="rounded-2xl border border-primary/10 bg-white p-6 text-center shadow-sm">
                    <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </div>
                    <h3 class="font-semibold text-primary"><?php esc_html_e('Instagram oficial', 'med-landing-dev'); ?></h3>
                    <p class="text-sm text-text-muted mt-2"><?php esc_html_e('Contenido educativo y novedades de salud renal.', 'med-landing-dev'); ?></p>
                    <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" class="mt-3 inline-flex min-h-12 items-center justify-center text-sm font-semibold text-secondary hover:text-accent">
                        <?php esc_html_e('Ver Instagram', 'med-landing-dev'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
