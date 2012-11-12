<?php

require_once "../config/class_paging.php";


if ($_GET["module"]=='i_merk'){
	$p = new Paging;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	?>
	<h2>Data Merk</h2>
	<p align=center>
	<table border=0>
	<tr><td align=left>
        <form method=POST action="?module=add_merk">
        	<input type=submit value='Add Merk' name="add_merk">
        </form>
		</td>
		<td align=right>
		<form method=POST action="?module=cari_tmerk"> 
        <input name=kata type=text size=20>
        <input type=submit value=Search>
      	</form>
		</td>
	</tr>
	</table>

	<?php
	$link=koneksi_db();
	$sql="SELECT * FROM `t_merk`";
	$res=mysql_query($sql,$link);
    $jmldata = mysql_num_rows($res);
    echo "<p align=center>Total available data : $jmldata <br>"; 	  			  		  	  
	$tampil=mysql_query("SELECT * FROM t_merk ORDER BY ID_MERK ASC limit $posisi,$batas");
	$n=mysql_num_rows($tampil);		
	?>
	<table align=center>
    <tr><th>no</th><th>merk</th><th>keterangan</th><th>action</th></tr>
	<?php	
	$no=$posisi+1;
  	while ($r=mysql_fetch_array($tampil)){ ?>
		<tr><td><?php echo $no; ?></td>
		<td><a href=?module=detailmerk&id=<?php echo $r['ID_MERK'] ?>><?php echo $r['NAMA'] ?></a></td>
		<td><?php echo $r['KETERANGAN']; ?></td>
		<td><a href=?module=editmerk&id=<?php echo $r['ID_MERK']; ?>>Edit</a> |
	        <a href=exe_merk.php?module=delete&id=<?php echo $r['ID_MERK'] ?>
		  	onClick="return confirm('Are you sure to delete data merk with name <?php echo $r['NAMA'] ?>?')">
			Delete</a>
		</td></tr>
    <?php 
	$no++;
  	} ?>
<!--	<tr align=center>
		 <td colspan=6 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td></tr></td> 
	</tr>-->
	</table>
	<?php
  $jmldata      = mysql_num_rows(mysql_query("SELECT * FROM `t_merk`"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET['halaman'], $jmlhalaman);
  echo "<p align=center>$linkHalaman</p>";
}

// Bagian Hasil Pencarian Sprei
elseif ($_GET['module']=='cari_tmerk'){
?>
	<tr><td><p><b>Search Result : </b></p></td></tr>
<?php
	$kata = $_POST['kata'];
	$link = koneksi_db();
	$sql_cari  ="SELECT * FROM `t_merk` WHERE ID_MERK LIKE '%$kata%' OR NAMA LIKE '%$kata%' OR KETERANGAN LIKE '%$kata%'";
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
			<td><a href=?module=detailmerk&id=<?php echo $r['NAMA'] ?>><?php echo $r['NAMA'] ?></a></td>
			<td><?php echo $r['KETERANGAN'] ?></td>
			<td><a href=?module=editmerk&id=<?php echo $r['ID_MERK'];?>>Edit</a> |
				<a href=exe_merk.php?module=delete&id=<?php echo $r['ID_MERK'] ?>
				onClick="return confirm('Are you sure want to delete merk <?php echo $r['NAMA'] ?>?')">
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
elseif ($_GET["module"]=='add_merk'){ 
	$link=koneksi_db();
	$sql="Select * from t_merk order by ID_MERK DESC";
	$res=mysql_query($sql,$link);
	$sql2="Select max(ID_MERK) as n from t_merk";
	$res2=mysql_query($sql2,$link);
	$n=mysql_fetch_array($res2);
//Bagian Merk Input Form ?>
	<h2>FORM INPUT DATA MERK</h2>
<!--	<form method=POST action="exe_merk.php?module=add_merk" enctype="multipart/form-data"> -->
	<form method=POST action="exe_merk.php?module=add_merk">
	<table>
		<tr>
			<td>ID_MERK.</td>
	     	<td> : <input type="text" name="txt_idmerk" maxlength="6" size="6" value="<?php echo $n['n']+1; ?>" readonly=""/></td>
        </tr>
		<tr>
		  	<td>MERK</td>
			<td> :	<input type="text" name="txt_merk" id="merk" />
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
elseif ($_GET["module"]=='detailmerk'){
	$link=koneksi_db();
	$id=$_GET['id'];
	$sql="SELECT * FROM t_merk WHERE ID_MERK='$id'";
//	echo $sql;
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); ?>
	<h2>Detail Data Merk</h2>
	<table align="center">
	<tr>
		<td>ID MERK</td>
		<td> : <?php echo $d['ID_MERK'] ?></td>
	</tr>
	<tr>
		<td>MERK</td>
		<td> : <?php echo $d['NAMA'] ?></td>
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
elseif ($_GET["module"]=='editmerk'){
	$link=koneksi_db();
	$id_m=$_GET['id'];
	$sql="SELECT * FROM t_merk WHERE ID_MERK='$id_m'";
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); ?>
	<h2>FORM EDIT DATA MERK</h2>
	<form method=POST action="exe_merk.php?module=edit_merk">
	<table>
		<tr>
			<td>ID_MERK.</td>
	     	<td> : <input type="text" name="txt_idmerk" maxlength="6" size="4" value="<?php echo $d['ID_MERK']; ?>" /></td>
        </tr>
		<tr>
		  	<td>MERK</td>
	     	<td> : <input type="text" name="txt_merk" value="<?php echo $d['NAMA']; ?>" /></td>
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