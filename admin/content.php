<?php
include "../config/conn.php";
include "../config/library.php";
include("../config/fungsi_indotgl.php");
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
//include "../config/fungsi_translate.php";


// Bagian Home
if ($_GET["module"]=='home'){
	$ses_u=$_SESSION["namauser"]; ?>
	
	<h2>Welcome</h2>
    <p>Hai <b><?php echo $ses_u; ?></b>, 
	Please click the menu in the left side to manage your website's content. 
	If you just have <font color='red'>home</font> menu, its mean your account hasn't activated yet by Admin or you're not qualified user. </p>
	<p>Click <a href=../index.php>Here</a> to view the website.</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<?php  
}
/*<script src='http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/translatemypage.xml&up_source_language=en&w=160&h=60&title=&border=&output=js'></script>*/

// Bagian Profil Lembaga
elseif ($_GET[module]=='about'){
  $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='7'");
  $r    = mysql_fetch_array($sql);
  echo "<h2>Profil Lembaga</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=about&act=update>
        <input type=hidden name=id value=$r[id_modul]>
        <table>
        <tr><td><img src='foto_berita/$r[image]'></td></tr>
        <tr><td>Change Image : <input type=file name=fupload size=30></td></tr>
        <tr><td><textarea name=isi cols=94 rows=30>$r[static_content]</textarea></td></tr>
        <tr><td><input type=submit value=Update></td></tr>
        </form></table>";
}


// Bagian User
elseif ($_GET[module]=='user'){
  echo "<h2>User</h2>
        <form method=POST action='?act=tambahuser'>
        <input type=submit value='Tambah User'>
        </form>
        <table>
        <tr><th>no</th><th>username</th><th>full name</th>
        <th>email</th><th>level</th><th>action</th></th></tr>";
  $tampil=mysql_query("SELECT * FROM user ORDER BY id");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
     echo "<tr><td>$no</td>
          <td>$r[name]</td>
          <td>$r[full_name]</td>
	      <td><a href=mailto:$r[email]>$r[email]</a></td>
		  <td>$r[level]</td>
          <td><a href=?act=edituser&id=$r[id_user]>Edit</a> | 
	            <a href=aksi.php?module=user&act=hapus&id=$r[id_user]>Delete</a>
          </td></tr>";
     $no++;
  }
  echo "</table>";
}

// Form tambah user
elseif ($_GET[act]=='tambahuser'){
  echo "<h2>Tambah User</h2>
        <form method=POST action='aksi.php?module=user&act=input'>
        <table>  
        <tr><td class=isi>Username</td> <td> : <input type=text name=name size=35></td></tr>
        <tr><td class=isi>Password</td><td>: <input type=password name=password size=35></td></tr>
        <tr><td class=isi>Full Name</td><td>  : <input type=text name=fullname size=35></td></tr>
        <tr><td class=isi>E-mail</td><td> : <input type=text name=email size=35></td></tr>
        <tr><td><input type=submit value=Submit></td><td><input type=reset onClick=javascript:history.back() value='Cancel' name='Reset'/></td></tr></table>
        </td></tr></form>";
        
}

// Form edit user
elseif ($_GET[act]=='edituser'){
  $edit=mysql_query("SELECT * FROM user WHERE id_user='$_GET[id]'");
  $r=mysql_fetch_array($edit);

  echo "<h2>Edit User</h2>
        <form method=POST action=aksi.php?module=user&act=update>
        <input type=hidden name=id value='$r[id_user]'>
        <table>
        <tr><td>Username</td>     <td> : <input type=text name=name value='$r[name]'></td></tr>
        <tr><td>Password</td>     <td> : <input type=text name=password> *) </td></tr>
        <tr><td>Full Name</td> <td> : <input type=text name=fullname size=30  value='$r[full_name]'></td></tr>
        <tr><td>E-mail</td>       <td> : <input type=text name=email size=30 value='$r[email]'></td></tr>
        <tr><td>Level</td>     <td> : <input type=text name=level value='$r[level]'></td></tr>
        <tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}


