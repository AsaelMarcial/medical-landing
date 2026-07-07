<?php
/**
 * Template Name: Servicios
 */

get_header();

$categories = developer_get_service_categories();
$category_descriptions = developer_get_service_category_descriptions();
?>

<main id="main-content">

    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-14 md:py-18" data-animate="fade-up">
        <div class="container-custom text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-wider text-secondary">
                <?php esc_html_e('Atención especializada en enfermedades del riñón', 'med-landing-dev'); ?>
            </p>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-4">
                <?php esc_html_e('Servicios de nefrología', 'med-landing-dev'); ?>
            </h1>
            <p class="text-lg text-text-muted max-w-3xl mx-auto">
                <?php esc_html_e('Valoración y seguimiento de enfermedad renal, terapias de reemplazo renal y procedimientos nefrológicos seleccionados en Xalapa y Boca del Río.', 'med-landing-dev'); ?>
            </p>
        </div>
    </section>

    <nav class="sticky top-20 z-30 border-y border-primary/10 bg-white/95 py-3 backdrop-blur supports-[backdrop-filter]:bg-white/85" aria-label="<?php esc_attr_e('Categorías de servicios', 'med-landing-dev'); ?>">
        <div class="container-custom">
            <div class="-mx-4 flex gap-3 overflow-x-auto px-4 pb-1 md:mx-0 md:flex-wrap md:justify-center md:px-0">
                <?php foreach ($categories as $category_key => $category_label) : ?>
                    <a href="#<?php echo esc_attr($category_key); ?>" class="inline-flex min-h-12 flex-none items-center whitespace-nowrap rounded-full border border-secondary/20 bg-surface px-5 text-sm font-bold text-primary transition-colors hover:border-secondary hover:bg-secondary hover:text-white">
                        <?php echo esc_html($category_label); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <section class="bg-background py-12 md:py-16" data-animate="fade-up">
        <div class="container-custom space-y-14">
            <?php foreach ($categories as $category_key => $category_label) : ?>
                <?php $catalog_services = developer_get_services_by_category($category_key); ?>

                <?php if ($catalog_services) : ?>
                    <section id="<?php echo esc_attr($category_key); ?>" class="scroll-mt-36">
                        <div class="mb-7 max-w-3xl">
                            <h2 class="text-2xl md:text-3xl font-bold text-primary">
                                <?php echo esc_html($category_label); ?>
                            </h2>
                            <p class="mt-3 text-text-muted">
                                <?php echo esc_html($category_descriptions[$category_key] ?? __('Información general para orientar la consulta; el diagnóstico y tratamiento requieren valoración médica individual.', 'med-landing-dev')); ?>
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3" data-animate="stagger">
                            <?php foreach ($catalog_services as $service) : ?>
                                <?php $service_url = developer_get_service_permalink($service); ?>
                                <article class="group flex h-full flex-col rounded-2xl border border-gray-100 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-secondary/25 hover:shadow-lg">
                                    <?php if ($service_url) : ?>
                                        <a href="<?php echo esc_url($service_url); ?>" class="flex h-full flex-col">
                                    <?php else : ?>
                                        <div class="flex h-full flex-col">
                                    <?php endif; ?>
                                            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-secondary/10 transition-colors group-hover:bg-secondary/20">
                                                <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                            </div>
                                            <h3 class="text-lg font-bold leading-snug text-primary mb-2 group-hover:text-secondary">
                                                <?php echo esc_html($service['title']); ?>
                                            </h3>
                                            <p class="text-sm leading-relaxed text-text-muted">
                                                <?php echo esc_html($service['excerpt']); ?>
                                            </p>
                                            <span class="mt-auto inline-flex min-h-12 items-center pt-3 text-sm font-semibold text-secondary">
                                                <?php echo $service_url ? esc_html__('Más información', 'med-landing-dev') : esc_html__('Disponible en consulta', 'med-landing-dev'); ?>
                                                <?php if ($service_url) : ?>
                                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                <?php endif; ?>
                                            </span>
                                    <?php if ($service_url) : ?>
                                        </a>
                                    <?php else : ?>
                                        </div>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/components/cta-section'); ?>

</main>

<?php get_footer(); ?>
