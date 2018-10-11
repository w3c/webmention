# Pushl

Pushl is a tool that converts updates published via Atom to WebSub and Webmention. It is intended to be run periodically from a cron job or similar, and adds basic IndieWeb-style push notification interoperability to statically-published websites (or CMSes which behave in the style of static publishing, such as [Publ](http://publ.beesbuzz.biz)).

Implementation Home Page URL: http://github.com/PlaidWeb/Pushl

Source Code repo URL(s) (optional): http://github.com/PlaidWeb/Pushl
* [x] 100% open source implementation

Programming Language(s): Python

Developer(s): [fluffy](http://beesbuzz.biz)

Implementation Classes (Sender and/or Receiver): Sender


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
* [x] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

This theoretically works, but the 10-minute testing window on webmention.rocks makes this very difficult to test successfully. My logs show it doing the right thing, however.


### Delete Tests (3.1.4)

SHOULD

* [x] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

If an entry disappears from a feed, Pushl will send webmentions against the links found in the previously-cached version of the entry; if the CMS reports the old item as 410 GONE then this will appear as a proper deletion to the recipient. As most CMSes don't support 410 GONE this will usually appear as an update instead.


### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: [`link rel` whitelist/blacklist](https://github.com/PlaidWeb/Pushl/issues/1)
* [ ] Other: [forced synthetic mentions](https://github.com/PlaidWeb/Pushl/issues/6) (for [fed.brid.gy](http://fed.brid.gy) et al)


