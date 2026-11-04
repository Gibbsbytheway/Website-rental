<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URL de retour vers la page de contact, nettoyée des paramètres d'état
 * (pour qu'une erreur ne réutilise jamais un ancien « envoye=1 »).
 * On garde le référent quand il existe afin de conserver la langue (?lang=xx).
 */
function asteria_contact_return_url() {
	$url = wp_get_referer();
	if ( ! $url ) {
		$url = home_url( '/contact/' );
	}
	return remove_query_arg( array( 'contact', 'envoye' ), $url );
}

function asteria_contact_redirect_error() {
	wp_safe_redirect( add_query_arg( 'contact', 'error', asteria_contact_return_url() ) );
	exit;
}

function asteria_handle_contact_submission() {
	if ( ! isset( $_POST['asteria_contact_nonce'] ) || ! wp_verify_nonce( $_POST['asteria_contact_nonce'], 'asteria_contact_submit' ) ) {
		asteria_contact_redirect_error();
	}

	$prenom  = isset( $_POST['prenom'] ) ? sanitize_text_field( wp_unslash( $_POST['prenom'] ) ) : '';
	$nom     = isset( $_POST['nom'] ) ? sanitize_text_field( wp_unslash( $_POST['nom'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$sujet   = isset( $_POST['sujet'] ) ? sanitize_text_field( wp_unslash( $_POST['sujet'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $prenom ) || empty( $nom ) || ! is_email( $email ) || empty( $message ) ) {
		asteria_contact_redirect_error();
	}

	$to      = get_theme_mod( 'asteria_contact_email', 'contact@asteria-pulsar.fr' );
	$subject = sprintf( '[Contact site] %s', $sujet ? $sujet : 'Nouvelle demande' );
	$body    = sprintf(
		"Nouveau message depuis le site :\n\nNom : %s %s\nEmail : %s\nSujet : %s\n\nMessage :\n%s",
		$prenom,
		$nom,
		$email,
		$sujet,
		$message
	);
	$headers = array( 'Reply-To: ' . $email );

	if ( ! wp_mail( $to, $subject, $body, $headers ) ) {
		asteria_contact_redirect_error();
	}

	// Envoi réussi uniquement : la page de contact déclenche la conversion Google Ads.
	wp_safe_redirect( add_query_arg( 'envoye', '1', asteria_contact_return_url() ) );
	exit;
}
add_action( 'admin_post_asteria_contact_submit', 'asteria_handle_contact_submission' );
add_action( 'admin_post_nopriv_asteria_contact_submit', 'asteria_handle_contact_submission' );
