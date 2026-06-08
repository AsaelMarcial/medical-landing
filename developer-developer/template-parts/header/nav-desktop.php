<header x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })" :class="scrolled ? 'shadow-lg bg-white/95 backdrop-blur-sm' : 'bg-white'" class="fixed top-0 left-0 right-0 z-40 transition-all duration-300">
    <nav class="container-custom" aria-label="<?php esc_attr_e('Navegación principal', 'developer-developer'); ?>">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex-shrink-0">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="text-xl font-bold text-primary"><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-8">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center gap-8',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'link_before'    => '<span class="text-text hover:text-secondary transition-colors duration-200 font-medium">',
                    'link_after'     => '</span>',
                ]);
                ?>
            </div>

            <!-- Desktop CTA -->
            <div class="hidden lg:flex items-center gap-4">
                <?php if (function_exists('pll_the_languages')) : ?>
                    <div class="flex items-center gap-1 text-sm border-r border-gray-200 pr-4 mr-2">
                        <?php pll_the_languages(['display_names_as' => 'slug', 'hide_current' => 0, 'raw' => 0]); ?>
                    </div>
                <?php endif; ?>
                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="text-secondary font-semibold hover:text-primary transition-colors" aria-label="<?php esc_attr_e('Llamar', 'developer-developer'); ?>">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <?php echo esc_html(get_theme_mod('phone_number', '')); ?>
                </a>
                <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, me gustaría agendar una cita')); ?>" class="btn-primary text-sm" target="_blank" rel="noopener">
                    <?php esc_html_e('Agendar Cita', 'developer-developer'); ?>
                </a>
            </div>

            <!-- Mobile hamburger -->
            <button class="lg:hidden p-2 rounded-md text-primary hover:bg-surface focus:outline-none focus:ring-2 focus:ring-secondary" x-on:click="$dispatch('toggle-mobile-menu')" aria-label="<?php esc_attr_e('Abrir menú', 'developer-developer'); ?>">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </nav>
</header>

<!-- Spacer for fixed header -->
<div class="h-20"></div>
