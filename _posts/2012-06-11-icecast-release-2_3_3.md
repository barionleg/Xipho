---
layout: post
title:  "Icecast Release 2.3.3"
date:   2012-06-11 22:00:00
author: dm8tbr
categories: icecast release
---

We are pleased to announce the next release of Icecast. A summary of the changes are listed below.

## Downloads

-   Source: [icecast-2.3.3.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.3.3.tar.gz)
-   Windows Setup: Not available

## Changes

-   Security (fixed 3 security issues):
	-   Improved HTTPS cipher handling and added support for chained certificates.
	-   Allow the source password to be undefined. There was a corner case, where a default password would have taken effect. It would require the admin to remove the 'source-password' from the icecast config to take effect. Default configs ship with the password set, so this vulnerability doesn't trigger there.
	-   Prevent error log injection of control characters by substituting non-alphanumeric characters with a `.` (CVE-2011-4612). Injection attempts can be identified via `access.log`, as that stores URL encoded requests. Investigation if further logging code needs to have sanitized output is ongoing.
-	Bugfixes (this is mostly a bug-fix release to flush out the accumulated, mostly small, fixes):
	-	On-demand relaying - Reject listeners while reconnecting. Fix stats for relays without mount section.
	-	Prevent too frequent YP updates.
	-	Only allow raw metadata updates from same IP as connected source (unless user is admin). This addresses broken client software that issues updates without being connected.
	-	Minor memory leaks
	-	XSPF file installation
	-	Fix case of global listeners count becoming out of sync.
	-	Setting an interval of 0 in mount should disable shoutcast metadata inserts.
-	Authentication
	-	Sources can now be authenticated via URL, like listeners.
		Post info is  
		`action=stream_auth&mount=/stream&ip=IP&server=SERVER&port=8000&user=fred&pass=pass`  
		As admin requests can come in for a stream (eg metadata update) these requests can be issued while stream is active. For these `&admin=1` is added to the POST details.
-	XSL update
	-	Automatically generate VCLT playlist like we do with M3U, the mountpoint extension is `.vclt`
-	Documentation updates
