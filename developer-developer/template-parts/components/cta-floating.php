<!-- Floating CTA - WhatsApp + Phone -->
<div x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { show = window.scrollY > 300 })" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3" x-show="show" x-transition:enter="transition-all duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition-all duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">

    <!-- Phone -->
    <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="flex items-center justify-center w-14 h-14 bg-secondary text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2" aria-label="<?php esc_attr_e('Llamar', 'developer-developer'); ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
    </a>

    <!-- WhatsApp -->
    <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, me gustaría agendar una cita')); ?>" target="_blank" rel="noopener" class="flex items-center justify-center w-14 h-14 bg-whatsapp text-white rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-whatsapp focus:ring-offset-2" aria-label="<?php esc_attr_e('Contactar por WhatsApp', 'developer-developer'); ?>">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.612.638l4.72-1.324A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.387 0-4.593-.753-6.406-2.033l-.447-.326-2.817.79.852-2.746-.365-.477A9.932 9.932 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
    </a>
</div>

<!-- Mobile sticky CTA bar -->
<div class="fixed bottom-0 left-0 right-0 z-40 lg:hidden bg-white border-t border-gray-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
    <div class="flex items-stretch">
        <a href="<?php echo esc_url(developer_get_phone_url()); ?>" class="flex-1 flex items-center justify-center gap-2 py-3 text-secondary font-semibold text-sm hover:bg-surface transition-colors" aria-label="<?php esc_attr_e('Llamar', 'developer-developer'); ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <?php esc_html_e('Llamar', 'developer-developer'); ?>
        </a>
        <a href="<?php echo esc_url(developer_get_whatsapp_url('Hola, me gustaría agendar una cita')); ?>" target="_blank" rel="noopener" class="flex-1 flex items-center justify-center gap-2 py-3 bg-whatsapp text-white font-semibold text-sm hover:bg-green-600 transition-colors" aria-label="<?php esc_attr_e('WhatsApp', 'developer-developer'); ?>">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
            <?php esc_html_e('WhatsApp', 'developer-developer'); ?>
        </a>
        <a href="<?php echo esc_url(home_url('/contacto/')); ?>" class="flex-1 flex items-center justify-center gap-2 py-3 bg-accent text-white font-semibold text-sm hover:bg-amber-700 transition-colors">
            <?php esc_html_e('Agendar', 'developer-developer'); ?>
        </a>
    </div>
</div>
