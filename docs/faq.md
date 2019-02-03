# Before we start
## Does Icecast support HTTPS (TLS)?
Yes. Icecast supports HTTPS in both, RFC 2817 and RFC 2818, modes.

## Can I do on-demand streaming with Icecast.
This is not what Icecast was made for. Just use any webserver.

## Can I use Icecast to stream to several clients and all play in perfect sync?
No. Icecast is for broadcasting. If you need a public address system you need to find a different product.

## How much RAM and CPU does my server need?
Icecast only uses little RAM and CPU. Any modern server should do very well. In general you run out of network connectivity
before you run out of RAM and CPU.

## What class of network connection do I need?
In general network connectivity os the bottleneck. Your connection needs at minimum to handle
`2 * average bitrate * (listeners + sources)`.
For example if you have 1024 listener on 10 streams with a average bitrate of 112kibit/s you need
`2 * 112kibit/s * (1024 + 10) = ~232Mibit/s`.

## How many listeners can I have per server?
This mainly depends on your network connectivity and operating system. We test Icecast with up to 32 thousand listeners.
However we recommend not to have more than about 15 thousand listeners per server and spread the load to several server.
This way you can much easier ensure a smooth operation with maintaiannce windows and hardware outage
(they actually happen in reallity).

Note that running more than a hundred listeners may require changing the limits in the Icecast configuration as
well as raising the maximum number of open file descriptors the operating system allows.

# Configuring Icecast
## How to start?
Icecast comes with a default configuration. We strongly recommend to *only* change the passwords for a first test.
Changing more than the passwords is hardly needed for most servers.

Please do *not* define any `<mount>`-section unless you *actually* need to change a *specific* value.

Most people break Icecast by over-configuring it.

## Which editor can I use?
You can use any editor for writing your Icecast configuration. However we recommend using an editor that supports
XML syntax highlighting.

## How do I set `<hostname>`?
This is the hostname Icecast can be reached from the outside. It includes the name of your server as well as
the domain name. It is *not* a URI (to Icecast or even your website). DNS must be set up in a way that
this name will point to your server via A and/or AAAA record(s).

Icecast will use this setting to generate URIs pointing to itself. Those are used in e.g. playlist files and
on YP submission.

Icecast will report an error with suggestions when this setting is invalid.

Good examples: "icecast.example.org", "streaming.mycompany.com".
Invalid examples: "1.2.3.4" (any IP address), "http://www.best-radio-ever.net/".

## I changed the config but Icecast does no longer start
Please verify that the config is actually syntactically valid. To do this run:

    $ xmllint /path/to/your/icecast.xml

If this does now show any errors try to start Icecast and look for it's console output and error.log.

# Running Icecast

# Miscellaneous
## How to spell Icecast correcty?
It's "Icecast". All those are wrong: "IceCast", "Ice Cast", "icecast", "IceCAST", and "IcEcAsT".

## Is there community support?
Yes. Please see: http://icecast.org/contact/

## Is there professional support?
There are companies providing professional Icecast support.
Best is to ask on one of the provided media, see our Contact page: http://icecast.org/contact/

## Is there a company hosting Icecast servers for me?
There are companies providing hosted Icecast servers.
Best is to ask on one of the provided media, see our Contact page: http://icecast.org/contact/

# Legal questions
## Is Icecast free software?
Yes. Icecast is licensed as GPL version 2.

## Can I use the name "Icecast" or any of your logos or artwork on my web page or product?
Please contact us so we can discuss this.
You can find Contact information here: http://icecast.org/contact/
