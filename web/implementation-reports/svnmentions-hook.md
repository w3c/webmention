# SVNmentions-hook

Implementation Home Page URL: https://github.com/carrvo/SVNmentions-hook

Version: v1.0

Source Code repo URL(s) (optional): 
* [ ] 100% open source implementation

Programming Language(s): PHP

Developer(s): carrvo

Implementation Classes (Sender and/or Receiver): Sender


## Sending

### Discovery Tests (3.1.1)

MUST

* [ ] [Discovery Test #1](https://webmention.rocks/test/1) - HTTP Link header, unquoted rel, relative URL 
* [ ] [Discovery Test #2](https://webmention.rocks/test/2) - HTTP Link header, unquoted rel, absolute URL 
* [x] [Discovery Test #3](https://webmention.rocks/test/3) - HTML <link> tag, relative URL 
* [x] [Discovery Test #4](https://webmention.rocks/test/4) - HTML <link> tag, absolute URL 
* [x] [Discovery Test #5](https://webmention.rocks/test/5) - HTML <a> tag, relative URL 
* [x] [Discovery Test #6](https://webmention.rocks/test/6) - HTML <a> tag, absolute URL
* [ ] [Discovery Test #7](https://webmention.rocks/test/7) - HTTP Link header with strange casing 
* [x] [Discovery Test #8](https://webmention.rocks/test/8) - HTTP Link header, quoted rel
* [ ] [Discovery Test #9](https://webmention.rocks/test/9) - Multiple rel values on a <link> tag 
* [ ] [Discovery Test #10](https://webmention.rocks/test/10) - Multiple rel values on a Link header 
* [x] [Discovery Test #11](https://webmention.rocks/test/11) - Multiple Webmention endpoints advertised: Link, <link>, <a>
* [ ] [Discovery Test #12](https://webmention.rocks/test/12) - Checking for exact match of rel=webmention 
* [ ] [Discovery Test #13](https://webmention.rocks/test/13) - False endpoint inside an HTML comment
* [ ] [Discovery Test #14](https://webmention.rocks/test/14) - False endpoint in escaped HTML
* [ ] [Discovery Test #15](https://webmention.rocks/test/15) - Webmention href is an empty string 
* [x] [Discovery Test #16](https://webmention.rocks/test/16) - Multiple Webmention endpoints advertised: <a>, <link> 
* [x] [Discovery Test #17](https://webmention.rocks/test/17) - Multiple Webmention endpoints advertised: <link>, <a> 
* [ ] [Discovery Test #18](https://webmention.rocks/test/18) - Multiple HTTP Link headers 
* [ ] [Discovery Test #19](https://webmention.rocks/test/19) - Single HTTP Link header with multiple values 
* [ ] [Discovery Test #20](https://webmention.rocks/test/20) - Link tag with no href attribute 
* [x] [Discovery Test #21](https://webmention.rocks/test/21) - Webmention endpoint has query string parameters
* [x] [Discovery Test #22](https://webmention.rocks/test/22) - Webmention endpoint is relative to the path
* [ ] [Discovery Test #23](https://webmention.rocks/test/23) - Webmention target is a redirect and the endpoint is relative

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [x] Accepts HTTP 201 response as a success
* [x] Accepts HTTP 202 response as a success


### Update Tests (3.1.3)

SHOULD

* [ ] [Update Test #1](https://webmention.rocks/update/1) - Simple update 
* [ ] [Update Test #2](https://webmention.rocks/update/2) - Removing a link 

#### Implementation Notes

(Add implementation notes here, or remove this section)


### Delete Tests (3.1.4)

SHOULD

* [ ] [Delete Test #1](https://webmention.rocks/delete/1) - Simple delete

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
