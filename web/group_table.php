<?php
include_once"conn.inc.php";
$column = array("Group Name","Context","Enable","Total", "Hold", "Answered","Not Answered","Busy","Error","In Process");
$line=array();
$query="select name,context,enable,max_retry from group_list";
if($res=mysql_query($query))
{
	while($row=mysql_fetch_row($res))
	{
		$name=$row[0];
		$context=$row[1];
		$enable=$row[2];
		$max_retry=$row[3];
		$q1="select * from input where `group`='$name'";
		$res1=mysql_query($q1);
		if($row1=mysql_num_rows($res1))
		{
			$total=$row1;
		}
		$q3="select * from input where `group`='$name' and hold=1";
		$res3=mysql_query($q3);
		if($row3=mysql_num_rows($res3))
		{
			$hold=$row3;
		}
		//$q22="select count(*) from input where `group`='$name' and status='0' and try>='$max_retry' ";
		$q22="select * from input where `group`='$name' and (try < '$max_retry' or try is NULL) and status!=4 and hold!=1  and last_date < NOW()";
		//echo $q22;
		//echo "<BR>";
		$res22=mysql_query($q22);
		if($row22=mysql_num_rows($res22))
		{
			$noanswere_maxretry=$row22;
		}
		$q2="select status,count(*) from input where `group`='$name' group by status";
		//echo $q2;
                //echo "<BR>";
		$res2=mysql_query($q2);
		while($row2=mysql_fetch_row($res2))
		{
			if($row2[0]=='0')
			{
				$noprogress=$noanswere_maxretry;
			}
			elseif($row2[0]=='3')
			{
				//$noanswer=$row2[1]+$noanswere_maxretry;
				$noanswer=$row2[1];
			}
			elseif($row2[0]=='4')
			{
				$answer=$row2[1];
			}
			elseif($row2[0]=='5')
			{
				$busy=$row2[1];
			}
			elseif($row2[0]=='8')
			{
				$error=$row2[1];
			}
		}
		$line[]=array($name,$context,$enable,$total,$hold,$answer,$noanswer,$busy,$error,$noprogress);
		unset($name,$context,$enable,$total,$hold,$answer,$noanswer,$busy,$error,$noprogress);
		
		
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
        echo "<td>".$line[$i][$j]."</td>";
    }
    echo "</tr>";
}
?>
</table>
