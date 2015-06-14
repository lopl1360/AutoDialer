<?php
include_once "conn.inc.php";
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<form name="form1" method="post" action="index.php?id=310">
  <p>
    Number:
      <input name="number" type="text" id="number" maxlength="12">
</p>
 <p><input name="class" type="hidden" id="class" value="2"></p>  
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


