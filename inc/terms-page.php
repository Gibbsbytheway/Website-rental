<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Incrémenter pour réécrire le contenu de la page lors du prochain déploiement.
define( 'ASTERIA_TERMS_PAGE_VERSION', '2026-11-08' );

function asteria_terms_page_content() {
	return <<<'HTML'
<p><em>Dernière mise à jour : 8 novembre 2026</em></p>
<h2>1. Objet</h2>
<p>Les présentes conditions d'utilisation encadrent l'utilisation du site asteria-pulsar.fr, la réservation directe des logements Pulsar Rentals présentés sur ce site, ainsi que les contenus publiés par Pulsar Rentals sur les réseaux sociaux. En utilisant le site ou en réservant un logement, vous acceptez ces conditions.</p>
<h2>2. Éditeur du site et exploitants des logements</h2>
<p>Pulsar Rentals est le nom commercial sous lequel sont proposés les logements présentés sur ce site.</p>
<ul>
<li><strong>Éditeur du site</strong> : Guillaume Boissard, entrepreneur individuel – SIREN 938 578 119</li>
<li><strong>QuietStay 20' Paris – Massy</strong> : exploité par Guillaume Boissard, entrepreneur individuel – SIREN 938 578 119</li>
<li><strong>Villa Asteria – Thouars</strong> : exploitée par la SCI KGBY-IMMO – SIREN 918 206 772</li>
</ul>
<p>Contact : contact@asteria-pulsar.fr – +33 7 59 95 90 77</p>
<p>Hébergement du site : Hostinger.</p>
<h2>3. Utilisation du site</h2>
<p>Le site présente les logements et permet de les réserver en direct ou de nous contacter. Il est destiné à un usage personnel. Il est interdit de porter atteinte à son fonctionnement, d'en extraire le contenu de manière automatisée ou d'utiliser le formulaire de contact pour envoyer des contenus illicites ou non sollicités.</p>
<h2>4. Réservation directe</h2>
<ul>
<li>La réservation en ligne s'effectue via notre module de réservation (outil SuperHote). Le contrat de location est conclu avec l'exploitant du logement concerné.</li>
<li>Le prix, les conditions d'annulation, le montant du dépôt de garantie et le règlement intérieur sont indiqués au moment de la réservation et confirmés par e-mail : ce sont eux qui font foi.</li>
<li>Le paiement est traité de façon sécurisée par un prestataire de paiement ; nous ne conservons aucune donnée de carte bancaire.</li>
<li>Un dépôt de garantie est demandé avant l'arrivée. Les informations d'accès au logement sont envoyées la veille de l'arrivée, une fois le dépôt de garantie réglé.</li>
<li>Arrivée à partir de 16 h. Départ au plus tard à 11 h à Massy et à 10 h à la Villa Asteria. Une arrivée anticipée ou un départ tardif peuvent être demandés jusqu'à la veille de l'arrivée, sous réserve de notre accord.</li>
<li>Le nombre de voyageurs indiqué lors de la réservation ne peut pas être dépassé. Les voyageurs s'engagent à respecter le logement, ses équipements et le voisinage ; les dommages éventuels peuvent être retenus sur le dépôt de garantie.</li>
<li>Conformément à la réglementation, les voyageurs de nationalité étrangère peuvent être invités à remplir une fiche individuelle de police.</li>
</ul>
<p>Les réservations effectuées via Airbnb, Booking.com ou une autre plateforme sont régies par les conditions de la plateforme concernée.</p>
<h2>5. Contenus et propriété intellectuelle</h2>
<p>Les textes, photos, vidéos, le logo et la marque Pulsar Rentals sont protégés. Toute reproduction ou réutilisation sans notre accord écrit est interdite.</p>
<p>Certaines photos sont retouchées à l'aide d'un outil d'intelligence artificielle (lumière, couleurs, netteté) ; elles portent alors la mention « Enhanced by AI ». Elles représentent les logements réels, sans ajout ni suppression d'éléments. La description du logement et les informations confirmées lors de la réservation font foi.</p>
<h2>6. Réseaux sociaux et applications connectées</h2>
<p>Pulsar Rentals publie ses propres photos et vidéos sur Facebook, Instagram, Threads, YouTube et TikTok à l'aide d'une application interne, gérée par Guillaume Boissard. Cette application est connectée uniquement aux comptes de Pulsar Rentals, sert uniquement à y publier des contenus et n'accède à aucun compte ni à aucune donnée d'autres utilisateurs.</p>
<p>L'utilisation de ces plateformes, y compris les commentaires et messages que vous y laissez, est soumise à leurs propres conditions, notamment les <a href="https://www.tiktok.com/legal/terms-of-service" target="_blank" rel="noopener noreferrer">conditions d'utilisation de TikTok</a> et les <a href="https://www.youtube.com/t/terms" target="_blank" rel="noopener noreferrer">conditions d'utilisation de YouTube</a>.</p>
<h2>7. Responsabilité</h2>
<p>Nous apportons le plus grand soin aux informations publiées, qui peuvent toutefois évoluer. Nous ne pouvons garantir un accès au site sans interruption. Les liens vers des sites tiers sont fournis à titre d'information ; nous ne sommes pas responsables de leur contenu.</p>
<h2>8. Données personnelles</h2>
<p>Le traitement de vos données personnelles est décrit dans notre <a href="/confidentialite/">politique de confidentialité</a>.</p>
<h2>9. Modification des conditions</h2>
<p>Ces conditions peuvent être mises à jour. La version applicable est celle publiée sur cette page à la date de votre utilisation du site ou de votre réservation.</p>
<h2>10. Droit applicable et litiges</h2>
<p>Ces conditions sont soumises au droit français. En cas de difficulté, écrivez-nous d'abord à contact@asteria-pulsar.fr afin de rechercher une solution amiable.</p>
HTML;
}

