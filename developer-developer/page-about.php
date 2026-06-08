<?php
/**
 * Template Name: Sobre el Doctor
 */

get_header(); ?>

<main id="main-content">

    <!-- Page Hero -->
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-24" data-animate="fade-up">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <!-- Image (2 cols) -->
                <div class="lg:col-span-2" data-animate="scale-in">
                    <div class="relative max-w-sm mx-auto lg:mx-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'rounded-2xl shadow-xl w-full object-cover aspect-[3/4]']); ?>
                        <?php else : ?>
                            <div class="aspect-[3/4] bg-surface rounded-2xl shadow-xl flex items-center justify-center">
                                <svg class="w-24 h-24 text-text-muted/20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                            </div>
                        <?php endif; ?>
                        <div class="absolute -bottom-3 -right-3 w-full h-full border-2 border-accent/20 rounded-2xl -z-10"></div>
                    </div>
                </div>

                <!-- Content (3 cols) -->
                <div class="lg:col-span-3">
                    <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                        <?php esc_html_e('Nefrólogo Certificado', 'developer-developer'); ?>
                    </p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-6">
                        <?php echo esc_html(get_theme_mod('doctor_name', 'Dr. Nombre Apellido')); ?>
                    </h1>
                    <p class="text-lg text-text-muted leading-relaxed mb-6">
                        <?php esc_html_e('Médico Nefrólogo con más de 10 años de experiencia en el diagnóstico, tratamiento y prevención de enfermedades renales. Mi vocación es ofrecer una atención integral, cercana y basada en la mejor evidencia científica disponible.', 'developer-developer'); ?>
                    </p>
                    <p class="text-text leading-relaxed">
                        <?php esc_html_e('Creo firmemente que cada paciente merece un trato personalizado. Mi objetivo es no solo tratar la enfermedad, sino educar y acompañar a mis pacientes en cada etapa de su cuidado renal, buscando siempre la mejor calidad de vida posible.', 'developer-developer'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Education & Training Timeline -->
    <section class="bg-background section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">
                    <?php esc_html_e('Formación Académica', 'developer-developer'); ?>
                </h2>

                <div class="space-y-8" data-animate="stagger">
                    <!-- Item 1 -->
                    <div class="relative pl-8 border-l-2 border-secondary/30">
                        <div class="absolute left-0 top-0 w-4 h-4 bg-secondary rounded-full -translate-x-[9px]"></div>
                        <div class="bg-surface rounded-lg p-6">
                            <span class="text-sm text-secondary font-semibold"><?php esc_html_e('Especialidad', 'developer-developer'); ?></span>
                            <h3 class="text-lg font-bold text-primary mt-1"><?php esc_html_e('Nefrología', 'developer-developer'); ?></h3>
                            <p class="text-text-muted text-sm mt-1"><?php esc_html_e('Hospital de Especialidades — Centro Médico Nacional', 'developer-developer'); ?></p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="relative pl-8 border-l-2 border-secondary/30">
                        <div class="absolute left-0 top-0 w-4 h-4 bg-secondary rounded-full -translate-x-[9px]"></div>
                        <div class="bg-surface rounded-lg p-6">
                            <span class="text-sm text-secondary font-semibold"><?php esc_html_e('Residencia', 'developer-developer'); ?></span>
                            <h3 class="text-lg font-bold text-primary mt-1"><?php esc_html_e('Medicina Interna', 'developer-developer'); ?></h3>
                            <p class="text-text-muted text-sm mt-1"><?php esc_html_e('Hospital General de México', 'developer-developer'); ?></p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="relative pl-8 border-l-2 border-secondary/30">
                        <div class="absolute left-0 top-0 w-4 h-4 bg-secondary rounded-full -translate-x-[9px]"></div>
                        <div class="bg-surface rounded-lg p-6">
                            <span class="text-sm text-secondary font-semibold"><?php esc_html_e('Licenciatura', 'developer-developer'); ?></span>
                            <h3 class="text-lg font-bold text-primary mt-1"><?php esc_html_e('Médico Cirujano', 'developer-developer'); ?></h3>
                            <p class="text-text-muted text-sm mt-1"><?php esc_html_e('Universidad Nacional Autónoma de México (UNAM)', 'developer-developer'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Memberships -->
    <section class="bg-surface section-padding" data-animate="fade-up">
        <div class="container-custom">
            <h2 class="text-3xl font-bold text-center mb-12">
                <?php esc_html_e('Certificaciones y Membresías', 'developer-developer'); ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto" data-animate="stagger">
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-14 h-14 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-semibold text-primary"><?php esc_html_e('Consejo Mexicano de Nefrología', 'developer-developer'); ?></h3>
                    <p class="text-sm text-text-muted mt-1"><?php esc_html_e('Certificación vigente', 'developer-developer'); ?></p>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-14 h-14 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-primary"><?php esc_html_e('Sociedad Mexicana de Nefrología', 'developer-developer'); ?></h3>
                    <p class="text-sm text-text-muted mt-1"><?php esc_html_e('Miembro activo', 'developer-developer'); ?></p>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-14 h-14 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-semibold text-primary"><?php esc_html_e('Cédula Profesional', 'developer-developer'); ?></h3>
                    <p class="text-sm text-text-muted mt-1"><?php esc_html_e('SEP verificable', 'developer-developer'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy -->
    <section class="bg-background section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">
                    <?php esc_html_e('Mi Filosofía de Atención', 'developer-developer'); ?>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-animate="stagger">
                    <div>
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2"><?php esc_html_e('Trato Humano', 'developer-developer'); ?></h3>
                        <p class="text-sm text-text-muted"><?php esc_html_e('Cada paciente es único. Escucho, entiendo y acompaño en todo el proceso.', 'developer-developer'); ?></p>
                    </div>
                    <div>
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2"><?php esc_html_e('Medicina Basada en Evidencia', 'developer-developer'); ?></h3>
                        <p class="text-sm text-text-muted"><?php esc_html_e('Diagnósticos y tratamientos respaldados por la investigación científica más actual.', 'developer-developer'); ?></p>
                    </div>
                    <div>
                        <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2"><?php esc_html_e('Prevención', 'developer-developer'); ?></h3>
                        <p class="text-sm text-text-muted"><?php esc_html_e('Enfoque preventivo para detectar y tratar problemas renales en etapas tempranas.', 'developer-developer'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <?php get_template_part('template-parts/components/cta-section'); ?>

</main>

<?php get_footer(); ?>
