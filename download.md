---
title: Download
permalink: /download/
download:
  linux:
    format:      ".TAR.GZ"
    size:        "1,0 MB"
    url:         "http://downloads.xiph.org/releases/icecast/icecast-2.4.0.tar.gz"
    description: "Source Package"
  windows:
    format:      ".ZIP"
    size:        "4,7 MB"
    url:         "http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.0.zip"
    description: "Binary Package"
---
<article id="current-release" markdown="1">
# Icecast Current Release (2.4.0)

The latest Icecast release can be downloaded below. For Windows there is a binary release, for Linux/UNIX
there is provided the source package.

{% include dl-buttons.html %}

</article>

<article id="other-releases" markdown="1">
# Other Releases

## Linux/Unix Binary Packages
Most current Linux and Unix distributions provide either prebuilt binary packages or a way to build your own package of Icecast.  
This is the preferred way to install Icecast, as distribution packaging is tuned to make Icecast fit well into your system. In most cases packaging will also provide necessary scripts/files to make Icecast start as a service on boot.  
For details please refer to the package repository section of your distribution's fine manual.  
  

Hints that you might find useful:

-   Thomas provides test builds, packaged for various distributions, using his
    [OBS project](https://build.opensuse.org/package/show/home:dm8tbr/icecast) for Icecast.
-   There are [package repositories](http://download.opensuse.org/repositories/home:/dm8tbr/)
    that can be added to the distro package manager.
-   Debian and its derivatives (e.g. Ubuntu) name the package `icecast2`.

## Older Releases
Older releases can be found [here](http://downloads.xiph.org/releases/icecast/)

## Source Clients
In addition to Icecast, you will most likely need to download a source client for creating the actual stream.
We suggest that you download one from our [third-party applications]({{ "/apps" | prepend: site.baseurl }}) page.
</article>


<article id="bindings" markdown="1">
# Icecast Library/Language Bindings

<table class="table-flipscroll">
	<thead>
		<tr>
			<th>Library</th>
			<th>Description</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>libshout</td>
			<td>Library which can be used to write a source client like ices</td>
			<td><a href="http://downloads.xiph.org/releases/libshout/libshout-2.3.1.tar.gz">Latest: 2.3.1 (tar.gz)</a><br />
				<a href="http://downloads.xiph.org/releases/libshout/">Older</a></td>
		</tr>
		<tr>
			<td>shout-python</td>
			<td>Python bindings for libshout 2</td>
			<td><a href="http://downloads.us.xiph.org/releases/libshout/shout-python-0.2.1.tar.gz">Latest: 0.2.1 (tar.gz)</a></td>
		</tr>
		<tr>
			<td>shout-perl</td>
			<td>Perl bindings for libshout 2</td>
			<td><a href="http://downloads.us.xiph.org/releases/libshout/Shout-2.1.tar.gz">Latest: 2.1 (tar.gz)</a></td>
		</tr>
		<tr>
			<td>ruby-shout</td>
			<td>Ruby bindings for libshout 2</td>
			<td><a href="https://github.com/niko/ruby-shout">Github Repo</a></td>
		</tr>
		<tr>
			<td>ocaml-shout</td>
			<td>OCaml bindings for libshout2</td>
			<td><a href="http://sourceforge.net/projects/savonet/files/ocaml-shout/">Releases</a></td>
		</tr>
		<tr>
			<td>shoutpy</td>
			<td>shoutpy uses Boost.Python to expose libshout 2 to Python, through a separately usable C++ wrapper</td>
			<td><a href="https://bitbucket.org/angry_elf/shoutpy">Bitbucket Repo</a></td>
		</tr>
	</tbody>
</table>
</article>
