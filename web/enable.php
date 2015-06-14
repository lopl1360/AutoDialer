<?php
include_once "conn.inc.php";
if(isset($_POST['totalenable']))
{
	$enable=$_POST['totalenable'];
	if($enable=="enable")
	{
		$q="update master set enable=1";
		mysql_query($q);
		}
	elseif($enable=="disable")
	{
		$q="update master set enable=0";
		mysql_query($q);
	}
}

$q1="select enable from master where id=1";
		//echo $q1;
		$r1=mysql_query($q1);
		$row=mysql_fetch_row($r1);
		//print_r($r1);
		if($row[0]=='1')
		{
			$enable_check="checked";
			$disable_check="";
		}
		elseif($row[0]=='0')
		{
			$enable_check="";
			$disable_check="checked";
		}
	  ?>
	  <BR>
	  <BR>
	  <form name="form1" method="post" action="">
  System status:
    <input name="totalenable" type="radio" value="enable" <?php echo $enable_check; ?>>
    Enable 
    <input name="totalenable" type="radio" value="disable" <?php echo $disable_check; ?>> 
    Disable 
    <input type="submit" name="Submit" value="Submit">
</form>
		<br>
		<BR>
		