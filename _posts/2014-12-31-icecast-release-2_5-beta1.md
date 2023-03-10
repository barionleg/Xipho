---
layout: post
title:  "Icecast Release 2.5 beta1"
date:   2014-12-31 20:45:23
author: tbr
categories: icecast release
---

We are pleased to announce Icecast 2.5 beta1 (2.4.99.1).
This is a beta release and not recommended for production use.
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://git.xiph.org/?p=icecast-server.git;a=blob;f=ChangeLog;h=5afed8cc60f3ac66de43df46cffa5c37a01ef15a;hb=refs/heads/release-2.4.99.1).  

## Downloads

-   Source: [icecast-2.5-beta1.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.5-beta1.tar.gz)
-   Windows [icecast_win32_2.5-beta1.exe](http://downloads.xiph.org/releases/icecast/icecast_win32_2.5-beta1.exe)

## New features

- <role> replaces old style <authentication> items
- <event> triggers
- <resource> replaces <alias> and offers more functionality
- additional stream metadata exposed
- additional stats XML output (e.g. listeners, used by e.g. licensing services, may need ?omode=legacy)

## Known issues

-   HTTP PUT implementation currently doesn't support chunked encoding yet.
-   HTTP PUT with "Expect: 100-Continue" receives first a "100" and soon after a "200", instead of the "200" at the end of transmission.
-   Caution should be exercised when using `<on-connect>` or `<on-disconnect>`, as there is a small chance of stream file descriptors being mixed up with script file descriptors, if the FD numbers go above 1024. This will be further addressed in the final release.
-   Login problems for admin if mount has auth defined (fixed in git for next beta)
-   JSON exposes listener details if queried with mount (fixed in git for next beta)
