---
title: Server Statistics
version: 2.3.0
---

<article markdown="1">
# Overview
This section contains information about the server statistics available from Icecast.
An example stats XML tree will be shown and each element will be described. The following
example stats tree will be used:

{% highlight xml %}
<?xml version="1.0"?>
<icestats>
	<client_connections>13</client_connections>
	<connections>14</connections>
	<source_connections>1</source_connections>
	<sources>1</sources>
	<source mount="/test.ogg">
		<artist></artist>
		<audio_info>ice-samplerate=32000;ice-bitrate=Quality -1;ice-channels=1</audio_info>
		<ice-bitrate>Quality -1</ice-bitrate>
		<ice-channels>1</ice-channels>
		<ice-samplerate>32000</ice-samplerate>
		<listeners>0</listeners>
		<public>0</public>
		<title></title>
		<type>Ogg Vorbis</type>
	</source>
</icestats>
{% endhighlight %}

## General Statistics

client-connections
: Client connections are basically anything that is not a source connection.
  These include listeners (not concurrent, but cumulative), any admin function
  accesses, and any static content (file serving) accesses.

source-connections
: Source connections are the number of times (cumulative not currently connected)
  a source has connected to Icecast.

connections
: The total of client + source connections.

sources
: The total of currently connected sources (mountpoints).

## Source-specific Statistics

artist
: Artist of the current song (metadata set by source client).

title
: Title of the current song (metadata set by source client).

audio-info
: Information about the bitrate/samplerate/quality of the stream
  (set by source client). Also used for YP entries.

ice-bitrate, ice-samplerate, ice-channels
: Information about the bitrate/samplerate/quality of the stream
  (set by source client).

listeners
: The number of currently connected listeners.

public
: Flag that indicates whether this mount is being listed on a YP (sey by source client).

type
: Media type of the stream.

</article>
