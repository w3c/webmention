# Webmention Plugin for Grav CMS

Implementation Home Page URL: https://github.com/Perlkonig/grav-plugin-webmention

Source Code repo URL(s) (optional): 
* [X] 100% open source implementation

Programming Language(s): 

Developer(s): [Aaron Dalton](https://perlkonig.com)

Implementation Classes (Sender and/or Receiver): Sender, receiver, and vouch extension


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

I've incorporated the following libraries into this plugin:

  - [IndieWeb/MentionClient](https://github.com/indieweb/mention-client-php) for discovering endpoints and sending notifications.

  - [php-mf2](https://github.com/indieweb/php-mf2) used by IndieWeb/MentionClient to resolve relative URLs and by my code to extract MF2 data from mentioners and vouchers.

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

* [X] The sender avoids sending a Webmention to a loopback address (SHOULD)

#### Implementation Details

IPv4 only. Checks against reserved IPs as well.

### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [X] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______


## Receiving

Indicate which type of response the receiver provides:

* [ ] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [X] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [X] HTTP 202 - Receiver processes the Webmention asynchronously

Describe the response body (if any) which is returned in the request:

HTML response, human readable.

### Request Verification (3.2.1)

* [X] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [X] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [ ] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [X] Verification is processed asynchronously (SHOULD)
* [X] Follows at least one HTTP redirect on source URL (MUST)
* [X] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

#### Source URL content-types supported

Please list the content types that your implementation supports when checking if the source document links to the target URL.

* [X] HTML
* [X] Other: Treats anything other than 'text/html' as plain text


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [X] Accepts a Webmention where the target URL is in an `<a>` tag
* [X] Accepts a Webmention where the target URL is in an `<img>` tag
* [X] Accepts a Webmention where the target URL is in an `<video>` tag
* [X] Accepts a Webmention where the target URL is in an `<audio>` tag
* [X] Rejects a Webmention where the target URL is in the document as text
* [X] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [X] Rejects a Webmention where the target URL is not in the document

#### Implementation Details

If content is HTML, it strips all comments and looks for 'href' and 'src' references. Any other content type is naively checked to contain the target string.

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

How the data is displayed is completely up to the user. The plugin processes the mentions and extracts any embedded MF2 data. If no MF2 data is present, then all the user will have is the URL. The plugin exposes this data to the Grav system and the user can incorporate that data into their themes in any way they wish.

### Update Tests (3.2.4)

* [/] Does not display an update Webmention as a new response (SHOULD)
* [X] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [X] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)

#### Implementation Details

The first bullet gets a half mark at least. Maybe it's a full mark. The plugin is idempotent, but it never overwrites the initial 'date_received' field. So while any MF2 data would be updated, the user would have no indication that the data had changed. Display is ultimately up to the user, though.

### Delete Tests (3.2.4)

* [X] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)

#### Implementation Details

*Any* error response will result in the data being marked as invisible. But it's not deleted. The plugin deletes `410 GONE` responses from the data when the user approves. The user can of course manually delete any data they choose.

### Security Considerations (4)

* [X] Webmentions are moderated before being displayed (MAY)
* [X] Webmentions are periodically re-verified (MAY)
* [/] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [X] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [X] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)

#### Implementation Details

Regarding the half mark in bullet 3: The code uses libraries and language features to do a certain degree of due diligence, but it does not go out of its way. Ultimately the user who displays the data should apply reasonable filters.

### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [X] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] Other: _______

