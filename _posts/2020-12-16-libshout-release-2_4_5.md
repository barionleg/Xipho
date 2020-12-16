---
layout: post
title:  "libshout Release 2.4.5"
date:   2020-12-16
author: phschafft
categories: libshout release
---

We are pleased to announce a new release of libshout!

The changes include:

* Improved shout.h for reading, and understanding.
* Marked dumpfile support as obsolete (as `SHOUT_PROTOCOL_XAUDIOCAST` already is).
* Added Support for setting the content language.
* Avoid the use of obsolete functions ([#2317]).
* Several small fixes for non-blocking mode ([#2321], [#2315]).
* Corrected detection of libogg (mostly for windows targets).
* Now accept TLS mode "auto" when build without TLS support.
* Added new tool shout(1).

Download libshout 2.4.5 from the [download page]({{ "/download" | prepend: site.baseurl }}).

[#2317]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2317
[#2321]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2321
[#2315]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2315
