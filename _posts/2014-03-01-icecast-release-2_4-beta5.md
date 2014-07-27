---
layout: post
title:  "Icecast Release 2.4-beta5"
date:   2014-03-01 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce a fifth beta release of Icecast.  
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4-beta5/ChangeLog).  
  
Please note that while Opus and WebM are considered production ready, there might
be other problems in this release. We appreciate feedback and discussion on the
icecast-dev [mailing list]({{ "/contact" | prepend: site.baseurl }})!

## Downloads

-   Source: [icecast-2.4-beta5.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4-beta5.tar.gz)
-   Windows [icecast_win32_2.4_beta5.zip](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4_beta5.zip)

## Changes

-	New features:
	*	_Web interface redone_  
		Web output properly redone, credit to ePirat. Now validates completely as XHTML1.0 strict.  
		Also improves rendering on mobile devices.
-	Bugfixes:
	*	Reverting [r18945](https://trac.xiph.org/changeset/18945) for now as using `-b` breaks things.
		Reopening [#1886](https://trac.xiph.org/ticket/1886), patch needs rework.

