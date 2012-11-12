<table width="576" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
// Bagian Home
if ($_GET["module"]=='home'){ 
?>
	<tr><td><img src="images/rc1.gif" alt="Furniture" width="576" height="15" /></td></tr>
	<tr><td bgcolor="#E8E5E1" class="heading">Welcome to our website!</td></tr>
	<tr><td bgcolor="#E8E5E1" id="main">Website ini dibuat untuk membantu para pelanggan sprei khususnya pengguna facebook, untuk mempermudah 
	mendapatkan referensi sprei yang diinginkan. Kami menyediakan feature pencarian lengkap dengan facebook link serta perbandingan harga. </td></tr>
	<tr><td><img src="images/rc2.gif" alt="Furniture" width="576" height="15" /></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php
	$sql="select * from t_sprei ORDER BY INPUT_DATE DESC LIMIT 0,2";
//	echo $sql;
	$res=mysql_query($sql,$link);
	
?>
<table border="0"  cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" class="heading2">Featured Products</td>
	</tr>
	<tr>
		<td valign="top"><table border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<?php while ($r=mysql_fetch_array($res)) { ?>
		<td valign="top" class="box-border">
		<table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr><td height="8"></td></tr>
			<tr><td class="box-head"><?php echo $r['NAMA']; ?></td></tr>
			<tr><td height="19">&nbsp;</td></tr>
			<tr><td align="center"><ul class="thumb">
<li><a href="#"><img src="admin/gambar/<?php echo $r['GAMBAR']; ?>" width="225" height="150" style="border:1px solid #c2c2c2;" /></a></li></ul></td>
			</tr>
			<tr><td height="17"></td></tr>
			<tr><td class="smal-txt" align="center"><?php echo $r['DESKRIPSI']; ?></td></tr>
			<tr><td height="11"></td></tr>
			<tr><td height="50">
				<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td width="70" class="price">Rp <?php echo $r['HARGA']; ?></td>
					<td width="1" bgcolor="#D9D9D9"></td>
					<td width="117">
						<table width="94" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr><td class="add">&raquo; <a href="http://www.templatesperfect.com" target="_blank">Add to Cart</a></td></tr>
						<tr><td height="4"></td></tr>
						<tr><td class="details">&raquo; <a href="?module=detail&id=<?php echo $r['ID_SPREI']; ?>" target="_blank">Details</a></td></tr>
						</table>
					</td>
				</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<?php 	}	?>
	</tr>
	</table></td></tr>			  
</table></td>
    <tr><td>&nbsp;</td></tr>
<?php 
} elseif ($_GET["module"]=='detail'){ 
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
	<tr><td>
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
			<td> <img src="admin/gambar/<?php echo $d['GAMBAR']?>" width="500" height="450"/> </td>
		<?php
		}
		else { ?>
			<td> : NO IMAGE </td><?php
		} ?>
	</tr>

	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td>
	</tr>
	</table>
	</td></tr>
<?php
}

 ?>
</table>
