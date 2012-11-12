<?php
$seminggu = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=>"January", "February", "March", "April", "May", 
                    "June", "July", "August", "September", 
                    "October", "November", "December");
?>
