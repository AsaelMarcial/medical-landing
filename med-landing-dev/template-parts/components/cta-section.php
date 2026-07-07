<section class="bg-primary section-padding relative overflow-hidden" data-animate="fade-up">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="container-custom relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                <?php esc_html_e('¿Necesitas una consulta nefrológica?', 'med-landing-dev'); ?>
            </h2>
            <p class="text-slate-300 text-lg mb-8 leading-relaxed">
                <?php esc_html_e('Agenda tu cita hoy y recibe atención especializada para el cuidado de tu salud renal. Consultorios en Xalapa y Boca del Río, Veracruz.', 'med-landing-dev'); ?>
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(developer_get_page_url('contacto')); ?>" class="btn-primary text-base">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <?php esc_html_e('Agendar Cita', 'med-landing-dev'); ?>
                </a>
                <?php if (developer_get_whatsapp_number()) : ?>
                <a href="<?php echo esc_url(developer_get_whatsapp_url()); ?>" class="btn-whatsapp text-base" target="_blank" rel="noopener">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                    <?php esc_html_e('Escribir por WhatsApp', 'med-landing-dev'); ?>
                </a>
                <?php endif; ?>
                <?php if (developer_get_phone_number()) : ?>
                <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="inline-flex min-h-12 items-center justify-center rounded-lg border-2 border-white/30 px-6 py-3 font-semibold text-white transition-all duration-300 hover:bg-white/10">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <?php esc_html_e('Llamar', 'med-landing-dev'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
