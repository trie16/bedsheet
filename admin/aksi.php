<?php
session_start();
include "../config/conn.php";
include "../config/library.php";

$module=$_GET[module];
$act=$_GET[act];
echo $_SESSION[username];

// Menghapus data
if (isset($module) AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE id_".$module."='$_GET[id]'");
  header('location:media.php?module='.$module);
}

//Update/Input About

elseif ($module=='about' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE modul SET static_content   = '$_POST[isi]' WHERE id_modul    = 7");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE modul SET static_content   = '$_POST[isi]', image = '$nama_file' WHERE id_modul = 7");
  }
  header('location:media.php?module='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO user(id_user,
  								name,	
                                password,
                                full_name,
                                email) 
	                       VALUES('$_POST[id_user]',
						   		'$_POST[name]',
                                '$pass',
                                '$_POST[fullname]',
                                '$_POST[email]')");
  header('location:media.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("UPDATE user SET name      = '$_POST[name]',
                                 full_name    = '$_POST[fullname]',
                                 email        = '$_POST[email]',  
								 level        = '$_POST[level]'
                           WHERE id_user      = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE user SET name      = '$_POST[name]',
                                 password     = '$pass',
                                 full_name    = '$_POST[fullname]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}


// Input modul
elseif ($module=='modul' AND $act=='input'){
  mysql_query("INSERT INTO modul(modul_name,
                                 link,
                                 publish,
                                 active,
                                 status,
                                 display) 
	                       VALUES('$_POST[nama_modul]',
                                '$_POST[link]',
                                '$_POST[publish]',
                                '$_POST[aktif]',
                                '$_POST[status]',
                                '$_POST[urutan]')");
  header('location:media.php?module='.$module);
}

// Update modul
elseif ($module=='modul' AND $act=='update'){
  mysql_query("UPDATE modul SET modul_name = '$_POST[nama_modul]',
                                link       = '$_POST[link]',
                                publish    = '$_POST[publish]',
                                active      = '$_POST[aktif]',
                                status     = '$_POST[status]',
                                display     = '$_POST[urutan]'  
                          WHERE id_modul   = '$_POST[id]'");
  header('location:media.php?module='.$module);
}


// Input schedule
elseif ($module=='schedule' AND $act=='input'){
  $mulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
  $selesai=sprintf("%02d%02d%02d",$_POST[thn_selesai],$_POST[bln_selesai],$_POST[tgl_selesai]);
  $sql_user =mysql_query("SELECT * from user where name='$_SESSION[namauser]'");
  $i=mysql_fetch_array($sql_user);
  $agenda=("INSERT INTO schedule(topic,
                                  content_sched,
                                  location,
                                  start_date,
                                  finish_date,
                                  post_date,
                                  id_user,
								  pic) 
					            VALUES('$_POST[tema]',
                                 '$_POST[isi_agenda]',
                                 '$_POST[tempat]',
                                 '$mulai',
                                 '$selesai',
                                 '$tgl_sekarang',
                                 '$i[id_user]',
								 '$_POST[pic]')");
  $sched=mysql_query($agenda);
//  echo $agenda;								 
  header('location:media.php?module='.$module);
}

// Update schedule
elseif ($module=='schedule' AND $act=='update'){
  $mulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
  $selesai=sprintf("%02d%02d%02d",$_POST[thn_selesai],$_POST[bln_selesai],$_POST[tgl_selesai]);

  mysql_query("UPDATE schedule SET topic        = '$_POST[tema]',
                                 content_sched  = '$_POST[isi_agenda]',
                                 start_date   = '$mulai',
                                 finish_date = '$selesai',
                                 location      = '$_POST[tempat]',
								 pic = '$_POST[pic]'  
                           WHERE id_schedule   = '$_POST[id]'");
  header('location:media.php?module='.$module);
}


// Input pengumuman
elseif ($module=='pengumuman' AND $act=='input'){
  $tanggal=sprintf("%02d%02d%02d",$_POST[thn],$_POST[bln],$_POST[tgl]);
  
  mysql_query("INSERT INTO pengumuman(judul,
                                      isi,
                                      tanggal,
                                      tgl_posting,
                                      id_user) 
					                   VALUES('$_POST[judul]',
                                    '$_POST[isi_pengumuman]',
                                    '$tanggal',
                                    '$tgl_sekarang',
                                    '$_SESSION[namauser]')");
  header('location:media.php?module='.$module);
}

// Update pengumuman
elseif ($module=='pengumuman' AND $act=='update'){
  $tanggal=sprintf("%02d%02d%02d",$_POST[thn],$_POST[bln],$_POST[tgl]);

  mysql_query("UPDATE pengumuman SET judul         = '$_POST[judul]',
                                     isi           = '$_POST[isi_pengumuman]',
                                     tanggal       = '$tanggal'
                               WHERE id_pengumuman = '$_POST[id]'");
  header('location:media.php?module='.$module);
}


// Input berita
elseif ($module=='news' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $usr_sql = mysql_query("select * from `user` where `name` = '$_SESSION[namauser]'");
  $u = mysql_fetch_array ($usr_sql);	
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("INSERT INTO news(title,
                                    id_category,
                                    content_news,
                                    id_user,
                                    hour_post,
                                    date_post,
                                    day_post,
                                    image) 
                            VALUES('$_POST[judul]',
                                   '$_POST[kategori]',
                                   '$_POST[isi_berita]',
                                   '$u[id_user]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$nama_file')");
  }
  //Apabila berita tidak ada gambar yang di upload
  else{
    mysql_query("INSERT INTO news(title,
                                    id_category,
                                    content_news,
                                    id_user,
                                    hour_post,
                                    date_post,
                                    day_post) 
                            VALUES('$_POST[judul]',
                                   '$_POST[kategori]',
                                   '$_POST[isi_berita]',
                                   '$u[id_user]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini')");
  }
  header('location:media.php?module='.$module);
}

// Update berita
elseif ($module=='news' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE news SET title        = '$_POST[judul]',
                                   id_category  = '$_POST[kategori]',
                                   content_news = '$_POST[isi_berita]'  
                             WHERE id_news    = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE news SET title       = '$_POST[judul]',
                                   id_category = '$_POST[kategori]',
                                   content_news = '$_POST[isi_berita]',
                                   image      = '$nama_file'   
                             WHERE id_news   = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}

//============================================STUDY=============================================
// Input Study
elseif ($module=='study' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $usr_sql = mysql_query("select * from `user` where `name` = '$_SESSION[namauser]'");
  $u = mysql_fetch_array ($usr_sql);	
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("INSERT INTO study(title_study,
                                    content_study,
                                    id_user,
                                    hour_post,
                                    date_post,
                                    day_post,
                                    image) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_berita]',
                                   '$u[id_user]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$nama_file')");
  }
  //Apabila berita tidak ada gambar yang di upload
  else{
    mysql_query("INSERT INTO study(title_study,
                                    content_study,
                                    id_user,
                                    hour_post,
                                    date_post,
                                    day_post) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_berita]',
                                   '$u[id_user]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini')");
  }
  header('location:media.php?module='.$module);
}

