<?php

require_once "../config/class_paging.php";

//========================================================FORM INPUT SPREI====================================================
if ($_GET["module"]=='i_sprei'){
	$link=koneksi_db();
	$level=$_SESSION['leveluser'];
//	echo $level;
	$p = new Paging;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	?>
	<h2>Data Sprei</h2>
	<p align=center>
	<table align="center">
	<tr><td>
		<?php
			$fieldcari="";
			if(isset($_POST['fieldcari']))
			   $fieldcari=$_POST['fieldcari'];
		?>
				<form method=POST action="?module=cari_sprei"> 
					<select name="fieldcari">
						<option value="ID_SPREI" <?php if($fieldcari=="ID_SPREI") echo "selected";?>>ID Sprei</option>
						<option value="merk" <?php if($fieldcari=="merk") echo "selected";?>>Merk</option>
						<option value="ukuran" <?php if($fieldcari=="ukuran") echo "selected";?>>Ukuran</option>
						<option value="DESKRIPSI" <?php if($fieldcari=="DESKRIPSI") echo "selected";?>>Keterangan</option>
					</select> 
					<input type="text" name="keyword" size=10 maxlength="30" value="<?php if(isset($_POST['keyword'])) echo $_POST['keyword'];?>" />
					<input type="submit" name="tblcari" value="Search">
				</form>
		</td>
	</tr>
		<?php
	if ($level=='toko') { ?>
	<tr><td align="center" colspan="2">
        <form method=POST action="?module=add_sprei">
        <input type=submit value='Add Sprei'>
        </form>
	</td></tr>
	<?php
	} ?>
	</table>

	<?php
	$sql_join="Select t_sprei.ID_USER as id from t_sprei, user where t_sprei.ID_USER = user.id AND user.username='$_SESSION[namauser]'";
	$res_join=mysql_query($sql_join,$link);
	$j=mysql_fetch_array($res_join);
	if ($j['id'] =='') { ?>
		<p align="center">Anda belum mempunyai data Sprei</p> 	
	<?php
	}
	else {
		if ($level=='toko') {	
		$sql="SELECT * FROM `t_sprei` WHERE ID_USER = $j[id] ORDER BY ID_SPREI DESC limit $posisi,$batas";
		}
		else {
		$sql="SELECT * FROM `t_sprei` ORDER BY ID_SPREI DESC limit $posisi,$batas";	
		}
		$res=mysql_query($sql,$link);
		$jmldata = mysql_num_rows($res); ?>
		<p align=center>Total available data : <?php echo $jmldata;?> <br>
		<?php
		$n=mysql_num_rows($res);		
	
		?>
		<table align=center>
		<tr><th>no</th><th>merk</th><th>ukuran</th><th>nama</th><th>harga</th><th>keterangan</th><th>action</th></tr>
		<?php	
		$no=$posisi+1;
		while ($r=mysql_fetch_array($res)){ 
			$sqljoin1="select t_merk.NAMA from t_merk, t_sprei 
							where t_merk.ID_MERK = t_sprei.ID_MERK AND t_sprei.ID_SPREI='$r[ID_SPREI]' ";
			$res_join1=mysql_query($sqljoin1);
			$join1=mysql_fetch_array($res_join1);
			
			$sqljoin2="select t_ukuran.UKURAN from t_ukuran, t_sprei 
							where t_ukuran.ID_UKURAN = t_sprei.ID_UKURAN AND t_sprei.ID_SPREI='$r[ID_SPREI]' ";
			$res_join2=mysql_query($sqljoin2);
			$join2=mysql_fetch_array($res_join2);

		?>
	
		<tr>
		<td bgcolor="#FFFFFF"><?php echo $no; ?></td>
		<td bgcolor="#FFFFFF"><a href=?module=detailsprei&id=<?php echo $r['ID_SPREI'] ?>><?php echo $join1['NAMA']; ?></a></td>
		<td bgcolor="#FFFFFF"><?php echo $join2['UKURAN']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $r['NAMA']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $r['HARGA']; ?></td>
		<td bgcolor="#FFFFFF"><?php echo $r['DESKRIPSI']; ?></td>
		<td bgcolor="#FFFFFF"><a href=?module=editsprei&id=<?php echo $r['ID_SPREI'];?>>Edit</a> |
	        <a href=exe_sprei.php?module=delete&id=<?php echo $r['ID_SPREI']; ?>
		  	onClick="return confirm('Are you sure want to delete sprei?')">
			Delete</a>
		</td></tr>
    <?php 
	$no++;
  	} ?>
	</table>
	<?php
  $jmldata      = mysql_num_rows($res_join);
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET['halaman'], $jmlhalaman);
  echo "<p align=center>$linkHalaman</p>";
  }
}

