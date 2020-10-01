---
layout: post
title:  "libshout Release 2.4.4"
date:   2020-10-02
author: epirat
categories: libshout release
---

We are pleased to announce a new release of libshout!

The changes include:

* Fixed handling of blocking/non-blocking mode
* Fixed `ICY` port increment
* Fixed reusing of handles
* Fixed error handling of Ogg sync layer
* Fixed passing of errors between connection and instance layer
  (Without this fix, died connections were not correctly detected)
* Fixed and improved build scripts

Download libshout 2.4.4 from the [download page]({{ "/download" | prepend: site.baseurl }}).
