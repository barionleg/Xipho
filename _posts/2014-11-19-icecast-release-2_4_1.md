---
layout: post
title:  "Icecast Release 2.4.1"
date:   2014-11-19 10:06:00
author: ePirat
categories: icecast release
---

We are pleased to announce release 2.4.1 of Icecast.
This is mostly a bugfix-only release.
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4.1/ChangeLog).  

## Downloads

-   Source: [icecast-2.4.1.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.1.tar.gz)
-   Windows [icecast_win32_2.4.1.zip](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.1.zip)

## New features

-   Add support for specifying [custom HTTP headers]({{site.baseurl}}/docs/icecast-2.4.1/config-file.html#global-headers)

## Fixes

-	Fix autogen.sh to work properly on OS X
-	Removed threadpool from the example config (it is long gone and unused)
-	More detailed logging:
        * Add source IP adress to source start/stop logging
        * Add mountpoints to some log lines
-	Fix `<auth>` working in default mounts (`<mount type="default">`) if no `<mount-name>` is given
-   Fix the JSON status API (`status-json.xsl`), which could return invalid JSON in some cases
-   SSL Security improvements:
        * Disable SSLv3
        * Disable SSL compression
-   Handle empty strings in config file better
-   Fix logging of client duration time
-   Fix possibly broken XML on Windows
-   Require `Content-Type` header for PUT requests
-   Fix on-connect and on-disconnect script output could be sent to source clients and be written to dumpfile.

## Known issues

-	Webinterface shows Login when using just `stream_auth`.