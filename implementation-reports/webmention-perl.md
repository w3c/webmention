# Web::Mention

Implementation Home Page URL: https://metacpan.org/pod/Web::Mention

Source Code repo URL(s) (optional): 
* [x] 100% open source implementation

Programming Language(s): Perl 5

Developer(s): [Jason McIntosh](http://jmac.org)

Implementation Classes (Sender and/or Receiver): 


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

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [x] [Update Test #1](https://webmention.rocks/update/1)
* [x] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Delete Tests (3.1.4)

SHOULD

* [x] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Security Considerations (4)

* [x] The sender avoids sending a Webmention to a loopback address (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______


## Receiving

**Note:** The responses to this section describe the actions that this library _enables_ through its object methods, versus any proactive performance of them. It is up to applications making use of this library to invoke these methods appropriately.

All fetaures below that this library leaves to the application layer to handle are marked "na".

* [na] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [na] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [na] HTTP 202 - Receiver processes the Webmention asynchronously

### Request Verification (3.2.1)

* [x] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)

**Note:** This library does verify that source and target are valid URLs and sets an internal, API-accessible boolean with the result. It's up to the library's user to transform this into an HTTP 400 response, per se.

* [ ] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [x] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [x] Verification is processed asynchronously (SHOULD)
* [x] Follows at least one HTTP redirect on source URL (MUST)
* [x] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

* [x] HTML
* [x] Other: _This library does not restrict by content-type at present._


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
 * [na] using HTML markup: __________
* [x] The receiver recognizes that the source URL is a "like" of the post
 * [na] using HTML markup: __________
* [x] The receiver recognizes that the source URL is a "repost" of the post
 * [na] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is an "RSVP" to the post
 * [na] using HTML markup: __________
* [ ] The receiver recognizes additional response types, using markup:
 * [na] Response: __________ using HTML markup: __________


Please describe any other ways the Webmention is displayed or used if applicable.


### Update Tests (3.2.4)


* [na] Does not display an update Webmention as a new response (SHOULD)
* [na] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [na] Updates and stores the information from the primary object at the source URL (MUST)
* [na] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [na] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [na] Webmentions are moderated before being displayed (MAY)
* [na] Webmentions are periodically re-verified (MAY)
* [x] The receiver ensures any displayed data it properly encoded/filtered to prevent [x]SS attacks (MUST)
* [x] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______
