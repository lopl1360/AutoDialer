<?php
include_once"conn.inc.php";
$class=$_GET['class'];
$group=$_GET['group'];
$key=$_GET['key'];
if($key==md5($class.$group."parsipal"))
{
	$now=date("Y_m_d_H_i_s");
	$name=$group."_".$class."_".$now.".xls";
	$select = "SELECT * FROM input where class='$class' and `group`='$group'";
	$export = mysql_query ( $select ) or die ( "Sql error : " . mysql_error( ) );
	$fields = mysql_num_fields ( $export );
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $export , $i ) . "\t";
	}
	while( $row = mysql_fetch_row( $export ) )
	{
		$line = '';
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}	
		$data .= trim( $line ) . "\n";
	}
	$data = str_replace( "\r" , "" , $data );
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$name");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";
}
?>