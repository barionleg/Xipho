---
title: Subversion
permalink: /svn/
---
<article markdown="1">
# Access to subversion repository

Xiph.org has switched from CVS to using Subversion. More information regarding subversion can be found [here](http://subversion.tigris.org/).  

Before following these instructions make sure that you have a copy of Subversion installed. These instructions will assume that you are using a command-line version.

## 1. Create a place to store the local repository
{% highlight sh %}
$ mkdir $HOME/xiphrepository  # Obviously this name can be whatever you'd like..
                              # this is an example.
$ cd $HOME/xiphrepository
{% endhighlight %}

## 2. Checkout the main Icecast trunk
Note: You must have libtool, autoconf, and automake to perform this step.
{% highlight sh %}
$ svn co http://svn.xiph.org/icecast/trunk/icecast/ icecast
A  icecast/debian
A  icecast/debian/icecast2.postinst
A  icecast/debian/icecast2.postrm
A  icecast/debian/icecast2.default
A  icecast/debian/control
....
Checked out revision 6618.  # Note your revision may be different
{% endhighlight %}

## 3. Run autogen.sh in the main Icecast root
{% highlight sh %}
$ cd $HOME/xiphrepository/icecast
$ ./autogen.sh
Checking for automake version
found automake-1.6
found aclocal-1.6
Generating configuration files for icecast, please wait....
aclocal-1.6  -I m4
autoheader
libtoolize --automake
automake-1.6 --add-missing
...
config.status: creating win32/Makefile
config.status: creating win32/res/Makefile
config.status: creating config.h
config.status: executing depfiles commands
{% endhighlight %}

## 4. Verfiy everything by performing a make
{% highlight sh %}
$ cd $HOME/xiphrepository/icecast
$ make
{% endhighlight %}
</article>

