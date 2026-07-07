<?php get_header(); ?>

<main id="main-content" class="min-h-screen flex items-center justify-center">
    <div class="container-custom text-center section-padding">
        <h1 class="text-6xl md:text-8xl font-bold text-primary mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-text mb-4">
            <?php esc_html_e('Página no encontrada', 'med-landing-dev'); ?>
        </h2>
        <p class="text-text-muted mb-8 max-w-md mx-auto">
            <?php esc_html_e('Lo sentimos, la página que buscas no existe o fue movida.', 'med-landing-dev'); ?>
        </p>
        <a href="<?php echo esc_url(developer_get_home_url()); ?>" class="btn-primary">
            <?php esc_html_e('Volver al inicio', 'med-landing-dev'); ?>
        </a>
    </div>
</main>

<?php get_footer(); ?>
