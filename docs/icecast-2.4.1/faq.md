---
title: FAQ
version: 2.4.0
---

{::options auto_ids="true" /}

<article markdown="1">
# General Questions

## What is Icecast.org?
Icecast.org, the project, is a collection of programs and libraries for streaming audio over the Internet. This includes:
*	Icecast, a program that streams audio data to listeners
*	libshout, a library for communicating with Icecast servers
*	IceS, a program that sends audio data to Icecast servers

A source client is an external program which is responsible for sending content data to Icecast. Some source clients that
support Icecast 2 are Oddcast, Ices 2, Ices 0.3, and DarkIce.

## What is Icecast, the program?
Icecast streams audio to listeners, and is compatible with Nullsoft's Shoutcast.

## What is libshout?
libshout is a library for communicating with and sending data to an Icecast server. It handles the socket connection,
the timing of the data, and prevents bad data from getting to the Icecast server.

## What is Ices?
Ices is a program (source client) that sends audio data to an Icecast server to broadcast to clients.  
Ices can either read audio data from disk, such as from Ogg Vorbis files, or sample live audio from a sound card and encode
it on the fly.

## What can I use to listen to an Icecast stream?
We maintain a list of Icecast-compatible audio players at [icecast.org](http://www.icecast.org/).
</article>
