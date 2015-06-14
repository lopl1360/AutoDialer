<?php
include_once "conn.inc.php";
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<form name="form1" method="post" action="index.php?id=320">
  <p>
    From:
      <input name="from" type="text" id="from" maxlength="12">
  To:
  <input name="to" type="text" id="to" maxlength="12">
</p>
   
    Group:
    <select name="group">
	<?php
		$q="select name from group_list where enable=1";
		if($res=mysql_query($q))
		{
			while($row=mysql_fetch_row($res))
			{
				echo "<option>";
				echo "$row[0]";
				echo "</option>";
			}
		}
	?>
      
    </select>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>

