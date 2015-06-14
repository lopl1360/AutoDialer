<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--chtml include "//webinfo/incs/header.inc"-->

<html xmlns="http://www.w3.org/1999/xhtml">

<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js">
    <head>
	<title>Submenus Example</title>
	<link href="/webinfo/webinfo.css" type="text/css" rel="stylesheet" />
	<style type="text/css" media="screen"><!--
	    .barlink a, .navlink a {
		text-decoration: none;
	    }
	    .barlink a img, .navlink a img {
		border: 0;
	    }
	    .barlink a {
		color: #fff;
	    }
	    .flyout td {
		white-space: nowrap;
	    }
	--></style>
	<script type="text/javascript">
	    //<![CDATA[
	    function mIn () { return true; }
	    function mOut () { return true; }
	    function makeLayer () { return true; }
	    function flyDefs () { return true; }
	    if (! document.flyout_disable &&
		    'undefined' != typeof document.getElementById)
		document.write ('<' + 'script src="/home/scripts/flyout.js" ' +
				    'type="text/javascript"><' + "/script>\n");
	    // ]]>
	</script>
    </head>

    <body>
	<table width="600" border="1">
      <tr>
        <td>
<h3>All Levels Navigtional Menu: Side Menu Bar Example</h3>

<div id="ddsidemenubar" class="markermenu">
<ul>
<li><a href="http://www.dynamicdrive.com/">Dynamic Drive</a></li>
<li><a href="http://www.dynamicdrive.com/style/" rel="ddsubmenuside1">CSS Library</a></li>
<li><a href="http://www.javascriptkit.com/jsref/" rel="ddsubmenuside2">JavaScript Reference</a></li>
<li><a href="http://www.javascriptkit.com/domref/">DOM  Reference</a></li>
<li><a href="http://www.cssdrive.com" rel="ddsubmenuside3">CSS Drive</a></li>
<li><a href="http://www.codingforums.com/" style="border-bottom-width: 0">Coding Forums</a></li>		
</ul>
</div>

<script type="text/javascript">
ddlevelsmenu.setup("ddsidemenubar", "sidebar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
</script>


<p style="margin-top: 2em">More info/ documentation: <a href="http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/">All Levels Navigational Menu</a></p>



<!--HTML for the Drop Down Menus associated with Side Menu Bar-->
<!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
<!--A good location would be the end of the page (right above "</BODY>")-->


<!--Side Drop Down Menu 1 HTML-->

<ul id="ddsubmenuside1" class="ddsubmenustyle blackwhite">
<li><a href="#">Item 1a</a></li>
<li><a href="#">Item 2a</a></li>
<li><a href="#">Item Folder 3a</a>
  <ul>
  <li><a href="#">Sub Item 3.1a</a></li>
  <li><a href="#">Sub Item 3.2a</a></li>
  <li><a href="#">Sub Item 3.3a</a></li>
  <li><a href="#">Sub Item 3.4a</a></li>
  </ul>
</li>
<li><a href="#">Item 4a</a></li>
<li><a href="#">Item Folder 5a</a>
  <ul>
  <li><a href="#">Sub Item 5.1a</a></li>
  <li><a href="#">Item Folder 5.2a</a>
    <ul>
    <li><a href="#">Sub Item 5.2.1a</a></li>
    <li><a href="#">Sub Item 5.2.2a</a></li>
    <li><a href="#">Sub Item 5.2.3a</a></li>
    <li><a href="#">Sub Item 5.2.4a</a></li>
    </ul>
  </li>
	</ul>
</li>
<li><a href="#">Item 6a</a></li>
</ul>

<!--Side Drop Down Menu 2 HTML-->

<ul id="ddsubmenuside2" class="ddsubmenustyle blackwhite">
<li><a href="#">Item 1b</a></li>
<li><a href="#">Item 2b</a></li>
<li><a href="#">Item Folder 3b</a>
  <ul>
  <li><a href="#">Sub Item 3.1b</a></li>
  <li><a href="#">Sub Item 3.2b</a></li>
  <li><a href="#">Sub Item 3.3b</a></li>
  <li><a href="#">Sub Item 3.4b</a></li>
  </ul>
</li>
<li><a href="#">Item 4b</a></li>
<li><a href="#">Item Folder 5b</a>
  <ul>
  <li><a href="#">Sub Item 5.1b</a></li>
  <li><a href="#">Item Folder 5.2b</a>
    <ul>
    <li><a href="#">Sub Item 5.2.1b</a></li>
    <li><a href="#">Sub Item 5.2.2b</a></li>
    <li><a href="#">Sub Item 5.2.3b</a></li>
    </ul>
  </li>
	</ul>
</li>
<li><a href="#">Item 6b</a></li>
</ul>


<!--Side Drop Down Menu 3 HTML-->

<ul id="ddsubmenuside3" class="ddsubmenustyle blackwhite">
<li><a href="http://tools.dynamicdrive.com/imageoptimizer/">Image Optimizer</a></li>
<li><a href="http://tools.dynamicdrive.com/favicon/">FavIcon Generator</a></li>
<li><a href="http://www.dynamicdrive.com/emailriddler/">Email Riddler</a></li>
<li><a href="http://tools.dynamicdrive.com/password/">htaccess Password</a></li>
<li><a href="http://tools.dynamicdrive.com/userban/">htaccess Banning</a></li>
</ul></td>
        <td>&nbsp;</td>
      </tr>
    </table>
	<h1>	  <!--chtml include "//webinfo/incs/footer.inc"-->
    </h1>
	</body>

</html>