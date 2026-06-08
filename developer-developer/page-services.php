<?php
/**
 * Template Name: Servicios
 */

get_header(); ?>

<main id="main-content">

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-20" data-animate="fade-up">
        <div class="container-custom text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-4">
                <?php esc_html_e('Servicios Especializados', 'developer-developer'); ?>
            </h1>
            <p class="text-lg text-text-muted max-w-2xl mx-auto">
                <?php esc_html_e('Atención integral en nefrología para el diagnóstico, tratamiento y prevención de enfermedades renales.', 'developer-developer'); ?>
            </p>
        </div>
    </section>

    <!-- Services List -->
    <section class="bg-background section-padding" data-animate="fade-up">
        <div class="container-custom">
            <?php
            $servicios = new WP_Query([
                'post_type'      => 'servicio',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);
            ?>

            <?php if ($servicios->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-animate="stagger">
                    <?php while ($servicios->have_posts()) : $servicios->the_post(); ?>
                        <article class="group bg-white rounded-xl p-8 shadow-sm border border-gray-100 hover:shadow-lg hover:border-secondary/20 transition-all duration-300">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="w-14 h-14 bg-secondary/10 rounded-lg flex items-center justify-center mb-5 group-hover:bg-secondary/20 transition-colors">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-7 h-7 object-contain']); ?>
                                    <?php else : ?>
                                        <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    <?php endif; ?>
                                </div>
                                <h2 class="text-xl font-bold text-primary mb-3 group-hover:text-secondary transition-colors">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="text-text-muted leading-relaxed mb-4">
                                    <?php echo esc_html(get_the_excerpt()); ?>
                                </p>
                                <span class="inline-flex items-center text-secondary font-semibold text-sm group-hover:gap-2 transition-all">
                                    <?php esc_html_e('Más información', 'developer-developer'); ?>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center text-text-muted text-lg">
                    <?php esc_html_e('Próximamente se publicarán los servicios disponibles.', 'developer-developer'); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA -->
    <?php get_template_part('template-parts/components/cta-section'); ?>

</main>

<?php get_footer(); ?>
