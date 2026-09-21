<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

while ( have_posts() ) :
	the_post();
	$superhote_id = get_post_meta( get_the_ID(), '_logement_superhote_id', true );
	?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php the_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'logement-embed' ); ?>>
<?php wp_body_open(); ?>

<a class="logement-embed__back" href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr; <?php echo esc_html( asteria_t( 'retour.au_site' ) ); ?></a>
<iframe
	src="<?php echo esc_url( asteria_superhote_rental_url( $superhote_id ) ); ?>"
	class="logement-embed__iframe"
	title="<?php the_title_attribute(); ?>"
></iframe>

<?php wp_footer(); ?>
</body>
</html>
	<?php
endwhile;
