---
layout: post
title:  "Icecast Release 2.4.1"
date:   2014-11-19 14:34:23
author: ePirat
categories: icecast release
---

We are pleased to announce release 2.4.1 of Icecast.
This is a pure bugfix-only release. Upgrading to it is recommended due to security fixes.
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4.1/ChangeLog).  

## Downloads

-   Source: [icecast-2.4.1.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.1.tar.gz)
-   Windows [icecast_win32_2.4.1.zip](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.1.zip)

## Fixes

-   Fix autogen.sh to work properly on OS X
-   Removed threadpool from the example config (it is long gone and unused)
-   More detailed logging:
    - Add source IP adress to source start/stop logging
    - Add mountpoints to some log lines
-   Fix logging to send errors to STDERR prior to opening log files
-   Fix `<auth>` in default mounts (`<mount type="default">`) to work properly
-   Fix the JSON status API (`status-json.xsl`), which could return invalid JSON in some cases
-   SSL Security improvements:
    - Disable SSLv3
    - Disable SSL compression
    - Updated the default ciphers to be more secure
-   Handle empty strings in config file better
-   Fix logging of client connection duration time on Windows
-   Fix possibly broken XML on Windows
-   Require `Content-Type` header for PUT requests
-   Fix on-connect and on-disconnect script STDIN/STDOUT/STDERR corruption due to shared file descriptors.
-   Fix JSON access by adding support for global and mount specific [custom HTTP headers]({{site.baseurl}}/docs/icecast-2.4.1/config-file.html#global-headers)

## Known issues

-   HTTP PUT implementation currently doesn't support chunked encoding yet.
-   HTTP PUT with "Expect: 100-Continue" receives first a "100" and soon after a "200", instead of the "200" at the end of transmission.
-   Caution should be exercised when using `<on-connect>` or `<on-disconnect>`, as there is a small chance of stream file descriptors being mixed up with script file descriptors, if the FD numbers go above 1024. This will be further addressed in the next Icecast release.
-   Don't use comments inside `<http-headers>` as it will prevent processing of further `<header>` tags.
-   Webinterface shows Login when using just `stream_auth`.

