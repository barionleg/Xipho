<h2>News</h2>
<div class="roundcont">
<div class="roundtop">
<img alt="" src="/images/corner_topleft.jpg" class="corner" style="display: none" />
</div>
<div class="newscontent">
<h3>Icecast Release 2.1.0</h3>
<p>After about 8 months in development, version 2.1.0 of icecast has been released.
</p>
<p>
<font color=white size=4><b>New features for 2.1 (in no particular order)</b></font>
<p>
<font color=yellow>Listener Authentication</font></br>
  Icecast now supports listener authentication.  This provides a mechanism for
  creating/maintaining users and passwords for listeners.  Currently, we only
  have implemented a simple, file-based storage for users and passwords.  New
  authenticators are on the horizon (such as URL-based or possibly MySQL based)
  New admin pages were also added for the maintenance of users/passwords. Please
  check the docs for a more detailed description of this new feature.
</br>
</br>
<font color=yellow>Multi-Level Fallbacks</font></br>
  Multi-level fallbacks allow for specifications of a series of fallback mounts
  that you could use, for instance, to set up a series of progressively lower
  bitrate streams that would be cascaded through.  For instance, a modem user
  would connect to the highest bitrate stream, and then could be cascaded
  down to a progressively lower stream until they reach a value they can
  handle.
</br>
</br>
<font color=yellow>Burst-On-Connect</font></br>
  This is an new, optional config setting which will send a initial burst of
  data to connecting listeners.  This has the effect of reducing
  (significantly) the startup buffer latency from the end-user perspective.
  This option is enabled by default.
</br>
</br>
<font color=white size=4><b>New Enhancements for 2.1</b></font></br>
<font color=yellow>Update to admin interface</font></br>
  This interface has been cleaned up quite a bit and made a bit nicer.
</br>
</br>

<font color=yellow>Rewrite of the YP listing code</font></br>
  The icecast yp code has received a complete overhaul by karl, and it's a much
  more stable and failure-resistant implementation.
</br>
</br>

<font color=yellow>Lots and lots of bugs fixed</font></br>
  Check the ChangeLog for a complete list of these...
</br>
</br>
</p>

<p>Download Icecast 2.1.0 from the <a href="download.php">Download page</a>.</p>

<div class="poster">
Posted November 4, 2004 by oddsock
</div> 
</div>
<div class="roundbottom">
<img alt="" src="/images/corner_bottomleft.jpg" class="corner" style="display: none" />
</div>
</div>	

<br>
<br>
<div class="roundcont">
<div class="roundtop">
<img alt="" src="/images/corner_topleft.jpg" class="corner" style="display: none" />
</div>
<div class="newscontent">
<h3>Icecast Release 2.0.2</h3>
<p>This patch release fixes an exploit found by Luigi Auriemma. We recommend that all
users currently upgrade to this patch release.
</p>
<p>Download Icecast 2.0.2 from the <a href="download.php">Download page</a>.</p>

<div class="poster">
Posted September 24, 2004 by oddsock
</div> 
</div>
<div class="roundbottom">
<img alt="" src="/images/corner_bottomleft.jpg" class="corner" style="display: none" />
</div>
</div>	

<br>
<br>
<div class="roundcont">
<div class="roundtop">
<img alt="" src="/images/corner_topleft.jpg" class="corner" style="display: none" />
</div>
<div class="newscontent">
<h3>Icecast Release 2.0.1</h3>
<p>This patch release fixes a overflow buffer which can cause server crashes under
certain circumstances.  This release contains ONLY the fix for this issue.  We
are still targetting a 2.1.0 release with new features and functionality in the
near future.</p>

<p>Download Icecast 2.0.1 from the <a href="download.php">Download page</a>.</p>

<div class="poster">
Posted May 12, 2004 by oddsock
</div> 
</div>
<div class="roundbottom">
<img alt="" src="/images/corner_bottomleft.jpg" class="corner" style="display: none" />
</div>
</div>	

<br>
<br>
<div class="roundcont">
<div class="roundtop">
<img alt="" src="/images/corner_topleft.jpg" class="corner" style="display: none" />
</div>
<div class="newscontent">
<h3>Ices Release 2.0.0</h3>
<p>After far too long in development and testing, the icecast development team
has released Ices version 2.0.0.  Ices is a source client for Icecast streaming
media server. It takes audio from one of the defined inputs and (re)encodes the
audio for streaming to icecast for listeners to pick up.</p>

<p>Download Ices 2.0.0 from the <a href="ices.php">Ices page</a>.</p>

<div class="poster">
Posted Mar 11, 2004 by karl
</div> 
</div>
<div class="roundbottom">
<img alt="" src="/images/corner_bottomleft.jpg" class="corner" style="display: none" />
</div>
</div>	

<br>
<br>

<div class="roundcont">
<div class="roundtop">
<img alt="" src="/images/corner_topleft.jpg" class="corner" style="display: none" />
</div>
<div class="newscontent">
<h3>Icecast Releases 2.0.0</h3>
<p>After years in development and years in alpha testing, The icecast development team has released version 2.0.0 of its streaming media server.  Icecast2 supports Ogg Vorbis and MP3 streaming and has many features and functions you would expect from a world class streaming media server.</p>

<p>There are more things to come from the icecast development team, and we have many new features just waiting to be implemented.
</p>
<p>Download 2.0.0 from the main <a href="download.php">download page</a>.</p>
<p>In addition to the new release, we have re-vamped the icecast.org website to hopefully make things easier to access and to get at the information you need faster.  Please let us know what you think.</p>
<div class="poster">
Posted Jan 7, 2004 by oddsock
</div> 

</div>
<div class="roundbottom">
<img alt="" src="/images/corner_bottomleft.jpg" class="corner" style="display: none" />
</div>
</div>	

<br>
<br>

