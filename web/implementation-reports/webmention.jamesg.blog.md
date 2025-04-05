
# James' Blog Webmention Receiver

Implementation Home Page URL: https://webmention.jamesg.blog

Source Code repo URL(s) (optional): https://github.com/capjamesg/webmention-receiver
* [x] 100% open source implementation

Programming Language(s): Python

Developer(s): [James](https://jamesg.blog)

Implementation Classes (Sender and/or Receiver): Sender and Receiver


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
* [ ] [Discovery Test #21](https://webmention.rocks/test/21)
* [x] [Discovery Test #22](https://webmention.rocks/test/22)
* [x] [Discovery Test #23](https://webmention.rocks/test/23)


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [ ] [Update Test #1](https://webmention.rocks/update/1)
* [ ] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

The webmention sender and receiver does not yet have automatic support for updating Webmentions. This section will be updated when such support has been implemented.


### Delete Tests (3.1.4)

SHOULD

* [x] [Delete Test #1](https://webmention.rocks/delete/1)


### Security Considerations (4)

* [x] The sender avoids sending a Webmention to a loopback address (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: Not Applicable


## Receiving

Indicate which type of response the receiver provides:

* [ ] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [x] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [ ] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:


### Request Verification (3.2.1)

* [x] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [x] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [ ] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [x] Verification is processed asynchronously (SHOULD)
* [x] Follows at least one HTTP redirect on source URL (MUST)
* [x] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [x] HTML
* [ ] Other: None


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [x] Accepts a Webmention where the target URL is in an `<a>` tag
* [x] Accepts a Webmention where the target URL is in an `<img>` tag
* [x] Accepts a Webmention where the target URL is in an `<video>` tag
* [x] Accepts a Webmention where the target URL is in an `<audio>` tag
* [x] Rejects a Webmention where the target URL is in the document as text
* [x] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [x] Rejects a Webmention where the target URL is not in the document


### Webmention Display/Use

* [x] The receiver displays data from the source URL on the target post (MAY)

* [x] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [x] using HTML markup: in-reply-to microformats class
* [x] The receiver recognizes that the source URL is a "like" of the post
 * [x] using HTML markup: u-like-of microformats class
* [ ] The receiver recognizes that the source URL is a "repost" of the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is an "RSVP" to the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes additional response types, using markup:
   * [ ] Not applicable

Please describe any other ways the Webmention is displayed or used if applicable.


### Update Tests (3.2.4)

* [x] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [x] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [ ] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [x] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [x] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: Not Applicable
