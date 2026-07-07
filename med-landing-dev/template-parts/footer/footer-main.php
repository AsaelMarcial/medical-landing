<?php $credentials = developer_get_professional_credentials(); ?>

<footer class="site-footer bg-primary text-white">
    <div class="container-custom py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Column 1: About -->
            <div>
                <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="mb-5 inline-flex min-h-12 items-center">
                    <img
                        src="<?php echo esc_url(developer_get_brand_logo_url('footer')); ?>"
                        alt="<?php echo esc_attr(developer_get_doctor_name() . ' — ' . developer_get_doctor_specialty()); ?>"
                        class="h-auto w-full max-w-[14rem] object-contain"
                        width="720"
                        height="249"
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
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'link_before'    => '<span class="flex min-h-12 items-center text-sm text-slate-300 transition-colors hover:text-white">',
                    'link_after'     => '</span>',
                ]);
                ?>
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

            <?php $veracruz_location = developer_get_location('veracruz'); ?>
            <div>
                <h3 class="text-lg font-semibold text-white mb-2"><?php echo esc_html($veracruz_location['city']); ?></h3>
                <p class="mb-2 text-sm font-semibold text-gold"><?php echo esc_html($veracruz_location['venue'] . ' · ' . $veracruz_location['office']); ?></p>
                <address class="text-slate-300 text-sm not-italic leading-relaxed">
                    <?php echo nl2br(esc_html($veracruz_location['address'])); ?>
                </address>
                <a href="<?php echo esc_url($veracruz_location['maps_url']); ?>" class="mt-3 inline-flex text-sm font-semibold text-white hover:text-gold transition-colors" target="_blank" rel="noopener">
                    <?php esc_html_e('Cómo llegar →', 'med-landing-dev'); ?>
                </a>
            </div>
        </div>

            <!-- Contact Row -->
        <div class="mt-8 pt-8 border-t border-slate-600 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <?php if ($phone = developer_get_phone_number()) : ?>
                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="text-slate-300 hover:text-white transition-colors text-sm">
                    <?php echo esc_html($phone); ?>
                </a>
                <?php endif; ?>
                <?php if ($email = get_theme_mod('contact_email')) : ?>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', '')); ?>" class="text-slate-300 hover:text-white transition-colors text-sm">
                    <?php echo esc_html($email); ?>
                </a>
                <?php endif; ?>
            </div>

            <!-- Social -->
            <div class="flex items-center gap-4">
                <?php if ($fb = get_theme_mod('social_facebook')) : ?>
                    <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="text-slate-300 hover:text-white transition-colors" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                <?php endif; ?>
                <?php if ($ig = get_theme_mod('social_instagram')) : ?>
                    <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" class="text-slate-300 hover:text-white transition-colors" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                <?php endif; ?>
                <?php if ($li = get_theme_mod('social_linkedin')) : ?>
                    <a href="<?php echo esc_url($li); ?>" target="_blank" rel="noopener" class="text-slate-300 hover:text-white transition-colors" aria-label="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-4 border-t border-slate-700 text-center">
            <p class="text-slate-400 text-xs leading-relaxed">
                &copy; <?php echo esc_html(wp_date('Y')); ?> <?php echo esc_html(developer_get_doctor_name()); ?>. <?php esc_html_e('Todos los derechos reservados.', 'med-landing-dev'); ?>
                <span class="mx-1">·</span>
                <?php echo esc_html(sprintf('COFEPRIS: %s', $credentials['cofepris'])); ?>
                <span class="mx-1">·</span>
                <a href="<?php echo esc_url(developer_get_page_url('aviso-legal')); ?>" class="text-slate-300 underline-offset-4 hover:text-white hover:underline">
                    <?php esc_html_e('Aviso legal', 'med-landing-dev'); ?>
                </a>
            </p>
        </div>
    </div>
</footer>
