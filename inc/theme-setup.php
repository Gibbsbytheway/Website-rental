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

	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'asteria-pulsar' ),
		'footer'  => __( 'Menu pied de page', 'asteria-pulsar' ),
	) );
}
add_action( 'after_setup_theme', 'asteria_theme_setup' );

function asteria_enqueue_assets() {
	wp_enqueue_style( 'asteria-style', get_stylesheet_uri(), array(), ASTERIA_THEME_VERSION );
	wp_enqueue_style( 'asteria-main', get_template_directory_uri() . '/assets/css/main.css', array(), ASTERIA_THEME_VERSION );
	wp_enqueue_script( 'asteria-main', get_template_directory_uri() . '/assets/js/main.js', array(), ASTERIA_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'asteria_enqueue_assets' );

function asteria_google_ads_tag() {
	$ads_id = get_theme_mod( 'asteria_google_ads_id', '' );
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
	</script>
	<?php
}
add_action( 'wp_head', 'asteria_google_ads_tag' );

function asteria_superhote_rental_url( $rental_id ) {
	if ( empty( $rental_id ) ) {
		return ASTERIA_SUPERHOTE_URL;
	}
	return add_query_arg(
		array(
			'tab'      => 'rental',
			'rentalId' => rawurlencode( $rental_id ),
			'adults'   => 1,
		),
		ASTERIA_SUPERHOTE_URL
	);
}

function asteria_superhote_rentals_iframe_url() {
	$iframe_id = get_theme_mod( 'asteria_superhote_iframe_id', '4463e247-f953-426b-a1e4-07dfb4a0204e' );
	if ( empty( $iframe_id ) ) {
		return '';
	}
	return sprintf( 'https://connect.superhote.com/integrations/iframes/%s/rentals?lang=fr', rawurlencode( $iframe_id ) );
}
