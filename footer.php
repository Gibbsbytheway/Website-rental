<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone    = get_theme_mod( 'asteria_telephone', '+33660585666' );
$email    = get_theme_mod( 'asteria_contact_email', 'gboissard@free.fr' );
$horaires = get_theme_mod( 'asteria_horaires', 'Disponible 7j/7 de 9h00 à 22h00' );
?>

<footer class="site-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
			<p><?php echo esc_html( asteria_t( 'hero.tagline' ) ); ?></p>
		</div>

		<div class="site-footer__contact">
			<h3><?php echo esc_html( asteria_t( 'footer.contact' ) ); ?></h3>
			<p><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
			<p><?php echo esc_html( $horaires ); ?></p>
		</div>

		<div class="site-footer__menu">
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/logements/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.logements' ) ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.a_propos' ) ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.contact' ) ); ?></a></li>
			</ul>
		</div>
	</div>

	<div class="container site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( asteria_t( 'footer.droits' ) ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
