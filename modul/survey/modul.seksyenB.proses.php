
<?php  
require("dbClass/config.inc.php");
require("dbClass/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect();


echo "<br><br><br><br><br>";
	$nosiriB=$_POST['nosiri'];
	$tahunr=$_POST['tahunr'];
	$bulanrujuk=$_POST['bulanrujukan'];

	$checklevel=$_POST['userlevel'];
		
	$whereStatment=" nosiri_pertubuhan='$nosiriB' AND bulan_rujuk='$bulanrujuk' AND tahun='$tahunr'";	
	 $countResult=select_countNoSiri('tbl_survei',$conn,$whereStatment); // get from allFunction.php
	
	
	$data['nosiri_pertubuhan']=$_POST['nosiri'];
	$data['tahun']=$_POST['tahunr'];
	$data['bulan_rujuk']=$_POST['bulanrujukan'];
	$data['bulan_gantian']=$_POST['bulan_ganti'];
	
	$data['054101']=$_POST['054101'];
	$data['054201']=$_POST['054201'];	
	$data['054301']=$_POST['054301'];
	
	$data['054102']=$_POST['054102'];
	$data['054202']=$_POST['054202'];	
	$data['054302']=$_POST['054302'];
	$data['054402']=$_POST['054402'];
	
	$data['m0501']=$_POST['f0501'];
	$data['m0601']=$_POST['f0601'];	
	$data['m0701']=$_POST['f0701'];
	$data['m0801']=$_POST['f0801'];
	$data['J0901']=$_POST['J0901'];
	
	$data['m0502']=$_POST['f0502'];
	$data['m0602']=$_POST['f0602'];
	$data['m0702']=$_POST['f0702'];		
	$data['m0802']=$_POST['f0802'];
	$data['J0902']=$_POST['J0902'];
	
	$data['m0503']=$_POST['f0503'];
	$data['m0603']=$_POST['f0603'];
	$data['m0703']=$_POST['f0703'];
	$data['m0803']=$_POST['f0803'];
	$data['J0903']=$_POST['J0903'];
	
	$data['m0504']=$_POST['f0504'];
	$data['m0604']=$_POST['f0604'];
	$data['m0704']=$_POST['f0704'];
	$data['m0804']=$_POST['f0804'];
	$data['J0904']=$_POST['J0904'];
	
	$data['m0505']=$_POST['f0505'];
	$data['m0605']=$_POST['f0605'];
	$data['m0705']=$_POST['f0705'];
	$data['m0805']=$_POST['f0805'];
	$data['J0905']=$_POST['J0905'];
	
	$data['m0506']=$_POST['f0506'];
	$data['m0606']=$_POST['f0606'];
	$data['m0706']=$_POST['f0706'];
	$data['m0806']=$_POST['f0806'];
	$data['J0906']=$_POST['J0906'];
	
	$data['m0507']=$_POST['f0507'];
	$data['m0607']=$_POST['f0607'];
	$data['m0707']=$_POST['f0707'];
	$data['m0807']=$_POST['f0807'];
	$data['J0907']=$_POST['J0907'];
	
	$data['m0508']=$_POST['f0508'];
	$data['m0608']=$_POST['f0608'];
	$data['m0708']=$_POST['f0708'];
	$data['m0808']=$_POST['f0808'];
	$data['J0908']=$_POST['J0908'];
	$data['m08_nyatakan']=$_POST['f08_nyatakan'];

	$data['J0513']=$_POST['J0513'];
	$data['J0613']=$_POST['J0613'];
	$data['J0713']=$_POST['J0713'];
	$data['J0813']=$_POST['J0813'];
	 $data['JB0913']=$_POST['JB0913'];


////////////////////////////////////////////////////////////////////

if( $countResult=="1")
	{	
		$db->query_update(TABLE_B_RC, $data, $whereStatment);
	}
else if( $countResult=="0")
	{
		$db->query_insert(TABLE_B_RC, $data);
	}
else{
	echo "duplicate data B RC";
	$db->close();
	}
//echo $count_nosiriRC; 	
//echo '<br><a href="profile.php">back to profile</a>';		
$db->close();
	if($checklevel==0) {
		//header("location:main.php?load=4&month=$bulanrujuk&year=$tahunr&tab=C"); 
		echo("<script>location.href ='main.php?load=4&month=$bulanrujuk&year=$tahunr&tab=C';</script>"); 	
	}
	else
	{
		//header("location:main.php?load=4&SerialID=$nosiriB&month=$bulanrujuk&year=$tahunr&tab=C");
		echo("<script>location.href ='main.php?load=4&SerialID=$nosiriB&month=$bulanrujuk&IDyear=$tahunr&tab=C';</script>");  
	}


?>