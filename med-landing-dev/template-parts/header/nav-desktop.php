<header data-site-header class="fixed top-0 left-0 right-0 z-40 bg-white transition-shadow duration-300">
    <nav class="container-custom" aria-label="<?php esc_attr_e('Navegación principal', 'med-landing-dev'); ?>">
        <div class="flex items-center justify-between h-20 gap-4">
            <!-- Logo -->
            <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="inline-flex min-h-12 flex-shrink-0 items-center" aria-label="<?php echo esc_attr(developer_get_doctor_name()); ?>">
                <img
                    src="<?php echo esc_url(developer_get_brand_logo_url('header')); ?>"
                    alt="<?php echo esc_attr(developer_get_doctor_name() . ' — ' . developer_get_doctor_specialty()); ?>"
                    class="h-12 w-auto max-w-[6.5rem] object-contain sm:max-w-[11rem] 2xl:max-w-[12rem]"
                    width="720"
                    height="249"
                >
            </a>

            <!-- Desktop Menu -->
            <div class="hidden xl:flex min-w-0 flex-1 items-center justify-center">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu flex items-center gap-3',
                    'fallback_cb'    => 'developer_render_fallback_menu',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'link_before'    => '<span class="whitespace-nowrap rounded-full px-2.5 py-2 text-sm font-semibold text-text transition-colors duration-200 hover:bg-primary/10 hover:text-primary">',
                    'link_after'     => '</span>',
                ]);
                ?>
            </div>

            <!-- Desktop CTA -->
            <div class="hidden xl:flex flex-shrink-0 items-center gap-3">
                <?php get_template_part('template-parts/components/language-switcher', null, ['variant' => 'desktop']); ?>
                <?php if ($phone = developer_get_phone_number()) : ?>
                    <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="hidden min-h-12 items-center whitespace-nowrap text-sm font-bold text-secondary transition-colors hover:text-primary 2xl:inline-flex" aria-label="<?php esc_attr_e('Llamar', 'med-landing-dev'); ?>">
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <?php echo esc_html($phone); ?>
                    </a>
                <?php endif; ?>
                <?php if (developer_get_whatsapp_number()) : ?>
                    <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" class="btn-primary text-sm" target="_blank" rel="noopener">
                        <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary text-sm">
                        <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="flex flex-shrink-0 items-center gap-1.5 xl:hidden">
                <button
                    class="inline-flex min-h-12 min-w-12 items-center justify-center rounded-lg border-2 border-primary/20 p-2 text-primary hover:bg-surface focus:outline-none focus:ring-2 focus:ring-secondary"
                    type="button"
                    data-menu-toggle
                    aria-expanded="false"
                    aria-controls="mobile-navigation-panel"
                    aria-label="<?php esc_attr_e('Abrir menú', 'med-landing-dev'); ?>"
                >
                    <svg data-menu-open-icon aria-hidden="true" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg data-menu-close-icon hidden aria-hidden="true" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <?php get_template_part('template-parts/components/language-switcher', null, ['variant' => 'header-mobile']); ?>
            </div>
        </div>
    </nav>
</header>

<!-- Spacer for fixed header -->
<div class="h-20"></div>
