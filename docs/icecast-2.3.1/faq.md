---
title: FAQ
version: 2.3.1
---

<div class="article" markdown="1">
# General Questions

## What is Icecast?
Icecast, the project, is a collection of programs and libraries for streaming audio over the Internet. This includes:
*	icecast, a program that streams audio data to listeners
*	libshout, a library for communicating with Icecast servers
*	IceS, a program that sends audio data to Icecast servers

A source client is an external program which is responsible for sending content data to icecast. Some source clients that
support icecast 2 are Oddcast, Ices 2, Ices 0.3, and DarkIce.

## What is icecast, the program?
icecast streams audio to listeners, and is compatible with Nullsoft's Shoutcast.

## What is libshout?
libshout is a library for communicating with and sending data to an Icecast server. It handles the socket connection,
the timing of the data, and prevents bad data from getting to the Icecast server.

## What is IceS?
IceS is a program (source client) that sends audio data to an Icecast server to broadcast to clients.  
IceS can either read audio data from disk, such as from Ogg Vorbis files, or sample live audio from a sound card and encode
it on the fly.

## How can I view the stream status page?
Check your icecast configuration file for an element called `<webroot>`. This directory contains web stuff. In it, place a file called "status.xsl" that transforms an XML file containing stream data into a web page (either XHTML or HTML).  
  
There are sample XSL stylesheets available in icecast/web/ in the CVS distribution of icecast.  
  
In addition, the web directory can hold multiple status transforms, if you can't decide which one you want.  

## What can I use to listen to an Icecast stream?
We maintain a list of Icecast-compatible audio players at [icecast.org](http://www.icecast.org/).
</div>
