---
title: Ezstream
permalink: /ezstream/
---
<div class="article" id="about" markdown="1">
# About Ezstream

Ezstream is a command line source client for media streams, primarily for
streaming to Icecast servers.

It allows the creation of media streams based on input from files or standard
input that is piped through an optional external de- and encoder. As every
part of this chain is highly configurable, ezstream can be useful in a large
number of streaming setups.

It uses libshout to communicate with streaming servers and currently supports
Ogg, MP3, WebM, and Matroska streams using the HTTP, ICY, and RoarAudio
protocols. It uses TagLib to read and manage metadata in numerous media
files.

Ezstream is free software and licensed under the GNU General Public License.
</div>

<div class="article" id="download" markdown="1">
# Download

## Latest version: 1.0.1

- Source .tar.gz (all platforms)
  - [ezstream-1.0.1.tar.gz](https://downloads.xiph.org/releases/ezstream/ezstream-1.0.1.tar.gz)
  - SHA256: `fc4bf494897a8b1cf75dceefb1eb22ebd36967e5c3b5ce2af9858dbb94cf1157`

## Older releases

Older releases, including version 0.x, can be found at
[downloads.xiph.org/releases/ezstream](https://downloads.xiph.org/releases/ezstream/).
</div>

<div class="article" id="release-notes" markdown="1">
# Release Notes

Ezstream 1.0.1 has been released on February 22nd 2020.

This is a bugfix release.

 - Fix a crash, if there is a typo in the `<encoder />` setting
 - Fix regression setting the stream name. From zygmund2000 on Github.
 - Minor example and documentation tweaks

## Version 1.0

This is a major feature release with a new configuration file structure.

Further changes include:

 - New configuration migration tool to help with upgrades from version 0.x
   (`ezstream-cfgmigrate`)
 - Added support for modern libshout functionality:
   - WebM and Matroska media formats
   - ICY and RoarAudio streaming protocols
   - TLS encryption
 - Several bug fixes and an extensive unit test suite
 - Support the new `@b@` placeholder for separate album metadata
 - The command line option `-p` has been added, causing ezstream to write a
   locked PID file to a given location
 - The command line options `-m` and `-n` have been removed, and new
   configuration file settings have been added accordingly
 - The real-time status information is now enabled explicitly with the new
   command line option `-r`
 - The behaviour of the `-s` command line argument was changed:
   To shuffle lines from standard input, the special file name "`-`" needs
   to be provided.
 - TagLib (its C wrapper library) is now a mandatory dependency
 - Native support for MS Windows and certain legacy UNIX systems has been
   removed
</div>

<div class="article" id="further-information" markdown="1">
# Further Information

## Dependencies

Ezstream depends on:

 - [libshout]({{ "/download/" | prepend: site.baseurl }})
   version 2.2.x or newer
 - [libxml](http://xmlsoft.org/) version 2.x
 - [TagLib](https://taglib.github.io/) for C version 1.x (1.4 or newer
   recommended)

Ezstream optionally uses:

 - [libiconv](https://www.gnu.org/software/libiconv/) on systems where
   `iconv()` is not available in libc, for basic non-ASCII charset support in
   metadata and filenames

Building ezstream depends on:

 - [check](https://libcheck.github.io/check) unit testing framework for C

## Installation

Most current UNIX-like operating system, such as Linux (including Windows
Subsystem for Linux) and \*BSD, either provide prebuilt binary packages of
ezstream, or the necessary tools to build it manually.

To find out whether ezstream is available as a prebuilt package and in which
version, please refer to your operating system documentation for more
information.

When building manually from source, the preferred way to build ezstream is to
rely on prebuilt binary packages for the dependencies as much as possible.
This may require the installation of the respective -devel packages, if
applicable.

The ezstream source code ships with a
[`README.md`](https://gitlab.xiph.org/xiph/ezstream/blob/develop/README.md)
file that provides information on all further steps.
</div>

<div class="article" id="support" markdown="1">
# Support

Ezstream ships with a comprehensive manual and example configurations. Type
`man ezstream` to get started.

In case of issues that are not answered by the documentation, please report
them in the
[ezstream issue tracker](https://gitlab.xiph.org/xiph/ezstream/issues).

Please include as much information as possible in your reports. Most
importantly: information how to reproduce the issue independently, what
behavior is expected, and what behavior is observed instead.

## Contact

The current maintainer of ezstream is Moritz Grimm
(`mgrimm at mrsserver dot net`).
</div>
