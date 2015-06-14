<?php
include_once "conn.inc.php";
//print_r($_POST);
$from=$_POST['from'];
$to=$_POST['to'];
$group=$_POST['group'];
$class=$_POST['class'];
$count=0;
$q1="insert into class_list values ('0','$class','$group',1)";
echo $q1;
if(mysql_query($q1))
{
	for($c=$from;$c<$to;$c++)
	{
		$q="insert into input values ('0','$c','$group','$class',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00')";
		echo $q;
		if(mysql_query($q))
			$count++;
		
	}
}
else
{
	$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>"; 
	echo $error;
}
header('Location: index.php?id=322&err=$count');
?>