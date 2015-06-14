<?php
$link = mysql_connect('localhost', 'username', 'password');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("dialout",$link);
?> 
