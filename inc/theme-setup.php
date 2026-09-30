<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'asteria_theme_setup' );

function asteria_enqueue_assets() {
	wp_enqueue_style( 'asteria-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&display=swap', array(), null );
	wp_enqueue_style( 'asteria-style', get_stylesheet_uri(), array(), ASTERIA_THEME_VERSION );
	wp_enqueue_style( 'asteria-main', get_template_directory_uri() . '/assets/css/main.css', array( 'asteria-fonts' ), ASTERIA_THEME_VERSION );
	wp_enqueue_script( 'asteria-main', get_template_directory_uri() . '/assets/js/main.js', array(), ASTERIA_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'asteria_enqueue_assets' );

function asteria_google_ads_tag() {
	$ads_id  = '';
	$send_to = '';
	if ( is_singular( 'logement' ) ) {
		$ads_id = get_post_meta( get_the_ID(), '_logement_google_ads_id', true );
		$label  = trim( (string) get_post_meta( get_the_ID(), '_logement_google_ads_label', true ) );
		if ( $ads_id && $label ) {
			$send_to = false !== strpos( $label, '/' ) ? $label : $ads_id . '/' . $label;
		}
	} else {
		$ads_id = get_theme_mod( 'asteria_google_ads_id', '' );
	}
	if ( empty( $ads_id ) ) {
		return;
	}
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ads_id ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo esc_js( $ads_id ); ?>');
		<?php if ( $send_to ) : ?>
		gtag('event', 'conversion', { 'send_to': '<?php echo esc_js( $send_to ); ?>' });
		<?php endif; ?>
	</script>
	<?php
}
add_action( 'wp_head', 'asteria_google_ads_tag' );

function asteria_is_cinematic_home() {
	return is_front_page() && get_theme_mod( 'asteria_cinematic_home', false );
}

function asteria_cinematic_body_class( $classes ) {
	if ( asteria_is_cinematic_home() ) {
		$classes[] = 'has-cine-hero';
	}
	return $classes;
}
add_filter( 'body_class', 'asteria_cinematic_body_class' );

function asteria_hero_slides() {
	return array(
		array( 'file' => 'villa-piscine.jpg', 'place' => 'Villa Asteria · Thouars', 'origin' => '78% 45%' ),
		array( 'file' => 'quietstay-sejour.jpg', 'place' => 'QuietStay · Massy', 'origin' => '30% 60%' ),
		array( 'file' => 'villa-suite.jpg', 'place' => 'Villa Asteria · Thouars', 'origin' => '55% 40%' ),
		array( 'file' => 'quietstay-chambre-tropicale.jpg', 'place' => 'QuietStay · Massy', 'origin' => '70% 40%' ),
		array( 'file' => 'villa-chambre-baroque.jpg', 'place' => 'Villa Asteria · Thouars', 'origin' => '55% 35%' ),
		array( 'file' => 'quietstay-chambre-botanique.jpg', 'place' => 'QuietStay · Massy', 'origin' => '40% 40%' ),
	);
}

function asteria_superhote_widget_url( $property_key ) {
	if ( empty( $property_key ) ) {
		return '';
	}
	$base = sprintf( 'https://connect.superhote.com/integrations/iframes/%s/rentals', ASTERIA_SUPERHOTE_WIDGET_ID );
	return add_query_arg(
		array(
			'property_key' => rawurlencode( $property_key ),
			'lang'         => asteria_current_lang(),
		),
		$base
	);
}
