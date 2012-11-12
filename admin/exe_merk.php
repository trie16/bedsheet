<?php
session_start();
include("conn.php");
if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {

//	echo $_SESSION[leveluser];
//	include "../config/fungsi_translate.php";

	$link=koneksi_db();
	$sql="SELECT * FROM `t_merk`";
	$res=mysql_query($sql,$link);
	$n=mysql_num_rows($res);
	$module=$_GET["module"];
// Input Merk
	if ($module=='add_merk'){
		$id_merk = $_POST['txt_idmerk'];
		$merk 	 = $_POST['txt_merk'];
		$ket  	 = $_POST['txt_desc'];
		if($merk!=='') {
			$sql="SELECT NAMA FROM `t_merk` WHERE ID_MERK='$id_merk'";
			$res=mysql_query($sql,$link) or die(mysql_error());
			$ketemu=mysql_num_rows($res);	
			if ($ketemu <= 0) { 
				$merk_input="INSERT INTO t_merk(ID_MERK,NAMA,KETERANGAN)
							  VALUES('$id_merk','$merk','$ket')";
				$merk=mysql_query($merk_input,$link) or die(mysql_error());;
				header('location:form.php?module=i_merk');
			}
			else {
				echo "<p align=center>Duplicate NAMA MERK, please insert another MERK</p>";
				echo "<p align=center><a href='form.php?module=add_merk'>Back to input</a></p><br>";	
			}
		}	
		else {
			echo "<p align=center>NAMA MERK cannot be EMPTY, please insert another MERK</p>";
			echo "<p align=center><a href='form.php?module=add_merk'>Back to input</a></p><br>";			
		}
	}
	elseif ($module=='edit_merk'){
		$id_merk = $_POST['txt_idmerk'];
		$merk 	 = $_POST['txt_merk'];
		$ket  	 = $_POST['txt_ket'];
		if($merk!=='') {
			$sql="SELECT NAMA FROM `t_merk` WHERE ID_MERK='$id_merk'";
			$res=mysql_query($sql,$link) or die(mysql_error());
			$ketemu=mysql_num_rows($res);	
			if ($ketemu <= 1) { 
				$merk_edit="UPDATE t_merk SET NAMA='$merk',KETERANGAN='$ket' WHERE ID_MERK='$id_merk'";
				$merk=mysql_query($merk_edit,$link) or die(mysql_error());;
				header('location:form.php?module=i_merk');
			}
			else {
				echo "<p align=center>Duplicate NAMA MERK, please insert another MERK</p>";
				echo "<p align=center><a href='form.php?module=edit_merk'>Back to input</a></p><br>";	
			}
		}	
		else {
			echo "<p align=center>NAMA MERK cannot be EMPTY, please insert another MERK</p>";
			echo "<p align=center><a href='form.php?module=edit_merk'>Back to input</a></p><br>";			
		}	
	}
	
	elseif ($module=='delete'){
		$sql="DELETE FROM t_merk WHERE ID_MERK='$_GET[id]'";
		$res=mysql_query($sql);
		header('location:form.php?module=i_merk');
	}	

}
else {
	header ("Location:belumlogin.php");
}
?>