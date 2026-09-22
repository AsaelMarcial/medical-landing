<header data-site-header class="fixed top-0 left-0 right-0 z-40 bg-white transition-shadow duration-300">
    <nav class="container-custom" aria-label="<?php esc_attr_e('Navegación principal', 'med-landing-dev'); ?>">
        <div class="flex items-center justify-between h-20 gap-4">
            <!-- Logo -->
            <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="inline-flex min-h-12 flex-shrink-0 items-center" aria-label="<?php echo esc_attr(developer_get_doctor_name()); ?>">
                <img
                    src="<?php echo esc_url(developer_get_brand_logo_url('header')); ?>"
                    alt="<?php echo esc_attr(developer_get_doctor_name() . ' — ' . developer_get_doctor_specialty()); ?>"
                    class="h-12 w-auto max-w-[6.5rem] object-contain sm:max-w-[11rem] 2xl:max-w-[12rem]"
                    width="220"
                    height="76"
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
                <?php developer_whatsapp_button(['placement' => 'header', 'class' => 'text-sm']); ?>
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
