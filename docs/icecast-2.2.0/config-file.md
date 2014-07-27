---
title: Config File
version: 2.2.0
---

<article markdown="1">
# Overview
This section will describe each section of the config file and is grouped into the following sections:

-   [Limits](#limits)
-   [Authentication](#authentication)
-   [YP Directory Settings](#yp)
-   [Misc Server settings](#misc)
-   [Relay settings](#relay)
-   [Mount Specific settings](#mountsettings)
-   [File path settings](#path)
-   [Logging](#log)
-   [Security](#security)

</article>

<article markdown="1">
# Limits
{:#limits}

{% highlight xml %}
<limits>
    <clients>100</clients>
    <sources>2</sources>
    <threadpool>5</threadpool>
    <queue-size>102400</queue-size>
    <client-timeout>30</client-timeout>
    <header-timeout>15</header-timeout>
    <source-timeout>10</source-timeout>
    <burst-on-connect>1</burst-on-connect>
    <burst-size>65536</burst-size>
</limits>
{% endhighlight %}

This section contains server level settings that, in general, do not need to be changed.
Only modify this section if you know what you are doing.

clients
: Total number of concurrent clients supported by the server. Listeners are considered clients,
  but so are accesses to any static content (i.e. fileserved content) and also any requests to
  gather stats. These are max concurrent connections for the entire server (not per mountpoint).

sources
: Maximum number of connected sources supported by the server. This includes active relays and source clients

threadpool
: This is the number of threads that are started to handle client connections. You may need to
  increase this value if you are running a high traffic stream. This recommended value is for a
  small to medium traffic server.

queue-size
: This is the maximum size (in bytes) of a client (listener) queue. A listener may temporarily lag behind due to network congestion and in this case an internal queue is maintained for each listener. If the queue grows larger than this config value, then the listener will be removed from the stream.

client-timeout
: This does not seem to be used.

header-timeout
: The maximum time (in seconds) to wait for a request to come in once the client has made a connection
  to the server. In general this value should not need to be tweaked.

source-timeout
: If a connected source does not send any data within this timeout period (in seconds),
  then the source connection will be removed from the server.

burst-on-connect
: With this enabled, a connecting client will be sent a burst of audio data from the stream.
  This will have the effect of reducing the startup time for the stream from the perspective of the listener. This is due to the fact that most media players have local buffers that must be filled before the stream begins to play. This may introduce a small latency in the stream (difference in time between when the source plays a clip and the listener hears a clip). If this latency is important to you, then you can disable this feature. The latency is bitrate-dependent, but as an example, for a 128kbps stream, the latency between the source and the player is ~ 1.5 secs __without__ burst on connect, and __with__ burst on connect the latency is 3 secs.

burst-size
: The burst size is the amount of data (in bytes) to burst to a client at connection time. Like burst-on-connect,
  this is to quickly fill the pre-buffer used by media players. The default is 64 kbytes which is a typical size used by most clients so changing it is not usually required. This setting applies to all mountpoints.

</article>

<article markdown="1">
# Authentication
{:#authentication}

{% highlight xml %}
<authentication>
    <source-password>hackme</source-password>
    <relay-password>hackme</relay-password>
    <admin-user>admin</admin-user>
    <admin-password>hackme</admin-password>
</authentication>
{% endhighlight %}

This section contains all the usernames and passwords used for administration purposes or to connect sources and relays.

source-password
: The unencrypted password used by sources to connect to icecast2. Currently, the username for all source connections must be 'source'. This is likely to change in the future.

relay-password
: Currently not used.

admin-user/admin-password
: The username/password used for all administration functions. This includes retrieving statistics, accessing the web-based
  administration screens, etc. A list of these functions can be found in the "Administration" section of the manual.

</article>

<article markdown="1">
# YP Directory Settings
{:#yp}

{% highlight xml %}
<directory>
    <yp-url-timeout>15</yp-url-timeout>
    <yp-url>http://dir.xiph.org/cgi-bin/yp-cgi</yp-url>
</directory>
{% endhighlight %}

This section contains all the settings for listing a stream on any of the Icecast YP Directory servers.
Multiple occurances of this section can be specified in order to be listed on multiple directory servers.

yp-url-timeout
: This value is the maximum time Icecast will wait for a response from a particular directory server.
  The recommended value should be sufficient for most directory servers.

yp-url
: The URL which Icecast uses to communicate with the Directory server.
  The value for this setting is provided by the owner of the Directory server.

</article>

<article markdown="1">
# Misc Server Settings
{:#misc}

{% highlight xml %}
<hostname>localhost<hostname>

<!-- You can use these two if you only want a single listening socket -->
<!-- <port>8000</port> -->
<!-- <bind-address>127.0.0.1</bind-address> -->

<!-- You may have multiple <listen-socket> elements -->
<listen-socket>
  <port>8000</port>
  <bind-address>127.0.0.1</bind-address>
</listen-socket>
<listen-socket>
  <port>8001</port>
  <bind-address>127.0.0.1</bind-address>
  <shoutcast-compat>1</shoutcast-compat>
</listen-socket>

<fileserve>1</fileserve>
<shoutcast-mount>/live.nsv</shoutcast-mount>
{% endhighlight %}

This section contains miscellaneous server settings. Note that multiple listen-socket sections may be configured in order to have icecast2 listen on multiple network interfaces. If a bind-address is not specified for a particular listen-socket, then the hostname parameter will be used to specify the address that will be bound.  
  
port
: The TCP port that will be used to accept client connections.

bind-address
: And option IP address that can be used to bind to a specific network card. If not supplied, then `<hostname>` will be used.

shoutcast-compat
: This optional flag will indicate that this port will operate in 'shoutcast-compatibility' mode. Due to major differences in the source client connection protocol, if you wish to use any of the shoutcast DJ tools, you will need to configure at least one socket as shoutcast-compatible. Note that when in this mode, only source clients (and specifically shoutcast source clients) will be able to attach to this port. All listeners may connect to any of the ports defined without this flag. Also, for proper Shoutcast DSP compatibility, you must define a listen socket with a port one less than the one defined as 'shoutcast-compat'. This means if you define 8001 as shoutcast-compat, then you will need to define a listen port of 8000 and it must not also be defined as shoutcast-compat. See the example config file in the distribution for more info.

fileserve
: This flag turns on the icecast2 fileserver from which static files can be served. All files are served relative to the path specified in the `<paths><webroot>` configuration setting.

shoutcast-mount
: An optional mountpoint to use when shoutcast DSP compatible clients connect. The default is /stream but can be overridden here to use an alternative name which may include an extension that some clients require for certain formats.

</article>

<article markdown="1">
# Relay Settings
{:#relay}

{% highlight xml %}
<master-server>127.0.0.1</master-server>
<master-server-port>8001</master-server-port>
<master-update-interval>120</master-update-interval>
<master-password>hackme</master-password>

<relay>
  <server>127.0.0.1</server>
  <port>8001</port>
  <mount>/example.ogg</mount>
  <local-mount>/different.ogg</local-mount>
  <username>joe</username>
  <password>soap</password>
  <relay-shoutcast-metadata>0</relay-shoutcast-metadata>
</relay>
{% endhighlight %}

This section contains the server's relay settings. There are two types of relays: a "Master server relay" or a "Specific Mountpoint relay." A Master server relay is only supported between icecast2 servers and is used to relays all mountpoints on a remote icecast2 server.  

## Master Relay

The following diagram shows the basics of doing a Master relay. Note that Server 1 is configured with the `<master-server>`, `<master-server-port>`, etc settings and Server 2 is the server from which Server 1 will pull all attached mountpoints and relay them. Using a Master Server relay, ALL mountpoints on Server 2 will be relayed. If only specific mountpoints need to be relayed, then you must configure Server 1 as a "Specific Mountpoint Relay". Both Master server relays and Specific Mountpoint relays begin their "relaying" when the Server is started.

<pre>
      |-----|                       |-----|
      |     |  all mountpoints      |     | /mount1
      |     | &lt;-------------------  |     | /mount2.ogg
      |-----|                       |-----| /mount3
      Icecast 2                     Icecast 2
      Server 1                      Server 2
      (RELAY SERVER)                (MASTER SERVER)

     configured with
     &lt;master-server&gt;
     settings
</pre>

A server is configured as a Master Server relay by specifying the `<master-server>`, `<master-server-port>`, `<master-update-interval>`, `<master-password>` values in the config file. The server that is being relayed does not need any special configuration.

master-server
: This is the IP for the server which contains the mountpoints to be relayed (Master Server).

master-server-port
: This is the TCP Port for the server which contains the mountpoints to be relayed (Master Server).

master-update-interval
: The interval (in seconds) that the Relay Server will poll the Master Server for any new mountpoints to relay.

master-password
: This is the relay password on the Master server. It is used to query the server for a list of mountpoints to
  relay.
  

## Specific Mountpoint Relay

The following diagram shows the basics of doing a Specific Mountpoint relay. Note that Server 1 is configured with the `<relay>` settings and Server 2 is the server from which Server 1 will pull the specified mountpoint(s) and relay them. Using a Specific Mountpoint Relay, only those mountpoints specified on Server 1 will be relayed from Server 2.

<pre>
      |-----|                       |-----|
      |     |      /mount3          |     | /mount1
      |     | &lt;-------------------  |     | /mount2.ogg
      |-----|                       |-----| /mount3
      Icecast 2                     Icecast 2/Shoutcast/Icecast
      Server 1                      Server 2
      (RELAY SERVER)                (REMOTE SERVER)

     configured with
     &lt;relay&gt;
     settings
</pre>

Specific Mountpoint Relays can be configured to relay from an Icecast 2 server, as well as Icecast 1.x and Shoutcast.
A server is configured as a Specific Mountpoint Server relay by specifying a `<relay>` XML chunk in the config file
for each mountpoint to be relayed. The server that is being relayed does not need any special configuration.

{% highlight xml %}
<relay>
    <server>127.0.0.1</server>
    <port>8001</port>
    <mount>/example.ogg</mount>
    <local-mount>/different.ogg</local-mount>
    <username>joe</username>
    <password>soap</password>
    <relay-shoutcast-metadata>0</relay-shoutcast-metadata>
</relay>
{% endhighlight %}

server
: This is the IP for the server which contains the mountpoint to be relayed.

port
: This is the TCP Port for the server which contains the mountpoint to be relayed.

mount
: The mountpoint located on the remote server. If you are relaying a shoutcast stream,
  this must be `/`.

local-mount
: The name to use for the local mountpoint. This is what the mount will be named on the RELAY SERVER.

username
: The source of the relay may require authentication itself, if so state the username here.

password
: The source of the relay may require authentication itself, if so state the password here.

relay-shoutcast-metadata
: If you are relaying a Shoutcast stream, you need to specify this indicator to also relay the metadata (song titles) that is part of the Shoutcast stream (1=enabled, 0=disabled).  
  `1`: enabled, `2`: disabled

</article>

<article markdown="1">
# Mount Specific Settings
{:#mountsettings}

{% highlight xml %}
<mount>
    <mount-name>/example-complex.ogg</mount-name>
    <username>othersource</username>
    <password>hackmemore</password>
    <max-listeners>1</max-listeners>
    <dump-file>/tmp/dump-example1.ogg</dump-file>
    <fallback-mount>/example2.ogg</fallback-mount>
    <fallback-override>1</fallback-override>
    <no-yp>1</no-yp>
    <hidden>1</hidden>
    <burst-size>65536</burst-size>
    <authentication type="htpasswd">
            <option name="filename" value="myauth"/>
            <option name="allow_duplicate_users" value="0"/>
    </authentication>
</mount>
{% endhighlight %}

This section contains settings which apply only to a specific mountpoint. Within this section you can reserve a specific mountpoint and set a source username/password for that mountpoint (not yet implemented) as well as specify individual settings which will apply only to the supplied mountpoint.

mount-name
: The name of the mount point for which these settings apply.

username
: An optional value which will set the username that a source must use to connect using this mountpoint.

password
: An optional value which will set the password that a source must use to connect using this mountpoint.

max-listeners
: An optional value which will set the maximum number of listeners that can be attached to this mountpoint.

dump-file
: An optional value which will set the filename which will be a dump of the stream coming through 
  on this mountpoint.

fallback-mount
: This optional value specifies a mountpoint that clients are automatically moved to if the source shuts down or is not streaming at the time a listener connects. Only one can be listed in each mount and should refer to another mountpoint on the same server that is streaming in the same streaming format.  
  If clients cannot fallback to another mountpoint, due to a missing fallback-mount or it states a mountpoint that is just not available, then those clients will be disconnected. If clients are falling back to a mountpoint and the fallback-mount is not actively streaming but defines a fallback-mount itself then those clients may be moved there instead. This multi-level fallback allows clients to cascade several mountpoints.

fallback-override
: When enabled, this allows a connecting source client or relay on this mountpoint to move listening
  clients back from the fallback mount.

no-yp
: Setting this option prevents this mountpoint from advertising on YP. The default is 0 so YP advertising occurs however you may want to prevent it here if you intend listeners to connect to a local relay instead

public
: The default setting for this is `-1` indicating that it is up to the source client or relay to determine if this mountpoint
  should advertise. A setting of `0` will prevent any advertising and a setting of `1` will force it to advertise. 
  If you do force advertising you may need to set other settings listed below as the YP server can refuse to advertise
  if there is not enough information provided.

burst-size
: This optional setting allows for providing a burst size which overrides the default burst size as defined in limits.  
  The value is in bytes.

hidden
: Enable this to prevent this mount from being shown on the xsl pages. This is mainly for cases where a local relay is configured
  and you do not want the source of the local relay to be shown.

authentication
: This specifies that the named mount point will require listener authentication. Currently, we support a file-based
  authentication scheme (`type=htpasswd`).  
  Users and encrypted password are placed in this file (separated by a `:`) and all requests for this mountpoint will require that a user and password be supplied for authentication purposes. These values are passed in via normal HTTP Basic Authentication means (i.e. `http://user:password@stream:port/mountpoint.ogg`). Users and Passwords are maintained via the web admin interface. A mountpoint configured with an authenticator will display a red key next to the mount point name on the admin screens. You can read more about listener authentication [here](auth.html).

</article>

<article markdown="1">
# Path Settings
{:#path}

{% highlight xml %}
<paths>
    <basedir>./</basedir>
    <logdir>./logs</logdir>
    <pidfile>./icecast.pid</pidfile>
    <webroot>./web</webroot>
    <adminroot>./admin</adminroot>
    <alias source="/foo" dest="/bar"/>
</paths>
{% endhighlight %}

This section contains paths which are used for various things within icecast. All paths (other than any aliases) should not end in a `/`.

basedir
: This path is used in conjunction with the chroot settings, and specified the base directory that is chrooted to when the server is started.  
  _This feature is not supported on Win32._

logdir
: This path specifies the base directory used for logging. Both the `error.log` and `access.log` will be created relative to this directory.

pidfile
: This pathname specifies the file to write at startup and to remove at normal shutdown. The file contains the process id of the icecast process.  
  This could be read and used for sending signals to Icecast.

webroot
: This path specifies the base directory used for all static file requests. This directory can contain all standard file types
  (including mp3s and ogg vorbis files). For example, if webroot is set to `/var/share/icecast2`, and a request for
  `http://server:port/mp3/stuff.mp3` comes in, then the file `/var/share/icecast2/mp3/stuff.mp3` will be served.

adminroot
: This path specifies the base directory used for all admin requests. More specifically, this is used to hold the XSLT scripts used
  for the web-based admin interface. The admin directory contained within the icecast distribution contains these files.

alias
: Aliases are used to provide a way to create multiple mountpoints that refer to the same mountpoint.  
  For example: `<alias source="/foo" dest="/bar">`

</article>

<article markdown="1">
# Logging Settings
{:#log}

{% highlight xml %}
<logging>
    <accesslog>access.log</accesslog>
    <errorlog>error.log</errorlog>
    <playlistlog>playlist.log</playlistlog>
    <loglevel>4</loglevel> <!-- 4 Debug, 3 Info, 2 Warn, 1 Error -->
</logging>
{% endhighlight %}

This section contains information relating to logging within Icecast. There are three logfiles currently generated by Icecast,
an `error.log` (where all log messages are placed), and an `access.log` (where all stream/admin/http requests are logged).  
  
Note that on non-win32 platforms, a HUP signal can be sent to Icecast in which the log files are re-opened for appending giving the ability move/remove the log files.  

accesslog
: Into this file, all requests made to the icecast2 will be logged. This file is relative to the path specified by the `<logdir>` config value.

errorlog
: All Icecast generated log messages will be written to this file. If the loglevel is set too high (Debug for instance) then
  this file can grow fairly large over time. Currently, there is no log-rotation implemented.

playlistlog
: Into this file, a log of all metadata for each mountpoint will be written. The format of the logfile will most likely change over time
  as we narrow in on a standard format for this. Currently, the file is pipe delimited. This option is optional and can be removed entirely
  from the config file.

loglevel
: Indicates what messages are logged by icecast. Log messages are categorized into one of 4 types, Debug, Info, Warn, and Error.  
    
  The following mapping can be used to set the appropraite value:
  
  -   loglevel = `4`: Debug, Info, Warn, Error messages are printed
  -   loglevel = `3`: Info, Warn, Error messages are printed
  -   loglevel = `2`: Warn, Error messages are printed
  -   loglevel = `1`: Error messages only are printed

</article>

<article markdown="1">
# Security Settings
{:#security}

{% highlight xml %}
<security>
    <chroot>0</chroot>
    <changeowner>
        <user>nobody</user>
        <group>nogroup</group>
    </changeowner>
</security>
{% endhighlight %}

This section contains configuration settings that can be used to secure the icecast server by performing a chroot to a secured location.  
_This is currently not supported on Win32._

chroot
: An indicator which specifies whether a `chroot()` will be done when the server is started.
  The chrooted path is specified by the `<basedir>` configuration value.

changeowner
: This section indicates the user and group that will own the icecast process when it is started.  
  These need to be valid users on the system.

</article>