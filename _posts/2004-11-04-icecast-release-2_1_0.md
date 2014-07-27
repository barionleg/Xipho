---
layout: post
title:  "Icecast Release 2.1.0"
date:   2004-11-04
author: oddsock
categories: icecast release
---

After about 8 months in development, version 2.1.0 of Icecast has been released.  

## New features for 2.1 (in no particular order)

### Listener Authentication
Icecast now supports listener authentication. This provides a mechanism for creating/maintaining
users and passwords for listeners. Currently, we only have implemented a simple, file-based storage
for users and passwords. New authenticators are on the horizon (such as URL-based or possibly
MySQL based) New admin pages were also added for the maintenance of users/passwords. Please
check the docs for a more detailed description of this new feature.  

### Multi-Level Fallbacks
Multi-level fallbacks allow for specifications of a series of fallback mounts that you can use
to automatically move listeners in the event of a source being disconnected. In the event of
new listeners attaching to the source stream that has been disconnected, they are routed to
the fallback mount (if specified). Icecast now has fallback-override capability as well which
means that in the event of a source stream failure, listeners are moved to the fallback mount,
and then automatically recaptured when the original source stream returns.  

### Burst-On-Connect
This is an new, optional config setting which will send a initial burst of data to connecting
listeners. This has the effect of reducing (significantly) the startup buffer latency from the
end-user perspective. This option is enabled by default.  

## New enhancements for 2.1

### Update to admin interface
This interface has been cleaned up quite a bit and made a bit nicer.

### Rewrite of the YP listing code
The icecast yp code has received a complete overhaul by karl, and it's
a much more stable and failure-resistant implementation.

### Lots and lots of bugs fixed
Check the ChangeLog for a complete list of these…


Download Icecast 2.1.0 from the [download page]({{ "/download" | prepend: site.baseurl }}).
