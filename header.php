<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container site-header__inner">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				bloginfo( 'name' );
			}
			?>
		</a>

		<button class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'asteria-pulsar' ); ?>" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>

		<nav class="site-nav" id="site-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => 'asteria_default_menu',
			) );
			?>
		</nav>

		<a class="btn btn--cta" href="<?php echo esc_url( home_url( '/#logements' ) ); ?>"><?php esc_html_e( 'Réserver', 'asteria-pulsar' ); ?></a>
	</div>
</header>

<?php
function asteria_default_menu() {
	echo '<ul>';
	echo '<li><a href="' . esc_url( home_url( '/logements/' ) ) . '">' . esc_html__( 'Nos logements', 'asteria-pulsar' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/a-propos/' ) ) . '">' . esc_html__( 'À propos', 'asteria-pulsar' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact', 'asteria-pulsar' ) . '</a></li>';
	echo '</ul>';
}
