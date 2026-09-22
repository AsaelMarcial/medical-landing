<?php $location = $args['location']; ?>
<article id="<?php echo esc_attr($location['key']); ?>" class="location-card scroll-mt-28">
    <div class="p-6 md:p-8">
        <p class="eyebrow">Xalapa</p>
        <h3 class="text-2xl font-bold mb-2"><?php echo esc_html($location['venue']); ?></h3>
        <p class="font-semibold text-primary mb-3"><?php echo esc_html($location['office']); ?></p>
        <address class="not-italic text-base text-text-muted mb-5"><?php echo esc_html($location['address']); ?></address>
        <div class="flex flex-wrap gap-3 items-center">
            <a href="<?php echo esc_url($location['maps_url']); ?>" class="social-link" target="_blank" rel="noopener noreferrer"><?php echo esc_html(developer_text('Cómo llegar', 'Get directions')); ?> ↗</a>
            <?php developer_whatsapp_button(['context' => $location['venue'] . ' · ' . $location['office'], 'placement' => 'location', 'class' => 'text-sm']); ?>
        </div>
        <?php if (!empty($location['hospital_maps_url'])) : ?>
            <a class="inline-flex min-h-12 items-center text-sm text-secondary underline mt-3" href="<?php echo esc_url($location['hospital_maps_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(developer_text('Referencia: ubicación del hospital', 'Reference: hospital location')); ?></a>
        <?php endif; ?>
    </div>
    <div class="relative bg-primary/5 aspect-[16/10]" data-map-container>
        <iframe src="<?php echo esc_url($location['map_embed_url']); ?>" class="absolute inset-0 w-full h-full border-0" loading="lazy" title="<?php echo esc_attr(developer_text('Mapa de ', 'Map of ') . $location['venue']); ?>" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</article>
