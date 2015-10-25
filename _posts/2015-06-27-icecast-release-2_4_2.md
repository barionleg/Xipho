---
layout: post
title:  "Icecast Release 2.4.2"
date:   2015-06-27 11:23:23
author: ePirat
categories: icecast release
---

We are releasing Icecast 2.4.2, an important bugfix-only release. Upgrading to it is recommended due to security fixes.
A summary of the changes is listed below, for details please refer
to the [ChangeLog](https://git.xiph.org/?p=icecast-server.git;a=blob_plain;f=ChangeLog;hb=ceec48201ab1e08a449a3745aa667a5d1ab9ba91).  

## Downloads

-   Source: [icecast-2.4.2.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.2.tar.gz)
-   Windows [icecast_win32_2.4.2.exe](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.2.exe)

## Fixes

-   Fix a crash related to URL Auth end empty credentials, [CVE-2015-3026]. [#2191]

## Known issues

-   HTTP PUT implementation currently doesn't support chunked encoding yet.
-   HTTP PUT with "Expect: 100-Continue" receives first a "100" and soon after a "200", instead of the "200" at the end of transmission.
-   Caution should be exercised when using `<on-connect>` or `<on-disconnect>`, as there is a small chance of stream file descriptors being mixed up with script file descriptors, if the FD numbers go above 1024. This will be further addressed in the next Icecast release.
-   Don't use comments inside `<http-headers>` as it will prevent processing of further `<header>` tags.
-   Webinterface shows Login when using just `stream_auth`.

[#2191]: https://trac.xiph.org/ticket/2191
[CVE-2015-3026]: https://web.nvd.nist.gov/view/vuln/detail?vulnId=CVE-2015-3026