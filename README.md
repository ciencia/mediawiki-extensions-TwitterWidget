# mediawiki-extensions-TwitterWidget
Adds a tag to embed a Twitter widget

To install, add this to LocalSettings.php:

```lang=php
wfLoadExtension( 'TwitterWidget' );
```

You can use this to place a Twitter widget on a page:

```lang=xml
<twitter widget-id="319888252335169536" />
```

The widget ID is created in the Twitter web page.

You can add an `account` parameter, so the initial link points to your account
on Twitter, in case the JavaScript fails to load.
