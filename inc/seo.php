<?php
/**
 * Référencement : meta description, Open Graph, Twitter Card et données structurées.
 *
 * Sans ces balises, Google et les réseaux sociaux choisissent eux-mêmes le texte
 * et l'image affichés (parfois une image sans rapport). L'adresse précise des
 * logements n'est volontairement jamais publiée : seule la ville l'est.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Image représentative d'un logement : image mise en avant si elle existe,
 * sinon une photo du thème correspondant au logement.
 */
function asteria_seo_logement_image( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
		if ( $src ) {
			return $src[0];
		}
	}
	$slug = get_post_field( 'post_name', $post_id );
	$file = ( false !== strpos( $slug, 'villa' ) ) ? 'villa-piscine.jpg' : 'quietstay-sejour.jpg';
	return get_template_directory_uri() . '/assets/img/hero/' . $file;
}

function asteria_seo_logement_description( $post_id ) {
	$text = has_excerpt( $post_id ) ? get_the_excerpt( $post_id ) : get_post_field( 'post_content', $post_id );
	$text = wp_strip_all_tags( strip_shortcodes( $text ) );
	$text = trim( preg_replace( '/\s+/u', ' ', preg_replace( '/[\x{1F300}-\x{1FAFF}\x{2600}-\x{27BF}\x{2B50}]/u', '', $text ) ) );

	$ville     = get_post_meta( $post_id, '_logement_ville', true );
	$voyageurs = get_post_meta( $post_id, '_logement_voyageurs', true );
	$chambres  = get_post_meta( $post_id, '_logement_chambres', true );

	$facts = array();
	if ( $ville ) {
		$facts[] = 'Location à ' . preg_replace( '/^\d{5}\s*/', '', $ville );
	}
	if ( $chambres ) {
		$facts[] = $chambres . ' chambres';
	}
	if ( $voyageurs ) {
		$facts[] = 'jusqu\'à ' . $voyageurs . ' voyageurs';
	}
	$prefix = $facts ? implode( ', ', $facts ) . '. ' : '';

	return wp_html_excerpt( $prefix . $text, 158, '…' );
}

function asteria_seo_head() {
	$site_name   = 'Pulsar Rentals';
	$title       = wp_get_document_title();
	$url         = '';
	$image       = get_template_directory_uri() . '/assets/img/hero/villa-piscine.jpg';
	$description = 'Locations de vacances en réservation directe : Villa Asteria à Thouars (jusqu\'à 16 voyageurs, piscine chauffée) et QuietStay 20\' Paris à Massy, à 5 minutes de la gare TGV. Meilleur tarif garanti.';
	$type        = 'website';

	if ( is_singular( 'logement' ) ) {
		$post_id     = get_queried_object_id();
		$url         = get_permalink( $post_id );
		$image       = asteria_seo_logement_image( $post_id );
		$description = asteria_seo_logement_description( $post_id );
		$type        = 'article';
	} elseif ( is_front_page() ) {
		$url = home_url( '/' );
	} elseif ( is_singular() ) {
		$url  = get_permalink();
		$text = wp_strip_all_tags( get_post_field( 'post_content', get_queried_object_id() ) );
		if ( $text ) {
			$description = wp_html_excerpt( trim( preg_replace( '/\s+/u', ' ', $text ) ), 158, '…' );
		}
	}

	echo "\n<!-- Référencement Pulsar Rentals -->\n";
	printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( $site_name ) );
	printf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $type ) );
	printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $image ) );
	if ( $url ) {
		printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
	}
	echo '<meta property="og:locale" content="fr_FR" />' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	printf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $image ) );

	$same_as = array(
		'https://www.instagram.com/pulsar_rentals/',
		'https://www.facebook.com/PulsarRentals',
		'https://www.youtube.com/@PulsarRentals',
	);

	$graph = array(
		array(
			'@type'  => 'Organization',
			'@id'    => home_url( '/#organization' ),
			'name'   => $site_name,
			'url'    => home_url( '/' ),
			'logo'   => ( get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : get_template_directory_uri() . '/assets/img/hero/villa-piscine.jpg' ),
			'sameAs' => $same_as,
		),
	);

	if ( is_singular( 'logement' ) ) {
		$post_id = get_queried_object_id();
		$ville   = get_post_meta( $post_id, '_logement_ville', true );
		$prix    = get_post_meta( $post_id, '_logement_prix_nuit', true );
		$cp      = preg_match( '/^(\d{5})/', (string) $ville, $m ) ? $m[1] : '';
		$city    = trim( preg_replace( '/^\d{5}\s*/', '', (string) $ville ) );

		$lodging = array(
			'@type'       => 'LodgingBusiness',
			'@id'         => get_permalink( $post_id ) . '#logement',
			'name'        => get_the_title( $post_id ),
			'description' => $description,
			'url'         => get_permalink( $post_id ),
			'image'       => $image,
			'brand'       => array( '@id' => home_url( '/#organization' ) ),
			// Volontairement sans rue : seules la ville et le code postal sont publiés.
			'address'     => array_filter( array(
				'@type'           => 'PostalAddress',
				'addressLocality' => $city,
				'postalCode'      => $cp,
				'addressCountry'  => 'FR',
			) ),
			'checkinTime'  => '16:00',
		);
		if ( $prix ) {
			$lodging['priceRange'] = 'À partir de ' . $prix . ' € / nuit';
		}
		$graph[] = $lodging;
	}

	echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'asteria_seo_head', 1 );
