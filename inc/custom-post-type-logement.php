<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_register_logement_cpt() {
	register_post_type( 'logement', array(
		'labels' => array(
			'name'               => __( 'Logements', 'asteria-pulsar' ),
			'singular_name'      => __( 'Logement', 'asteria-pulsar' ),
			'add_new_item'       => __( 'Ajouter un logement', 'asteria-pulsar' ),
			'edit_item'          => __( 'Modifier le logement', 'asteria-pulsar' ),
			'all_items'          => __( 'Tous les logements', 'asteria-pulsar' ),
			'featured_image'     => __( 'Photo principale', 'asteria-pulsar' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-admin-home',
		'rewrite'      => array( 'slug' => 'logements' ),
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'asteria_register_logement_cpt' );
