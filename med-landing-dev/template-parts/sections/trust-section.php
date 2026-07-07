<?php
$credentials = developer_get_professional_credentials();
?>

<section class="bg-background section-padding" data-animate="fade-up">
    <div class="container-custom">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Atención renal certificada', 'med-landing-dev'); ?>
            </h2>
            <p class="text-text-muted text-lg">
                <?php esc_html_e('Consulta especializada en nefrología con información profesional verificable y sedes en Xalapa y Boca del Río, Veracruz.', 'med-landing-dev'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto" data-animate="stagger">
            <div class="rounded-xl bg-surface p-6 text-center">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Certificación vigente', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2"><?php echo esc_html($credentials['certification']); ?></p>
            </div>

            <div class="rounded-xl bg-surface p-6 text-center">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Cédulas profesionales', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2">
                    <?php echo esc_html(sprintf('Céd. Prof. %1$s · Céd. Esp. %2$s', $credentials['professional_license'], $credentials['specialty_license'])); ?>
                </p>
            </div>

            <div class="rounded-xl bg-surface p-6 text-center">
                <div class="w-16 h-16 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-semibold text-primary"><?php esc_html_e('Xalapa y Boca del Río', 'med-landing-dev'); ?></h3>
                <p class="text-sm text-text-muted mt-2"><?php esc_html_e('Dos consultorios con el mismo teléfono de contacto para agendar cita.', 'med-landing-dev'); ?></p>
            </div>
        </div>
    </div>
</section>
