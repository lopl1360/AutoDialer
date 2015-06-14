<?php
include "conn.inc.php";
//require_once('/usr/bin/MimeMailParser.class.php');
require_once('./phpagi/phpagi-asmanager.php');
//require("/usr/bin/phpmailer.inc.php");
//require("/var/www/html/fax/nusoap/nusoap.php");
//$pg_con=pg_connect("host=localhost user=pars4 password=1qaz!QAZ dbname=pars");
//$pg_con=pg_connect("host=80.191.36.24 user=pars2 password=1qaz!QAZ dbname=pars");
//$pg_con=pg_connect("host=80.191.36.24 user=pars2 password=1qaz!QAZ dbname=pars");
function blacklist($number)
{
        $q="select 1 from BlockedNums_Iran where  [Number]='$number'";
        if($res=mssql_query($q))
        {
                if($row=mssql_fetch_row($res))
                {
                        return $row[0];
                }
                return 0;
        }
        return 0;
}
function event_test($e, $parameters, $server, $port)
{
	global $unqid;
	global $call_status;
	if($parameters['Uniqueid']=="$unqid")
        {
//		print_r($parameters);
		global $arr;
		$keys=array();
		$values=array();
		foreach($parameters as $key=>$val)
		{
			$keys[]="\"$key\"";
			$values[]="'$val'";
		}
		$keycomma=implode(",",$keys);
		$valuecomma=implode(",",$values);
		$query="insert into event ($keycomma) values ($valuecomma)";
		//pg_query($query);
		//echo $query;
		//echo "\r\n";
		if($parameters['ChannelStateDesc']=="Up")
		{
//			echo "------------------------------------------------------------------";
			$call_status=1;
		}
	}
	//global $unqid;
	///global $faxstatus;
}
function hangupevent($e,$parameters,$server,$port)
{
	//echo "new hangup";
	global $unqid;
	global $faxstatus;
	global $faxerror;
	global $arr;
	global $id;
	global $asm;
	echo $unqid;
	echo $e;
	//print_r($parameters);
//Uniqueid	$asm->disconnect();
//exit;
	if($parameters['Uniqueid']=="$unqid")
	{
		global $asm;
		global $outfile;
		global $from;
		global $call_status;
		if($parameters['Cause']!=16)
		{
			$call_status=2;
		}
		foreach($parameters as $key=>$val)
        {
                $keys[]="\"$key\"";
                $values[]="'$val'";
        }
        //$keycomma=implode(",",$keys);
        //$valuecomma=implode(",",$values);
        ///$query="insert into event ($keycomma) values ($valuecomma)";
	if($call_status==1)
	{
		$query2="update input set hold='0',status='1',last_date='NOW()' where id='$id'";
	}
	elseif($call_status==2)
	{
		$query2="update input set hold='0',status='2',last_date=NOW()+ interval '150 minutes' ,try=try+1 where id='$id'";
	}
	elseif($call_status==3)
	{
		$query2="update input set hold='0',status='3',last_date=NOW() + interval '3 hour' ,try=try+1 where id='$id'";
	}
  //	echo $query;
//	      pg_query($query);
	      pg_query($query2);
		$asm->disconnect();
		pg_close();
	//	exec("/usr/sbin/dialout.php >/dev/null &");
		exit;

	}
}
function newaccountcode($e, $parameters, $server, $port)
{
        //print_r($parameters);
	global $acc;
	//echo "loploploplopl";
//	echo $e;
        if($parameters['AccountCode']=="$acc" and $e=="newaccountcode")
        {
                global $unqid;
		global $chan;
                $unqid=$parameters['Uniqueid'];
                $chan=$parameters['Channel'];
		echo "newaccount";
		echo $unqid;
        }
}
function kill(&$id)
{
	global $call_status;
	$query="update input set  hold='0', status='1', try=try+1  where id=$id  ";
	pg_query($query);
	pg_close();
//	echo $query;
}
function getnewid()
{
	$query="select id from input where status!='1' and status!='6' and (last_date < NOW() or last_date is NULL) and try < max_try and hold!='1' and hold!='10' limit 1";
//	echo $query;
	if($res=pg_query($query))
	{
		if($row=pg_fetch_row($res))
		{
			$id=$row[0];
			return $id;
		}
		return 0;
	}
	return 0;
}
function select_curent_time_class()
{
	$now2=date("H:i:s");
	$dayofweek=strtolower(date("D"));
	$group_list=array();
	$time_class=array();
	$time_class[]="qazpl";
	$is_class=0;
	$q="select FK_name from time_table where (curtime() between from_time and to_time) and `day` like '%$dayofweek%'    group by FK_name ";
	echo $q;
	if($res=mysql_query($q))
	{
		while($row=mysql_fetch_row($res))
		{
			$time_class[]=$row[0];
			echo $row[0];
			$is_class=1;
			
			
		}
	}
	else
	{
		die('Could not connect: ' . mysql_error());
	}
	if($is_class==1)
	{
		$final_time_class=array();
		foreach($time_class as $classes)
		{
			$final_time_class[]="'$classes'";
		}
		$class_cs=join(',',$final_time_class);
		$q2="select * from group_list where time_class IN ($class_cs) group by name";
		//echo $q2;
		if($res2=mysql_query($q2))
		{
			while($row2=mysql_fetch_assoc($res2))
			{
				$group_list[]=$row2;
			}
		}
		print_r($group_list);
		return $group_list;
	}
	return "";
	
	
}
function get_group_info($group='group')
{
        $query="select * from group_list ";
        //echo $query;
		$out=array();
        if($res=mysql_query($query))
        {
                while($row=mysql_fetch_assoc($res))
                {
                        //$id=$row[0];
                        $out[]=$row;
                }
                return $out;
        }
        return 0;
}
function get_enable()
{
        $query="select enable from master where id=1";
        //echo $query;
        if($res=mysql_query($query))
        {
                if($row=mysql_fetch_row($res))
                {
                        //$id=$row[0];
                        return $row[0];
                }
                return 0;
        }
        return 0;
}
function get_trunk($trunk)
{
        $query="select * from trunk where name='$trunk'";
        //echo $query;
        if($res=mysql_query($query))
        {
                if($row=mysql_fetch_assoc($res))
                {
                        //$id=$row[0];
                        return $row;
                }
                return 0;
        }
        return 0;
}
function holdid($id)
{
	$query="update input set hold='1' ,try=try+1, last_date=NOW() where id='$id'";
	echo $query;
	if(mysql_query($query))
		return 1;
	return 0;
}
function blackid($id)
{
        $query="update input set status='9',last_date=NOW() where id='$id'";
        echo $query;
        if(mysql_query($query))
                return 1;
        return 0;
}

