<?php echo "<br><br>"; ?>


    <link href="css/registerform.css" rel="stylesheet" type="text/css" />
    
    <script src="validate.js" type="text/javascript"></script>
</head>

<div class="form-style-10">
<h1>Kemaskini Kata Laluan</h1>
<form action="main.php?load=9a" method="post">

    <div class="section"></div>
        <div class="inner-wrap">
        <label>Id Pengguna <input type="text" name="idpengguna" id="idpengguna" value="<?php echo valUser("username",$conn,$user_id)?>" readonly="readonly" /></label>
        <label>Kata Laluan Baru <input type="password" name="katalaluan" id="katalaluan"  required minlength="8" maxlength="12"/></label>
        
    </div>
    <div class="button-section">
     <input type="submit" value="Simpan"  />

    </div>
</form>
</div>
<?php

/*if(isset($_POST['submit']))
{
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$kodS = $_POST['kodsurvey'];
	$email = $_POST['email'];
	$username = $_POST['idpengguna'];
	$password = filter_var($_POST['katalaluan'], FILTER_SANITIZE_STRING);
	$jawatan = $_POST['jawatan'];
	$bahagian = $_POST['bahagian'];
	$negeri = $_POST['negeri'];
	//$encrypt_password = password_hash($password, PASSWORD_DEFAULT);
	$encrypt_password = sha1( $password );

	$a = $conn->prepare("SELECT * FROM tbl_pengguna WHERE idpengguna = $username");
	$a->execute(array($username));
	$row = $a->rowCount();
		
	if($row == 0)
	{
		if($jenis == 0)
		{
			$s = $conn->prepare("SELECT * FROM tbl_pengguna WHERE no_siri = ?");
			$s->execute(array($nama));
			$row = $s->rowCount();
			
			if($row == 1)
			{
				while($r = $s->fetch(PDO::FETCH_ASSOC))
				{
					$nosiri = $r['no_siri'];
					$emailR = $r['emel1'];
					$kodnegeri = $r['kodnegeri'];
					$kodsurvey = $r['kp'];
					$kodpo = $r['kod_po'];
				}
				
					$stmt = $conn->prepare("INSERT INTO tbl_pengguna(name, jawatan, bahagian, level, username, password, kod_negeri,kod_survey tarikh) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
					$stmt->execute(array($nama, $jawatan, $bahagian, $jenis, $username, $encrypt_password, $negeri, $kodS));
					//echo "Ada data";
					$stmt1 = $conn->prepare("UPDATE tbl_pengguna SET email = ?, kod_survey = ?, kod_negeri = ?, kod_po = ? WHERE username = ?");
					$stmt1->execute(array($emailR, $kodsurvey, $kodnegeri, $kodpo, $nosiri));
				
				echo "<script>alert('ID Pengguna telah berjaya didaftarkan.');
			window.location = 'main.php?load=9';</script>";
				
			}
			else
				echo "<script>alert('No Siri syarikat tidak wujud.');
			window.location = 'main.php?load=9';</script>";
		}
		else
		{
			$stmt = $conn->prepare("INSERT INTO tbl_pengguna(name, jawatan, bahagian, email, level, username, password, kod_negeri,kod_survey, tarikh) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
			$stmt->execute(array($nama, $jawatan, $bahagian, $email, $jenis, $username, $encrypt_password, $negeri, $kodS));
			
			echo "<script>alert('ID Pengguna telah berjaya didaftarkan.');
			window.location = 'main.php?load=9';</script>";
		}
	}
	else
	{
		echo "<script>alert('ID Pengguna telah digunakan.');
			window.location = 'main.php?load=9';</script>";
	}*/
	
	/*echo "<script>window.location = 'main.php?load=9';</script>";
}
*/
?>