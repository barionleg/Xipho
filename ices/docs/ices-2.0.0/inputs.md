---
title: Input Modules
version: 2.0.0
---

<article markdown="1">
Several input modules are available, depending on the platform, drivers and libraries available. The general layout is defined as

{% highlight xml %}
<input>
    <module>module name</module>
    <param name="name1">value</param>
    <param name="name2">value</param>
    <param name="name3">value</param>
</input>
{% endhighlight %}

For live input you may want to look into various resources on the web for information on sound input. You may find that ALSA for instance supports a particular soundcard better than the Open Sound System.

</article>

<article markdown="1">
# Open Sound

{% highlight xml %}
<module>oss</module>
<param name="rate">44100</param>
<param name="channels">2</param>
<param name="device">/dev/dsp</param>
<param name="metadata">1</param>
<param name="metadatafilename">/home/ices/metadata</param>
{% endhighlight %}

This module is for reading live input from the Open Sound System drivers, often found on linux systems but are available on others. This will read audio from the DSP device in a format specified in the parameters provided.  
  
The following can be used to configure the module

rate
: The value is in hertz, 44100 is the samplerate used on CD's, but some drivers may prefer 48000 (DAT) or you may want to use something lower.

channels
: The number of channels to record. This is typically 2 for stereo or 1 for mono

device
: The device to read the audio samples from, it's typically /dev/dsp but there maybe more than one card installed.

metadata
: Check for metadata arriving, if any are present then the data is marked for an update. The metadata is in the form of tag=value, and while Ogg Vorbis can handle any supplied tags, most players will only do anything with artist and title.

metadatafilename
: The name of the file to open and read the metadata tags from, with this parameter missing standard input is read. Using a file is often the better approach. When using the file access the procedure is usually to populate the file contents then send a SIGUSR1 to the IceS process.  
  The format of the file itself is a simple one comment per line format, below is a trivial example of the file, other tags can be used but players tend to only look for artist and title for displaying. The data must be in UTF-8 (this is not checked by ices, however).  
  `artist=Queen`  
  `title=We Will Rock You`  

</article>

<article markdown="1">
# ALSA
The Advanced Linux Sound Architecture (ALSA) is a completely different sound system on linux but provides OSS compatability so the OSS driver should work with it as well. To use ALSA natively a separate module is used

{% highlight xml %}
<module>alsa</module>
<param name="rate">44100</param>
<param name="channels">2</param>
<param name="device">hw:0,0</param>
<param name="periods">2</param>
<param name="buffer-time">500</param>
<param name="metadata">1</param>
<param name="metadatafilename">/home/ices/metadata</param>
{% endhighlight %}

The parameters to ALSA are mostly the same for OSS, as it performs the same task, ie captures audio from the DSP.

device
: This is the device name as used in ALSA. This can be a physical device as in the case of "hw:0,0" or a virtual device like one with dsnoop.

periods
: This specifies how many interrupts will be generated (default: 2)

buffer-time
: The size of the buffer measured in mS (default 500)

</article>

<article markdown="1">
# Sun
The Sun Solaris DSP input is similar to OSS. It allows for reading from a soundcard on a Sun Solaris UNIX. OpenBSD also has a sound driver that is similar to solaris and as such should be able to use this module.

{% highlight xml %}
 <module>sun</module>
{% endhighlight %}

The parameters are the same as the OSS and ALSA modules.

</article>

<article markdown="1">
# StdinPCM

{% highlight xml %}
<module>stdinpcm</module>
<param name="rate">44100</param>
<param name="channels">2</param>
<param name="metadata">1</param>
<param name="metadatafilename">/home/ices/metadata</param>
{% endhighlight %}

This module should always be available, and as you can see the parameters are almost the same except for the device. The PCM audio comes from the standard input so it can be generated from some external application feeding into a pipe.
  
As it's raw PCM being fed in, it's impossible to determine the samplerate and channels so make sure the stated parameters match the incoming PCM or the audio will be encoded wrongly.  

</article>

<article markdown="1">
# Playlist
The playlist module is used to get audio from some pre-encoded Ogg Vorbis files. IceS currently checks to see if the same file gets played in succession and skips it, this means that having a playlist repeat with only one Ogg file listed won't work. The method of file selection is determined by the playlist type. The current types are basic and script.

## Basic

{% highlight xml %}
<param name="type">basic</param>
<param name="file">/path/to/playlist</param>
<param name="random">0</param>
<param name="once">0</param>
<param name="restart-after-reread">1</param>
{% endhighlight %}

file
: State a path to a file which will contain a list of Ogg Vorbis filenames to play. One per line with lines beginning with '#' being treated as comments. If a line has a single '-' then standard input is read, which provides a way of getting some external Ogg Vorbis stream into ices.

random
: When set to 1, the playlist will be randomised when the playlist is loaded. By default random is off

once
: When set to 1, the playlist is gone through once and then ends, this will cause ices to exit. By default once is off.

restart-after-reread
: If the playlist is re-read mid way through, which may occur if the playlist was updated then this will restart at the beginning of the playlist. By default it's off.

</article>

<article markdown="1">
# Script

{% highlight xml %}
<param name="type">script</param>
<param name="program">/path/to/program</param>
{% endhighlight %}

program
: State a path to a program which when run will write to it's standard output a path to an Ogg Vorbis file. The program can be anything from an executable to a shell script as long as it starts, writes the filename to it's standard output and then exits.

</article>
