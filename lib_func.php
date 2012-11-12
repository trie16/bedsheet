<?php
	function home() {
	$link=koneksi_db();
?>	
<td width="596" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/furniture.jpg" alt="Furniture" width="596" height="233" /></td>
</tr>
<tr>
<td height="10" bgcolor="#ffffff"></td>
</tr>
<tr>
<td bgcolor="#ffffff" valign="top">
	<table width="576" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr><td><img src="images/rc1.gif" alt="Furniture" width="576" height="15" /></td></tr>
		<tr><td bgcolor="#E8E5E1" class="heading">Welcome to our website!</td></tr>
		<tr><td bgcolor="#E8E5E1" id="main">Website ini dibuat untuk membantu para pelanggan sprei khususnya 
										pengguna facebook, untuk mempermudah mendapatkan referensi sprei yang diinginkan. 
										Kami menyediakan feature pencarian lengkap dengan facebook link 
										serta perbandingan harga. 
		</td></tr>
		<tr><td><img src="images/rc2.gif" alt="Furniture" width="576" height="15" /></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><?php
			$sql="select * from t_sprei ORDER BY ID_SPREI DESC LIMIT 0,2";
		//	echo $sql;
			$res=mysql_query($sql,$link);
?>			<table border="0"  cellpadding="0" cellspacing="0">
			<tr><td valign="top" class="heading2">Featured Products</td></tr>
			<tr><td valign="top">
				<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><?php while ($r=mysql_fetch_array($res)) {
					$sql_join3="Select * from user where id=$r[ID_USER]";
					$res_join3=mysql_query($sql_join3, $link);
					$join3=mysql_fetch_array($res_join3);
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
											<tr><td class="add">&raquo; <a href="http://<?php echo $join3['facebook'];?>">
													Add to Cart</a></td></tr>
											<tr><td height="4"></td></tr>
											<tr><td class="details">&raquo; 
												<a href="detail.php?module=details&id=<?php echo $r['ID_SPREI']; ?>">Details</a></td></tr>
										  </table></td></tr>
								</table>
							</td></tr>
						</table>
					</td>
				<?php 	}	//end while ?>
		</tr>
		</table></td></tr>			  
</table></td>
    <tr><td>&nbsp;</td></tr>
	<?php
	} //end function home		
	

	
	function menu () {
	?>	
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  	<td class="toplinks">&nbsp;</td>
			<td class="toplinks"><a href="main.php">Homepage</a></td>
			<td class="sap">|</td>
			<td class="toplinks"><a href="newprod.php?module=baru">New Products</a></td>
			<td class="sap">|</td>
			<td class="toplinks"><a href="produk.php?module=list">List Products</a></td>
			<td class="sap">|</td>
<!--			<td class="toplinks"><a href="#">Services</a></td>
			<td class="sap">|</td> -->
			<td class="toplinks"><a href="#">Contact us</a></td>
			<td class="sap">|</td>
			<td class="toplinks"><a href="/bedsheet/admin">Login</a></td>
		  </tr>
		</table>	
<?php	
	}
	
	function footer () {
	?>		
	<tr>	
		<td height="35" bgcolor="#B16E66">
		<table border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td class="bottomlinks"><a href="main.php">Homepage</a></td>
			<td class="sap2">|</td>
			<td class="bottomlinks"><a href="http://www.templatesperfect.com">About us</a></td>
			<td class="sap2">|</td>
			<td class="bottomlinks"><a href="http://www.templatesperfect.com">Products</a></td>
			<td class="sap2">|</td>
			<td class="bottomlinks"><a href="http://www.templatesperfect.com">Services</a></td>
			<td class="sap2">|</td>
			<td class="bottomlinks"><a href="http://www.templatesperfect.com">Contact</a></td>
		  </tr>
		</table>
		</td>
	</tr>
	<tr>
		<td height="28" align="center">
			<font style="font-size:12px; font-family:'Georgia'; font-style:oblique">Developed by: 
			<a href="http://www.triemulyani.web.id">Trie Mulyani/IF-17K/V/2011</a></font></td>
	</tr>
	  
<?php
	}	
	function left () { 
	include("config/conn.php");
?>		
		<!-- // Form Pencarian -->
		<tr><td height="20" class="cat-head">Searching</td></tr>
		<tr><td class=leftlinks>
<?php
	$fieldcari="";
	if(isset($_POST['fieldcari']))
	   $fieldcari=$_POST['fieldcari'];
?>		
		<form method="POST" action="cari.php?module=search">    
			<select name="fieldcari">
				<option value="merk" <?php if($fieldcari=="merk") echo "selected";?>>Merk</option>
				<option value="ukuran" <?php if($fieldcari=="ukuran") echo "selected";?>>Ukuran</option>
				<option value="harga" <?php if($fieldcari=="harga") echo "selected";?>>Harga</option>
				<option value="lokasi" <?php if($fieldcari=="lokasi") echo "selected";?>>Lokasi</option>
			</select><br /> 
			<input type="text" name="kata" size=10 maxlength="30"
					 value="<?php if(isset($_POST['kata'])) echo $_POST['kata'];?>" />
			<input type="submit" name="tblcari" value="Cari" STYLE="font-size:9pt; background-color:49191C; color:ffffff">		 			
			</form>
		</td>
		</tr>	
		<tr>
			<td class=leftlinks><a href="?module=advcari>">Advance Search</a></td>
		</tr>	
		
		<tr>
		  <td height="20" class="cat-head">Best Price </td>
		</tr>
		<?php
		$link=koneksi_db();
		$sql="SELECT * FROM t_sprei GROUP BY ID_MERK,ID_UKURAN ORDER BY HARGA LIMIT 5";
		$res=mysql_query($sql,$link);
		while ($p= mysql_fetch_array ($res)){ ?>
			<tr>
			<td class=leftlinks><a href="detail.php?module=details&id=<?php echo $p['ID_SPREI']; ?>"> <?php echo
				$p['NAMA'];?></a></div></td></tr> <?php
		}
		?>
		
		<tr><td height="20" class="cat-head">Popular</td></tr>
		<?php
		$populer=mysql_query("SELECT * FROM t_sprei ORDER BY COUNTER DESC LIMIT 5");
		while($p=mysql_fetch_array($populer)){ ?>
			<tr>
			<td class=leftlinks><a href="detail.php?module=details&id=<?php echo $p['ID_SPREI']; ?>"> <?php echo
				$p['NAMA'];?></a></div></td></tr> <?php
		}
	}

?>
