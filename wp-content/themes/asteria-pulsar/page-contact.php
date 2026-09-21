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
		<h1><?php esc_html_e( 'Des questions ?', 'asteria-pulsar' ); ?></h1>
		<p><?php esc_html_e( 'Discutons !', 'asteria-pulsar' ); ?></p>
	</div>
</section>

<section class="contact container">
	<div class="contact__form">
		<h2><?php esc_html_e( 'Formulaire de contact', 'asteria-pulsar' ); ?></h2>

		<?php if ( 'success' === $status ) : ?>
			<p class="notice notice--success"><?php esc_html_e( 'Votre message a bien été envoyé, merci !', 'asteria-pulsar' ); ?></p>
		<?php elseif ( 'error' === $status ) : ?>
			<p class="notice notice--error"><?php esc_html_e( 'Merci de vérifier les champs du formulaire.', 'asteria-pulsar' ); ?></p>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="asteria_contact_submit" />
			<?php wp_nonce_field( 'asteria_contact_submit', 'asteria_contact_nonce' ); ?>

			<div class="form-row form-row--split">
				<div>
					<label for="prenom"><?php esc_html_e( 'Prénom', 'asteria-pulsar' ); ?> *</label>
					<input type="text" id="prenom" name="prenom" required />
				</div>
				<div>
					<label for="nom"><?php esc_html_e( 'Nom', 'asteria-pulsar' ); ?> *</label>
					<input type="text" id="nom" name="nom" required />
				</div>
			</div>

			<div class="form-row">
				<label for="email">Email *</label>
				<input type="email" id="email" name="email" required />
			</div>

			<div class="form-row">
				<label for="sujet"><?php esc_html_e( 'Sujet', 'asteria-pulsar' ); ?> *</label>
				<input type="text" id="sujet" name="sujet" required />
			</div>

			<div class="form-row">
				<label for="message">Message *</label>
				<textarea id="message" name="message" rows="6" required></textarea>
			</div>

			<button type="submit" class="btn btn--cta"><?php esc_html_e( 'Envoyer', 'asteria-pulsar' ); ?></button>
		</form>
	</div>

	<aside class="contact__sidebar">
		<p><?php esc_html_e( 'Ou contactez-nous directement par téléphone ou email en cliquant sur les boutons ci-dessous :', 'asteria-pulsar' ); ?></p>
		<a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
		<a class="btn btn--outline" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
		<p class="contact__hours"><?php echo esc_html( $horaires ); ?></p>
	</aside>
</section>

<?php get_footer(); ?>
