<?php
	$host = "localhost";
	$username = "root";
	$password = "jarvis168";
	$database = "gnthub";
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
?>