function unholdid($id)
{
        $query="update input set hold='0' where id='$id'";
        if(pg_query($query))
                return 1;
        return 0;
}
function howholdid($group)
{
        $query="select count(*)  from input where hold='1'  and `group`='$group' ";
        //echo $query;
        //exit;
        if($res=mysql_query($query))
        {
                if($row=mysql_fetch_row($res))
                {
                        $id=$row[0];
                        return $id;
                }
                return 0;
        }
        return 0;
}
function howmanynewid()
{
	$query="select count(*)  from input where status!='1' and status!='6' and (last_date < NOW() or last_date is NULL) and try < max_try and hold!='1' and hold!='10' ";
        //echo $query;
	//exit;
	if($res=pg_query($query))
        {
                if($row=pg_fetch_row($res))
                {
                        $id=$row[0];
			return $id;
                }
                return 0;
        }
        return 0;
}
function getinfo($id)
{
	$query="select number,context,c_group,max_try,try from input where id='$id' ";
        //echo $query;
	if($res=pg_query($query))
        {
                if($row=pg_fetch_row($res))
                {
                        return $row;
                }
                return 0;
        }
        return 0;
}
function dontcare()
{
	return 0;
}
function checkifmanager()
{
	$query="select 1 as now from input where edit_date > NOW() - INTERVAL 2 minute";
	echo $query;
	if($res=mysql_query($query))
	{
		if($row=mysql_fetch_row($res))
		{
			if($row[0] > 0)
				return 1;
		}
		
			exec("killall -s9 manager.php");
			exec("/usr/bin/php /usr/sbin/manager.php > /dev/null &");
			return 1;
		
	}
}
global $asm;
global $unqid;
global $acc;
global $chan;
global $call_status;
global $faxerror;
global $id;
global $retry;
global $arr;
$call_status=3;
$arr=array();
set_time_limit(30);
$id=1;
//register_shutdown_function('kill',&$id);
$now=date('Y-m-d H:i:s');
$enable=get_enable();
//echo $enable;
if($enable=='0')
	exit;
$now2=date("H:i:s");
$dayofweek=date("D");

	
//checkifmanager();	
//$groups=get_group_info();
$groups=select_curent_time_class();
$asm = NEW AGI_AsteriskManager();
$conn=$asm->connect('localhost','admin','pparsadmin');
//print_r($groups);
foreach($groups as $key=>$group)
{
	//echo $key;
	//print_r($group);
//	$holdedid=howholdid($group['name']);
	/////////no limit ///////////////$limit=$group['max_call']-$holdedid;
	$limit=$group['max_call'];
	//echo $holdid;
	$context=$group['context'];
	$extension=$group['extension'];
	$priority=$group['priority'];
	$trunk=$group['trunk'];
	$trunk_info=get_trunk($trunk);
	//print_r($trunk_info);
	//exit;
	$query="select id,number,try from input where `group`='$group[name]' and (try < '$group[max_retry]' or try is NULL) and status!=4 and hold!=1  and last_date < NOW() order by last_date,try  asc limit $limit ";
///	$query="select id,number,try from input where `group`='$group[name]' and (try < '$group[max_retry]' or try is NULL) and status!=4 and hold!=1  and last_date < NOW() order by id  desc limit $limit ";
	echo $query;
	$res=mysql_query($query);
	while($row=mysql_fetch_row($res))
	{
		//usleep(10);
		$id=$row[0];
		$number=$row[1];
		//$context="explain";
		$acc=$number;
		$bl=blacklist($number);
		if($bl=='1')
		{
			blackid($id);
		//	continue;
		}
		//print_r($row);
		
		//echo $number;
		//echo "\r\n";
		holdid($id);
		$proto=$trunk_info['protocol'];
		$prefix=$trunk_info['prefix'];
		$t_name=$trunk_info['name'];
		///////$asm->send_request_noresp('Originate',
	/*
		 $test=array('Channel'=>"$proto"."/"."$prefix"."$number"."@"."$t_name",
                           'Context'=>"$context",
                           'Priority'=>"1",
                           'Async'=>"1",
                           'Account'=>"$acc",
                           'Set'=>"idd=$id",
                           'Extension'=>"$extension");
	
	*/
		$test=array('Channel'=>"$proto"."/".$t_name."/"."$prefix"."$number",
			   'Context'=>"$context",
			   'Priority'=>"1",
			   'Async'=>"1",
			   'Account'=>"$acc",
			   'Set'=>"idd=$id",
			   'CallerID'=> "parsipal <"."$number".">",
	                   'Extension'=>"$extension");
		$asm->send_request_noresp('Originate',$test);
		print_r($test);			   
		
	}
//	$asm->disconnect();
//	mysql_close();
	//	unset($asm);
	
}
$asm->disconnect();	
mysql_close();

?>

