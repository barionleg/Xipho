---
title: Glossary
version: 2.3.1
---

<div class="article" markdown="1">
Source client
: A source client is an external program which is responsible for sending content data to Icecast.  
  Some source clients that support Icecast 2 are Oddcast, Ices 2, Ices 0.3 and DarkIce.

Slave server (Relay)
: The slave server in a relay configuration is the server that is pulling the data from the master server.
  It acts as a listening client to the master server.

Master server (Relay)
: The master server in a relay configuration is the server that has the stream that is being relayed.

Mountpoint
: A mountpoint is a resource on the Icecast server that represents a single broadcast stream. Mountpoints are
  named similar to files (`/mystream.ogg`, `/mymp3stream`).  
  When listeners connect to Icecast, they must specify the mountpoint in the request (i.e. `http://192.168.1.10:8000/mystream.ogg`).
  Additionally, source clients must specify a mountpoint when they connect as well. Statistics are kept track of by mountpoint.
  Mountpoints are a fundamental aspect of Icecast 2 and how it is organized.

Fallback mountpoint
: A fallback mountpoint is configured with a parent mountpoint. In the event of the parent mountpoint losing connection with Icecast,
  Icecast will then move all clients currently connected to the now defunct mountpoint to it's fallback mountpoint.

</div>
