<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>

<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-sidebar.css" />

<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js">

/***********************************************
* All Levels Navigational Menu- (c) Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<style type="text/css">
<!--
.style1 {font-family: "Times New Roman", Times, serif}
-->
</style>
</head>
<body>


<table width="863" border="0">
  <tr bgcolor="#E5E5E5">
    <td height="70" colspan="2"><div align="center">
      <h3 class="downarrowpointer">Parsipal DIAL-OUT ADMIN </h3>
    </div></td>
  </tr>
  <tr>
    <td width="175" height="200"><div id="ddsidemenubar" class="markermenu">
      <ul>
        <li><a href="index.php?id=1">Home</a></li>
        <li><a href="index.php?id=2" >Group</a></li>
        <li><a href="index.php?id=3" rel="ddsubmenuside2">Import Numbers</a></li>
        <li><a href="index.php?id=4"  rel="ddsubmenuside5">report</a></li>
		<li><a href="index.php?id=7"  rel="ddsubmenuside3">Time Table</a></li>
		<li><a href="index.php?id=9"  rel="ddsubmenuside4">Queue</a></li>
		<li><a href="index.php?id=8">Trunk</a></li>
        <li><a href="index.php?id=5" >Users</a></li>
		<li><a href="index.php?id=6" >LogOut</a></li>
       </ul>
    </div>
      <script type="text/javascript">
ddlevelsmenu.setup("ddsidemenubar", "sidebar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
      </script>
      <p style="margin-top: 2em">
        <!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
        <!--A good location would be the end of the page (right above "</BODY>")-->
        <!--Side Drop Down Menu 1 HTML-->
      </p>
      <!--Side Drop Down Menu 2 HTML-->
      <ul id="ddsubmenuside2" class="ddsubmenustyle blackwhite">
        <li><a href="?id=31">Manual</a></li>
        <li><a href="?id=32">Series</a></li>
        <li><a href="?id=33">By Excel</a></li>
		<li><a href="?id=34">Confirm SQL</a></li>
	<li><a href="?id=335">Black List</a></li>
      </ul>
	  <ul id="ddsubmenuside3" class="ddsubmenustyle blackwhite">
        <li><a href="?id=71">Class</a></li>
        <li><a href="?id=72">Configure</a></li>
      </ul>
	  <ul id="ddsubmenuside4" class="ddsubmenustyle blackwhite">
        <li><a href="?id=91">Queue Table</a></li>
        <li><a href="?id=92">Queue Member</a></li>
      </ul>
	  <ul id="ddsubmenuside5" class="ddsubmenustyle blackwhite">
        <li><a href="?id=4">Imported Classes</a></li>
        <li><a href="?id=40">Calls Report</a></li>
      </ul>
      <!--Side Drop Down Menu 3 HTML-->
      <ul id="ddsubmenuside3" class="ddsubmenustyle blackwhite">
        <li><a href="http://tools.dynamicdrive.com/imageoptimizer/">Image Optimizer</a></li>
        <li><a href="http://tools.dynamicdrive.com/favicon/">FavIcon Generator</a></li>
        <li><a href="http://www.dynamicdrive.com/emailriddler/">Email Riddler</a></li>
        <li><a href="http://tools.dynamicdrive.com/password/">htaccess Password</a></li>
        <li><a href="http://tools.dynamicdrive.com/userban/">htaccess Banning</a></li>
    </ul></td>
    <td width="630" rowspan="2" align="left" valign="top"><div align="left">
	  <?php
	  $id=$_GET['id'];
	  if($id=='1' or $id=='')
	  {
		include "enable.php";
//		include "group_table.php";
	  }
	  elseif($id=='2')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "group_edit.php";
	  }
	  elseif($id=='4')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "report_table.php";
	  }
	  elseif($id=='40')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "cdr.php";
	  }
	  elseif($id=='33')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "excel_form.php";
	  }
		elseif($id=='335')
          {
                //include "enable.php";
                echo "<BR><BR><BR>";
                include "black.php";
          }
	  elseif($id=='330')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "upload.php";
	  }
	  elseif($id=='331')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "excel_final.php";
	  }
	  elseif($id=='34')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "sql_form.php";
	  }
	  elseif($id=='31')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "single_form.php";
	  }
	  elseif($id=='310')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "single_import_confirm.php";
	  }
	  elseif($id=='311')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "single_import_final.php";
	  }
	  elseif($id=='32')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "series_form.php";
	  }
	  elseif($id=='320')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "import_confirm.php";
	  }
	  elseif($id=='321')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "import_final.php";
	  }
	  elseif($id=='322')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "error_report.php";
	  }
	  elseif($id=='71')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "time_key.php";
	  }
	  elseif($id=='72')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "time.php";
	  }
	  elseif($id=='8')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "trunk_edit.php";
	  }
	  elseif($id=='5')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "users.php";
	  }
	  elseif($id=='91')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "queue_table.php";
	  }
	  elseif($id=='92')
	  {
		//include "enable.php";
		echo "<BR><BR><BR>";
		include "queue_member_table.php";
	  }
	  elseif($id=='6')
	  {
	  $fgmembersite->LogOut();
		header('Location: login.php');
	  }
	  ?>
	  
	  
	  
	  
	  <style type="text/css">
	hr.pme-hr		     { border: 0px solid; padding: 0px; margin: 0px; border-top-width: 1px; height: 1px; }
	table.pme-main 	     { border: #000000 1px solid; border-collapse: collapse; border-spacing: 0px; width: 100%; }
	table.pme-navigation { border: #000000 0px solid; border-collapse: collapse; border-spacing: 0px; width: 100%; }
	td.pme-navigation-0, td.pme-navigation-1 { white-space: nowrap; }
	th.pme-header	     { border: #004d9c 1px solid; padding: 4px; background: #E5E5E5; }
	td.pme-key-0, td.pme-value-0, td.pme-help-0, td.pme-navigation-0, td.pme-cell-0,
	td.pme-key-1, td.pme-value-1, td.pme-help-0, td.pme-navigation-1, td.pme-cell-1,
	td.pme-sortinfo, td.pme-filter { border: #000000 1px solid; padding: 3px; }
	td.pme-buttons { text-align: left;   }
	td.pme-message { text-align: center; }
	td.pme-stats   { text-align: right;  }
</style>


	
	
	</div></td>
  </tr>
  <tr>
    <td height="200">&nbsp;</td>
  </tr>
  <tr bgcolor="#E5E5E5">
    <td height="50" colspan="2"><div align="center">copyright 2012 <a href="http://www.parsipal.com/">parsipal.com</a> </div></td>
  </tr>
</table>
<h3>&nbsp;</h3>

</body>
</html>


