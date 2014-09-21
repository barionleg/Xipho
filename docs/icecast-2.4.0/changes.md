---
title: Changes
version: 2.4.0
---

<article id="v{{ page.version }}" markdown="1">
# Version {{ page.version }}

## New Features

-	Support for Ogg Opus streams
-	Support for WebM streams
-	HTTP 1.1 PUT support for source connections. Deprecating SOURCE method
-	_Default mount_  
	This allows you to define a global set of defaults for ALL mounts. This way you can use e.g. url-auth for sources and or listeners also for dynamically generated mounts.
-	_Web interface redone_
	*	Web output properly redone, credit to ePirat
	*	Added `<audio>` element for supported audio streams
	*	Now validates completely as XHTML1.0 strict
	*	Also improves rendering on mobile devices
-	Added basic JSON API (`/status-json.xsl`) based on a xml2json template by Doeke Zanstra (see `xml2json.xslt`). Output is roughly limited to data also visible through `status.xsl`
-	Send charset in HTTP headers for everything, excluding file-serv and streams
-	Allow (standard strftime(3)) `%x` codes in `<dump-file>`. Disabled for Win32
-	Added `stream_start_iso8601`, `server_start_iso8601` to statitics. ISO8601 compliante timestamps for statistics. Should make usage in e.g. JSON much easier. Added as new variables to avoid breaking backwards compatibility
-	Now compiles for Win32 using mingw
-	Added options `headers` and `header_prefix` to URL based listener auth
-	Updated `listener_remove` handler, added `ip=` and `agent=`
-	Allow full URLs to be returned by the master server

## Fixes

-	__Security fix__: Override supplementary groups if is used
-	Fixes for some race conditions
-	Dropped debian packaging directory as debian use their own.
-	Send proper HTTP headers in responses to clients.
-	Corrected Content-Length: header in admin (raw) requests. Thanks to paluh for reporting.
-	Escape log entries in access log
-	Fixed a memory leak. Lost headers of stream because of wrong ref counter in associated refbuf objects.
-	Avoid memory leak in `_parse_mount()` when `type`-attribute is set
-	Updated web interface to be XHTML compliant.
-	Removed `status2.xsl` from release. It was only a broken example file anyway.

## Known issues

-	Will crash if certain config tags are left empty

</article>

<article id="v2.3" markdown="1">
# Version 2.3

## New Features

-	Streaming support for ogg speex, ogg flac, ogg midi
-	Intro file support, per mount settable
-	On-demand relays, global and per-relay settable
-	Fallback to file, extends on the intro file handling.
-	New mount-level settings:
	*	public, type/subtype, genre settings, stream description,
	*	stream url, stream name, bitrate (override what is sent from the source client)
	*	mp3 metadata interval
	*	on-[dis]connect scripts can be stated per-mount, invoked at source start/stop and take 1 arg which is the mountpoint.
-	New URL listener authenticator .included is an example php-based application that can be used in conjunction with the url authenticator to manage a simple subscription-based broadcast.
-	HTPasswd authenticator uses in-memory structures now.
-	On demand files now can be fed through an authenticator
-	Update to admin/web xslt interface

## Fixes

-	real/helix works
-	win32 access log correct
-	stats client is stable now (`curl -X STATS http://admin@host:port/`)
-	show mountpoints on stats that are inactive but have an active fallback
-	more updates over HUP possible

</article>