<?php
/**
 * Template Name: Sobre el Doctor
 */

get_header();

$credentials = developer_get_professional_credentials();
$training = developer_get_professional_training();
$memberships = developer_get_memberships();
?>

<main id="main-content">
    <section class="bg-gradient-to-br from-primary/5 via-background to-secondary/5 py-16 md:py-24" data-animate="fade-up">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <div class="lg:col-span-2" data-animate="scale-in">
                    <div class="relative max-w-sm mx-auto lg:mx-0">
                        <?php get_template_part('template-parts/components/doctor-portrait', null, [
                            'loading' => 'eager',
                            'class'   => 'aspect-[4/5] w-full rounded-2xl object-cover shadow-xl',
                        ]); ?>
                        <div class="absolute -bottom-3 -right-3 w-full h-full border-2 border-gold/50 rounded-2xl -z-10"></div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <p class="text-secondary font-semibold text-sm uppercase tracking-wider mb-3">
                        <?php echo esc_html(developer_get_doctor_specialty()); ?>
                    </p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary mb-6">
                        <?php echo esc_html(developer_get_doctor_name()); ?>
                    </h1>
                    <p class="text-lg text-text-muted leading-relaxed mb-6">
                        <?php echo esc_html(developer_get_doctor_description()); ?>
                    </p>
                    <p class="text-text leading-relaxed mb-6">
                        <?php esc_html_e('Especialista en Nefrología certificado, con atención en Xalapa y Boca del Río para valoración de enfermedades renales, terapias de reemplazo renal y procedimientos nefrológicos seleccionados.', 'med-landing-dev'); ?>
                    </p>
                    <div class="grid gap-3 text-sm text-text sm:grid-cols-2">
                        <div class="rounded-xl bg-white p-4 shadow-sm">
                            <span class="block font-semibold text-primary"><?php esc_html_e('Cédula profesional', 'med-landing-dev'); ?></span>
                            <span><?php echo esc_html($credentials['professional_license']); ?></span>
                        </div>
                        <div class="rounded-xl bg-white p-4 shadow-sm">
                            <span class="block font-semibold text-primary"><?php esc_html_e('Cédula de especialidad', 'med-landing-dev'); ?></span>
                            <span><?php echo esc_html($credentials['specialty_license']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-background section-padding" data-animate="fade-up">
        <div class="container-custom">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">
                    <?php esc_html_e('Formación profesional y certificación', 'med-landing-dev'); ?>
                </h2>
                <p class="text-text-muted text-lg">
                    <?php esc_html_e('Información profesional publicada con enfoque verificable y sin sustituir la valoración médica individual.', 'med-landing-dev'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3" data-animate="stagger">
                <article class="rounded-xl bg-surface p-6 lg:col-span-2">
                    <h3 class="mb-4 text-xl font-bold text-primary"><?php esc_html_e('Trayectoria académica', 'med-landing-dev'); ?></h3>
                    <ul class="space-y-3 text-text-muted">
                        <?php foreach ($training as $item) : ?>
                            <li class="flex gap-3">
                                <span class="mt-2 h-2 w-2 flex-shrink-0 rounded-full bg-accent"></span>
                                <span><?php echo esc_html(developer_translate_string($item)); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>

                <article class="rounded-xl bg-primary p-6 text-white">
                    <h3 class="mb-3 text-xl font-bold text-white"><?php esc_html_e('Certificación vigente', 'med-landing-dev'); ?></h3>
                    <p class="text-slate-300"><?php echo esc_html($credentials['certification']); ?></p>
                    <a href="<?php echo esc_url($credentials['conacem_url']); ?>" class="mt-5 inline-flex min-h-12 items-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-primary transition-colors hover:bg-gold/60" target="_blank" rel="noopener">
                        <?php esc_html_e('Verificar en CONACEM', 'med-landing-dev'); ?>
                    </a>
                </article>

                <article class="rounded-xl bg-surface p-6 lg:col-span-3">
                    <h3 class="mb-4 text-xl font-bold text-primary"><?php esc_html_e('Membresías profesionales', 'med-landing-dev'); ?></h3>
                    <div class="grid gap-3 md:grid-cols-3">
                        <?php foreach ($memberships as $membership) : ?>
                            <div class="rounded-lg bg-white p-4 text-sm font-semibold text-primary shadow-sm">
                                <?php echo esc_html(developer_translate_string($membership)); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/components/cta-section'); ?>
</main>

<?php get_footer(); ?>
