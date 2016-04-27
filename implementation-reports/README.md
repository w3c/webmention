This file is a sample implementation report. Please copy this to a file and change the name to your project name (in lower case with hyphens between words), then fill out the information in the report based on your implementation. Please remove this paragraph before submitting.

# Implementation Name

Home Page: 

Source Code (optional): 

Programming Language: 

Developers: [Name](http://you.example.com)

Classes (Sender, Receiver): 


## Sender Tests

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


## Receiver Tests

### Request Verification (3.2.1)

* [ ] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [ ] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [ ] Ignores fragment when checking if target is supported (SHOULD)

### Webmention Verification (3.2.2)

* [ ] Verification is processed asynchronously (SHOULD)
* [ ] Follows one HTTP redirect on source URL (MUST)
* [ ] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)
* [ ] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)

### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [ ] Accepts a Webmention where the target URL is in an `<a>` tag
* [ ] Accepts a Webmention where the target URL is in an `<img>` tag
* [ ] Accepts a Webmention where the target URL is in an `<video>` tag
* [ ] Accepts a Webmention where the target URL is in an `<audio>` tag
* [ ] Rejects a Webmention where the target URL is in the document as text
* [ ] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [ ] Rejects a Webmention where the target URL is not in the document

### JSON Verification (3.2.2)

The tests below apply when the source document is JSON.

* [ ] Accepts exact match of the target URL in a top-level property
* [ ] Accepts exact match of the target URL in a property nested deeply
* [ ] Rejects partial match of the target URL in a property
* [ ] Rejects a Webmention where the target URL is not in the document

### Update Tests (3.2.4)

* [ ] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)

### Delete Tests (3.2.4)

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)

