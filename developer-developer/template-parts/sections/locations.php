<section class="bg-surface section-padding" data-animate="fade-up">
    <div class="container-custom">
        <!-- Section header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php esc_html_e('Consultorios', 'developer-developer'); ?>
            </h2>
            <p class="text-text-muted text-lg">
                <?php esc_html_e('Atención en dos ubicaciones para tu comodidad.', 'developer-developer'); ?>
            </p>
        </div>

        <!-- Locations grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-animate="stagger">
            <!-- Xalapa -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="aspect-video bg-gray-100 relative">
                    <iframe src="about:blank" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60267.34!2d-96.92!3d19.53!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85DB2FF26C9!2sXalapa!5e0!3m2!1ses!4v1" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e('Mapa consultorio Xalapa', 'developer-developer'); ?>"></iframe>
                    <div class="absolute inset-0 flex items-center justify-center bg-surface">
                        <div class="text-center">
                            <svg class="w-8 h-8 text-secondary mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-sm text-text-muted"><?php esc_html_e('Mapa Xalapa', 'developer-developer'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2"><?php esc_html_e('Xalapa, Veracruz', 'developer-developer'); ?></h3>
                    <address class="text-text-muted text-sm not-italic leading-relaxed mb-4">
                        <?php echo nl2br(esc_html(get_theme_mod('address_xalapa', 'Dirección del consultorio en Xalapa'))); ?>
                    </address>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="<?php echo esc_url(home_url('/nefrologo-xalapa/')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-secondary border border-secondary rounded-lg hover:bg-secondary hover:text-white transition-colors">
                            <?php esc_html_e('Más información', 'developer-developer'); ?>
                        </a>
                        <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, quisiera una cita en Xalapa')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-whatsapp rounded-lg hover:bg-green-600 transition-colors" target="_blank" rel="noopener">
                            <?php esc_html_e('Agendar aquí', 'developer-developer'); ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Veracruz -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="aspect-video bg-gray-100 relative">
                    <iframe src="about:blank" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60267.34!2d-96.13!3d19.18!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85C3441!2sVeracruz!5e0!3m2!1ses!4v1" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e('Mapa consultorio Veracruz', 'developer-developer'); ?>"></iframe>
                    <div class="absolute inset-0 flex items-center justify-center bg-surface">
                        <div class="text-center">
                            <svg class="w-8 h-8 text-secondary mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-sm text-text-muted"><?php esc_html_e('Mapa Veracruz', 'developer-developer'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2"><?php esc_html_e('Veracruz, Veracruz', 'developer-developer'); ?></h3>
                    <address class="text-text-muted text-sm not-italic leading-relaxed mb-4">
                        <?php echo nl2br(esc_html(get_theme_mod('address_veracruz', 'Dirección del consultorio en Veracruz'))); ?>
                    </address>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="<?php echo esc_url(home_url('/nefrologo-veracruz/')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-secondary border border-secondary rounded-lg hover:bg-secondary hover:text-white transition-colors">
                            <?php esc_html_e('Más información', 'developer-developer'); ?>
                        </a>
                        <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, quisiera una cita en Veracruz')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-whatsapp rounded-lg hover:bg-green-600 transition-colors" target="_blank" rel="noopener">
                            <?php esc_html_e('Agendar aquí', 'developer-developer'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
