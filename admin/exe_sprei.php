<?php
session_start();

if (($_SESSION['sudahlogin']==true) && ($_SESSION['namauser'] != "")) {
	$nama=$_SESSION['namauser'];
	
	include("conn.php");
	require_once "../config/library.php";
	require_once "../config/fungsi_indotgl.php";
	require_once "../config/fungsi_combobox.php";
	require_once "../config/class_paging.php";
	$link=koneksi_db();
//	$sqlj="Select distinct t_sprei.ID_USER as id from t_sprei, user where t_sprei.ID_USER=user.id AND user.username='$nama'";
	$sqlj="Select id from user where username='$nama'";
	$resj=mysql_query($sqlj,$link);
	$j=mysql_fetch_array($resj);
	
	$module=$_GET["module"];
	// Input Sprei
	if ($module=='add_sprei'){
		$lokasi_file = $_FILES['fupload']['tmp_name'];
		$nama_file   = $_FILES['fupload']['name'];
		$id_screen	 = $_POST['txt_idsprei'];
		$merk 		 = $_POST['merk'];
		$ukuran		 = $_POST['ukuran'];
		$deskripsi	 = $_POST['txt_desc'];
		$id          = $j['id'];
		$harga		 = $_POST['txt_harga'];
		$nama		 = $_POST['txt_nama'];	
		
		$sql="SELECT ID_SPREI FROM `t_sprei` WHERE ID_SPREI='$id_screen'";
		$res=mysql_query($sql,$link) or die(mysql_error());
		$ketemu=mysql_num_rows($res);	
		if ($ketemu <= 0) { 
			move_uploaded_file($lokasi_file,"gambar/$nama_file");
			$sprei_input="INSERT INTO t_sprei(ID_SPREI,NAMA,ID_USER,ID_MERK,ID_UKURAN,GAMBAR,HARGA,COUNTER,DESKRIPSI,INPUT_DATE,INPUT_DAY,INPUT_HOUR)
					  	 VALUES('$id_screen','$nama','$id','$merk','$ukuran','$nama_file','$harga','','$deskripsi','$tgl_sekarang','$hari_ini','$jam_sekarang')";
			echo $sprei_input;			  
			$sprei=mysql_query($sprei_input,$link) or die(mysql_error());;
			header('location:form.php?module=i_sprei');
		}
		else {
		echo "<p align=center>Duplicate ID Screening, please insert another ID</p>";
		echo "<p align=center><a href='form.php?act=screening'>Back to input</a></p><br>";	
		}
	 
	}
	
	// Edit Sprei
	elseif ($module=='edit_sprei'){
		$link=koneksi_db();
		$id=$_POST['txt_idsprei'];
		$sql_edit="SELECT `ID_SPREI` FROM `t_sprei` WHERE `ID_SPREI` ='$id'";
	//	echo $sql_edit;
		$cek=mysql_query($sql_edit,$link);
		$s=mysql_num_rows($cek);
		
		if ($s <= 1 ) {
			$lokasi_file = $_FILES['fupload']['tmp_name'];
			$nama_file   = $_FILES['fupload']['name'];
			// Apabila gambar tidak diganti
			if (empty($lokasi_file)){
				$sprei_edit="UPDATE `t_sprei` SET   `NAMA`      = '$_POST[txt_nama]',
													`ID_MERK`   = '$_POST[merk]',
													`ID_UKURAN` = '$_POST[ukuran]',
													`HARGA`     = '$_POST[txt_harga]',
													`DESKRIPSI` = '$_POST[txt_desc]',
													`EDIT_DATE` = '$tgl_sekarang'
											  WHERE `ID_SPREI`='$id'";
										 
		//		  echo $sprei_edit;
				$ubah=mysql_query($sprei_edit);
			} 
			//gambar diganti
			else {
				move_uploaded_file($lokasi_file,"gambar/$nama_file");	
				$sprei_edit="UPDATE `t_sprei` SET   `NAMA`      = '$_POST[txt_nama]',
													`ID_MERK`     = '$_POST[merk]',
													`ID_UKURAN`   = '$_POST[ukuran]',
													`HARGA`     = '$_POST[txt_harga]',
													`GAMBAR`   = '$nama_file',
													`DESKRIPSI`= '$_POST[txt_desc]',
													`EDIT_DATE`= '$tgl_sekarang'
											  WHERE `ID_SPREI`='$id'";
										 
	//			  echo $sprei_edit;
				$ubah=mysql_query($sprei_edit);			
			} 
		}	   
		else {
			echo "<p class=alertmerah>ID SPREI SUDAH ADA</p>";	
		}
		header('location:form.php?module=i_sprei');
	   
	}
	
	//Bagian Hapus Sprei
	elseif ($module=='delete'){
		$link=koneksi_db();
		$sql="DELETE FROM t_sprei WHERE ID_SPREI='$_GET[id]'";
		$res=mysql_query($sql,$link);
		header('location:form.php?module=i_sprei');
	}	

}
else {
	header ("Location:belumlogin.php");
}

?>