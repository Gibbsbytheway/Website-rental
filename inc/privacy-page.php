<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Incrémenter pour réécrire le contenu de la page lors du prochain déploiement.
define( 'ASTERIA_PRIVACY_PAGE_VERSION', '2026-10-13' );

function asteria_privacy_page_content() {
	return <<<'HTML'
<p><em>Dernière mise à jour : 13 octobre 2026</em></p>
<p>Pulsar Rentals est le nom commercial sous lequel sont proposés à la location les logements présentés sur asteria-pulsar.fr. Cette politique explique comment les données personnelles sont traitées sur ce site, lors des réservations et via les comptes Pulsar Rentals sur les réseaux sociaux.</p>
<h2>Responsables du traitement</h2>
<p>Chaque logement est exploité par une entité distincte, responsable des données liées à ses réservations :</p>
<ul>
<li><strong>QuietStay 20' Paris – Massy</strong> : Guillaume Boissard, entrepreneur individuel – SIREN 938 578 119</li>
<li><strong>Villa Asteria – Thouars</strong> : SCI KGBY-IMMO, société civile immobilière – SIREN 918 206 772</li>
</ul>
<p>Le site asteria-pulsar.fr, le formulaire de contact et les comptes Pulsar Rentals sur les réseaux sociaux sont gérés par Guillaume Boissard.</p>
<p>Contact unique pour toute question ou demande : gboissard@free.fr – +33 6 60 58 56 66</p>
<h2>Données collectées</h2>
<ul>
<li><strong>Réservation</strong> : nom, prénom, e-mail, téléphone, dates de séjour, nombre de voyageurs, messages échangés, informations de paiement (traitées par le prestataire de paiement, jamais conservées par nous).</li>
<li><strong>Formulaire de contact</strong> : nom, e-mail, téléphone, contenu du message.</li>
<li><strong>Navigation</strong> : données techniques strictement nécessaires au fonctionnement du site.</li>
</ul>
<h2>Finalités et bases légales</h2>
<table><thead><tr><th>Finalité</th><th>Base légale</th></tr></thead><tbody><tr><td>Gérer les réservations, l'accueil et le séjour</td><td>Exécution du contrat</td></tr><tr><td>Répondre aux demandes de contact</td><td>Intérêt légitime</td></tr><tr><td>Respecter nos obligations comptables, fiscales et de déclaration des voyageurs</td><td>Obligation légale</td></tr><tr><td>Publier des contenus sur nos pages Facebook, Instagram, Threads, YouTube et TikTok</td><td>Intérêt légitime</td></tr></tbody></table>
<p>Les contenus publiés sur les réseaux sociaux présentent uniquement nos logements : ils ne contiennent aucune donnée personnelle de nos voyageurs.</p>
<h2>Destinataires</h2>
<p>Les données sont accessibles uniquement à l'exploitant du logement concerné et à ses prestataires techniques, dans la limite de leurs missions : outil de gestion des réservations (SuperHote), plateformes de réservation, prestataire de paiement, hébergeur du site et messagerie. Elles ne sont jamais vendues.</p>
<h2>Applications connectées (Google / YouTube, Meta, TikTok)</h2>
<p>Pour publier ses propres vidéos et photos, Pulsar Rentals utilise une application interne, gérée par Guillaume Boissard, connectée à ses comptes YouTube, Facebook, Instagram, Threads et TikTok. Cette application :</p>
<ul>
<li>n'accède qu'aux comptes de Pulsar Rentals ;</li>
<li>sert uniquement à publier des contenus sur ces comptes ;</li>
<li>ne collecte, ne stocke ni ne partage aucune donnée d'autres utilisateurs.</li>
</ul>
<p>L'utilisation des services YouTube est soumise aux <a href="https://www.youtube.com/t/terms" target="_blank" rel="noopener noreferrer">Conditions d'utilisation de YouTube</a> et à la <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Politique de confidentialité de Google</a>. L'accès peut être révoqué à tout moment depuis la page des <a href="https://myaccount.google.com/permissions" target="_blank" rel="noopener noreferrer">autorisations du compte Google</a>.</p>
<h2>Durée de conservation</h2>
<ul>
<li>Données de réservation : durée du séjour, puis 10 ans pour les pièces comptables.</li>
<li>Demandes de contact : 3 ans à compter du dernier échange.</li>
</ul>
<h2>Vos droits</h2>
<p>Vous disposez d'un droit d'accès, de rectification, d'effacement, de limitation, d'opposition et de portabilité de vos données. Pour les exercer, écrivez à gboissard@free.fr.</p>
<p>Si vous estimez que vos droits ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL (www.cnil.fr).</p>
<h2>Cookies</h2>
<p>Le site utilise des cookies strictement nécessaires à son fonctionnement, notamment pour mémoriser la langue choisie.</p>
<p>Il charge également la balise Google Ads (gtag.js), fournie par Google, qui sert à mesurer l'efficacité de nos annonces publicitaires, par exemple lorsqu'un visiteur utilise le module de réservation de la page QuietStay. Cette balise peut déposer des cookies et transmettre à Google des données de navigation. Pour en savoir plus, consultez la <a href="https://policies.google.com/technologies/ads" target="_blank" rel="noopener noreferrer">page de Google sur ses cookies publicitaires</a>.</p>
HTML;
}

/**
 * Crée (ou met à jour) la page /confidentialite/ une fois par version du contenu.
 */
function asteria_sync_privacy_page() {
	if ( get_option( 'asteria_privacy_page_version' ) === ASTERIA_PRIVACY_PAGE_VERSION ) {
		return;
	}

	// Évite une double création si deux visites arrivent en même temps.
	if ( get_transient( 'asteria_privacy_page_lock' ) ) {
		return;
	}
	set_transient( 'asteria_privacy_page_lock', 1, MINUTE_IN_SECONDS );

	$postarr = array(
		'post_type'    => 'page',
		'post_title'   => 'Politique de confidentialité',
		'post_name'    => 'confidentialite',
		'post_content' => asteria_privacy_page_content(),
		'post_status'  => 'publish',
	);

	$existing = get_page_by_path( 'confidentialite' );
	if ( $existing ) {
		$postarr['ID'] = $existing->ID;
	}

	// Le contenu vient du thème : on évite le filtrage kses lié à l'utilisateur courant.
	kses_remove_filters();
	$post_id = $existing ? wp_update_post( wp_slash( $postarr ), true ) : wp_insert_post( wp_slash( $postarr ), true );
	kses_init();

	if ( ! is_wp_error( $post_id ) && $post_id ) {
		update_option( 'asteria_privacy_page_version', ASTERIA_PRIVACY_PAGE_VERSION );
	}
}
add_action( 'init', 'asteria_sync_privacy_page', 20 );
