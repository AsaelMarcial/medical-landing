<?php
/** One component for every appointment action; never sends a message automatically. */
if (!developer_get_whatsapp_number()) {
    return;
}
$context = isset($args['context']) ? sanitize_text_field($args['context']) : '';
$message = $context
    ? sprintf(developer_text('Hola, me gustaría solicitar información para agendar: %s.', 'Hello, I would like information about booking: %s.'), $context)
    : developer_text('Hola, me gustaría agendar una cita de Nefrología en Xalapa.', 'Hello, I would like to book a nephrology appointment in Xalapa.');
$placement = isset($args['placement']) ? sanitize_key($args['placement']) : 'content';
?>
<a href="<?php echo esc_url(developer_get_whatsapp_url($message)); ?>" class="btn-whatsapp <?php echo esc_attr($args['class'] ?? ''); ?>" target="_blank" rel="noopener noreferrer" data-whatsapp-cta data-cta-placement="<?php echo esc_attr($placement); ?>">
    <svg width="24" height="24" class="shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.297-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.612.638l4.72-1.324A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.387 0-4.593-.753-6.406-2.033l-.447-.326-2.817.79.852-2.746-.365-.477A9.932 9.932 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
    <span><?php echo esc_html(developer_text('Agendar por WhatsApp', 'Book via WhatsApp')); ?></span>
</a>
