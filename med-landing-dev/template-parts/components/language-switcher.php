<?php
/**
 * Accessible language switch button backed by Polylang.
 */

$target = developer_get_language_switch_target();
$variant = isset($args['variant']) ? $args['variant'] : 'desktop';

if (!$target) {
    return;
}

$is_drawer = 'mobile' === $variant;
$classes = $is_drawer
    ? 'inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-xl border-2 border-primary/20 bg-white px-4 py-3 text-base font-semibold text-primary transition-colors hover:bg-primary/10'
    : 'inline-flex min-h-12 items-center justify-center gap-2 whitespace-nowrap rounded-xl border-2 border-primary/20 bg-white px-3 text-sm font-semibold text-primary shadow-sm transition-colors hover:bg-primary/10';
$label = 'en' === $target['slug'] ? __('English', 'med-landing-dev') : __('Español', 'med-landing-dev');
?>

<a
    class="<?php echo esc_attr($classes); ?>"
    href="<?php echo esc_url($target['url']); ?>"
    hreflang="<?php echo esc_attr($target['slug']); ?>"
    lang="<?php echo esc_attr($target['slug']); ?>"
    aria-label="<?php echo esc_attr(sprintf(__('Cambiar idioma a %s', 'med-landing-dev'), $label)); ?>"
>
    <svg aria-hidden="true" class="h-5 w-5 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 100-18 9 9 0 000 18zm0 0c2.2 0 4-4.03 4-9s-1.8-9-4-9-4 4.03-4 9 1.8 9 4 9zM3.6 9h16.8M3.6 15h16.8"/>
    </svg>
    <span><?php echo esc_html($label); ?></span>
</a>
