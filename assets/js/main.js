( function() {
	'use strict';

	var toggle = document.getElementById( 'nav-toggle' );
	var nav = document.getElementById( 'site-nav' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function() {
			var isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );
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
