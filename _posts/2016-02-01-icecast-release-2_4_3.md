---
layout: post
title:  "Icecast Release 2.4.3"
date:   2016-02-01 21:45:00
author: ePirat
categories: icecast release
---

We released a new version of Icecast last week. It is a Windows only release and addresses a security issue recently brought to our attention.

As it, embarrassingly, turns out this issue was previously raised on a security mailing list in 2005 and assigned CVE 2005-0837. A ticket ([#635]) was even created, once this posting was noticed by an Icecast project member, at that time. Sadly the original report was terse, the issue couldn't be readily reproduced and subsequently the ticket was closed.

We were recently contacted about this issue and this time provided with details about the environment it occurred in. This allowed us to identify this as a Windows only issue.

The vulnerability, identified as CVE-2005-0837, allows an attacker to acces the raw XSLT template file by appending a dot “.” to the URL. Due to the way how Windows handles file names ending with a dot, it only affects Icecast versions < 2.4.3 running on Windows. Icecast on other operating systems, like Linux, wasn't affected at any time by this issue. If you haven't modified the default XSLT files of a Windows installation, then no information disclosure of real value could have happened. We expect that most, of the comparatively few, Windows installations have unmodified template files and thus, while technically vulnerable, only expose those unmodified templates. To be clear, no runtime information can be accessed this way.

In case you modified the templates and they contain sensitive information, it should be assumed that a third party could have accessed them. We're sorry, that this issue went unresolved for a long time.


## Downloads

-   Source: [icecast-2.4.3.tar.gz](http://downloads.xiph.org/releases/icecast/icecast-2.4.3.tar.gz)
-   Windows [icecast_win32_2.4.3.exe](http://downloads.xiph.org/releases/icecast/icecast_win32_2.4.3.exe)

[#635]: https://trac.xiph.org/ticket/635