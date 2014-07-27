---
layout: post
title:  "Icecast Release 2.2.0"
date:   2004-12-21
author: oddsock
categories: icecast release
---

On the heels of version 2.1.0, we are releasing 2.2.0 with some new key features.

## New features for 2.2.0 (in no particular order)

### Theora Video support
Icecast now supports video streaming via theora. Currently, we require the latest
(alpha 4) version of libtheora. This is an optional compile, so if you don't have
theora then Icecast will safely ignore it.

### Shoutcast style source client support
Icecast now supports the connection protocol used by the Shoutcast DSP source client.
This is the same connection protocol used by their NSV encoding tools. This means that
not only can you use the Shoutcast DSP to stream to Icecast, but that you can also
stream NSV via their tools.  

### AAC is added as a supported streaming format
Not too many source clients support streaming in this format, but we support it.

### Cluster password
Now you can specify a cluster password as a option in the config. This will allow you
to cluster multiple servers/mounts into a single listing on the stream directory. Note
that this is different than “grouping” which groups together streams coming from the
same physical IP and with the same stream name. Clusters are meant for relays of the
same stream and will only be listed _once_ in the stream directory. When a listener
tunes into a cluster, they will be served an m3u file with all the clusters for that
stream. 

### Playlist Log
This is an option setting that will create an audit trail of metadata that comes through
Icecast. It is a single file that contains information for all mountpoints. 

### Range Support for static files
We now support seeking in files served off the icecast fserve.

### Metadata Update via Admin
We now support metadata updates via the admin interface for both MP3 _and_ Ogg Vorbis streams.

### Per mount hidden stats and YP prevention
You many now indicate certains mounts to be excluded (i.e. hidden) from the main status.xsl page.
This is useful when using local private relays. You can also override the YP setting (as in disable)
on a per-mount basis. Also useful for local private relays.

### Multiple example config files
We now have multiple config files for you to use as a base. A “simple” one for quick-start, and a
more detailed "advanced" one with all the features, as well as a “shoutcast compatable” one, which
shows how you'd config for using the shoutcast DSP.

### Relay user/pass
You can now specify authentication used by a relay. This is for the case where you have listener
authentication enabled for a mountpoint, and want to connect a relay to it.


Download Icecast 2.2.0 from the [download page]({{ "/download" | prepend: site.baseurl }}).