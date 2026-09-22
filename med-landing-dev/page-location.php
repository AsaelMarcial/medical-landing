<?php
/** Template Name: Consultorios en Xalapa */
get_header();
?>
<main id="main-content">
    <section class="section-padding bg-white">
        <div class="container-custom max-w-3xl">
            <p class="eyebrow"><?php echo esc_html(developer_text('Atención exclusivamente en Xalapa', 'Consultations exclusively in Xalapa')); ?></p>
            <h1 class="text-3xl md:text-5xl font-bold mb-5"><?php echo esc_html(developer_text('Nefrólogo en Xalapa', 'Nephrologist in Xalapa')); ?></h1>
            <p class="text-lg text-text-muted mb-6"><?php echo esc_html(developer_text('La atención del Dr. Edgar Eduardo Hernández Enríquez se concentra en dos consultorios en Xalapa: Torre Hakim y Policlinica Óptima.', 'Dr. Edgar Eduardo Hernández Enríquez currently sees patients at two locations in Xalapa: Torre Hakim and Policlinica Óptima.')); ?></p>
            <?php developer_whatsapp_button(['placement' => 'locations-hero']); ?>
        </div>
    </section>
    <?php get_template_part('template-parts/sections/locations'); ?>
</main>
<?php get_footer(); ?>
