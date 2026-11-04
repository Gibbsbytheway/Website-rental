( function() {
	'use strict';

	var toggle = document.getElementById( 'nav-toggle' );
	var nav = document.getElementById( 'site-nav' );

	var header = document.querySelector( '.site-header' );
	var cineHome = document.body.classList.contains( 'has-cine-hero' );

	function updateHeader() {
		if ( ! cineHome || ! header ) {
			return;
		}
		var solid = window.scrollY > 40 || ( nav && nav.classList.contains( 'is-open' ) );
		header.classList.toggle( 'is-solid', solid );
	}

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function() {
			var isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
			updateHeader();
		} );
	}

	if ( cineHome ) {
		window.addEventListener( 'scroll', updateHeader, { passive: true } );
		updateHeader();
	}

	var cine = document.getElementById( 'cine' );
	var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( cine && ! reduceMotion ) {
		var slides = cine.querySelectorAll( '.cine-slide' );
		var bars = cine.querySelectorAll( '.cine-progress span' );
		var place = document.getElementById( 'cine-place' );
		var current = 0;

		var next = function() {
			slides.forEach( function( s ) { s.classList.remove( 'was-on' ); } );
			slides[ current ].classList.remove( 'is-on' );
			slides[ current ].classList.add( 'was-on' );
			bars[ current ].classList.remove( 'is-on' );
			current = ( current + 1 ) % slides.length;
			slides[ current ].classList.add( 'is-on' );
			void bars[ current ].offsetWidth;
			bars[ current ].classList.add( 'is-on' );
			if ( place ) {
				place.textContent = slides[ current ].getAttribute( 'data-place' );
			}
		};

		if ( slides.length > 1 ) {
			setInterval( function() {
				if ( ! document.hidden ) {
					next();
				}
			}, 7000 );
		}
	}

	// Conversion Google Ads : le widget Superhôte est une iframe d'un autre domaine,
	// on détecte donc le moment où elle prend le focus (clic ou tap dans le widget).
	var bookingFrame = document.getElementById( 'booking-rental' );

	if ( bookingFrame && window.asteriaAdsConversion && typeof window.gtag === 'function' ) {
		var converted = false;
		var poll;

		var checkConversion = function() {
			if ( converted || document.activeElement !== bookingFrame ) {
				return;
			}
			converted = true;
			clearInterval( poll );
			window.gtag( 'event', 'conversion', { send_to: window.asteriaAdsConversion } );
		};

		window.addEventListener( 'blur', function() {
			setTimeout( checkConversion, 0 );
		} );
		poll = setInterval( checkConversion, 1000 );
	}

	// Conversions Google Ads (la balise AW-18078484952 est chargée dans le <head>).
	var ADS_CONVERSIONS = {
		phone: 'AW-18078484952/-S6JCL3gjbIdENiTv6xD',
		email: 'AW-18078484952/eOoeCMDgjbIdENiTv6xD',
		contact: 'AW-18078484952/PiwmCLrgjbIdENiTv6xD'
	};

	var sendAdsConversion = function( sendTo ) {
		if ( typeof window.gtag !== 'function' ) {
			return;
		}
		window.gtag( 'event', 'conversion', { send_to: sendTo, value: 1.0, currency: 'EUR' } );
	};

	// Écouteur délégué : couvre tous les liens tel:/mailto: (en-tête, pied de page,
	// fiches logements, page contact…), y compris ceux ajoutés après le chargement.
	document.addEventListener( 'click', function( e ) {
		var link = e.target && e.target.closest ? e.target.closest( 'a[href]' ) : null;
		if ( ! link ) {
			return;
		}
		var href = ( link.getAttribute( 'href' ) || '' ).trim().toLowerCase();
		if ( href.indexOf( 'tel:' ) === 0 ) {
			sendAdsConversion( ADS_CONVERSIONS.phone );
		} else if ( href.indexOf( 'mailto:' ) === 0 ) {
			sendAdsConversion( ADS_CONVERSIONS.email );
		}
	} );

	// Formulaire de contact : après un envoi réussi, le serveur redirige vers
	// /contact/?envoye=1 et affiche le message de succès marqué data-ads-conversion.
	// On déclenche la conversion puis on retire le paramètre de l'URL pour qu'un
	// rechargement ou un retour arrière ne la redéclenche pas.
	if ( document.querySelector( '[data-ads-conversion="contact"]' ) && /[?&]envoye=1(&|$)/.test( window.location.search ) ) {
		sendAdsConversion( ADS_CONVERSIONS.contact );
		if ( window.history && window.history.replaceState ) {
			var cleanSearch = window.location.search
				.replace( /([?&])envoye=1(&|$)/, function( m, before, after ) { return after ? before : ''; } )
				.replace( /^&/, '?' );
			window.history.replaceState( null, '', window.location.pathname + cleanSearch + window.location.hash );
		}
	}

	var langSwitcher = document.getElementById( 'lang-switcher' );
	var langToggle = document.getElementById( 'lang-switcher-toggle' );

	if ( langSwitcher && langToggle ) {
		langToggle.addEventListener( 'click', function( e ) {
			e.stopPropagation();
			var isOpen = langSwitcher.classList.toggle( 'is-open' );
			langToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );

		document.addEventListener( 'click', function( e ) {
			if ( ! langSwitcher.contains( e.target ) ) {
				langSwitcher.classList.remove( 'is-open' );
				langToggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}
} )();
