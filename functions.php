<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ASTERIA_SUPERHOTE_URL', 'https://connect.superhote.com/website/6a79eeb782528' );
define( 'ASTERIA_THEME_VERSION', '1.0.1' );

require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/custom-post-type-logement.php';
require get_template_directory() . '/inc/meta-boxes-logement.php';
require get_template_directory() . '/inc/contact-form-handler.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/theme-activation.php';
