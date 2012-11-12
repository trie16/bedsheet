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
	if ($_GET['module']=='details') {
	
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

	$sqljoin3="select user.facebook from user, t_sprei 
					where user.id = t_sprei.ID_USER AND t_sprei.ID_SPREI='$d[ID_SPREI]' ";
	$res_join3=mysql_query($sqljoin3);
	$join3=mysql_fetch_array($res_join3);
	
	$sql_update="UPDATE t_sprei SET COUNTER=$d[COUNTER]+1 WHERE ID_SPREI='$_GET[id]'";
	$apdet=mysql_query($sql_update,$link);
	?>
	
	<table width="576" border="0" align="center" cellpadding="0" cellspacing="0">
<!--	<tr>
		<td class="box-head">ID Sprei</td>
		<td class="box-head"> : <?php //echo $d['ID_SPREI'] ?></td>
	</tr> -->
	<tr>
		<td valign="top" class="heading2" colspan="2">Detail Sprei</td>
	</tr>	
	<tr>
		<td class="box-head">Merk</td>
		<td class="box-head"> : <?php echo $join1['NAMA']; ?></td>
	</tr>	
	<tr>
		<td class="box-head">Ukuran</td>
		<td class="box-head"> : <?php echo $join2['UKURAN']; ?></td>
	</tr>
	<tr>
		<td class="box-head">Nama Sprei </td>
		<td class="box-head"> : <?php echo $d['NAMA'];?> </td>
	</tr>			
	<tr>
		<td class="box-head">Harga</td>
		<td class="box-head"> : Rp <?php echo $d['HARGA'];?>,- </td>
	</tr>		
	<tr>
		<td class="box-head">Deskripsi</td>
		<td class="box-head"> : <?php echo $d['DESKRIPSI'];?> </td>
	</tr>
	<tr>
		<td class="box-head">Facebook</td>
		<td class="box-head"> : <a href="http://<?php echo $join3['facebook'];?>"><?php echo $join3['facebook'];?></a> </td>
	</tr>	
	<tr>
		<td class="box-head"></td> 
		<?php 
		if ($d['GAMBAR'] != '' ){?>
			<td align="center"> <img src="admin/gambar/<?php echo $d['GAMBAR']?>" width="500" height="450"/> </td>
		<?php
		}
		else { ?>
			<td class="box-head" > : NO IMAGE </td><?php
		}
		
} ?>
	</tr>
	<tr>
		<td class="box-head" colspan="2"></td>
	</tr>
	<tr align=center>
		<td colspan=2 class=kembali><br> [ <a href="index.php">Back</a> ]</td>
	</tr>
	</table>

			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table></td>
  </tr>
	<?php footer(); ?>
 </table>
</body>
</html>