/**
 * Traductions de la page. Les langues sans traduction dédiée affichent la version anglaise.
 */
function asteria_terms_translations() {
	$en = <<<'HTML'
<p><em>Last updated: 8 November 2026</em></p>
<h2>1. Purpose</h2>
<p>These terms of use govern the use of the asteria-pulsar.fr website, the direct booking of the Pulsar Rentals properties presented on it, and the content published by Pulsar Rentals on social media. By using the website or booking a property, you accept these terms.</p>
<h2>2. Website publisher and property operators</h2>
<p>Pulsar Rentals is the trade name under which the properties presented on this website are offered.</p>
<ul>
<li><strong>Website publisher</strong>: Guillaume Boissard, sole trader – SIREN 938 578 119</li>
<li><strong>QuietStay 20' Paris – Massy</strong>: operated by Guillaume Boissard, sole trader – SIREN 938 578 119</li>
<li><strong>Villa Asteria – Thouars</strong>: operated by SCI KGBY-IMMO – SIREN 918 206 772</li>
</ul>
<p>Contact: contact@asteria-pulsar.fr – +33 7 59 95 90 77</p>
<p>Website hosting: Hostinger.</p>
<h2>3. Use of the website</h2>
<p>The website presents our properties and lets you book them directly or contact us. It is intended for personal use. You must not interfere with its operation, extract its content by automated means, or use the contact form to send unlawful or unsolicited content.</p>
<h2>4. Direct booking</h2>
<ul>
<li>Online bookings are made through our booking module (SuperHote). The rental contract is concluded with the operator of the property concerned.</li>
<li>The price, cancellation terms, security deposit amount and house rules are shown at the time of booking and confirmed by email: these are the binding terms.</li>
<li>Payment is processed securely by a payment provider; we never store card details.</li>
<li>A security deposit is required before arrival. Access details are sent the day before arrival, once the deposit has been paid.</li>
<li>Check-in from 4 pm. Check-out by 11 am in Massy and by 10 am at Villa Asteria. Early check-in or late check-out can be requested up to the day before arrival, subject to our approval.</li>
<li>The number of guests stated in the booking may not be exceeded. Guests agree to respect the property, its equipment and the neighbours; any damage may be deducted from the security deposit.</li>
<li>In accordance with French regulations, guests of foreign nationality may be asked to fill in an individual police registration form.</li>
</ul>
<p>Bookings made through Airbnb, Booking.com or any other platform are governed by that platform's terms.</p>
<h2>5. Content and intellectual property</h2>
<p>The texts, photos, videos, logo and the Pulsar Rentals brand are protected. Any reproduction or reuse without our written consent is prohibited.</p>
<p>Some photos are retouched with an artificial intelligence tool (light, colours, sharpness); they are then labelled "Enhanced by AI". They show the real properties, with nothing added or removed. The property description and the information confirmed at booking are binding.</p>
<h2>6. Social media and connected applications</h2>
<p>Pulsar Rentals publishes its own photos and videos on Facebook, Instagram, Threads, YouTube and TikTok using an internal application managed by Guillaume Boissard. This application is connected only to the Pulsar Rentals accounts, is used solely to publish content on them, and does not access any other user's account or data.</p>
<p>Your use of these platforms, including any comments and messages you leave there, is subject to their own terms, in particular the <a href="https://www.tiktok.com/legal/terms-of-service" target="_blank" rel="noopener noreferrer">TikTok Terms of Service</a> and the <a href="https://www.youtube.com/t/terms" target="_blank" rel="noopener noreferrer">YouTube Terms of Service</a>.</p>
<h2>7. Liability</h2>
<p>We take great care over the information we publish, but it may change. We cannot guarantee uninterrupted access to the website. Links to third-party websites are provided for information only; we are not responsible for their content.</p>
<h2>8. Personal data</h2>
<p>How we process your personal data is described in our <a href="/confidentialite/">privacy policy</a>.</p>
<h2>9. Changes to these terms</h2>
<p>These terms may be updated. The applicable version is the one published on this page on the date you use the website or make your booking.</p>
<h2>10. Governing law and disputes</h2>
<p>These terms are governed by French law. If any issue arises, please first write to us at contact@asteria-pulsar.fr so that we can seek an amicable solution.</p>
HTML;

	return array(
		'en' => array( 'title' => 'Terms of use', 'content' => $en ),
	);
}

