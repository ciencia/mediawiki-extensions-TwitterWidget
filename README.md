# mediawiki-extensions-TwitterWidget
Adds a tag to embed a Twitter timeline widget

To install, add this to LocalSettings.php:

```lang=php
wfLoadExtension( 'TwitterWidget' );
```

You can use this to place a Twitter widget on a page:

```lang=xml
<twitter account="TwitterDev" />
```

The `account` parameter is mandatory, which should be the Twitter account name you want to display.

Other recognized parameters:

lang, show-replies, chrome, theme, width, height, tweet-limit, link-color, border-color, aria-polite, dnt

More information: https://developer.twitter.com/en/docs/twitter-for-websites/timelines/guides/parameter-reference
