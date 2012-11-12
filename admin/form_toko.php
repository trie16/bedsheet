<?php

require_once "../config/class_paging.php";

//echo $_SESSION[namauser];

//========================================================FORM INPUT SPREI====================================================
//Bagian Screening Data 1 Preview Form 
if ($_GET["module"]=='i_toko'){
	$p = new Paging;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	?>
	<h2>Data Toko</h2>
	<p align=center>
	<table border=0>
	<tr><td align=left>
        <form method=POST action="?act=add_toko">
        <input type=submit value='Add Toko'>
        </form>
		</td>
		<td align=right>
		<form method=POST action="?act=cari_toko"> 
        <input name=kata type=text size=20>
        <input type=submit value=Search>
      	</form>
		</td>
	</tr>
	</table>

	<?php		
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM `t_toko`"));
    echo "<p align=center>Total available data : $jmldata <br>"; 	  			  		  	  
	$tampil=mysql_query("SELECT * FROM t_toko ORDER BY INPUT_DATE DESC limit $posisi,$batas");
	$n=mysql_num_rows($tampil);
	?>
	<table align=center>
    <tr><th>no</th><th>id toko</th><th>alamat FB</th><th>action</th></tr>
	<?php	
	$no=$posisi+1;
  	while ($r=mysql_fetch_array($tampil)){ ?>
		<tr><td><? echo $no ?></td>
		<td><a href=?act=detailsprei&id=<?php echo $r[ID_TOKO] ?>><?php echo $r[ID_TOKO] ?></a></td>
		<td><?php echo $r[ALAMAT_FB] ?></td>
		<td><a href=?act=edittoko&id=<?php echo $r[ID_TOKO]?>>Edit</a> |
		<a href=exe_sprei.php?module=i_seprei&act=delete&id=<?php echo $r[ID_TOKO] ?>
		onClick="return confirm('Are you sure want to delete toko data with ID <?php echo $r[ID_TOKOI] ?>?')">
		Delete</a>
	</td></tr>
	<?php 
     $no++;
  	} ?>
	<tr align=center><td colspan=6 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td></tr>
	</table>
	<?php
	$jmldata      = mysql_num_rows(mysql_query("SELECT * FROM `t_toko`"));
	$jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman  = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "<p align=center>$linkHalaman</p>";
}

// Bagian Hasil Pencarian Toko
elseif ($_GET["module"]=='cari_toko'){
?>
	<tr><td><p>Search Result</p></td></tr>
<?php
	$cari   = mysql_query("SELECT * FROM t_toko WHERE ID_TOKO LIKE '%$_POST[kata]%' OR ALAMAT_FB LIKE '%$_POST[kata]%'");
//	echo $cari;
	$jumlah = mysql_num_rows($cari);
	if ($jumlah > 0){ 
		$p      = new Paging;
		$batas  = 20;
		$posisi = $p->cariPosisi($batas);
	 	$no    = $posisi+1; 
		?>
		<table align="center">
		<tr><th>no</th><th>id toko</th><th>alamat fb</th><th>action</th></tr>
		<?php
	    while ($r=mysql_fetch_array($cari)){ ?>
			<tr>
			<tr><td><? echo $no ?></td>
			<td><a href=?act=detailsprei&id=<?php echo $r[ID_TOKO] ?>><?php echo $r[ID_TOKO] ?></a></td>
			<td><?php echo $r[ALAMAT_FB] ?></td>
			<td><a href=?act=edittoko&id=<?php echo $r[ID_TOKO]?>>Edit</a> |
			<a href=exe_sprei.php?module=i_toko&act=delete&id=<?php echo $r[ID_TOKO] ?>
			onClick="return confirm('Are you sure want to delete sprei data with ID <?php echo $r[ID_TOKO] ?>?')">
			Delete</a>
			</td></tr>
			<?php 
     		$no++;
	 	} ?>
  		</table>
<?php		
 }    
  else{
    echo "<tr><td class=judul>Cannot found sprei with <b>$_POST[kata]</b> keyword</td></tr>";
  }
	echo "<p align=center><br>
        [ <a href=javascript:history.go(-1)>Back</a> ]</p>";	 		  
}

