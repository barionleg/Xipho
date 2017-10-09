---
title: Config File
version: 2.0.2
---

<div class="article" markdown="1">
The ices 2 configuration file is in XML format, which is described in detail below. There are some sample XML files provided in the distribution under the conf directory which show the main way ices is used.  
  
live audio streaming, takes audio from the soundcard which can be captured from say the Mic, line-In, CD or a combination of these.

-	ices-oss.xml
-	ices-alsa.xml
-	ices-roar.xml

Playlist audio streaming, takes pre-encoded Ogg Vorbis files and either sends them as-is or re-encodes them to different settings

-	ices-playlist.xml

</div>

<div class="article" markdown="1">
# General layout

{% highlight xml %}
<?xml version="1.0"?>
<ices>
	general settings
	stream section
</ices>
{% endhighlight %}

</div>

<div class="article" markdown="1">
# General settings
These apply to IceS as a whole. The example below gives a useful example to work to

{% highlight xml %}
<background>0</background>
<logpath>/var/log/ices</logpath>
<logfile>ices.log</logfile>
<logsize>2048</logsize>
<loglevel>3</loglevel>
<consolelog>0</consolelog>
<pidfile>/var/log/ices/ices.pid</pidfile>
{% endhighlight %}

background
: Set to 1 if you want IceS to put itself into the background.

logpath
: A directory that can be written to by the user that IceS runs as. This can be anywhere you want but as log files are created, write access to the stated must be given.

logfile
: The name of the logfile created. On log re-opening the existing logfile is renamed to `<logfile>.1`

logsize
: When the log file reaches this size (in kilobytes) then the log file will be cycled (the default is 2Meg)

loglevel
: A number that represents the amount of logging performed.
  -	1 - Only error messages are logged
  -	2 - The above and warning messages are logged
  -	3 - The above and information messages are logged
  -	4 - The above and debug messages are logged

consolelog
: A value of 1 will cause the log messages to appear on the console instead of the log files. Setting this to 1 is generally discouraged as logs are cycled and writing to screen can cause stalls in the application, which is a problem for timing critical applications.

pidfile
: State a filename with path to be created at start time. This file will then contain a single number which represents the process id of the running IceS. This process id can then be used to signal the application of certain events.

</div>

<div class="article" markdown="1">
# Stream section
This describes how the input and outgoing streams are configured.

{% highlight xml %}
<stream>
    Metadata
    Input
    Instance
</stream>
{% endhighlight %}

## Metadata

{% highlight xml %}
<metadata>
	<name>My Stream</name>
	<genre>Rock</genre>
	<description>A short description of your stream</description>
	<url>http://mysite.org</url>
</metadata>
{% endhighlight %}

This section describes what metadata information is passed in the headers at connection time to icecast. This applies to each instance defined within the stream section but maybe overridden by a per-instance `<metadata>` section.

## Input
This section deals with getting the audio data into IceS. There are a few ways that can happen. Typically it's either from a playlist or via a soundcard.  
  
The layout is consistent between the different input modules. Within the input section a module tag is needed to identify the module in question. The rest are made up of param tags specific to the module. There can be several param tags supplied to a module. Details of the module parameters are shown later.

## Instance
Multiple instances can be defined to allow for multiple encodings, this is useful for encoding the same input to multiple bitrates. Each instance defines a particular set actions that occur on the passed in audio. Any modifications to the input data is isolated to the instance.

{% highlight xml %}
<instance>
	hostname
    port
    username
    password
    mount
    yp
    resample
    downmix
    savefile
    encode
</instance>
{% endhighlight %}

hostname
: State the hostname of the icecast to contact, this can be a name or IP address and can be IPv4 or IPv6 on systems that support IPv6. The default is localhost.

port
: State the port to connect to, this will be the port icecast is listening on, typically 8000 but can be any.

username
: Sets the username used to authenticate to Icecast.

password
: For providing a stream, a password has to be provided, and must match what Icecast expects.

