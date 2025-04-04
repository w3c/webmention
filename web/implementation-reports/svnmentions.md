# SVNmentions

Implementation Home Page URL: https://github.com/carrvo/SVNmentions
Version: v1.0

Source Code repo URL(s) (optional): 
* [ ] 100% open source implementation

Programming Language(s): PHP

Developer(s): carrvo

Implementation Classes (Sender and/or Receiver): Receiver


## Receiving

Indicate which type of response the receiver provides:

* [x] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [ ] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [ ] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:


### Request Verification (3.2.1)

* [x] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [x] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [x] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [ ] Verification is processed asynchronously (SHOULD)
* [x] Follows at least one HTTP redirect on source URL (MUST)
* [x] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [x] HTML
* [ ] Other: ______


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [x] Accepts a Webmention where the target URL is in an `<a>` tag
* [x] Accepts a Webmention where the target URL is in an `<img>` tag
* [x] Accepts a Webmention where the target URL is in an `<video>` tag
* [x] Accepts a Webmention where the target URL is in an `<audio>` tag
* [ ] Rejects a Webmention where the target URL is in the document as text
* [ ] Rejects a Webmention where the target URL is in an `<a>` tag **inside an HTML comment**
* [x] Rejects a Webmention where the target URL is not in the document


### Webmention Display/Use

* [ ] The receiver displays data from the source URL on the target post (MAY)

* [x] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is a "like" of the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is a "repost" of the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is an "RSVP" to the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes additional response types, using markup:
 * [ ] Response: __________ using HTML markup: __________
 * (Please add lines like above for additional response types the receiver has implemented)

Please describe any other ways the Webmention is displayed or used if applicable.


### Update Tests (3.2.4)

* [x] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [ ] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [x] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______
