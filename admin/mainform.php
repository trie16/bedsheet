<?php
	
	include("conn.php");	
	// Bagian Home
	if ($_GET["module"]=='form'){
	?>
	  <h2>Form Management</h2>
			  <p>Hai <b><?php echo $_SESSION['namauser']; ?></b>, Please click the menu in the left side to manage your forms. 
			  The displayed form menus in the left are the form that you have access in it. </p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
<?php	
	}
	

?>