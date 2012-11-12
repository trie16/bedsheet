<?php
	include("lib_func.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bedsheet from Facebook</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#ffffff"><table border="0" align="center" cellpadding="0" cellspacing="0" class="outer">
      <tr>
         <td class="name">BED SHEET from FACEBOOK  </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" bgcolor="#B16E66"></td>
  </tr>
  <tr>
    <td><table border="0" align="center" cellpadding="0" cellspacing="0" class="outer">
  <tr>
    <td><?php menu(); ?></td>
  </tr>
  <tr>
    <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="183" valign="top"><table width="95%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="3"></td>
              </tr>
				<?php left(); ?>
          </table>
		</td>
        <td width="596" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10" bgcolor="#ffffff"></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff" valign="top">
<?php
	if ($_GET['module']=='price') {
	$link=koneksi_db();
	$i=0;
	$sql="select * from t_sprei ORDER BY HARGA DESC LIMIT $i,1";
	$res=mysql_query($sql,$link);
	
	?>
	<table border="0"  cellpadding="0" cellspacing="0">
	<tr><td valign="top" class="heading2">New Products</td></tr>
	<tr><td valign="top">
		<table border="0" align="center" cellpadding="0" cellspacing="0">
		<?php while ($r=mysql_fetch_array($res) AND $i <= 4) {?>
		<tr>
			<td valign="top" class="box-border">
				<table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr><td height="8"></td></tr>
					<tr><td class="box-head"><?php echo $r['NAMA']; ?></td></tr>
					<tr><td height="19">&nbsp;</td></tr>
					<tr><td align="center"><a href="#">
							<img src="admin/gambar/<?php echo $r['GAMBAR']; ?>" 
							width="225" height="150" style="border:1px solid #c2c2c2;" /></a></td></tr>
					<tr><td height="17"></td></tr>
					<tr><td class="smal-txt" align="center"><?php echo $r['DESKRIPSI']; ?></td></tr>
					<tr><td height="11"></td></tr>
					<tr><td height="50">
						<table border="0" align="center" cellpadding="0" cellspacing="0">
							<tr><td width="70" class="price">Rp <?php echo $r['HARGA']; ?></td>
								 <td width="1" bgcolor="#D9D9D9"></td>
								  <td width="117">
								  <table width="94" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr><td class="add">&raquo; <a href="#" target="_blank">Add to Cart</a></td></tr>
									<tr><td height="4"></td></tr>
									<tr><td class="details">&raquo; 
										<a href="detail.php?module=details&id=<?php echo $r['ID_SPREI']; ?>">Details</a></td></tr>
								  </table></td></tr>
						</table>
					</td></tr>
				</table>
			</td>
			<?php
				$i=$i+1;
				$sql="select * from t_sprei ORDER BY INPUT_DATE DESC LIMIT $i,1";
				$res=mysql_query($sql,$link);
				if($r=mysql_fetch_array($res)){
			?>
			<td valign="top" class="box-border">
				<table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr><td height="8"></td></tr>
					<tr><td class="box-head"><?php echo $r['NAMA']; ?></td></tr>
					<tr><td height="19">&nbsp;</td></tr>
					<tr><td align="center"><a href="#">
							<img src="admin/gambar/<?php echo $r['GAMBAR']; ?>" 
							width="225" height="150" style="border:1px solid #c2c2c2;" /></a></td></tr>
					<tr><td height="17"></td></tr>
					<tr><td class="smal-txt" align="center"><?php echo $r['DESKRIPSI']; ?></td></tr>
					<tr><td height="11"></td></tr>
					<tr><td height="50">
						<table border="0" align="center" cellpadding="0" cellspacing="0">
							<tr><td width="70" class="price">Rp <?php echo $r['HARGA']; ?></td>
								 <td width="1" bgcolor="#D9D9D9"></td>
								  <td width="117">
								  <table width="94" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr><td class="add">&raquo; <a href="#" target="_blank">Add to Cart</a></td></tr>
									<tr><td height="4"></td></tr>
									<tr><td class="details">&raquo; 
										<a href="detail.php?module=details&id=<?php echo $r['ID_SPREI']; ?>">Details</a></td></tr>
								  </table></td></tr>
						</table>
					</td></tr>
				</table>
			</td>			
		</tr>
		<?php 
			$i=$i+1;
			$sql="select * from t_sprei ORDER BY INPUT_DATE DESC LIMIT $i,1";
			$res=mysql_query($sql,$link);
			}
			}	//end while ?>		
		</tr>
		</table></td></tr>			  
</table></td>
    <tr><td>&nbsp;</td></tr>
<?php } ?>
	</td></tr></table>
	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href=javascript:history.go(-1)>Back</a> ]</td>
	</tr>
	</table>

			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
	<?php footer(); ?>

</body>
</html>