mount
: Mountpoints are used to identify a particular stream on a icecast server, they must begin with / and for the sake of certain listening clients should end with the .ogg extension.

yp
: By default streams will not be advertised on a YP server unless this is set, and only then if the icecast if configured to talk to YP servers.

reconnectdelay
: If the connection to the server is lost ices2 will wait a given time before reconnecting. This setting controls how long ices2 will wait before reconnecting. The value is the time in seconds.

reconnectattempts
: This setting controls the number of reconnet attempts ices2 will do before considering the server to be down and stopping the instance.

retry-initial
: This setting controls if being unabled to connect to the server at startup is considered a fatal error. The default is to consider this a fatal error and quit making debugging more easy.

## Resample

{% highlight xml %}
<resample>
    <in-rate>44100</in-rate>
    <out-rate>22050</out-rate>
</resample>
{% endhighlight %}

When encoding or re-encoding, there is a point where you take PCM audio and encode to Ogg Vorbis. In some situations a particular encoded stream may require a lower samplerate to achieve a lower bitrate. The resample will modify the audio data before it enters the encoder, but does not affect other instances.  
  
The most common values used are 48000, 44100, 22050 and 11025, and is really only used to resample to a lower samplerate, going to a higher rate serves no purpose within IceS.

## Downmix

{% highlight xml %}
<downmix>1</downmix>
{% endhighlight %}

Some streams want to reduce the bitrate further, reducing the number of channels used to just 1. Converting stereo to mono is fairly common and when this is set to 1 the number of channels encoded is just 1. Like resample, this only affects the one instance it's enabled in.

## Savefile

{% highlight xml %}
<savefile>/home/ices/dump/stream1.ogg</savefile>
{% endhighlight %}

Sometimes the stream transmitted wants to be saved to disk. This can be useful for live recordings.

## encode

{% highlight xml %}
<encode>  
    <quality>0</quality>
    <nominal-bitrate>65536</nominal-bitrate>
    <maximum-bitrate>131072</maximum-bitrate>
    <minimum-bitrate>-1</minimum-bitrate>
    <managed>0</managed>
    <samplerate>22050</samplerate>
    <channels>1</channels>
    <flush-samples>11000</flush-samples>
</encode>
{% endhighlight %}

Remove this section if you don't want your files reencoded when using playback or RoarAudio input module.

quality
: State a quality measure for the encoder. The range goes from -1 to 10 where -1 is the lowest bitrate selection (default 3), and decimals can also be stated, so for example 1.5 is valid. The actual bitrate used will depend on the tuning in the vorbis libs, the samplerate, channels and the audio to encode. A quality of 0 at 44100hz and 2 channels is typically around the 64kbps mark.

nominal-bitrate
: State a bitrate that the encoder should try to keep to. This can be used as an alternative to selecting quality.

managed
: State 1 to enable full bitrate management in the encoder. This is used with nominal-bitrate, maximum-bitrate and minimum-bitrate to produce a stream with more strict bitrate requirements. Enabling this currently leads to higher CPU usage.

maximum-bitrate
: State bitrate in bits per second to limit max bandwidth used on a stream. Only applies if managed is enabled.

minimum-bitrate
: State bitrate in bits per second to limit minimum bandwidth used on a stream. Only applies if managed is enabled, this option has very little use so should not really be needed.

samplerate
: State the samplerate used for the encoding, this should be either the same as the input or the result of the resample. Getting the samplerate wrong will cause the audio to be represented wrong and therefore sound like it's running too fast or too slow.

channels
: State the number of channels to use in the encoding. This will either be the number of channels from the input or 1 if downmix is enabled.

flush-samples
: This is the trigger level at which Ogg pages are created for sending to the server. Depending on the bitrate and compression achieved a single Ogg page can contain many seconds of audio which may not be wanted as that can trigger timeouts.
  Setting this to the same value as the encode samplerate will mean that a page per second is sent, if a value that is half of the encoded samplerate is specified then 2 Ogg pages per second are sent.

</div>
