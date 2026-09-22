<?php
$credentials = developer_get_professional_credentials();
$legal_pages = developer_get_legal_pages_catalog();
?>

<footer class="site-footer bg-primary text-white">
    <div class="container-custom py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Column 1: About -->
            <div>
                <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="mb-5 inline-flex min-h-12 items-center">
                    <img
                        src="<?php echo esc_url(developer_get_brand_logo_url('footer')); ?>"
                        alt="<?php echo esc_attr(developer_get_doctor_name() . ' — ' . developer_get_doctor_specialty()); ?>"
                        class="h-auto w-full max-w-[14rem] object-contain"
                        width="420"
                        height="145"
                        loading="lazy"
                    >
                </a>
                <p class="text-slate-300 text-sm leading-relaxed">
                    <?php echo esc_html(developer_get_doctor_description()); ?>
                </p>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4"><?php esc_html_e('Enlaces', 'med-landing-dev'); ?></h3>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'footer-menu space-y-1',
                    'fallback_cb'    => 'developer_render_fallback_menu',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'link_before'    => '<span class="flex min-h-12 items-center text-sm text-slate-300 transition-colors hover:text-white">',
                    'link_after'     => '</span>',
                ]);
                ?>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4"><?php esc_html_e('Legal', 'med-landing-dev'); ?></h3>
                <ul class="space-y-1">
                    <?php foreach ($legal_pages as $legal_page) : ?>
                        <li>
                            <a href="<?php echo esc_url(developer_get_legal_page_url($legal_page['slug'])); ?>" class="flex min-h-12 items-center text-sm text-slate-300 transition-colors hover:text-white">
                                <?php echo esc_html(developer_text($legal_page['title'], developer_get_legal_pages_en()[$legal_page['slug']]['title'])); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php $xalapa_location = developer_get_location('xalapa'); ?>
            <div>
                <h3 class="text-lg font-semibold text-white mb-2"><?php echo esc_html($xalapa_location['city']); ?></h3>
                <p class="mb-2 text-sm font-semibold text-gold"><?php echo esc_html($xalapa_location['venue'] . ' · ' . $xalapa_location['office']); ?></p>
                <address class="text-slate-300 text-sm not-italic leading-relaxed">
                    <?php echo nl2br(esc_html($xalapa_location['address'])); ?>
                </address>
                <a href="<?php echo esc_url($xalapa_location['maps_url']); ?>" class="mt-3 inline-flex text-sm font-semibold text-white hover:text-gold transition-colors" target="_blank" rel="noopener">
                    <?php esc_html_e('Cómo llegar →', 'med-landing-dev'); ?>
                </a>
            </div>

            <?php $optima_location = developer_get_location('optima'); ?>
            <div>
                <h3 class="text-lg font-semibold text-white mb-2"><?php echo esc_html($optima_location['city']); ?></h3>
                <p class="mb-2 text-sm font-semibold text-gold"><?php echo esc_html($optima_location['venue'] . ' · ' . $optima_location['office']); ?></p>
                <address class="text-slate-300 text-sm not-italic leading-relaxed">
                    <?php echo nl2br(esc_html($optima_location['address'])); ?>
                </address>
                <a href="<?php echo esc_url($optima_location['maps_url']); ?>" class="mt-3 inline-flex text-sm font-semibold text-white hover:text-gold transition-colors" target="_blank" rel="noopener">
                    <?php esc_html_e('Cómo llegar →', 'med-landing-dev'); ?>
                </a>
            </div>
        </div>

            <!-- Contact Row -->
        <div class="mt-8 pt-8 border-t border-white/20 flex flex-wrap items-center justify-between gap-4">
            <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" class="inline-flex min-h-12 items-center text-white font-semibold" target="_blank" rel="noopener noreferrer" data-whatsapp-cta data-cta-placement="footer">WhatsApp: <?php echo esc_html(developer_get_phone_number()); ?></a>
            <div class="flex flex-wrap gap-3"><?php developer_social_links(true); ?></div>
            <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="inline-flex min-h-12 items-center text-white"><?php echo esc_html(developer_text('Contacto', 'Contact')); ?></a>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-4 border-t border-slate-700 text-center">
            <p class="text-slate-300 text-sm leading-relaxed">
                &copy; <?php echo esc_html(wp_date('Y')); ?> <?php echo esc_html(developer_get_doctor_name()); ?>. <?php esc_html_e('Todos los derechos reservados.', 'med-landing-dev'); ?>
                <span class="mx-1">·</span>
                <?php echo esc_html(sprintf('COFEPRIS: %s', $credentials['cofepris'])); ?>
            </p>
        </div>
    </div>
</footer>
