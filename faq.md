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
* [Configuration](#configuration)
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

## What is a mountpoint?
A mountpoint is the path a resource such as a stream, or a static, or a generated file is
is associated with. The mountpoint is used when accessing the the resource.
Each mountpoint is associated with exactly one resource.

Icecast allows virtually any number of sources to mount different mountpoints at the same time.
This permits streaming a number of different streams or channels with different content.

Mountpoints are created automatically when a resource is connected to them.
There is no need to configure them at all. Mountpoints under "`/admin/`" are special
as they provide the API, and administration interface.
Mountpoints do not contain query parameters, or fragment identifiers.

## What is a source?
A source is a process that mounts a mountpoint.
In simple words it is a software that connects a stream at a path on the Icecast server.

The mountpoint is created as the software connects. Therefore if the source uses the
default credentials (username "`source`", and the password from the `<source-password>` tag)
there is no need to configure anything on the Icecast side.

## What is the default mountpoint?
There is none. Mountpoints are created automatically when a source mounts (connects to) them.

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
shortcut in the Startmenu, it will open the Icecast status page in your browser.

</div>

<div class="article" id="interoperability" markdown="1">
# Interoperability

## What can I use to listen to an Icecast stream?
Most mordern audio players should be able to play Icecast streams without problems, depending
on the format you are streaming in.  
We maintain a list of Icecast-compatible audio players [here]({{ "/apps" | prepend: site.baseurl }}).

</div>

<div class="article" id="configuration" markdown="1">
# Configuration

## What should I set `<location>` to?
The `<location>` tag sets free form string that is listed publically as the server's location.
(This is not the location of your station/studio.)
The value should include at least the nation, and city.

A good example would be "`Datacentre 4, OurSuperCompany GmbH, Frankfurt am Main, Germany`".
A bad example would be "`Frankfurt`" (which one?) or "`rack4.2`".

## What should I set `<admin>` to?
The `<admin>`tag sets a free form string that is listed publically as the server's contact.
This is normally an e-mail address, but could also be a phone number.
(If you use a phone number please use the international format starting with "`+`".)

## What should I set `<hostname>` to?
This is the public hostname of your Icecast. Your server is reachable by this domain name.
It is used in a few cases Icecast needs to know how it is reachable from the outside.
One such case is for yp / directory submission.

You should set this to a DNS name that has at least a `A`, or `AAAA` resource record pointing to
this instance. Using of IP addresses, or (website) URIs is invalid.

## Does setting `<server-id>`, or `<fileserve>` make my server more secure?
No. Altering this settings does not improve security. However setting those values can easily
break your server. It is best not to touch those options at all.

</div>
