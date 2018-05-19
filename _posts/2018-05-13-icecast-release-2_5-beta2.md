---
layout: post
title:  "Icecast Release 2.5 beta2"
date:   2018-05-19 13:06:00
author: ePirat
categories: icecast release
---

We are pleased to announce Icecast 2.5 beta2 (2.4.99.2).
This is a beta release and not recommended for production use.

## Downloads

-   Source: [icecast-2.5-beta2.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.5-beta2.tar.gz)

## New features

- General:
    * Add support for HTTP PUT, including chunked encoding support
    * Improve TLS support including additional options, on the fly certificate reload, RFC2817-mode, and TLS and non-TLS connections on same port
    * Improve WebM support
    * HTTP Keep-Alive support
    * New error handling and better HTTP status codes in error cases
    * Improved HTTP headers returned by Icecast
    * Send `<admin>` tag content to YP servers - provides contact information for directory operators
- Web Interface/API:
    * Add support for Opus metadata in web/stats interface
    * List last played songs in web/stats interface
    * Add support for xsl includes from the admin directory
    * Add `protocol` to listener client stats XML
    * Add `opmode` (operation mode) `strict` option
    * Add support for config reload from the admin interface
- Config:
    * Add new tag `<tls-context>` with childs `<tls-certificate>`, `<tls-key>` and `<tls-allowed-ciphers>`
    * Add new `<shoutcast-user>` tag to specify the username that is used for SHOUTcast sources
    * Moved `<mime-types>` to the `<paths>` section
    * Rename `<mp3-metadata-interval>` tag to `<icy-metadata-interval>`
    * Rename `<kartoffelsalat>` tag to `<event-bindings>`
    * Rename `ssl` tags (`<ssl>`, `<ssl-certificate>`, `<ssl-allowed-ciphers>`) to `tls` (`<tls>`, `<tls-certificate>`, `<tls-allowed-ciphers>`) 


## Fixes
- HTTP PUT now supports chunked encoding
- HTTP PUT with `Expect: 100-Continue` now sends the `200` status as expected at the end of transmission, not right after the `100`
- Fix login problems for admin user, if default mount had auth defined
- Fix that in some cases stats JSON would be malformed
- Fix that the JSON exposed listener details if queried with a specific mountpoint
- Fix segfault on some bad opus streams
- Fix segfaults due to empty strings in config
- Fix fetching of streamlist (for relaying) from HTTP/1.1 servers
- Fix information disclosure CVE that allowed to view the source of a xsl file by appending a `.` to it, when using Icecast on Windows ([#2248](https://gitlab.xiph.org/xiph/icecast-server/issues/2248))


## Known issues

- YP and m3u playlists do not use the `https` scheme for URLs when using TLS