/**
 * Crée (ou met à jour) la page /conditions/ une fois par version du contenu.
 */
function asteria_sync_terms_page() {
	if ( get_option( 'asteria_terms_page_version' ) === ASTERIA_TERMS_PAGE_VERSION ) {
		return;
	}

	// Évite une double création si deux visites arrivent en même temps.
	if ( get_transient( 'asteria_terms_page_lock' ) ) {
		return;
	}
	set_transient( 'asteria_terms_page_lock', 1, MINUTE_IN_SECONDS );

	$postarr = array(
		'post_type'    => 'page',
		'post_title'   => "Conditions d'utilisation",
		'post_name'    => 'conditions',
		'post_content' => asteria_terms_page_content(),
		'post_status'  => 'publish',
	);

	$existing = get_page_by_path( 'conditions' );
	if ( $existing ) {
		$postarr['ID'] = $existing->ID;
	}

	// Le contenu vient du thème : on évite le filtrage kses lié à l'utilisateur courant.
	kses_remove_filters();
	$post_id = $existing ? wp_update_post( wp_slash( $postarr ), true ) : wp_insert_post( wp_slash( $postarr ), true );
	kses_init();

	if ( ! is_wp_error( $post_id ) && $post_id ) {
		update_option( 'asteria_terms_page_version', ASTERIA_TERMS_PAGE_VERSION );
	}
}
add_action( 'init', 'asteria_sync_terms_page', 20 );

/**
 * Version traduite (titre + contenu) pour la langue courante, ou null en français.
 */
function asteria_terms_translation() {
	$lang = asteria_current_lang();
	if ( 'fr' === $lang ) {
		return null;
	}
	$translations = asteria_terms_translations();
	return isset( $translations[ $lang ] ) ? $translations[ $lang ] : $translations['en'];
}

function asteria_is_terms_page_id( $post_id ) {
	$post = get_post( $post_id );
	return $post && 'page' === $post->post_type && 'conditions' === $post->post_name;
}

function asteria_terms_translate_content( $content ) {
	if ( ! is_page( 'conditions' ) || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}
	$translation = asteria_terms_translation();
	return $translation ? $translation['content'] : $content;
}
add_filter( 'the_content', 'asteria_terms_translate_content', 20 );

function asteria_terms_translate_title( $title, $post_id = 0 ) {
	if ( is_admin() || ! $post_id || ! asteria_is_terms_page_id( $post_id ) ) {
		return $title;
	}
	$translation = asteria_terms_translation();
	return $translation ? $translation['title'] : $title;
}
add_filter( 'the_title', 'asteria_terms_translate_title', 10, 2 );

function asteria_terms_translate_document_title( $parts ) {
	if ( is_page( 'conditions' ) ) {
		$translation = asteria_terms_translation();
		if ( $translation ) {
			$parts['title'] = $translation['title'];
		}
	}
	return $parts;
}
add_filter( 'document_title_parts', 'asteria_terms_translate_document_title' );
