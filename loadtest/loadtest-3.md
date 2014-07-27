---
title: Load Test Results
permalink: /loadtest/3/
---
<article markdown="1">
# Load Test 3


## Description

This load test was performed to get an idea as to how well Icecast performs relative to Shoutcast.
The test used for this comparison is the “Max Listener” test that we used for load test #1. In order
to get the most accurrate results, I decided to re-run the max listener test completely for Icecast
(instead of just taking the numbers from the previous test).


## Test Hardware

I used the same hardware as in the [first load test]({{ "/loadtest/1/" | prepend: site.baseurl }})
and [second load test]({{ "/loadtest/2/" | prepend: site.baseurl }}).  

3 of these (one for running Icecast, and two for sources/listeners):

-	Server: Dell Poweredge 1850
-	Memory: 2GB
-	CPU: 3GHz Xeon (single processors running in hyperthreaded mode)
-	Network: 2 GBit Ethernet (although only one was used for the testing) connected via a GBit ethernet switch.
-	OS: Red Hat Enterprise Linux 3 (2.4 kernel)

In both tests (Icecast and Shoutcast) I used a single 48kbps mp3 stream sourced from Oddcast running
on an XP machine on my local LAN.


## The Load Test

For this particular load test we used the same listener load script
from the [first load test]({{ "/loadtest/1/" | prepend: site.baseurl }}).  
  
I ran this script of both of the listener nodes (each could start a max of ~7000 listeners) for a
combined listener count of ~14000. As in the previous tests, listeners were added in a "ramp-up"
fashion up to the total of 14000 listeners.

After the execution of this test against both Icecast and Shoutcast, I chose the following stats to
compare against each server:

-  User CPU
-  System CPU
-  Free Memory

These are machine-level statistics, and as before with previous tests, only Icecast/Shoutcast were
running on the main node and thus all system metrics can be attributed to Icecast/Shoutcast.


## User CPU

The first graph we will look at is User CPU. Listeners are along the X axis and User CPU along the Y.  
  
[![Listeners and User CPU graph]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_UserCPU.jpeg" | prepend: site.baseurl }})]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_UserCPU.jpeg" | prepend: site.baseurl }})
  
This graph shows that icecast certainly uses less User CPU as compared to Shoutcast, taking up about 50% less cpu than
Shoutcast does for a similar listener count.  
Icecast 1, Shoutcast 0.


## System CPU

Next, we will look at System CPU.  
  
[![Listeners and System CPU graph]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_SystemCPU.jpeg" | prepend: site.baseurl }})]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_SystemCPU.jpeg" | prepend: site.baseurl }})
  
This one is a little bit harder to draw a conclusion about. Icecast and Shoutcast are pretty much
identical System CPU-wise, until about 10,000 listeners, where we see a slight increase in System
CPU time relatively for Icecast.  
However, if we look at the total graph of system CPU for Icecast, we see a very linear progression.
With Shoutcast we see a plateau in System CPU right about 10,000 listeners. Without going into more
analysis I would conclude from this that Shoutcast is most likely not keeping up with the listeners
appropriately, and thus we do not see an increase in system CPU. So we'll call this one a draw.


## Free Memory

And finally… free memory.  
  
[![Listeners and free memory graph]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_freeMemory.jpeg" | prepend: site.baseurl }})]({{ "/loadtest/LoadTest3_Icecast_vs_Shoutcast_freeMemory.jpeg" | prepend: site.baseurl }})
  
Wow, this one is certainly striking. Shoutcast must allocate a major chunk of memory for each
listener or (shudder) allocate a thread for each listener. Either way, Icecast clearly wins this one.


## Conclusion

### How does icecast compare to Shoutcast in terms of handling listeners?
Well, looks like icecast handles them better all around taking about 50% of User CPU,
about the same System CPU, and certainly much much fewer amounts of memory per user.

<aside>Posted <strong>Nov 14, 2005</strong> by <strong>oddsock</strong> (© 2005 Ed Zaleski)</aside>
</article>

[Back to overview]({{ "/loadtest/" | prepend: site.baseurl }})
