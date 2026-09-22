<section class="relative overflow-hidden bg-gradient-to-br from-primary/10 via-surface to-gold/25">
    <div class="container-custom py-12 md:py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="min-w-0">
                <p class="eyebrow"><?php echo esc_html(developer_text('Nefrólogo en Xalapa', 'Nephrologist in Xalapa')); ?></p>
                <h1 class="hero-name"><?php echo esc_html(developer_get_doctor_name()); ?></h1>
                <p class="text-lg text-text-muted leading-relaxed mb-5 max-w-lg"><?php echo esc_html(developer_get_doctor_description()); ?></p>
                <p class="text-base font-semibold text-primary mb-7"><?php echo esc_html(developer_text('Consultorios en Torre Hakim y Policlinica Óptima', 'Consultations at Torre Hakim and Policlinica Óptima')); ?></p>
                <div class="flex flex-wrap gap-3 items-center mb-7">
                    <?php developer_whatsapp_button(['placement' => 'hero']); ?>
                    <a href="<?php echo esc_url(developer_get_page_url('nefrologo-xalapa')); ?>" class="inline-flex min-h-12 items-center px-3 font-semibold text-secondary"><?php echo esc_html(developer_text('Ver consultorios', 'View locations')); ?> <span aria-hidden="true" class="ml-2">→</span></a>
                </div>
                <p class="text-sm text-text-muted"><?php echo esc_html(developer_text('Certificación CMN 2025–2030 · Citas exclusivamente por WhatsApp', 'CMN certification 2025–2030 · Appointments exclusively via WhatsApp')); ?></p>
            </div>
            <div class="flex justify-center">
                <div class="relative w-full max-w-md lg:max-w-lg">
                    <div class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-surface shadow-xl ring-1 ring-primary/10">
                        <?php get_template_part('template-parts/components/doctor-portrait', null, ['loading' => 'eager', 'class' => 'h-full w-full object-cover']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
