<?php

$conn = new mysqli($dbhost, $dbuser, $dbpwd);
$conn_status = '';

if ($conn->connect_error)
	$conn_status = 'connection failed';
else
	$conn_status = 'connection succeeded';

$conn->query('SET NAMES utf8');
$conn->select_db($dbname);

?>