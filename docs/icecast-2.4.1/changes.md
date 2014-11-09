---
title: Changes
version: 2.4.1
---

<article id="v{{ page.version }}" markdown="1">
# Version {{ page.version }}

## Fixes

-	Disabled SSLv3 and SSL compression explicitly to improve security
-	Updated the default ciphers to be more secure
-	Fixed JSON status API problems
	* Put the XSLT last item check into every filtered tag.
	* This way we shouldn't run into problems of this type anymore.
	* Also it should be easier to customize the XSLT this way, if someone wants to filter differently.
-	Fixed `<auth>` in `<mount type="default">` to work properly.
-	Fixed listener connection duration logging in access.log. Regression was introduced for only some platforms by an earlier security fix.
-	Fixed time zone reporting in _iso8601 fields on Windows.
-	added warnings on empty and default values of `<fileserve>`, `<hostname>`, `<location>`, `<admin>` and `<server-id>`
-	send errorlog (loglevel WARN) to stderr prior to opening logfiles.
-	Fixed handling of empty strings in config file. Now empty strings are handled in: accesslog, errorlog, logdir, webroot, adminroot and hopefully all kinds of port.
-	Be more verbose in case of fileserve off. People disable fileserve and then wonder why the web interface CSS breaks.
-	More details in log messages
	* Add source IP adress to startup and source exit logging
	* Add mountpoint to some log lines
-	Updated the config file to avoid common pitfalls and make some things more obvious.
-	Fixed some compiler warnings
-	Fixed autogen.sh to work properly on Mac OS

## New Features

-	Added support for global and mount specific custom HTTP headers.
	* The purpose is to support basic CORS use cases. This is both important for some HTML5 `<audio>` or `<video>` use cases and accessing the JSON status API.
        * The default icecast config contains the very permissive global header: <header name="Access-Control-Allow-Origin" value="*" />


</article>

<article id="v2.4.0" markdown="1">
# Version 2.4.0

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

