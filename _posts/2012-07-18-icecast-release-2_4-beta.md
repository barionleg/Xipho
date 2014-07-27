---
layout: post
title:  "Icecast Release 2.4-beta"
date:   2012-07-18 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce a beta release of Icecast. A summary of the changes is listed below.  
Please note that while Opus and WebM are considered production ready, there might be other problems
in this release. We appreciate feedback and discussion on the icecast-dev [mailing list]({{ "/contact" | prepend: site.baseurl }})!

## Downloads

-   Source: [icecast-2.4-beta.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4-beta.tar.gz)
-   Windows Setup: Not available

## Changes

-	New features:
	*	Support for Ogg Opus streams
	*	Support for WebM streams
-	Bugfixes:
	*	Fixes for some race conditions
	*	Allow (standard `strftime(3)`) `%x` codes in `<dump-file>`. Disabled for win32.
	*	Dropped debian packaging directory as debian use their own.
