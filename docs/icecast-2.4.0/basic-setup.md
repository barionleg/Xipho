---
title: Basic Setup
version: 2.4.0
---

{::options auto_ids="true" /}

<article markdown="1">
# Basic Requirements
This section will describe the essential requirements in setting up a simple Internet radio station. It is by no means a complete list but should give you enough to get started. Please also note that those are generic instructions. If you installed a Linux/Unix distribution package, then it will likely come with different paths, different means of starting it, etc. In that case please also refer to the documentation of that distribution and or a distribution specific How-To.

There are two major components involved: the streaming server (Icecast in this case) and the source client.  
The Icecast server will be the place where all listeners of your station will connect. The source client (in general) runs on a separate machine than Icecast, but does not necessarily need to. Source clients send the content to Icecast and provide the stream data (encoded audio) that is then relayed out to listeners by Icecast.

It is important to note that not all source clients work with Icecast 2. You will need to check to make sure that Icecast 2 is supported by your chosen source client.

</article>

<article markdown="1">
# The Basics

Each Icecast server can house multiple broadcasts (or mountpoints) each containing a separate stream of content. A 'mountpoint' is a unique name on your server identifying a particular stream - it looks like a filename, such as '/stream.ogg'. A listener can only listen to a single mountpoint at a time. This means you can have a single Icecast server contain either multiple broadcasts with different content, or possibly the same broadcast but with streams of different bitrates or qualities. In this case each broadcast or stream is a separate mountpoint.

At this point, the steps outlined here related to the Unix version or Win32 console version of Icecast. Icecast is also available in a Win32 GUI version, and the steps are similar in setup, but not quite the same.

The first step in the process is to find and install the Icecast2 server itself. How to do this is not contained within this documentation. After installation you should have and Icecast binary and 3 directories

-	`conf`  
	Contains the Icecast configuration file (`icecast.xml`) which defines all the configuration parameters for the server.  
-	`admin`  
	Contains xslt files which are used by the Icecast server to provide a web-based front end to the administration capabilities of the server.  
-	`logs`  
	This is a blank directory which (if specified in the config file) will contain all the logs (there are 2) for Icecast.  
  

The next step is to edit the `icecast.xml` file and set the appropriate values. Most of the specified values in the samples are fine, for a basic setup the following entries should be specified, and if neccessary, changed to suite your situation:

`<hostname>` - DNS name or IP address used for stream directory listings.  
`<source-password>` - Will be used for the source client authentication.  
`<admin-password>` - Will be used for authenticating admin features of Icecast.  
`<listen-socket>` (both port and bind-address)  

Once the configuration file is modified, you should be able to start the server with the following command

    icecast -c /path/to/icecast.xml

If no error messages are generated, then check the `error.log` file for the 'server started' message, it will look something like :

    [2003-10-31  13:04:49] INFO main/main.c Icecast 2.3.0 server started

You may notice slight variations to the line above, the time will no doubt be different, and on some platforms the `main.c` is just main, but the key thing here is that the server is started, logging is working and the version is shown.  
  
You can also verify that it started by visiting the following URL: `http://yourip:port/admin/stats.xml`. You should be prompted for a username and password. Enter the username `admin` and the password you entered for `<admin-password>`. If all is well, you should see an small XML tree which represents Icecast statistics (more about that later).  
  
Now that the Icecast server is started you must now configure your source client. The information you will need for the source client is the following:  
  
IP address and Port of the icecast server - both of these come from `<listen-socket>`  
source password - from `<source-password>`  
  
Additionally, you will need to choose a mountpoint and specify this in the source client. Icecast does not need to know about each mount point (although you can configure settings for specific mountpoint - this is covered under Advanced configuration) there are, however, some points to mention regarding mountpoints. All Ogg Vorbis streams should have mountpoints that end in `.ogg` (i,e. `/mystream.ogg`). This is due to the lazy way most media players infer the type of stream. MP3 streams usually do not contain an extension (/mystream). Mount points also should not contain any spaces or odd characters (again due to the lazy way many of the media players are coded).  
  
Once you have configured your source client, you should be able to connect it to the Icecast server. Verify that it is connected by hitting the stats.xml URL that was mentioned above.  
  
Now that you have the source connnected, listening to the stream involves simply opening the appropriate following URL in a browser: `http://yourip:port/mounpoint-you-specified`. So, for instance, if you attached your source client to an icecast server located at `192.0.2.23:8000` with a mountpoint of `/mystream.ogg`, then you would open: `http://192.0.2.23:8000/mystream.ogg` or `http://192.0.2.23:8000/mystream.ogg.m3u`. Note that the URL with `.m3u` extention will serve up a link that opens most media players. Also it is important to note that m3u need not contain only MP3 stream, it can contain streams of arbitrary content-type and is used by Icecast to serve a playlist that represents your broadcast to listening clients. Alternatively you can open up the stream URL directly within your media player (`http://192.0.2.23:8000/mystream.ogg` in this case)
</article>

