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
                    width="128"
                    height="128"
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
                <?php developer_whatsapp_button(['placement' => 'mobile-menu', 'class' => 'w-full text-sm']); ?>
            </div>
        </nav>
    </div>
</div>
