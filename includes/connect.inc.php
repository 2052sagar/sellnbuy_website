<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'project';
if(!mysql_connect($host, $user, $password)|| !mysql_select_db($database)) {
    die(mysql_error());
}
?>