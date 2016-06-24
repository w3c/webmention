# Bridgy

Bridgy is a service that sends comments, likes, RSVPs inside social networks (aka silos) to personal web sites. It can also publish (aka POSSE) posts from personal web sites into the silos, using an interactive web UI or webmention. More details: https://brid.gy/about

Implementation Home Page URL: https://brid.gy/

Source Code repo URL(s) (optional): https://github.com/snarfed/bridgy
* [x] 100% open source implementation

Programming Language(s): Python

Developer(s):
* [Ryan Barrett](https://snarfed.org/)
* [Kyle Mahan](https://kylewm.com/)
* [and more...](https://github.com/snarfed/bridgy/graphs/contributors)

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
* [ ] [Discovery Test #15](https://webmention.rocks/test/15)
* [ ] [Discovery Test #16](https://webmention.rocks/test/16)
* [x] [Discovery Test #17](https://webmention.rocks/test/17)
* [x] [Discovery Test #18](https://webmention.rocks/test/18)
* [x] [Discovery Test #19](https://webmention.rocks/test/19)
* [ ] [Discovery Test #20](https://webmention.rocks/test/20)
* [x] [Discovery Test #21](https://webmention.rocks/test/21)


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [ ] [Update Test #1](https://webmention.rocks/update/1)
* [ ] [Update Test #2](https://webmention.rocks/update/2)

Bridgy does resend webmentions when responses change, but silo responses are separate from the posts they're responding to, so Bridgy doesn't currently update the webmention targets it sends to. It may in the future. Background: https://github.com/snarfed/bridgy/issues/9

### Delete Tests (3.1.4)

SHOULD

* [ ] [Delete Test #1](https://webmention.rocks/delete/1)

Not yet supported: https://github.com/snarfed/bridgy/issues/9

### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)

Bridgy intentionally supports loopback addresses (e.g. localhost) as an internal development tool.

### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______

### Implementation notes

Bridgy is fairly high volume (https://brid.gy/#stats), so it has a couple scaling optimizations that aren't strictly kosher:
* It caches discovered webmention endpoints at the domain level for 2h.
  https://github.com/snarfed/bridgy/blob/a31d4636bc76771c82eb54c27fd4e13b564bc114/tasks.py#L44
* It has a large blacklist of domains that it never discovers endpoints on or sends webmentions to. https://github.com/snarfed/bridgy/blob/master/domain_blacklist.txt

## Receiving

Indicate which type of response the receiver provides:

* [x] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [x] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [ ] HTTP 202 - Receiver processes the Webmention asynchronously

Bridgy processes webmention requests synchronously, but returns HTTP 201 on success. The status URL is the URL of the silo post that was created.

Describe the response body (if any) which is returned in the request:

From https://brid.gy/about#response :

JSON response containing at least a url field that points to the silo object that it operated on. The same URL is included in the Location HTTP header. For Twitter favorites and Facebook event RSVPs, this is the tweet, post, or event. If a new object was created, e.g. a Facebook post or Twitter tweet, @-reply, or retweet, there will also be an id field with the silo id of that object.

For example, this request for an original post:

```
POST source=https://example.com/posts/123
     &target=https://brid.gy/publish/facebook
```

will receive this response:

```
HTTP/1.1 201 Created
Content-Type: application/json
Location: http://facebook.com/456_789

{
  "url": "http://facebook.com/456_789",
  "type": "post",
  "id": "456_789"
}
```

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
* [x] Other: text/plain


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

* [ ] The receiver displays data from the source URL on the target post (MAY)

* [x] The receiver recognizes that the source URL is a "comment" or "reply" to the post
 * [x] using HTML markup: `class="u-in-reply-to"`
* [x] The receiver recognizes that the source URL is a "like" of the post
 * [x] using HTML markup: `class="u-like-of"`
* [x] The receiver recognizes that the source URL is a "repost" of the post
 * [x] using HTML markup: `class="u-repost-of"`
* [x] The receiver recognizes that the source URL is an "RSVP" to the post
 * [x] using HTML markup: `class="p-rsvp"` + `class="u-in-reply-to"`
* [x] The receiver recognizes additional response types, using markup:
 * [x] picture, using HTML markup: `class="u-photo"`
 * [x] person tag, using HTML markup: `class="u-category h-card"`
 * [x] custom option: disable backlink in created post, using HTML markup: `class="p-bridgy-omit-link"`
 * [x] custom option: ignore text formatting, using HTML markup: `class="u-bridgy-ignore-formatting"`
 * [x] custom option: explicit post text, using HTML markup: `class="u-bridgy-[SILO]-text"`

More details: https://brid.gy/about#publishing


### Update Tests (3.2.4)

* [x] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)

Not yet supported: https://github.com/snarfed/bridgy/issues/84

### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)

Not yet supported: https://github.com/snarfed/bridgy/issues/84

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
* [ ] Other: _______

