---
title: IceS
permalink: /ices/
---
{% assign docs = site.pages | where:"product","IceS" | sort:"version" | group_by:"version" %}
<div class="article" markdown="1">
# What is IceS?

IceS is a source client for the Icecast streaming server. The purpose of this client is to provide
an audio stream to Icecast, so that one or more listeners can access the stream.
With this layout, the source client can be situated remotely from the Icecast server.  
  
The primary example of a streaming server used is Icecast 2, although others could be
used if certain conditions are met.  
IceS 2.x supports sending an Ogg Vorbis stream to an Icecast server.  
For MP3 support you may want to take a look at IceS 0.x.

</div>

<div class="article" markdown="1">
# Download

-	__IceS 2 (version 2.0)__  
	Source client for broadcasting in Ogg Vorbis format to an Icecast 2 server
	*	[ices-2.0.3.tar.bz2](https://downloads.xiph.org/releases/ices/ices-2.0.3.tar.bz2)
	*	[ices-2.0.3.tar.gz](https://downloads.xiph.org/releases/ices/ices-2.0.3.tar.gz)
-	__IceS 0 (deprecated)__  
	source client for broadcasting in MP3 format to an icecast2 server
	*	[ices-0.4.tar.gz](https://downloads.xiph.org/releases/ices/ices-0.4.tar.gz)

## Documentation

Documentation for IceS 2 can be found [here](docs/ices-2.0.3/).

All Docs:
{% for doc in docs reversed %}
{% if doc.name != "" %}
*	[IceS {{ doc.name }} Docs]({{ site.baseurl }}/ices/docs/ices-{{ doc.name }}/)
{% endif %}
{% endfor %}

</div>

