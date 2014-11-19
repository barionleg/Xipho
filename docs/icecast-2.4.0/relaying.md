---
title: Relaying
version: 2.4.0
---

{::options auto_ids="true" /}

<div class="article" markdown="1">
# Overview
Relaying is the process by which one server mirrors one or more streams from a remote server. The servers
need not be of the same type (i.e. Icecast can relay from Shoutcast). Relaying is used primarily for large
broadcasts that need to distribute listening clients across multiple physical machines.

</div>

<div class="article" markdown="1">
# Type of Relays
There are two types of relays that icecast supports.  
The first type is when both master and slave servers are Icecast 2 servers. In this case, a “master-slave” relay
can be setup such that all that needs to be done is configure the slave server with the connection information
(server IP and port) of the master server and the slave will mirror all mountpoints on the master server. The slave
will also periodically check the master server to see if any new mountpoints have attached and if so will relay those
as well.  

The second type of relay is a “single-broadcast” relay. In this case, the slave server is configured with a
server IP, port and mount and only the mountpoint specified is relayed. In order to relay a broadcast stream on
a Shoutcast server, you must use the “single-broadcast” relay and specify a mountpoint of `/`.

</div>

<div class="article" markdown="1">
# Setting Up a Master-Slave Relay
In order to setup a relay of this type both servers (the one you wish to relay and the one doing the relaying)
need to be Icecast 2 servers. The following configuration snippet is used as an example:

{% highlight xml %}
<master-server>192.168.1.11</master-server>
<master-server-port>8001</master-server-port>
<master-update-interval>120</master-update-interval>
<master-password>hackme</master-password>
{% endhighlight %}

In this example, this configuration is setup in the server which will be doing the relaying (slave server).
The master server in this case need not be configured (and actually is unaware of the relaying being performed)
as a relay. When the slave server is started, it will connect to the master server located at 192.168.1.11:8001
and will begin to relay all mountpoints connected to the master server. Additionally, every master-update-interval
(120 seconds in this case) the slave server will poll the master server to see if any new mountpoints have connected,
and if so, the slave server will relay those as well. Note that the names of the mountpoints on the slave server will
be identical to those on the master server. 

</div>

<div class="article" markdown="1">
# Setting Up a Single-Broadcast Relay
In this case, the master server need not be an Icecast 2 server. Supported master servers for a single-broadcast
relay are Shoutcast, Icecast 1.x, and of course Icecast 2. The following configuration snippet is used as an example:

{% highlight xml %}
<relay>
    <server>192.168.1.11</server>
    <port>8001</port>
    <mount>/example.ogg</mount>
    <local-mount>/different.ogg</local-mount>
    <relay-shoutcast-metadata>0</relay-shoutcast-metadata>
</relay>
{% endhighlight %}

In this example, this configuration is also setup in the server which will be doing the relaying (slave server). 
The master server in this case need not be configured (and actually is unaware of the relaying being performed) as a
relay. When the slave server is started, it will connect to the master server located at 192.168.1.11:8001 and will
begin to relay only the mountpoint specified (`/example.ogg` in this case). Using this type of relay, the user can
override the local mountpoint name and make it something entirely different than the one on the master server.
Additionally, if the server is a Shoutcast server, then the `<mount>` must be specified as `/`.  
And if you want the Shoutcast relay stream to have metadata contained within it (Shoutcast metadata is embedded
in the stream itself) then the `<relay-shoutcast-metadata>` needs to be set to `1`.

</div>