// Bagian Hasil Pencarian Sprei
elseif ($_GET["module"]=='cari_sprei'){
	$link=koneksi_db();
	$level=$_SESSION['leveluser'];	
	$sql_join="Select t_sprei.ID_USER as id from t_sprei, user where t_sprei.ID_USER = user.id AND user.username='$_SESSION[namauser]'";
	$res_join=mysql_query($sql_join,$link);
	$j=mysql_fetch_array($res_join);
?>
	<tr><td><p>Search Result</p></td></tr>
<?php
	if ($level=='toko') {
	$sql="select t_merk.ID_MERK, t_sprei.ID_MERK, t_ukuran.ID_UKURAN, t_sprei.ID_UKURAN, t_sprei.ID_SPREI as id_s, 
		  t_merk.NAMA as brand, t_ukuran.UKURAN as ukur, t_sprei.GAMBAR as gbr, t_sprei.DESKRIPSI as ket, t_sprei.NAMA as nama,t_sprei.HARGA as price
		  from t_merk, t_ukuran, t_sprei
		  where t_merk.ID_MERK = t_sprei.ID_MERK AND t_ukuran.ID_UKURAN = t_sprei.ID_UKURAN  AND t_sprei.ID_USER=$j[id]";
	}else {
	$sql="select t_merk.ID_MERK, t_sprei.ID_MERK, t_ukuran.ID_UKURAN, t_sprei.ID_UKURAN, t_sprei.ID_SPREI as id_s, 
		  t_merk.NAMA as brand, t_ukuran.UKURAN as ukur, t_sprei.GAMBAR as gbr, t_sprei.DESKRIPSI as ket, t_sprei.NAMA as nama,t_sprei.HARGA as price
		  from t_merk, t_ukuran, t_sprei
		  where t_merk.ID_MERK = t_sprei.ID_MERK AND t_ukuran.ID_UKURAN = t_sprei.ID_UKURAN";
	}	 
	if(isset($_POST['tblcari']))
	{
		$fieldcari=$_POST['fieldcari'];
		$keyword=$_POST['keyword'];
		if (($fieldcari=='ID_SPREI') OR ($fieldcari=='DESKRIPSI')) {
			$sql=$sql." AND t_sprei.$fieldcari like '%$keyword%'";
//			echo $sql;
		}elseif	($fieldcari=='merk')  {
			$sql=$sql." AND t_merk.NAMA like '%$keyword%'";
//			echo $sql;
		}elseif($fieldcari=='ukuran')	 {
			$sql=$sql." AND t_ukuran.UKURAN like '%$keyword%'";
		}	
			
	}
//	echo $sql;
	$res=mysql_query($sql,$link); 	
	$jumlah = mysql_num_rows($res);
	if ($jumlah > 0){ 
		$p      = new Paging;
		$batas  = 20;
		$posisi = $p->cariPosisi($batas);
	 	$no    = $posisi+1; 
		?>
		<table align="center">
		<tr><th>no</th><th>merk</th><th>ukuran</th><th>nama</th><th>harga</th><th>keterangan</th><th>action</th></tr>
		<?php
	    while ($r=mysql_fetch_array($res)){ ?>
			<tr>
			<td bgcolor="#FFFFFF"><?php echo $no; ?></td>
          	<td bgcolor="#FFFFFF"><a href=?module=detailsprei&id=<?php echo $r['id_s']; ?>><?php echo $r['brand']; ?></a></td>
		  	<td bgcolor="#FFFFFF"><?php echo $r['ukur']; ?></td>
			<td bgcolor="#FFFFFF"><?php echo $r['nama']; ?></td>
			<td bgcolor="#FFFFFF"><?php echo $r['price']; ?></td>
		  	<td bgcolor="#FFFFFF"><?php echo $r['ket']; ?></td>
			<td bgcolor="#FFFFFF"><a href=?module=editsprei&id=<?php echo $r['id_s'];?>>Edit</a> |
				<a href=exe_sprei.php?module=delete&id=<?php echo $r['id_s']; ?>
				onClick="return confirm('Are you sure want to delete sprei?')">
				Delete</a>
			</td>
			</tr>
			<?php 
     		$no++;
	 	} ?>
  		</table>
<?php		
 }    
  else{
    echo "<tr><td class=judul>Cannot found sprei with <b>$_POST[keyword]</b> keyword</td></tr>";
  }?>
	<p align=center><br>  [ <a href="?module=i_sprei">Back</a> ]</p><?php
}

