---
layout: post
title:  "Icecast Release 2.4-beta2"
date:   2013-03-30 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce a second beta release of Icecast.  
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4-beta2/ChangeLog).  
  
Please note that while Opus and WebM are considered production ready, there might
be other problems in this release. We appreciate feedback and discussion on the
icecast-dev [mailing list]({{ "/contact" | prepend: site.baseurl }})!

## Downloads

-   Source: [icecast-2.4-beta2.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4-beta2.tar.gz)
-   Windows Setup: Not available

## Changes

-	New features:
	*	Now compiles for win32 using mingw
	*	Added options `headers` and `header_prefix` to URL based listener auth.
	*	Updated `listener_remove` handler:
		+	Added `ip=` and `agent=`
		+	Some cleanup & made code more uniform
		+	Avoid `int` for `size_t` vars
		+	Close [#1422](https://trac.xiph.org/ticket/1422)
	*	Allow full URLs to be returned by the master server. (Closes [#1878](http://trac.xiph.org/ticket/1878))
	*	Highly experimental HTTP PUT support. ([#1812](https://trac.xiph.org/ticket/1812))  
		We are handling it the same as we would handle a SOURCE request. Due to legacy code,
		sender __must__ send proper `content-type` header, if content type is not `audio/mpeg`!
		Can be tested using real-time encoded output and piping it into  
		`| curl -u username:password -H "Content-type: application/ogg" -T - http://localhost:8000/mountname.ogg`  
		Note that this example has __zero timing__, so a simple `cat *.ogg` will fail. Whatever feeds the pipe must do
		it at proper timing for real-time playback!
-	Bugfixes:
	*	Send proper HTTP headers in responses to clients.
		(Closes [#1639](http://trac.xiph.org/ticket/1639),
		Ref [#1870](http://trac.xiph.org/ticket/1870) and
		[#1885](http://trac.xiph.org/ticket/1885))
	*	Corrected `Content-Length` header in admin (raw) requests. Thanks to paluh for reporting.
	*	Escape log entries in access log (Close: [#1916](http://trac.xiph.org/ticket/1916), some fixes still pending)

