---
layout: post
title:  "Icecast Release 2.3.2"
date:   2008-06-02
author: karl
categories: icecast release
---

We are pleased to announce the next release of Icecast.
A summary of the changes are listed below.

## Downloads

-	Source: [icecast-2.3.2.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.3.2.tar.gz)
-	SRPM: [icecast-2.3.2-0.src.rpm](http://downloads.xiph.org/releases/icecast/icecast-2.3.2-0.src.rpm)
-	Windows Setup: [icecast2_win32_2.3.2_setup.exe](http://downloads.xiph.org/releases/icecast/icecast2_win32_2.3.2_setup.exe)

## Changes

-	Character set support. Most non-Ogg streams (eg MP3) send metadata as Latin1 but it could be in
	other character sets.  
	As icecast uses UTF-8, we need to convert to UTF-8 so that web pages and
	stream directories render correctly.
	-	Allow a per-mount `<charset>` setting. For when source clients do not indicate which
		character set is in use.
	-	A `charset=` parameter to the metadata request.
	-	Default for non-Ogg content is now Latin-1 (aka ISO-8859-1). Ogg content still uses UTF-8.
-	Authentication:
	-	Each mountpoint authentication is isolated so one mount authentication does not
		slow another mountpoint authentication down.
	-	XSL pages can require authentication.
	-	Add some sanity checks for incorrect settings.
-	Listening socket update
	-	Allow multiple ports to be allocated which allow multiple shoutcast source
		clients to stream on the same icecast instance.
	-	No internal limit on the number of listen sockets that can be used.
	-	Allow for a listen socket to be marked SSL capable. While any client could connect
		on these, the idea is really for `/admin` requests.
	-	Allow for a `<listen-socket>` to bind to ipv4 and ipv6
-	XSL update
	-	XSL pages include an xspf link for non-auth streams.
	-	XSL pages in both webroot and adminroot can take a `mount=` arg to limit which stats are transformed.
	-	XSL files can specify the content-type to return to the client. It is no longer fixed to html
-	Updates for stream directory handling
	-	A stream is not registered with the directory until after the first minute has passed.
		Some streams have been stuck in a connect/disconnect loop.
	-	Increase retry time on failure, if the stream add is rejected then it will be down to
		a misconfiguration so a long retry delay is performed.
	-	A YP server that is not responding is ignored for a while.
-	Updates for Win32. Newer versions of dependency libs (libxml2/libxslt/libcurl etc).
	Buffer overflow fixes when many streams are active.
-	Accept/Ban IP support. Now takes filenames for explicitly accepting or denying requests from specified IP addresses.  
	Useful in cases where firewall access is not available. The files, if defined, are re-read automatically if updated.
-	A Mountpoint is exported to the slaves even if no mount section is defined for it.
	You can still use the hidden setting to prevent that from happening.
-	Relays handle redirection (HTTP 302) if one is received at startup.
-	Automatically generate XSPF playlist like we do with M3U, the mountpoint extension is .xspf
-	Header updates for proxy handling and certain clients like some shoutcast source clients and flash players.
-	Added Kate/Skeleton codecs to Ogg handler.
-	Various stats cleanups. Added some global stats (server ID, email contact etc).
-	The streamlist passed from master to slave had a limited length, so if there were many streams then some could of been left out.
-	Documentation updates.
-	Relay startup/shutdown is cleaner.
-	Several build cleanups.
-	Several resource leaks and race conditions fixed.
