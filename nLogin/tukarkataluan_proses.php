<?php 

require("dbClass/config.inc.php");
require("dbClass/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect();
	
	$username = $_POST['idpengguna'];
	$password = $_POST['katalaluan'];
	$encrypt_password = sha1( $password );
	
	$whereStatment=" username='$username'";
	$data['password']=$encrypt_password;
	
	$db->query_update(TABLE_USERS, $data, $whereStatment);
	
	
	echo "<br><br><br><br><div align='center'>Kata Laluan Telah Dikemaskini</div>";
	
$db->close();
?>