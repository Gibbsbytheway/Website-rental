<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_handle_contact_submission() {
	if ( ! isset( $_POST['asteria_contact_nonce'] ) || ! wp_verify_nonce( $_POST['asteria_contact_nonce'], 'asteria_contact_submit' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
		exit;
	}

	$prenom  = isset( $_POST['prenom'] ) ? sanitize_text_field( wp_unslash( $_POST['prenom'] ) ) : '';
	$nom     = isset( $_POST['nom'] ) ? sanitize_text_field( wp_unslash( $_POST['nom'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$sujet   = isset( $_POST['sujet'] ) ? sanitize_text_field( wp_unslash( $_POST['sujet'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $prenom ) || empty( $nom ) || ! is_email( $email ) || empty( $message ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
		exit;
	}

	$to      = get_theme_mod( 'asteria_contact_email', get_option( 'admin_email' ) );
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

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ) );
	exit;
}
add_action( 'admin_post_asteria_contact_submit', 'asteria_handle_contact_submission' );
add_action( 'admin_post_nopriv_asteria_contact_submit', 'asteria_handle_contact_submission' );
