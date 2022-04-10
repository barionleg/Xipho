---
layout: post
title:  "libshout Release 2.4.6"
date:   2022-04-10
author: phschafft
categories: libshout release
---

We are pleased to announce a new release of libshout!

The changes include:

* Fixed pkg-config file ([#2329])
* Made vorbis an optional codec
* Do not pass to small headers to libspeex
* Updated documentation, mostly in regard of making it clearer which functions are now obsoleted
* General code cleanup
* Added compiler warnings about obsoleted functions and ignored return values
* Replaced old `shout_set_metadata(3)` with new `shout_set_metadata_utf8(3)`
* Added support for plain text streaming
* Fixed `shout_set_metadata*(3)` sometimes returning `SHOUTERR_RETRY` ([#2328])
* Workaround old clients by emulating `SHOUTERR_RETRY` with `SHOUTERR_BUSY` ([#2316])
* Remove our re-implementation of `X509_check_host(3)`
* Allow to disable building tools ([#2331])

Download libshout 2.4.6 from the [download page]({{ "/download" | prepend: site.baseurl }}).

[#2329]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2329
[#2328]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2328
[#2316]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2316
[#2331]: https://gitlab.xiph.org/xiph/icecast-libshout/issues/2331