//Bagian Sprei Input Form
elseif ($_GET["module"]=='add_toko'){
?>
	<h2>FORM INPUT DATA TOKO</h2>
	<form method=POST action="exe_toko.php?module=i_sprei&act=edit_sprei">
	<table>
		<tr>
			<td>ID_TOKO.</td>
	     	<td> : <input type="text" name="txt_idtoko" maxlength="6" size="6" /></td>
        </tr>
        <tr>
			<td>Nama Toko</td>
			<td> : <input type=text name=txt_nama size=40></td>
		</tr>
        <tr>
			<td>Alamat FB</td>
			<td> : <input type=text name=txt_fb size=50></td>
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
elseif ($_GET["module"]=='detailtoko'){
	$detail=mysql_query("SELECT * FROM t_sprei WHERE ID_SPREI='$_GET[id]'");
	$d   = mysql_fetch_array($detail); ?>
	<h2>Health Center ILI Screening Detail Info</h2>
	<table>
	<tr>
		<td>ID Sprei</td>
		<td> : <?php echo $d[ID_SPREI] ?></td>
	</tr>
	<tr>
		<td>Merk</td>
		<td> : <?php echo $d[MERK] ?></td>
	</tr>	
	<tr>
		<td>Ukuran</td>
		<td> : <?php echo $d[UKURAN] ?></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td> : <?php echo $d[DESKRIPSI]?> </td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> <img src="gambar/<?php echo $d[GAMBAR]?>" width="500" height="450"/> </td>
	</tr>

	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td>
	</tr>
	</table>
<?php	
}

// Bagian Edit Toko
elseif ($_GET["module"]=='edittoko'){
	$detail=mysql_query("SELECT * FROM t_sprei WHERE ID_SPREI='$_GET[id]'");
	$d   = mysql_fetch_array($detail); ?>
	<h2>FORM EDIT DATA SPREI</h2>
	<form method=POST action="exe_sprei.php?module=i_sprei&act=add_sprei" enctype="multipart/form-data">
	<table>
		<tr>
			<td>ID_SPREI.</td>
	     	<td> : <input type="text" name="txt_idsprei" maxlength="6" size="6" value="<?php echo $d[ID_SPREI]; ?>" /></td>
        </tr>
		<tr>
		  	<td>MERK</td>
			<?php
			$sql_merk=mysql_query("Select MERK from t_sprei where ID_SPREI='$_GET[id]'");
    	    while ($merk=mysql_fetch_array($sql_merk)) {
				if ($merk[MERK]=='My Love') {
			?>
				<td> :	<select name="merk">
							<option value="My Love" selected="selected">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Katun Jepang') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang" selected="selected">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Kintakun') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun" selected="selected">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Chuangfa') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa" selected="selected">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Katun Korea') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea" selected="selected">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Katun Cina') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina" selected="selected">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Grand Shira') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira" selected="selected">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				elseif ($merk[MERK]=='Beladona') { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona" selected="selected">Beladona</option>
							<option value="Internal">Internal</option>
						</select>
				</td>
			<?php
				}
				else { ?>
				<td> :	<select name="merk">
							<option value="My Love">My Love</option>
							<option value="Kintakun">Kintakun</option>
							<option value="Chuangfa">Chuangfa</option>
							<option value="Katun Jepang">Katun Jepang</option>
							<option value="Katun Korea">Katun Korea</option>
							<option value="Katun Cina">Katun China</option>
							<option value="Grand Shira">Grand Shira</option>
							<option value="Beladona">Beladona</option>
							<option value="Internal" selected="selected">Internal</option>
						</select>
				</td>
				
			<?php	
				}
			}	
			?>				
		</tr>
		<tr>
		  	<td>UKURAN</td>
			<?php
			$sql_u=mysql_query("Select UKURAN from t_sprei where ID_SPREI='$_GET[id]'");
    	    while ($u=mysql_fetch_array($sql_u)) {
				if ($u[UKURAN]=='100x200') {
			?>		
					<td> :	<select name="ukuran">
								<option value="100x200" selected="selected">100x200</option>
								<option value="120x200">120x200</option>
								<option value="160x200">160x200</option>
								<option value="180x200">160x200</option>
								<option value="200x200">160x200</option>
							</select>
					</td>
			<?php }
				elseif ($u[UKURAN]=='120x200') {
			?>		
					<td> :	<select name="ukuran">
								<option value="100x200">100x200</option>
								<option value="120x200" selected="selected">120x200</option>
								<option value="160x200">160x200</option>
								<option value="180x200">160x200</option>
								<option value="200x200">160x200</option>
							</select>
					</td>
			<?php }
				elseif ($u[UKURAN]=='160x200') {
			?>		
					<td> :	<select name="ukuran">
								<option value="100x200">100x200</option>
								<option value="120x200">120x200</option>
								<option value="160x200" selected="selected">160x200</option>
								<option value="180x200">160x200</option>
								<option value="200x200">160x200</option>
							</select>
					</td>
			<?php } 
				elseif ($u[UKURAN]=='180x200') {
			?>		
					<td> :	<select name="ukuran">
								<option value="100x200">100x200</option>
								<option value="120x200">120x200</option>
								<option value="160x200">160x200</option>
								<option value="180x200" selected="selected">180x200</option>
								<option value="200x200">160x200</option>
							</select>
					</td>
			<?php } 
				else {
			?>		
					<td> :	<select name="ukuran">
								<option value="100x200">100x200</option>
								<option value="120x200">120x200</option>
								<option value="160x200">160x200</option>
								<option value="180x200">160x200</option>
								<option value="200x200" selected="selected">200x200</option>
							</select>
					</td>
			<?php } 
			}
			?>
			
		</tr>
        <tr>
        <tr><td>Gambar</td><td> : <img src="gambar/<?php echo $d[GAMBAR] ?>" width="200" height="150"></td></tr>
        <tr><td>Ganti Gbr</td>    <td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
		</tr>
        <tr>
			<td>DESCRIPTION</td>
			<td> : <input type=text name=txt_desc size=50 value="<?php echo $d[DESKRIPSI]; ?>"></td>
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


?>