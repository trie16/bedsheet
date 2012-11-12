<?php

require_once "../config/class_paging.php";


if ($_GET["module"]=='i_ukuran'){
	$p = new Paging;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	?>
	<h2>Data Ukuran</h2>
	<p align=center>
	<table border=0>
	<tr><td align=left>
        <form method=POST action="?module=add_ukur">
        	<input type=submit value='Add Ukuran' name="add_ukur">
        </form>
		</td>
		<td align=right>
		<form method=POST action="?module=cari_ukur"> 
        <input name=kata type=text size=20>
        <input type=submit value=Search>
      	</form>
		</td>
	</tr>
	</table>

	<?php
	$link=koneksi_db();
	$sql="SELECT * FROM `t_ukuran`";
	$res=mysql_query($sql,$link);
    $jmldata = mysql_num_rows($res);
    echo "<p align=center>Total available data : $jmldata <br>"; 	  			  		  	  
	$tampil=mysql_query("SELECT * FROM t_ukuran ORDER BY ID_UKURAN ASC limit $posisi,$batas");
	$n=mysql_num_rows($tampil);		
	?>
	<table align=center>
    <tr><th>no</th><th>UKURAN</th><th>keterangan</th><th>action</th></tr>
	<?php	
	$no=$posisi+1;
  	while ($r=mysql_fetch_array($tampil)){ ?>
		<tr><td><?php echo $no; ?></td>
		<td><a href=?module=detailukur&id=<?php echo $r['ID_UKURAN'] ?>><?php echo $r['UKURAN'] ?></a></td>
		<td><?php echo $r['KETERANGAN']; ?></td>
		<td><a href=?module=editukur&id=<?php echo $r['ID_UKURAN']; ?>>Edit</a> |
	        <a href=exe_ukuran.php?module=delete&id=<?php echo $r['ID_UKURAN'] ?>
		  	onClick="return confirm('Are you sure to delete data ukuran <?php echo $r['UKURAN'] ?>?')">
			Delete</a>
		</td></tr>
    <?php 
	$no++;
  	} ?>
	</table>
	<?php
  $jmldata      = mysql_num_rows(mysql_query("SELECT * FROM `t_ukuran`"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET['halaman'], $jmlhalaman);
  echo "<p align=center>$linkHalaman</p>";
}

// Bagian Hasil Pencarian Sprei
elseif ($_GET['module']=='cari_ukur'){
?>
	<tr><td><p><b>Search Result : </b></p></td></tr>
<?php
	$kata = $_POST['kata'];
	$link = koneksi_db();
	$sql_cari  ="SELECT * FROM `t_ukuran` WHERE ID_UKURAN LIKE '%$kata%' OR UKURAN LIKE '%$kata%' OR KETERANGAN LIKE '%$kata%'";
	$cari = mysql_query($sql_cari,$link);
//	echo $cari;
	$jumlah = mysql_num_rows($cari);
	if ($jumlah > 0){ 
		$p      = new Paging;
		$batas  = 20;
		$posisi = $p->cariPosisi($batas);
	 	$no    = $posisi+1; 
		?>
		<table align=center>
		<tr><th>no</th><th>merk</th><th>keterangan</th><th>action</th></tr>
		<?php
	    while ($r=mysql_fetch_array($cari)){ ?>
			<tr><td><?php echo $no ?></td>
			<td><a href=?module=detailukur&id=<?php echo $r['UKURAN'] ?>><?php echo $r['UKURAN'] ?></a></td>
			<td><?php echo $r['KETERANGAN'] ?></td>
			<td><a href=?module=editukur&id=<?php echo $r['ID_UKURAN'];?>>Edit</a> |
				<a href=exe_ukuran.php?module=delete&id=<?php echo $r['ID_UKURAN'] ?>
				onClick="return confirm('Are you sure want to delete data Ukuran <?php echo $r['UKURAN'] ?>?')">
				Delete</a>
			</td></tr>
			<?php 
     		$no++;
	 	} ?>
  		</table>
<?php		
 }    
  else{
    echo "<tr><td class=judul>Cannot found merk with <b>$_POST[kata]</b> keyword</td></tr>";
  }
	echo "<p><br>
        [ <a href=javascript:history.go(-1)>Back</a> ]</p>";	 		  
}
elseif ($_GET["module"]=='add_ukur'){ 
	$link=koneksi_db();
	$sql="Select * from t_ukuran order by ID_UKURAN DESC";
	$res=mysql_query($sql,$link);
	$sql2="Select max(ID_UKURAN) as no from t_ukuran";
	$res2=mysql_query($sql2,$link);
	$n=mysql_fetch_array($res2);
//Bagian Merk Input Form ?>
	<h2>FORM INPUT DATA UKURAN</h2>
<!--	<form method=POST action="exe_merk.php?module=add_merk" enctype="multipart/form-data"> -->
	<form method=POST action="exe_ukuran.php?module=add_ukur">
	<table>
		<tr>
			<td>ID_UKURAN.</td>
	     	<td> : <input type="text" name="txt_idukur" maxlength="6" size="6" value="<?php echo $n['no']+1; ?>" readonly=""/></td>
        </tr>
		<tr>
		  	<td>UKURAN</td>
			<td> :	<input type="text" name="txt_ukur"/>
			</td>
		</tr>
        <tr>
			<td>KETERANGAN</td>
			<td> : <textarea name="txt_desc" cols="30" rows="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Add" name="addmerk"> | <input type="button" value="Cancel" onclick=self.history.back()>
			</td>
		</tr>
	</table>
	</form> 
	
<?php
}

// Detail Merk
elseif ($_GET["module"]=='detailukur'){
	$link=koneksi_db();
	$id=$_GET['id'];
	$sql="SELECT * FROM t_ukuran WHERE ID_UKURAN='$id'";
//	echo $sql;
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); ?>
	<h2>Detail Data UKURAN</h2>
	<table align="center">
	<tr>
		<td>ID UKURAN</td>
		<td> : <?php echo $d['ID_UKURAN'] ?></td>
	</tr>
	<tr>
		<td>UKURAN</td>
		<td> : <?php echo $d['UKURAN'] ?></td>
	</tr>
	<tr>
		<td>KETERANGAN</td>
		<td> : <?php echo $d['KETERANGAN']?> </td>
	</tr>

	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td>
	</tr>
	</table>
<?php	
}

// Bagian Edit MERK
elseif ($_GET["module"]=='editukur'){
	$link=koneksi_db();
	$id_u=$_GET['id'];
	$sql="SELECT * FROM t_ukuran WHERE ID_UKURAN='$id_u'";
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); ?>
	<h2>FORM EDIT DATA UKURAN</h2>
	<form method=POST action="exe_ukuran.php?module=edit_ukur">
	<table>
		<tr>
			<td>ID_UKURAN.</td>
	     	<td> : <input type="text" name="txt_idukur" maxlength="6" size="4" value="<?php echo $d['ID_UKURAN']; ?>" /></td>
        </tr>
		<tr>
		  	<td>UKURAN</td>
	     	<td> : <input type="text" name="txt_ukur" value="<?php echo $d['UKURAN']; ?>" /></td>
        </tr>
        <tr>
        <tr>
			<td>KETERANGAN</td>
			<td> : <textarea name="txt_ket" cols="20" rows="4"> <?php echo $d['KETERANGAN']; ?> </textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center">	<input type="submit" value="Edit"> | <input type="button" value="Cancel" onclick=self.history.back()>
			</td>
		</tr>
	</table>
	</form>
<?php	
}


?>