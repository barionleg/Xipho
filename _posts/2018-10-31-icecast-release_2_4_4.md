---
layout: post
title:  "Icecast Release 2.4.4"
date:   2018-10-31 23:42:05
author: tbr
categories: icecast release
---

We released a new version of Icecast. It is a security release and we recommend to update all Icecast installations of versions below 2.4.4 to it.

A summary of the changes is listed below, for details please refer
to the [ChangeLog](https://gitlab.xiph.org/xiph/icecast-server/blob/release-2.4.4/ChangeLog)

The Xiph.org package repositories have been updated already. Most distributions should start shipping updated Icecast versions soon.

All issues have been also addressed in our development master branch. We plan to ship a 2.5 beta 3 in the near future.

## Fixes

-   Fix buffer overflows in URL auth code, [CVE-2018-18820]. [#2342]
    * This security issue affects all Icecast servers running version 2.4.0, 2.4.1, 2.4.2 or 2.4.3 if there is a "mount" definition that enables URL authentication.
    * A malicious client could send long HTTP headers, leading to a buffer overflow and potential remote code execution.
    * The problematic code was introduced in version 2.4.0 and was now brought to our attention by Nick Rolfe of [Semmle Security Research Team](https://lgtm.com/security)
-   Worked around buffer overflows in URL auth's cURL interface.
    * We currently do not believe that this issue is exploitable. It would require a malicious URL authentication back end server to send a crafted payload and make it through libcURL.
    * If someone manages, please let us know.
-   Do not report hashed user passworts in user list. There is no practical reason to show this to the administrator and it improves security.
-   Fixed segfault in htpasswd auth if no filename is set
-   Fixed a segfault when xsltApplyStylesheet() returns error
-   Do not segfault on malformed Opus streams
-   Global listener count could be negative under certain circumstances. Thanks a lot to Simeon Völkel (0xBD4E031CDB4043C9) for reporting and investigating the bug.
-   Added code to announce Opus streams as such towards yp servers.


## Downloads

-   Source: [icecast-2.4.4.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.4.tar.gz)
-   Windows: [icecast_win32_2.4.4.exe](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.4.exe)

[#2342]: https://gitlab.xiph.org/xiph/icecast-server/issues/2342

