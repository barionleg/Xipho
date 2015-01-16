---
title: YP Directories
version: 2.4.99.1
---

{::options auto_ids="true" /}

<div class="article" markdown="1">
# Overview
A YP directory is a listing of broadcast streams. Icecast has it own YP directory located at
[http://dir.xiph.org](http://dir.xiph.org). Currently Icecast can only be listed in an Icecast-supported YP directory.  
This means that you cannot list your stream in the Shoutcast YP directory, due to their terms of service.

In the Icecast configuration file are all the currently available YP directory servers. Listing your stream in a YP is
a combination of settings in the Icecast configuration file and also in your source client. It is of great importance
to configure Icecast correctly, as even one wrong setting can prevent listings to be accepted by a YP directory.

</div>

<div class="article" markdown="1">
# Configuring Icecast for YP Support
First of all, Icecast must have been built with YP support. This is automatically done if you have libcurl installed.
If libcurl is not detected when icecats is compiled, then YP support is disabled.  
If Icecast has been built with YP support, then the following configuration options control the YP directory settings:

{% highlight xml %}
<directory>
    <yp-url-timeout>15</yp-url-timeout>
    <yp-url>http://dir.xiph.org/cgi-bin/yp-cgi</yp-url>
</directory>
{% endhighlight %}

Multiple directory XML chunks can be specified in order to be listed in multiple directories.

## Further options that play a significant role in YP listings

### `<hostname>`
The hostname option **MUST** be set to a name that resolves to the machine this Icecast server runs on.

### `<listener-socket><port>`
The **first** `listener-socke`+`port` entry is used to build the URL advertized to the YP server.

### `<listener-socket><bind-address>`
If you don't specify an explicit `bind-address`, including `::` and `0.0.0.0`, then the default
bind behaviour of your operating system will apply, this may have unexpected consequences for dual-stack
(IPv6 and IPv4) setups.

If your hostname resolves to both an AAAA and an A record (IPv6 and IPv4), then you **MUST** verify,
that Icecast listens to both. If in doubt create two listener-socket entries and use `::` and `0.0.0.0`
as the respective `bind-address`.

### `<admin>` contact
If you are listing on a YP, then this field **MUST** contain a valid email address of a technical contact
on your side. YP admins will use this to reach you in case your server is misconfigured and causes problems
for the YP directory. An invalid or unreachable address is likely to get your radio/server/network banned from YP.

### Verifying the advertized URL

After adjusting the settings and configuring your source client, you should verify setup:   
Go to the Icecast web interface, specifically the admin part `/admin/` and look for the `listenurl` values 
of your streams. These URLs **MUST** work from the public internet, or your listings will fail.

This is also one of the checks performed by a YP server. Common misconfigurations are:  
 * `<hostname>` set to `localhost`
 * `<hostname>` set to some address that does **NOT** point to the Icecast server
 * hostname has AAAA record but Icecast not bound to `::`
 * multiple `<listener-socket>` entries, but the first one is not publicly reachable

</div>

<div class="article" markdown="1">
# Configuring Your Source Client for YP Support
This is usually covered in the source client documentation. More specifically, the source client needs to provide
the HTTP header `Ice-Public: 1` on connect in order to enable YP listing of the stream.  
This can however be overridden in the server side mount point settings, refer to “[Icecast Config File](config-file.html#mountsettings)”
for further details.  
If a mountpoint is being listed on a YP, then you will see some additional statistics relating to the YP such as
`last-touch`, `currently-playing`, etc.

</div>

<div class="article" markdown="1">
# Troubleshooting
As with all Icecast problems, the error log is the goto place to start. If necessary temporary increase the log level to 
`4` (debug) and reload the Icecast config. All relevant messages will contain `YP`. Especially those messages that tell
you that something `failed` will contain important hints and or messages from the YP server. If your entry submission
is directly rejected the server will tell why, if your entry gets delisted after submission, then you will see 
updates/touches fail. Depending on the YP server the stream reachability check will be deferred, so you will see
a successfull initial submission, but if your stream is found to be unreachable it will be delisted and updates will fail.
Please note that YP directories will check both IPv6 and IPv4 availability of streams. See the list of common misconfigurations
for further hints.

Should you still have problems listing on [http://dir.xiph.org](dir.xiph.org), then please:
* set your logging to `4` (debug)
* reload/restart Icecast
* make sure your streams are running and marked public (either by source setting or mountpoint override)
* wait for **one hour**
* filter the error log for messages from the last hour, that are beginning with `yp/`
* join the [http://lists.xiph.org/mailman/listinfo/icecast](Icecast users mailing list) (else the following step will fail!)
* send a mail to [mailto:icecast@xiph.org](icecast@xiph.org) containing:
 1. The public URL of your Icecast server - e.g. `http://icecast.example.org:8000/` (Even if you have removed the status pages! This does **NOT** mean your homepage.)
 2. The `<hostname>`, `<listen-socket>` and `<directory>` sections of your `icecast.xml`
 3. The *filtered* error.log prepared previously (as an attachment)
* wait for replies from the mailing list

</div>

