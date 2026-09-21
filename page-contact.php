<?php
/**
 * Template Name: Contact
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$phone    = get_theme_mod( 'asteria_telephone', '+33660585666' );
$email    = get_theme_mod( 'asteria_contact_email', 'gboissard@free.fr' );
$horaires = get_theme_mod( 'asteria_horaires', 'Disponible 7j/7 de 9h00 à 22h00' );
$status   = isset( $_GET['contact'] ) ? sanitize_key( $_GET['contact'] ) : '';
?>

<section class="page-hero">
	<div class="container">
		<h1><?php echo esc_html( asteria_t( 'contact.titre' ) ); ?></h1>
		<p><?php echo esc_html( asteria_t( 'contact.sous_titre' ) ); ?></p>
	</div>
</section>

<section class="contact container">
	<div class="contact__form">
		<h2><?php echo esc_html( asteria_t( 'contact.formulaire' ) ); ?></h2>

		<?php if ( 'success' === $status ) : ?>
			<p class="notice notice--success"><?php echo esc_html( asteria_t( 'contact.succes' ) ); ?></p>
		<?php elseif ( 'error' === $status ) : ?>
			<p class="notice notice--error"><?php echo esc_html( asteria_t( 'contact.erreur' ) ); ?></p>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="asteria_contact_submit" />
			<?php wp_nonce_field( 'asteria_contact_submit', 'asteria_contact_nonce' ); ?>

			<div class="form-row form-row--split">
				<div>
					<label for="prenom"><?php echo esc_html( asteria_t( 'contact.prenom' ) ); ?> *</label>
					<input type="text" id="prenom" name="prenom" required />
				</div>
				<div>
					<label for="nom"><?php echo esc_html( asteria_t( 'contact.nom' ) ); ?> *</label>
					<input type="text" id="nom" name="nom" required />
				</div>
			</div>

			<div class="form-row">
				<label for="email"><?php echo esc_html( asteria_t( 'contact.email' ) ); ?> *</label>
				<input type="email" id="email" name="email" required />
			</div>

			<div class="form-row">
				<label for="sujet"><?php echo esc_html( asteria_t( 'contact.sujet' ) ); ?> *</label>
				<input type="text" id="sujet" name="sujet" required />
			</div>

			<div class="form-row">
				<label for="message"><?php echo esc_html( asteria_t( 'contact.message' ) ); ?> *</label>
				<textarea id="message" name="message" rows="6" required></textarea>
			</div>

			<button type="submit" class="btn btn--cta"><?php echo esc_html( asteria_t( 'contact.envoyer' ) ); ?></button>
		</form>
	</div>

	<aside class="contact__sidebar">
		<p><?php echo esc_html( asteria_t( 'contact.ou_contacter' ) ); ?></p>
		<a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
		<a class="btn btn--outline" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
		<p class="contact__hours"><?php echo esc_html( $horaires ); ?></p>
	</aside>
</section>

<?php get_footer(); ?>
