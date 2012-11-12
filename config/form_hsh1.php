<script language="JavaScript" type="text/javascript">
<!--
// Last updated 2008-08-13 by TRie Mulyani

function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow - 1;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  cellLeft.setAttribute("align","center");
  var textNode = document.createTextNode(iteration + 1);
  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow['+ iteration +']' ;
  el.id = 'txtRow' + iteration;
  el.size = 14;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);

  // relation cell
  var cellRel = row.insertCell(2);
  var el2 = document.createElement('input');
  cellRel.setAttribute("align","center");
  el2.type = 'text';
  el2.name = 'txtRow1['+ iteration +']';
  el2.id = 'txtRow1' + iteration;
  el2.size= 12;	
  
  el2.onkeypress = keyPressTest;
  cellRel.appendChild(el2);
  
  // select cell
  var cellRightSel = row.insertCell(3);
  var sel = document.createElement('select');
  sel.name = 'selRow['+ iteration +']';
  sel.options[0] = new Option('Male', 'Male');
  sel.options[1] = new Option('Female', 'Female');
  cellRightSel.appendChild(sel);
  
  // date DOB cell
  var celldate = row.insertCell(4);
  var el3 = document.createElement('input');
  el3.type = 'text';
  el3.name = 'txtRow2['+ iteration +']';
  el3.id = 'txtRow2' + iteration;
  el3.size = 1;
  celldate.appendChild(el3); 
  var el6=document.createElement('label');
  el6.innerHTML = '/';
  celldate.appendChild(el6); 	

  var el4 = document.createElement('input');
  el4.type = 'text';
  el4.name = 'txtRow3['+ iteration +']';
  el4.id = 'txtRow3' + iteration;
  el4.size = 1;
  celldate.appendChild(el4); 
  var el7=document.createElement('label');
  el7.innerHTML = '/';
  celldate.appendChild(el7); 	

  var el5 = document.createElement('input');
  el5.type = 'text';
  el5.name = 'txtRow4['+ iteration +']';
  el5.id = 'txtRow4' + iteration;
  el5.size = 2;
  celldate.appendChild(el5); 
  
    // age cell
  var cellage = row.insertCell(5);
  var el6 = document.createElement('input');
  el6.type = 'text';
  el6.name = 'txtRow5['+ iteration +']';
  el6.id = 'txtRow5' + iteration;
  el6.size = 1;
  	
  el6.onkeypress = keyPressTest;
  cellage.appendChild(el6);

  // DOD cell
  var celldeath = row.insertCell(6);
  var el8 = document.createElement('input');
  el8.type = 'text';
  el8.name = 'txtRow6['+ iteration +']';
  el8.id = 'txtRow6' + iteration;
  el8.size = 1;
  celldeath.appendChild(el8); 
  var el9=document.createElement('label');
  el9.innerHTML = '/';
  celldeath.appendChild(el9); 	

  var el10 = document.createElement('input');
  el10.type = 'text';
  el10.name = 'txtRow7['+ iteration +']';
  el10.id = 'txtRow7' + iteration;
  el10.size = 1;
  celldeath.appendChild(el10); 
  var el11=document.createElement('label');
  el11.innerHTML = '/';
  celldeath.appendChild(el11); 	

  var el12 = document.createElement('input');
  el12.type = 'text';
  el12.name = 'txtRow8['+ iteration +']';
  el12.id = 'txtRow8' + iteration;
  el12.size = 2;
  celldeath.appendChild(el12); 




}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}
function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
function openInNewWindow(frm)
{
  // open a blank window
  var aWindow = window.open('', 'TableAddRowNewWindow',
   'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
   
  // set the target to the blank window
  frm.target = 'TableAddRowNewWindow';
  
  // submit
  frm.submit();
}
function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tblSample');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}
//-->
</script>   


<?php
require_once "../config/conn.php";
require_once "../config/library.php";
require_once "../config/fungsi_indotgl.php";
require_once "../config/fungsi_combobox.php";
require_once "../config/class_paging.php";
require_once "../config/function_count_age.php";
//echo $_SESSION[namauser];


//============================================HOUSEHOLD===============================================
//Bagian Household
if ($_GET[module]=='household'){
	echo "<h2>Questionnare for Household - HH</h2>";
	echo "<table border=0><tr><td align=left>";
	echo "<form method=POST action='?act=add_hh'>
          <input type=submit value='Input Household - HH'>
          </form></td>";
	echo "<td align=right><form method=POST action='?module=search'>    
        <input name=kata type=text size=20>
        <input type=submit value=Search>
      </form>
</td></tr></table>";	  
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM `t_household`"));
    echo "<p align=center>Total available data : $jmldata <br>"; 	  			  		  
	$valid     = mysql_num_rows(mysql_query("SELECT * FROM `t_household` WHERE `valid`='Yes'"));
    echo "Valid data : $valid <br>"; 	  			  		  	
	$novalid     = mysql_num_rows(mysql_query("SELECT * FROM `t_household` WHERE `valid`='' or `valid`='No'"));
    echo "Not Valid data : $novalid </p>"; 	  			  		  	
	
echo"<table>
          <tr><th>no</th><th>id household</th><th>date of survey</th>
          <th>responden name</th><th>alamat</th><th>kader</th><th>entry</th><th>valid</th><th>action</th></tr>";
 
  $p      = new Paging;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
		  
  $tampil=mysql_query("SELECT * FROM t_household ORDER BY id_household DESC limit $posisi,$batas");
//  $desa=mysql_fetch_array($address);

  $no     = $posisi+1;
  while ($r=mysql_fetch_array($tampil)){
     $sql_address="SELECT t_village.nma_desa FROM `t_village`,`t_address` WHERE
	 						t_village.kode_desa=t_address.kode_desa
						 	AND t_village.id_district=t_address.id_district 
						 	AND t_address.vno_id=$r[kode_house]";
	 $address=mysql_query($sql_address);
//	 echo $sql_address;						
	 $a=mysql_fetch_array($address);
     echo "<tr><td>$no</td>
          <td><a href=?act=detailhh&id=$r[kode_house]>$r[kode_house]</a></td>
          <td>$r[tgl_survey]</td>
		  <td>$r[nma_responde]</td>
		  <td>$a[nma_desa]</td>
		  <td>$r[kader]</td>
		  <td>$r[entry]</td> ";
		  if ($r[valid] == 'Yes') {
		  	echo "<td><img src='images/checkbox.jpg'></td>";
		  }
		  else {
		  	echo "<td>&nbsp;</td>";		  
		  }
echo" </td>		  		  		  		  		  		  		  
          <td><a href=?act=edithh&id=$r[kode_house]>Edit</a> |";?> 
	          <a href=exe_hsh1.php?module=household&act=hapus&id=<? echo $r[kode_house] ?>
			  onClick="return confirm('Are you sure want to delete household data with ID <? echo $r[kode_house] ?>?')">
			  Delete</a>
<? echo " </td></tr>";
     $no++;
  }
  echo "</table>";
  $jmldata      = mysql_num_rows(mysql_query("SELECT * FROM `t_household`"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "<p>$linkHalaman</p>";

}

 // ====================================================Bagian Hasil Pencarian Household======================================
elseif ($_GET[module]=='search'){
   echo "<tr><td><p>Search Result</p></td></tr>";

// Hanya mencari berita, apabila diperlukan bisa ditambahkan utk mencari agenda, pengumuman, dll
	$p      = new Paging;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);

	$date=$_POST[kata];
  	$sql_cari = "SELECT * FROM `t_household` WHERE `kode_house` LIKE '%$_POST[kata]%' OR `nma_responde` LIKE '%$_POST[kata]%'
										 OR `kader` LIKE '%$_POST[kata]%' OR `posting_date` = '$date' ORDER BY id_household DESC";
	$cari   = mysql_query($sql_cari) or die(mysql_error());
//	echo $sql_cari;
	$jumlah = mysql_num_rows($cari);
//	echo $jumlah;
 if ($jumlah > 0){
	  $no     = $posisi+1;
	echo "	<table><tr><th>no</th><th>id household</th><th>date of survey</th>
          <th>responden name</th><th>alamat</th><th>kader</th><th>entry</th><th>valid</th><th>action</th></tr>";
    while ($c=mysql_fetch_array($cari)){
     $sql_almt="SELECT t_village.nma_desa FROM `t_village`,`t_address` WHERE
	 						t_village.kode_desa=t_address.kode_desa
						 	AND t_village.id_district=t_address.id_district 
						 	AND t_address.vno_id=$c[kode_house]";
	 $almt=mysql_query($sql_almt);
//	 echo $sql_address;						
	 $d=mysql_fetch_array($almt);
     echo "
	 	  <tr><td>$no</td>
          <td><a href=?act=detailhh&id=$c[kode_house]>$c[kode_house]</a></td>
          <td>$c[tgl_survey]</td>
		  <td>$c[nma_responde]</td>
		  <td>$d[nma_desa]</td>
		  <td>$c[kader]</td>
  		  <td>$c[entry]</td>";
		  if ($c[valid] == 'Yes') {
		  	echo "<td align=center><img src='images/checkbox.jpg'></td>";
		  }
		  else {
		  	echo "<td>&nbsp;</td>";		  
		  }
	echo" <td><a href=?act=edithh&id=$c[kode_house]>Edit</a> |";?> 
	          <a href=exe_hsh1.php?module=household&act=hapus&id=<? echo $c[kode_house] ?>
			  onClick="return confirm('Are you sure want to delete household data with ID <? echo $c[kode_house] ?>?')">
			  Delete</a>
	<? echo " </td></tr>";
     $no++;
  }
  echo "</table>";
  /*
  $jmldata         = mysql_num_rows(mysql_query("SELECT * FROM `t_household` WHERE `kode_house` LIKE '%$_POST[kata]%' OR `nma_responde` LIKE '%$_POST[kata]%'
										 OR `kader` LIKE '%$_POST[kata]%' OR `posting_date` = '$date' ORDER BY id_household"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET[halaman], $jmlhalaman);  
  echo "<p>$linkHalaman</p>"; */
 }    

  else{
    echo "<tr><td class=judul>
          Cannot found news with <b>$_POST[kata]</b> keyword</td></tr>";
  }
	echo "<tr><td><br>
        [ <a href=javascript:history.go(-1)>Back</a> ]</td></tr>";	 		  
}

// Detail Household
elseif ($_GET[act]=='detailhh'){

$sql_household="SELECT * FROM `t_household` WHERE kode_house='$_GET[id]'";
$household=mysql_query($sql_household);
$h=mysql_fetch_array($household);
$sqledit_hh="SELECT `kode_house`,`tgl_survey` from `t_household` where kode_house=$_GET[id]";
$edit_hh=mysql_query($sqledit_hh);
$e=mysql_fetch_array($edit_hh);
$kode = $_GET[id];
//echo $sql_kode;
$rw1 = substr($kode, 3, 1);
$rw2 = substr($kode, 4, 1);
$rt1 = substr($kode, 5, 1);
$rt2 = substr($kode, 6, 1);
$vil = substr($kode, 1, 2);
$dis = substr($kode, 0, 1);
//echo $kode;
echo "<h2>Household-HH Detail Preview Form</h2>";
echo "<table>
	  <tr><td colspan=3 align=right><b>Kader : </b>$h[kader]</td>
	  </tr>
	  <tr>
		 <td colspan=2><b>Identification No.</b></td>
		 <td>$h[kode_house]</td>";
$sql_tgl="SELECT DAY(tgl_survey) as tanggal, MONTH(tgl_survey) as bulan, YEAR(tgl_survey) as tahun FROM `t_household` WHERE kode_house=$_GET[id]";
		$tgl=mysql_query($sql_tgl);
		$t=mysql_fetch_array($tgl);
		$hr =  $t['tanggal'];
		$bln = $t['bulan'];
		$thn = $t['tahun'];
$sql_tgl_edit="SELECT DAY(edit_date) as tanggal, MONTH(edit_date) as bulan, YEAR(edit_date) as tahun FROM `t_household` WHERE kode_house=$_GET[id]";
		$tgl_edit=mysql_query($sql_tgl_edit);
		$t2=mysql_fetch_array($tgl_edit);
		$hr2 =  $t2['tanggal'];
		$bln2 = $t2['bulan'];
		$thn2 = $t2['tahun'];
		
$sql_tgl_post="SELECT DAY(posting_date) as tanggal, MONTH(posting_date) as bulan, YEAR(posting_date) as tahun FROM `t_household` WHERE kode_house=$_GET[id]";
		$tgl_post=mysql_query($sql_tgl_post);
		$t3=mysql_fetch_array($tgl_post);
		$hr3 =  $t3['tanggal'];
		$bln3 = $t3['bulan'];
		$thn3 = $t3['tahun'];

echo   "</tr>
	    <tr>
  	  	 <td colspan=2><b>Date of Survey</b></td>
			<td>  $hr/$bln/$thn (dd/mm/yyyy)</td>
	   </tr>
	    <tr>
  	  	 <td colspan=2>Posting Date</b></td>
			<td>  $hr3/$bln3/$thn3 (dd/mm/yyyy)</td>
	   </tr>
	    <tr>
  	  	 <td colspan=2>Edit Date</td>
			<td>  $hr2/$bln2/$thn2 (dd/mm/yyyy)</td>
	   </tr>	   
       <tr>
	  	<td colspan=3><b>I. Description of Household</td>
	   </tr>
	   <tr>
	  	<td size=10>1.1</td>
	    <td>Name of Respondent</td><td>$h[nma_responde] </td>
	  </tr>
	  <tr>
	  	<td size=10>1.2</td>	  
	    <td>Relationship with the family</td>
		<td>$h[hub_keluarga]</td>
	  </tr>
	  <tr>
	  	<td size=10>1.3</td>	  	  
	  	<td>Occupation of the Head Household</td>
		<td>$h[kerja_household]</td>
		</td>
	  </tr>
	  <tr>
	  	<td size=10>1.4</td>	  
	  	<td>Last education of the Head Household</td>
	       <td> $h[pend_household] &nbsp;Grade : $h[pendtingkathh]</td>   
	   </tr>
	   <tr>
  	    <td size=10>1.5</td>	
	   	<td colspan=2>Family Members Including death history</td>
 	   </tr>
       <tr>
	   	<td colspan=3> ";
echo " <table id=tblSample align=center>
		<tr>
			<th>No</th><th>Name</th><th>Relation</th><th>Sex</th>
			<th>Date of Birth<br>(dd/mm/yyyy)</th><th>Age</th><th>Date of Death</th>	 
		</tr>";
		$sql_anggota="SELECT * FROM `t_angrumah` WHERE `id_household`='$_GET[id]' AND `nma_anggota` !='' ORDER BY id_anggota ASC";
//		echo $sql_anggota;	 					 				
		$no=1;
		$anggota=mysql_query($sql_anggota);
		while ($a_rmh=mysql_fetch_array($anggota)) 
		  {		  	
			$sql_tgl="SELECT DAY(tgl_lhr_ang) as tanggal, MONTH(tgl_lhr_ang) as bulan,
				      YEAR(tgl_lhr_ang) as tahun, DAY(tglmeninggal) as tanggal2, MONTH(tglmeninggal) as bulan2,
				      YEAR(tglmeninggal) as tahun2 FROM `t_angrumah` WHERE id_household=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$tgl=mysql_query($sql_tgl);
			while ($t=mysql_fetch_array($tgl))
				{
				$hr =  $t['tanggal'];
				$bln = $t['bulan'];
				$thn = $t['tahun'];
				$hr2 =  $t['tanggal2'];
				$bln2 = $t['bulan2'];
				$thn2= $t['tahun2'];
			$sql_sex="SELECT * FROM `t_angrumah` where `id_household`=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$q_sex=mysql_query($sql_sex);
			while ($sex=mysql_fetch_array($q_sex)) {
echo   "<tr>
			<td align=center>$no</td>
	        <td align=center>$a_rmh[nma_anggota]</td>
    	    <td align=center>$a_rmh[hub_anggota]</td>";
echo	 " <td align=center>$sex[jns_klmn_ang]</td>";
echo " <td align=center>$hr/$bln/$thn</td>
		   <td align=center>$a_rmh[usia_anggota]</td>		
		  <td align=center>$hr2/$bln2/$thn2</td></tr>";	
			}
			}
		$no++;	
		}
echo   "</table></td></tr>
	   <tr>
  	    <td rowspan=2 size=10>1.6</td>	
	   	<td colspan=2>Number of animal</td>
 	   </tr>
	   <tr><td colspan=2>	
		<table><tr>
			<th>Species</th><th>Hobby</th><th>Family Food</th><th>Celebration</th><th>Business</th>
		</tr>	
		<tr>";
		$anim_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$a_nc=mysql_query($anim_nc);
		$nc=mysql_fetch_array($a_nc); 			  			  			  			  			  		
echo"		<td>Native Chicken</td>
			<td>$nc[uhoby]</td>
			<td>$nc[umakanan]</td>
			<td>$nc[uperayaan]</td>
			<td>$nc[ubisnis]</td>						
		</tr>
		
		<tr>";
		$anim_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$a_bc=mysql_query($anim_bc);
		$bc=mysql_fetch_array($a_bc); 			  			  			  			  			  		
echo"	<td>Bantam Chicken</td>
			<td>$bc[uhoby]</td>
			<td>$bc[umakanan]</td>
			<td>$bc[uperayaan]</td>
			<td>$bc[ubisnis]</td>						
		</tr>
		
		<tr>";
		$anim_pl="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$a_pl=mysql_query($anim_pl);
		$pl=mysql_fetch_array($a_pl); 			  			  			  			  			  		
echo"	<td>Pelung Chicken</td>
			<td>$pl[uhoby]</td>
			<td>$pl[umakanan]</td>
			<td>$pl[uperayaan]</td>
			<td>$pl[ubisnis]</td>						
		</tr>
		
		<tr>";
		$anim_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$a_bk=mysql_query($anim_bk);
		$bk=mysql_fetch_array($a_bk); 			  			  			  			  			  		
echo"	<td>Bangkok Chicken</td>
			<td>$bk[uhoby]</td>
			<td>$bk[umakanan]</td>
			<td>$bk[uperayaan]</td>
			<td>$bk[ubisnis]</td>						
		</tr>";
		
		$anim_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$a_lb=mysql_query($anim_lb);
		$lb=mysql_fetch_array($a_lb); 			  			  			  			  			  		
echo"	<tr>
			<td>Layer/Broiler</td>
			<td>$lb[uhoby]</td>
			<td>$lb[umakanan]</td>
			<td>$lb[uperayaan]</td>
			<td>$lb[ubisnis]</td>								
		</tr>";

		$anim_it="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$a_it=mysql_query($anim_it);
		$it=mysql_fetch_array($a_it); 			  			  			  			  			  			
echo"	<tr>
			<td>Itik/Meri</td>
			<td>$it[uhoby]</td>
			<td>$it[umakanan]</td>
			<td>$it[uperayaan]</td>
			<td>$it[ubisnis]</td>								
		</tr>";
		
		$anim_et="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$a_et=mysql_query($anim_et);
		$et=mysql_fetch_array($a_et); 			  			  			  			  			  					
echo	"<tr>
			<td>Entog/Bebek</td>
			<td>$et[uhoby]</td>
			<td>$et[umakanan]</td>
			<td>$et[uperayaan]</td>
			<td>$et[ubisnis]</td>									
		</tr>";

		$anim_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$a_gs=mysql_query($anim_gs);
		$gs=mysql_fetch_array($a_gs); 			  			  			  			  			  					
echo	"<tr>
			<td>Goose</td>
			<td>$gs[uhoby]</td>
			<td>$gs[umakanan]</td>
			<td>$gs[uperayaan]</td>
			<td>$gs[ubisnis]</td>									
		</tr>";
		
		$anim_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$a_pg=mysql_query($anim_pg);
		$pg=mysql_fetch_array($a_pg); 			  			  			  			  			  						
echo	"<tr>
			<td>Pigeon</td>
			<td>$pg[uhoby]</td>
			<td>$pg[umakanan]</td>
			<td>$pg[uperayaan]</td>
			<td>$pg[ubisnis]</td>						
	   </tr>";
		$anim_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$a_fb=mysql_query($anim_fb);
		$fb=mysql_fetch_array($a_fb); 			  			  			  			  			  						
echo	"<tr>
			<td>Fancy Bird</td>
			<td>$fb[uhoby]</td>
			<td>$fb[umakanan]</td>
			<td>$fb[uperayaan]</td>
			<td>$fb[ubisnis]</td>						
	   </tr>";

		$anim_non="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
																  AND `nma_animal`!='Pigeon' 
																  AND `nma_animal`!='Goose'
																  AND `nma_animal`!='Entog/Bebek'
																  AND `nma_animal`!='Itik/Meri'
																  AND `nma_animal`!='Layer/Broiler'
																  AND `nma_animal`!='Bangkok Chicken'
																  AND `nma_animal`!='Pelung Chicken'
																  AND `nma_animal`!='Bantam Chicken'
																  AND `nma_animal`!='Native Chicken'
																  AND `vno_id`=$_GET[id]";

		$a_non=mysql_query($anim_non);
		$n=mysql_num_rows($a_non);
		for ($n = 1; $n <= 5; $n++) {
		   $tmp_id="id".$n;
		   $tmp_nama="non".$n."name";
		   $tmp_hobby="no".$n."hobby";
		   $tmp_food="no".$n."food";
		   $tmp_celeb="no".$n."celeb"; 
		   $tmp_bus="no".$n."bus"; 									
   			if ($non=mysql_fetch_array($a_non) ) {
  echo "<tr>
			<td>$non[nma_animal]</td>
			<td>$non[uhoby]</td>
			<td>$non[umakanan]</td>
			<td>$non[uperayaan]</td>
			<td>$non[ubisnis]</td> 
		   </tr> "; 
		   }
		  }
echo "</table></td></tr>";	  
/*$test="_"; 
$temp=""; 
$temp="shy".$test."ani";
echo $temp;*/
echo
	   "<tr>
  	    <td rowspan=2 size=10>1.7</td>	
		<td colspan=2>What is the number of poultry bought from :</td>
	   </tr>
	   <tr><td colspan=2>		 
           <table>
           <tr>
            <th>Animal</th>
            <th>From</th>
            <th>Location</th>
            <th>Detail</th>
            <th>Qty</th>
          </tr>";
		$buy_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$b_nc=mysql_query($buy_nc);
		$nc=mysql_fetch_array($b_nc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Native Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td>$nc[sma_desarw]</td>
			<td>$nc[sma_desa]</td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td>$nc[bda_desadesa]</td>
			<td>$nc[bda_desa]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td>$nc[bda_keckec]</td>
			<td>$nc[bda_kec]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td>$nc[other2]</td>
			<td>$nc[other1]</td>			
			</tr>";
		$buy_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$b_bc=mysql_query($buy_bc);
		$bc=mysql_fetch_array($b_bc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bantam Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td>$bc[sma_desarw]</td>
			<td>$bc[sma_desa]</td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td>$bc[bda_desadesa]</td>
			<td>$bc[bda_desa]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td>$bc[bda_keckec]</td>
			<td>$bc[bda_kec]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td>$bc[other2]</td>
			<td>$bc[other1]</td>			
			</tr>";
		$buy_pc="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$b_pc=mysql_query($buy_pc);
		$pc=mysql_fetch_array($b_pc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Pelung Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td>$pc[sma_desarw]</td>
			<td>$pc[sma_desa]</td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td>$pc[bda_desadesa]</td>
			<td>$pc[bda_desa]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td>$pc[bda_keckec]</td>
			<td>$pc[bda_kec]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td>$pc[other2]</td>
			<td>$pc[other1]</td>			
			</tr>";
		$buy_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$b_bk=mysql_query($buy_bk);
		$bk=mysql_fetch_array($b_bk); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bangkok Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td>$bk[sma_desarw]</td>
			<td>$bk[sma_desa]</td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td>$bk[bda_desadesa]</td>
			<td>$bk[bda_desa]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td>$bk[bda_keckec]</td>
			<td>$bk[bda_kec]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td>$bk[other2]</td>
			<td>$bk[other1]</td>			
			</tr>";				
		$buy_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$b_lb=mysql_query($buy_lb);
		$lb=mysql_fetch_array($b_lb); 			  			  			  			  			  							  			
echo"  <tr>
            <td rowspan=4>Layer/Broiler</td>
            <td><input type=text name=sma_desa_layer value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_layer value=RW disabled></td>
			<td>$lb[sma_desarw]</td>
			<td>$lb[sma_desa]</td>			
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_layer size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_layer value=Desa disabled></td>
			<td>$lb[bda_desadesa]</td>
			<td>$lb[bda_desa]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_layer size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_layer value=Kecamatan disabled></td>
			<td>$lb[bda_keckec]</td>
			<td>$lb[bda_kec]</td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_layer size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_layer value=Kabupaten disabled></td>
			<td>$lb[other2]</td>
			<td>$lb[other1]</td>			
			</tr>";
		$buy_im="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$b_im=mysql_query($buy_im);
		$im=mysql_fetch_array($b_im); 			  			  			  			  			  							  			
echo "			
          <tr>
            <td rowspan=4>Itik/Meri</td>
            <td><input type=text name=sma_desa_itik value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_itik value=RW disabled></td>
			<td>$im[sma_desarw]</td>
			<td>$im[sma_desa]</td>		
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_itik size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_itik value=Desa disabled></td>
			<td>$im[bda_desadesa]</td>
			<td>$im[bda_desa]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_itik size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_itik value=Kecamatan disabled></td>
			<td>$im[bda_keckec]</td>
			<td>$im[bda_kec]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_itik size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_itik value=Kabupaten disabled></td>
			<td>$im[other2]</td>
			<td>$im[other1]</td>					
			</tr>
          <tr>";
		$buy_eb="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$b_eb=mysql_query($buy_eb);
		$eb=mysql_fetch_array($b_eb); 			  			  			  			  			  							  					  
echo       "<td rowspan=4>Entog/Bebek</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td>$eb[sma_desarw]</td>
			<td>$eb[sma_desa]</td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td>$eb[bda_desadesa]</td>
			<td>$eb[bda_desa]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td>$eb[bda_keckec]</td>
			<td>$eb[bda_kec]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td>$eb[other2]</td>
			<td>$eb[other1]</td>					
		  </tr>";
		  
		$buy_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$b_gs=mysql_query($buy_gs);
		$gs=mysql_fetch_array($b_gs); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Goose</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td>$gs[sma_desarw]</td>
			<td>$gs[sma_desa]</td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td>$gs[bda_desadesa]</td>
			<td>$gs[bda_desa]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td>$gs[bda_keckec]</td>
			<td>$gs[bda_kec]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td>$gs[other2]</td>
			<td>$gs[other1]</td>					
		  </tr>";
		  
		$buy_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$b_pg=mysql_query($buy_pg);
		$pg=mysql_fetch_array($b_pg); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Pigeon</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td>$pg[sma_desarw]</td>
			<td>$pg[sma_desa]</td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td>$pg[bda_desadesa]</td>
			<td>$pg[bda_desa]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td>$pg[bda_keckec]</td>
			<td>$pg[bda_kec]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td>$pg[other2]</td>
			<td>$pg[other1]</td>					
		  </tr>";
		$buy_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$b_fb=mysql_query($buy_fb);
		$fb=mysql_fetch_array($b_fb); 			  			  			  			  			  							  					  
echo       "<tr>
			<td rowspan=4>Fancy Bird</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td>$fb[sma_desarw]</td>
			<td>$fb[sma_desa]</td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td>$fb[bda_desadesa]</td>
			<td>$fb[bda_desa]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td>$fb[bda_keckec]</td>
			<td>$fb[bda_kec]</td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td>$fb[other2]</td>
			<td>$fb[other1]</td>					
		  </tr>";
		  
		$anim_non2="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
											 AND `nma_animal`!='Pigeon' 
											 AND `nma_animal`!='Goose'
											 AND `nma_animal`!='Entog/Bebek'
											 AND `nma_animal`!='Itik/Meri'
											 AND `nma_animal`!='Layer/Broiler'
											 AND `nma_animal`!='Bangkok Chicken'
											 AND `nma_animal`!='Pelung Chicken'
											 AND `nma_animal`!='Bantam Chicken'
											 AND `nma_animal`!='Native Chicken'
											 AND `vno_id`=$_GET[id]";
											 
		$a_non2=mysql_query($anim_non2);
		$o=mysql_num_rows($a_non2);
		for ($o = 1; $o <= 5; $o++) {
			$tmp_id="idasal".$o;
			$tmp_nama="nama_bntg".$o;
			$tmp_rw="rw".$o;
			$jml_rw="jml_rw".$o;
			$tmp_desa="desa".$o;
			$jml_desa="jml_desa".$o;				
		 	$tmp_kec="kec".$o;						
			$jml_kec="jml_kec".$o;
			$tmp_kab="kab".$o;
			$jml_kab="jml_kab".$o;		
					
   			if ($non2=mysql_fetch_array($a_non2) ) {

	echo       "<tr>
				<td rowspan=4>$non2[nma_animal]'</td>
				<td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
				<td><input type=text size=4 name=rw_entog value=RW disabled></td>
				<td>$non2[sma_desarw]</td>
				<td>$non2[sma_desa]</td>					
			  </tr>
				<tr>
				<td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
				</td>
				<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
				<td>$non2[bda_desadesa]</td>
				<td>$non2[bda_desa]</td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
				<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
				<td>$non2[bda_keckec]</td>
				<td>$non2[bda_kec]</td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
				<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
				<td>$non2[other2]</td>
				<td>$non2[other1]</td>					
			  </tr>";
			}
      }
		  
echo"	</table></td></tr>";
echo" <tr>
  	    <td rowspan=2 size=10>1.8</td>	
	   	<td colspan=2>Number of died animal</td>
 	   </tr>
	   <tr><td colspan=2>	
	   		<table>
			  <tr>
				<th><b>Number of animals</b></th>
				<th align=center><b>Present</b></th>
				<th align=center><b>Sick last year</b></th>
				<th align=center><b>Died last year</b></th>
			  </tr>
			  <tr>";
		$select_ayam="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Native Chicken' AND `vno_id`=$_GET[id]";
		$ayam=mysql_query($select_ayam);
		$a=mysql_fetch_array($ayam);
echo		" 	<td>a. Native Chicken</td>
				<td align=center>$a[qty_arround]</td>
				<td align=center>$a[skit_th_lalu]</td>
				<td align=center>$a[mati_th_lalu]</td>
			  </tr>";		  
		$select_btm="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$c_btm=mysql_query($select_btm);
		$btm=mysql_fetch_array($c_btm);
echo		" 	<td>b. Bantam Chicken</td>
				<td align=center>$btm[qty_arround]</td>
				<td align=center>$btm[skit_th_lalu]</td>
				<td align=center>$btm[mati_th_lalu]</td>
			  </tr>";
		$select_plg="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$c_plg=mysql_query($select_plg);
		$plg=mysql_fetch_array($c_plg);
echo		" 	<td>c. Pelung Chicken</td>
				<td align=center>$plg[qty_arround]</td>
				<td align=center>$plg[skit_th_lalu]</td>
				<td align=center>$plg[mati_th_lalu]</td>
			  </tr>";
		$select_bkk="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$c_bkk=mysql_query($select_bkk);
		$bkk=mysql_fetch_array($c_bkk);
echo		" 	<td>d. Bangkok Chicken</td>
				<td align=center>$bkk[qty_arround]</td>
				<td align=center>$bkk[skit_th_lalu]</td>
				<td align=center>$bkk[mati_th_lalu]</td>
			  </tr>";
			  
		$select_bro="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$bro=mysql_query($select_bro);
		$b=mysql_fetch_array($bro);  
echo		 "<tr>
			  	<td>e. Layer/Broiler</td>
				<td align=center>$b[qty_arround]</td>
				<td align=center>$b[skit_th_lalu]</td>
				<td align=center>$b[mati_th_lalu]</td>
			  </tr>";
		$select_itik="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Itik' AND `vno_id`=$_GET[id]";
		$itik=mysql_query($select_itik);
		$i=mysql_fetch_array($itik);
echo		 "<tr>
			  	<td>f. Itik</td>
				<td align=center>$i[qty_arround]</td>
				<td align=center>$i[skit_th_lalu]</td>
				<td align=center>$i[mati_th_lalu]</td>
			  </tr>";
		$select_entog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Entog' AND `vno_id`=$_GET[id]";
		$entog=mysql_query($select_entog);
		$e=mysql_fetch_array($entog);			  
echo		 "<tr>
			  	<td>g. Entog</td>
				<td align=center>$e[qty_arround]</td>
				<td align=center>$e[skit_th_lalu]</td>
				<td align=center>$e[mati_th_lalu]</td>
			  </tr>	";
		$select_goose="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Goose' AND `vno_id`=$_GET[id]";
		$goose=mysql_query($select_goose);
		$g=mysql_fetch_array($goose); 			  			  
echo		" <tr>
			  	<td>h. Goose</td>
				<td align=center>$g[qty_arround]</td>
				<td align=center>$g[skit_th_lalu]</td>
				<td align=center>$g[mati_th_lalu]</td>
			  </tr>";			  
		$select_pigeon="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pigeon' AND `vno_id`=$_GET[id]";
		$pigeon=mysql_query($select_pigeon);
		$p=mysql_fetch_array($pigeon); 			  			  			  			  			  
echo		 "<tr>
			  	<td>i. Pigeon</td>
				<td align=center>$p[qty_arround]</td>
				<td align=center>$p[skit_th_lalu]</td>
				<td align=center>$p[mati_th_lalu]</td>
			  </tr>";		  
		$select_bird="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$bird=mysql_query($select_bird);
		$bd=mysql_fetch_array($bird); 			  
echo		  "<tr>
			  	<td>j. Fancy Bird</td>
				<td align=center>$bd[qty_arround]</td>
				<td align=center>$bd[skit_th_lalu]</td>
				<td align=center>$bd[mati_th_lalu]</td>
			  </tr>";
		$select_cat="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Cat' AND `vno_id`=$_GET[id]";
		$cat=mysql_query($select_cat);
		$c=mysql_fetch_array($cat); 			  			  			  
echo		 "<tr>
			  	<td>k. Cat</td>
				<td align=center>$c[qty_arround]</td>
				<td align=center>$c[skit_th_lalu]</td>
				<td align=center>$c[mati_th_lalu]</td>
			  </tr>";
		$select_dog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Dog' AND `vno_id`=$_GET[id]";
		$dog=mysql_query($select_dog);
		$d=mysql_fetch_array($dog); 			  			  			  			  
echo		 "<tr>
			  	<td>l. Dog</td>
				<td align=center>$d[qty_arround]</td>
				<td align=center>$d[skit_th_lalu]</td>
				<td align=center>$d[mati_th_lalu]</td>
			  </tr>";
			  
		$arr_non="SELECT * FROM `t_animal_arround` WHERE `nma_arround`!='Fancy Bird' 
																  AND `nma_arround`!='Pigeon' 
																  AND `nma_arround`!='Goose'
																  AND `nma_arround`!='Entog'
																  AND `nma_arround`!='Itik'
																  AND `nma_arround`!='Layer/Broiler'
																  AND `nma_arround`!='Bangkok Chicken'
																  AND `nma_arround`!='Pelung Chicken'
																  AND `nma_arround`!='Bantam Chicken'
																  AND `nma_arround`!='Native Chicken'
																  AND `nma_arround`!='Cat'
																  AND `nma_arround`!='Dog'																  
																  AND `vno_id`=$_GET[id]";

		$ar_non=mysql_query($arr_non);
		$r=mysql_num_rows($ar_non);
		for ($r=1 ; $r<=5;$r++) {
			$tmp_nama="nma_arr".$r;
			$tmp_idr="idr".$r;
			$tmp_qty="qty".$r;
			$tmp_skt="skt".$r;
			$tmp_mati="mati".$r;				
			if ($rnon=mysql_fetch_array($ar_non) ) {
echo		 "<tr>
			  	<td>$rnon[nma_arround]<input type=hidden name=$tmp_idr value=$rnon[id_anarr]></td>
				<td align=center>$rnon[qty_arround]</td>
				<td align=center>$rnon[skit_th_lalu]</td>
				<td align=center>$rnon[mati_th_lalu]</td>
			  </tr>";
			}
		}
echo"</table>

	   </td></tr>";
		$sqlradio_unggas="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]";
		$radio_unggas=mysql_query($sqlradio_unggas);
		$ru=mysql_fetch_array($radio_unggas);
// echo $ru[unggas_skt_mati];
echo"  <tr>
  	    <td size=10>1.9</td>	  
	   	<td>Were there any sick or died poultry<br>in your RT in last year ?</td>
	   	<td>$h[unggas_skt_mati]</td>
	   </tr>";
	  $sql_vac="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $vac=mysql_query($sql_vac);
	  $vc=mysql_fetch_array($vac);
echo	"<tr>
		<td size=2>1.10</td>
		<td colspan=2>What number of chicken have received vaccination?</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>
		<td>No Vaccination</td>
		<td>$vc[vaksinasi1]</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>1 dose of vaccine</td>
		<td>$vc[vaksinasi2]</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>2 or more dose of vaccine</td>
		<td>$vc[vaksinasi3]</td>
	   </tr>";
	
	  $sql_geo="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $s_geo=mysql_query($sql_geo);
	  $geo=mysql_fetch_array($s_geo);
echo	"<tr>
		<td size=2>1.11</td>
		<td>Geocoding</td>
		<td>$geo[geocoding]</td>
 	</tr>	";
	
	  $sql_pola1="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $s_pola1=mysql_query($sql_pola1);
	  $pola1=mysql_fetch_array($s_pola1);
echo "	
    <tr>
      <td size=2>1.12</td>
      <td colspan=2><strong>Pola pencarian pertolongan pada <u>Balita (0-5 tahun)</u> </strong></td>
    </tr>
    <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <b>$pola1[pola11]</b>&nbsp; II <b>$pola1[pola12]</b>&nbsp;III <b>$pola1[pola13]</b>&nbsp;IV <b>$pola1[pola14]</b>&nbsp;V <b>$pola1[pola15]</b></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.13</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Anak (5&gt; - 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <b>$pola1[pola21]</b>&nbsp; II <b>$pola1[pola22]</b>&nbsp;III <b>$pola1[pola23]</b>&nbsp;IV <b>$pola1[pola24]</b>&nbsp;V <b>$pola1[pola25]</b></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.14</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Dewasa (&gt; 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
<td colspan=3 align=center> I <b>$pola1[pola31]</b>&nbsp; II <b>$pola1[pola32]</b>&nbsp;III <b>$pola1[pola33]</b>&nbsp;IV <b>$pola1[pola34]</b>&nbsp;V <b>$pola1[pola35]</b></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>";
	if ($h[ditemukan]=='1')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> : <b>Ya </b></td>
		   </tr>";
   }
	if ($h[ditemukan]=='0')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> : <b>Tidak &nbsp; </b> </td>
		   </tr>";
   }
   	if ($h[ditemukan]=='')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> :  </td>
		   </tr>";
   }


  if ($h[pindah]=='1')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : <b>Ya</b> </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : $h[pindah_ya]</td>
	   </tr>";	   
   }
  if ($h[pindah]=='0')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : <b>Tidak </b> </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : &nbsp;</td>
	   </tr>";	
   }
     if ($h[pindah]=='')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : &nbsp; </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : &nbsp;</td>
	   </tr>";	
   }
   
  if ($h[huni_ada]=='1')  { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : <b> Ya </b></td>
	   </tr>";
	}
  if ($h[huni_ada]=='0')  { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : <b>Tidak &nbsp; </b> </td>
	   </tr>";
	}
  if ($h[huni_ada]=='' ) { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : &nbsp; </td>
	   </tr>";
	}

  if ($h[tolak_wwcr]=='1')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <b> Ya </b></td>
   </tr>";
	}
  if ($h[tolak_wwcr]=='0')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <b>Tidak </b> </td>
   </tr>";
	}
  if ($h[tolak_wwcr]=='')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : &nbsp; </td>
   </tr>";
	}	
 	echo"
 	
	<tr><td colspan=3 align=center>
	       <input type=button value=Back onclick=self.history.back()>
		</td>
	</tr>				
	</table></form>";	
}

