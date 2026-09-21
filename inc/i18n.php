<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_supported_languages() {
	return array(
		'fr' => 'Français',
		'en' => 'English',
		'it' => 'Italiano',
		'es' => 'Español',
		'pt' => 'Português',
		'de' => 'Deutsch',
	);
}

function asteria_detect_browser_language() {
	if ( empty( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
		return 'fr';
	}
	$supported = array_keys( asteria_supported_languages() );
	foreach ( explode( ',', sanitize_text_field( wp_unslash( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) ) as $part ) {
		$code = strtolower( substr( trim( explode( ';', $part )[0] ), 0, 2 ) );
		if ( in_array( $code, $supported, true ) ) {
			return $code;
		}
	}
	return 'fr';
}

function asteria_init_language() {
	$supported = array_keys( asteria_supported_languages() );

	if ( isset( $_GET['lang'] ) && in_array( $_GET['lang'], $supported, true ) ) {
		$lang = sanitize_key( $_GET['lang'] );
		setcookie( 'asteria_lang', $lang, time() + YEAR_IN_SECONDS, '/' );
	} elseif ( isset( $_COOKIE['asteria_lang'] ) && in_array( $_COOKIE['asteria_lang'], $supported, true ) ) {
		$lang = sanitize_key( $_COOKIE['asteria_lang'] );
	} else {
		$lang = asteria_detect_browser_language();
		setcookie( 'asteria_lang', $lang, time() + YEAR_IN_SECONDS, '/' );
	}

	$GLOBALS['asteria_lang'] = $lang;
}
add_action( 'init', 'asteria_init_language' );

function asteria_current_lang() {
	return isset( $GLOBALS['asteria_lang'] ) ? $GLOBALS['asteria_lang'] : 'fr';
}

function asteria_lang_url( $lang ) {
	return esc_url( add_query_arg( 'lang', $lang ) );
}

function asteria_html_lang_attribute( $output ) {
	$locales = array(
		'fr' => 'fr-FR',
		'en' => 'en-US',
		'it' => 'it-IT',
		'es' => 'es-ES',
		'pt' => 'pt-PT',
		'de' => 'de-DE',
	);
	$locale_attr = isset( $locales[ asteria_current_lang() ] ) ? $locales[ asteria_current_lang() ] : 'fr-FR';
	return preg_replace( '/lang="[^"]*"/', 'lang="' . esc_attr( $locale_attr ) . '"', $output );
}
add_filter( 'language_attributes', 'asteria_html_lang_attribute' );

function asteria_translations() {
	return array(
		'nav.logements'       => array(
			'fr' => 'Nos logements', 'en' => 'Our properties', 'it' => 'I nostri alloggi',
			'es' => 'Nuestros alojamientos', 'pt' => 'Nossos alojamentos', 'de' => 'Unsere Unterkünfte',
		),
		'nav.a_propos'        => array(
			'fr' => 'À propos', 'en' => 'About', 'it' => 'Chi siamo',
			'es' => 'Sobre nosotros', 'pt' => 'Sobre nós', 'de' => 'Über uns',
		),
		'nav.contact'         => array(
			'fr' => 'Contact', 'en' => 'Contact', 'it' => 'Contatto',
			'es' => 'Contacto', 'pt' => 'Contato', 'de' => 'Kontakt',
		),
		'nav.reserver'        => array(
			'fr' => 'Réserver', 'en' => 'Book now', 'it' => 'Prenota',
			'es' => 'Reservar', 'pt' => 'Reservar', 'de' => 'Buchen',
		),
		'nav.ouvrir_menu'     => array(
			'fr' => 'Ouvrir le menu', 'en' => 'Open menu', 'it' => 'Apri il menu',
			'es' => 'Abrir el menú', 'pt' => 'Abrir o menu', 'de' => 'Menü öffnen',
		),
		'hero.tagline'        => array(
			'fr' => "Vous êtes à 2 clics d'une expérience extraordinaire",
			'en' => "You're 2 clicks away from an extraordinary stay",
			'it' => 'Sei a 2 clic da un soggiorno straordinario',
			'es' => 'Estás a 2 clics de una experiencia extraordinaria',
			'pt' => 'Você está a 2 cliques de uma experiência extraordinária',
			'de' => 'Nur 2 Klicks von einem außergewöhnlichen Aufenthalt entfernt',
		),
		'logements.titre'     => array(
			'fr' => 'Nos logements', 'en' => 'Our properties', 'it' => 'I nostri alloggi',
			'es' => 'Nuestros alojamientos', 'pt' => 'Nossos alojamentos', 'de' => 'Unsere Unterkünfte',
		),
		'card.specs'          => array(
			'fr' => '%1$s chambres · %2$s lits · %3$s voyageurs',
			'en' => '%1$s bedrooms · %2$s beds · %3$s guests',
			'it' => '%1$s camere · %2$s letti · %3$s ospiti',
			'es' => '%1$s habitaciones · %2$s camas · %3$s huéspedes',
			'pt' => '%1$s quartos · %2$s camas · %3$s hóspedes',
			'de' => '%1$s Schlafzimmer · %2$s Betten · %3$s Gäste',
		),
		'card.a_partir_de'    => array(
			'fr' => 'À partir de', 'en' => 'From', 'it' => 'A partire da',
			'es' => 'Desde', 'pt' => 'A partir de', 'de' => 'Ab',
		),
		'retour.au_site'      => array(
			'fr' => 'Retour au site', 'en' => 'Back to site', 'it' => 'Torna al sito',
			'es' => 'Volver al sitio', 'pt' => 'Voltar ao site', 'de' => 'Zurück zur Website',
		),
		'contact.titre'       => array(
			'fr' => 'Des questions ?', 'en' => 'Any questions?', 'it' => 'Domande?',
			'es' => '¿Tienes preguntas?', 'pt' => 'Alguma dúvida?', 'de' => 'Fragen?',
		),
		'contact.sous_titre'  => array(
			'fr' => 'Discutons !', 'en' => "Let's talk!", 'it' => 'Parliamone!',
			'es' => '¡Hablemos!', 'pt' => 'Vamos conversar!', 'de' => 'Lass uns reden!',
		),
		'contact.formulaire'  => array(
			'fr' => 'Formulaire de contact', 'en' => 'Contact form', 'it' => 'Modulo di contatto',
			'es' => 'Formulario de contacto', 'pt' => 'Formulário de contato', 'de' => 'Kontaktformular',
		),
		'contact.succes'      => array(
			'fr' => 'Votre message a bien été envoyé, merci !',
			'en' => 'Your message has been sent, thank you!',
			'it' => 'Il tuo messaggio è stato inviato, grazie!',
			'es' => '¡Tu mensaje ha sido enviado, gracias!',
			'pt' => 'Sua mensagem foi enviada, obrigado!',
			'de' => 'Ihre Nachricht wurde gesendet, vielen Dank!',
		),
		'contact.erreur'      => array(
			'fr' => 'Merci de vérifier les champs du formulaire.',
			'en' => 'Please check the form fields.',
			'it' => 'Controlla i campi del modulo.',
			'es' => 'Por favor, revisa los campos del formulario.',
			'pt' => 'Por favor, verifique os campos do formulário.',
			'de' => 'Bitte überprüfen Sie die Formularfelder.',
		),
		'contact.prenom'      => array(
			'fr' => 'Prénom', 'en' => 'First name', 'it' => 'Nome',
			'es' => 'Nombre', 'pt' => 'Nome', 'de' => 'Vorname',
		),
		'contact.nom'         => array(
			'fr' => 'Nom', 'en' => 'Last name', 'it' => 'Cognome',
			'es' => 'Apellido', 'pt' => 'Sobrenome', 'de' => 'Nachname',
		),
		'contact.email'       => array(
			'fr' => 'Email', 'en' => 'Email', 'it' => 'Email',
			'es' => 'Correo electrónico', 'pt' => 'E-mail', 'de' => 'E-Mail',
		),
		'contact.sujet'       => array(
			'fr' => 'Sujet', 'en' => 'Subject', 'it' => 'Oggetto',
			'es' => 'Asunto', 'pt' => 'Assunto', 'de' => 'Betreff',
		),
		'contact.message'     => array(
			'fr' => 'Message', 'en' => 'Message', 'it' => 'Messaggio',
			'es' => 'Mensaje', 'pt' => 'Mensagem', 'de' => 'Nachricht',
		),
		'contact.envoyer'     => array(
			'fr' => 'Envoyer', 'en' => 'Send', 'it' => 'Invia',
			'es' => 'Enviar', 'pt' => 'Enviar', 'de' => 'Senden',
		),
		'contact.ou_contacter' => array(
			'fr' => 'Ou contactez-nous directement par téléphone ou email en cliquant sur les boutons ci-dessous :',
			'en' => 'Or contact us directly by phone or email using the buttons below:',
			'it' => 'Oppure contattaci direttamente per telefono o email cliccando sui pulsanti qui sotto:',
			'es' => 'O contáctanos directamente por teléfono o correo electrónico usando los botones de abajo:',
			'pt' => 'Ou contate-nos diretamente por telefone ou e-mail usando os botões abaixo:',
			'de' => 'Oder kontaktieren Sie uns direkt per Telefon oder E-Mail über die Schaltflächen unten:',
		),
		'footer.contact'      => array(
			'fr' => 'Contact', 'en' => 'Contact', 'it' => 'Contatto',
			'es' => 'Contacto', 'pt' => 'Contato', 'de' => 'Kontakt',
		),
		'footer.droits'       => array(
			'fr' => 'Tous droits réservés.', 'en' => 'All rights reserved.', 'it' => 'Tutti i diritti riservati.',
			'es' => 'Todos los derechos reservados.', 'pt' => 'Todos os direitos reservados.', 'de' => 'Alle Rechte vorbehalten.',
		),
		'about.titre'         => array(
			'fr' => 'À propos', 'en' => 'About', 'it' => 'Chi siamo',
			'es' => 'Sobre nosotros', 'pt' => 'Sobre nós', 'de' => 'Über uns',
		),
		'about.contenu'       => array(
			'fr' => "Profitez d'un séjour alliant confort et praticité dans nos locations courte durée, idéalement situées et entièrement équipées, pour vous sentir comme chez vous lors de vos voyages d'affaires ou de loisirs.",
			'en' => 'Enjoy a stay combining comfort and convenience in our short-term rentals, ideally located and fully equipped, so you feel right at home on your business or leisure trips.',
			'it' => 'Goditi un soggiorno che unisce comfort e praticità nei nostri affitti brevi, in posizione ideale e completamente attrezzati, per sentirti come a casa durante i tuoi viaggi di lavoro o piacere.',
			'es' => 'Disfruta de una estancia que combina confort y comodidad en nuestros alquileres de corta duración, idealmente ubicados y totalmente equipados, para que te sientas como en casa en tus viajes de negocios o placer.',
			'pt' => 'Aproveite uma estadia que combina conforto e praticidade em nossos aluguéis de curta duração, idealmente localizados e totalmente equipados, para você se sentir em casa em suas viagens de negócios ou lazer.',
			'de' => 'Genießen Sie einen Aufenthalt, der Komfort und Praktikabilität in unseren Kurzzeitvermietungen vereint – ideal gelegen und voll ausgestattet, damit Sie sich auf Geschäfts- oder Urlaubsreisen wie zu Hause fühlen.',
		),
	);
}

function asteria_t( $key ) {
	$translations = asteria_translations();
	$lang         = asteria_current_lang();
	if ( isset( $translations[ $key ][ $lang ] ) ) {
		return $translations[ $key ][ $lang ];
	}
	return isset( $translations[ $key ]['fr'] ) ? $translations[ $key ]['fr'] : $key;
}

function asteria_translated_page_slugs() {
	return array(
		'a-propos' => 'about.titre',
		'contact'  => 'contact.titre',
	);
}

function asteria_translate_page_title( $title, $post_id = 0 ) {
	if ( ! $post_id || ! is_page( $post_id ) ) {
		return $title;
	}
	$slug = get_post_field( 'post_name', $post_id );
	$map  = asteria_translated_page_slugs();
	return isset( $map[ $slug ] ) ? asteria_t( $map[ $slug ] ) : $title;
}
add_filter( 'the_title', 'asteria_translate_page_title', 10, 2 );

function asteria_translate_about_content( $content ) {
	if ( is_page( 'a-propos' ) && in_the_loop() && is_main_query() ) {
		return '<p>' . esc_html( asteria_t( 'about.contenu' ) ) . '</p>';
	}
	return $content;
}
add_filter( 'the_content', 'asteria_translate_about_content' );
