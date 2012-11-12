<?php
	include("lib_func.php");
	require_once "config/class_paging.php";
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
    <td bgcolor="#ffffff">
	<table border="0" align="center" cellpadding="0" cellspacing="0" class="outer">
      <tr>
         <td class="name">BED SHEET from FACEBOOK  </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" bgcolor="#B16E66"></td>
  </tr>
  <tr>
    <td>
		<table border="0" align="center" cellpadding="0" cellspacing="0" class="outer">
		  <tr>
    		<td><?php menu(); ?></td>
  		 </tr>
  		 <tr>
   			<td valign="top"><table border="0" cellspacing="0" cellpadding="0">
      	<tr>
        	<td width="183" valign="top">
				<table width="95%" border="0" cellpadding="0" cellspacing="0">
              		<tr><td height="3"></td></tr>
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
				if ($_GET['module']=='search') {				
					$link=koneksi_db();
					$p = new Paging;
					$batas  = 20;
					$posisi = $p->cariPosisi($batas);
					$kata=@$_POST['kata'];
					$fieldcari=@$_POST['fieldcari'];
					if ($kata=='') {
					$sql="SELECT * FROM `t_sprei` ORDER BY ID_SPREI DESC limit $posisi,$batas";
					}
					else {
						if ($fieldcari=='harga') {
							$sql = "Select * from t_sprei where HARGA  like '%$kata%' OR DESKRIPSI like '%$kata%'";
						}
						elseif ($fieldcari=='merk') {
							$sql="SELECT t_merk.NAMA as MERK, t_sprei.ID_SPREI, t_sprei.HARGA as HARGA, t_sprei.DESKRIPSI as DESKRIPSI, t_sprei.NAMA as NAMA
								 FROM `t_sprei` , t_merk
								 WHERE t_merk.NAMA like '%$kata%' AND t_merk.ID_MERK = t_sprei.ID_MERK
								 ORDER BY t_sprei.ID_SPREI DESC limit $posisi,$batas";
						}
						elseif ($fieldcari=='ukuran') {
							$sql="SELECT t_ukuran.UKURAN, t_sprei.ID_SPREI, t_sprei.HARGA as HARGA, t_sprei.DESKRIPSI as DESKRIPSI,t_sprei.NAMA as NAMA
								 FROM `t_sprei` , t_ukuran
								 WHERE t_ukuran.UKURAN like '%$kata%' AND t_ukuran.ID_UKURAN = t_sprei.ID_UKURAN
								 ORDER BY t_sprei.ID_SPREI DESC limit $posisi,$batas";						
						}
						elseif ($fieldcari=='lokasi') {
							$sql="SELECT user.kota, t_sprei.ID_SPREI, t_sprei.HARGA as HARGA, t_sprei.DESKRIPSI as DESKRIPSI,t_sprei.NAMA as NAMA
								 FROM `t_sprei` , user
								 WHERE user.kota like '%$kata%' AND user.id = t_sprei.ID_USER
								 ORDER BY t_sprei.ID_SPREI DESC limit $posisi,$batas";						
						}
						
					}	
					$res=mysql_query($sql,$link);												
				?>		
				
					
				<table width="576" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top" class="heading2" colspan="2">Search Result</td>
				</tr>
				<tr>	
					<td>
					<?php
					$res=mysql_query($sql,$link);
					$jmldata = mysql_num_rows($res); ?>
					<p align=center>Total available data  : <?php echo $jmldata;?> <br>
					<?php
					$n=mysql_num_rows($res);		
					
					?>
					<table align=center style="font-family:tahoma;	font-size: 9pt;border-width: 1px;border-style: solid;
						border-color: #dd261c;border-collapse: collapse;margin: 12px 0px; ">
					<tr>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">no
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   merk
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   ukuran
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   nama
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   harga
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   keterangan
					</th>
					<th style="color: #FFFFFF;font-size: 8pt;text-transform: uppercase;text-align: center;padding: 0.5em;
					               border-width: 1px;border-style: solid;border-color: #dd261c;background-color: #49191C">
								   kota
					</th>
					
					</tr>
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

						$sqljoin3="select user.kota from user, t_sprei 
									where user.id = t_sprei.ID_USER AND t_sprei.ID_SPREI='$r[ID_SPREI]' ";
						$res_join3=mysql_query($sqljoin3);
						$join3=mysql_fetch_array($res_join3);
				
					?>
					
						<tr style="padding:2 em;">
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $no; ?></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><a href=detail.php?module=details&id=<?php echo $r['ID_SPREI'] ?>>
								<?php echo $join1['NAMA']; ?></a></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $join2['UKURAN']; ?></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $r['NAMA']; ?></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $r['HARGA']; ?></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $r['DESKRIPSI']; ?></td>
						<td style="border-width:1px;border-style: solid; border-color: #dd261c;"><?php echo $join3['kota']; ?></td>						
						</tr>
					<?php 
					$no++;
					} ?>
					</table>
					<?php
				  $jmldata      = mysql_num_rows($res);
				  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
				  $linkHalaman  = $p->navHalaman($_GET['halaman'], $jmlhalaman); ?>
				 <p style="font-family:tahoma; font-size:11; color:#49191C;" align="center"><?php echo $linkHalaman ?></p>								
				</td></tr>															
				</table>
			<?php		
				} 
			?>

		<tr align=center>
			<td colspan=2 class=kembali bgcolor="#FFFFFF"><br> [ <a href="index.php">Back</a> ]</td>
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

 </table>
 <table align="center" width="100%"><tr><td align="center"><table width="100%"><?php footer(); ?></table></td></tr></table>
</body>
</html>
	