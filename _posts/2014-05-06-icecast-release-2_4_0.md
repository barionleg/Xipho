---
layout: post
title:  "Icecast Release 2.4.0"
date:   2014-05-06 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce release 2.4.0 of Icecast.
A summary of the changes is listed below, for details please
refer to the [ChangeLog](http://svn.xiph.org/icecast/tags/icecast-2.4.0/ChangeLog).  

## Downloads

-   Source: [icecast-2.4.0.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.0.tar.gz)
-   Windows [icecast_win32_2.4.0.zip](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.0.zip)

## New features

-	Support for Ogg Opus streams
-	Support for WebM streams
-	HTTP 1.1 PUT support for source connections. Deprecating SOURCE method.
-	_Default mount_  
	This allows you to define a global set of defaults for _all_ mounts.
	This way you can use e.g. url-auth for sources and or listeners also for dynamically generated mounts.
-	_Web interface redone_
	*	Web output properly redone, credit to ePirat.
	*	Added `<audio>` element for supported audio streams.
	*	Now validates completely as XHTML1.0 strict.
	*	Improves rendering on mobile devices.
-	Added basic JSON API (`/status-json.xsl`) based on a xml2json template by Doeke Zanstra (see `xml2json.xslt`).
	Output is roughly limited to data also visible through `status.xsl`.
-	Send charset in HTTP headers for everything, excluding file-serv and streams.
-	Allow (standard `strftime(3)`) `%x` codes in `<dump-file>`. Disabled for win32.
-	Added stream_start_iso8601, server_start_iso8601 to statitics. ISO8601 compliante timestamps for statistics.
	Should make usage in e.g. JSON much easier. Added as new variables to avoid breaking backwards compatibility.
-	Now compiles for win32 using mingw
-	Added options `headers` and `header_prefix` to URL based listener auth.
-	Updated listener_remove handler, added `ip=` and `agent=`
-	Allow full URLs to be returned by the master server.

## Fixes

-	__Security Fix__: Override supplementary groups if `<changeowner>` is used
-	Fixes for some race conditions
-	Dropped debian packaging directory as debian use their own.
-	Send proper HTTP headers in responses to clients.
-	Corrected `Content-Length` header in admin (raw) requests. Thanks to paluh for reporting.
-	Escape log entries in access log
-	Fixed a memory leak. Lost headers of stream because of wrong ref counter in associated refbuf objects.
-	Avoid memory leak in `_parse_mount()` when `type`-attribute is set
-	Updated web interface to be XHTML compliant.
-	Removed `status2.xsl` from release. It was only a broken example file anyway.

## Known issues

-	Will crash if certain config tags are left empty.
-	Webinterface shows Login when using just `stream_auth`.