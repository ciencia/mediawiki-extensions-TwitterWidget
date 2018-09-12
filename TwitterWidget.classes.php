<?php
/**
 * Class for TwitterWidget extension
 *
 * @file
 * @ingroup Extensions
 */

// TwitterWidget class
class TwitterWidget {

	const REGEX_TWITTER_ACCOUNT_NAME = '/^@?[a-zA-Z0-9_]{1,15}$/';

	/* Fields */

	private $mParser;
	private $mAnchorAttributes = [];

	private $mAllowedTags = [ 'lang', 'show-replies', 'chrome', 'theme', 'width', 'height', 'tweet-limit', 'link-color', 'border-color', 'aria-polite', 'dnt' ];

	/* Functions */

	public function __construct( $parser ) {
		$this->mParser = $parser;
	}

	public function render( $args ) {
		$errors = $this->extractOptions( $args );
		if ( $errors ) {
			return $errors;
		}
		$this->mParser->getOutput()->addModules( 'ext.twitterwidget' );
		$htmlOut = Xml::openElement( 'div', [
			'class' => 'widget-twitter'
		] );
		$htmlOut .= Xml::element( 'a', array_merge(
			[ 'class' => 'twitter-timeline' ],
			$this->mAnchorAttributes
		), 'Twitter', false );
		$htmlOut .= Xml::closeElement( 'div' );
		return $htmlOut;
	}

	/**
	 * Extract options from the twitter tag
	 *
	 * @param array $args Attributes passed to the tag
	 * @returns string|null HTML errors, or null if there are no invalid parameters
	 */
	private function extractOptions( array $args ) {
		if ( !isset( $args[ 'account' ] ) ) {
			return Xml::tags( 'div', null,
				Xml::element( 'strong',
					[ 'class' => 'error' ],
					wfMessage( 'twitterwidget-error-no-account' )->text()
				)
			);
		}
		if ( !preg_match( self::REGEX_TWITTER_ACCOUNT_NAME, $args[ 'account' ] ) ) {
			return Xml::tags( 'div', null,
				Xml::element( 'strong',
					[ 'class' => 'error' ],
					wfMessage( 'twitterwidget-error-format-account' )->text()
				)
			);
		}
		$account = substr( $args[ 'account' ], 0, 1 ) == '@' ? substr( $args[ 'account' ], 1 ) : $args[ 'account' ];
		$this->mAnchorAttributes['href'] = "https://twitter.com/${account}?ref_src=twsrc%5Etfw";
		foreach ( $args as $paramName => $paramValue ) {
			if ( in_array( $paramName, $this->mAllowedTags ) ) {
				$this->mAnchorAttributes["data-$paramName"] = $paramValue;
			}
		}
	}
}
