---
layout: post
title:  "libshout Release 2.4.0"
date:   2015-11-17
author: ePirat
categories: libshout release
---

We are pleased to announce the next release of libshout!

New features include:

- Support for TLS (HTTPS) ([RFC2817] and [RFC2818], mode can be autodetected)
- Support for audio-only WebM
- Improved protocol level metadata support. (Some API calls got replaced and marked as obsolete)
- Improved HTTP protocol:
  - Set `Host:`-header (vhosting support)
  - Check for server capabilities
- Added basic support for the RoarAudio protocol

Download libshout 2.4.0 from the [download page]({{ "/download" | prepend: site.baseurl }}).

[RFC2817]: https://www.ietf.org/rfc/rfc2817
[RFC2818]: https://www.ietf.org/rfc/rfc2818