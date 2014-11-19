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
{% for doc in docs reversed %}
{% if doc.name != "" %}
*	[Icecast {{ doc.name }} Docs]({{ site.baseurl }}/docs/icecast-{{ doc.name }}/)
{% endif %}
{% endfor %}

Also, we have a simple [FAQ]({{ "/faq" | prepend: site.baseurl }}).

</div>

<div class="article" id="other" markdown="1">
# Other Information

This is a list of some helpful external material (in various languages). Note that these are unofficial and maybe outdated!

- [[EN] Ciaran Anscomb's IceS 2 How-To](http://www.6809.org.uk/kja3/ices2-howto.shtml)
- [[DE] <del>German Icecast 2 Introduction by MPeX</del>](http://www.mpex.net/info/icecast.html) (outdated)
- [[PT] Montando um Servidor de Webradio](https://docs.indymedia.org/Sysadmin/IceCastPtBr)
- [[PT] Transmissão de Vídeo pela Internet e Web TVs](https://docs.indymedia.org/Sysadmin/WebTVPt)

</div>
