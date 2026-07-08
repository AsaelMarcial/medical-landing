<section class="section-padding bg-gradient-to-br from-primary/5 via-surface to-gold/20" data-animate="fade-up">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Image -->
            <div class="relative" data-animate="scale-in">
                <div class="aspect-[4/5] overflow-hidden rounded-2xl bg-white shadow-lg ring-1 ring-primary/10">
                    <?php
                    $about_page = get_page_by_path('sobre-el-doctor');
                    if ($about_page && has_post_thumbnail($about_page->ID)) :
                        echo get_the_post_thumbnail($about_page->ID, 'large', ['class' => 'w-full h-full object-cover']);
                    else : ?>
                        <?php get_template_part('template-parts/components/brand-portrait', null, ['fill' => true]); ?>
                    <?php endif; ?>
                </div>
                <!-- Accent decoration -->
                <div class="absolute -bottom-3 -left-3 w-full h-full border-2 border-accent/30 rounded-2xl -z-10"></div>
            </div>

            <!-- Content -->
            <div>
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php esc_html_e('Sobre el Doctor', 'med-landing-dev'); ?>
                </p>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    <?php esc_html_e('Compromiso con tu salud renal', 'med-landing-dev'); ?>
                </h2>
                <p class="text-text-muted text-lg leading-relaxed mb-6">
                    <?php echo esc_html(developer_get_doctor_description()); ?>
                </p>

                <!-- Highlights -->
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php echo esc_html(developer_get_doctor_specialty()); ?></span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php esc_html_e('Consulta en Xalapa', 'med-landing-dev'); ?></span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-text"><?php esc_html_e('Consulta en Boca del Río', 'med-landing-dev'); ?></span>
                    </li>
                </ul>

                <a href="<?php echo esc_url(developer_get_page_url('sobre-el-doctor')); ?>" class="btn-secondary">
                    <?php esc_html_e('Conocer más', 'med-landing-dev'); ?>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
