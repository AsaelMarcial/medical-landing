<section class="bg-background section-padding" data-animate="fade-up">
    <div class="container-custom">
        <!-- Section header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Servicios Especializados', 'developer-developer'); ?>
            </h2>
            <p class="text-text-muted text-lg">
                <?php esc_html_e('Atención integral para el diagnóstico, tratamiento y prevención de enfermedades renales.', 'developer-developer'); ?>
            </p>
        </div>

        <!-- Services grid -->
        <?php
        $servicios = new WP_Query([
            'post_type'      => 'servicio',
            'posts_per_page' => 6,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);
        ?>

        <?php if ($servicios->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" data-animate="stagger">
                <?php while ($servicios->have_posts()) : $servicios->the_post(); ?>
                    <?php get_template_part('template-parts/components/card-service'); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <!-- Placeholder when no services exist yet -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" data-animate="stagger">
                <?php
                $placeholder_services = [
                    ['title' => 'Consulta Nefrológica', 'desc' => 'Evaluación completa de la función renal y diagnóstico de enfermedades del riñón.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                    ['title' => 'Hemodiálisis', 'desc' => 'Tratamiento de diálisis con tecnología de última generación para pacientes con enfermedad renal.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                    ['title' => 'Trasplante Renal', 'desc' => 'Evaluación pre y post trasplante, seguimiento integral del paciente trasplantado.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['title' => 'Hipertensión Arterial', 'desc' => 'Diagnóstico y control de hipertensión asociada a enfermedad renal.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ['title' => 'Diabetes y Riñón', 'desc' => 'Prevención y tratamiento de nefropatía diabética para proteger la función renal.', 'icon' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['title' => 'Litiasis Renal', 'desc' => 'Diagnóstico y tratamiento de cálculos renales con enfoque preventivo.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                ];
                foreach ($placeholder_services as $service) : ?>
                    <article class="group bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-secondary/20 transition-all duration-300">
                        <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-4 group-hover:bg-secondary/20 transition-colors">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $service['icon']; ?>"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-primary mb-2 group-hover:text-secondary transition-colors">
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            <?php echo esc_html($service['desc']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- View all link -->
        <div class="text-center mt-10">
            <a href="<?php echo esc_url(home_url('/servicios/')); ?>" class="inline-flex items-center gap-2 text-secondary font-semibold hover:text-primary transition-colors">
                <?php esc_html_e('Ver todos los servicios', 'developer-developer'); ?>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
