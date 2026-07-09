<?php
/**
 * Interactive Google Maps embed for a confirmed office location.
 */

$location = isset($args['location']) && is_array($args['location'])
    ? $args['location']
    : developer_get_location();
?>

<div class="overflow-hidden rounded-xl border border-primary/10 bg-white shadow-sm">
    <div class="aspect-video" data-map-container>
        <div data-map-placeholder class="flex h-full w-full flex-col items-center justify-center gap-4 bg-gradient-to-br from-primary/10 via-surface to-gold/30 p-6 text-center">
            <div class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-white text-secondary shadow-sm" aria-hidden="true">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657 13.414 20.9a2 2 0 0 1-2.828 0l-4.243-4.243a8 8 0 1 1 11.314 0Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-primary"><?php echo esc_html(sprintf(__('Mapa de %s', 'med-landing-dev'), $location['city'])); ?></p>
                <p class="mt-1 text-sm text-text-muted"><?php esc_html_e('El mapa interactivo se carga al solicitarlo para mantener el sitio rapido.', 'med-landing-dev'); ?></p>
            </div>
            <button type="button" class="btn-secondary text-sm" data-map-load>
                <?php echo esc_html(sprintf(__('Cargar mapa interactivo de %s', 'med-landing-dev'), $location['city'])); ?>
            </button>
        </div>
        <iframe
            data-map-frame
            data-src="<?php echo esc_url($location['map_embed_url']); ?>"
            title="<?php echo esc_attr(sprintf(__('Mapa del consultorio en %s', 'med-landing-dev'), $location['city'])); ?>"
            class="h-full w-full border-0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            hidden
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
