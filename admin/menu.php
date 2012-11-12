<?php
$link=koneksi_db();
$level = $_SESSION['leveluser'];
if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {
	if ($level='toko') {
		$sql="select * from modul where status ='user' order by display";
		$res=mysql_query($sql,$link);		
	}
	else {
		$sql="select * from modul where active='Y' order by display";
		$res=mysql_query($sql,$link);
	}	

}
else {
	echo "FORBIDEN";
}

while ($data=mysql_fetch_array($res)){  
  echo "<li><a href='$data[link]'>&#187; $data[modul_name]</a></li>";
}
?>