<?php
$diseases = developer_get_services_by_category('enfermedades');
?>

<section class="bg-background section-padding" data-animate="fade-up">
    <div class="container-custom">
        <div class="mb-10 max-w-3xl">
            <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-secondary">
                <?php esc_html_e('Enfermedades que atiende', 'med-landing-dev'); ?>
            </p>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Atención especializada en enfermedades del riñón', 'med-landing-dev'); ?>
            </h2>
            <p class="text-text-muted text-lg leading-relaxed">
                <?php esc_html_e('Consulta nefrológica para enfermedad renal, alteraciones en estudios de orina o sangre, hipertensión difícil de controlar y terapias de reemplazo renal.', 'med-landing-dev'); ?>
            </p>
        </div>

        <?php if ($diseases) : ?>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3" data-animate="stagger">
                <?php foreach ($diseases as $service) : ?>
                    <?php $service_url = developer_get_service_permalink($service); ?>
                    <article class="group rounded-2xl border border-gray-100 bg-surface p-5 transition-all hover:-translate-y-1 hover:border-secondary/25 hover:bg-white hover:shadow-md">
                        <?php if ($service_url) : ?>
                            <a href="<?php echo esc_url($service_url); ?>" class="block">
                        <?php else : ?>
                            <div>
                        <?php endif; ?>
                                <h3 class="text-lg font-bold leading-snug text-primary group-hover:text-secondary">
                                    <?php echo esc_html($service['title']); ?>
                                </h3>
                                <p class="mt-2 text-sm leading-relaxed text-text-muted">
                                    <?php echo esc_html(wp_trim_words($service['excerpt'], 22)); ?>
                                </p>
                                <span class="mt-3 inline-flex min-h-12 items-center text-sm font-semibold text-secondary">
                                    <?php echo $service_url ? esc_html__('Leer más', 'med-landing-dev') : esc_html__('Disponible en consulta', 'med-landing-dev'); ?>
                                    <?php if ($service_url) : ?>
                                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    <?php endif; ?>
                                </span>
                        <?php if ($service_url) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="mt-10 flex flex-col gap-3 sm:flex-row">
            <a href="<?php echo esc_url(developer_get_page_url('servicios')); ?>" class="btn-primary">
                <?php esc_html_e('Ver todos los servicios', 'med-landing-dev'); ?>
            </a>
            <?php if (developer_get_whatsapp_number()) : ?>
                <a href="<?php echo esc_url(developer_get_whatsapp_url(__('Hola, me gustaría agendar una valoración de nefrología.', 'med-landing-dev'))); ?>" class="btn-whatsapp">
                    <?php esc_html_e('Agendar por WhatsApp', 'med-landing-dev'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
