# Webmention Implementations

* [Implementation Report Summary](https://webmention.net/implementation-reports/summary/)
* [Implementation Reports](https://webmention.net/implementation-reports/)

## Libraries

### Sending

* [indieweb/mention-client-php](https://github.com/indieweb/mention-client-php) - *PHP* library for sending webmention and pingpack notifications
* [indieweb/webmention-client-ruby](https://github.com/indieweb/webmention-client-ruby) - *Ruby* library for sending webmention notifications
* [phpish/webmention](https://github.com/phpish/webmention) - Simple Webmention client (non-OO) in *PHP* packaged as a composer package
* [vrypan/webmention-tools](https://github.com/vrypan/webmention-tools) - *Python* client library and command line webmention sender
* [pear2/Services_Linkback](https://github.com/pear2/Services_Linkback) - *PHP* Pingback and Webmention client + server library
* [bear/ronkyuu](https://github.com/bear/ronkyuu) - *Python* client library and command-line tools
* [glennjones/webmentions](https://github.com/glennjones/webmentions) - *Node.js* a helper library for endpoint discovery, pulling validating Webmentions and sending Webmention requests
* [willnorris.com/go/webmention](https://willnorris.com/go/webmention) - *Go* client library and command-line tool for discovering and sending Webmentions.
* [webmentions-elixir](https://github.com/ckruse/webmentions-elixir) - *Elixir* client library for sending Webmentions
* [Pushl](https://github.com/PlaidWeb/Pushl) - Command line client in *Python* for automating site-wide webmentions using a subscription feed (RSS/Atom/`h-feed`) for discovery

### Endpoint Discovery
* [link_rel_parser](https://github.com/indieweb/link-rel-parser-php/blob/master/src/IndieWeb/link_rel_parser.php) - *PHP* `http_rels($h)` &amp; `head_http_rels($url)` - HTTP header string parser for RFC5988 Link: rels (including `X-Pingback`) &amp; function to curl a HEAD request and parse it all in one.
* [jgarber623/webmention-endpoint-ruby](https://github.com/jgarber623/webmention-endpoint-ruby) - *Ruby* client library for discovering Webmention endpoints
* [phpish/link_header](https://github.com/phpish/link_header) - *PHP* Link header (RFC 5988) parser
* [PEAR: HTTP2](http://pear.php.net/package/HTTP2) - *PHP* Link header (RFC 5988) parser ([documentation](http://pear.php.net/manual/en/package.http.http2.parselinks.php))
* [ronkyuu](http://indiewebcamp.com/ronkyuu) - *Python* client library and command-line tools

### Receiving
* PHP Minimum Viable Webmention handler: [https://gist.github.com/adactio/6484118](https://gist.github.com/adactio/6484118)
* [pear2/Services_Linkback](https://github.com/pear2/Services_Linkback) - *PHP* Pingback and Webmention client + server library

### Parsing
* [microformats2 implementations and parsers](http://microformats.org/wiki/microformats2#Implementations)
* [went](https://github.com/fiatjaf/went) - Webmention Endpoint Tools, a *Python* library that takes `source` and `target` URLs and does the rest of the job for you.

## Publishing Software

Some open source publishing software supports Webmention.

* [Known](http://withknown.com) personal publishing software sends webmentions and accepts webmention comments (including webmention updates), and likes
* [FrancisCMS](https://github.com/FrancisCMS) personal publishing software similarly sends and receives
* [WWWTech](https://indiewebcamp.com/WWWTech) personal publishing software similarly sends and receives
* [phorkie](https://sourceforge.net/projects/phorkie/) sends and accepts webmentions to notify remote instances about forks

Some additional publishing software, portions of which are open source, supports webmentions:

* [p3k](https://p3k.io) sends and receives webmentions for all posts
* [Taproot](https://indiewebcamp.com/Taproot)

### Plugins

Plugins exist for some open source publishing software

* [Wordpress](https://wordpress.org/plugins/webmention/)
* [Drupal](https://www.drupal.org/project/vinculum)
* [Elgg](https://github.com/mapkyca/elgg-webmention)
* [Nucleus CMS](https://github.com/gRegorLove/nucleus-plugin-webmention)
* [Craft CMS](https://github.com/jgarber623/craft-webmention-client)
* [Kirby](https://github.com/bastianallgeier/kirby-webmentions)
* [ProcessWire](http://modules.processwire.com/modules/webmention/)

## Tools

* [Webmention Rocks!](https://webmention.rocks/) is a Webmention validator which helps you debug your webmention sending. It will provide detailed error messages to help you successfully send a Webmention, and will show your comment on the website when it's successfully processed.
* [node-webmention-testpinger](https://github.com/voxpelli/node-webmention-testpinger) is a tool to ping your site with a variety of Webmention markup. Contains copies of a couple of real world examples of mentions that it enables you to ping locally to a development copy of your site.
* [node-webmention-testendpoint](https://github.com/pfefferle/node-webmention-testendpoint) is tool to test your Webmention client. Generates a demo-post and a demo-endpoint to test if your client parses the webmention-endpoint correctly and to check if the ping body is transmitted correctly.
* [stapibas](http://indiewebcamp.com/stapibas) is a self-hosted service to send and receive Webmentions for websites and blogs. It can be used to send out Webmentions and Pingbacks for new posts on static sites.
* A [Firefox Add-On](https://addons.mozilla.org/fr/firefox/addon/webmention/) which allows you to send Webmentions via a context menu

## Services

* [brid.gy](http://brid.gy/) is a service that sends Webmentions for comments/replies, likes, and reposts on Facebook, Twitter, Google+, and Instagram posts. It uses [original post discovery](http://indiewebcamp.com/original_post_discovery) to find target links for the Webmentions. [GitHub repo here.](https://github.com/snarfed/bridgy)
* [Checkmention](https://checkmention.appspot.com/) lets you test your Webmention implementation on your indieweb site, and whether it robustly detects certain types of XSS attacks. It also allows you to test for [authorship spoofing](http://indiewebcamp.com/authorship#Spoofing).
* [mention-tech](http://mention-tech.appspot.com/) is a service that can receive Webmentions on behalf of anyone via both Webmention directly, and a web form on its home page.
* [webmention.herokuapp.com](https://webmention.herokuapp.com/) receives Webmentions for any registered page and allows them to be embedded through javascript.
* [webmention.io](https://webmention.io) is an open-source project and hosted service for receiving Webmentions and Pingbacks on behalf of your IndieWeb site.
* [Telegraph](https://telegraph.p3k.io) is an open-source project and hosted service for sending Webmentions and Pingbacks.
