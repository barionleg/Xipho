---
layout: post
title:  "Icecast Release 2.3.1"
date:   2005-11-30
author: oddsock
categories: icecast release
---

## Downloads

-	Source: [icecast-2.3.1.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.3.1.tar.gz)
-	SRPM: [icecast-2.3.1-0.src.rpm](http://downloads.xiph.org/releases/icecast/icecast-2.3.1-0.src.rpm)
-	Windows Setup: [icecast2_win32_v2.3.1_setup.exe](http://downloads.xiph.org/releases/icecast/icecast2_win32_v2.3.1_setup.exe)

## New features for 2.3.1

-	new tag `<logsize>` in `<logging>` state the trigger size (in KB) for cycling the log files.
-	new tag `<logarchive>` in `<logging>` enable (`1`) if you want to use a timestamp for an extension when cycling logs.

## Fixes for 2.3.1

-	Handling of certain shoutcast source clients is fixed, this typically affected NSV source clients 
-	A race in source shutdown when listeners are authenticated could lead to server crash 
-	An audio glitch was possible in playback of vorbis streams when a new logical stream started (eg metadata update). 
-	Stats speedup. Processing large numbers of stats was slow. Typically only seen when using lots of streams on the same server. 
-	404 responses were being sent back in some places, now 403 is sent back. 
-	Auth URL now handles the authentication to scripts better.  
	The order in which username/password are selected is
	-	url is http://user:pass@host:port/....
	-	`<param name="username">` and `<param name="password">`
	-	with `listener_add`/`remove`, listener supplied username/password is used.
-	A streams intro file can now be changed, using HUP, on active streams. 
-	Mount without a name crashed the server 
-	Various documentation updates 
