<?php
session_start();
include("conn.php");
if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {

//	echo $_SESSION[leveluser];
//	include "../config/fungsi_translate.php";

	$link=koneksi_db();
	$sql="SELECT * FROM `t_ukuran`";
	$res=mysql_query($sql,$link);
	$n=mysql_num_rows($res);
	$module=$_GET["module"];
// Input Merk
	if ($module=='add_ukur'){
		$id_ukur = $_POST['txt_idukur'];
		$ukur 	 = $_POST['txt_ukur'];
		$ket  	 = $_POST['txt_desc'];
		if($ukur!=='') {
			$sql="SELECT UKURAN FROM `t_ukuran` WHERE ID_UKURAN='$id_ukur'";
			$res=mysql_query($sql,$link) or die(mysql_error());
			$ketemu=mysql_num_rows($res);	
			if ($ketemu <= 0) { 
				$ukur_input="INSERT INTO t_ukuran(ID_UKURAN,UKURAN,KETERANGAN)
							  VALUES('$id_ukur','$ukur','$ket')";
				$ukur=mysql_query($ukur_input,$link) or die(mysql_error());;
				header('location:form.php?module=i_ukuran');
			}
			else {
				echo "<p align=center>Duplicate UKURAN, please insert another UKURAN</p>";
				echo "<p align=center><a href='form.php?module=add_ukur'>Back to input</a></p><br>";	
			}
		}	
		else {
			echo "<p align=center>UKURAN cannot be EMPTY, please insert another UKURAN</p>";
			echo "<p align=center><a href='form.php?module=add_ukur'>Back to input</a></p><br>";			
		}
	}
	elseif ($module=='edit_ukur'){
		$id_ukur = $_POST['txt_idukur'];
		$ukur 	 = $_POST['txt_ukur'];
		$ket  	 = $_POST['txt_ket'];
		if($ukur!=='') {
			$sql="SELECT UKURAN FROM `t_ukuran` WHERE ID_UKURAN='$id_ukur'";
			$res=mysql_query($sql,$link) or die(mysql_error());
			$ketemu=mysql_num_rows($res);	
			if ($ketemu <= 1) { 
				$ukur_edit="UPDATE t_ukuran SET UKURAN='$ukur',KETERANGAN='$ket' WHERE ID_UKURAN='$id_ukur'";
				$ukur=mysql_query($ukur_edit,$link) or die(mysql_error());;
				header('location:form.php?module=i_ukuran');
			}
			else {
				echo "<p align=center>Duplicate UKURAN, please insert another UKURAN</p>";
				echo "<p align=center><a href='form.php?module=edit_ukur'>Back to input</a></p><br>";	
			}
		}	
		else {
			echo "<p align=center>UKURAN cannot be EMPTY, please insert another UKURAN</p>";
			echo "<p align=center><a href='form.php?module=edit_merk'>Back to input</a></p><br>";			
		}	
	}
	
	elseif ($module=='delete'){
		$sql="DELETE FROM t_ukuran WHERE ID_UKURAN='$_GET[id]'";
		$res=mysql_query($sql);
		header('location:form.php?module=i_ukuran');
	}	

}
else {
	header ("Location:belumlogin.php");
}
?>