<?php if (developer_get_whatsapp_number()) : ?>
<div data-floating-cta hidden class="fixed bottom-6 right-6 z-30 hidden lg:block">
    <?php developer_whatsapp_button(['placement' => 'floating', 'class' => 'shadow-lg rounded-full']); ?>
</div>
<div class="mobile-cta-bar fixed bottom-0 left-0 right-0 z-30 bg-white border-t border-primary/10 px-3 pt-2 lg:hidden">
    <?php developer_whatsapp_button(['placement' => 'mobile-bar', 'class' => 'w-full']); ?>
</div>
<?php endif; ?>
