<section class="section-padding bg-surface" id="consultorios">
    <div class="container-custom">
        <div class="max-w-3xl mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo esc_html(developer_text('Encuentra tu consultorio en Xalapa', 'Find your consultation location in Xalapa')); ?></h2>
            <p class="text-text-muted"><?php echo esc_html(developer_text('Elige la ubicación que te resulte más cómoda. Confirma disponibilidad por WhatsApp.', 'Choose the location that is most convenient for you. Confirm availability via WhatsApp.')); ?></p>
        </div>
        <div class="grid gap-6 lg:grid-cols-2"><?php foreach (developer_get_locations() as $location) { get_template_part('template-parts/components/location-map', null, ['location' => $location]); } ?></div>
    </div>
</section>
