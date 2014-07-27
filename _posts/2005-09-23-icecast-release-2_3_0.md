---
layout: post
title:  "Icecast Release 2.3.0"
date:   2005-09-23
author: oddsock
categories: icecast release
---

We are pleased to announce the next release of Icecast.

Downloads:

- Source: [icecast-2.3.0.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.3.0.tar.gz)
- SRPM: [icecast-2.3.0-0.src.rpm](http://downloads.xiph.org/releases/icecast/icecast-2.3.0-0.src.rpm)
- Windows: [icecast2_win32_v2.3.0_setup.exe](http://downloads.xiph.org/releases/icecast/icecast2_win32_v2.3.0_setup.exe)


## New features for 2.3.0

### Intro file support - per mount settable
Intro files will play when a listener first connects to a stream. This is designed for station
jingles and the like. If you don't broadcast in ogg vorbis, you must make sure the
bitrate/samplerate/number of channels match up to your stream.

### On-demand relays, global and per-relay settable
On demand relays only connect to the relayed content when there are listeners attached to the
relay. This can save bandwidth in certain cases.

### Fallback to file, extends on the intro file handling
With this feature, you can specify a "fallback file" which will be played in a loop and sent
your currently connected listeners in the event of a source client disconnect. This means your
listeners stay connected while you fix your disconnect problem. Same rules regarding
bitrate/samplerate/number of channels apply as with intro files.

### New mount-level settings

-	public, type/subtype, genre settings, stream description, stream url, stream name,
	bitrate (override what is sent from the source client)
-	mp3 metadata interval
-	on-(dis)connect scripts can be stated per-mount, invoked at source start/stop and take 1 arg which is the mountpoint.

### New URL listener authenticator
This delegates your listener authorization to an external application. URL calls are made on
listener connect/disconnect as well as source connect/disconnect. It is meant for large
broadcasters who have existing authentication systems that need to be integrated into. Included
is an example php-based application that can be used in conjunction with the url authenticator to
manage a simple subscription-based broadcast. 


### Other new features:

-	HTPasswd authenticator uses in-memory structures now
-	On demand files now can be fed through an authenticator
-	Streaming support for OGG Speex, OGG Flac, OGG Midi
-	Update to admin/web xslt interface
-	Icecast can now be installed as a win32 service


## Fixes for 2.3.0

-	real/helix works
-	win32 access log correct
-	stats client is stable now (curl -X STATS http://admin@host:port/)
-	show mountpoints on stats that are inactive but have an active fallback
-	more updates over HUP possible
-	improved stability under heavy load
-	moving clients will no longer sometimes deadlock the server
-	avoid small writes to reduce TCP overhead.
