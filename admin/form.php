<?php
session_start();

if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {
//	echo $_SESSION[leveluser];
//	include "../config/fungsi_translate.php";
?>

<html>
<head>
<title>Bedsheet database from Facebook </title>
<link href="../adminstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
  <div id="content">
	<?php 
		require_once("mainform.php");
		require_once("form_merk.php");
		require_once("form_ukuran.php");
		require_once("form_sprei.php");
		require_once("form_toko.php");
	
	?>
  </div>
	<div id="menu">
      <ul>
        <li><a href=media.php?module=home>&#187; Back To Main Menu</a></li>
        <li><a href=form.php?module=form>&#187; Form</a></li>
		<?php  include("menu_form.php"); ?>
        <li><a href=logout.php>&#187; Logout</a></li>
      </ul>
	    <p>&nbsp;</p>
 	</div>
<div id="footer"></div>
</div>

</body>
</html>
<?php
}
else{
  echo "<link href='../config/adminstyle.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}

?>