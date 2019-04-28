---
layout: post
title:  "libshout Release 2.4.2"
date:   2019-04-28
author: stephan48
categories: libshout release
---

We are pleased to announce the next release of libshout!

The changes include:

* Fixed handling of invalid characters in strings:
  * Correctly escape mountpoint names ([#2233]),
  * Correctly escape mountpoint names and passwords in deprecated metadata API ([#2304]),
  * Do not allow ICE headers with invalid characters ([#2302]).
* Fixed and updated build system.
* Allow building libshout on Android.
* Rewrote TLS handling code and statemachine ([#2244], [#2298], [#2301], [#2303]).
* Support OPTIONS for [RFC 2817] TLS mode.
* Allow manual inspection of server's TLS certificate.
* Updated documentation.

Download libshout 2.4.2 from the [download page]({{ "/download" | prepend: site.baseurl }}).

[#2233]: https://gitlab.xiph.org/xiph/icecast-server/issues/2233
[#2304]: https://gitlab.xiph.org/xiph/icecast-server/issues/2304
[#2302]: https://gitlab.xiph.org/xiph/icecast-server/issues/2302
[#2244]: https://gitlab.xiph.org/xiph/icecast-server/issues/2244
[#2298]: https://gitlab.xiph.org/xiph/icecast-server/issues/2298
[#2301]: https://gitlab.xiph.org/xiph/icecast-server/issues/2301
[#2303]: https://gitlab.xiph.org/xiph/icecast-server/issues/2303
[RFC 2817]: https://www.ietf.org/rfc/rfc2817
