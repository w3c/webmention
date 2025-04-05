This file is a sample implementation report. Fork this repository, copy this file to a new `.md` file and change the name to your project name (in lower case with hyphens between words), and fill out the information in the report based on your implementation. When you are finished, submit a <a href="https://help.github.com/articles/using-pull-requests/">pull request</a> and your report will be reviewed and added to the main repository.

Complete this report by filling out the checkboxes as appropriate. To mark one as successful/complete/true, add an `x` between the brackets, e.g. `[x]`. If the statement does not apply to your implementation, use `[na]` and add a sentence explaining why it does not apply.

If your implementation is only a sender or only a receiver, remove the other section from the document before submitting.

When you are complete, send a pull request with the addition of your report file. Please remove this entire top section before submitting.


# Implementation Name (Replace this header)

Implementation Home Page URL: 

Source Code repo URL(s) (optional): 
* [ ] 100% open source implementation

Programming Language(s): 

Developer(s): [Name](http://you.example.com)

Implementation Classes (Sender and/or Receiver): 


## Sending

### Discovery Tests (3.1.1)

MUST

* [ ] [Discovery Test #1](https://webmention.rocks/test/1)
* [ ] [Discovery Test #2](https://webmention.rocks/test/2)
* [ ] [Discovery Test #3](https://webmention.rocks/test/3)
* [ ] [Discovery Test #4](https://webmention.rocks/test/4)
* [ ] [Discovery Test #5](https://webmention.rocks/test/5)
* [ ] [Discovery Test #6](https://webmention.rocks/test/6)
* [ ] [Discovery Test #7](https://webmention.rocks/test/7)
* [ ] [Discovery Test #8](https://webmention.rocks/test/8)
* [ ] [Discovery Test #9](https://webmention.rocks/test/9)
* [ ] [Discovery Test #10](https://webmention.rocks/test/10)
* [ ] [Discovery Test #11](https://webmention.rocks/test/11)
* [ ] [Discovery Test #12](https://webmention.rocks/test/12)
* [ ] [Discovery Test #13](https://webmention.rocks/test/13)
* [ ] [Discovery Test #14](https://webmention.rocks/test/14)
* [ ] [Discovery Test #15](https://webmention.rocks/test/15)
* [ ] [Discovery Test #16](https://webmention.rocks/test/16)
* [ ] [Discovery Test #17](https://webmention.rocks/test/17)
* [ ] [Discovery Test #18](https://webmention.rocks/test/18)
* [ ] [Discovery Test #19](https://webmention.rocks/test/19)
* [ ] [Discovery Test #20](https://webmention.rocks/test/20)
* [ ] [Discovery Test #21](https://webmention.rocks/test/21)

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Sending Tests (3.1.2)

MUST

* [ ] Accepts HTTP 200 response as a success
* [ ] Accepts HTTP 201 response as a success
* [ ] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [ ] [Update Test #1](https://webmention.rocks/update/1)
* [ ] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Delete Tests (3.1.4)

SHOULD

* [ ] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

(Add implementation notes here, or remove this section)


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
* [ ] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:


### Request Verification (3.2.1)

* [ ] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [ ] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [ ] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [ ] Verification is processed asynchronously (SHOULD)
* [ ] Follows at least one HTTP redirect on source URL (MUST)
* [ ] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [ ] HTML
* [ ] Other: ______


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [ ] Accepts a Webmention where the target URL is in an `<a>` tag
* [ ] Accepts a Webmention where the target URL is in an `<img>` tag
* [ ] Accepts a Webmention where the target URL is in an `<video>` tag
* [ ] Accepts a Webmention where the target URL is in an `<audio>` tag
* [ ] Rejects a Webmention where the target URL is in the document as text
* [ ] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [ ] Rejects a Webmention where the target URL is not in the document


### Webmention Display/Use

* [ ] The receiver displays data from the source URL on the target post (MAY)

* [ ] The receiver recognizes that the source URL is a "comment" or "reply" to the post
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

* [ ] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)


### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [ ] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [ ] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______
