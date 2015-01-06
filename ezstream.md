---
title: Ezstream
permalink: /ezstream/
---
<div class="article" id="about" markdown="1">
# About Ezstream

Ezstream is a command line source client for Icecast media streaming servers.
It began as the successor of the old "shout" utility, and has since gained a
lot of useful features.

In its basic mode of operation, it streams media files or data from standard
input without reencoding and thus requires only very little CPU resources.
It can also use various external decoders and encoders to reencode from one
format to another, and stream the result to an Icecast server.
Additional features include scriptable playlist and metadata handling.
All of its features make ezstream a very flexible source client.

Supported media formats for streaming are MP3, Ogg Vorbis and Ogg Theora.
Native metadata support includes MP3 (ID3v1 only) and Ogg Vorbis, and many
more formats when the optional [TagLib](http://taglib.github.io) support has
been compiled in.

Ezstream is free software and licensed under the GNU General Public License.
</div>

<div class="article" id="download" markdown="1">
# Download

## Latest version: 0.5.6
[Changes](#changes)

- Source .tar.gz (all platforms)
  - [ezstream-0.5.6.tar.gz](http://downloads.xiph.org/releases/ezstream/ezstream-0.5.6.tar.gz)
  - MD5: 1be68119d44fbe71454a901fa650a359
- MS Windows binary (32bit)
  - [ezstream-0.5.6-win32.zip](http://downloads.xiph.org/releases/ezstream/ezstream-0.5.6-win32.zip)
  - MD5: 19c6f28c2de81e6e2fa3e0ed914e6696

Older releases can be found at
[downloads.xiph.org/releases/ezstream](http://downloads.xiph.org/releases/ezstream/).
</div>

<div class="article" id="further-information" markdown="1">
# Further Information

## Dependencies
Ezstream depends on:

- [libshout]({{ "/download/" | prepend: site.baseurl }})
  2.2.x or later + libshout dependencies
- [libxml](http://xmlsoft.org/) 2.x

Ezstream optionally uses:

- For reading metadata from Ogg Vorbis files:
  - [TagLib](http://taglib.github.io) 1.x (1.4 or newer recommended) __or__
  - [libvorbis](http://www.vorbis.com/) 1.x
- For basic non-ASCII charset support in metadata and filenames:
  - GNU [libiconv](http://www.gnu.org/software/libiconv/), if `iconv()` is not
    available in the system C library.

## UNIX (Linux, *BSD, Solaris, ...)

On UNIX and UNIX-like systems, such as Linux and *BSD, binary packages for the
required libraries are usually available. To compile ezstream, ensure that the
respective -devel packages are installed as well, if applicable. Further steps,
and more, are explained in the `README` and `INSTALL` files inside the
distribution package.<br />
It might be a good idea to check whether the operating system vendor
provides a binary package of a recent ezstream release and install that
one instead of building from source.

## Windows

Windows users can simply copy the `ezstream.exe` file from the binary
distribution archive (.ZIP) to any location of their choosing. Users, who wish
to be able to run ezstream anywhere on their system, can add the directory
that contains `ezstream.exe` to their PATH environment variable.<br />
The ezstream binary release depends on MSVC 2008 runtime libraries.
These libraries can be downloaded from Microsoft as the
[`vcredist_x86.exe`](http://www.microsoft.com/DOWNLOADS/details.aspx?familyid=A5C84275-3B97-4AB7-A40D-3802B2AF5FC2)
file, at no cost.

## Even more ...

Comprehensive documentation of ezstream and its configuration is included in the man page `ezstream(1)`.
Those, who are interested in how ezstream development progresses, can stay informed by occasionally
looking at the [`NEWS file`](http://svn.xiph.org/trunk/ezstream/NEWS). It is kept up-to-date with
important changes in ezstream as they happen.
</div>

<div class="article" id="release-notes" markdown="1">
# Release Notes
Ezstream 0.5.6 has been released on August 31st 2009.

Version 0.5.6 is a maintenance and feature release.

## Changes

- `ezstream-file.sh`:
  - NEW: Add and install ezstream-file.sh, a new convenience shell
    script that generates configuration and playlist from a template and
    command line, respectively. (Bourne shell and POSIX utilities required.)
- `src/ezstream.c`:
  - MISC: Be more tolerant towards faulty playlists and similar issues.
    Failure to open a resource (e.g. a media file) is no longer fatal and
    operation will continue until 100 subsequent errors.
    Based on an idea from dhorton.
    (Ticket [#1585](https://trac.xiph.org/ticket/1585))
  - NEW: New command line option `-s`: Make ezstream function as a line-based
    shuffling utility.
- `src/playlist.c`:
  - MISC: Consider no output from a playlist program to be equivalent
    to an empty line, indicating that the end of the playlist is reached.
  - FIX: Do not complain when receiving an empty line from a playlist program.
- `examples/`:
  - NEW: Add a real-world example playlist script with logging feature.
</div>

<div class="article" id="support" markdown="1">
# Support

## Reporting Problems

In case of problems with ezstream, please make sure to re-read the
documentation first and double-check your configuration. A lot of effort has
been put into the `ezstream(1)` manual, and it should -- at least in theory --
answer all questions.

Of course, ezstream isn't immune to bugs.
After
[checking if your bug is already known](https://trac.xiph.org/report/21),
or a newer ezstream release fixes your problem, it is much appreciated that you
[file your bug report](https://trac.xiph.org/newticket?component=ezstream)
with the Xiph.org bug tracker.

Please be as specific and verbose as necessary when submitting a problem
report. Also, please include a valid e-mail address when reporting an issue,
in case there are follow-up questions.

Your contribution and efforts are very much appreciated. Thank you!

## Contact

The current maintainer of ezstream is Moritz Grimm (`mdgrimm at gmx dot net`).
</div>
