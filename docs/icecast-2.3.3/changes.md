---
title: Changes
version: 2.3.3
---

<div class="article" markdown="1">
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

</div>