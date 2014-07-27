---
title: Basic Setup
version: 2.0.2
---

<article markdown="1">
# What does IceS require?
IceS v2 is not a graphical application, it's purpose is to stream whatever it is given into a stream for feeding to the Icecast streaming server. It does however require the following:

-	libogg available at [www.vorbis.com](http://www.vorbis.com/)
-	libvorbis available at [www.vorbis.com](http://www.vorbis.com/)
-	libxml2 available at [xmlsoft](http://xmlsoft.org/)
-	libshout 2 available at [The Icecast site](http://www.icecast.org/)

Please note that in many cases, pre-built packages are split into two, a run-time package, typically consisting of the actual run-time library and a development package, consisting of the support files needed to compile and link the application.  
  
The following are optional

-	ALSA. driver and libs available at [The ALSA site](http://www.alsa-project.org/)
-	RoarAudio driver and libs available at [The RoarAudio site](http://roaraudio.keep-cool.org/)

</article>

<article markdown="1">
# What does IceS do?
IceS reads audio data from an input and sends the audio data to one or more files or icecast servers. Before it's actually sent out, some processing maybe performed, typically resampling and/or downmixing to produce streams suited to various bandwidth requirements.  
  
The streams produced are Ogg Vorbis streams so while icecast 2 is capable of streaming these streams, other streaming servers may not be.

</article>

<article markdown="1">
# What input can IceS handle?
Several inputs currently exist, but some maybe dependant on certain platforms or if certain drivers or libraries are available.  

*	OSS - Open Sound System. Typically used on linux based systems to get live input from a soundcard.
*	ALSA - Advanced Linux Sound Architecture. Like OSS but with various improvements for linux based systems.
*	stdinpcm - Uses standard input to receive PCM audio.
*	playlist - Uses a playlist to read audio files for processing.
*	sun - like OSS, but for Sun Solaris, also works for OpenBSD
*	roar - RoarAudio is a modern, multi OS sound system.

</article>

<article markdown="1">
# How do you start IceS?
The configuration of IceS is done via an XML based config file. Which you supply as an argument to the program at invocation time. For example:  

`ices /etc/ices.xml`

</article>