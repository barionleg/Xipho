---
title: YP Directories
version: 2.3.1
---

<article markdown="1">
# Overview
A YP (Yellow Pages) directory is a listing of broadcast streams. Icecast 2 has it own YP directory located at
[http://dir.xiph.org](http://dir.xiph.org). Currently Icecast can only be listed in an Icecast-supported YP directory.  
This means that you cannot list your stream in the Shoutcast YP directory.

In the Icecast configuration file are all the currently available YP directory servers. Listing your stream in a YP is
a combination of settings in the Icecast configuration file and also in your source client.

</article>

<article markdown="1">
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

</article>

<article markdown="1">
# Configuring Your Source Client for YP Support
This is usually covered in the source client documentation. More specifically, the source client needs to provide
the HTTP header `Ice-Public: 1` on connect in order to enable YP listing of the stream.  
If a mountpoint is being listed on a YP, then you will see some additional statistics relating to the YP such as
`last-touch`, `currently-playing`, etc.

</article>
