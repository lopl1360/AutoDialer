<?php
require_once("conn.inc.php");
require_once("./include/membersite_config.php");
require_once 'Excel/reader.php';
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

$file=$_POST['file'];
$group=$_POST['group'];
$class=$_POST['class'];

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read($file);
$count=0;
$q1="insert into class_list values ('0','$class','$group',1)";
//echo $q1;
if(mysql_query($q1))
//if(1==1)
{
	for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) 
	{
		$num=$data->sheets[0]['cells'][$i][1];
		//$q="IF (select count(*) from black where number='$num' =0) insert into input values ('0','$num','$group','$class',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00') ";
		//$q="insert into input values ('0','$num','$group','$class',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00')";
		//echo $q;
		$q="insert into input values ('0','$num','$group','$class',0,'0000-00-00 00:00:00',IF((select count(*) from black where number='$num')>0,9,0),0,'0000-00-00 00:00:00')";
		//echo $q;
		//IF((select count(*) from black where number='88106639'))
		if(mysql_query($q))
				$count++;
	}
}			
header('Location: index.php?id=322&err="$count"');

?>