//Bagian Sprei Input Form

elseif ($_GET["module"] == 'add_sprei') {
	$link=koneksi_db();
	$level=$_SESSION['leveluser'];

	$sql1="select * from t_merk";
	$res1=mysql_query($sql1,$link);
	
	$sql2="select * from t_ukuran";
	$res2=mysql_query($sql2,$link);

	$sql="Select max(ID_SPREI) as n from t_sprei";
	$res=mysql_query($sql,$link);
	$n=mysql_fetch_array($res);
	
	
//	echo $cari;

	
?>
	<h2>FORM INPUT DATA SPREI</h2>
	<form method=POST action="exe_sprei.php?module=add_sprei" enctype="multipart/form-data">
	<table>
		<tr>
			<td>ID_SPREI.</td>
	     	<td> : <input type="text" name="txt_idsprei" value="<?php echo $n['n']+1; ?>" readonly="" maxlength="6" size="6" /></td>
        </tr>
		<tr>
		  	<td>MERK</td>
			<td> :	<select name="merk">
						<?php while($m=mysql_fetch_array($res1)) { ?>
						<option value="<?php echo $m['ID_MERK']; ?>"><?php echo $m['NAMA']; ?></option>
						<?php } ?>
					</select>
			</td>
		</tr>
		<tr>
		  	<td>UKURAN</td>
			<td> :	<select name="ukuran">
						<?php while($u=mysql_fetch_array($res2)) { ?>
						<option value="<?php echo $u['ID_UKURAN']; ?>"><?php echo $u['UKURAN']; ?></option>
						<?php } ?>			
					</select>
			</td>
		</tr>
		<tr>
			<td>NAMA SPREI</td>
	     	<td> : <input type="text" name="txt_nama"/></td>
        </tr>
		
        <tr>
			<td>GAMBAR</td>
			<td> : <input type=file name=fupload size=40></td>
		</tr>
        <tr>
			<td>HARGA</td>
			<td> : <input type=text name=txt_harga size="10"></td>
		</tr>				
        <tr>
			<td>DESCRIPTION</td>
			<td> : <input type=text name=txt_desc size=50></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Add"> | <input type="button" value="Cancel" onclick=self.history.back()>
			</td>
		</tr>
	</table>
	</form>
<?php
}

