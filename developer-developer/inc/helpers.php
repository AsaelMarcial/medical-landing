<?php
/**
 * Helper functions.
 */

function developer_get_whatsapp_url($message = '') {
    $number = get_theme_mod('whatsapp_number', '');
    if (empty($number)) {
        return '#';
    }
    $url = 'https://wa.me/' . $number;
    if (!empty($message)) {
        $url .= '?text=' . rawurlencode($message);
    }
    return $url;
}

function developer_get_phone_url() {
    $phone = get_theme_mod('phone_number', '');
    if (empty($phone)) {
        return '#';
    }
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}

function developer_get_svg_icon($name) {
    $path = DEVELOPER_THEME_DIR . '/assets/images/icons/' . $name . '.svg';
    if (file_exists($path)) {
        return file_get_contents($path);
    }
    return '';
}
