<?php
/** Template Name: Contacto */
get_header();
?>
<main id="main-content">
    <section class="section-padding bg-white">
        <div class="container-custom max-w-3xl text-center">
            <p class="eyebrow"><?php echo esc_html(developer_text('Contacto y citas', 'Contact and appointments')); ?></p>
            <h1 class="text-3xl md:text-5xl font-bold mb-5"><?php echo esc_html(developer_text('Tu cita empieza en WhatsApp', 'Your appointment starts on WhatsApp')); ?></h1>
            <p class="text-lg text-text-muted mb-6"><?php echo esc_html(developer_text('Escríbenos para consultar disponibilidad en Torre Hakim o Policlinica Óptima, en Xalapa.', 'Message us to check availability at Torre Hakim or Policlinica Óptima in Xalapa.')); ?></p>
            <?php developer_whatsapp_button(['placement' => 'contact']); ?>
            <p class="mt-4 text-base text-text-muted">WhatsApp: <?php echo esc_html(developer_get_phone_number()); ?></p>
            <p class="mt-5 text-sm text-text-muted"><?php echo esc_html(developer_text('Las citas se confirman por WhatsApp. Enviar un mensaje no equivale a una cita confirmada.', 'Appointments are confirmed via WhatsApp. Sending a message does not mean your appointment is confirmed.')); ?></p>
        </div>
    </section>
    <?php get_template_part('template-parts/sections/locations'); ?>
    <?php get_template_part('template-parts/sections/social'); ?>
</main>
<?php get_footer(); ?>
