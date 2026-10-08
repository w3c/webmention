# Paolo Gabriel's Digital Swamp (paologabriel.com)

Implementation Home Page URL: https://www.paologabriel.com

Source Code repo URL(s) (optional): *(site repository is private — omitted)*
* [ ] 100% open source implementation

Programming Language(s): JavaScript (Node.js)

Developer(s): [Paolo Gabriel](https://www.paologabriel.com)

Implementation Classes (Sender and/or Receiver): Sender and Receiver
*(receipt and verification of incoming Webmentions is delegated to
[webmention.io](https://webmention.io/), which has its own report in this folder.
This report claims the sender and the receiver-side display layer only.)*

**Report scope: MUST-level requirements only.** SHOULD and MAY items are left
unclaimed below, deliberately. A blank box here means "not claimed", not "failed".


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

Sending is performed by a build-time script (`scripts/send-webmentions.js`). It
reads the deployed sitemap, collects outbound links per post, discovers each
target's Webmention endpoint, and posts asynchronously. It also runs on a monthly
GitHub Actions schedule and on demand.

Results were produced on 2026-10-08 by a full run of the WebmentionRocks
endpoint-discovery suite, sourced from
`https://www.paologabriel.com/swamp/webmention-endpoint-discovery/`. Per-test
records are in `results.json` in the run's workspace; each test page was
re-fetched and the presence of a mention sourced from paologabriel.com was
recorded, so delivery is confirmed by observation and not by status code alone.

**Entry point used.** Results came from the sender's exported `fetchImpl` entry
point, not the shipped CLI path. At this revision the shipped path fails on
Node 22 with `ERR_INVALID_IP_ADDRESS`: the address pinning added for
DNS-rebinding protection installs a resolver callback that does not honour
Node's `lookup` `all: true` contract. The discovery logic exercised is the
implementation's own; the default entry point is separately broken and that
defect is tracked as its own work item.

Two tests are published on webmention.rocks but are not line items in this
template. Reported here:

* Discovery Test #22 (endpoint relative to the path) — [x] pass / [ ] fail
* Discovery Test #23 (target is a redirect and the endpoint is relative) — [x] pass / [ ] fail

**Test #20, reported honestly.** The first attempt on 2026-10-08 failed: the page
carries a decoy `<link rel="webmention">` with no `href` before the real
`<a href="/test/20/webmention" rel="webmention">`, and the sender resolved the
decoy against the page URL and POSTed to
`https://webmention.rocks/test/undefined`, which answered HTTP 405. The cause was
that `endpointFromHtml` passed the result of `getAttribute("href")` into the URL
resolver, and `node-html-parser` returns `undefined` for an absent attribute, so
the string `"undefined"` was resolved against the page. This was fixed in the
implementation (skip an element whose `href` attribute is not a string; an
attribute that is present but empty must still resolve to the page URL, which is
Discovery Test #15) and re-verified: the patched discovery resolves
`https://webmention.rocks/test/20/webmention`, and the test page displays a
Mentions entry sourced from this implementation's page. Test #15 is unchanged.


### Sending Tests (3.1.2)

MUST

* [x] Accepts HTTP 200 response as a success
* [ ] Accepts HTTP 201 response as a success
* [ ] Accepts HTTP 202 response as a success

#### Implementation Notes

Only HTTP 200 was observed against a live endpoint: a direct POST to
`https://webmention.rocks/test/20/webmention` answered 200 and the mention was
recorded. The sender gates success on `response.ok` and does not surface the
exact status code, so the accepted codes for the other 22 targets are recorded as
"2xx" and not as specific values. HTTP 201 and 202 are therefore **not claimed**.

A Webmention endpoint must return 200, 201 or 202 to indicate success; the
implementation treats all three as success by construction (`response.ok`), but
that is a code reading, not a recorded result, and this report does not claim
behaviour it did not observe.


### Update Tests (3.1.3)

SHOULD — **not claimed.**

* [ ] [Update Test #1](https://webmention.rocks/update/1)
* [ ] [Update Test #2](https://webmention.rocks/update/2)

#### Implementation Notes

Not claiming SHOULD-level conformance. For the record: the sender does re-send a
mention for a page whose `lastmod` post-dates its last send
(`shouldSendWebmention`, minimum 7 days between sends), but no update run was
observed against these test targets, so no claim is made.


### Delete Tests (3.1.4)

SHOULD — **not implemented.**

* [na] [Delete Test #1](https://webmention.rocks/delete/1)

#### Implementation Notes

`[na]`: the sender never emits a delete. There is no delete path anywhere in the
sending code.


### Security Considerations (4)

* [ ] The sender avoids sending a Webmention to a loopback address (SHOULD)

#### Implementation Notes

Not claimed (SHOULD-level). For the record: the sender does resolve a target host
and refuses to send when a resolved address is not globally routable — that is
the purpose of the address-pinning code — but no test in this report exercised it
against a loopback target, so no claim is made.


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______

*(None implemented.)*


## Receiving

Indicate which type of response the receiver provides:

* [na] HTTP 200 - Receiver synchronously processes the Webmention request (not recommended)
* [na] HTTP 201 - Receiver creates a status URL the sender can use to check the status of the Webmention
* [na] HTTP 202 - Receiver processes the Webmention asynchronously

*(`[na]`: the receiving endpoint is webmention.io. Its response behaviour is
described in `webmention.io.md`, not here.)*

Describe the response body (if any) which is returned in the request:

*(`[na]` — webmention.io's concern.)*


### Request Verification (3.2.1)

* [na] Verifies source and target are valid URLs, rejecting with HTTP 400 (MUST)
* [na] Verifies that target is a valid resource for which the receiver accepts Webmentions, rejecting with HTTP 400 (SHOULD)
* [na] Ignores fragment when checking if target is supported (SHOULD)

*(Implemented by webmention.io, reported separately. Independently observed on
2026-10-08 against `https://webmention.io/paologabriel.com/webmention`: an empty
body, `source=notaurl` and `target=notaurl` each returned HTTP 400.)*

### Webmention Verification (3.2.2)

* [na] Verification is processed asynchronously (SHOULD)
* [na] Follows at least one HTTP redirect on source URL (MUST)
* [na] Respects a self-imposed limit on number of HTTP redirects to follow (MUST)

*(Implemented by webmention.io.)*

#### Source URL content-types supported

* [na] HTML
* [ ] Other: _______

*(Implemented by webmention.io.)*


### HTML Verification (3.2.2)

The tests below apply when the source document is HTML.

* [na] Accepts a Webmention where the target URL is in an `<a>` tag
* [na] Accepts a Webmention where the target URL is in an `<img>` tag
* [na] Accepts a Webmention where the target URL is in a `<video>` tag
* [na] Accepts a Webmention where the target URL is in an `<audio>` tag
* [na] Rejects a Webmention where the target URL is in the document as text
* [na] Rejects a Webmention where the target URL is in an `<a>` tag inside an HTML comment
* [na] Rejects a Webmention where the target URL is not in the document

*(All `[na]`: source-document verification is performed by webmention.io before it
stores a mention. This implementation consumes what webmention.io returns.)*


### Webmention Display/Use

MAY — **not claimed.**

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

Please describe any other ways the Webmention is displayed or used if applicable.

*(May-level, so no claim is made. For the record, so a reader is not misled about
what exists: mentions are displayed per note behind an opt-in `webmentionFooter`
frontmatter flag and in a site-wide `/webmentions/` view; responses are
distinguished via `wm-property` for `in-reply-to` (rendered as a link to the
reply), `like-of` and `repost-of` (rendered as counts), and `mention-of`
(count only). RSVP is not handled. A mention whose source is on paologabriel.com
is dropped rather than counted. None of this is claimed above.)*


### Update Tests (3.2.4)

SHOULD — **not claimed.**

* [ ] Does not display an update Webmention as a new response (SHOULD)
* [ ] Removes the response when an update Webmention is sent and the source URL returns 200 and no link is found (SHOULD)
* [ ] Updates and stores the information from the primary object at the source URL (MUST)
* [ ] Updates and stores the information from children or descendant objects at the source URL (MAY)

#### Implementation Notes

Not claimed. `wm-id` dedupe prevents a repeat from being rendered as a new
response, but this was not exercised against the update tests. The remaining
items describe webmention.io storage behaviour.


### Delete Tests (3.2.4)

SHOULD — **not claimed.**

* [ ] Recognizes an HTTP 410 response as a delete, and removes the response (SHOULD)

#### Implementation Notes

Not claimed. No 410 handling exists in this implementation's fetch or display
code.


### Security Considerations (4)

* [ ] Webmentions are moderated before being displayed (MAY)
* [ ] Webmentions are periodically re-verified (MAY)
* [x] The receiver ensures any displayed data it properly encoded/filtered to prevent XSS attacks (MUST)
* [ ] Respects a self-imposed limit on the time spent fetching the source URL (SHOULD)
* [ ] Respects a self-imposed limit on the number of bytes fetched from the source URL (SHOULD)
* [ ] The receiver accepts additional parameters or headers, and so has CSRF protection (SHOULD)

#### Implementation Notes

The XSS box (MUST) is claimed on two independent defences, both verified
2026-10-08 against `palol/digital-garden` `origin/main` `7e30a899`:

1. **Encoding.** Every remote field is emitted through the template engine's
   `escape` filter — `mention.content.text | escape`, `authorName | escape`,
   `mention.author.photo | escape`, and every URL placed in `href`/`src`
   (`src/site/webmentions.njk`,
   `src/site/_includes/components/user/notes/afterContent/zz-note-webmentions.njk`).
   Author-supplied text and markup cannot inject into the rendered page.
2. **URL-scheme allowlisting.** `src/helpers/safeHttpUrl.js` accepts `http:` and
   `https:` only and returns `null` for anything else, including `javascript:`,
   `data:`, relative and protocol-relative URLs. It is registered as the
   `safeHttpUrl` filter and applied to the author URL, author photo, mention URL
   and reply URL in both templates, and the same gate is applied independently at
   the data layer in `src/site/_data/webmentions.mjs`. Covered by
   `src/helpers/__tests__/safeHttpUrl.test.js` and the page and note template
   specs, which assert that unsafe URLs are dropped and safe ones kept.
   Landed 2026-09-12.

**Scope of that claim, stated plainly:** the allowlist covers the remote URL
fields this implementation renders. It is a filter on those fields, not a blanket
content-security policy, and it does not moderate what webmention.io stores.

The remaining boxes are unclaimed: SHOULD and MAY level, or behaviour that
belongs to webmention.io. No moderation step covers the note facepiles; the
guestbook is hand-curated but that is a MAY-level claim and is not made here.


### Extensions

This implementation has also implemented the following extensions.

* [ ] [Salmention](http://indiewebcamp.com/Salmention)
* [ ] [Vouch](http://indiewebcamp.com/Vouch)
* [ ] [Private Webmention](http://indiewebcamp.com/Private-Webmention)
* [ ] Other: _______

*(None implemented.)*
