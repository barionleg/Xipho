---
title: Table of Contents
version: 2.4.1
---

{::options auto_ids="true" /}

<article markdown="1">
# Pages

-	[Changes](changes.html)
-	[Introduction](introduction.html)
-	[Basic Setup](basic-setup.html)
-	[Icecast Config File](config-file.html)
-	[Admin Interface](admin-interface.html)
-	[Server Statistics](server-stats.html)
-	[Relaying](relaying.html)
-	[Listing in a YP directory](yp.html)
-	[Authentication](auth.html)
-	[Win32 specific documentation](win32.html)
-	[Glossary](glossary.html)
-	[FAQ](faq.html)

</article>

<article markdown="1">
# Icecast {{ page.version }} Readme
Icecast is a streaming media server which currently supports Ogg
Vorbis and MP3 audio streams. It can be used to create an Internet
radio station or a privately running jukebox and many things in
between. It is very versatile in that new formats can be added
relatively easily and supports open standards for commuincation and
interaction.  
  
Icecast is distributed under the GNU GPL, version 2. A copy of this
license is included with this software in the COPYING file.

</article>

<article markdown="1">
# Prerequisites
Icecast requires the following packages:

-	[libxml2](http://xmlsoft.org/downloads.html)
-	[libxslt](http://xmlsoft.org/XSLT/downloads.html)
-	[curl](http://curl.haxx.se/download.html) (>= version 7.10 required)
-	[ogg/vorbis](http://www.vorbis.com/files) (>= version 1.0 required)
-	openssl (optional, enable if SSL support is desired)

</article>

<article markdown="1">
# Build/Install
To build icecast on a Unix platform, perform the following:

Run

    ./configure
    make
    make install

to build and install this release.

A sample config file will be placed in `/usr/local/etc` (on UNIX) or in
the current working directory (on Win32) and is called `icecast.xml`

Documentation for Icecast is available in the doc directory, by
viewing `doc/index.html` in a browser.

Please email us at icecast@xiph.org, or come and see us 
at irc.freenode.net, channel #icecast, if you have any troubles.
</article>
