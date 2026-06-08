<section class="relative bg-gradient-to-br from-primary/5 via-background to-secondary/5 overflow-hidden" data-animate="fade-up">
    <div class="container-custom py-20 md:py-28 lg:py-36">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="order-2 lg:order-1">
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php esc_html_e('Especialista en Nefrología', 'developer-developer'); ?>
                </p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary leading-tight mb-6" style="font-family: var(--font-display);">
                    <?php echo esc_html(get_theme_mod('doctor_name', 'Dr. Nombre Apellido')); ?>
                </h1>
                <p class="text-lg md:text-xl text-text-muted leading-relaxed mb-8 max-w-lg">
                    <?php echo esc_html(get_theme_mod('doctor_description', 'Médico Nefrólogo certificado con más de 10 años de experiencia en el diagnóstico y tratamiento de enfermedades renales.')); ?>
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="btn-primary text-base">
                        <?php esc_html_e('Agendar Cita', 'developer-developer'); ?>
                    </a>
                    <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola Doctor, me gustaría agendar una cita')); ?>" class="btn-whatsapp text-base" target="_blank" rel="noopener">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        <?php esc_html_e('WhatsApp', 'developer-developer'); ?>
                    </a>
                </div>

                <!-- Trust indicators -->
                <div class="flex flex-wrap gap-6 text-sm text-text-muted">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <span><?php esc_html_e('+10 años de experiencia', 'developer-developer'); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span><?php esc_html_e('Certificado por el CMNI', 'developer-developer'); ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span><?php esc_html_e('Xalapa y Veracruz', 'developer-developer'); ?></span>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="order-1 lg:order-2 flex justify-center" data-animate="scale-in">
                <div class="relative">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', ['class' => 'rounded-2xl shadow-2xl w-full max-w-md lg:max-w-lg object-cover']); ?>
                    <?php else : ?>
                        <div class="w-full max-w-md lg:max-w-lg aspect-[3/4] bg-surface rounded-2xl shadow-2xl flex items-center justify-center">
                            <svg class="w-24 h-24 text-text-muted/30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                        </div>
                    <?php endif; ?>
                    <!-- Decorative accent -->
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-accent/10 rounded-full -z-10"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-secondary/10 rounded-full -z-10"></div>
                </div>
            </div>
        </div>
    </div>
</section>
