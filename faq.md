---
title: FAQ
permalink: /faq/
---
<div class="article" id="toc" markdown="1">
# Table of Content
* [General Questions](#general-questions)
* [Setup](#setup)
* [Administration](#administration)
* [Interoperability](#interoperability)
</div>

<div class="article" id="general-questions" markdown="1">
# General Questions

## What is Icecast.org?
Icecast.org, the project, is a collection of programs and libraries for streaming audio over the Internet.
This includes:

- Icecast, a program that streams audio and video data to listeners
- libshout, a library for communicating with Icecast servers
- IceS, a program that sends audio data to Icecast servers

## What is Icecast, the program?
Icecast is a streaming server, which can stream audio (and video) to listeners/viewers.
It supports Ogg (Vorbis, Theora), Opus, FLAC and WebM (VP8/VP9), nonfree codecs/formats
like MP4 (H.264, MPEG4), M4A, NSV, AAC and MP3 might work, but we do not officially support
those.

## What is libshout?
libshout is a library for communicating with and sending data to an Icecast server.
It handles the socket connection, the timing of the data, and prevents bad data
from getting to the Icecast server.

## What is IceS?
IceS is a program that sends audio data to an icecast server to broadcast to clients.
IceS can either read audio data from disk, such as from Ogg Vorbis files, or sample
live audio from a sound card and encode it on the fly.

## Can I use Icecast to stream like Spotify/Rdio/Pandora?
No. This kind of "streaming" is very different from what Icecast does. In Icecast you
usually have a "station" (mountpoint) sourced by a source client like IceS and streamed
by Icecast to a large amount of listeners. This implies that all listeners of that mountpoint
get the same stream, so an individual listener can't pause the stream or add different tracks
without affecting all other users.

As already mentioned, Spotify and co. do not really "stream" in the classic meaning of the term.
Actually what they in most cases do is provide the client with the individual songs and the client
takes care of all the other things, like play/pause and playing the tracks in the desired order.
It's basically just simple file serving, which webservers like nginx or Apache do.

</div>

<div class="article" id="setup" markdown="1">
# Setup

## What platforms are supported?
Icecast is being developed on Linux and Windows, and is being tested with major Unices.

## How do I set up Icecast?
Go to the Icecast [Documentation]({{ "/docs" | prepend: site.baseurl }}) Page and follow
the instructions for your Icecast version there.

## I have copied a config from some website, but it's not working!
We strongly advise you to not copy a config from some website, it's likely
outdated or wrong. Please read the next question for more advise.

## How do I get started with the Icecast configuration?
You should start with the default config and only change the passwords. If you
need more things, carefully read the documentation and only add/change what you
really need.  
Most problems occur when over-configuring Icecast.

## What happened to the Windows GUI? I only see a black window with some text.
Icecast used to have a graphical user interface on Windows, but that was deprecated in 2.3.3
as it wasn't frequently used and hard to maintain. Considering that most of the things the GUI
could do now are possible using the Icecast web interface, it's not needed anymore.  
The black window with text you see is the command line running the Icecast server, just keep that
window open. When you want to quit Icecast, hit Ctrl+C and confirm that you want to quit.

## How can I run Icecast as a Service on Windows?
We do not have service capabilities in Icecast anymore, currently. Please see
[this Wiki page](https://wiki.xiph.org/Icecast_Server/Setup_Windows_Service)
for instruction how to set up Icecast as a service using a third party service
manager.

</div>

<div class="article" id="administration" markdown="1">
# Administration

## How can I view the stream status page?
Just navigate your web browser to host/port the Icecast server is listening on.

If you are a Windows user, make sure you started the Icecast server and then click on the
shortcut in the Startmenu, it will open the Icecats status page in your browser.

</div>

<div class="article" id="interoperability" markdown="1">
# Interoperability

## What can I use to listen to an Icecast stream?
Most mordern audio players should be able to play Icecast streams without problems, depending
on the format you are streaming in.  
We maintain a list of Icecast-compatible audio players [here]({{ "/apps" | prepend: site.baseurl }}).

</div>

