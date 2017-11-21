---
layout: post
title:  "New GPG key for Xiph repo"
date:   2017-11-21 18:04:00
author: ePirat
---

PSA: The GPG signing key for the official Xiph.org package repositories on the openSuse Open Build Service has changed:

```
pub   rsa2048 2017-11-21 [SC] [expires: 2020-01-30]
            0E313DB7936B4E76E720065B77EC2301F23C6AA3
uid           multimedia OBS Project <multimedia@build.opensuse.org>
```

The old key was DSA1024 and didn't allow SHA256 signatures, only SHA1, which are being phased out right now. So to avoid future problems we approached the maintainer for the whole multimedia project to replace its signing key. This has now taken place and the multimedia:xiph subproject has rebuilt its repositories to have all of them signed by the new key.

We also host an independent copy of the public key for your convenience:
https://icecast.org/multimedia-obs.key
