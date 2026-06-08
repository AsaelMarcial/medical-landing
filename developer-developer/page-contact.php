<?php
/**
 * Template Name: Contacto
 */

get_header(); ?>

<main id="main-content">

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-20" data-animate="fade-up">
        <div class="container-custom text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-4">
                <?php esc_html_e('Contacto', 'developer-developer'); ?>
            </h1>
            <p class="text-lg text-text-muted max-w-2xl mx-auto">
                <?php esc_html_e('Estamos para ayudarte. Agenda tu cita o envíanos un mensaje.', 'developer-developer'); ?>
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="bg-background section-padding">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
                <!-- Form (3 cols) -->
                <div class="lg:col-span-3" data-animate="fade-up">
                    <h2 class="text-2xl font-bold text-primary mb-6">
                        <?php esc_html_e('Envíanos un mensaje', 'developer-developer'); ?>
                    </h2>

                    <?php
                    // Fluent Forms shortcode - update ID after creating the form
                    if (shortcode_exists('fluentform')) {
                        echo do_shortcode('[fluentform id="1"]');
                    } else { ?>
                        <!-- Fallback form when Fluent Forms is not active -->
                        <form class="space-y-6" action="#" method="post">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="contact-name" class="block text-sm font-medium text-text mb-2"><?php esc_html_e('Nombre completo', 'developer-developer'); ?></label>
                                    <input type="text" id="contact-name" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-secondary focus:ring-2 focus:ring-secondary/20 transition-colors outline-none">
                                </div>
                                <div>
                                    <label for="contact-phone" class="block text-sm font-medium text-text mb-2"><?php esc_html_e('Teléfono', 'developer-developer'); ?></label>
                                    <input type="tel" id="contact-phone" name="phone" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-secondary focus:ring-2 focus:ring-secondary/20 transition-colors outline-none">
                                </div>
                            </div>
                            <div>
                                <label for="contact-email" class="block text-sm font-medium text-text mb-2"><?php esc_html_e('Email', 'developer-developer'); ?></label>
                                <input type="email" id="contact-email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-secondary focus:ring-2 focus:ring-secondary/20 transition-colors outline-none">
                            </div>
                            <div>
                                <label for="contact-reason" class="block text-sm font-medium text-text mb-2"><?php esc_html_e('Motivo de consulta', 'developer-developer'); ?></label>
                                <select id="contact-reason" name="reason" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-secondary focus:ring-2 focus:ring-secondary/20 transition-colors outline-none">
                                    <option value=""><?php esc_html_e('Seleccionar...', 'developer-developer'); ?></option>
                                    <option value="primera-consulta"><?php esc_html_e('Primera consulta', 'developer-developer'); ?></option>
                                    <option value="seguimiento"><?php esc_html_e('Consulta de seguimiento', 'developer-developer'); ?></option>
                                    <option value="segunda-opinion"><?php esc_html_e('Segunda opinión', 'developer-developer'); ?></option>
                                    <option value="otro"><?php esc_html_e('Otro', 'developer-developer'); ?></option>
                                </select>
                            </div>
                            <div>
                                <label for="contact-message" class="block text-sm font-medium text-text mb-2"><?php esc_html_e('Mensaje', 'developer-developer'); ?></label>
                                <textarea id="contact-message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-secondary focus:ring-2 focus:ring-secondary/20 transition-colors outline-none resize-y"></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full sm:w-auto">
                                <?php esc_html_e('Enviar Mensaje', 'developer-developer'); ?>
                            </button>
                        </form>
                    <?php } ?>
                </div>

                <!-- Contact Info (2 cols) -->
                <div class="lg:col-span-2 space-y-8" data-animate="fade-up">
                    <!-- Quick contact -->
                    <div class="bg-surface rounded-xl p-6">
                        <h3 class="text-lg font-bold text-primary mb-4"><?php esc_html_e('Contacto directo', 'developer-developer'); ?></h3>
                        <div class="space-y-4">
                            <?php if ($phone = get_theme_mod('phone_number')) : ?>
                                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="flex items-center gap-3 text-text hover:text-secondary transition-colors">
                                    <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php echo esc_html($phone); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($whatsapp = get_theme_mod('whatsapp_number')) : ?>
                                <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, me gustaría agendar una cita')); ?>" target="_blank" rel="noopener" class="flex items-center gap-3 text-text hover:text-whatsapp transition-colors">
                                    <div class="w-10 h-10 bg-whatsapp/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-whatsapp" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php esc_html_e('WhatsApp', 'developer-developer'); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($email = get_theme_mod('contact_email')) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-center gap-3 text-text hover:text-secondary transition-colors">
                                    <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <span class="font-medium"><?php echo esc_html($email); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Xalapa -->
                    <div class="bg-surface rounded-xl p-6">
                        <h3 class="text-lg font-bold text-primary mb-2"><?php esc_html_e('Xalapa, Veracruz', 'developer-developer'); ?></h3>
                        <address class="text-text-muted text-sm not-italic leading-relaxed mb-3">
                            <?php echo nl2br(esc_html(get_theme_mod('address_xalapa', 'Dirección del consultorio'))); ?>
                        </address>
                        <a href="<?php echo esc_url(home_url('/nefrologo-xalapa/')); ?>" class="text-secondary text-sm font-semibold hover:text-primary transition-colors">
                            <?php esc_html_e('Ver detalles →', 'developer-developer'); ?>
                        </a>
                    </div>

                    <!-- Veracruz -->
                    <div class="bg-surface rounded-xl p-6">
                        <h3 class="text-lg font-bold text-primary mb-2"><?php esc_html_e('Veracruz, Veracruz', 'developer-developer'); ?></h3>
                        <address class="text-text-muted text-sm not-italic leading-relaxed mb-3">
                            <?php echo nl2br(esc_html(get_theme_mod('address_veracruz', 'Dirección del consultorio'))); ?>
                        </address>
                        <a href="<?php echo esc_url(home_url('/nefrologo-veracruz/')); ?>" class="text-secondary text-sm font-semibold hover:text-primary transition-colors">
                            <?php esc_html_e('Ver detalles →', 'developer-developer'); ?>
                        </a>
                    </div>

                    <!-- Schedule -->
                    <div class="bg-surface rounded-xl p-6">
                        <h3 class="text-lg font-bold text-primary mb-3"><?php esc_html_e('Horarios', 'developer-developer'); ?></h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-text-muted"><?php esc_html_e('Lunes - Viernes', 'developer-developer'); ?></span>
                                <span class="font-medium text-text"><?php esc_html_e('9:00 - 18:00', 'developer-developer'); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-text-muted"><?php esc_html_e('Sábado', 'developer-developer'); ?></span>
                                <span class="font-medium text-text"><?php esc_html_e('9:00 - 14:00', 'developer-developer'); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-text-muted"><?php esc_html_e('Domingo', 'developer-developer'); ?></span>
                                <span class="font-medium text-text"><?php esc_html_e('Cerrado', 'developer-developer'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
