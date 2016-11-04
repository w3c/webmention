# WordPress

[wordpress-webmention](https://github.com/pfefferle/wordpress-webmention/) is a plugin for the popular CMS [wordPress](https://wordpress.org/)

Implementation Home Page URLs:
https://wordpress.org/plugins/webmention/
https://wordpress.org/plugins/semantic-linkbacks/

Source Code repo URL(s):
https://github.com/pfefferle/wordpress-webmention/
https://github.com/acegiak/Semantic-Linkbacks
https://github.com/pfefferle/wordpress-semantic-linkbacks

* [x] 100% open source implementation

Programming Language(s): PHP

Developer(s):
* [Matthias Pfefferle](http://notizblog.org/)
* [Ashton McAllan](https://acegiak.net/)
* [David Shanske](https://david.shanske.com/)
* [and more...](https://github.com/pfefferle/wordpress-webmention/graphs/contributors)

Implementation Classes: Sender and Receiver


## Sending

### Discovery Tests (3.1.1)

MUST

* [x] [Discovery Test #1](https://webmention.rocks/test/1)
* [x] [Discovery Test #2](https://webmention.rocks/test/2)
* [x] [Discovery Test #3](https://webmention.rocks/test/3)
* [x] [Discovery Test #4](https://webmention.rocks/test/4)
* [x] [Discovery Test #5](https://webmention.rocks/test/5)
* [x] [Discovery Test #6](https://webmention.rocks/test/6)
* [x] [Discovery Test #7](https://webmention.rocks/test/7)
* [x] [Discovery Test #8](https://webmention.rocks/test/8)
* [x] [Discovery Test #9](https://webmention.rocks/test/9)
* [x] [Discovery Test #10](https://webmention.rocks/test/10)
* [x] [Discovery Test #11](https://webmention.rocks/test/11)
* [x] [Discovery Test #12](https://webmention.rocks/test/12)
* [x] [Discovery Test #13](https://webmention.rocks/test/13)
* [x] [Discovery Test #14](https://webmention.rocks/test/14)
* [x] [Discovery Test #15](https://webmention.rocks/test/15)
* [x] [Discovery Test #16](https://webmention.rocks/test/16)
* [x] [Discovery Test #17](https://webmention.rocks/test/17)
* [x] [Discovery Test #18](https://webmention.rocks/test/18)
* [x] [Discovery Test #19](https://webmention.rocks/test/19)
* [x] [Discovery Test #20](https://webmention.rocks/test/20)
* [x] [Discovery Test #21](https://webmention.rocks/test/21)


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [x] [Update Test #1](https://webmention.rocks/update/1)
* [ ] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

Doesn't pass update test #2 yet because it doesn't send webmentions to removed links. [Tracked in issue #76.](https://github.com/pfefferle/wordpress-webmention/issues/76#issuecomment-225306427)


### Delete Tests (3.1.4)

SHOULD

* [ ] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

WordPress returns HTTP 404 for deleted posts, not 410.


### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)

Deliberate design choice to support loopback addresses to enable local development and testing.


### Extensions

This implementation has also implemented the following extensions.

* [x] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______


## Receiving

Indicate which type of response the receiver provides:

* [x] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [ ] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [ ] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:

Plain text permalink URL of the newly created comment on the target page.


### Request Verification (3.2.1)

* [x] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [x] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [x] Ignores fragment when checking if target is supported (SHOULD)


### Webmention Verification (3.2.2)

* [ ] Verification is processed asynchronously (SHOULD)
* [x] Follows at least one HTTP redirect on source URL (MUST)
* [x] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

Limits to 5 redirects. Returns 400 if that limit is exceeded.


#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [x] HTML
* [x] Other: text/*, application/json, etc.


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [x] Accepts a Webmention where the target URL is in an `<a>` tag
* [x] Accepts a Webmention where the target URL is in an `<img>` tag
* [x] Accepts a Webmention where the target URL is in an `<video>` tag
* [x] Accepts a Webmention where the target URL is in an `<audio>` tag
* [ ] Rejects a Webmention where the target URL is in the document as text
* [ ] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [x] Rejects a Webmention where the target URL is not in the document


### Webmention Display/Use

* [x] The receiver displays data from the source URL on the target post (MAY)

* [x] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [x] using HTML classes: `u-reply`, `u-in-reply-to`, `u-reply-of`
* [x] The receiver recognizes that the source URL is a "like" of the post
 * [x] using HTML class: `u-like`, `u-like-of`
* [x] The receiver recognizes that the source URL is a "repost" of the post
 * [x] using HTML class: `u-repost`, `u-repost-of`
* [x] The receiver recognizes that the source URL is an "RSVP" to the post
 * [x] using HTML class: `p-rsvp`
* [x] The receiver recognizes additional response types, using class:
 * [x] Response: favorite using HTML class: `u-favorite`, `u-favorite-of`
 * [x] Response: bookmark using HTML class: `u-bookmark`, `u-bookmark-of`
 * [x] Response: tag using HTML class: `u-tag-of`

Please describe any other ways the Webmention is displayed or used if applicable.


### Update Tests (3.2.4)

* [x] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [x] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [x] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [x] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [x] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [x] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [x] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______
