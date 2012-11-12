<?php
session_start();
/*if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
  echo "<link href='../config/adminstyle.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}*/
if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {
	$level=$_SESSION['leveluser'];
?>

<html>
<head>
<title>Bedsheet from facebook</title>
<link href="../adminstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="content">
			<?php include( "content.php");
		//		echo $_SESSION[namauser];
			?>
	</div>
	<div id="menu">
      <ul>
        <li><a href=?module=home>&#187; Home</a></li>
        <li><a href=form.php?module=form>&#187; Forms</a></li>
		<?php 
		if ($level=='admin'){
		?>
        <li><a href=report.php?module=report>&#187; Report</a></li>
		<?php }
		 (include "menu.php"); ?>
        <li><a href=logout.php>&#187; Logout</a></li>
      </ul>
	    <p>&nbsp;</p>
	</div>	
	<div id="footer">
	</div>	
 	
	</div>
</body>
</html>
<?php
}
else{

  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}

?>