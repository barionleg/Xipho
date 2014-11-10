---
title: Admin Interface
version: 2.4.1
---

{::options auto_ids="true" /}

<article markdown="1">
# Overview
This section contains information about the admin interface of icecast. Through this interface the user can manipulate many server features. From it you can gather statistics, move listeners from mountpoint to mountpoint, disconnect connected sources, disconnect connected listeners, and many other activities. Each function is enumerated here as well as an example usage of the function.

Each of these functions requires HTTP authentication via the appropriate username and password. For mount-specific functions, you may use either the `<admin-username>` and `<admin-password>` specified in the icecast config file, or the username and password specified for that mountpoint (if any). For general functions (not specific to a single mountpoint), you must use the admin username and password. It is also important to note that in all the examples 192.168.1.10 is used as the example host and 8000 is used as the example port for the icecast server.

</article>

<article markdown="1">
# Admin Functions (mount specific)
All these admin functions are mount specific in that they only apply to a particular mountpoint
(as opposed to applying to the entire server). Each of these functions requires a mountpoint to
be specified as input.

## Metadata Update

This function provides the ability for either a source client or any external program to update
the metadata information for a particular mountpoint.

Example:  
`http://192.168.1.10:8000/admin/metadata?mount=/mystream&mode=updinfo&song=ACDC+Back+In+Black`

## Fallback Update
This function provides the ability for either a source client or any external program to update the
“fallback mountpoint” for a particular mountpoint. Fallback mounts are those that are used in the even
of a source client disconnection. If a source client disconnects for some reason that all currently
connected clients are sent immediately to the fallback mountpoint.

Example:  
`http://192.168.1.10:8000/admin/fallbacks?mount=/mystream.ogg&fallback=/myfallback.ogg`

## List Clients
This function lists all the clients currently connected to a specific mountpoint. The results are sent
back in XML form.

Example:  
`http://192.168.1.10:8000/admin/listclients?mount=/mystream.ogg`

## Move Clients (Listeners)
This function provides the ability to migrate currently connected listeners from one mountpoint to another.
This function requires 2 mountpoints to be passed in: mount (the *from* mountpoint) and destination
(the _to_ mountpoint). After processing this function all currently connected listeners on mount will
be connected to destination. Note that the destination mountpoint must exist and have a sounce client
already feeding it a stream.

Example:
`http://192.168.1.10:8000/admin/moveclients?mount=/mystream.ogg&destination=/mynewstream.ogg`

## Kill Client (Listener)
This function provides the ability to disconnect a specific listener of a currently connected mountpoint.
Listeners are identified by a unique id that can be retrieved by via the “List Clients” admin function.
This id must be passed in to the request via the variable `id`. After processing this request, the listener will no longer be
connected to the mountpoint.

Example:
`http://192.168.1.10:8000/admin/killclient?mount=/mystream.ogg&id=21`

## Kill Source
This function will provide the ability to disconnect a specific mountpoint from the server. The mountpoint
to be disconnected is specified via the variable `mount`.

Example:
`http://192.168.1.10:8000/admin/killsource?mount=/mystream.ogg`

</article>

<article markdown="1">
# Admin Functions (general)

## Stats
The stats function provides the ability to query the internal statistics kept by the Icecast server.
Almost all information about the internal workings of the server such as the mountpoints connected,
how many client requests have been served, how many listeners for each mountpoint, etc, are available
via this admin function.  
Note that this admin function can also be invoked via the http://server:port/admin/stats.xml syntax,
however this syntax should not be used and will eventually become deprecated!

Example:  
`http://192.168.1.10:8000/admin/stats`

## List Mounts
The list mounts function provides the ability to view all the currently connected mountpoints.

Example:
`http://192.168.1.10:8000/admin/listmounts`

</article>

<article markdown="1">
# Web-Based Admin Interface
As an alternative to manually invoking these URLs, a web-based admin interface was developed. This
interface provides the same functions that were identified and described above but presents them in
a little nicer way. The web-based admin Interface to Icecast is shipped with Icecast provided in the
`admin` directory and comes ready to use. All the user needs to do is set the path to this directory
in the config file via the `<adminroot>` config variable.  
The web-based admin interface is a series of XSLT files which are used to display all the XML obtained
via the URL admin interface. This can be changed and modified to suit the user's need. Knowledge of
XSLT and transformations from XML to HTML are required in order to make changes to these scripts.  

The main URL for the Web-Based Admin Interface is:  
`http://192.168.1.10:8000/admin/stats.xsl`  

From this URL all of the other admin functions can be exercised.
__Modification of existing XSLT transforms in `/admin` is allowed, but new files cannot be created here__.
Creation of new XSLT transforms as well as modification of existing transforms is allowed in `/web`.
These work using the document returned by `/admin/stats.xml`.  
To see the XML document that is applied to each admin XSLT, just remove the `.xsl` in your request
(i.e. `/admin/listclients`). You can then code your XSLT transform accordingly.

</article>