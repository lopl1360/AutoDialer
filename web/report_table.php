<?php
include_once"conn.inc.php";
$column = array("Class Name","Group","Enable","DOWNLOAD");
$line=array();
$query="select name,group_name,enable from class_list";
echo $query;
if($res=mysql_query($query))
{
	while($row=mysql_fetch_row($res))
	{
		$name=$row[0];
		$group=$row[1];
		$enable=$row[2];
		$download="download";
		$line[]=array($name,$group,$enable,$download);
		
		
	}
}
?>
 <head> 
    <style type="text/css">
        table, body { border-collapse: collapse; font-family: verdana; font-size: 12px; }
    </style>
</head>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
<?php
        for ($i=0; $i<count($column); $i++)
            echo "<th>".$column[$i]."</th>";
?>
    </tr>
<?php
for ($i=0; $i < count($line); $i++)
{
    echo "<tr>";
    for ($j=0; $j < count($line[$i]); $j++)
    {
		if($line[$i][$j]=="download")
		{
			$class=$line[$i][0];
			$group=$line[$i][1];
			$key=md5($class.$group."parsipal");
			echo "<td><a href=export.php?class=$class&group=$group&key=$key>".$line[$i][$j]."</a></td>";
		}
		else
		{
			echo "<td>".$line[$i][$j]."</td>";
		}
    }
    echo "</tr>";
}
?>
</table>
