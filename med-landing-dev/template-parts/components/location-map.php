<?php
/**
 * Interactive Google Maps embed for a confirmed office location.
 */

$location = isset($args['location']) && is_array($args['location'])
    ? $args['location']
    : developer_get_location();
?>

<div class="overflow-hidden rounded-xl border border-primary/10 bg-white shadow-sm">
    <div class="aspect-video">
        <iframe
            src="<?php echo esc_url($location['map_embed_url']); ?>"
            title="<?php echo esc_attr(sprintf(__('Mapa del consultorio en %s', 'med-landing-dev'), $location['city'])); ?>"
            class="h-full w-full border-0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>
    <div class="flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="font-semibold text-primary"><?php echo esc_html($location['venue']); ?></p>
            <p class="text-sm text-text-muted"><?php echo esc_html($location['office'] . ' · ' . $location['city'] . ', ' . $location['region']); ?></p>
        </div>
        <a
            href="<?php echo esc_url($location['maps_url']); ?>"
            class="inline-flex min-h-12 items-center justify-center rounded-lg border border-secondary px-4 py-2 text-sm font-semibold text-secondary transition-colors hover:bg-secondary hover:text-white"
            target="_blank"
            rel="noopener"
        >
            <?php esc_html_e('Abrir en Google Maps', 'med-landing-dev'); ?>
        </a>
    </div>
</div>
