
<?php
include("config/conn.php");

?>

<!-- // Form Pencarian -->
<tr><td height="20" class="cat-head">Searching</td></tr>
<tr><td class=leftlinks>
	<form method=POST action='?module=hasilcari'>    
		<input name=kata type=text size=20>
		<input type=submit value=Search>
	</form></td>
</tr>	
<tr>
	<td class=leftlinks><a href="?module=advcari>">Advance Search</a></td>
</tr>	

<tr>
  <td height="20" class="cat-head">Best Price </td>
</tr>
<?php
$link=koneksi_db();
$sql="SELECT * FROM t_sprei ORDER BY ID_SPREI DESC LIMIT 5";
$res=mysql_query($sql,$link);
while ($p= mysql_fetch_array ($res)){ ?>
	<tr>
	<td class=leftlinks><a href=?module=detailstudy&id=<?php echo $p['ID_SPREI']; ?> > <?php echo
        $p['ID_SPREI'];?></a></div></td></tr> <?php
}
?>

<tr><td height="20" class="cat-head">Popular Brand</td></tr>
<?php
$populer=mysql_query("SELECT * FROM t_sprei ORDER BY counter DESC LIMIT 5");
while($p=mysql_fetch_array($populer)){ ?>
	<tr>
	<td class=leftlinks><a href=?module=detailstudy&id=<?php echo $p['ID_SPREI']; ?> > <?php echo
        $p['ID_SPREI'];?></a></div></td></tr> <?php
}
?>

<tr><td height="20" class="cat-head">In Affiliation With</td></tr>
<tr><td class=leftlinks><a href=""><img src="" /></a></td></tr>
<tr><td class=leftlinks><a href=""><img src="" /></a></td></tr>
<tr><td class=leftlinks><a href=""><img src="" /></a></td></tr>
