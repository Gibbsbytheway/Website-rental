<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_seed_logement( $args ) {
	$existing = get_page_by_title( $args['title'], OBJECT, 'logement' );
	if ( $existing ) {
		return $existing->ID;
	}

	$post_id = wp_insert_post( array(
		'post_type'    => 'logement',
		'post_title'   => $args['title'],
		'post_content' => $args['content'],
		'post_status'  => 'publish',
	) );

	foreach ( $args['meta'] as $key => $value ) {
		update_post_meta( $post_id, $key, $value );
	}

	return $post_id;
}

function asteria_seed_page( $title, $slug, $content, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return $existing->ID;
	}

	$post_id = wp_insert_post( array(
		'post_type'    => 'page',
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_content' => $content,
		'post_status'  => 'publish',
	) );

	if ( $template ) {
		update_post_meta( $post_id, '_wp_page_template', $template );
	}

	return $post_id;
}

function asteria_theme_activation() {
	asteria_seed_logement( array(
		'title'   => "QuietStay 20' PARIS, Connected HOME avec Terrasse",
		'content' => "BIENVENUE DANS NOTRE BEL APPARTEMENT ⭐QuietStay⭐\n\n🔑 ENTRÉE AUTONOME / AUTOMATISÉE 🔑\n\nPoint de chute idéal dans un logement paisible et convivial, à 2 minutes à pieds de la Gare de Massy Palaiseau. Nous n'avons volontairement aucun balcon, terrasse, jacuzzi dans le souci du confort et du bien être. À 15 min de Paris. Détendez-vous en terrasse, à l'abri des regards.",
		'meta'    => array(
			'_logement_adresse'      => '10 rue Jean-Baptiste Charcot',
			'_logement_ville'        => '91300 Massy',
			'_logement_prix_nuit'    => '137',
			'_logement_voyageurs'    => '6',
			'_logement_chambres'     => '2',
			'_logement_lits'         => '3',
			'_logement_checkin'      => '16h00',
			'_logement_checkout'     => '11h00',
			'_logement_superhote_id' => '11423762',
			'_logement_equipements'  => "Check-in autonome\nSupport TEL / SMS\nMénage professionnel\nWifi FIBRE\nSavon et gel douche\nLiterie de qualité\nCuisine équipée\nServiettes fournies",
		),
	) );

	asteria_seed_logement( array(
		'title'   => 'Villa Asteria — Thouars',
		'content' => "Bienvenue à la Villa Asteria, une demeure d'exception de grand standing située à Thouars. Établissement pensé pour les séjours haut de gamme en famille, entre amis ou pour des événements professionnels, cette propriété unique allie espaces intimistes, une décoration soignée et un aménagement idéal d'accueil.",
		'meta'    => array(
			'_logement_adresse'      => '5 Rue des Fleury',
			'_logement_ville'        => '79100 Thouars',
			'_logement_prix_nuit'    => '380',
			'_logement_voyageurs'    => '16',
			'_logement_chambres'     => '7',
			'_logement_lits'         => '9',
			'_logement_checkin'      => '16h00',
			'_logement_checkout'     => '10h00',
			'_logement_superhote_id' => '11424374',
			'_logement_equipements'  => "Ménage professionnel inclus\nSupport téléphonique & SMS\nWifi haut débit (fibre)\nProduits d'accueil (savon & gel douche)\nLiterie premium\nCuisine entièrement équipée\nLinge de toilette fourni\nLave-linge",
		),
	) );

	asteria_seed_page(
		'À propos',
		'a-propos',
		"Profitez d'un séjour alliant confort et praticité dans nos locations courte durée, idéalement situées et entièrement équipées, pour vous sentir comme chez vous lors de vos voyages d'affaires ou de loisirs."
	);

	asteria_seed_page( 'Contact', 'contact', '', 'page-contact.php' );
}
add_action( 'after_switch_theme', 'asteria_theme_activation' );
