---
title: Documentation and Information
layout: page
---
{% assign docs = site.pages | where:"product","Icecast" | sort:"version" | group_by:"version" %}

<div class="article" id="official-docs" markdown="1">
# Official Documentation

Here is an index to the Icecast documentation we know about. If there is
something out there on the Web that you know about, but is not listed here,
[contact us]({{ "/contact" | prepend: site.baseurl }}).

The latest official Icecast documentation is available [here]({{ "/docs/icecast-latest" | prepend: site.baseurl }}).

All Docs:

*	[Icecast 2.4.1 Docs]({{ "/docs/icecast-2.4.1/" | prepend: site.baseurl }})
*	[Icecast 2.4.0 Docs]({{ "/docs/icecast-2.4.0/" | prepend: site.baseurl }})
*	[Icecast 2.3.3 Docs]({{ "/docs/icecast-2.3.3/" | prepend: site.baseurl }})
*	[Icecast 2.3.2 Docs]({{ "/docs/icecast-2.3.2/" | prepend: site.baseurl }})
*	[Icecast 2.3.1 Docs]({{ "/docs/icecast-2.3.1/" | prepend: site.baseurl }})
*	[Icecast 2.3.0 Docs]({{ "/docs/icecast-2.3.0/" | prepend: site.baseurl }})
*	[Icecast 2.2.0 Docs]({{ "/docs/icecast-2.2.0/" | prepend: site.baseurl }})
*	[Icecast 2.1.0 Docs]({{ "/docs/icecast-2.1.0/" | prepend: site.baseurl }})
*	[Icecast 2.0.2 Docs]({{ "/docs/icecast-2.0.2/" | prepend: site.baseurl }})
*	[Icecast 2.0.1 Docs]({{ "/docs/icecast-2.0.1/" | prepend: site.baseurl }})

Also, we have a simple [FAQ]({{ "/faq" | prepend: site.baseurl }}).

Unstable Docs:

*	[Icecast 2.5.0 Docs (WIP)]({{ "/docs/icecast-trunk/" | prepend: site.baseurl }})

</div>

<div class="article" id="other" markdown="1">
# Other Information

This is a list of some helpful external material (in various languages). Note that these are unofficial and maybe outdated!

- [[EN] Ciaran Anscomb's IceS 2 How-To](http://www.6809.org.uk/kja3/ices2-howto.shtml)
- [[DE] <del>German Icecast 2 Introduction by MPeX</del>](http://www.mpex.net/info/icecast.html) (outdated)
- [[PT] Montando um Servidor de Webradio](https://docs.indymedia.org/Sysadmin/IceCastPtBr)
- [[PT] Transmissão de Vídeo pela Internet e Web TVs](https://docs.indymedia.org/Sysadmin/WebTVPt)

</div>
