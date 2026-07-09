<?php
/**
 * Temporary branded composition used until a professional portrait is available.
 */

$image_loading = isset($args['loading']) ? $args['loading'] : 'lazy';
$container_classes = !empty($args['fill']) ? 'h-full w-full' : 'aspect-[3/4]';
?>

<div class="relative <?php echo esc_attr($container_classes); ?> overflow-hidden rounded-2xl bg-surface shadow-xl">
    <div class="absolute -top-12 -right-12 h-48 w-48 rounded-full bg-gold/30"></div>
    <div class="absolute -bottom-16 -left-16 h-56 w-56 rounded-full bg-accent/10"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center">
        <img
            src="<?php echo esc_url(developer_get_brand_logo_url('composition')); ?>"
            alt="<?php echo esc_attr(developer_get_doctor_name() . ' — ' . developer_get_doctor_specialty()); ?>"
            class="w-full max-w-sm object-contain"
            width="420"
            height="239"
            loading="<?php echo esc_attr($image_loading); ?>"
        >
        <span class="mt-6 inline-flex rounded-full bg-primary px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white">
            <?php esc_html_e('Salud renal', 'med-landing-dev'); ?>
        </span>
    </div>
</div>
