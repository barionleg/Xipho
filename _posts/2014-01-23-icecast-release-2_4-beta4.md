---
layout: post
title:  "Icecast Release 2.4-beta4"
date:   2014-01-23 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce a fourth beta release of Icecast.  
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4-beta4/ChangeLog).  
  
Please note that while Opus and WebM are considered production ready, there might
be other problems in this release. We appreciate feedback and discussion on the
icecast-dev [mailing list]({{ "/contact" | prepend: site.baseurl }})!

## Downloads

-   Source: [icecast-2.4-beta4.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4-beta4.tar.gz)
-   Windows [icecast_win32_2.4_beta4.zip](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4_beta4.zip)

## Changes

-	New features:
	*	_HTTP PUT support_  
		Completed HTTP PUT support, send 100-continue-header,
		if client requests it. We need to adhere to HTTP1.1 here.
-	Bugfixes:
	*	Fixed a memory leak. Lost headers of stream because of wrong ref counter in associated refbuf objects.
	*	Avoid memory leak in `_parse_mount()` when `type`-attribute is set.
	*	Updated web interface to be more XHTML compliant.
	*	Some fixes and improvements.

