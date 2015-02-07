---
title: Win32 Specifics
version: 2.4.99.1
---

{::options auto_ids="true" /}

<div class="article" markdown="1">
The Win32 port of Icecast 2 is a simple command line application,
it used to be a UI framework around the core Icecast 2 server.  

The GUI is no longer necessary as Icecast has achieved all of its 
functionality in its web interface.
  
Most of the features of Icecast 2 are available in the Win32 port.  
__A notable absence is IPv6 support.__
  
We are planning to reintroduce the capability to start Icecast 
as a Windows Service in the 2.5.0 release.

</div>
<div class="article" markdown="1">
# A note on outbound https connections

Icecast uses libcurl to make most of its outbound connections,
e.g. for URL based authentication.

We do support HTTPS for such connections, but on Windows do not
include a CA-certificate bundle. This means that by default
Icecast will not trust any HTTPS servers and connections will fail:

  WARN auth_url/auth_url.c auth to server https://example.org/ice-auth failed with Problem with the SSL CA cert (path? access rights?)

</div>
