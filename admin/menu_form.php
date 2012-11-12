<?php

$link=koneksi_db();
if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {
  $sql="select * from form where active='Y' order by display";
  $res=mysql_query($sql,$link);
}
else {
	echo "FORBIDEN";
}
while ($data=mysql_fetch_array($res)){ 
  echo "<li><a href='$data[link]'>&nbsp; &#187; $data[form_name]</a></li>";
}
?>