//Bagian INPUT Form Household
elseif ($_GET[act]=='add_hh'){
//$sql_animal=mysql_query("Select * from `t_reff_animal`");
//$a=mysql_fetch_array($sql_animal);
//echo $user;
echo "<h2>Questionnare for Household - HH</h2>";
echo "<p>First step to input Household questionnare is enter ID Household below : </p>";
echo "<form method=POST action='?act=confirm_input'>
	  <table>
	  <tr>
	     <td colspan=2><b>Identification No.</b></td>
	     <td><select name=district>";
		 	 $sql_district= "Select * from `t_subdistrict` order by `id_subdistrict`";
			 $district=mysql_query($sql_district);
		 	 while ($d=mysql_fetch_array($district)) {
		    	 echo "<option value=$d[id_subdistrict]>$d[id_subdistrict]</option>";
			}	 
echo		"</select>";
			 echo "<select name=village>";
			 $sql_village=mysql_query("Select * from `t_village` order by `id_village` limit 0,6");
			 while ($village=mysql_fetch_array($sql_village)) {
			 echo "<option value=$village[id_village]>0$village[kode_desa]</option>";
			 }
echo		 "</select>
	           <input type=text name=id_rw1 size=1 maxlength=1>
			   <input type=text name=id_rw2 size=1 maxlength=1> -
			   <input type=text name=id_rt1 size=1 maxlength=1>
			   <input type=text name=id_rt2 size=1 maxlength=1> -
   			   <input type=text name=id_hh1 size=1 maxlength=1>
			   <input type=text name=id_hh2 size=1 maxlength=1>
			   <input type=text name=id_hh3 size=1 maxlength=1>			   
			 </td>";
echo   "</tr>
		<tr><td colspan=3 align=center><input type=submit value=Submit><input type=button value=Cancel onclick=self.history.back()>
		</td></tr>				
    </table>";
}