// Detail Sprei
elseif ($_GET["module"]=='detailsprei'){
	$link=koneksi_db();
	$sql="SELECT * FROM t_sprei WHERE ID_SPREI='$_GET[id]'";
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); 

	$sqljoin1="select t_merk.NAMA from t_merk, t_sprei 
					where t_merk.ID_MERK = t_sprei.ID_MERK AND t_sprei.ID_SPREI='$d[ID_SPREI]' ";
	$res_join1=mysql_query($sqljoin1);
	$join1=mysql_fetch_array($res_join1);
	
	$sqljoin2="select t_ukuran.UKURAN from t_ukuran, t_sprei 
					where t_ukuran.ID_UKURAN = t_sprei.ID_UKURAN AND t_sprei.ID_SPREI='$d[ID_SPREI]' ";
	$res_join2=mysql_query($sqljoin2);
	$join2=mysql_fetch_array($res_join2);
	
	?>
	<h2>Detail Data Sprei Info</h2>
	<table>
	<tr>
		<td>ID Sprei</td>
		<td> : <?php echo $d['ID_SPREI'] ?></td>
	</tr>
	<tr>
		<td>Merk</td>
		<td> : <?php echo $join1['NAMA']; ?></td>
	</tr>	
	<tr>
		<td>Ukuran</td>
		<td> : <?php echo $join2['UKURAN']; ?></td>
	</tr>
	<tr>
		<td>Nama Sprei </td>
		<td> : <?php echo $d['NAMA'];?> </td>
	</tr>			
	<tr>
		<td>Harga</td>
		<td> : <?php echo $d['HARGA'];?> </td>
	</tr>		
	<tr>
		<td>Deskripsi</td>
		<td> : <?php echo $d['DESKRIPSI'];?> </td>
	</tr>
	<tr>
		<td>Gambar</td>
		<?php 
		if ($d['GAMBAR'] != '' ){?>
			<td> <img src="gambar/<?php echo $d['GAMBAR']?>" width="500" height="450"/> </td>
		<?php
		}
		else { ?>
			<td> : NO IMAGE </td><?php
		} ?>
	</tr>

	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href=?module=i_sprei>Back</a> ]</td>
	</tr>
	</table>
<?php	
}

// Bagian Edit Sprei
elseif ($_GET["module"]=='editsprei'){
	$link=koneksi_db();
	$id_s=$_GET['id'];
	$sql="SELECT * FROM t_sprei WHERE ID_SPREI='$id_s'";
	$detail=mysql_query($sql,$link);
	$d   = mysql_fetch_array($detail); ?>
	<h2>FORM EDIT DATA SPREI</h2>
	<form method=POST action="exe_sprei.php?module=edit_sprei" enctype="multipart/form-data">
	<table>
		<tr>
			<td>ID_SPREI.</td>
	     	<td> : <input type="text" name="txt_idsprei" maxlength="6" size="6" value="<?php echo $d['ID_SPREI']; ?>" /></td>
			<input type="hidden" value="<?php echo $id_s; ?>" name="txt_idasli" />
        </tr>
		<tr>
		  	<td>MERK</td>
			<?php
			$sql_merk="Select * from t_merk";
			$res=mysql_query($sql_merk,$link);
			?>
				<td> : <select name="merk">
				<?php				
					while ($merk=mysql_fetch_array($res)) { ?>
						<option value="<?php echo $merk['ID_MERK'];?>" <?php
							if	($d['ID_MERK']==$merk['ID_MERK']) { ?> selected="selected" <?php
							} ?>> <?php echo $merk['NAMA'];?> </option><?php
					}
				?>		
						</select>
				</td>			
		</tr>
		<tr>
		  	<td>UKURAN</td>
			<td> : <select name="ukuran">
			<?php
				$sql_ukur="Select * from t_ukuran";
				$res=mysql_query($sql_ukur,$link);
				while ($u=mysql_fetch_array($res)) {  ?>
					<option value="<?php echo $u['ID_UKURAN'];?>" <?php
						if	($d['ID_UKURAN']==$u['ID_UKURAN']) { ?> selected="selected" <?php
						} ?>> <?php echo $u['UKURAN'];?> </option><?php
				}
			?>
			</select></td>
		</tr>
        <tr>		
			<td>NAMA SPREI</td>
			<td> : <input type=text name=txt_nama size=25 value="<?php echo $d['NAMA']; ?>"></td>
		</tr>				
        <tr>		
			<td>HARGA</td>
			<td> : <input type=text name=txt_harga size=10 value="<?php echo $d['HARGA']; ?>"></td>
		</tr>		
        <tr>
        <tr><td>Gambar</td>
			<?php if ($d['GAMBAR'] != '') { ?>
			<td> : <img src="gambar/<?php echo $d['GAMBAR'] ?>" width="200" height="150"></td>
			<?php }else {?>
			<td> : NO IMAGE</td>
			<?php } ?>
		</tr>	
        <tr><td>Ganti Gbr</td>    <td> : <input type=file name=fupload size=30> *)</td></tr>	
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>		
		</tr>		
        <tr>		
			<td>DESCRIPTION</td>
			<td> : <input type=text name=txt_desc size=50 value="<?php echo $d['DESKRIPSI']; ?>"></td>
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