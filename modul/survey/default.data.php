<?php
 include('config-alamsekitar-pdo.php'); 

 session_start(); 
 if(!isset($_SESSION['user_id'])) die("Session anda telah tamat.\nSila LOGIN semula.");

 //$conn = new PDO("mysql:host=$hostname_conndb;dbname=$database_conndb", $username_conndb, $password_conndb);
 //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userID = $_SESSION['user_id'];
// $table = 'v2_butirpengenalan AS A LEFT JOIN v2_pengesahan AS B ON A.id=B.hs_id'; // ni sebab ada JOIN
$table = 'tbl_rangka';
$primaryKey = 'id';

// Kalau nak uji user dari table user
$stmt = $conn->prepare("SELECT * FROM tbl_pengguna WHERE id_user=?");
$stmt->execute(array($userID));

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$user)	die("User tidak sah.");

// Jika fieldname kod negeri == hq. kena tengok table user
if($user["kod_negeri"]!=="hq"){
	$_GET["columns"][4]["search"]["value"] = $user["kod_negeri"];
}

//if($user["level"]!=="1") $_GET["columns"][1]["search"]["value"] = $user["dKodNegeri"];

$columns = array(
	array( 'db' => 'id', 'dt' => 0 ),
	array( 'db' => 'nosiri_pertubuhan', 'dt' => 1 ),
	array( 'db' => 'nama_syarikat',  'dt' => 2 ),
	array( 'db' => 'kod_negeri',  'dt' => 3 ),
	array( 'db' => 'tahun',   'dt' => 4 )
);

require( 'ssp.class.mod.php' );

echo json_encode(
	SSP::simple( $_GET, $conn, $table, $primaryKey, $columns )
);


