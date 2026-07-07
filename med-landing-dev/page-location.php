<?php
/**
 * Template Name: Ubicación
 * Template for location-specific landing pages.
 */

get_header();

$location_key = 'xalapa';

if (developer_is_page_translation('nefrologo-xalapa')) {
    $location_key = 'xalapa';
} elseif (developer_is_page_translation('nefrologo-veracruz')) {
    $location_key = 'veracruz';
}

$location = developer_get_location($location_key);
$city = $location['city'];
$address = $location['address'];

$services = new WP_Query([
    'post_type'      => 'servicio',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<main id="main-content">
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-24" data-animate="fade-up">
        <div class="container-custom">
            <div class="max-w-3xl">
                <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                    <?php printf(esc_html__('Nefrólogo en %s', 'med-landing-dev'), esc_html($city)); ?>
                </p>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-6">
                    <?php printf(esc_html__('Consulta de Nefrología en %1$s, %2$s', 'med-landing-dev'), esc_html($city), esc_html($location['region'])); ?>
                </h1>
                <p class="text-lg text-text-muted leading-relaxed mb-8">
                    <?php printf(esc_html__('Atención especializada en salud renal para pacientes de %s y sus alrededores.', 'med-landing-dev'), esc_html($city)); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <?php if (developer_get_whatsapp_number()) : ?>
                        <a href="<?php echo esc_url(developer_get_whatsapp_url(sprintf(__('Hola, me gustaría agendar una cita en %s.', 'med-landing-dev'), $city))); ?>" class="btn-whatsapp" target="_blank" rel="noopener">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            <?php esc_html_e('Agendar por WhatsApp', 'med-landing-dev'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (developer_get_phone_number()) : ?>
                        <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="btn-secondary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <?php esc_html_e('Llamar Ahora', 'med-landing-dev'); ?>
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary">
                        <?php esc_html_e('Solicitar información', 'med-landing-dev'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php if ($services->have_posts()) : ?>
        <section class="bg-background section-padding" data-animate="fade-up">
            <div class="container-custom">
                <h2 class="text-3xl font-bold text-center mb-10">
                    <?php esc_html_e('Servicios de nefrología', 'med-landing-dev'); ?>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-animate="stagger">
                    <?php while ($services->have_posts()) : $services->the_post(); ?>
                        <?php get_template_part('template-parts/components/card-service'); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <section class="bg-surface section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <?php get_template_part('template-parts/components/location-map', null, ['location' => $location]); ?>

                <div>
                    <h2 class="text-2xl font-bold text-primary mb-6">
                        <?php echo esc_html($location['venue'] . ' · ' . $location['office']); ?>
                    </h2>

                    <div class="space-y-4 mb-8">
                        <?php if ($address) : ?>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <div>
                                    <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Dirección', 'med-landing-dev'); ?></h3>
                                    <address class="text-text-muted text-sm not-italic mt-1">
                                        <?php echo nl2br(esc_html($address)); ?>
                                    </address>
                                    <a href="<?php echo esc_url($location['maps_url']); ?>" class="mt-3 inline-flex text-sm font-semibold text-secondary hover:text-primary transition-colors" target="_blank" rel="noopener">
                                        <?php esc_html_e('Cómo llegar en Google Maps →', 'med-landing-dev'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Disponibilidad', 'med-landing-dev'); ?></h3>
                                <p class="text-text-muted text-sm mt-1"><?php esc_html_e('Confirma horarios al solicitar tu cita.', 'med-landing-dev'); ?></p>
                            </div>
                        </div>

                        <?php if ($phone = developer_get_phone_number()) : ?>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <div>
                                    <h3 class="font-semibold text-text text-sm"><?php esc_html_e('Teléfono', 'med-landing-dev'); ?></h3>
                                    <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="text-secondary text-sm font-medium hover:text-primary transition-colors">
                                        <?php echo esc_html($phone); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/components/cta-section'); ?>
</main>

<?php get_footer(); ?>
