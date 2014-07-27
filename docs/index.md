---
title: Documentation and Information
layout: page
---
{% assign docs = site.pages | where:"product","Icecast" | sort:"version" | group_by:"version" %}

<article markdown="1">
# Official Documentation

Here is an index to the Icecast documentation we know about. If there is
something out there on the Web that you know about, but is not listed here,
[contact us]({{ "/contact" | prepend: site.baseurl }}).

The latest official Icecast documentation is available [here]({{ "/docs/latest" | prepend: site.baseurl }}).

All Docs:
{% for doc in docs reversed %}
{% if doc.name != "" %}
*	[Icecast {{ doc.name }} Docs]({{ site.baseurl }}/docs/icecast-{{ doc.name }}/)
{% endif %}
{% endfor %}

Also, we have a simple [FAQ]({{ "/faq" | prepend: site.baseurl }}).

</article>

<article markdown="1">
# Setup

## What platforms are supported?
Icecast is being developed on Linux and Windows, and is being tested with major Unices.

## How do I set up Icecast?
Go to the Icecast [Documentation]({{ "/docs" | prepend: site.baseurl }}) Page and follow
the instructions for your version there.

</article>

<article markdown="1">
# Administration

## How can I view the stream status page?
Check your icecast configuration file for an element called `<webroot>`. This directory
contains web stuff. In it, place a file called `status.xsl` that transforms an XML file
containing stream data into a web page (either XHTML or HTML). There are sample XSL
stylesheets available in icecast/web/ in the CVS distribution of Icecast.
In addition, the web directory can hold multiple status transforms, if you
can't decide which one you want.

</article>

<article markdown="1">
# Interoperability

## What can I use to listen to an Icecast stream?
We maintain a list of Icecast-compatible audio players [here]({{ "/apps" | prepend: site.baseurl }}).

</article>

