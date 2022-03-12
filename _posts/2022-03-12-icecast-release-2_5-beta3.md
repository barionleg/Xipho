---
layout: post
title:  "Icecast Release 2.5 beta3"
date:   2022-03-12
author: phschafft
categories: icecast release
---

We are pleased to announce Icecast 2.5 beta3 (2.4.99.3).
This is a beta release. Usage in production should be with caution.

## Downloads

-   Source: [icecast-2.5-beta3.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.5-beta3.tar.gz)

## New features
- Overall
    * Support for configure option `--with-default-config=PATH`
    * Allowing on the fly reconfiguration of PID file
    * Clearing XSLT cache on configuration reload
    * Updated playlist size from 4 to 10
    * Improved relay configuration including multi-upstream support
    * Improved directory configuration including updated mechanism for listen URL submission
    * Report of `Host:`-header in client list
    * Updates to example configuration
    * Better warning about legacy operations
    * Support for developer logging to de-spam production `error.log`
      (`--enable-devel-logging`)
    * Added support for usernames and passwords in master's mountlist
    * Improved client navigation including per-client history and improved handling of fallback overrides
    * Improved configuration validation warnings
    * Support for plain text streaming
    * Support for media type parameters
    * New *experimental* JSON renderings
- Web interface
    * Complete redesign
    * Show `<audio>` for WebM
    * Support to move single listeners between sources
    * Logfile display on admin interface
    * Support for setting marks in logfiles via admin interface
    * New dashboard including overall health and maintenance information
    * Admin interface rendering of fallback updates
    * New confirm dialogues for critical operations
    * Added new endpoint `/admin/publicstats` replacing `/status-json.xsl` which is now deprecated
    * Added stats key `display-title` to replace `title`, and `artist`
    * ulimit related information on dashboard
    * Warning about legacy sources on dashboard
    * Listing of listen sockets on admin interface
    * Warning when IPv6 is not enabled
    * Advanced version display on admin interface
- Protocol
    * Full `OPTIONS`, `POST`, and `DELETE` support
    * Addition of `no-store` to `Cache-Control:`-header.
    * Setting the protocol version to `HTTP/1.1`
    * Improved CORS support
    * Improved Keep-Alive support
    * Marked `SOURCE` as deprecated
    * Prefer IPv6 when IPv4-mapped is supported for listen sockets
- Network
    * Support for new listen socket type `virtual`
    * Improved listen URL reporting
    * Allowing full on the fly reconfiguration of listen sockets
    * Support to configure listen backlog
    * Per listen socket HTTP headers
- Authentication
    * Per role matches: `match-web`, `nomatch-web`, `match-admin`, `nomatch-admin`, `match-method`, and `nomatch-method`
    * Per listen socket authentication
    * Client altering via authentication including redirection
    * Allow client altering on authentication fail and acl deny
    * Per role HTTP headers
    * New backend `enforce_auth` to improve performance with URL authentication
- Internals
    * Support for admin commands with embedded parameters
    * Fast event support
    * Buffer support
    * JSON renderer
    * Support names for ACLs
    * PRNG API
    * HMAC support
    * Module support


## Fixes and Cleanup
- Several TLS related fixes
- Fix for segfault on incorrectly configured htpasswd auth
- Several autotool related fixes and cleanup
- Fixed XSLT cache invalidation
- Skip using poll() on Darwin
- Detection of missing submodules in autogen.sh
- Several locking related fixes
- Several fixes for legacy metadata
- Several memory leak fixes
- Limit source settable stats key
- Send final reply to client on HTTP upgrade
- Fixed usage of `<shoutcast-compat>` with `<shoutcast-mount>`
- Re-implemented `<no-mount>` and renamed to `<allow-direct-access>`
- Send correct `<iceresponse>` for admin command manageauth
- Corrected error code for mounts with max listeners reached
- Handle safe HTTP methods in unsafe context correctly
- Made global client limit warning easier to understand
- Improved logging messages
- Not consider reuse of connections if they reached an error state

## References

### Closed tickets
[#738](https://gitlab.xiph.org/xiph/icecast-server/-/issues/738)
[#1272](https://gitlab.xiph.org/xiph/icecast-server/-/issues/1272)
[#2057](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2057)
[#2085](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2085)
[#2225](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2225)
[#2332](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2332)
[#2335](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2335)
[#2336](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2336)
[#2342](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2342)
[#2343](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2343)
[#2347](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2347)
[#2348](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2348)
[#2355](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2355)
[#2356](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2356)
[#2358](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2358)
[#2359](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2359)
[#2363](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2363)
[#2366](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2366)
[#2369](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2369)
[#2370](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2370)
[#2373](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2373)
[#2377](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2377)
[#2385](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2385)
[#2396](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2396)
[#2398](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2398)
[#2408](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2408)
[#2409](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2409)
[#2413](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2413)
[#2421](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2421)

### Related tickets
[#1902](https://gitlab.xiph.org/xiph/icecast-server/-/issues/1902)
[#2017](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2017)
[#2084](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2084)
[#2365](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2365)
[#2372](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2372)
[#2395](https://gitlab.xiph.org/xiph/icecast-server/-/issues/2395)
[libshout #2303](https://gitlab.xiph.org/xiph/icecast-libshout/-/issues/2303)
