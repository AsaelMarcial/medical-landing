<?php
/**
 * Professional portrait with branded fallback.
 */

$image_loading = isset($args['loading']) ? $args['loading'] : 'lazy';
$image_classes = !empty($args['class'])
    ? $args['class']
    : 'aspect-[4/5] w-full rounded-2xl object-cover shadow-xl';
?>

<?php if (developer_has_doctor_photo()) : ?>
    <img
        src="<?php echo esc_url(developer_get_doctor_photo_url('large')); ?>"
        srcset="<?php echo esc_url(developer_get_doctor_photo_url('medium')); ?> 720w, <?php echo esc_url(developer_get_doctor_photo_url('large')); ?> 1080w"
        sizes="(min-width: 1024px) 36rem, (min-width: 768px) 28rem, 90vw"
        alt="<?php echo esc_attr(sprintf(__('Retrato profesional de %s', 'med-landing-dev'), developer_get_doctor_name())); ?>"
        class="<?php echo esc_attr($image_classes); ?>"
        width="1080"
        height="1350"
        loading="<?php echo esc_attr($image_loading); ?>"
    >
<?php else : ?>
    <?php get_template_part('template-parts/components/brand-portrait', null, ['loading' => $image_loading]); ?>
<?php endif; ?>
