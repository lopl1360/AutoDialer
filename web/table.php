<?php
$file = "text.txt";
$delimiter = ",";
$column = array("Name", "Lastname", "Favorite Transport");

@$fp = fopen($file, "r") or die("Could not open file for reading");
while (!feof($fp))
	{
    $tmpstr = fgets($fp, 100);
    $line[] = ereg_replace("\r\n", "", $tmpstr);
	}
for ($i=0; $i < count($line); $i++)
	{
    $line[$i] = split($delimiter, $line[$i]);
	}
?>
<html>
<head>
    <title>Albert's Delimited Text to HTML Table Converter</title>
    <style type="text/css">
        table, body { border-collapse: collapse; font-family: verdana; font-size: 10px; }
    </style>
</head>
<body>
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
fclose($fp);
?>
</table>
</body>
</html> 