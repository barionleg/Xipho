---
title: Download
permalink: /download/
download:
  linux:
    format:      ".tar.gz"
    size:        "2.3 MB"
    url:         "http://downloads.xiph.org/releases/icecast/icecast-2.4.4.tar.gz"
    description: "Source Tarball"
  windows:
    format:      ".exe"
    size:        "5.0 MB"
    url:         "http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.4.exe"
    description: "Binary Installer"
---
<div class="article" id="current-release" markdown="1">
# Icecast Current Release (2.4.4)

The latest Icecast release can be downloaded below. For Windows there is a binary release in an installer, for Linux/UNIX
we provide the sources.

{% include dl-buttons.html %}

</div>

<div class="article" id="other-releases" markdown="1">
# Linux/Unix Binary Packages
Most current Linux and Unix distributions provide either prebuilt binary packages or a way to build your own package of Icecast.  
This is the preferred way to install Icecast, as distribution packaging is tuned to make Icecast fit well into your system. In most cases packaging will also provide necessary scripts/files to make Icecast start as a service on boot.  
For details please refer to the package repository section of your distribution's fine manual.  
  
## Official packages of current Icecast

-   Xiph.org provides official builds of latest Icecast, packaged for various distributions, using their
    [OBS project](https://build.opensuse.org/package/show/multimedia:xiph/icecast) for Icecast.
-   There are [package repositories](http://download.opensuse.org/repositories/multimedia:/xiph/)
    that can be added to the distro package manager. You can think of it as a "PPA" or whatever your distro calls this.
-   Debian and its derivatives (e.g. Ubuntu) name the package `icecast2`.
-   Packages are built with openSSL enabled, to ease setting up HTTPS streaming/access.
-   Packages are signed by the [openSUSE OBS multimedia project GPG key](/multimedia-obs.key)

# Other Releases

## Older Releases
Older releases can be found [here](http://downloads.xiph.org/releases/icecast/)

## Source Clients
In addition to Icecast, you will most likely need to download a source client for creating the actual stream.
We suggest that you download one from our [third-party applications]({{ "/apps" | prepend: site.baseurl }}) page.
</div>


<div class="article" id="git" markdown="1">
# Clone Git Repository

Additionally to the release tarballs we have a [public git repository](https://gitlab.xiph.org/xiph/icecast-server) where we do our development, that anyone can clone.

To get the latest development state:

{% highlight sh %}
git clone --recursive https://gitlab.xiph.org/xiph/icecast-server.git
{% endhighlight %}

If your git version does not support `--recursive` clones, do

{% highlight sh %}
git clone https://gitlab.xiph.org/xiph/icecast-server.git
cd icecast-server
git submodule update --init
{% endhighlight %}

For further instruction, see our Wiki page: [Icecast Git Workflow](https://wiki.xiph.org/Icecast/Git_workflow)
</div>

<div class="article" id="bindings" markdown="1">
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
			<td><a href="http://downloads.xiph.org/releases/libshout/libshout-2.4.4.tar.gz">Latest: 2.4.4 (tar.gz)</a><br />
				<a href="http://downloads.xiph.org/releases/libshout/">Older</a></td>
		</tr>
        <tr>
            <td>libshout-java</td>
            <td>Java libshout binding</td>
            <td><a href="https://github.com/OlegKunitsyn/libshout-java">Github Repo</a></td>
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
</div>

