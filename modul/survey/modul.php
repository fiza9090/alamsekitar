<?php 
 session_start(); 
 if(!isset($_SESSION['user_id'])) die("MAAF! Session anda tidak sah.\nSila login.");
 if(!isset($_GET["load"])) die("MAAF! load parameter tidak wujud");

 $user_id=$_SESSION['user_id'];
 include('config-alamsekitar-pdo.php'); 
 die ('Oppss');
 $conn = new PDO("mysql:host=$hostname_conndb;dbname=$database_conndb", $username_conndb, $password_conndb);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 //include('conn.php');
 $moduleName = "index";

 $stmt = $conn->prepare("SELECT id_user, kod_negeri, level, name, jawatan FROM tbl_pengguna WHERE id_user=?");
 $stmt->execute(array($user_id));
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 if(!$user)	die("MAAF! User tidak sah.");

 if(strpos($_GET["load"], "/")){
    $moduls = explode("/", $_GET["load"]); 
    
    $moduleName = $moduls[0];
	if($moduls[1]) $modulefile = $moduls[1];
	if($moduls[2]) $modulepara = $moduls[2];
   
 }

 $modul = "modul/".$moduleName.(isset($modulefile)?"/modul.".$modulefile:"").(isset($modulepara)?".".$modulepara:"").".php";
 //echo $modul."\n";
 if(!is_file($modul)) die("Maaf! Modul tidak sah.");

 include($modul);
//echo $moduleName.(isset($modulefile)?"/modul.".$modulefile:"").".php".(isset($modulepara)?"?".$modulepara:"");
//print_r($moduls);
?>