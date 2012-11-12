<?php
function koneksi_db(){
	$host = "localhost";
	$database = "tmlyweb_sprei";
	$user = "tmlyweb_atol";
	$password = "4t0lmall";
	$link=mysql_connect($host,$user,$password);
	mysql_select_db($database,$link);
	if(!$link)
		echo "Error : ".mysql_error();
	return $link;

}

?>