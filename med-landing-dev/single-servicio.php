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
                <ol class="flex items-center gap-2">
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
                </div>

                <!-- CTA inline -->
                <div class="bg-surface rounded-xl p-8 text-center" data-animate="fade-up">
                    <h3 class="text-xl font-bold text-primary mb-3">
                        <?php esc_html_e('¿Necesitas este servicio?', 'med-landing-dev'); ?>
                    </h3>
                    <p class="text-text-muted mb-6">
                        <?php esc_html_e('Agenda una consulta para recibir atención especializada.', 'med-landing-dev'); ?>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary">
                            <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                        </a>
                        <?php if (developer_get_whatsapp_number()) : ?>
                        <a href="<?php echo esc_url(developer_get_whatsapp_url(sprintf(__('Hola, me interesa el servicio de %s.', 'med-landing-dev'), get_the_title()))); ?>" class="btn-whatsapp" target="_blank" rel="noopener">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            <?php esc_html_e('WhatsApp', 'med-landing-dev'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