// Bagian Modul
elseif ($_GET[module]=='modul'){
  echo "<h2>Modul</h2>
        <form method=POST action='?act=tambahmodul'>
        <input type=submit value='Tambah Modul'>
        </form>
        <table>
        <tr><th>no</th><th>nama modul</th><th>link</th>
        <th>publish</th><th>aktif</th><th>status</th><th>aksi</th></th></tr>";
  $tampil=mysql_query("SELECT * FROM modul ORDER BY display");
  while ($r=mysql_fetch_array($tampil)){
    echo "<tr><td>$r[display]</td>
          <td>$r[modul_name]</td>
          <td><a href=$r[link]>$r[link]</a></td>
          <td align=center>$r[publish]</td>
          <td align=center>$r[active]</td>
          <td align=center>$r[status]</td>
          <td><a href=?act=editmodul&id=$r[id_modul]>Edit</a> | 
	            <a href=aksi.php?module=modul&act=hapus&id=$r[id_modul]>Hapus</a>
          </td></tr>";
  }
  echo "</table>";
}

// Form Tambah Modul
elseif ($_GET[act]=='tambahmodul'){
  echo "<h2>Tambah Modul</h2>
        <form method=POST action='aksi.php?module=modul&act=input'>
        <table>
        <tr><td>Module name</td> <td> : <input type=text name=nama_modul></td></tr>
        <tr><td>Link</td>       <td> : <input type=text name=link size=30></td></tr>
        <tr><td>Publish</td>    <td> : <input type=radio name=publish value='Y' checked>Y 
                                       <input type=radio name=publish value='N'>N  </td></tr>
        <tr><td>Active</td>      <td> : <input type=radio name=aktif value='Y' checked>Y 
                                       <input type=radio name=aktif value='N'>N  </td></tr>
        <tr><td>Status</td>     <td> : <input type=radio name=status value='user' checked>user 
                                       <input type=radio name=status value='admin'>admin  </td></tr>
        <tr><td>Display</td>     <td> : <input type=text name=urutan size=1></td></tr>
        <tr><td colspan=2><input type=submit value=Save name=simpanmodul>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Modul
elseif ($_GET[act]=='editmodul'){
  $edit = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Module</h2>
        <form method=POST action=aksi.php?module=modul&act=update>
        <input type=hidden name=id value='$r[id_modul]'>
        <table>
        <tr><td>Module Name</td>     <td> : <input type=text name=nama_modul value='$r[modul_name]'></td></tr>
        <tr><td>Link</td>     <td> : <input type=text name=link size=30 value='$r[link]'></td></tr>";
  if ($r[publish]=='Y'){
    echo "<tr><td>Publish</td> <td> : <input type=radio name=publish value=Y checked>Y  
          <input type=radio name=publish value=N> N</td></tr>";
  }
  else{
    echo "<tr><td>Publish</td> <td> : <input type=radio name=publish value=Y>Y  
          <input type=radio name=publish value=N checked>N</td></tr>";
  }
  if ($r[active]=='Y'){
    echo "<tr><td>Active</td> <td> : <input type=radio name=aktif value=Y checked>Y  
          <input type=radio name=aktif value=N> N</td></tr>";
  }
  else{
    echo "<tr><td>Active</td> <td> : <input type=radio name=aktif value=Y>Y  
          <input type=radio name=aktif value=N checked>N</td></tr>";
  }
  if ($r[status]=='user'){
    echo "<tr><td>Status</td> <td> : <input type=radio name=status value=user checked>user  
          <input type=radio name=status value=admin> admin</td></tr>";
  }
  else{
    echo "<tr><td>Status</td> <td> : <input type=radio name=status value=user>user  
          <input type=radio name=status value=admin checked>admin</td></tr>";
  }
  echo "<tr><td>Display</td>       <td> : <input type=text name=urutan size=1 value='$r[display]'></td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}


// Bagian Schedule
elseif ($_GET[module]==schedule){
  echo "<h2>Schedule</h2>
        <form method=POST action='?act=tambahagenda'>
        <input type=submit value='Add Schedule'>
        </form>
        <table>
        <tr><th>no</th><th>title</th><th>pic</th><th>start date</th><th>finish date</th><th>action</th></th></tr>";
  if ($_SESSION[leveluser]=='admin'){
    $tampil=mysql_query("SELECT * FROM schedule ORDER BY start_date DESC");
  }
  else{
    $tampil=mysql_query("SELECT * FROM schedule 
                         WHERE username='$_SESSION[namauser]'       
                         ORDER BY id_schedule DESC");
  }
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl_mulai=tgl_indo($r[tgl_mulai]);
    $tgl_selesai=tgl_indo($r[tgl_selesai]);
    echo "<tr><td>$no</td>
              <td>$r[topic]</td>
              <td>$r[pic]</td>			  
              <td>$r[start_date]</td>
              <td>$r[finish_date]</td>
              <td><a href=?act=editagenda&id=$r[id_schedule]>Edit</a> | 
	                <a href=aksi.php?module=schedule&act=hapus&id=$r[id_schedule]>Delete</a>
		      </tr>";
  $no++;
  }
  echo "</table>";
}

// Form Tambah Schedule
elseif ($_GET[act]=='tambahagenda'){
  echo "<h2>Add Schedule</h2>
        <form method=POST action='aksi.php?module=schedule&act=input'>
        <table>
        <tr><td>Title</td>      <td> : <input type=text name=tema size=50></td></tr>
        <tr><td>PIC (Person In Charge)</td>      <td> : <input type=text name=pic size=30></td></tr>		
        <tr><td>Content</td><td valign=top> : <textarea name=isi_agenda cols=60 rows=10></textarea></td></tr>
        <tr><td>Location</td>    <td> : <input type=text name=tempat size=40></td></tr>

        <tr><td>start_date</td><td> : ";        
        combotgl(1,31,'tgl_mulai',Date);
        combobln(1,12,'bln_mulai',Month);
        combotgl($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',Year);
      
  echo "<tr><td>finish_date</td><td> : ";
        combotgl(1,31,'tgl_selesai',Date);
        combobln(1,12,'bln_selesai',Month);
        combotgl($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',Year);

  echo "</td></tr>
        <tr><td colspan=2><input type=submit value=Save>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Agenda
elseif ($_GET[act]=='editagenda'){
  $edit = mysql_query("SELECT * FROM schedule WHERE id_schedule='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Agenda</h2>
        <form method=POST action=aksi.php?module=schedule&act=update>
        <input type=hidden name=id value=$r[id_schedule]>
        <table>
        <tr><td>Topic</td>      <td> : <input type=text name=tema size=50 value='$r[topic]'></td></tr>
        <tr><td>PIC (Person In Charge)</td>      <td> : <input type=text name=pic size=30></td></tr>				
        <tr><td>Content</td><td> : <textarea name=isi_agenda cols=60 rows=10>$r[content_sched]</textarea></td></tr>
        <tr><td>Location</td>    <td> : <input type=text name=tempat size=40 value='$r[location]'></td></tr>

        <tr><td>Start Date</td><td> : ";    
        $get_tgl=substr("$r[start_date]",8,2);
        combotgl2(1,31,'tgl_mulai',$get_tgl);
        $get_bln=substr("$r[start_date]",5,2);
        combobln2(1,12,'bln_mulai',$get_bln);
        $get_thn=substr("$r[start_date]",0,4);
        $thn_skrg=date("Y");
        combotgl2($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);

  echo "</td></tr>
        <tr><td>Finish Date</td><td> : ";    
        $get_tgl2=substr("$r[finish_date]",8,2);
        combotgl2(1,31,'tgl_selesai',$get_tgl2);
        $get_bln2=substr("$r[finish_date]",5,2);
        combobln2(1,12,'bln_selesai',$get_bln2);
        $get_thn2=substr("$r[finish_date]",0,4);
        combotgl2($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);

  echo "</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}



// Bagian Berita
elseif ($_GET[module]=='news'){
  echo "<h2>News</h2>
        <form method=POST action=?act=tambahberita>
        <input type=submit value='Add News'>
        </form>
        <table>
        <tr><th>no</th><th>title</th><th>post date</th><th>action</th></th></tr>";

  $p      = new Paging;
  $batas  = 9;
  $posisi = $p->cariPosisi($batas);
//  echo $posisi;	
  $tampil = mysql_query("SELECT * FROM news ORDER BY id_news DESC limit $posisi,$batas");
  
  $no     = $posisi+1;
  while($r=mysql_fetch_array($tampil)){
    $tgl_posting=tgl_indo($r[date_post]);
    echo "<tr><td>$no</td>
              <td>$r[title]</td>
              <td>$tgl_posting</td>
		      <td><a href=?act=editberita&id=$r[id_news]>Edit</a> | 
		      <a href=aksi.php?module=news&act=hapus&id=$r[id_news]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  
  $jmldata      = mysql_num_rows(mysql_query("SELECT * FROM news"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "<p>$linkHalaman</p>";
}

// Form Tambah Berita
elseif ($_GET[act]=='tambahberita'){
  echo "<h2>Add News</h2>
        <form method=POST action='aksi.php?module=news&act=input' enctype='multipart/form-data'>
        <table>
        <tr><td>Title</td>     <td> : <input type=text name=judul size=60></td></tr>
        <tr><td>Category</td>  <td> : 
        <select name=kategori>
        <option value=0 selected>- Select Category -</option>";
  $tampil=mysql_query("SELECT * FROM category ORDER BY category_name");
  while($r=mysql_fetch_array($tampil)){
    echo "<option value=$r[id_category]>$r[category_name]</option>";
  }
  echo "</select></td></tr>
        <tr><td>Content News</td><td> : <textarea name=isi_berita cols=80 rows=18></textarea></td></tr>
        <tr><td>Image</td>    <td> : <input type=file name=fupload size=40></td></tr>
        <tr><td colspan=2><input type=submit value=Save>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Berita
elseif ($_GET[act]=='editberita'){
  $edit = mysql_query("SELECT * FROM news WHERE id_news='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit News</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=news&act=update>
        <input type=hidden name=id value=$r[id_news]>
        <table>
        <tr><td>Title</td>     <td> : <input type=text name=judul size=40 value='$r[title]'></td></tr>
        <tr><td>Category</td>  <td> : <select name=kategori>";
 
  $tampil=mysql_query("SELECT * FROM category ORDER BY category_name");
  while($w=mysql_fetch_array($tampil)){
    if ($r[id_category]==$w[id_category]){
      echo "<option value=$w[id_category] selected>$w[category_name]</option>";
    }
    else{
      echo "<option value=$w[id_category]>$w[category_name]</option>";
    }
  }
  echo "</select></td></tr>
        <tr><td>Content</td><td> : <textarea name=isi_berita cols=60 rows=15>$r[content_news]</textarea></td></tr>";
		if ($r[image] == '' ) {
			echo"<tr><td>Image</td><td>[no image available]</td></tr>";
		}
		else {	
echo"<tr><td>Image</td><td> : <img src=foto_berita/$r[image]></td></tr>";}
echo"<tr><td>Change Image</td>    <td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
                          <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//========================================================study=================================================
// Bagian Study
elseif ($_GET[module]=='study'){
  echo "<h2>Study</h2>
        <form method=POST action=?act=addstudy>
        <input type=submit value='Add Study'>
        </form>
        <table>
        <tr><th>no</th><th>title</th><th>post date</th><th>action</th></th></tr>";

  $p      = new Paging;
  $batas  = 9;
  $posisi = $p->cariPosisi($batas);
//  echo $posisi;	
  $tampil = mysql_query("SELECT * FROM study ORDER BY id_study DESC limit $posisi,$batas");
  
  $no     = $posisi+1;
  while($r=mysql_fetch_array($tampil)){
    $tgl_posting=tgl_indo($r[date_post]);
    echo "<tr><td>$no</td>
              <td>$r[title_study]</td>
              <td>$tgl_posting</td>
		      <td><a href=?act=editstudy&id=$r[id_study]>Edit</a> | 
		      <a href=aksi.php?module=study&act=hapus&id=$r[id_study]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  
  $jmldata      = mysql_num_rows(mysql_query("SELECT * FROM study"));
  $jmlhalaman   = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman  = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "<p>$linkHalaman</p>";
}

// Form Tambah Study
elseif ($_GET[act]=='addstudy'){
  echo "<h2>Add Study</h2>
        <form method=POST action='aksi.php?module=study&act=input' enctype='multipart/form-data'>
        <table>
        <tr><td>Title</td>     <td> : <input type=text name=judul size=60></td></tr>
        <tr><td>Content Study</td><td> : <textarea name=isi_berita cols=80 rows=18></textarea></td></tr>
        <tr><td>Image</td>    <td> : <input type=file name=fupload size=40></td></tr>
        <tr><td colspan=2><input type=submit value=Save>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Study
elseif ($_GET[act]=='editstudy'){
  $edit = mysql_query("SELECT * FROM study WHERE id_study='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Study</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=study&act=update>
        <input type=hidden name=id value=$r[id_study]>
        <table>
        <tr><td>Title</td>     <td> : <input type=text name=judul size=40 value='$r[title_study]'></td></tr>
        <tr><td>Content</td><td> : <textarea name=isi_berita cols=60 rows=15>$r[content_study]</textarea></td></tr>
        <tr><td>Image</td><td> : <img src='foto_berita/$r[image]'></td></tr>
        <tr><td>Change Image</td>    <td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
                          <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}
//==================================================PENGUMUMAN================================================

// Bagian Pengumuman
elseif ($_GET[module]=='pengumuman'){
  echo "<h2>Agenda</h2>
        <form method=POST action='?act=tambahpengumuman'>
        <input type=submit value='Tambah Pengumuman'>
        </form>
        <table>
        <tr><th>no</th><th>judul</th><th>tanggal</th><th>aksi</th></th></tr>";
  if ($_SESSION[namauser]=='admin'){
    $tampil=mysql_query("SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
  }
  else{
    $tampil=mysql_query("SELECT * FROM pengumuman 
                         WHERE username='$_SESSION[namauser]'       
                         ORDER BY id_pengumuman DESC");
  }
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tanggal=tgl_indo($r[tanggal]);
    echo "<tr><td>$no</td>
              <td>$r[judul]</td>
              <td>$tanggal</td>
              <td><a href=?act=editpengumuman&id=$r[id_pengumuman]>Edit</a> | 
	                <a href=aksi.php?module=pengumuman&act=hapus&id=$r[id_pengumuman]>Hapus</a>
		      </tr>";
  $no++;
  }
  echo "</table>";
}

// Form Tambah Pengumuman
elseif ($_GET[act]=='tambahpengumuman'){
  echo "<h2>Tambah Pengumuman</h2>
        <form method=POST action='aksi.php?module=pengumuman&act=input'>
        <table>
        <tr><td>Judul</td>         <td> : <input type=text name=judul size=60></td></tr>
        <tr><td>Isi Pengumuman</td><td> : <textarea name=isi_pengumuman cols=80 rows=10></textarea></td></tr>
        <tr><td>Tanggal</td><td> : ";        
        combotgl(1,31,'tgl',Tgl);
        combobln(1,12,'bln',Bulan);
        combotgl($thn_sekarang-2,$thn_sekarang+2,'thn',Tahun);
      
  echo "</td></tr>
        <tr><td colspan=2><input type=submit value=Simpan>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Pengumuman
elseif ($_GET[act]=='editpengumuman'){
  $edit = mysql_query("SELECT * FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Pengumuman</h2>
        <form method=POST action=aksi.php?module=pengumuman&act=update>
        <input type=hidden name=id value=$r[id_pengumuman]>
        <table>
        <tr><td>Judul</td>         <td> : <input type=text name=judul size=60 value='$r[judul]'></td></tr>
        <tr><td>Isi Pengumuman</td><td> : <textarea name=isi_pengumuman cols=80 rows=10>$r[isi]</textarea></td></tr>
        <tr><td>Tanggal</td><td> : ";    
        $get_tgl=substr("$r[tanggal]",8,2);
        combotgl2(1,31,'tgl',$get_tgl);
        $get_bln=substr("$r[tanggal]",5,2);
        combobln2(1,12,'bln',$get_bln);
        $get_thn=substr("$r[tanggal]",0,4);
        $thn_skrg=date("Y");
        combotgl2($thn_sekarang-2,$thn_sekarang+2,'thn',$get_thn);

  echo "</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//===================================================GALLERY================================================
// Bagian gallery
elseif ($_GET[module]=='gallery'){
  echo "<h2>Gallery</h2>
        <form method=POST action='?act=addgallery'>
        <input type=submit value='Add Gallery'>
        </form>
        <table>
        <tr><th>no</th><th>name</th><th>image</th><th>posting date</th><th>action</th></th></tr>";
  $tampil=mysql_query("SELECT * FROM gallery ORDER BY id_gallery DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[posting_date]);
    echo "<tr><td>$no</td>
              <td>$r[gallery_name]</td>
              <td><img src='gallery/$r[image]' width=150 height=120></a></td>
              <td>$tgl</td>
              <td><a href=?act=editgallery&id=$r[id_gallery]>Edit</a> | 
	                <a href=aksi.php?module=gallery&act=hapus&id=$r[id_gallery]>Delete</a>
		      </tr>";
    $no++;
  }
  echo "</table>";
}


// Form Tambah Gallery
elseif ($_GET[act]=='addgallery'){
  echo "<h2>Add Gallery</h2>
        <form method=POST action='aksi.php?module=gallery&act=input' enctype='multipart/form-data'>
        <table>
        <tr><td>Name</td><td>  : <input type=text name=judul size=30></td></tr>
        <tr><td>Image</td><td> : <input type=file name=fupload size=40></td></tr>
        <tr><td>Description</td><td> : <input type=text name=desc size=50></td></tr>
        <tr><td colspan=2><input type=submit value=Save>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit gallery
elseif ($_GET[act]=='editgallery'){
  $edit = mysql_query("SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Gallery</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=gallery&act=update>
        <input type=hidden name=id value=$r[id_gallery]>
        <table>
        <tr><td>Name</td><td>     : <input type=text name=judul size=30 value='$r[gallery_name]'></td></tr>
        <tr><td>Image</td><td>    : <img src='gallery/$r[image]'></td></tr>
        <tr><td>Change Image</td><td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
        <tr><td>Description</td><td>    : <input type=text name=desc size=30 value='$r[gallery_description]'></td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//==================================================BANNER================================================
// Bagian Banner
elseif ($_GET[module]=='banner'){
  echo "<h2>Banner</h2>
        <form method=POST action='?act=tambahbanner'>
        <input type=submit value='Add Banner'>
        </form>
        <table>
        <tr><th>no</th><th>Title</th><th>link</th><th>Posting date</th><th>action</th></th></tr>";
  $tampil=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[title]</td>
              <td><a href=$r[url]>$r[url]</a></td>
              <td>$tgl</td>
              <td><a href=?act=editbanner&id=$r[id_banner]>Edit</a> | 
	                <a href=aksi.php?module=banner&act=hapus&id=$r[id_banner]>Hapus</a>
		      </tr>";
    $no++;
  }
  echo "</table>";
}


// Form Tambah Banner
elseif ($_GET[act]=='tambahbanner'){
  echo "<h2>Add Banner</h2>
        <form method=POST action='aksi.php?module=banner&act=input' enctype='multipart/form-data'>
        <table>
        <tr><td>Title</td><td>  : <input type=text name=judul size=30></td></tr>
        <tr><td>Link</td><td>   : <input type=text name=link size=50></td></tr>
        <tr><td>Image</td><td> : <input type=file name=fupload size=40></td></tr>
        <tr><td colspan=2><input type=submit value=Save>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Form Edit Banner
elseif ($_GET[act]=='editbanner'){
  $edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit Banner</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=banner&act=update>
        <input type=hidden name=id value=$r[id_banner]>
        <table>
        <tr><td>Title</td><td>     : <input type=text name=judul size=30 value='$r[title]'></td></tr>
        <tr><td>Link</td><td>      : <input type=text name=link size=50 value='$r[url]'></td></tr>
        <tr><td>Image</td><td>    : <img src='foto_berita/$r[image]'></td></tr>
        <tr><td>Change Image</td><td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//==============================================================FILE==========================================================
// Bagian File
elseif ($_GET[module]=='file'){
  echo "<h2>File Operation</h2>
          <p>Hai <b>$_SESSION[namauser]</b>, you can share your files through this module with classification folder as available below : </p>
          <p><a href=?module=sop> SOP </a><br>
                <a href=?module=file_form>Form</a><br>
                <a href=?module=workflow>Workflow</a><br>
                <a href=?module=report>Report</a><br>
                <a href=?module=dd>Data Dictionary</a></p>				
          <p>&nbsp;</p>
          <p>&nbsp;</p>	  
          <p>&nbsp;</p>
          <p>&nbsp;</p>		  
          <p align=right>Login Hari ini: ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo "</p>";
}
//****************************************************SOP**************************************************************
elseif ($_GET[module]=='sop') {
  echo "<h2>List of Files at SOP folder</h2>
        <form method=POST action='?act=upload_sop'>
        <input type=submit value='Add File'>
        </form>
        <table>
        <tr><th>no</th><th>File Name</th><th>File Size</th><th>Description</th><th>Download</th><th>action</th></tr>";
  $tampil=mysql_query("SELECT * FROM file WHERE folder='sop' ORDER BY id_file DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[nama_file]</td>
              <td>$r[ukuran_file]</td>
              <td>$r[deskripsi]</td>
              <td><a href='$r[direktori]'>Download File</a></td>
			  <td><a href=aksi.php?module=sop&act=hapus_sop&id=$r[id_file]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  echo "<p align=left><a href=?module=file> Back </a></p>";
}

// Form Tambah File
elseif ($_GET[act]=='upload_sop'){
  echo "<h2>Upload File</h2>
        <form method=POST action='aksi.php?module=sop&act=upload' enctype='multipart/form-data'>
        <table>
        <tr><td>File</td><td>  : <input type=file name=fupload></td></tr>
        <tr><td>Description</td><td>   : <textarea name=deskripsi rows=8 cols=40></textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Upload>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}
//****************************************************FORM*************************************************************
elseif ($_GET[module]=='file_form') {
  echo "<h2>List of Files at FORM folder</h2>
        <form method=POST action='?act=upload_form'>
        <input type=submit value='Add File'>
        </form>
        <table>
        <tr><th>no</th><th>File Name</th><th>File Size</th><th>Description</th><th>Download</th><th>action</th></tr>";
  $tampil=mysql_query("SELECT * FROM file WHERE folder='form' ORDER BY id_file DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[nama_file]</td>
              <td>$r[ukuran_file]</td>
              <td>$r[deskripsi]</td>
              <td><a href='$r[direktori]'>Download File</a></td>
			  <td><a href=aksi.php?module=file_form&act=hapus_form&id=$r[id_file]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  echo "<p align=left><a href=?module=file> Back </a></p>";
}
// Form Tambah File
elseif ($_GET[act]=='upload_form'){
  echo "<h2>Upload File for FORM folder</h2>
        <form method=POST action='aksi.php?module=file_form&act=upload' enctype='multipart/form-data'>
        <table>
        <tr><td>File</td><td>  : <input type=file name=fupload></td></tr>
        <tr><td>Description</td><td>   : <textarea name=deskripsi rows=8 cols=40></textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Upload>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}
//****************************************************WORKFLOW************************************************************
elseif ($_GET[module]=='workflow') {
  echo "<h2>List of Files at WORKFLOW folder</h2>
        <form method=POST action='?act=upload_wf'>
        <input type=submit value='Add File'>
        </form>
        <table>
        <tr><th>no</th><th>File Name</th><th>File Size</th><th>Description</th><th>Download</th><th>action</th></tr>";
  $tampil=mysql_query("SELECT * FROM file WHERE folder='wf' ORDER BY id_file DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[nama_file]</td>
              <td>$r[ukuran_file]</td>
              <td>$r[deskripsi]</td>
              <td><a href='$r[direktori]'>Download File</a></td>
			  <td><a href=aksi.php?module=workflow&act=hapus_wf&id=$r[id_file]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  echo "<p align=left><a href=?module=file> Back </a></p>";
}
// Form Tambah File
elseif ($_GET[act]=='upload_wf'){
  echo "<h2>Upload File for Workflow folder</h2>
        <form method=POST action='aksi.php?module=workflow&act=upload_wf' enctype='multipart/form-data'>
        <table>
        <tr><td>File</td><td>  : <input type=file name=fupload></td></tr>
        <tr><td>Description</td><td>   : <textarea name=deskripsi rows=8 cols=40></textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Upload>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}
//***************************************************REPORT************************************************************
elseif ($_GET[module]=='report') {
  echo "<h2>List of Files at REPORT folder</h2>
        <form method=POST action='?act=upload_report'>
        <input type=submit value='Add File'>
        </form>
        <table>
        <tr><th>no</th><th>File Name</th><th>File Size</th><th>Description</th><th>Download</th><th>action</th></tr>";
  $tampil=mysql_query("SELECT * FROM file WHERE folder='report' ORDER BY id_file DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[nama_file]</td>
              <td>$r[ukuran_file]</td>
              <td>$r[deskripsi]</td>
              <td><a href='$r[direktori]'>Download File</a></td>
			  <td><a href=aksi.php?module=report&act=hapus_report&id=$r[id_file]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  echo "<p align=left><a href=?module=file> Back </a></p>";
}
// Form Tambah File
elseif ($_GET[act]=='upload_report'){
  echo "<h2>Upload File for Report folder</h2>
        <form method=POST action='aksi.php?module=report&act=upload_report' enctype='multipart/form-data'>
        <table>
        <tr><td>File</td><td>  : <input type=file name=fupload></td></tr>
        <tr><td>Description</td><td>   : <textarea name=deskripsi rows=8 cols=40></textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Upload>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//************************************************DATA DICTIONARY********************************************************
elseif ($_GET[module]=='dd') {
  echo "<h2>List of Files at Data Dictionary folder</h2>
        <form method=POST action='?act=upload_dd'>
        <input type=submit value='Add File'>
        </form>
        <table>
        <tr><th>no</th><th>File Name</th><th>File Size</th><th>Description</th><th>Download</th><th>action</th></tr>";
  $tampil=mysql_query("SELECT * FROM file WHERE folder='dd' ORDER BY id_file DESC");
  $no=1;
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[post_date]);
    echo "<tr><td>$no</td>
              <td>$r[nama_file]</td>
              <td>$r[ukuran_file]</td>
              <td>$r[deskripsi]</td>
              <td><a href='$r[direktori]'>Download File</a></td>
			  <td><a href=aksi.php?module=dd&act=hapus_dd&id=$r[id_file]>Delete</a></td>
		      </tr>";
    $no++;
  }
  echo "</table>";
  echo "<p align=left><a href=?module=file> Back </a></p>";
}
// Form Tambah File
elseif ($_GET[act]=='upload_dd'){
  echo "<h2>Upload File for Report folder</h2>
        <form method=POST action='aksi.php?module=dd&act=upload_dd' enctype='multipart/form-data'>
        <table>
        <tr><td>File</td><td>  : <input type=file name=fupload></td></tr>
        <tr><td>Description</td><td>   : <textarea name=deskripsi rows=8 cols=40></textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Upload>
        <input type=button value=Cancel onclick=self.history.back()></td></tr>
        </table>
        </form>";
}


// Form Edit File
elseif ($_GET[act]=='editfile'){
  $edit = mysql_query("SELECT * FROM file WHERE id_file='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "<h2>Edit File</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=File&act=update>
        <input type=hidden name=id value=$r[id_file]>
        <table>
        <tr><td>File Name</td><td> : '$r[nama_file]'></td></tr>		
        <tr><td>Change File</td><td> : <input type=file name=fupload size=30> *)</td></tr>
        <tr><td>Description</td><td>      : <input type=text name=link size=50 value='$r[url]'></td></tr>
        <tr><td colspan=2>*) If you wont change the file, leave it blank.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

//-------------------------------------------------------Hubungi Kami------------------------------------------------
// Bagian Hubungi Kami
elseif ($_GET[module]=='contact'){
  echo "<h2>Contact Us</h2>
        <table>
        <tr><th>no</th><th>nama</th><th>email</th><th>subjek</th><th>tanggal</th><th>aksi</th></th></tr>";
  $no=1;
  $tampil=mysql_query("SELECT * FROM contact ORDER BY id_contact desc");  
  while ($r=mysql_fetch_array($tampil)){
    $tgl=tgl_indo($r[tanggal]);
    echo "<tr><td>$no</td>
              <td>$r[name]</td>
              <td><a href=?act=balasemail&id=$r[id_contact]>$r[email]</a></td>
              <td>$r[subject]</td>
              <td>$date</a></td>
              <td><a href=aksi.php?module=contact&act=hapus&id=$r[id_contact]>Hapus</a>
              </td></tr>";
    $no++;
  }
  echo "</table>";
}

// Form Balas Email
elseif ($_GET[act]=='balasemail'){
  $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
  $r      = mysql_fetch_array($tampil);

  echo "<h2>Reply Email</h2>
        <form method=POST action='?module=kirimemail'>
        <table>
        <tr><td>Kepada</td><td> : <input type=text name=email size=30 value='$r[email]'></td></tr>
        <tr><td>Subjek</td><td> : <input type=text name=subjek size=50 value='Re: $r[subjek]'></td></tr>
        <tr><td>Pesan</td><td>  : <textarea name=pesan rows=13 cols=70>
        
        
        
  ------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
        <tr><td colspan=2><input type=submit value=Kirim>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
}

// Kirim Email
elseif ($_GET[module]=='kirimemail'){
  mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: redaksi@bukulokomedia.com");
  echo "<h2>Status Email</h2>
        <p>Email telah sukses terkirim ke tujuan</p>

        <p>[ <a href=javascript:history.go(-1)>Kembali</a> ]</p>";	 		  
}

// Apabila modul tidak ditemukan
else{
  echo "<p align=center><b>MODUL BELUM ADA</b></p>";
}

?>
