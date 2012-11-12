<html>
<head>
<title>Bedsheet Admin - Register Page</title>
<link href="../adminstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header"> 
	<div style="padding-top:20 px">
		<h2>Register Form</h2>
	</div>
	<table>
<?php
include ("../config/conn.php");
$link=koneksi_db();
//Register form
if ($_GET["module"]=='register'){ ?>
	<tr><td class=content>
		Please fill the form below to register at our system. All field should be filled, signed by asterix (*) mode. 
		And your inputing data should be a valid data, because we'll use the data for all process after you login such as input form.<br>
		<b>NOTES : All registered users still NEED activation access from admin to access admin pages.</b>
	</td></tr>
	<tr><td>
		<p>
		<form method=POST action='?module=reg'>
		<table>  
        <tr>
          <td class=isi>Username (*) </td> 
          <td> : <input type=text name=name size=35></td></tr>
        <tr>
          <td class=isi>Password (*) </td>
          <td>: <input type=password name=password size=35></td></tr>
        <tr><td class=isi>Fullname</td><td>  : <input type=text name=fullname size=35></td></tr>
        <tr><td class=isi>Facebook Link (*)</td><td>  : <input type=text name=txt_fb size=35></td></tr>
        <tr><td class=isi>Kota</td><td>  : <input type=text name=txt_kota size=35></td></tr>		
        <tr>
          <td class=isi>E-mail (*) </td>
          <td> : <input type=text name=email size=35><input type="hidden" name="form_submitted" value="1"/></td></tr>		 
        <tr><td><input type=submit value=Submit></td><td><input type=reset onClick=javascript:history.back() value='Cancel' name='Reset'/></td></tr>
		</table>
		</form>
    </td></tr> 
<?php
} 
//Register Process
elseif ($_GET["module"]=='reg'){	
	if (! (empty($_POST['name'])) && !(empty($_POST['password'])) && !(empty($_POST['email'])) ){
		if ($_POST['txt_fb'] != '') {
			$password=md5($_POST['password']);
			$sql_cek="SELECT * FROM user where username='$_POST[name]'";
			$cek=mysql_query($sql_cek,$link) or die ("You've wrong Query, because:".mysql_error());
			$ada=mysql_num_rows($cek);
			$name=trim($_POST['name']);
			$email=$_POST['email'];
			$full=$_POST['fullname'];
			$fb=$_POST['txt_fb'];
			$kota=$_POST['txt_kota'];
			if ($ada > 0){
				echo "<div align=center><table>";
				echo "<tr><td class=isi_kecil>";
				echo "<font color='red'>your name already exist, please choose another name.</div>";
				echo "</tr></td></table>";
				echo "<tr><td class=kembali><br>[ <a href=javascript:history.go(-1)>Back</a> ]</td></tr>";
			}	
			else {
				if ($_POST['form_submitted'] == '1') {
					##User is registering, insert data until ;we can activate it
					$activationKey =  mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
					$sql_reg="INSERT INTO user (id,username,password,email,full_name,facebook,kota,level, activationkey, status) 
							  VALUES ('','$name','$password','$email','$full','$fb','$kota','toko','$activationKey','verify')";
//					echo($sql_reg);
					$tambah = mysql_query($sql_reg) or die('Error: ' . mysql_error());
					$query = "SELECT * FROM user";
					$hasil = mysql_query($query) or die('Error: ' . mysql_error());
					echo "An email has been sent to $_POST[email] with an activation key. Please check your mail to complete registration.<br>
						  Click <a href='index.php'>here</a> to Login.<br>";
					##Send activation Email
					$to      = $_POST['email'];
					$subject = "Bedsheet from facebook application Registration";
					$message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at YOURWEBSITE.com. 
								You can complete registration by clicking the following link:\rhttp://www.YOURWEBSITE.com/verify.php?$activationKey\r\r
								If this is an 								error, ignore this email and you will be removed from our mailing list.\r\r
								Regards,\ bedsheet.com Team";
					$headers = 'From: noreply@bedsheet.com' . "\r\n" .
							   'Reply-To: noreply@bedsheet.com' . "\r\n" .
		
					'X-Mailer: PHP/' . phpversion();
					mail($to, $subject, $message, $headers);
				} 
				else {
					##User isn't registering, check verify code and change activation code to null, status to activated on success
					$queryString = $_SERVER['QUERY_STRING'];
					$query = "SELECT * FROM user"; 
					$result = mysql_query($query) or die(mysql_error());
					while($row = mysql_fetch_array($result)){
						if ($queryString == $row["activationkey"]){
						   echo "Congratulations!" . $row["username"] . " is now the proud new owner of an bedsheet.com account.";
						   $sql="UPDATE user SET activationkey = '', status='activated' WHERE (id = $row[id])";
						   if (!mysql_query($sql))
						   {
							die('Error: ' . mysql_error());
						   }
	
						}
	
					}
				}//else if not verify yet			
			
/*			echo "</br>";
			echo "<div align=center>";
			echo "<tr><td>";
			echo "<div align=center><h1> Success! </b><br>";
			echo "<h2>You've successfully register. Please wait until the admin <font color='red'>activate</font> 
				  your account if you're <font color='red'><b>qualified</b></font>.<br></td></tr>";
			echo "<tr><td><a href='index.php'>&raquo;Back To Admin Login Page</a>";
			echo "<a href='../index.php'>&raquo;Back To homepage</a></h2></div></td></tr>";
			//	include_once "?module=home"; */
		}
		}
		else {
			echo "<div align=center><table>";
			echo "<tr><td class=isi_kecil>";
			echo "<font color='red'>Please enter your FACEBOOK LINK first.</div>";
			echo "</tr></td></table>";
			echo "<tr><td class=kembali><br>[ <a href=javascript:history.go(-1)>Back</a> ]</td></tr>";		
		}	
	}	
	else
	{
	echo "<font color='red'>you should enter name and passsword also EMAIL first<br>";
	echo "<p>[ <a href=javascript:history.go(-1)>Back</a> ]</font></p>";	
	}
}


?>
</table>

</body>
</html>