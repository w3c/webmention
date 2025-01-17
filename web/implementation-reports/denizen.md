# Denizen

Implementation Home Page URL: <https://denizen.dz4k.com>

Source Code repo URL(s) (optional): <https://codeberg.org/dz4k/denizen>
* [X] 100% open source implementation

Programming Language(s): TypeScript (on Deno)

Developer(s): [Deniz Akşimşek](http://deniz.aksimsek.tr)

Implementation Classes (Sender and/or Receiver): Both


## Sending

### Discovery Tests (3.1.1)

MUST

* [X] [Discovery Test #1](https://webmention.rocks/test/1)
* [X] [Discovery Test #2](https://webmention.rocks/test/2)
* [X] [Discovery Test #3](https://webmention.rocks/test/3)
* [X] [Discovery Test #4](https://webmention.rocks/test/4)
* [X] [Discovery Test #5](https://webmention.rocks/test/5)
* [X] [Discovery Test #6](https://webmention.rocks/test/6)
* [X] [Discovery Test #7](https://webmention.rocks/test/7)
* [X] [Discovery Test #8](https://webmention.rocks/test/8)
* [X] [Discovery Test #9](https://webmention.rocks/test/9)
* [X] [Discovery Test #10](https://webmention.rocks/test/10)
* [X] [Discovery Test #11](https://webmention.rocks/test/11)
* [X] [Discovery Test #12](https://webmention.rocks/test/12)
* [X] [Discovery Test #13](https://webmention.rocks/test/13)
* [X] [Discovery Test #14](https://webmention.rocks/test/14)
* [X] [Discovery Test #15](https://webmention.rocks/test/15)
* [X] [Discovery Test #16](https://webmention.rocks/test/16)
* [X] [Discovery Test #17](https://webmention.rocks/test/17)
* [X] [Discovery Test #18](https://webmention.rocks/test/18)
* [X] [Discovery Test #19](https://webmention.rocks/test/19)
* [X] [Discovery Test #20](https://webmention.rocks/test/20)
* [X] [Discovery Test #21](https://webmention.rocks/test/21)

#### Implementation Notes

The webmention implementation is contained in the [lib/webmention directory](https://codeberg.org/dz4k/denizen/src/commit/cba11b1b22116c30492217a30a0cbabeb30832cd/lib/webmention). Endpoint discovery is implemented in the [discoverWebmentionEndpoint](https://codeberg.org/dz4k/denizen/src/commit/cba11b1b22116c30492217a30a0cbabeb30832cd/lib/webmention/webmention.ts#L194) function. It uses a hand-rolled parser for the Link header, while the library [deno_dom](https://github.com/b-fuze/deno-dom) is used for discovering endpoints from HTML.

The sender does not retry sending webmentions upon a non-successful response status code.

The implementation relies on Deno Queues, which have at-least-once delivery, meaning webmentions may end up getting sent more than once. As far as I understand, this is not problematic (apart from excess resource use).


### Sending Tests (3.1.2)

MUST

* [X] Accepts HTTP 200 response as a success
* [X] Accepts HTTP 201 response as a success
* [X] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [X] [Update Test #1](https://webmention.rocks/update/1)
* [X] [Update Test #2](https://webmention.rocks/update/2)


### Delete Tests (3.1.4)

SHOULD

* [X] [Delete Test #1](https://webmention.rocks/delete/1)


### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______


## Receiving

Indicate which type of response the receiver provides:

* [ ] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [ ] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [X] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request: **Empty body**


### Request Verification (3.2.1)

* [X] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [ ] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
    + Target is verified, but asynchronously.
* [ ] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [X] Verification is processed asynchronously (SHOULD)
* [X] Follows at least one HTTP redirect on source URL (MUST)
* [X] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [X] HTML
* [ ] Other: ______


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [X] Accepts a Webmention where the target URL is in an `<a>` tag
* [ ] Accepts a Webmention where the target URL is in an `<img>` tag
* [ ] Accepts a Webmention where the target URL is in an `<video>` tag
* [ ] Accepts a Webmention where the target URL is in an `<audio>` tag
* [ ] Rejects a Webmention where the target URL is in the document as text
* [X] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [X] Rejects a Webmention where the target URL is not in the document


### Webmention Display/Use

* [X] The receiver displays data from the source URL on the target post (MAY)

* [X] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [X] using HTML markup: Microformats2 property `in-reply-to`
* [X] The receiver recognizes that the source URL is a "like" of the post
 * [X] using HTML markup: Microformats2 property `like-of`
* [X] The receiver recognizes that the source URL is a "repost" of the post
 * [x] using HTML markup: Microformats2 property `repost-of`
* [ ] The receiver recognizes that the source URL is an "RSVP" to the post
 * [ ] using HTML markup: __________
* [X] The receiver recognizes additional response types, using markup:
 * [X] Response: "mention", if none of the above

Please describe any other ways the Webmention is displayed or used if applicable.


### Update Tests (3.2.4)

* [X] Does not display an update Webmention as a new response (SHOULD)
* [X] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [X] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [X] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [X] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [ ] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______
