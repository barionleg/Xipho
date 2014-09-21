---
title: FAQ
permalink: /faq/
---
<article id="general-questions" markdown="1">
# General Questions

## What is Icecast.org?
Icecast.org, the project, is a collection of programs and libraries for streaming audio over the Internet.
This includes:

- Icecast, a program that streams audio data to listeners
- libshout, a library for communicating with Icecast servers
- IceS, a program that sends audio data to Icecast servers

## What is Icecast, the program?
Icecast streams audio (and video) to listeners/viewers, and is compatible with Nullsoft's Shoutcast.

## What is libshout?
libshout is a library for communicating with and sending data to an Icecast server.
It handles the socket connection, the timing of the data, and prevents bad data
from getting to the Icecast server.

## What is IceS?
IceS is a program that sends audio data to an icecast server to broadcast to clients.
IceS can either read audio data from disk, such as from Ogg Vorbis files, or sample
live audio from a sound card and encode it on the fly.

</article>

<article id="setup" markdown="1">
# Setup

## What platforms are supported?
Icecast is being developed on Linux and Windows, and is being tested with major Unices.

## How do I set up Icecast?
Go to the Icecast [Documentation]({{ "/docs" | prepend: site.baseurl }}) Page and follow
the instructions for your version there.

</article>

<article id="administration" markdown="1">
# Administration

## How can I view the stream status page?
Check your icecast configuration file for an element called `<webroot>`. This directory
contains web stuff. In it, place a file called `status.xsl` that transforms an XML file
containing stream data into a web page (either XHTML or HTML). There are sample XSL
stylesheets available in icecast/web/ in the CVS distribution of Icecast.
In addition, the web directory can hold multiple status transforms, if you
can't decide which one you want.

</article>

<article id="interoperability" markdown="1">
# Interoperability

## What can I use to listen to an Icecast stream?
We maintain a list of Icecast-compatible audio players [here]({{ "/apps" | prepend: site.baseurl }}).

</article>

