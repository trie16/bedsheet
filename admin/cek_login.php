<?php
// Use session variable on this page. This function must put on the top of page.
session_start();

////// Logout Section. Delete all session variable.
session_destroy();

$message="login expired";

include("../config/conn.php");
$pass=md5($_POST['password']);
$username=$_POST['username'];

//echo $_POST[password];
$link=koneksi_db();
$sql_login="SELECT * FROM user WHERE username='$username' AND password='$pass'";
//echo $sql_login;
$login=mysql_query($sql_login,$link);
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){

  session_start();
  session_register("namauser");
  session_register("leveluser");

  $_SESSION['namauser']=$r[username];
  $_SESSION['leveluser']=$r[level];
  $_SESSION['sudahlogin']=true;
  
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  header('location:media.php?module=home');
}
else{
  echo "<link href=../adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>Login gagal! username & password tidak benar<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>