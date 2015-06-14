<?php
$link = mysql_connect('localhost', 'root', '1qaz!QAZ');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('dialout',$link);
?> 
