---
title: Frequently Asked Questions
version: 2.0.0
---

<article markdown="1">
This for those questions people have asked as it wasn't covered in the documentation

## Can ices play mp3 files
No, there hasn't been much interest in handling MP3 with ices 2. The older version ices 0.x maybe of interest in such cases.

## How do I encode from Line-In
IceS will read from the DSP on the soundcard, but where that gets the audio from depends on the mixer settings. Use a utility like aumix/alsamixer to see the settings and change the capture or recording device. Usually the default is the Mic

## When I start ices 2 it seems to get stuck not doing anything
If you are using live input, check to see if something else is holding the recording device (typically /dev/dsp) open. A good candidate is esd. What happens is that the driver only allows one application to have the device open at any one time, a second attempt will just block.  

## Ices reports a message about failing to set samplerate on live input
Some hardware/drivers are limited in the settings they support. Sometimes they only support one samplerate like 48khz. You have to experiment if the documentation for the device is not specific.

## Can I do crossfading with the playlist
Ices does not do much in the way manipulating the audio itself, resampling and downmixing are available as that has a direct effect on encoding an outgoing stream. Ices can still be used in conjunction with other applications such as xmms by making ices read from the say the dsp (eg oss, alsa etc), that way anything that is played by that other application is encoded and sent to Icecast.

## My player seems unable to play the stream
If the stream looks to be getting to the player then it will be how the player is handling it. The usual causes of this are: 

-	missing ".ogg" extension. Both ices and icecast do not care about the extension however some apps use the extension to determine which plugin to use.
-	Missing Ogg Vorbis plugin. The winamp lite versions were known for this.
-	Are you running Winamp 3. This is a discontinued product and had problems with the vorbis plugin, either use the later v2.9 series or v5.

## The sound quality is poor
Ogg Vorbis is a lossy compression technology, so quality of the sound is reduced, however with live input the source of audio can be poor depending on the soundcard and the system it's in. As an initial test just record a wav file from the DSP (using eg rec, arecord etc) and listen to the quality of the audio recorded. If the source of audio is poor then encoding it to Ogg Vorbis is not going to improve it.  
The reasons for poor audio from the DSP can be difficult to resolve, search for information on audio quality. It could be driver related or maybe some interference from some other device.  
Here are some links where further information can be found:  
[http://www.djcj.org/LAU/guide/index.php](http://www.djcj.org/LAU/guide/index.php)  
[http://www.linuxdj.com/audio/lad/index.php3](http://www.linuxdj.com/audio/lad/index.php3)  

</article>