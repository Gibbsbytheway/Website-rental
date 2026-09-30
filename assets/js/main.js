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
