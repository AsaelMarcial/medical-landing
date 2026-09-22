<section id="<?php echo is_front_page() ? 'procedimientos-destacados' : 'procedimientos'; ?>" class="section-padding bg-white scroll-mt-36">
    <div class="container-custom">
        <div class="max-w-3xl mb-8">
            <p class="eyebrow"><?php echo esc_html(developer_text('Procedimientos nefrológicos', 'Nephrology procedures')); ?></p>
            <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo esc_html(developer_text('Catéteres de hemodiálisis y biopsia renal', 'Hemodialysis catheters and kidney biopsy')); ?></h2>
            <p class="text-text-muted"><?php echo esc_html(developer_text('Información para orientar tu valoración. La indicación y el lugar del procedimiento se confirman de forma individual.', 'Information to guide your assessment. The indication and procedure location are confirmed individually.')); ?></p>
        </div>
        <div class="grid gap-5 md:grid-cols-3">
            <?php foreach (developer_get_procedures() as $index => $procedure) : ?>
                <article class="procedure-card">
                    <span class="procedure-number" aria-hidden="true"><?php echo esc_html(sprintf('%02d', $index + 1)); ?></span>
                    <h3 class="text-xl font-bold mt-5 mb-3"><?php echo esc_html($procedure['title']); ?></h3>
                    <p class="text-base text-text-muted mb-5"><?php echo esc_html($procedure['description']); ?></p>
                    <a class="inline-flex min-h-12 items-center font-semibold text-secondary mt-auto" href="<?php echo esc_url($procedure['url']); ?>"><?php echo esc_html(developer_text('Conocer el procedimiento', 'About this procedure')); ?> <span class="ml-2" aria-hidden="true">→</span></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
