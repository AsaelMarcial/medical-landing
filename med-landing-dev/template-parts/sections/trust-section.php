<?php $credentials = developer_get_professional_credentials(); ?>
<section class="section-padding bg-surface">
    <div class="container-custom">
        <div class="max-w-2xl mx-auto text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo esc_html(developer_text('Formación y certificación', 'Training and certification')); ?></h2>
            <p class="text-text-muted"><?php echo esc_html(developer_text('Información profesional verificable para tu tranquilidad.', 'Verifiable professional information for your peace of mind.')); ?></p>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <article class="rounded-2xl bg-white border border-primary/10 p-6">
                <?php developer_council_logo(); ?>
                <h3 class="text-lg font-bold mt-4 mb-2"><?php echo esc_html(developer_text('Certificación vigente', 'Current certification')); ?></h3>
                <p class="text-base text-text-muted"><?php echo esc_html(developer_text('Consejo Mexicano de Nefrología · 2025–2030', 'Consejo Mexicano de Nefrología · 2025–2030')); ?></p>
                <a class="social-link mt-3" href="<?php echo esc_url($credentials['conacem_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(developer_text('Verificar en CONACEM', 'Verify at CONACEM')); ?> ↗</a>
            </article>
            <article class="rounded-2xl bg-white border border-primary/10 p-6">
                <p class="eyebrow"><?php echo esc_html(developer_text('Credenciales', 'Credentials')); ?></p>
                <h3 class="text-lg font-bold mb-4"><?php echo esc_html(developer_text('Cédulas profesionales', 'Professional licenses')); ?></h3>
                <p class="text-base text-text-muted"><?php echo esc_html(developer_text('Cédula profesional', 'Professional license')); ?><br><strong><?php echo esc_html($credentials['professional_license']); ?></strong></p>
                <p class="text-base text-text-muted mt-3"><?php echo esc_html(developer_text('Cédula de especialidad', 'Specialist license')); ?><br><strong><?php echo esc_html($credentials['specialty_license']); ?></strong></p>
            </article>
            <article class="rounded-2xl bg-white border border-primary/10 p-6">
                <p class="eyebrow">Xalapa, Veracruz</p>
                <h3 class="text-lg font-bold mb-4"><?php echo esc_html(developer_text('Dos consultorios en Xalapa', 'Two consultation locations in Xalapa')); ?></h3>
                <p class="text-base text-text-muted">Torre Hakim<br>Policlinica Óptima</p>
                <a href="<?php echo esc_url(developer_get_page_url('nefrologo-xalapa')); ?>" class="social-link mt-4"><?php echo esc_html(developer_text('Ver ubicaciones', 'View locations')); ?> →</a>
            </article>
        </div>
    </div>
</section>
