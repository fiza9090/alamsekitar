<?php 

session_start();
$user_id=$_SESSION['user_id']; 



if($_SESSION['user_id']==NULL)
 {
	
	die("Please login to the system officially");
	 
}else{
		 
include('config-alamsekitar-pdo.php'); 
		
		require('allFunction.php');		
		$setp=$_GET["load"];
// 		print_r($levelUser);
// die();
//newpageset berfungsi sebagai default page untuk modules survey
$newpageSet = "modul/survey/default.php";

		if($setp)
		{
					
			if($levelUser=="1"){
			
				switch($setp)
					{
					// user HQ/admin/smd
					case '1': $pageSet = 'modul/survey/default.php'; break;	
					case '2': $pageSet = 'modul/profile.php'; break;					
					case '2a': $pageSet = 'modul/profile_proses.php'; break;	
					case '3': $pageSet = 'modul/setmonth.php'; break;
					case '3a': $pageSet = 'modul/status1.php'; break;	
					case '3b': $pageSet = 'modul/status_proses.php'; break;
				   	case '4': $pageSet = 'modul/formControl.php'; break;	
					case '5': $pageSet = 'modul/seksyenA_new.php'; break;
					case '5a': $pageSet = 'modul/seksyenA_process.php'; break;
					case '6': $pageSet = 'modul/seksyenB.php'; break;
					case '6a': $pageSet = 'modul/seksyenB_process.php'; break;
					case '8': $pageSet = 'modul/pengesahan.php'; break;
					case '8a': $pageSet = 'modul/pengesahan_proses.php'; break;
					case '9': $pageSet = 'nLogin/tukarkataluan.php'; break;
					case '9a': $pageSet = 'nLogin/tukarkataluan_proses.php'; break;
					case '10': $pageSet = 'laporan/LRespon.php'; break;
					case '11': $pageSet = 'laporan/bRE.php'; break;
					case '13': $pageSet = 'laporan/jadual/senaraiJadual.php'; break;
					case 'jadual_14': $pageSet = 'laporan/jadual/jadual_14.php'; break;
					case '14': $pageSet = 'laporan/exportRespon.php'; break;
										
					}				
				}
			else if($levelUser=="2"){
			
				switch($setp)
					{
					// JP Negeri
					case '1': $pageSet = 'modul/survey/default.php'; break;	
					case '2': $pageSet = 'modul/profile.php'; break;					
					case '2a': $pageSet = 'modul/profile_proses.php'; break;	
					case '3': $pageSet = 'modul/setmonth.php'; break;
					case '3a': $pageSet = 'modul/status1.php'; break;
					case '3b': $pageSet = 'modul/status_proses.php'; break;	
					case '4': $pageSet = 'modul/formControl.php'; break;	
					case '5': $pageSet = 'modul/seksyenA_new.php'; break;
					case '5a': $pageSet = 'modul/seksyenA_process.php'; break;
					case '6': $pageSet = 'modul/seksyenB.php'; break;
					case '6a': $pageSet = 'modul/seksyenB_process.php'; break;
					case '8': $pageSet = 'modul/pengesahan.php'; break;
					case '8a': $pageSet = 'modul/pengesahan_proses.php'; break;
					case '9' : $pageSet = 'nLogin/tukarkataluan.php'; break;
					case '9a': $pageSet = 'nLogin/tukarkataluan_proses.php'; break;
					case '10': $pageSet = 'laporan/LRespon.php'; break;
					case '11': $pageSet = 'laporan/bRE.php'; break;
					case '12': $pageSet = 'laporan/bRE_proses.php'; break;
					case '13': $pageSet = 'laporan/jadual/senaraiJadual.php'; break;
					case 'jadual_14': $pageSet = 'laporan/jadual/jadual_14.php'; break;
					case '14': $pageSet = 'laporan/exportRespon.php'; break;
					case '99' : $pageSet = 'nLogin/adduser.php'; break; //add 10.6.2020 test
					
					}				
				}
				else
				{
					$pageSet="logout.php";
					
				}				
		}
		else
		{			
			$pageSet="logout.php";			
		}

}
?>