//bagian KONFIRM INPUT household

elseif ($_GET[act]=='confirm_input'){
    $id_house=$_POST[district].''.'0'.''.$_POST[village].''.$_POST[id_rw1].''.$_POST[id_rw2].''.$_POST[id_rt1].''.$_POST[id_rt2].''.$_POST[id_hh1].''.	$_POST[id_hh2].''.$_POST[id_hh3];	
  $sqlcek_house="SELECT `kode_house` FROM `t_household` WHERE `kode_house`=$id_house";
  $cek_house=mysql_query($sqlcek_house) or die(mysql_error());
  $ada=mysql_num_rows($cek_house);
  if (!($ada > 0 )) {
     echo "<p>
	      <a href='?act=inputhh&id=$id_house'>Continue</a><p>&nbsp;<br></p></p><p>";
     echo tgl_indo(date("Y m d")); 
     echo " | "; 
     echo date("H:i:s");
	 echo "</p>";
  }
  else {
     echo "ID Household yang dimasukkan sudah terdaftar | <a href='?act=add_hh'>Back</a><p>&nbsp;<br></p>";
 }
} 


//Bagian input detail form household
elseif ($_GET[act]=='inputhh') {
//$sql_ses=mysql_query("SELECT * FROM USER where `name`=$_SESSION[username]");

echo "<h2>Input Detail Questionnare for Household - HH</h2>";
$kd_house=$_GET[id];
$kduser=$_SESSION[namauser];
//echo $kode_house;
//echo $kduser;
echo "<form method=POST action='exe_hsh1.php?module=household&act=input&id=$_GET[id]'>
	  <table>
	  <tr>
		 <td align=right colspan=3><b>Kader name</b> :<input type=text name=kader id=kader></td>		 
	  </tr>
	  <tr>
		 <td colspan=2><b>Identification No.</b> <input type=hidden value='$kduser' name=usrid></td>
		 <td> : <input type=text name=kde_house id=kdhouse value='$kd_house' disabled></td>		 
	  </tr>
	  <tr>
  	  	 <td colspan=2><b>Date of Survey</b></td>
			<td> : <input type=text name=dd_dos size=2 maxlength=2>/
				   <input type=text name=mm_dos size=2 maxlength=2>/
				   <input type=text name=yy_dos size=4 maxlength=4> (dd/mm/yyyy)			</td>
	 </tr>
 
     <tr>
	  	<td colspan=3><b>I. Description of Household</td>
	  </tr>
	  <tr>
	  	<td size=10>1.1</td>
	    <td>Name of Respondent</td><td> : <input type=text name=responden></td>
	  </tr>
	  <tr>
	  	<td size=10>1.2</td>	  
	    <td>Relationship with the family</td>
		<td> : <input type=text name=relation></td>
	  </tr>
	  <tr>
	  	<td size=10>1.3</td>	  	  
	  	<td>Occupation of the Head Household</td>
		<td> : <input type=text name=occupation></td>
		</td>
	  </tr>
	  <tr>
	  	<td size=10>1.4</td>	  
	  	<td>Last education of the Head Household</td>
	       <td> : <select name=kategori>
		   <option value=0 selected>- Level -</option>
		   <option value=SD>SD</option>
		   <option value=SMP>SMP</option>
		   <option value=SMA>SMA</option>
		   <option value=D1>D1</option>
		   <option value=D2>D2</option>
		   <option value=D3>D3</option>
		   <option value=DIV/S1>DIV/S1</option>
		   </select>&nbsp;Grade : <input type=text name=grade size=3></td>   
	   </tr>
	   <tr>
  	    <td size=10>1.5</td>	
	   	<td colspan=2>Family Members Including Death Histories</td>
 	   </tr>
       <tr>
	   	<td colspan=3> 
		<table id=tblSample>
		<tr>
			<th>No</th><th>Family Name</th><th>Relation</th><th>Sex</th>
			<th>Date of Birth<br>(dd/mm/yyyy)</th><th>Age</th><th>Date of Death<br>(dd/mm/yyyy)</th>	 
		</tr>
		<tr>
			<td align=center>1</td>
	        <td align=center><input id='txtRow' name='txtRow[]' type='text' size=14></td>
    	    <td align=center><input id='txtRow1' name='txtRow1[]' type='text' size=12></td>			
			<td align=center><select name=selRow[] id='selRow'>
					   <option value=Male>Male</option>
		   			   <option value=Female>Female</option>
		  		    </select>			</td>	
			<td align=center><input type=text name=txtRow2[] size=1 id='txtRow2' maxlength=2>/<input type=text
			 name=txtRow3[] size=1 id='txtRow3' maxlength=2>/<input type=text name=txtRow4[]
			 size=2 id='txtRow4' maxlength=4>			</td>

			<td align=center><input type=text name=txtRow5[] size=1 id='txtRow5'></td>		
			<td align=center><input type=text name=txtRow6[] size=1 id='txtRow6' maxlength=2>/
			                 <input type=text name=txtRow7[] size=1 id='txtRow7' maxlength=2>/<input type='text' name='txtRow8[]' size=2 id='txtRow8' maxlength=4>			</td>
			</tr>	
			</table>
			<input type=button value=Add onclick=addRowToTable(); />
		<input type=button value=Remove onclick=removeRowFromTable(); />		</td></tr>	
		
	   <tr>
  	    <td rowspan=2 size=10>1.6</td>	
	   	<td colspan=2>Number of animal</td>
 	   </tr>
	   <tr><td colspan=2>	
		<table><tr>
			<th>Species</th><th>Hobby</th><th>Family Food</th><th>Celebration</th><th>Business</th>
		</tr>	
		<tr>
			<td>Native Chicken</td>
			<td><input type=text name=no_ntvchick_hobby size=2></td>
			<td><input type=text name=no_ntvchick_food size=2></td>
			<td><input type=text name=no_ntvchick_celeb size=2></td>
			<td><input type=text name=no_ntvchick_bus size=2></td>						
		</tr>
		<tr>
			<td>Bantam Chicken</td>
			<td><input type=text name=no_btmchick_hobby size=2></td>
			<td><input type=text name=no_btmchick_food size=2></td>
			<td><input type=text name=no_btmchick_celeb size=2></td>
			<td><input type=text name=no_btmchick_bus size=2></td>						
		</tr>
		<tr>
			<td>Pelung Chicken</td>
			<td><input type=text name=no_plgchick_hobby size=2></td>
			<td><input type=text name=no_plgchick_food size=2></td>
			<td><input type=text name=no_plgchick_celeb size=2></td>
			<td><input type=text name=no_plgchick_bus size=2></td>						
		</tr>
		<tr>
			<td>Bangkok Chicken</td>
			<td><input type=text name=no_bnkchick_hobby size=2></td>
			<td><input type=text name=no_bnkchick_food size=2></td>
			<td><input type=text name=no_bnkchick_celeb size=2></td>
			<td><input type=text name=no_bnkchick_bus size=2></td>						
		</tr>										
		<tr>
			<td>Layer/Broiler</td>
			<td><input type=text name=no_layer_hobby size=2></td>
			<td><input type=text name=no_layer_food size=2></td>
			<td><input type=text name=no_layer_celeb size=2></td>
			<td><input type=text name=no_layer_bus size=2></td>								
		</tr>
		<tr>
			<td>Itik/Meri</td>
			<td><input type=text name=no_itik_hobby size=2></td>
			<td><input type=text name=no_itik_food size=2></td>
			<td><input type=text name=no_itik_celeb size=2></td>
			<td><input type=text name=no_itik_bus size=2></td>								
		</tr>
		<tr>
			<td>Entog/Bebek</td>
			<td><input type=text name=no_entog_hobby size=2></td>
			<td><input type=text name=no_entog_food size=2></td>
			<td><input type=text name=no_entog_celeb size=2></td>
			<td><input type=text name=no_entog_bus size=2></td>									
		</tr>
		<tr>
			<td>Goose</td>
			<td><input type=text name=no_goose_hobby size=2></td>
			<td><input type=text name=no_goose_food size=2></td>
			<td><input type=text name=no_goose_celeb size=2></td>
			<td><input type=text name=no_goose_bus size=2></td>									
		</tr>
		<tr>
			<td>Pigeon</td>
			<td><input type=text name=no_pigeon_hobby size=2></td>
			<td><input type=text name=no_pigeon_food size=2></td>
			<td><input type=text name=no_pigeon_celeb size=2></td>
			<td><input type=text name=no_pigeon_bus size=2></td>						
	   </tr>
		<tr>
			<td>Fancy Bird</td>
			<td><input type=text name=no_fcbird_hobby size=2></td>
			<td><input type=text name=no_fcbird_food size=2></td>
			<td><input type=text name=no_fcbird_celeb size=2></td>
			<td><input type=text name=no_fcbird_bus size=2></td>						
	   </tr>
	   		<tr>
			<td><input type=text name=nm_plihara1></td>
			<td><input type=text name=no_plihara1_hobby size=2></td>
			<td><input type=text name=no_plihara1_food size=2></td>
			<td><input type=text name=no_plihara1_celeb size=2></td>
			<td><input type=text name=no_plihara1_bus size=2></td>						
	   </tr>	   
		<tr>
			<td><input type=text name=nm_plihara2></td>
			<td><input type=text name=no_plihara2_hobby size=2></td>
			<td><input type=text name=no_plihara2_food size=2></td>
			<td><input type=text name=no_plihara2_celeb size=2></td>
			<td><input type=text name=no_plihara2_bus size=2></td>						
	   </tr>	   
		<tr>
			<td><input type=text name=nm_plihara3></td>
			<td><input type=text name=no_plihara3_hobby size=2></td>
			<td><input type=text name=no_plihara3_food size=2></td>
			<td><input type=text name=no_plihara3_celeb size=2></td>
			<td><input type=text name=no_plihara3_bus size=2></td>						
	   </tr>	   
		<tr>
			<td><input type=text name=nm_plihara4></td>
			<td><input type=text name=no_plihara4_hobby size=2></td>
			<td><input type=text name=no_plihara4_food size=2></td>
			<td><input type=text name=no_plihara4_celeb size=2></td>
			<td><input type=text name=no_plihara4_bus size=2></td>						
	   </tr>	   
		<tr>
			<td><input type=text name=nm_plihara5></td>
			<td><input type=text name=no_plihara5_hobby size=2></td>
			<td><input type=text name=no_plihara5_food size=2></td>
			<td><input type=text name=no_plihara5_celeb size=2></td>
			<td><input type=text name=no_plihara5_bus size=2></td>						
	   </tr>	    
		</table>
		</td>
	   </tr>
	   <tr>
  	    <td rowspan=2 size=10>1.7</td>	
		<td colspan=2>What is the number of poultry bought from :</td>
	   </tr>
	   <tr><td colspan=2>		 
           <table>
           <tr>
            <th>Animal</th>
            <th>From</th>
            <th>Location</th>
            <th>Detail</th>
            <th>Qty</th>
          </tr>
          <tr>
            <td rowspan=4>Native Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=no_rw></td>
			<td><input type=text size=3 name=jml_nat_rw></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa></td>
			<td><input type=text size=3 name=jml_nat_desa></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec></td>
			<td><input type=text size=3 name=jml_nat_kec></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab></td>
			<td><input type=text size=3 name=jml_nat_kab></td>			
			</tr>
			
          <tr>
            <td rowspan=4>Bantam Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_btm></td>
			<td><input type=text size=3 name=jml_btm_rw></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_btm></td>
			<td><input type=text size=3 name=jml_btm_desa></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_btm></td>
			<td><input type=text size=3 name=jml_btm_kec></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_btm></td>
			<td><input type=text size=3 name=jml_btm_kab></td>			
			</tr>		

          <tr>
            <td rowspan=4>Pelung Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_plg></td>
			<td><input type=text size=3 name=jml_plg_rw></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_plg></td>
			<td><input type=text size=3 name=jml_plg_desa></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_plg></td>
			<td><input type=text size=3 name=jml_plg_kec></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_plg></td>
			<td><input type=text size=3 name=jml_plg_kab></td>			
			</tr>		

          <tr>
            <td rowspan=4>Bangkok Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_bkk></td>
			<td><input type=text size=3 name=jml_bkk_rw></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_bkk></td>
			<td><input type=text size=3 name=jml_bkk_desa></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_bkk></td>
			<td><input type=text size=3 name=jml_bkk_kec></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_bkk></td>
			<td><input type=text size=3 name=jml_bkk_kab></td>			
			</tr>		
					
          <tr>
            <td rowspan=4>Layer/Broiler</td>
            <td><input type=text name=sma_desa_layer value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_layer value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_layer></td>
			<td><input type=text size=3 name=jml_lay_rw></td>			
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_layer size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=desa_layer value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_layer></td>
			<td><input type=text size=3 name=jml_lay_desa></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_layer size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_layer value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_layer></td>
			<td><input type=text size=3 name=jml_lay_kec></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_layer size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_layer value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_layer></td>
			<td><input type=text size=3 name=jml_lay_kab></td>			
			</tr>
          <tr>
            <td rowspan=4>Itik/Meri</td>
            <td><input type=text name=sma_desa_itik value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_itik value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_itik></td>
			<td><input type=text size=3 name=jml_itik_rw></td>		
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_itik size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=desa_itik value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_itik></td>
			<td><input type=text size=3 name=jml_itik_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_itik size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_itik value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_itik></td>
			<td><input type=text size=3 name=jml_itik_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_itik size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_itik value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_itik></td>
			<td><input type=text size=3 name=jml_itik_kab></td>					
  		 </tr>
          <tr>
            <td rowspan=4>Entog/Bebek</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_entog></td>
			<td><input type=text size=3 name=jml_entog_rw></td>					
		  </tr>
		  <tr>
            <td><input type=text name=sma_desa_entog2 size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=desa_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_entog></td>
			<td><input type=text size=3 name=jml_entog_desa></td>								
		  </tr>
		  <tr>
            <td><input type=text name=sma_kec_entog3 size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_entog></td>
			<td><input type=text size=3 name=jml_entog_kec></td>								
		  </tr>
		  <tr>
            <td><input type=text name=sma_kab_entog4 size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_entog value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_entog></td>
			<td><input type=text size=3 name=jml_entog_kab></td>								
   		  </tr>
          <tr>
            <td rowspan=4>Goose</td>
            <td><input type=text name=sma_desa_quail value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_quail value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_goose></td>
			<td><input type=text size=3 name=jml_goose_rw></td>					
		  </tr>
		  <tr>
            <td><input type=text name=sma_desa_quail size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=desa_quail value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_goose></td>
			<td><input type=text size=3 name=jml_goose_desa></td>					
		  </tr>
		  <tr>
            <td><input type=text name=sma_kec_quail size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_quail value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_goose></td>
			<td><input type=text size=3 name=jml_goose_kec></td>					
		  </tr>
		  <tr>
            <td><input type=text name=sma_kab_quail size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_quail value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_goose></td>
			<td><input type=text size=3 name=jml_goose_kab></td>					
   		  </tr>

          <tr>
            <td rowspan=4>Pigeon</td>
            <td><input type=text name=sma_desa_bird value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_bird value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_pigeon></td>
			<td><input type=text size=3 name=jml_pigeon_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_pigeon></td>
			<td><input type=text size=3 name=jml_pigeon_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_pigeon></td>
			<td><input type=text size=3 name=jml_pigeon_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_pigeon></td>
			<td><input type=text size=3 name=jml_pigeon_kab></td>					
		  </tr>	
          <tr>
            <td rowspan=4>Fancy Bird</td>
            <td><input type=text name=sma_desa_bird value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_bird value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_fcbird></td>
			<td><input type=text size=3 name=jml_fcbird_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_fcbird></td>
			<td><input type=text size=3 name=jml_fcbird_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_fcbird></td>
			<td><input type=text size=3 name=jml_fcbird_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_fcbird></td>
			<td><input type=text size=3 name=jml_fcbird_kab></td>					
		    </tr>
          <tr>
            <td rowspan=4><input type=text name=asal1 size=8></td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_asal1 value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_asal1></td>
			<td><input type=text size=3 name=jml_asal1_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_asal1></td>
			<td><input type=text size=3 name=jml_asal1_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_asal1></td>
			<td><input type=text size=3 name=jml_asal1_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_asal1></td>
			<td><input type=text size=3 name=jml_asal1_kab></td>					
		    </tr>

          <tr>
            <td rowspan=4><input type=text name=asal2 size=8></td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_asal value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_asal2></td>
			<td><input type=text size=3 name=jml_asal2_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_asal2></td>
			<td><input type=text size=3 name=jml_asal2_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_asal2></td>
			<td><input type=text size=3 name=jml_asal2_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_asal2></td>
			<td><input type=text size=3 name=jml_asal2_kab></td>					
		    </tr>

          <tr>
            <td rowspan=4><input type=text name=asal3 size=8></td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_asal1 value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_asal3></td>
			<td><input type=text size=3 name=jml_asal3_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_asal3></td>
			<td><input type=text size=3 name=jml_asal3_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_asal3></td>
			<td><input type=text size=3 name=jml_asal3_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_asal3></td>
			<td><input type=text size=3 name=jml_asal3_kab></td>					
		    </tr>

          <tr>
            <td rowspan=4><input type=text name=asal4 size=8></td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_asal1 value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_asal4></td>
			<td><input type=text size=3 name=jml_asal4_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_asal4></td>
			<td><input type=text size=3 name=jml_asal4_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_asal4></td>
			<td><input type=text size=3 name=jml_asal4_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_asal4></td>
			<td><input type=text size=3 name=jml_asal4_kab></td>					
		    </tr>
          <tr>
            <td rowspan=4><input type=text name=asal5 size=8></td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_asal1 value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_asal5></td>
			<td><input type=text size=3 name=jml_asal5_rw></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_bird size=32 value='Other village in the same sub-district' disabled>			</td>
			<td><input type=text size=4 name=rw_bird value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_asal5></td>
			<td><input type=text size=3 name=jml_asal5_desa></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_bird size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_bird value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_asal5></td>
			<td><input type=text size=3 name=jml_asal5_kec></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_asal5></td>
			<td><input type=text size=3 name=jml_asal5_kab></td>					
		    </tr>
        </table>	   
	</td></tr>
		
	
	   <tr>
  	    <td rowspan=2 size=10>1.8</td>	
	   	<td colspan=2>Number of died animal</td>
 	   </tr>
	   <tr><td colspan=2>	
	   		<table>
			  <tr>
				<th><b>Number of animals</b></th>
				<th align=center><b>Present</b></th>
				<th align=center><b>Sick last year</b></th>
				<th align=center><b>Died last year</b></th>
			  </tr>
			  <tr>
			  	<td>a. Native Chicken</td>
				<td align=center><input type=text name=chick_present size=6></td>
				<td align=center><input type=text name=chick_sick size=6></td>
				<td align=center><input type=text name=chick_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>b. Bantam Chicken</td>
				<td align=center><input type=text name=btm_present size=6></td>
				<td align=center><input type=text name=btm_sick size=6></td>
				<td align=center><input type=text name=btm_mati size=6></td>
			  </tr>
			  	<td>c. Pelung Chicken</td>
				<td align=center><input type=text name=plg_present size=6></td>
				<td align=center><input type=text name=plg_sick size=6></td>
				<td align=center><input type=text name=plg_mati size=6></td>
			  </tr>			  
			  </tr>
			  	<td>d. Bangkok Chicken</td>
				<td align=center><input type=text name=bkk_present size=6></td>
				<td align=center><input type=text name=bkk_sick size=6></td>
				<td align=center><input type=text name=bkk_mati size=6></td>
			  </tr>			  			  			  
			  <tr>
			  	<td>e. Layer/Broiler</td>
				<td align=center><input type=text name=layer_present size=6></td>
				<td align=center><input type=text name=layer_sick size=6></td>
				<td align=center><input type=text name=layer_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>f. Itik</td>
				<td align=center><input type=text name=itik_present size=6></td>
				<td align=center><input type=text name=itik_sick size=6></td>
				<td align=center><input type=text name=itik_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>g. Entog</td>
				<td align=center><input type=text name=entog_present size=6></td>
				<td align=center><input type=text name=entog_sick size=6></td>
				<td align=center><input type=text name=entog_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>h. Goose</td>
				<td align=center><input type=text name=goose_present size=6></td>
				<td align=center><input type=text name=goose_sick size=6></td>
				<td align=center><input type=text name=goose_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>i. Pigeon</td>
				<td align=center><input type=text name=pigeon_present size=6></td>
				<td align=center><input type=text name=pigeon_sick size=6></td>
				<td align=center><input type=text name=pigeon_mati size=6></td>
			  </tr>
			  			  	
			  <tr>
			  	<td>j. Fancy Bird</td>
				<td align=center><input type=text name=fcbird_present size=6></td>
				<td align=center><input type=text name=fcbird_sick size=6></td>
				<td align=center><input type=text name=fcbird_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>k. Cat</td>
				<td align=center><input type=text name=cat_present size=6></td>
				<td align=center><input type=text name=cat_sick size=6></td>
				<td align=center><input type=text name=cat_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>l. Dog</td>
				<td align=center><input type=text name=dog_present size=6></td>
				<td align=center><input type=text name=dog_sick size=6></td>
				<td align=center><input type=text name=dog_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>m. <input type=text name=bntg1 size=16></td>
				<td align=center><input type=text name=bntg1_present size=6></td>
				<td align=center><input type=text name=bntg1_sick size=6></td>
				<td align=center><input type=text name=bntg1_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>n. <input type=text name=bntg2 size=16></td>
				<td align=center><input type=text name=bntg2_present size=6></td>
				<td align=center><input type=text name=bntg2_sick size=6></td>
				<td align=center><input type=text name=bntg2_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>o. <input type=text name=bntg3 size=16></td>
				<td align=center><input type=text name=bntg3_present size=6></td>
				<td align=center><input type=text name=bntg3_sick size=6></td>
				<td align=center><input type=text name=bntg3_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>p. <input type=text name=bntg4 size=16></td>
				<td align=center><input type=text name=bntg4_present size=6></td>
				<td align=center><input type=text name=bntg4_sick size=6></td>
				<td align=center><input type=text name=bntg4_mati size=6></td>
			  </tr>
			  <tr>
			  	<td>q. <input type=text name=bntg5 size=16></td>
				<td align=center><input type=text name=bntg5_present size=6></td>
				<td align=center><input type=text name=bntg5_sick size=6></td>
				<td align=center><input type=text name=bntg5_mati size=6></td>
			  </tr>
			</table>
	   </td></tr>
	   
	   <tr>
  	    <td size=10>1.9</td>	  
	   	<td>Were there any sick or died poultry<br>in your RT in last year ?</td>
	   	<td><input type=radio name=diedRT value='Yes'>Yes 
			<input type=radio name=diedRT value='No'>No
			<input type=radio name=diedRT value='Not Sure'>Not Sure		</td>
	   </tr>
	<tr>
		<td size=2>1.10</td>
		<td colspan=2>What number of chicken have received vaccination?</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>
		<td>No Vaccination</td>
		<td><input type=text name=jml_novac></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>1 dose of vaccine</td>
		<td><input type=text name=jml_1dose></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>2 or more dose of vaccine</td>
		<td><input type=text name=jml_2dose></td>
	</tr>
	<tr>
		<td size=2>1.11</td>
		<td>Geocoding</td>
		<td> : <input type=text name=geocoding></td>
	</tr>		
    <tr>
      <td size=2>1.12</td>
      <td colspan=2><strong>Pola pencarian pertolongan pada <u>Balita (0-5 tahun)</u> </strong></td>
    </tr>
    <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola1>&nbsp; II <input type=textbox size=2 name=pola2>&nbsp;III <input type=textbox size=3 name=pola3>&nbsp;IV <input type=textbox size=3 name=pola4>&nbsp;V <input type=textbox size=3 name=pola5></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.13</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Anak (5&gt; - 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola21>&nbsp; II <input type=textbox size=2 name=pola22>&nbsp;III <input type=textbox size=3 name=pola23>&nbsp;IV <input type=textbox size=3 name=pola24>&nbsp;V <input type=textbox size=3 name=pola25></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.14</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Dewasa (&gt; 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola31>&nbsp; II <input type=textbox size=2 name=pola32>&nbsp;III <input type=textbox size=3 name=pola33>&nbsp;IV <input type=textbox size=3 name=pola34>&nbsp;V <input type=textbox size=3 name=pola35></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
   <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
   <tr>
   		<td>1.</td>
		<td>Ditemukan </td>
		<td> : <input name='ditemukan' type='radio' value='0' />Tidak &nbsp; <input name='ditemukan' type='radio' value='1' /> Ya </td>
   </tr>
   <tr>
   		<td>2.</td>
		<td>Pindah </td>
		<td> : <input name='pindah' type='radio' value='0' />Tidak &nbsp; <input name='pindah' type='radio' value='1' /> Ya </td>
   </tr>
   <tr>
   		<td>&nbsp;</td>
		<td>Jika Ya, keterangan </td>
		<td> : <textarea name='pindah_ya' cols='40' rows='3'></textarea></td>
   </tr>

   <tr>
   		<td>3.</td>
		<td>Keberadaan penghuni </td>
		<td> : <input name='penghuni' type='radio' value='0' />Tidak &nbsp; <input name='penghuni' type='radio' value='1' /> Ya </td>
   </tr>

   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <input name='tolak_wwcr' type='radio' value='0' />Tidak &nbsp; <input name='tolak_wwcr' type='radio' value='1' /> Ya </td>
   </tr>

	<tr><td colspan=3 align=center>
			<b>Valid</b> :<input type=radio name=valid value=Yes>Yes <input type=radio name=valid value=No>No<p>
			<input type=submit value=Submit>
			<input type=button value=Cancel onclick=self.history.back()></p>
		</td>
	</tr>				
	</table></form>";	
}

//Bagian Edit Household
elseif ($_GET[act]=='edithh'){
$sql_household="SELECT * FROM `t_household` WHERE kode_house='$_GET[id]'";
$household=mysql_query($sql_household);
$h=mysql_fetch_array($household);
$sqledit_hh="SELECT `kode_house`,`tgl_survey` from `t_household` where kode_house='$_GET[id]'";
$edit_hh=mysql_query($sqledit_hh);
$e=mysql_fetch_array($edit_hh);
$kode = $_GET[id];
//echo $sql_kode;
$rw1 = substr($kode, 3, 1);
$rw2 = substr($kode, 4, 1);
$rt1 = substr($kode, 5, 1);
$rt2 = substr($kode, 6, 1);
$vil = substr($kode, 1, 2);
$dis = substr($kode, 0, 1);
//echo $kode;
echo "<h2>Household-HH Edit Form</h2>";
// Update Tabel House Hold
echo "<form method=POST action='exe_hsh1.php?module=household1&act=edit&id=$_GET[id]'>
	  <table>";	  			  			  			  
echo "<tr>
<td colspan=3 align=right><b>Kader : </b><input type=text name=kader value='$h[kader]'></td>
	  </tr>
	  <tr>
		 <td colspan=2><b>Identification No.</b></td>
		 <td><input type=text name=idubah value=$kode><input type=hidden name=idhh value=$h[id_household]></td>";
$sql_tgl="SELECT DAY(tgl_survey) as tanggal, MONTH(tgl_survey) as bulan, YEAR(tgl_survey) as tahun FROM `t_household` WHERE kode_house=$_GET[id]";
		$tgl=mysql_query($sql_tgl);
		$t=mysql_fetch_array($tgl);
		$hr =  $t['tanggal'];
		$bln = $t['bulan'];
		$thn = $t['tahun'];

echo   "</tr>
	    <tr>
  	  	 <td colspan=2><b>Date of Survey</b></td>
			<td> : <input type=text name=dd_dos size=2 maxlength=2 value=$hr>/
				   <input type=text name=mm_dos size=2 maxlength=2 value=$bln>/
				   <input type=text name=yy_dos size=4 value=$thn>(dd/mm/yyyy)
			</td>
	   </tr>
       <tr>
	  	<td colspan=3><b>I. Description of Household</td>
	   </tr>
	   <tr>
	  	<td size=10>1.1</td>
	    <td>Name of Respondent</td><td> : <input type=text name=responden value='$h[nma_responde]'></td>
	  </tr>
	  <tr>
	  	<td size=10>1.2</td>	  
	    <td>Relationship with the family</td>
		<td> : <input type=text name=relation value='$h[hub_keluarga]'></td>
	  </tr>
	  <tr>
	  	<td size=10>1.3</td>	  	  
	  	<td>Occupation of the Head Household</td>
		<td> : <input type=text name=occupation value='$h[kerja_household]'></td>
		</td>
	  </tr>
	  <tr>
	  	<td size=10>1.4</td>	  
	  	<td>Last education of the Head Household</td>";
		if ($h[pend_household]=='SD') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD selected>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='SMP') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP selected>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='SMA') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA selected>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='D1') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1 Selected>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }			   
	  elseif ($h[pend_household]=='D2') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2 Selected>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='D3') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3 selected>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
				   
			  else {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1  selected>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
echo
	   "  	  
	   </tr>
	   <tr>
	   </tr>   
"	;   
// UPDATE tabel Anggota Rumah
echo " <tr>
	    <td size=10>1.5</td>	
	   	<td colspan=2>Family Members Including death history</td>
 	   </tr>
       <tr>
	   	<td colspan=3> ";
echo " <table id=tblSample>
		<tr>
			<th>No</th><th>Name</th><th>Relation</th><th>Sex</th>
			<th>Date of Birth<br>(dd/mm/yyyy)</th><th>Age</th><th>Date of Death</th>	 
		</tr>";
		$sql_anggota="SELECT * FROM `t_angrumah` WHERE `id_household`='$_GET[id]' AND `nma_anggota` !=''";
//		echo $sql_anggota;
	 					 				
		$no=1;
		$anggota=mysql_query($sql_anggota);
		while ($a_rmh=mysql_fetch_array($anggota)) 
		  {	
		  $sql_tgl="SELECT DAY(tgl_lhr_ang) as tanggal, MONTH(tgl_lhr_ang) as bulan,
				      YEAR(tgl_lhr_ang) as tahun, DAY(tglmeninggal) as tanggal2, MONTH(tglmeninggal) as bulan2,
				      YEAR(tglmeninggal) as tahun2 FROM `t_angrumah` WHERE id_household=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$tgl=mysql_query($sql_tgl);
			while ($t=mysql_fetch_array($tgl))
				{
				$hr =  $t['tanggal'];
				$bln = $t['bulan'];
				$thn = $t['tahun'];
				$hr2 =  $t['tanggal2'];
				$bln2 = $t['bulan2'];
				$thn2= $t['tahun2'];
			$sql_sex="SELECT * FROM `t_angrumah` where `id_household`=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$q_sex=mysql_query($sql_sex);
			while ($sex=mysql_fetch_array($q_sex)) {
echo   "<tr>
			<td align=center>$no</td>
	        <td align=center><input id='txtRow' name='txtRow[]' type='text' size=14 value='$a_rmh[nma_anggota]'>
										<input id='txtId' name='txtId[]' type=hidden value=$a_rmh[id_anggota]></td>
    	    <td align=center><input id='txtRow1' name='txtRow1[]' type='text' size=12 value='$a_rmh[hub_anggota]'></td>";
			$sql_sex="SELECT * FROM `t_angrumah` where `id_household`=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
//  		    echo $sql_sex;					  
			$q_sex=mysql_query($sql_sex);
    	    while ($sex=mysql_fetch_array($q_sex)) {		
				if ($sex[jns_klmn_ang]=='Male') {
			    	echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";		
					echo	 		"<option value=0>Select</option>
									<option value=Male selected>Male</option>
									<option value=Female>Female</option>"; }
		   		elseif ($sex[jns_klmn_ang]=='Female'){
    				echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";				
					echo		    "<option value=0>Select</option>
									<option value=Male>Male</option>
									<option value=Female selected>Female</option>";}
			  else {
				    echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";				
					echo	       "<option value=0 selected>Select</option>
								<option value=Male>Male</option>
					 			<option value=Female>Female</option>";}
		}						


echo"		<td align=center><input type='text' name='txtRow2[]' size=1 id='txtRow2' maxlength=2 value='$hr'>/ <input type=text name='txtRow3[]' size=1 id='txtRow3' maxlength=2 value='$bln'>/<input type=text name='txtRow4[]' size=2 id='txtRow4' maxlength=4 value='$thn'>
			</td><td align=center><input type=text name='txtRow5[]' size=2 id='txtRow5[]' value='$a_rmh[usia_anggota]'></td><td align=center><input type=text name=txtRow6[] size=1 id='txtRow6' maxlength=2 value=$hr2>/
			                 <input type=text name=txtRow7[] size=1 id='txtRow7' maxlength=2 value=$bln2>/
							 <input type='text' name='txtRow8[]' size=2 id='txtRow8' maxlength=4 value=$thn2>
			</td>

			</tr>";	
			}
			}
		$no++;	
		}
echo   "</table>
			<input type=hidden name=idhh value=$h[id_household]>
			<input type=button value=Add onclick=addRowToTable(); />
			<input type=button value=Remove onclick=removeRowFromTable(); />
			<img src=\"images/spacer.gif\" width=\"370\" height=\"3\">
			<input type=submit value=Update>
</td></tr>
</form>"	;   

// UPDATE tabel Animal
echo " <form method=POST action='exe_hsh1.php?module=animal&act=edit&id=$_GET[id]'>	
	   <tr>
  	    <td rowspan=2 size=10>1.6</td>	
	   	<td colspan=2>Number of animal</td>
 	   </tr>
	   <tr><td colspan=2>	
		<table><tr>
			<th>Species</th><th>Hobby</th><th>Family Food</th><th>Celebration</th><th>Business</th>
		</tr>	
		<tr>";
		$anim_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$a_nc=mysql_query($anim_nc);
		$nc=mysql_fetch_array($a_nc); 			  			  			  			  			  		
echo"		<td>Native Chicken</td>
			<td><input type=text name=no_ntvchick_hobby size=2 value=$nc[uhoby]></td>
			<td><input type=text name=no_ntvchick_food size=2 value=$nc[umakanan]></td>
			<td><input type=text name=no_ntvchick_celeb size=2 value=$nc[uperayaan]></td>
			<td><input type=text name=no_ntvchick_bus size=2 value=$nc[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$a_bc=mysql_query($anim_bc);
		$bc=mysql_fetch_array($a_bc); 			  			  			  			  			  		
echo"	<td>Bantam Chicken</td>
			<td><input type=text name=no_btmchick_hobby size=2 value=$bc[uhoby]></td>
			<td><input type=text name=no_btmchick_food size=2 value=$bc[umakanan]></td>
			<td><input type=text name=no_btmchick_celeb size=2 value=$bc[uperayaan]></td>
			<td><input type=text name=no_btmchick_bus size=2 value=$bc[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_pl="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$a_pl=mysql_query($anim_pl);
		$pl=mysql_fetch_array($a_pl); 			  			  			  			  			  		
echo"	<td>Pelung Chicken</td>
			<td><input type=text name=no_plgchick_hobby size=2 value=$pl[uhoby]></td>
			<td><input type=text name=no_plgchick_food size=2 value=$pl[umakanan]></td>
			<td><input type=text name=no_plgchick_celeb size=2 value=$pl[uperayaan]></td>
			<td><input type=text name=no_plgchick_bus size=2 value=$pl[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$a_bk=mysql_query($anim_bk);
		$bk=mysql_fetch_array($a_bk); 			  			  			  			  			  		
echo"	<td>Bangkok Chicken</td>
			<td><input type=text name=no_bkkchick_hobby size=2 value=$bk[uhoby]></td>
			<td><input type=text name=no_bkkchick_food size=2 value=$bk[umakanan]></td>
			<td><input type=text name=no_bkkchick_celeb size=2 value=$bk[uperayaan]></td>
			<td><input type=text name=no_bkkchick_bus size=2 value=$bk[ubisnis]></td>						
		</tr>";
		
		$anim_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$a_lb=mysql_query($anim_lb);
		$lb=mysql_fetch_array($a_lb); 			  			  			  			  			  		
echo"	<tr>
			<td>Layer/Broiler</td>
			<td><input type=text name=no_layer_hobby size=2 value=$lb[uhoby]></td>
			<td><input type=text name=no_layer_food size=2 value=$lb[umakanan]></td>
			<td><input type=text name=no_layer_celeb size=2 value=$lb[uperayaan]></td>
			<td><input type=text name=no_layer_bus size=2 value=$lb[ubisnis]></td>								
		</tr>";

		$anim_it="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$a_it=mysql_query($anim_it);
		$it=mysql_fetch_array($a_it); 			  			  			  			  			  			
echo"	<tr>
			<td>Itik/Meri</td>
			<td><input type=text name=no_itik_hobby size=2 value=$it[uhoby]></td>
			<td><input type=text name=no_itik_food size=2 value=$it[umakanan]></td>
			<td><input type=text name=no_itik_celeb size=2 value=$it[uperayaan]></td>
			<td><input type=text name=no_itik_bus size=2 value=$it[ubisnis]></td>								
		</tr>";
		
		$anim_et="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$a_et=mysql_query($anim_et);
		$et=mysql_fetch_array($a_et); 			  			  			  			  			  					
echo	"<tr>
			<td>Entog/Bebek</td>
			<td><input type=text name=no_entog_hobby size=2 value=$et[uhoby]></td>
			<td><input type=text name=no_entog_food size=2 value=$et[umakanan]></td>
			<td><input type=text name=no_entog_celeb size=2 value=$et[uperayaan]></td>
			<td><input type=text name=no_entog_bus size=2 value=$et[ubisnis]></td>									
		</tr>";

		$anim_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$a_gs=mysql_query($anim_gs);
		$gs=mysql_fetch_array($a_gs); 			  			  			  			  			  					
echo	"<tr>
			<td>Goose</td>
			<td><input type=text name=no_goose_hobby size=2  value=$gs[uhoby]></td>
			<td><input type=text name=no_goose_food size=2  value=$gs[umakanan]></td>
			<td><input type=text name=no_goose_celeb size=2 value=$gs[uperayaan]></td>
			<td><input type=text name=no_goose_bus size=2 value=$gs[ubisnis]></td>									
		</tr>";
		
		$anim_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$a_pg=mysql_query($anim_pg);
		$pg=mysql_fetch_array($a_pg); 			  			  			  			  			  						
echo	"<tr>
			<td>Pigeon</td>
			<td><input type=text name=no_pigeon_hobby size=2 value=$pg[uhoby]></td>
			<td><input type=text name=no_pigeon_food size=2 value=$pg[umakanan]></td>
			<td><input type=text name=no_pigeon_celeb size=2 value=$pg[uperayaan]></td>
			<td><input type=text name=no_pigeon_bus size=2 value=$pg[ubisnis]></td>						
	   </tr>";
		$anim_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$a_fb=mysql_query($anim_fb);
		$fb=mysql_fetch_array($a_fb); 			  			  			  			  			  						
echo	"<tr>
			<td>Fancy Bird</td>
			<td><input type=text name=no_fb_hobby size=2 value=$fb[uhoby]></td>
			<td><input type=text name=no_fb_food size=2 value=$fb[umakanan]></td>
			<td><input type=text name=no_fb_celeb size=2 value=$fb[uperayaan]></td>
			<td><input type=text name=no_fb_bus size=2 value=$fb[ubisnis]></td>						
	   </tr>";

		$anim_non="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
																  AND `nma_animal`!='Pigeon' 
																  AND `nma_animal`!='Goose'
																  AND `nma_animal`!='Entog/Bebek'
																  AND `nma_animal`!='Itik/Meri'
																  AND `nma_animal`!='Layer/Broiler'
																  AND `nma_animal`!='Bangkok Chicken'
																  AND `nma_animal`!='Pelung Chicken'
																  AND `nma_animal`!='Bantam Chicken'
																  AND `nma_animal`!='Native Chicken'
																  AND `vno_id`=$_GET[id]";

		$a_non=mysql_query($anim_non);
		$n=mysql_num_rows($a_non);
		for ($n = 1; $n <= 5; $n++) {
		   $tmp_id="id".$n;
		   $tmp_nama="non".$n."name";
		   $tmp_hobby="no".$n."hobby";
		   $tmp_food="no".$n."food";
		   $tmp_celeb="no".$n."celeb"; 
		   $tmp_bus="no".$n."bus"; 									
   			if ($non=mysql_fetch_array($a_non) ) {
  echo "<tr>
			<td><input type=text name=$tmp_nama value='$non[nma_animal]'><input type=hidden name=$tmp_id value=$non[id_animal]></td>
			<td><input type=text name=$tmp_hobby size=2 value=$non[uhoby]></td>
			<td><input type=text name=$tmp_food size=2 value=$non[umakanan]></td>
			<td><input type=text name=$tmp_celeb size=2 value=$non[uperayaan]></td>
			<td><input type=text name=$tmp_bus size=2 value=$non[ubisnis]></td> 
		   </tr> "; 
		   }
		   else 
	      {
echo"<tr>
		<td><input type=text name=$tmp_nama value=''><input type=hidden name=$tmp_id value=''></td>
		<td><input type=text name=$tmp_hobby size=2 value=''></td>
		<td><input type=text name=$tmp_food size=2 value=''></td>
		<td><input type=text name=$tmp_celeb size=2 value=''></td>
		<td><input type=text name=$tmp_bus size=2 value=''></td> 
		</tr> ";    
   		}
//		  $iCounter++;}
		  }
echo "</table></td></tr>";	  
/*$test="_"; 
$temp=""; 
$temp="shy".$test."ani";
echo $temp;*/
echo
	   "<tr>
  	    <td rowspan=2 size=10>1.7</td>	
		<td colspan=2>What is the number of poultry bought from :</td>
	   </tr>
	   <tr><td colspan=2>		 
           <table>
           <tr>
            <th>Animal</th>
            <th>From</th>
            <th>Location</th>
            <th>Detail</th>
            <th>Qty</th>
          </tr>";
		$buy_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$b_nc=mysql_query($buy_nc);
		$nc=mysql_fetch_array($b_nc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Native Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_brp value=$nc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_nc_rw value='$nc[sma_desa]'></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_nc value='$nc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_nc_desa value=$nc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_nc value='$nc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_nc_kec value=$nc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_nc value='$nc[other2]'></td>
			<td><input type=text size=3 name=jml_nc_kab value=$nc[other1]></td>			
			</tr>";
		$buy_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$b_bc=mysql_query($buy_bc);
		$bc=mysql_fetch_array($b_bc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bantam Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_bc_brp value=$bc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_bc_rw value=$bc[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_bc value='$bc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_bc_desa value=$bc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_bc value='$bc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_bc_kec value=$bc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_bc value='$bc[other2]'></td>
			<td><input type=text size=3 name=jml_bc_kab value=$bc[other1]></td>			
			</tr>";
		$buy_pc="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$b_pc=mysql_query($buy_pc);
		$pc=mysql_fetch_array($b_pc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Pelung Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_pc_brp value=$pc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_pc_rw value=$pc[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_pc value='$pc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_pc_desa value=$pc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_pc value='$pc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_pc_kec value=$pc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_pc value='$pc[other2]'></td>
			<td><input type=text size=3 name=jml_pc_kab value=$pc[other1]></td>			
			</tr>";
		$buy_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$b_bk=mysql_query($buy_bk);
		$bk=mysql_fetch_array($b_bk); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bangkok Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_bkc value=$bk[sma_desarw]></td>
			<td><input type=text size=3 name=jml_bkc_rw value=$bk[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_bkc value='$bk[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_bkc_desa value=$bk[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_bkc value='$bk[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_bkc_kec value=$bk[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_bkc value='$bk[other2]'></td>
			<td><input type=text size=3 name=jml_bkc_kab value=$bk[other1]></td>			
			</tr>";				
		$buy_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$b_lb=mysql_query($buy_lb);
		$lb=mysql_fetch_array($b_lb); 			  			  			  			  			  							  			
echo"  <tr>
            <td rowspan=4>Layer/Broiler</td>
            <td><input type=text name=sma_desa_layer value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_layer value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_layer value=$lb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_lay_rw value=$lb[sma_desa]></td>			
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_layer size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_layer value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_layer value='$lb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_lay_desa value=$lb[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_layer size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_layer value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_layer value='$lb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_lay_kec value=$lb[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_layer size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_layer value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_layer value='$lb[other2]'></td>
			<td><input type=text size=3 name=jml_lay_kab value=$lb[other1]></td>			
			</tr>";
		$buy_im="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$b_im=mysql_query($buy_im);
		$im=mysql_fetch_array($b_im); 			  			  			  			  			  							  			
echo "			
          <tr>
            <td rowspan=4>Itik/Meri</td>
            <td><input type=text name=sma_desa_itik value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_itik value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_itik value=$im[sma_desarw]></td>
			<td><input type=text size=3 name=jml_itik_rw value=$im[sma_desa]></td>		
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_itik size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_itik value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_itik value='$im[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_itik_desa value=$im[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_itik size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_itik value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_itik value='$im[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_itik_kec value=$im[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_itik size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_itik value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_itik value='$im[other2]'></td>
			<td><input type=text size=3 name=jml_itik_kab value=$im[other1]></td>					
			</tr>
          <tr>";
		$buy_eb="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$b_eb=mysql_query($buy_eb);
		$eb=mysql_fetch_array($b_eb); 			  			  			  			  			  							  					  
echo       "<td rowspan=4>Entog/Bebek</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_eb value=$eb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_eb_rw value=$eb[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_eb value='$eb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_eb_desa value=$eb[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_eb value='$eb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_eb_kec value=$eb[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_eb value='$eb[other2]'></td>
			<td><input type=text size=3 name=jml_eb_kab value=$eb[other1]></td>					
		  </tr>";
		  
		$buy_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$b_gs=mysql_query($buy_gs);
		$gs=mysql_fetch_array($b_gs); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Goose</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_gs value=$gs[sma_desarw]></td>
			<td><input type=text size=3 name=jml_gs_rw value=$gs[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_gs value='$gs[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_gs_desa value=$gs[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_gs value='$gs[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_gs_kec value=$gs[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_gs value='$gs[other2]'></td>
			<td><input type=text size=3 name=jml_gs_kab value=$gs[other1]></td>					
		  </tr>";
		  
		$buy_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$b_pg=mysql_query($buy_pg);
		$pg=mysql_fetch_array($b_pg); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Pigeon</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_pg value=$pg[sma_desarw]></td>
			<td><input type=text size=3 name=jml_pg_rw value=$pg[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_pg value='$pg[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_pg_desa value=$pg[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_pg value='$pg[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_pg_kec value=$pg[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_pg value='$pg[other2]'></td>
			<td><input type=text size=3 name=jml_pg_kab value=$pg[other1]></td>					
		  </tr>";
		$buy_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$b_fb=mysql_query($buy_fb);
		$fb=mysql_fetch_array($b_fb); 			  			  			  			  			  							  					  
echo       "<tr>
			<td rowspan=4>Fancy Bird</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_fb value=$fb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_fb_rw value=$fb[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_fb value='$fb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_fb_desa value=$fb[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_fb value='$fb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_fb_kec value=$fb[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_fb value='$fb[other2]'></td>
			<td><input type=text size=3 name=jml_fb_kab value=$fb[other1]></td>					
		  </tr>";
		  
		$anim_non2="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
											 AND `nma_animal`!='Pigeon' 
											 AND `nma_animal`!='Goose'
											 AND `nma_animal`!='Entog/Bebek'
											 AND `nma_animal`!='Itik/Meri'
											 AND `nma_animal`!='Layer/Broiler'
											 AND `nma_animal`!='Bangkok Chicken'
											 AND `nma_animal`!='Pelung Chicken'
											 AND `nma_animal`!='Bantam Chicken'
											 AND `nma_animal`!='Native Chicken'
											 AND `vno_id`=$_GET[id]";
											 
		$a_non2=mysql_query($anim_non2);
		$o=mysql_num_rows($a_non2);
		for ($o = 1; $o <= 5; $o++) {
			$tmp_id="idasal".$o;
			$tmp_nama="nama_bntg".$o;
			$tmp_rw="rw".$o;
			$jml_rw="jml_rw".$o;
			$tmp_desa="desa".$o;
			$jml_desa="jml_desa".$o;				
		 	$tmp_kec="kec".$o;						
			$jml_kec="jml_kec".$o;
			$tmp_kab="kab".$o;
			$jml_kab="jml_kab".$o;		
					
   			if ($non2=mysql_fetch_array($a_non2) ) {

	echo       "<tr>
				<td rowspan=4>
						<input type=text name=$tmp_nama value='$non2[nma_animal]' size=8><input type=hidden name=$tmp_id value=$non2[id_animal]>
				</td>
				<td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
				<td><input type=text size=4 name=rw_entog value=RW disabled></td>
				<td><input type=text size=4 name=$tmp_rw value=$non2[sma_desarw]></td>
				<td><input type=text size=3 name=$jml_rw value=$non2[sma_desa]></td>					
			  </tr>
				<tr>
				<td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
				</td>
				<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
				<td><input type=text size=20 name=$tmp_desa value='$non2[bda_desadesa]'></td>
				<td><input type=text size=3 name=$jml_desa value=$non2[bda_desa]></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
				<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
				<td><input type=text size=20 name=$tmp_kec value='$non2[bda_keckec]'></td>
				<td><input type=text size=3 name=$jml_kec value=$non2[bda_kec]></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
				<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
				<td><input type=text size=20 name=$tmp_kab value='$non2[other2]'></td>
				<td><input type=text size=3 name=$jml_kab value=$non2[other1]></td>					
			  </tr>";
			}
			else {
	echo       "<tr>
				<td rowspan=4>
						<input type=text name=$tmp_nama value='' size=8><input type=hidden name=$tmp_id value=''>
				</td>
				<td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
				<td><input type=text size=4 name=rw_entog value=RW disabled></td>
				<td><input type=text size=4 name=$tmp_rw value=''></td>
				<td><input type=text size=3 name=$jml_rw value=''></td>					
			  </tr>
				<tr>
				<td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
				</td>
				<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
				<td><input type=text size=20 name=$tmp_desa value=''></td>
				<td><input type=text size=3 name=$jml_desa value=''></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
				<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
				<td><input type=text size=20 name=$tmp_kec value=''></td>
				<td><input type=text size=3 name=$jml_kec value=''></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
				<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
				<td><input type=text size=20 name=$tmp_kab value=''></td>
				<td><input type=text size=3 name=$jml_kab value=''></td>					
			  </tr>";
			}
      }
		  
echo"	</table></td></tr>
 <tr>
 
 
	    <td colspan=3 align=right>
  		<input type=hidden name=idhh value=$h[id_household]>
		<p><input type=submit value=Update>
			</p></td>
	   </tr>";
echo "</form>";   

// UPDATE tabel Animal Around
echo " <form method=POST action='exe_hsh1.php?module=animal_around&act=edit&id=$_GET[id]'>	
<tr>
  	    <td rowspan=2 size=10>1.8</td>	
	   	<td colspan=2>Number of died animal</td>
 	   </tr>
	   <tr><td colspan=2>	
	   		<table>
			  <tr>
				<th><b>Number of animals</b></th>
				<th align=center><b>Present</b></th>
				<th align=center><b>Sick last year</b></th>
				<th align=center><b>Died last year</b></th>
			  </tr>
			  <tr>";
		$select_ayam="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Native Chicken' AND `vno_id`=$_GET[id]";
		$ayam=mysql_query($select_ayam);
		$a=mysql_fetch_array($ayam);
echo		" 	<td>a. Native Chicken</td>
				<td align=center><input type=text name=chick_present size=6 value=$a[qty_arround]></td>
				<td align=center><input type=text name=chick_sick size=6 value=$a[skit_th_lalu]></td>
				<td align=center><input type=text name=chick_died size=6 value=$a[mati_th_lalu]></td>
			  </tr>";		  
		$select_btm="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$c_btm=mysql_query($select_btm);
		$btm=mysql_fetch_array($c_btm);
echo		" 	<td>b. Bantam Chicken</td>
				<td align=center><input type=text name=btm_present size=6 value=$btm[qty_arround]></td>
				<td align=center><input type=text name=btm_sick size=6 value=$btm[skit_th_lalu]></td>
				<td align=center><input type=text name=btm_died size=6 value=$btm[mati_th_lalu]></td>
			  </tr>";
		$select_plg="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$c_plg=mysql_query($select_plg);
		$plg=mysql_fetch_array($c_plg);
echo		" 	<td>c. Pelung Chicken</td>
				<td align=center><input type=text name=plg_present size=6 value=$plg[qty_arround]></td>
				<td align=center><input type=text name=plg_sick size=6 value=$plg[skit_th_lalu]></td>
				<td align=center><input type=text name=plg_died size=6 value=$plg[mati_th_lalu]></td>
			  </tr>";
		$select_bkk="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$c_bkk=mysql_query($select_bkk);
		$bkk=mysql_fetch_array($c_bkk);
echo		" 	<td>d. Bangkok Chicken</td>
				<td align=center><input type=text name=bk_present size=6 value=$bkk[qty_arround]></td>
				<td align=center><input type=text name=bk_sick size=6 value=$bkk[skit_th_lalu]></td>
				<td align=center><input type=text name=bk_died size=6 value=$bkk[mati_th_lalu]></td>
			  </tr>";
			  
		$select_bro="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$bro=mysql_query($select_bro);
		$b=mysql_fetch_array($bro);  
echo		 "<tr>
			  	<td>e. Layer/Broiler</td>
				<td align=center><input type=text name=layer_present size=6 value=$b[qty_arround]></td>
				<td align=center> <input type=text name=layer_sick size=6 value=$b[skit_th_lalu]></td>
				<td align=center><input type=text name=layer_died size=6 value=$b[mati_th_lalu]></td>
			  </tr>";
		$select_itik="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Itik' AND `vno_id`=$_GET[id]";
		$itik=mysql_query($select_itik);
		$i=mysql_fetch_array($itik);
echo		 "<tr>
			  	<td>f. Itik</td>
				<td align=center><input type=text name=itik_present size=6 value=$i[qty_arround]></td>
				<td align=center><input type=text name=itik_sick size=6 value=$i[skit_th_lalu]></td>
				<td align=center><input type=text name=itik_died size=6 value=$i[mati_th_lalu]></td>
			  </tr>";
		$select_entog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Entog' AND `vno_id`=$_GET[id]";
		$entog=mysql_query($select_entog);
		$e=mysql_fetch_array($entog);			  
echo		 "<tr>
			  	<td>g. Entog</td>
				<td align=center><input type=text name=entog_present size=6 value=$e[qty_arround]></td>
				<td align=center><input type=text name=entog_sick size=6 value=$e[skit_th_lalu]></td>
				<td align=center><input type=text name=entog_died size=6 value=$e[mati_th_lalu]></td>
			  </tr>	";
		$select_goose="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Goose' AND `vno_id`=$_GET[id]";
		$goose=mysql_query($select_goose);
		$g=mysql_fetch_array($goose); 			  			  
echo		" <tr>
			  	<td>h. Goose</td>
				<td align=center><input type=text name=goose_present size=6 value=$g[qty_arround]></td>
				<td align=center><input type=text name=goose_sick size=6 value=$g[skit_th_lalu]></td>
				<td align=center><input type=text name=goose_died size=6 value=$g[mati_th_lalu]></td>
			  </tr>";			  
		$select_pigeon="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pigeon' AND `vno_id`=$_GET[id]";
		$pigeon=mysql_query($select_pigeon);
		$p=mysql_fetch_array($pigeon); 			  			  			  			  			  
echo		 "<tr>
			  	<td>i. Pigeon</td>
				<td align=center><input type=text name=pigeon_present size=6 value=$p[qty_arround]></td>
				<td align=center><input type=text name=pigeon_sick size=6 value=$p[skit_th_lalu]></td>
				<td align=center><input type=text name=pigeon_died size=6 value=$p[mati_th_lalu]></td>
			  </tr>";		  
		$select_bird="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$bird=mysql_query($select_bird);
		$bd=mysql_fetch_array($bird); 			  
echo		  "<tr>
			  	<td>j. Fancy Bird</td>
				<td align=center><input type=text name=bird_present size=6 value=$bd[qty_arround]></td>
				<td align=center><input type=text name=bird_sick size=6 value=$bd[skit_th_lalu]></td>
				<td align=center><input type=text name=bird_died size=6 value=$bd[mati_th_lalu]></td>
			  </tr>";
		$select_cat="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Cat' AND `vno_id`=$_GET[id]";
		$cat=mysql_query($select_cat);
		$c=mysql_fetch_array($cat); 			  			  			  
echo		 "<tr>
			  	<td>k. Cat</td>
				<td align=center><input type=text name=cat_present size=6 value=$c[qty_arround]></td>
				<td align=center><input type=text name=cat_sick size=6 value=$c[skit_th_lalu]></td>
				<td align=center><input type=text name=cat_died size=6 value=$c[mati_th_lalu]></td>
			  </tr>";
		$select_dog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Dog' AND `vno_id`=$_GET[id]";
		$dog=mysql_query($select_dog);
		$d=mysql_fetch_array($dog); 			  			  			  			  
echo		 "<tr>
			  	<td>l. Dog</td>
				<td align=center><input type=text name=dog_present size=6 value=$d[qty_arround]></td>
				<td align=center><input type=text name=dog_sick size=6 value=$d[skit_th_lalu]></td>
				<td align=center><input type=text name=dog_died size=6 value=$d[mati_th_lalu]></td>
			  </tr>";
			  
		$arr_non="SELECT * FROM `t_animal_arround` WHERE `nma_arround`!='Fancy Bird' 
																  AND `nma_arround`!='Pigeon' 
																  AND `nma_arround`!='Goose'
																  AND `nma_arround`!='Entog'
																  AND `nma_arround`!='Itik'
																  AND `nma_arround`!='Layer/Broiler'
																  AND `nma_arround`!='Bangkok Chicken'
																  AND `nma_arround`!='Pelung Chicken'
																  AND `nma_arround`!='Bantam Chicken'
																  AND `nma_arround`!='Native Chicken'
																  AND `nma_arround`!='Cat'
																  AND `nma_arround`!='Dog'																  
																  AND `vno_id`=$_GET[id]";

		$ar_non=mysql_query($arr_non);
		$r=mysql_num_rows($ar_non);
		for ($r=1 ; $r<=5;$r++) {
			$tmp_nama="nma_arr".$r;
			$tmp_idr="idr".$r;
			$tmp_qty="qty".$r;
			$tmp_skt="skt".$r;
			$tmp_mati="mati".$r;				
			if ($rnon=mysql_fetch_array($ar_non) ) {
echo		 "<tr>
			  	<td><input type=text name=$tmp_nama value='$rnon[nma_arround]'><input type=hidden name=$tmp_idr value=$rnon[id_anarr]></td>
				<td align=center><input type=text name=$tmp_qty size=6 value=$rnon[qty_arround]></td>
				<td align=center><input type=text name=$tmp_skt size=6 value=$rnon[skit_th_lalu]></td>
				<td align=center><input type=text name=$tmp_mati size=6 value=$rnon[mati_th_lalu]></td>
			  </tr>";
			}
			else {
echo		 "<tr>
			  	<td><input type=text name=$tmp_nama value=''><input type=hidden name=$tmp_idr value=''></td>
				<td align=center><input type=text name=$tmp_qty size=6></td>
				<td align=center><input type=text name=$tmp_skt size=6></td>
				<td align=center><input type=text name=$tmp_mati size=6></td>
			  </tr>";
			}
		}
echo"</table>

	   </td></tr>";  	   	   
		$sqlradio_unggas="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]";
		$radio_unggas=mysql_query($sqlradio_unggas);
echo"  <tr>
  	    <td size=10>1.9</td>	  
	   	<td>Were there any sick or died poultry<br>in your RT in last year ?</td>
	   	<td>";
		$ru=mysql_fetch_array($radio_unggas) ;	  			  			  			  			  			  
			if ($ru[unggas_skt_mati]=='Yes') {
echo	"	<input type=radio name=diedRT value='Yes' checked>Yes
			<input type=radio name=diedRT value='No'>No
			<input type=radio name=diedRT value='Not Sure'>Not Sure"; }
		   if ( $ru[unggas_skt_mati]=='No') {
echo	"	<input type=radio name=diedRT value='Yes'>Yes
			<input type=radio name=diedRT value='No' checked>No
			<input type=radio name=diedRT value='Not Sure'>Not Sure"; }
	       if ( ( $ru[unggas_skt_mati]=='Not Sure') or  ( $ru[unggas_skt_mati]=='') or  ( $ru[unggas_skt_mati]=='Not S') or ( $ru[unggas_skt_mati]=='on') 
		   		or  ( $ru[unggas_skt_mati]=='Not') ){
echo	"<input type=radio name=diedRT value='Yes'>Yes
			<input type=radio name=diedRT value='No'>No
			<input type=radio name=diedRT value='Not Sure' checked>Not Sure"; }	
echo   "</td>
	   </tr>
	   <tr>
 	    <td colspan=3 align=right>
  			 <input type=hidden name=idhh value=$h[id_household]>
			 <p><input type=submit value=Update>
			</p></td>
	   </tr>";
echo "</form>";


// UPDATE tabel House Hold 2
echo " <form method=POST action='exe_hsh1.php?module=household2&act=edit&id=$_GET[id]'>";
	  $sql_vac="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $vac=mysql_query($sql_vac);
	  $vc=mysql_fetch_array($vac);
 
echo	"<tr>
		<td size=2>1.10</td>
		<td colspan=2>What number of chicken have received vaccination?</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>
		<td>No Vaccination</td>
		<td><input type=text name=jml_novac value=$vc[vaksinasi1]></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>1 dose of vaccine</td>
		<td><input type=text name=jml_1dose value=$vc[vaksinasi2]></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>2 or more dose of vaccine</td>
		<td><input type=text name=jml_2dose value=$vc[vaksinasi3]></td>
	   </tr>";
	   
	  $sql_geo="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $s_geo=mysql_query($sql_geo);
	  $geo=mysql_fetch_array($s_geo);
echo	"<tr>
		<td size=2>1.11</td>
		<td>Geocoding</td><td>
		<input type=text name=geocoding value=$geo[geocoding]></td>
 	</tr>  ";
	
	  $sql_pola1="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $s_pola1=mysql_query($sql_pola1);
	  $pola1=mysql_fetch_array($s_pola1);
echo "	
    <tr>
      <td size=2>1.12</td>
      <td colspan=2><strong>Pola pencarian pertolongan pada <u>Balita (0-5 tahun)</u> </strong></td>
    </tr>
    <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola1 value=$pola1[pola11]>&nbsp; II <input type=textbox size=2 name=pola2 value=$pola1[pola12]>&nbsp;III <input type=textbox size=3 name=pola3 value=$pola1[pola13]>&nbsp;IV <input type=textbox size=3 name=pola4 value=$pola1[pola14]>&nbsp;V <input type=textbox size=3 name=pola5 value=$pola1[pola15]></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.13</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Anak (5&gt; - 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola21 value=$pola1[pola21]>&nbsp; II <input type=textbox size=2 name=pola22 value=$pola1[pola22]>&nbsp;III <input type=textbox size=3 name=pola23 value=$pola1[pola23]>&nbsp;IV <input type=textbox size=3 name=pola24 value=$pola1[pola24]>&nbsp;V <input type=textbox size=3 name=pola25 value=$pola1[pola25]></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>
      <tr>
        <td size=2>1.14</td>
        <td colspan=2><strong>Pola pencarian pertolongan pada <u>Dewasa (&gt; 18 tahun)</u> </strong></td>
      </tr>
      <tr>
	  	<td size=2>&nbsp;</td>
	  	<td colspan=2>Apakah <b><u>pola pencarian pertolongan</u></b> yang biasa dipilih pada saat terkena flu</td>
	  </tr>
	  <tr>
		<td colspan=3 align=center> I <input type=textbox size=2 name=pola31 value=$pola1[pola31]>&nbsp; II <input type=textbox size=2 name=pola32 value=$pola1[pola32]>&nbsp;III <input type=textbox size=3 name=pola33 value=$pola1[pola33]>&nbsp;IV <input type=textbox size=3 name=pola34 value=$pola1[pola34]>&nbsp;V <input type=textbox size=3 name=pola35 value=$pola1[pola35]></td>
	  </tr>
	  <tr>
	  <td colspan=3 align=center>
	  	<table>
			<tr><td align=center>I/II/III/IV/V</td></tr>
			<tr><td>1. Tidak diobati</td></tr>
			<tr><td>2. Mengobati sendiri (keterangan di no 71 - 76)</td></tr>
			<tr><td>3. Dukun/paraji (keterangan di no 76 - 82)</td></tr>
			<tr><td>4. Puskesmas (keterangan di no 83 - 88)</td></tr>
			<tr><td>5. Bidan/Mantri/Perawat (keterangan di no 89 - 94)</td></tr>
			<tr><td>6. Dokter/Dokter spesialis anak (keterangan di no 95 - 100)</td></tr>
			<tr><td>7. Tidak Melanjutkan pengobatan</td></tr>
		</table>	  </td>
	  </tr>";
	if ($h[ditemukan]=='1')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> : <input name='ditemukan' type='radio' value='0' />Tidak &nbsp; <input name='ditemukan' type='radio' value='1' checked /> Ya </td>
		   </tr>";
   }
	if ($h[ditemukan]=='0')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> : <input name='ditemukan' type='radio' value='0' checked  />Tidak &nbsp; <input name='ditemukan' type='radio' value='1' /> Ya </td>
		   </tr>";
   }
   	if ($h[ditemukan]=='')  {
		echo "
				 <tr><td colspan=3 align=left><b>Keterangan Form</b></td></tr>
		   <tr>
				<td>1.</td>
				<td>Ditemukan </td>
				<td> : <input name='ditemukan' type='radio' value='0'  />Tidak &nbsp; <input name='ditemukan' type='radio' value='1' /> Ya </td>
		   </tr>";
   }

  if ($h[pindah]=='1')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : <input name='pindah' type='radio' value='0' />Tidak &nbsp; <input name='pindah' type='radio' value='1'  checked/> Ya </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : <textarea name='pindah_ya' cols='40' rows='3'>$h[pindah_ya]</textarea></td>
	   </tr>";	   
   }
  if ($h[pindah]=='0')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : <input name='pindah' type='radio' value='0'  checked/>Tidak &nbsp; <input name='pindah' type='radio' value='1' /> Ya </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : <textarea name='pindah_ya' cols='40' rows='3'>$h[pindah_ya]</textarea></td>
	   </tr>";	
   }
     if ($h[pindah]=='')  { 
  echo"
	   <tr>
			<td>2.</td>
			<td>Pindah </td>
			<td> : <input name='pindah' type='radio' value='0'  />Tidak &nbsp; <input name='pindah' type='radio' value='1' /> Ya </td>
	   </tr>
	   <tr>
			<td>&nbsp;</td>
			<td>Jika Ya, keterangan </td>
			<td> : <textarea name='pindah_ya' cols='40' rows='3'>$h[pindah_ya]</textarea></td>
	   </tr>";	
   }
   
  if ($h[huni_ada]=='1')  { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : <input name='penghuni' type='radio' value='0' />Tidak &nbsp; <input name='penghuni' type='radio' value='1' checked /> Ya </td>
	   </tr>";
	}
  if ($h[huni_ada]=='0')  { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : <input name='penghuni' type='radio' value='0' checked/>Tidak &nbsp; <input name='penghuni' type='radio' value='1'/> Ya </td>
	   </tr>";
	}
  if ($h[huni_ada]=='' ) { 
	echo "
	   <tr>
			<td>3.</td>
			<td>Keberadaan penghuni </td>
			<td> : <input name='penghuni' type='radio' value='0' />Tidak &nbsp; <input name='penghuni' type='radio' value='1'/> Ya </td>
	   </tr>";
	}

  if ($h[tolak_wwcr]=='1')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <input name='tolak_wwcr' type='radio' value='0' />Tidak &nbsp; <input name='tolak_wwcr' type='radio' value='1' checked /> Ya </td>
   </tr>";
	}
  if ($h[tolak_wwcr]=='0')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <input name='tolak_wwcr' type='radio' value='0'  checked/>Tidak &nbsp; <input name='tolak_wwcr' type='radio' value='1' /> Ya </td>
   </tr>";
	}
  if ($h[tolak_wwcr]=='')  { 
  echo "
   <tr>
   		<td>4.</td>
		<td>Menolak wawancara </td>
		<td> : <input name='tolak_wwcr' type='radio' value='0'/>Tidak &nbsp; <input name='tolak_wwcr' type='radio' value='1' /> Ya </td>
   </tr>";
	}	

	
	echo"	
 	<tr><td colspan=3 align=center>
			<b>Valid</b> :";	  			  			  			  			  
			if ($h[valid]=='Yes') {
echo	"	 <input type=radio name=valid value=Yes checked>Yes
			 <input type=radio name=valid value=No>No"; }
			if ($h[valid]=='No') {
echo	"	 <input type=radio name=valid value=Yes>Yes
			 <input type=radio name=valid value=No checked>No"; }
			if ($h[valid]=='') {
echo	"	 <input type=radio name=valid value=Yes>Yes
			 <input type=radio name=valid value=No>No"; }
echo	"	</td></tr><tr><td colspan=3 align=right>";	  			 
echo    "	<input type=submit value=Update>
			<input type=hidden name=idhh value=$h[id_household]>
			</td>
	</tr>				
	</table></form>";	
}


//Bagian Edit Household
elseif ($_GET[act]=='errorhh'){
//print $_GET[id];
$sql_household="SELECT * FROM `t_household` WHERE kode_house='$_GET[id]'";
$household=mysql_query($sql_household);
$h=mysql_fetch_array($household);
$sqledit_hh="SELECT `kode_house`,`tgl_survey` from `t_household` where kode_house='$_GET[id]'";
$edit_hh=mysql_query($sqledit_hh);
$e=mysql_fetch_array($edit_hh);
$kode = $_GET[id];
//echo $sql_kode;
$rw1 = substr($kode, 3, 1);
$rw2 = substr($kode, 4, 1);
$rt1 = substr($kode, 5, 1);
$rt2 = substr($kode, 6, 1);
$vil = substr($kode, 1, 2);
$dis = substr($kode, 0, 1);
//echo $kode;
echo "<h2>Household-HH Edit Form</h2>";
// Update Tabel House Hold
$error_msg=$_GET[strError];
echo "<form method=POST action='exe_hsh1.php?module=household1&act=edit&id=$_GET[id]'>
	  <table>";	  			  			  			  
echo "<tr>
<td colspan=3 align=left><b>Error Message : ";
print "<font color='red'>";
print $error_msg;
print "</font>";
print " </td>
	  </tr>
	  <tr>
<td colspan=3 align=right><b>Kader : </b><input type=text name=kader value='$h[kader]'></td>
	  </tr>
	  <tr>
		 <td colspan=2><b>Identification No.</b></td>
		 <td><input type=text name=idubah value=$kode><input type=hidden name=idhh value=$h[id_household]></td>";
$sql_tgl="SELECT DAY(tgl_survey) as tanggal, MONTH(tgl_survey) as bulan, YEAR(tgl_survey) as tahun FROM `t_household` WHERE kode_house=$_GET[id]";
		$tgl=mysql_query($sql_tgl);
		$t=mysql_fetch_array($tgl);
		$hr =  $t['tanggal'];
		$bln = $t['bulan'];
		$thn = $t['tahun'];

echo   "</tr>
	    <tr>
  	  	 <td colspan=2><b>Date of Survey</b></td>
			<td> : <input type=text name=dd_dos size=2 maxlength=2 value=$hr>/
				   <input type=text name=mm_dos size=2 maxlength=2 value=$bln>/
				   <input type=text name=yy_dos size=4 value=$thn>(dd/mm/yyyy)
			</td>
	   </tr>
       <tr>
	  	<td colspan=3><b>I. Description of Household</td>
	   </tr>
	   <tr>
	  	<td size=10>1.1</td>
	    <td>Name of Respondent</td><td> : <input type=text name=responden value='$h[nma_responde]'></td>
	  </tr>
	  <tr>
	  	<td size=10>1.2</td>	  
	    <td>Relationship with the family</td>
		<td> : <input type=text name=relation value='$h[hub_keluarga]'></td>
	  </tr>
	  <tr>
	  	<td size=10>1.3</td>	  	  
	  	<td>Occupation of the Head Household</td>
		<td> : <input type=text name=occupation value='$h[kerja_household]'></td>
		</td>
	  </tr>
	  <tr>
	  	<td size=10>1.4</td>	  
	  	<td>Last education of the Head Household</td>";
		if ($h[pend_household]=='SD') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD selected>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='SMP') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP selected>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='SMA') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA selected>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='D1') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1 Selected>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }			   
	  elseif ($h[pend_household]=='D2') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2 Selected>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
	  elseif ($h[pend_household]=='D3') {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3 selected>D3</option>
				   <option value=DIV/S1>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
				   
			  else {
		echo	 " <td> : <select name=kategori>
				   <option value=SD>SD</option>
				   <option value=SMP>SMP</option>
				   <option value=SMA>SMA</option>
				   <option value=D1>D1</option>
				   <option value=D2>D2</option>
				   <option value=D3>D3</option>
				   <option value=DIV/S1  selected>DIV/S1</option>
				   </select>&nbsp;Grade : <input type=text name=grade size=3 value='$h[pendtingkathh]'></td> ";   }
echo
	   "  	  
	   </tr>
	   <tr>
	   </tr>   
"	;   
// UPDATE tabel Anggota Rumah
echo " <tr>
	    <td size=10>1.5</td>	
	   	<td colspan=2>Family Members Including death history</td>
 	   </tr>
       <tr>
	   	<td colspan=3> ";
echo " <table id=tblSample>
		<tr>
			<th>No</th><th>Name</th><th>Relation</th><th>Sex</th>
			<th>Date of Birth<br>(dd/mm/yyyy)</th><th>Age</th><th>Date of Death</th>	 
		</tr>";
		$sql_anggota="SELECT * FROM `t_angrumah` WHERE `id_household`='$_GET[id]' AND `nma_anggota` !=''";
//		echo $sql_anggota;
	 					 				
		$no=1;
		$anggota=mysql_query($sql_anggota);
		while ($a_rmh=mysql_fetch_array($anggota)) 
		  {	
		  $sql_tgl="SELECT DAY(tgl_lhr_ang) as tanggal, MONTH(tgl_lhr_ang) as bulan,
				      YEAR(tgl_lhr_ang) as tahun, DAY(tglmeninggal) as tanggal2, MONTH(tglmeninggal) as bulan2,
				      YEAR(tglmeninggal) as tahun2 FROM `t_angrumah` WHERE id_household=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$tgl=mysql_query($sql_tgl);
			while ($t=mysql_fetch_array($tgl))
				{
				$hr =  $t['tanggal'];
				$bln = $t['bulan'];
				$thn = $t['tahun'];
				$hr2 =  $t['tanggal2'];
				$bln2 = $t['bulan2'];
				$thn2= $t['tahun2'];
			$sql_sex="SELECT * FROM `t_angrumah` where `id_household`=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
			$q_sex=mysql_query($sql_sex);
			while ($sex=mysql_fetch_array($q_sex)) {
echo   "<tr>
			<td align=center>$no</td>
	        <td align=center><input id='txtRow' name='txtRow[]' type='text' size=14 value='$a_rmh[nma_anggota]'>
										<input id='txtId' name='txtId[]' type=hidden value=$a_rmh[id_anggota]></td>
    	    <td align=center><input id='txtRow1' name='txtRow1[]' type='text' size=12 value='$a_rmh[hub_anggota]'></td>";
			$sql_sex="SELECT * FROM `t_angrumah` where `id_household`=$_GET[id] AND `nma_anggota` !='' 
					  AND `nma_anggota` ='$a_rmh[nma_anggota]'";
//  		    echo $sql_sex;					  
			$q_sex=mysql_query($sql_sex);
    	    while ($sex=mysql_fetch_array($q_sex)) {		
				if ($sex[jns_klmn_ang]=='Male') {
			    	echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";		
					echo	 		"<option value=0>Select</option>
									<option value=Male selected>Male</option>
									<option value=Female>Female</option>"; }
		   		elseif ($sex[jns_klmn_ang]=='Female'){
    				echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";				
					echo		    "<option value=0>Select</option>
									<option value=Male>Male</option>
									<option value=Female selected>Female</option>";}
			  else {
				    echo	 "<td align=center><select name=selRow[] id='selRow' value='$sex[jns_klmn_ang]'>";				
					echo	       "<option value=0 selected>Select</option>
								<option value=Male>Male</option>
					 			<option value=Female>Female</option>";}
		}						


echo"		<td align=center><input type='text' name='txtRow2[]' size=1 id='txtRow2' maxlength=2 value='$hr'>/ <input type=text name='txtRow3[]' size=1 id='txtRow3' maxlength=2 value='$bln'>/<input type=text name='txtRow4[]' size=2 id='txtRow4' maxlength=4 value='$thn'>
			</td><td align=center><input type=text name='txtRow5[]' size=2 id='txtRow5[]' value='$a_rmh[usia_anggota]'></td><td align=center><input type=text name=txtRow6[] size=1 id='txtRow6' maxlength=2 value=$hr2>/
			                 <input type=text name=txtRow7[] size=1 id='txtRow7' maxlength=2 value=$bln2>/
							 <input type='text' name='txtRow8[]' size=2 id='txtRow8' maxlength=4 value=$thn2>
			</td>

			</tr>";	
			}
			}
		$no++;	
		}
echo   "</table>
			<input type=hidden name=idhh value=$h[id_household]>
			<input type=button value=Add onclick=addRowToTable(); />
			<input type=button value=Remove onclick=removeRowFromTable(); />
			<img src=\"images/spacer.gif\" width=\"370\" height=\"3\">
			<input type=submit value=Update>
</td></tr>
</form>"	;   

// UPDATE tabel Animal
echo " <form method=POST action='exe_hsh1.php?module=animal&act=edit&id=$_GET[id]'>	
	   <tr>
  	    <td rowspan=2 size=10>1.6</td>	
	   	<td colspan=2>Number of animal</td>
 	   </tr>
	   <tr><td colspan=2>	
		<table><tr>
			<th>Species</th><th>Hobby</th><th>Family Food</th><th>Celebration</th><th>Business</th>
		</tr>	
		<tr>";
		$anim_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$a_nc=mysql_query($anim_nc);
		$nc=mysql_fetch_array($a_nc); 			  			  			  			  			  		
echo"		<td>Native Chicken</td>
			<td><input type=text name=no_ntvchick_hobby size=2 value=$nc[uhoby]></td>
			<td><input type=text name=no_ntvchick_food size=2 value=$nc[umakanan]></td>
			<td><input type=text name=no_ntvchick_celeb size=2 value=$nc[uperayaan]></td>
			<td><input type=text name=no_ntvchick_bus size=2 value=$nc[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$a_bc=mysql_query($anim_bc);
		$bc=mysql_fetch_array($a_bc); 			  			  			  			  			  		
echo"	<td>Bantam Chicken</td>
			<td><input type=text name=no_btmchick_hobby size=2 value=$bc[uhoby]></td>
			<td><input type=text name=no_btmchick_food size=2 value=$bc[umakanan]></td>
			<td><input type=text name=no_btmchick_celeb size=2 value=$bc[uperayaan]></td>
			<td><input type=text name=no_btmchick_bus size=2 value=$bc[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_pl="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$a_pl=mysql_query($anim_pl);
		$pl=mysql_fetch_array($a_pl); 			  			  			  			  			  		
echo"	<td>Pelung Chicken</td>
			<td><input type=text name=no_plgchick_hobby size=2 value=$pl[uhoby]></td>
			<td><input type=text name=no_plgchick_food size=2 value=$pl[umakanan]></td>
			<td><input type=text name=no_plgchick_celeb size=2 value=$pl[uperayaan]></td>
			<td><input type=text name=no_plgchick_bus size=2 value=$pl[ubisnis]></td>						
		</tr>
		
		<tr>";
		$anim_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$a_bk=mysql_query($anim_bk);
		$bk=mysql_fetch_array($a_bk); 			  			  			  			  			  		
echo"	<td>Bangkok Chicken</td>
			<td><input type=text name=no_bkkchick_hobby size=2 value=$bk[uhoby]></td>
			<td><input type=text name=no_bkkchick_food size=2 value=$bk[umakanan]></td>
			<td><input type=text name=no_bkkchick_celeb size=2 value=$bk[uperayaan]></td>
			<td><input type=text name=no_bkkchick_bus size=2 value=$bk[ubisnis]></td>						
		</tr>";
		
		$anim_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$a_lb=mysql_query($anim_lb);
		$lb=mysql_fetch_array($a_lb); 			  			  			  			  			  		
echo"	<tr>
			<td>Layer/Broiler</td>
			<td><input type=text name=no_layer_hobby size=2 value=$lb[uhoby]></td>
			<td><input type=text name=no_layer_food size=2 value=$lb[umakanan]></td>
			<td><input type=text name=no_layer_celeb size=2 value=$lb[uperayaan]></td>
			<td><input type=text name=no_layer_bus size=2 value=$lb[ubisnis]></td>								
		</tr>";

		$anim_it="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$a_it=mysql_query($anim_it);
		$it=mysql_fetch_array($a_it); 			  			  			  			  			  			
echo"	<tr>
			<td>Itik/Meri</td>
			<td><input type=text name=no_itik_hobby size=2 value=$it[uhoby]></td>
			<td><input type=text name=no_itik_food size=2 value=$it[umakanan]></td>
			<td><input type=text name=no_itik_celeb size=2 value=$it[uperayaan]></td>
			<td><input type=text name=no_itik_bus size=2 value=$it[ubisnis]></td>								
		</tr>";
		
		$anim_et="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$a_et=mysql_query($anim_et);
		$et=mysql_fetch_array($a_et); 			  			  			  			  			  					
echo	"<tr>
			<td>Entog/Bebek</td>
			<td><input type=text name=no_entog_hobby size=2 value=$et[uhoby]></td>
			<td><input type=text name=no_entog_food size=2 value=$et[umakanan]></td>
			<td><input type=text name=no_entog_celeb size=2 value=$et[uperayaan]></td>
			<td><input type=text name=no_entog_bus size=2 value=$et[ubisnis]></td>									
		</tr>";

		$anim_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$a_gs=mysql_query($anim_gs);
		$gs=mysql_fetch_array($a_gs); 			  			  			  			  			  					
echo	"<tr>
			<td>Goose</td>
			<td><input type=text name=no_goose_hobby size=2  value=$gs[uhoby]></td>
			<td><input type=text name=no_goose_food size=2  value=$gs[umakanan]></td>
			<td><input type=text name=no_goose_celeb size=2 value=$gs[uperayaan]></td>
			<td><input type=text name=no_goose_bus size=2 value=$gs[ubisnis]></td>									
		</tr>";
		
		$anim_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$a_pg=mysql_query($anim_pg);
		$pg=mysql_fetch_array($a_pg); 			  			  			  			  			  						
echo	"<tr>
			<td>Pigeon</td>
			<td><input type=text name=no_pigeon_hobby size=2 value=$pg[uhoby]></td>
			<td><input type=text name=no_pigeon_food size=2 value=$pg[umakanan]></td>
			<td><input type=text name=no_pigeon_celeb size=2 value=$pg[uperayaan]></td>
			<td><input type=text name=no_pigeon_bus size=2 value=$pg[ubisnis]></td>						
	   </tr>";
		$anim_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$a_fb=mysql_query($anim_fb);
		$fb=mysql_fetch_array($a_fb); 			  			  			  			  			  						
echo	"<tr>
			<td>Fancy Bird</td>
			<td><input type=text name=no_fb_hobby size=2 value=$fb[uhoby]></td>
			<td><input type=text name=no_fb_food size=2 value=$fb[umakanan]></td>
			<td><input type=text name=no_fb_celeb size=2 value=$fb[uperayaan]></td>
			<td><input type=text name=no_fb_bus size=2 value=$fb[ubisnis]></td>						
	   </tr>";

		$anim_non="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
																  AND `nma_animal`!='Pigeon' 
																  AND `nma_animal`!='Goose'
																  AND `nma_animal`!='Entog/Bebek'
																  AND `nma_animal`!='Itik/Meri'
																  AND `nma_animal`!='Layer/Broiler'
																  AND `nma_animal`!='Bangkok Chicken'
																  AND `nma_animal`!='Pelung Chicken'
																  AND `nma_animal`!='Bantam Chicken'
																  AND `nma_animal`!='Native Chicken'
																  AND `vno_id`=$_GET[id]";

		$a_non=mysql_query($anim_non);
		$n=mysql_num_rows($a_non);
		for ($n = 1; $n <= 5; $n++) {
		   $tmp_id="id".$n;
		   $tmp_nama="non".$n."name";
		   $tmp_hobby="no".$n."hobby";
		   $tmp_food="no".$n."food";
		   $tmp_celeb="no".$n."celeb"; 
		   $tmp_bus="no".$n."bus"; 									
   			if ($non=mysql_fetch_array($a_non) ) {
  echo "<tr>
			<td><input type=text name=$tmp_nama value='$non[nma_animal]'><input type=hidden name=$tmp_id value=$non[id_animal]></td>
			<td><input type=text name=$tmp_hobby size=2 value=$non[uhoby]></td>
			<td><input type=text name=$tmp_food size=2 value=$non[umakanan]></td>
			<td><input type=text name=$tmp_celeb size=2 value=$non[uperayaan]></td>
			<td><input type=text name=$tmp_bus size=2 value=$non[ubisnis]></td> 
		   </tr> "; 
		   }
		   else 
	      {
echo"<tr>
		<td><input type=text name=$tmp_nama value=''><input type=hidden name=$tmp_id value=''></td>
		<td><input type=text name=$tmp_hobby size=2 value=''></td>
		<td><input type=text name=$tmp_food size=2 value=''></td>
		<td><input type=text name=$tmp_celeb size=2 value=''></td>
		<td><input type=text name=$tmp_bus size=2 value=''></td> 
		</tr> ";    
   		}
//		  $iCounter++;}
		  }
echo "</table></td></tr>";	  
/*$test="_"; 
$temp=""; 
$temp="shy".$test."ani";
echo $temp;*/
echo
	   "<tr>
  	    <td rowspan=2 size=10>1.7</td>	
		<td colspan=2>What is the number of poultry bought from :</td>
	   </tr>
	   <tr><td colspan=2>		 
           <table>
           <tr>
            <th>Animal</th>
            <th>From</th>
            <th>Location</th>
            <th>Detail</th>
            <th>Qty</th>
          </tr>";
		$buy_nc="SELECT * FROM `t_animal` WHERE `nma_animal`='Native Chicken' AND `vno_id`=$_GET[id]";
		$b_nc=mysql_query($buy_nc);
		$nc=mysql_fetch_array($b_nc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Native Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_brp value=$nc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_nc_rw value='$nc[sma_desa]'></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_nc value='$nc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_nc_desa value=$nc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_nc value='$nc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_nc_kec value=$nc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_nc value='$nc[other2]'></td>
			<td><input type=text size=3 name=jml_nc_kab value=$nc[other1]></td>			
			</tr>";
		$buy_bc="SELECT * FROM `t_animal` WHERE `nma_animal`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$b_bc=mysql_query($buy_bc);
		$bc=mysql_fetch_array($b_bc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bantam Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_bc_brp value=$bc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_bc_rw value=$bc[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_bc value='$bc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_bc_desa value=$bc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_bc value='$bc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_bc_kec value=$bc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_bc value='$bc[other2]'></td>
			<td><input type=text size=3 name=jml_bc_kab value=$bc[other1]></td>			
			</tr>";
		$buy_pc="SELECT * FROM `t_animal` WHERE `nma_animal`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$b_pc=mysql_query($buy_pc);
		$pc=mysql_fetch_array($b_pc); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Pelung Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_pc_brp value=$pc[sma_desarw]></td>
			<td><input type=text size=3 name=jml_pc_rw value=$pc[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_pc value='$pc[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_pc_desa value=$pc[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_pc value='$pc[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_pc_kec value=$pc[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_pc value='$pc[other2]'></td>
			<td><input type=text size=3 name=jml_pc_kab value=$pc[other1]></td>			
			</tr>";
		$buy_bk="SELECT * FROM `t_animal` WHERE `nma_animal`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$b_bk=mysql_query($buy_bk);
		$bk=mysql_fetch_array($b_bk); 			  			  			  			  			  							  
echo" <tr>
            <td rowspan=4>Bangkok Chicken</td>
            <td><input type=text name=sma_desa value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw value=RW disabled></td>
			<td><input type=text size=4 name=rw_bkc value=$bk[sma_desarw]></td>
			<td><input type=text size=3 name=jml_bkc_rw value=$bk[sma_desa]></td>
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa size=32 value='Other village in the same sub-district' disabled></td>
			<td><input type=text size=4 name=desa value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_bkc value='$bk[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_bkc_desa value=$bk[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_bkc value='$bk[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_bkc_kec value=$bk[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_bkc value='$bk[other2]'></td>
			<td><input type=text size=3 name=jml_bkc_kab value=$bk[other1]></td>			
			</tr>";				
		$buy_lb="SELECT * FROM `t_animal` WHERE `nma_animal`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$b_lb=mysql_query($buy_lb);
		$lb=mysql_fetch_array($b_lb); 			  			  			  			  			  							  			
echo"  <tr>
            <td rowspan=4>Layer/Broiler</td>
            <td><input type=text name=sma_desa_layer value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_layer value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_layer value=$lb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_lay_rw value=$lb[sma_desa]></td>			
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_layer size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_layer value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_layer value='$lb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_lay_desa value=$lb[bda_desa]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_layer size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_layer value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_layer value='$lb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_lay_kec value=$lb[bda_kec]></td>			
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_layer size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_layer value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_layer value='$lb[other2]'></td>
			<td><input type=text size=3 name=jml_lay_kab value=$lb[other1]></td>			
			</tr>";
		$buy_im="SELECT * FROM `t_animal` WHERE `nma_animal`='Itik/Meri' AND `vno_id`=$_GET[id]";
		$b_im=mysql_query($buy_im);
		$im=mysql_fetch_array($b_im); 			  			  			  			  			  							  			
echo "			
          <tr>
            <td rowspan=4>Itik/Meri</td>
            <td><input type=text name=sma_desa_itik value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_itik value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_itik value=$im[sma_desarw]></td>
			<td><input type=text size=3 name=jml_itik_rw value=$im[sma_desa]></td>		
		  </tr>
		    <tr>
            <td><input type=text name=bda_desa_itik size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=desa_itik value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_itik value='$im[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_itik_desa value=$im[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_itik size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_itik value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_itik value='$im[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_itik_kec value=$im[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_itik size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_itik value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_itik value='$im[other2]'></td>
			<td><input type=text size=3 name=jml_itik_kab value=$im[other1]></td>					
			</tr>
          <tr>";
		$buy_eb="SELECT * FROM `t_animal` WHERE `nma_animal`='Entog/Bebek' AND `vno_id`=$_GET[id]";
		$b_eb=mysql_query($buy_eb);
		$eb=mysql_fetch_array($b_eb); 			  			  			  			  			  							  					  
echo       "<td rowspan=4>Entog/Bebek</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_eb value=$eb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_eb_rw value=$eb[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_eb value='$eb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_eb_desa value=$eb[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_eb value='$eb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_eb_kec value=$eb[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_eb value='$eb[other2]'></td>
			<td><input type=text size=3 name=jml_eb_kab value=$eb[other1]></td>					
		  </tr>";
		  
		$buy_gs="SELECT * FROM `t_animal` WHERE `nma_animal`='Goose' AND `vno_id`=$_GET[id]";
		$b_gs=mysql_query($buy_gs);
		$gs=mysql_fetch_array($b_gs); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Goose</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_gs value=$gs[sma_desarw]></td>
			<td><input type=text size=3 name=jml_gs_rw value=$gs[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_gs value='$gs[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_gs_desa value=$gs[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_gs value='$gs[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_gs_kec value=$gs[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_gs value='$gs[other2]'></td>
			<td><input type=text size=3 name=jml_gs_kab value=$gs[other1]></td>					
		  </tr>";
		  
		$buy_pg="SELECT * FROM `t_animal` WHERE `nma_animal`='Pigeon' AND `vno_id`=$_GET[id]";
		$b_pg=mysql_query($buy_pg);
		$pg=mysql_fetch_array($b_pg); 			  			  			  			  			  							  					  
echo      "<tr>
			<td rowspan=4>Pigeon</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_pg value=$pg[sma_desarw]></td>
			<td><input type=text size=3 name=jml_pg_rw value=$pg[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_pg value='$pg[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_pg_desa value=$pg[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_pg value='$pg[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_pg_kec value=$pg[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_pg value='$pg[other2]'></td>
			<td><input type=text size=3 name=jml_pg_kab value=$pg[other1]></td>					
		  </tr>";
		$buy_fb="SELECT * FROM `t_animal` WHERE `nma_animal`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$b_fb=mysql_query($buy_fb);
		$fb=mysql_fetch_array($b_fb); 			  			  			  			  			  							  					  
echo       "<tr>
			<td rowspan=4>Fancy Bird</td>
            <td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
			<td><input type=text size=4 name=rw_entog value=RW disabled></td>
			<td><input type=text size=4 name=no_rw_fb value=$fb[sma_desarw]></td>
			<td><input type=text size=3 name=jml_fb_rw value=$fb[sma_desa]></td>					
		  </tr>
		    <tr>
            <td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
			</td>
			<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
			<td><input type=text size=20 name=nma_desa_fb value='$fb[bda_desadesa]'></td>
			<td><input type=text size=3 name=jml_fb_desa value=$fb[bda_desa]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
			<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
			<td><input type=text size=20 name=nma_kec_fb value='$fb[bda_keckec]'></td>
			<td><input type=text size=3 name=jml_fb_kec value=$fb[bda_kec]></td>					
			</tr>
		    <tr>
            <td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
			<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
			<td><input type=text size=20 name=nma_kab_fb value='$fb[other2]'></td>
			<td><input type=text size=3 name=jml_fb_kab value=$fb[other1]></td>					
		  </tr>";
		  
		$anim_non2="SELECT * FROM `t_animal` WHERE `nma_animal`!='Fancy Bird' 
											 AND `nma_animal`!='Pigeon' 
											 AND `nma_animal`!='Goose'
											 AND `nma_animal`!='Entog/Bebek'
											 AND `nma_animal`!='Itik/Meri'
											 AND `nma_animal`!='Layer/Broiler'
											 AND `nma_animal`!='Bangkok Chicken'
											 AND `nma_animal`!='Pelung Chicken'
											 AND `nma_animal`!='Bantam Chicken'
											 AND `nma_animal`!='Native Chicken'
											 AND `vno_id`=$_GET[id]";
											 
		$a_non2=mysql_query($anim_non2);
		$o=mysql_num_rows($a_non2);
		for ($o = 1; $o <= 5; $o++) {
			$tmp_id="idasal".$o;
			$tmp_nama="nama_bntg".$o;
			$tmp_rw="rw".$o;
			$jml_rw="jml_rw".$o;
			$tmp_desa="desa".$o;
			$jml_desa="jml_desa".$o;				
		 	$tmp_kec="kec".$o;						
			$jml_kec="jml_kec".$o;
			$tmp_kab="kab".$o;
			$jml_kab="jml_kab".$o;		
					
   			if ($non2=mysql_fetch_array($a_non2) ) {

	echo       "<tr>
				<td rowspan=4>
						<input type=text name=$tmp_nama value='$non2[nma_animal]' size=8><input type=hidden name=$tmp_id value=$non2[id_animal]>
				</td>
				<td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
				<td><input type=text size=4 name=rw_entog value=RW disabled></td>
				<td><input type=text size=4 name=$tmp_rw value=$non2[sma_desarw]></td>
				<td><input type=text size=3 name=$jml_rw value=$non2[sma_desa]></td>					
			  </tr>
				<tr>
				<td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
				</td>
				<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
				<td><input type=text size=20 name=$tmp_desa value='$non2[bda_desadesa]'></td>
				<td><input type=text size=3 name=$jml_desa value=$non2[bda_desa]></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
				<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
				<td><input type=text size=20 name=$tmp_kec value='$non2[bda_keckec]'></td>
				<td><input type=text size=3 name=$jml_kec value=$non2[bda_kec]></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
				<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
				<td><input type=text size=20 name=$tmp_kab value='$non2[other2]'></td>
				<td><input type=text size=3 name=$jml_kab value=$non2[other1]></td>					
			  </tr>";
			}
			else {
	echo       "<tr>
				<td rowspan=4>
						<input type=text name=$tmp_nama value='' size=8><input type=hidden name=$tmp_id value=''>
				</td>
				<td><input type=text name=sma_desa_entog value='Same Village' disabled></td>
				<td><input type=text size=4 name=rw_entog value=RW disabled></td>
				<td><input type=text size=4 name=$tmp_rw value=''></td>
				<td><input type=text size=3 name=$jml_rw value=''></td>					
			  </tr>
				<tr>
				<td><input type=text name=sma_desa_entog size=32 value='Other village in the same sub-district' disabled>
				</td>
				<td><input type=text size=4 name=rw_entog value=Desa disabled></td>
				<td><input type=text size=20 name=$tmp_desa value=''></td>
				<td><input type=text size=3 name=$jml_desa value=''></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kec_entog size=20 value='Other sub-district' disabled></td>
				<td><input type=text size=10 name=kecamatan_entog value=Kecamatan disabled></td>
				<td><input type=text size=20 name=$tmp_kec value=''></td>
				<td><input type=text size=3 name=$jml_kec value=''></td>					
				</tr>
				<tr>
				<td><input type=text name=sma_kab_bird size=10 value='Other district' disabled></td>
				<td><input type=text size=10 name=kabupaten_bird value=Kabupaten disabled></td>
				<td><input type=text size=20 name=$tmp_kab value=''></td>
				<td><input type=text size=3 name=$jml_kab value=''></td>					
			  </tr>";
			}
      }
		  
echo"	</table></td></tr>
 <tr>
 
 
	    <td colspan=3 align=right>
  		<input type=hidden name=idhh value=$h[id_household]>
		<p><input type=submit value=Update>
			</p></td>
	   </tr>";
echo "</form>";   

// UPDATE tabel Animal Around
echo " <form method=POST action='exe_hsh1.php?module=animal_around&act=edit&id=$_GET[id]'>	
<tr>
  	    <td rowspan=2 size=10>1.8</td>	
	   	<td colspan=2>Number of died animal</td>
 	   </tr>
	   <tr><td colspan=2>	
	   		<table>
			  <tr>
				<th><b>Number of animals</b></th>
				<th align=center><b>Present</b></th>
				<th align=center><b>Sick last year</b></th>
				<th align=center><b>Died last year</b></th>
			  </tr>
			  <tr>";
		$select_ayam="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Native Chicken' AND `vno_id`=$_GET[id]";
		$ayam=mysql_query($select_ayam);
		$a=mysql_fetch_array($ayam);
echo		" 	<td>a. Native Chicken</td>
				<td align=center><input type=text name=chick_present size=6 value=$a[qty_arround]></td>
				<td align=center><input type=text name=chick_sick size=6 value=$a[skit_th_lalu]></td>
				<td align=center><input type=text name=chick_died size=6 value=$a[mati_th_lalu]></td>
			  </tr>";		  
		$select_btm="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bantam Chicken' AND `vno_id`=$_GET[id]";
		$c_btm=mysql_query($select_btm);
		$btm=mysql_fetch_array($c_btm);
echo		" 	<td>b. Bantam Chicken</td>
				<td align=center><input type=text name=btm_present size=6 value=$btm[qty_arround]></td>
				<td align=center><input type=text name=btm_sick size=6 value=$btm[skit_th_lalu]></td>
				<td align=center><input type=text name=btm_died size=6 value=$btm[mati_th_lalu]></td>
			  </tr>";
		$select_plg="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pelung Chicken' AND `vno_id`=$_GET[id]";
		$c_plg=mysql_query($select_plg);
		$plg=mysql_fetch_array($c_plg);
echo		" 	<td>c. Pelung Chicken</td>
				<td align=center><input type=text name=plg_present size=6 value=$plg[qty_arround]></td>
				<td align=center><input type=text name=plg_sick size=6 value=$plg[skit_th_lalu]></td>
				<td align=center><input type=text name=plg_died size=6 value=$plg[mati_th_lalu]></td>
			  </tr>";
		$select_bkk="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Bangkok Chicken' AND `vno_id`=$_GET[id]";
		$c_bkk=mysql_query($select_bkk);
		$bkk=mysql_fetch_array($c_bkk);
echo		" 	<td>d. Bangkok Chicken</td>
				<td align=center><input type=text name=bk_present size=6 value=$bkk[qty_arround]></td>
				<td align=center><input type=text name=bk_sick size=6 value=$bkk[skit_th_lalu]></td>
				<td align=center><input type=text name=bk_died size=6 value=$bkk[mati_th_lalu]></td>
			  </tr>";
			  
		$select_bro="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Layer/Broiler' AND `vno_id`=$_GET[id]";
		$bro=mysql_query($select_bro);
		$b=mysql_fetch_array($bro);  
echo		 "<tr>
			  	<td>e. Layer/Broiler</td>
				<td align=center><input type=text name=layer_present size=6 value=$b[qty_arround]></td>
				<td align=center> <input type=text name=layer_sick size=6 value=$b[skit_th_lalu]></td>
				<td align=center><input type=text name=layer_died size=6 value=$b[mati_th_lalu]></td>
			  </tr>";
		$select_itik="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Itik' AND `vno_id`=$_GET[id]";
		$itik=mysql_query($select_itik);
		$i=mysql_fetch_array($itik);
echo		 "<tr>
			  	<td>f. Itik</td>
				<td align=center><input type=text name=itik_present size=6 value=$i[qty_arround]></td>
				<td align=center><input type=text name=itik_sick size=6 value=$i[skit_th_lalu]></td>
				<td align=center><input type=text name=itik_died size=6 value=$i[mati_th_lalu]></td>
			  </tr>";
		$select_entog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Entog' AND `vno_id`=$_GET[id]";
		$entog=mysql_query($select_entog);
		$e=mysql_fetch_array($entog);			  
echo		 "<tr>
			  	<td>g. Entog</td>
				<td align=center><input type=text name=entog_present size=6 value=$e[qty_arround]></td>
				<td align=center><input type=text name=entog_sick size=6 value=$e[skit_th_lalu]></td>
				<td align=center><input type=text name=entog_died size=6 value=$e[mati_th_lalu]></td>
			  </tr>	";
		$select_goose="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Goose' AND `vno_id`=$_GET[id]";
		$goose=mysql_query($select_goose);
		$g=mysql_fetch_array($goose); 			  			  
echo		" <tr>
			  	<td>h. Goose</td>
				<td align=center><input type=text name=goose_present size=6 value=$g[qty_arround]></td>
				<td align=center><input type=text name=goose_sick size=6 value=$g[skit_th_lalu]></td>
				<td align=center><input type=text name=goose_died size=6 value=$g[mati_th_lalu]></td>
			  </tr>";			  
		$select_pigeon="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Pigeon' AND `vno_id`=$_GET[id]";
		$pigeon=mysql_query($select_pigeon);
		$p=mysql_fetch_array($pigeon); 			  			  			  			  			  
echo		 "<tr>
			  	<td>i. Pigeon</td>
				<td align=center><input type=text name=pigeon_present size=6 value=$p[qty_arround]></td>
				<td align=center><input type=text name=pigeon_sick size=6 value=$p[skit_th_lalu]></td>
				<td align=center><input type=text name=pigeon_died size=6 value=$p[mati_th_lalu]></td>
			  </tr>";		  
		$select_bird="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Fancy Bird' AND `vno_id`=$_GET[id]";
		$bird=mysql_query($select_bird);
		$bd=mysql_fetch_array($bird); 			  
echo		  "<tr>
			  	<td>j. Fancy Bird</td>
				<td align=center><input type=text name=bird_present size=6 value=$bd[qty_arround]></td>
				<td align=center><input type=text name=bird_sick size=6 value=$bd[skit_th_lalu]></td>
				<td align=center><input type=text name=bird_died size=6 value=$bd[mati_th_lalu]></td>
			  </tr>";
		$select_cat="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Cat' AND `vno_id`=$_GET[id]";
		$cat=mysql_query($select_cat);
		$c=mysql_fetch_array($cat); 			  			  			  
echo		 "<tr>
			  	<td>k. Cat</td>
				<td align=center><input type=text name=cat_present size=6 value=$c[qty_arround]></td>
				<td align=center><input type=text name=cat_sick size=6 value=$c[skit_th_lalu]></td>
				<td align=center><input type=text name=cat_died size=6 value=$c[mati_th_lalu]></td>
			  </tr>";
		$select_dog="SELECT * FROM `t_animal_arround` WHERE `nma_arround`='Dog' AND `vno_id`=$_GET[id]";
		$dog=mysql_query($select_dog);
		$d=mysql_fetch_array($dog); 			  			  			  			  
echo		 "<tr>
			  	<td>l. Dog</td>
				<td align=center><input type=text name=dog_present size=6 value=$d[qty_arround]></td>
				<td align=center><input type=text name=dog_sick size=6 value=$d[skit_th_lalu]></td>
				<td align=center><input type=text name=dog_died size=6 value=$d[mati_th_lalu]></td>
			  </tr>";
			  
		$arr_non="SELECT * FROM `t_animal_arround` WHERE `nma_arround`!='Fancy Bird' 
																  AND `nma_arround`!='Pigeon' 
																  AND `nma_arround`!='Goose'
																  AND `nma_arround`!='Entog'
																  AND `nma_arround`!='Itik'
																  AND `nma_arround`!='Layer/Broiler'
																  AND `nma_arround`!='Bangkok Chicken'
																  AND `nma_arround`!='Pelung Chicken'
																  AND `nma_arround`!='Bantam Chicken'
																  AND `nma_arround`!='Native Chicken'
																  AND `nma_arround`!='Cat'
																  AND `nma_arround`!='Dog'																  
																  AND `vno_id`=$_GET[id]";

		$ar_non=mysql_query($arr_non);
		$r=mysql_num_rows($ar_non);
		for ($r=1 ; $r<=5;$r++) {
			$tmp_nama="nma_arr".$r;
			$tmp_idr="idr".$r;
			$tmp_qty="qty".$r;
			$tmp_skt="skt".$r;
			$tmp_mati="mati".$r;				
			if ($rnon=mysql_fetch_array($ar_non) ) {
echo		 "<tr>
			  	<td><input type=text name=$tmp_nama value='$rnon[nma_arround]'><input type=hidden name=$tmp_idr value=$rnon[id_anarr]></td>
				<td align=center><input type=text name=$tmp_qty size=6 value=$rnon[qty_arround]></td>
				<td align=center><input type=text name=$tmp_skt size=6 value=$rnon[skit_th_lalu]></td>
				<td align=center><input type=text name=$tmp_mati size=6 value=$rnon[mati_th_lalu]></td>
			  </tr>";
			}
			else {
echo		 "<tr>
			  	<td><input type=text name=$tmp_nama value=''><input type=hidden name=$tmp_idr value=''></td>
				<td align=center><input type=text name=$tmp_qty size=6></td>
				<td align=center><input type=text name=$tmp_skt size=6></td>
				<td align=center><input type=text name=$tmp_mati size=6></td>
			  </tr>";
			}
		}
echo"</table>

	   </td></tr>";  	   	   
		$sqlradio_unggas="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]";
		$radio_unggas=mysql_query($sqlradio_unggas);
echo"  <tr>
  	    <td size=10>1.9</td>	  
	   	<td>Were there any sick or died poultry<br>in your RT in last year ?</td>
	   	<td>";
		$ru=mysql_fetch_array($radio_unggas) ;	  			  			  			  			  			  
			if ($ru[unggas_skt_mati]=='Yes') {
echo	"	<input type=radio name=diedRT value='Yes' checked>Yes
			<input type=radio name=diedRT value='No'>No
			<input type=radio name=diedRT value='Not Sure'>Not Sure"; }
		   if ( $ru[unggas_skt_mati]=='No') {
echo	"	<input type=radio name=diedRT value='Yes'>Yes
			<input type=radio name=diedRT value='No' checked>No
			<input type=radio name=diedRT value='Not Sure'>Not Sure"; }
	       if ( ( $ru[unggas_skt_mati]=='Not Sure') or  ( $ru[unggas_skt_mati]=='') or  ( $ru[unggas_skt_mati]=='Not S') or ( $ru[unggas_skt_mati]=='on') 
		   		or  ( $ru[unggas_skt_mati]=='Not') ){
echo	"<input type=radio name=diedRT value='Yes'>Yes
			<input type=radio name=diedRT value='No'>No
			<input type=radio name=diedRT value='Not Sure' checked>Not Sure"; }	
echo   "</td>
	   </tr>
	   <tr>
 	    <td colspan=3 align=right>
  			 <input type=hidden name=idhh value=$h[id_household]>
			 <p><input type=submit value=Update>
			</p></td>
	   </tr>";
echo "</form>";


// UPDATE tabel House Hold 2
echo " <form method=POST action='exe_hsh1.php?module=household2&act=edit&id=$_GET[id]'>";
	  $sql_vac="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $vac=mysql_query($sql_vac);
	  $vc=mysql_fetch_array($vac);
 
echo	"<tr>
		<td size=2>1.10</td>
		<td colspan=2>What number of chicken have received vaccination?</td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>
		<td>No Vaccination</td>
		<td><input type=text name=jml_novac value=$vc[vaksinasi1]></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>1 dose of vaccine</td>
		<td><input type=text name=jml_1dose value=$vc[vaksinasi2]></td>
	</tr>
	<tr>
		<td size=2>&nbsp;</td>	
		<td>2 or more dose of vaccine</td>
		<td><input type=text name=jml_2dose value=$vc[vaksinasi3]></td>
	   </tr>";
	
	  $sql_geo="SELECT * FROM `t_household` WHERE `kode_house`=$_GET[id]"; 
	  $s_geo=mysql_query($sql_geo);
	  $geo=mysql_fetch_array($s_geo);
echo	"<tr>
		<td size=2>1.11</td>
		<td>Geocoding</td><td>
		<input type=text name=geocoding value=$geo[geocoding]></td>
 	</tr>	
 	<tr><td colspan=3 align=center>
			<b>Valid</b> :";	  			  			  			  			  
			if ($h[valid]=='Yes') {
echo	"	 <input type=radio name=valid value=Yes checked>Yes
			 <input type=radio name=valid value=No>No"; }
			if ($h[valid]=='No') {
echo	"	 <input type=radio name=valid value=Yes>Yes
			 <input type=radio name=valid value=No checked>No"; }
			if ($h[valid]=='') {
echo	"	 <input type=radio name=valid value=Yes>Yes
			 <input type=radio name=valid value=No>No"; }
echo	"	</td></tr><tr><td colspan=3 align=right>";	  			 
echo    "	<input type=submit value=Update>
			<input type=hidden name=idhh value=$h[id_household]>
			</td>
	</tr>				
	</table></form>";	
}

?>