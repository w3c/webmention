This file is a sample implementation report. Fork this repository, copy this file to a new `.md` file and change the name to your project name (in lower case with hyphens between words), and fill out the information in the report based on your implementation. When you are finished, submit a <a href="https://help.github.com/articles/using-pull-requests/">pull request</a> and your report will be reviewed and added to the main repository.

Complete this report by filling out the checkboxes as appropriate. To mark one as successful/complete/true, add an `x` between the brackets, e.g. `[x]`. If the statement does not apply to your implementation, use `[na]` and add a sentence explaining why it does not apply.

If your implementation is only a sender or only a receiver, remove the other section from the document before submitting.

When you are complete, send a pull request with the addition of your report file. Please remove this entire top section before submitting.


# webmention.herokuapp.com

Implementation Home Page URL: http://webmention.herokuapp.com

Source Code repo URL(s) (optional): https://github.com/voxpelli/webpage-webmentions
* [x] 100% open source implementation

Programming Language(s): node.js

Developer(s): [Pelle Wessman](http://kodfabrik.se/)

Implementation Classes (Sender and/or Receiver): 

## Receiving

Indicate which type of response the receiver provides:

* [ ] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [ ] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [x] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:


### Request Verification (3.2.1)

* [x] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [na] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [ ] Ignores fragment when checking if target is supported (SHOULD)

#### Implementation Notes

Verifies that the target is for the right site, but not whether the actual resource exists on that site

### Webmention Verification (3.2.2)

* [x] Verification is processed asynchronously (SHOULD)
* [ ] Follows at least one HTTP redirect on source URL (MUST)
* [ ] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [x] HTML
* [ ] Other: ______


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [x] Accepts a Webmention where the target URL is in an `<a>` tag
* [ ] Accepts a Webmention where the target URL is in an `<img>` tag
* [ ] Accepts a Webmention where the target URL is in an `<video>` tag
* [ ] Accepts a Webmention where the target URL is in an `<audio>` tag
* [x] Rejects a Webmention where the target URL is in the document as text
* [x] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [x] Rejects a Webmention where the target URL is not in the document

#### Implementation Notes

When looking for a target URL, all links in the document are normalized and then compared to a normalized target URL. All target resources with the same normalized URL are considered to be the same resource.

### Webmention Display/Use

* [x] The receiver displays data from the source URL on the target post (MAY)

* [x] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [x] using HTML markup: __________
* [x] The receiver recognizes that the source URL is a "like" of the post
 * [x] using HTML markup: __________
* [x] The receiver recognizes that the source URL is a "repost" of the post
 * [x] using HTML markup: __________
* [ ] The receiver recognizes that the source URL is an "RSVP" to the post
 * [ ] using HTML markup: __________
* [ ] The receiver recognizes additional response types, using markup:
 * [ ] Response: __________ using HTML markup: __________
 * (Please add lines like above for additional response types the receiver has implemented)

Please describe any other ways the Webmention is displayed or used if applicable.

#### Implementation Notes

The displayed data is updated in realtime in the browser to keep up to date with any new, removed and/or updated mentions. Likes and reposts can be shown as facepiles.

### Update Tests (3.2.4)

* [x] Does not display an update Webmention as a new response (SHOULD)
* [x] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [x] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [x] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [x] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [Almost] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______

#### Implementation Notes

A basic implementation of Salmention is implemented, but due to lack of testing and safe guards it has not been launched
