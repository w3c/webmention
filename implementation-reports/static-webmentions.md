# static-webmentions

Implementation Home Page URL: https://github.com/nekr0z/static-webmentions

Source Code repo URL(s) (optional): https://github.com/nekr0z/static-webmentions
* [x] 100% open source implementation

Programming Language(s): Go

Developer(s): [Evgeny Kuznetsov](https://evgenykuznetsov.org)

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

#### Implementation Notes

Will Norris' [webmention](https://willnorris.com/go/webmention) Go library is used.


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [x] [Update Test #1](https://webmention.rocks/update/1)
* [x] [Update Test #2](https://webmention.rocks/update/2)


### Delete Tests (3.1.4)

SHOULD

* [x] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

The app relies on tombstones containing a `<meta http-equiv="Status" content="410 Gone" />` tag.


### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______
