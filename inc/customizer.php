<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'asteria_reglages', array(
		'title'    => __( 'Réglages du site', 'asteria-pulsar' ),
		'priority' => 30,
	) );

	$fields = array(
		'asteria_telephone'          => array( 'label' => __( 'Téléphone de contact', 'asteria-pulsar' ), 'default' => '+33660585666' ),
		'asteria_contact_email'      => array( 'label' => __( 'Email de contact', 'asteria-pulsar' ), 'default' => 'gboissard@free.fr' ),
		'asteria_horaires'           => array( 'label' => __( 'Disponibilité', 'asteria-pulsar' ), 'default' => 'Disponible 7j/7 de 9h00 à 22h00' ),
		'asteria_google_ads_id'      => array( 'label' => __( 'ID balise Google Ads (AW-XXXXXXXXX)', 'asteria-pulsar' ), 'default' => '' ),
		'asteria_google_ads_label'   => array( 'label' => __( 'Label de conversion Google Ads', 'asteria-pulsar' ), 'default' => '' ),
	);

	foreach ( $fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $field['default'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $field['label'],
			'section' => 'asteria_reglages',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'asteria_customize_register' );
