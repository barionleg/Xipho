---
layout: post
title:  "Icecast Release 2.5 beta2"
date:   2017-11-17 09:55:00
author: ePirat
categories: icecast release
---

We are pleased to announce Icecast 2.5 beta2 (2.4.99.2).
This is a beta release and not recommended for production use.

## Downloads

-   Source: [icecast-2.5-beta2.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.5-beta2.tar.gz)

## New features

- HTTP PUT, including chunked encoding support
- Improved TLS support including additional options, on the fly certificate reload, RFC2817-mode, and TLS and non-TLS connections on same port
- Support for Opus metadata in web/stats interface
- Renamed `mp3-metadata-interval` option to `icy-metadata-interval`
- Improved WebM support
- Moved `<mime-types>` to the `<paths>` section
- List last played songs in web/stats interface


## Fixes
- HTTP PUT now supports chunked encoding
- HTTP PUT with `Expect: 100-Continue` now sends the `200` status as expected at the end of transmission, not right after the `100`
- Fixed login problems for admin user, if default mount had auth defined
- Fixed that the JSON exposed listener details if queried with a specific mountpoint
- Fixed segfault on some bad opus streams
- Fixed segfaults due to empty strings in config
- Fixed Icecast fetching streamlist (for relaying) from HTTP/1.1 servers
- Fixed information disclosure CVE that allowed to view the source of a xslt file by appending a `.` to it, when using Icecast on Windows ([#2248](https://gitlab.xiph.org/xiph/icecast-server/issues/2248))


## Known issues

- YP and m3u playlists do not use the `https` sheme for URLs when using TLS
