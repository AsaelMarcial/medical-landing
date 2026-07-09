<!-- Mobile Menu Overlay -->
<div class="xl:hidden">
    <!-- Backdrop -->
    <div data-mobile-backdrop hidden class="fixed inset-0 z-40 bg-black/60" aria-hidden="true"></div>

    <!-- Panel -->
    <div
        id="mobile-navigation-panel"
        data-mobile-panel
        hidden
        class="fixed right-0 top-0 z-50 h-dvh w-80 max-w-[88vw] overflow-y-auto bg-white shadow-2xl"
        role="dialog"
        aria-modal="true"
        aria-labelledby="mobile-menu-title"
        tabindex="-1"
    >

        <!-- Close button -->
        <div class="flex items-center justify-between p-4 border-b border-surface">
            <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="flex min-h-12 items-center gap-3" data-menu-close>
                <img
                    src="<?php echo esc_url(developer_get_brand_logo_url('mobile')); ?>"
                    alt=""
                    class="h-14 w-14 object-contain"
                    width="512"
                    height="512"
                >
                <span>
                    <span id="mobile-menu-title" class="block text-sm font-semibold text-primary"><?php echo esc_html(developer_get_doctor_name()); ?></span>
                    <span class="block text-sm text-accent"><?php echo esc_html(developer_get_doctor_specialty()); ?></span>
                </span>
            </a>
            <button data-menu-close data-menu-close-button type="button" class="inline-flex min-h-12 min-w-12 items-center justify-center rounded-md p-2 text-text-muted hover:text-primary focus:outline-none focus:ring-2 focus:ring-secondary" aria-label="<?php esc_attr_e('Cerrar menú', 'med-landing-dev'); ?>">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="px-6 pb-8" aria-label="<?php esc_attr_e('Menú mobile', 'med-landing-dev'); ?>" data-mobile-menu-links>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-menu space-y-1 py-4',
                'fallback_cb'    => 'developer_render_fallback_menu',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'link_before'    => '<span class="flex min-h-12 items-center rounded-lg px-3 py-2 text-base font-medium text-text transition-colors hover:bg-surface hover:text-secondary">',
                'link_after'     => '</span>',
            ]);
            ?>

            <!-- Mobile CTAs -->
            <div class="mt-8 pt-8 border-t border-surface space-y-4">
                <?php if (developer_get_phone_number()) : ?>
                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="btn-secondary w-full text-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <?php esc_html_e('Llamar Ahora', 'med-landing-dev'); ?>
                </a>
                <?php endif; ?>
                <?php if (developer_get_whatsapp_number()) : ?>
                <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" class="btn-whatsapp w-full text-center" target="_blank" rel="noopener">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.612.638l4.72-1.324A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.387 0-4.593-.753-6.406-2.033l-.447-.326-2.817.79.852-2.746-.365-.477A9.932 9.932 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    <?php esc_html_e('WhatsApp', 'med-landing-dev'); ?>
                </a>
                <?php endif; ?>
                <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary w-full text-center">
                    <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                </a>
            </div>
        </nav>
    </div>
</div>
