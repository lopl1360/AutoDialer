<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
include_once "conn.inc.php";
function is_class($class)
{
	$query="select id from class_list where name='$class'";
	if($res=mysql_query($query))
	{
		while($row=mysql_fetch_row($res))
		{
			if($row[0]!="")
				return 1;
		}
	}	return 0;
	return 0;
}
$number=$_POST['number'];
$group=$_POST['group'];
//$class=$_POST['class'];
$error=0;
if(!is_numeric($number))
{
	$desc="Number must be integer";
	$error=1;
}
/*
elseif(strlen($from) != strlen($to))
{
	$desc="From and To must have same lenght";
	$error=1;
}
*/

elseif($group=="" )
{
	$desc="Group must have value";
	$error=1;
}
if($error==0)
{
$now=date("m_d");
$count=1;
$class="$group"."_"."$number"."_".$now."_";
while(is_class("$class"."$count"))
{
	$count++;
}
$class=$class."$count";
?>
<form name="form1" method="post" action="index.php?id=311">
  <p>Number:<?php echo $number; ?></p>
  <p>Count:<?php echo "1"; ?></p>
  <p>Class:<?php echo $class; ?></p>
  <p>Group:<?php echo $group; ?></p>
  <p><input name="number" type="hidden" id="number" value="<?php echo $number; ?>"></p>
  <p><input name="class" type="hidden" id="class" value="<?php echo $class; ?>"></p>
  <p><input name="group" type="hidden" id="group" value="<?php echo $group; ?>"></p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
  <p></p>
</form>
<?php
}
else
{
	echo $desc;
}
?>

