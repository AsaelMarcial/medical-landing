<section class="relative overflow-hidden bg-gradient-to-br from-primary/10 via-surface to-gold/25" data-animate="fade-up">
    <div class="container-custom py-20 md:py-28 lg:py-36">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div class="order-1 flex justify-center lg:order-2" data-animate="scale-in">
                <div class="relative">
                    <div class="aspect-[4/5] w-full max-w-md overflow-hidden rounded-2xl bg-surface shadow-2xl ring-1 ring-primary/10 lg:max-w-lg">
                        <?php get_template_part('template-parts/components/doctor-portrait', null, [
                            'loading' => 'eager',
                            'class'   => 'h-full w-full object-cover',
                        ]); ?>
                    </div>
                    <!-- Decorative accent -->
                    <div class="absolute -bottom-4 -right-4 -z-10 h-28 w-28 rounded-full bg-accent/15"></div>
                    <div class="absolute -top-4 -left-4 -z-10 h-20 w-20 rounded-full bg-gold/40"></div>
                </div>
            </div>

            <!-- Content -->
            <div class="order-2 rounded-3xl bg-white/80 p-6 shadow-sm ring-1 ring-primary/10 backdrop-blur-sm lg:order-1 lg:p-8">
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php esc_html_e('Atención especializada en enfermedades del riñón', 'med-landing-dev'); ?>
                </p>
                <h1 class="mb-6 text-3xl font-bold leading-tight text-primary sm:text-4xl md:text-5xl lg:text-6xl" style="font-family: var(--font-display);">
                    <?php echo esc_html(developer_get_doctor_name()); ?>
                </h1>
                <p class="text-lg md:text-xl text-text-muted leading-relaxed mb-8 max-w-lg">
                    <?php echo esc_html(developer_get_doctor_description()); ?>
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary text-base">
                        <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                    </a>
                    <?php if (developer_get_whatsapp_number()) : ?>
                    <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" class="btn-whatsapp text-base" target="_blank" rel="noopener">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        <?php esc_html_e('WhatsApp', 'med-landing-dev'); ?>
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Trust indicators -->
                <div class="flex flex-wrap gap-6 text-sm text-text-muted">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span><?php esc_html_e('Certificación CMN 2025-2030', 'med-landing-dev'); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span><?php esc_html_e('Xalapa', 'med-landing-dev'); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span><?php esc_html_e('Boca del Río', 'med-landing-dev'); ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
