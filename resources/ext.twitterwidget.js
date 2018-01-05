( function ( $, mw ) {
	'use strict';
	mw.hook( 'wikipage.content' ).add( function( $content ) {
		var protocol = /^http:/.test(document.location) ? 'http' : 'https';
		$.getScript( protocol + '://platform.twitter.com/widgets.js' );
	} );
}( jQuery, mediaWiki ) );
