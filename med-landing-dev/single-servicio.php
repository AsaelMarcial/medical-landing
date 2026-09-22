<?php
/**
 * Single Servicio template.
 */

get_header(); ?>

<main id="main-content">

    <?php while (have_posts()) : the_post(); ?>

    <!-- Breadcrumbs -->
    <div class="bg-surface py-4">
        <div class="container-custom">
            <nav class="text-sm text-text-muted" aria-label="<?php esc_attr_e('Breadcrumb', 'med-landing-dev'); ?>">
                <ol class="flex flex-wrap items-center gap-2">
                    <li><a href="<?php echo esc_url(developer_get_home_url()); ?>" class="inline-flex min-h-12 items-center hover:text-secondary transition-colors"><?php esc_html_e('Inicio', 'med-landing-dev'); ?></a></li>
                    <li aria-hidden="true"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg></li>
                    <li><a href="<?php echo esc_url(developer_get_page_url('servicios')); ?>" class="inline-flex min-h-12 items-center hover:text-secondary transition-colors"><?php esc_html_e('Servicios', 'med-landing-dev'); ?></a></li>
                    <li aria-hidden="true"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg></li>
                    <li class="text-primary font-medium" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Content -->
    <section class="bg-background section-padding">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <header class="mb-10" data-animate="fade-up">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-4">
                        <?php the_title(); ?>
                    </h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="text-lg text-text-muted leading-relaxed">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-10 rounded-xl overflow-hidden shadow-lg" data-animate="scale-in">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-64 md:h-80 object-cover']); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-lg max-w-none mb-12" data-animate="fade-up">
                    <?php the_content(); ?>
                    <?php developer_procedure_details(get_post_meta(get_the_ID(), '_developer_service_key', true)); ?>
                </div>

                <!-- CTA inline -->
                <div class="bg-surface rounded-xl p-8 text-center" data-animate="fade-up">
                    <h3 class="text-xl font-bold text-primary mb-3">
                        <?php esc_html_e('¿Necesitas este servicio?', 'med-landing-dev'); ?>
                    </h3>
                    <p class="text-text-muted mb-6">
                        <?php esc_html_e('Agenda una consulta para recibir atención especializada.', 'med-landing-dev'); ?>
                    </p>
                    <div class="flex justify-center">
                        <?php developer_whatsapp_button(['context' => get_the_title(), 'placement' => 'service']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
