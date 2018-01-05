<?php
/**
 * Hooks for TwitterWidget extension
 *
 * @file
 * @ingroup Extensions
 */

// TwitterWidget hooks
class TwitterWidgetHooks {
	// Initialization
	public static function onParserFirstCallInit( Parser &$parser ) {
		// Register the hook with the parser
		$parser->setHook( 'twitter', [ 'TwitterWidgetHooks', 'render' ] );

		// Continue
		return true;
	}

	// Render the twitter widget
	public static function render( $input, $args, Parser $parser ) {
		// Create TwitterWidget
		$widget = new TwitterWidget( $parser );

		// Return output
		return $widget->render( $args );
	}
}
