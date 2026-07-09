<?php
/**
 * Theme functions and definitions.
 */

define('DEVELOPER_THEME_VERSION', '1.6.2');
define('DEVELOPER_THEME_DIR', get_template_directory());
define('DEVELOPER_THEME_URI', get_template_directory_uri());

require_once DEVELOPER_THEME_DIR . '/inc/setup.php';
require_once DEVELOPER_THEME_DIR . '/inc/enqueue.php';
require_once DEVELOPER_THEME_DIR . '/inc/custom-post-types.php';
require_once DEVELOPER_THEME_DIR . '/inc/schema-markup.php';
require_once DEVELOPER_THEME_DIR . '/inc/customizer.php';
require_once DEVELOPER_THEME_DIR . '/inc/helpers.php';
require_once DEVELOPER_THEME_DIR . '/inc/seo.php';
