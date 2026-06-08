<section class="bg-surface section-padding" data-animate="fade-up">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Image -->
            <div class="relative" data-animate="scale-in">
                <div class="aspect-[4/5] bg-white rounded-2xl shadow-lg overflow-hidden">
                    <?php
                    $about_page = get_page_by_path('sobre-el-doctor');
                    if ($about_page && has_post_thumbnail($about_page->ID)) :
                        echo get_the_post_thumbnail($about_page->ID, 'large', ['class' => 'w-full h-full object-cover']);
                    else : ?>
                        <div class="w-full h-full flex items-center justify-center bg-surface">
                            <svg class="w-32 h-32 text-text-muted/20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Accent decoration -->
                <div class="absolute -bottom-3 -left-3 w-full h-full border-2 border-accent/30 rounded-2xl -z-10"></div>
            </div>

            <!-- Content -->
            <div>
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php esc_html_e('Sobre el Doctor', 'developer-developer'); ?>
                </p>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    <?php esc_html_e('Compromiso con tu salud renal', 'developer-developer'); ?>
                </h2>
                <p class="text-text-muted text-lg leading-relaxed mb-6">
                    <?php esc_html_e('Con más de una década de experiencia en nefrología, ofrezco atención personalizada y basada en evidencia para cada paciente. Mi enfoque combina la medicina de vanguardia con un trato humano y cercano.', 'developer-developer'); ?>
                </p>

                <!-- Highlights -->
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php esc_html_e('Especialidad en Nefrología por la UNAM', 'developer-developer'); ?></span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php esc_html_e('Miembro del Consejo Mexicano de Nefrología', 'developer-developer'); ?></span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php esc_html_e('Atención en Xalapa y Veracruz', 'developer-developer'); ?></span>
                    </li>
                </ul>

                <a href="<?php echo esc_url(home_url('/sobre-el-doctor/')); ?>" class="btn-secondary">
                    <?php esc_html_e('Conocer más', 'developer-developer'); ?>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
