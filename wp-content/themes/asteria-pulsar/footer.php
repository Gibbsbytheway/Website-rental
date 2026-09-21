<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone    = get_theme_mod( 'asteria_telephone', '+33660585666' );
$email    = get_theme_mod( 'asteria_contact_email', 'gboissard@free.fr' );
$horaires = get_theme_mod( 'asteria_horaires', 'Disponible 7j/7 de 9h00 à 22h00' );
?>

<section class="cta-banner">
	<div class="container cta-banner__inner">
		<p><?php esc_html_e( 'Prêt à passer un excellent séjour ?', 'asteria-pulsar' ); ?></p>
		<a class="btn btn--cta" href="<?php echo esc_url( home_url( '/logements/' ) ); ?>"><?php esc_html_e( 'Réserver maintenant', 'asteria-pulsar' ); ?></a>
	</div>
</section>

<footer class="site-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>

		<div class="site-footer__contact">
			<h3><?php esc_html_e( 'Contact', 'asteria-pulsar' ); ?></h3>
			<p><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
			<p><?php echo esc_html( $horaires ); ?></p>
		</div>

		<div class="site-footer__menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'fallback_cb'    => false,
			) );
			?>
		</div>
	</div>

	<div class="container site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Tous droits réservés.', 'asteria-pulsar' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