// Update Study
elseif ($module=='study' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE study SET title_study        = '$_POST[judul]',
                                   content_study = '$_POST[isi_berita]'  
                             WHERE id_study    = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE study SET title_study       = '$_POST[judul]',
                                   content_study = '$_POST[isi_berita]',
                                   image      = '$nama_file'   
                             WHERE id_study  = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}


//============================================STUDY=============================================
// Input banner
elseif ($module=='banner' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    move_uploaded_file($lokasi_file,$_SERVER['DOCUMENT_ROOT']."/admin/foto_berita/$nama_file");
    mysql_query("INSERT INTO banner(title,
                                    url,
                                    post_date,
                                    image) 
                            VALUES('$_POST[judul]',
                                   '$_POST[link]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO banner(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[link]')");
  }
  header('location:media.php?module='.$module);
}

// Update banner
elseif ($module=='banner' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE banner SET title     = '$_POST[judul]',
                                   url       = '$_POST[link]'
                             WHERE id_banner = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE banner SET title     = '$_POST[judul]',
                                   url       = '$_POST[link]',
                                   image     = '$nama_file'   
                             WHERE id_banner = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}


// Input gallery
elseif ($module=='gallery' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $usr_gal= mysql_query("select * from `user` where `name` = '$_SESSION[namauser]'");
  $g = mysql_fetch_array ($usr_gal);	

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    move_uploaded_file($lokasi_file,"gallery/$nama_file");
	$add_gal="INSERT INTO gallery(gallery_name,
                                    posting_date,
									gallery_description,
									id_user,
									posting_day,
									posting_hour,
                                    image) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
								   '$_POST[desc]',
								   '$g[id_user]',
								   '$hari_ini',
								   '$jam_sekarang',
                                   '$nama_file')";
    mysql_query($add_gal);
//	echo $add_gal;
  }
  else{
    move_uploaded_file($lokasi_file,"gallery/$nama_file");
    mysql_query("INSERT INTO gallery(gallery_name,
                                    posting_date,
									gallery_description,
									id_user,
									posting_day,
									posting_hour,
                                    image) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
								   '$_POST[desc]',
								   '$g[id_user]',
								   '$hari_ini',
								   '$jam_sekarang',
                                   'no_gal.jpg')");
  	
  }
  header('location:media.php?module='.$module);
}

// Update gallery
elseif ($module=='gallery' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $usr_gal= mysql_query("select * from `user` where `name` = '$_SESSION[namauser]'");
  $g = mysql_fetch_array ($usr_gal);	

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    $edit_gal="UPDATE gallery SET gallery_name='$_POST[judul]',
                                    posting_date='$tgl_sekarang',
									gallery_description='$_POST[desc]',
									id_user='$g[id_user]',
									posting_day= '$hari_ini',
									posting_hour='$jam_sekarang'
							WHERE id_gallery='$_POST[id]'";
    mysql_query($edit_gal);
//	echo $edit_gal;
  }
  else{
    move_uploaded_file($lokasi_file,"gallery/$nama_file");
    mysql_query("UPDATE gallery SET gallery_name='$_POST[judul]',
                                    posting_date='$tgl_sekarang',
									gallery_description='$_POST[desc]',
									id_user='$g[id_user]',
									posting_day= '$hari_ini',
									posting_hour='$jam_sekarang',
                                    image='$nama_file' 
							WHERE id_gallery='$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}

//=============================================FILE=============================================
elseif ($module=='file' and $act='upload') {
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];
	$ukuran_file= $_FILES['fupload']['size'];
	$direktori= "files/$nama_file";
	//apabila file berhasil di upload
	if (move_uploaded_file($lokasi_file,"$direktori")) {
//		echo "File Name : <b>$nama_file</b> uploaded succesfully<br>";
//		echo "File size :  <b>$ukuran_file</b> bytes";
	//masukkan informasi file ke database
	mysql_query("INSERT INTO `file` (`nama_file`, `ukuran_file`,`deskripsi`, `direktori`) VALUES ('$nama_file','$ukuran_file','$_POST[deskripsi]','$direktori')");
	}
	else {
//		echo "upload file failed";
	}	
	  header('location:media.php?module='.$module);
}
?>
