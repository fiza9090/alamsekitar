<?php  
$error = [];
$output = [];

ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Ini adalah penting untuk secure post method

    if(!isset($_POST["data_ID"])) $error[] = array('type'=>'ID', 'msg'=>'Parameter ID tidak lengkap.');
    //data_ID ni untuk data yg dah ada dlm database

    if(!isset($_POST["post_action"])) $error[] = array('type'=>'POST', 'msg'=>'Parameter ARAHAN tidak lengkap.');
    //post_action ni akan appear sebagai new / edit 

    // -- atas ini adalah penting

    // Bawah ni baru proses pada data yg awak nak simpan
	$nosiriA=$_POST['nosiriA'];
	$tahunr=$_POST['tahunr'];
	$kodrespon=$_POST['lst_respon'];
	$cTerima=$_POST['lst_cterima'];
   
	
    // new variable for file status1.php
	$nosiri_pertubuhan = $_POST['nosiri_pertubuhan'];
	$sukutahun = $_POST['sukutahun'];
	$tahun = $_POST['tahun'];
	// new variable for file status1.php

	// old where statemetn
	// $whereStatment=" no_siri='$nosiriA' AND bulan='$month' AND tahun='$tahunr'";
	
	// new where statement
	//$whereStatment=" nosiri_pertubuhan='$nosiri_pertubuhan' AND sukutahun='$sukutahun' AND tahun='$tahun'";
    // Jangan amalkan guna query sql begini lagi/// 
	// $countResult=select_countNoSiri('tbl_pengesahan',$conn,$whereStatment); // get from allFunction.php

	//Query sepatutnya:
    // Kalau nak semak dahulu jika sudah ada, Update, belum Insert
    $st = $conn->prepare("SELECT * FROM tbl_pengesahan WHERE nosiri_pertubuhan=? AND sukutahun=? AND tahun=?");
    $st->execute([$nosiri_pertubuhan,$sukutahun,$tahun]); //nak semak no siri mana? samada duplicate atau tak?
    $rs = $st->fetch(PDO::FETCH_ASSOC);

    $sql = "";
    $data = [];
    //jika rs wujud maka ada data   

    if($rs)
    {
        $data = [
            "nsiri" => $nosiri_pertubuhan,
            "namasyarikat" => $_POST['nama_syarikat'],
            "kodrespon" => $_POST['lst_respon'],
            "sebab" => $_POST['sebab'],
            "suku" => $sukutahun,
            "tahun" => $tahun,
            "tarikhkemaskini" => $_POST['tterima'],
            "id" => $rs["id"]
        ];

        //update
        $sql = "UPDATE tbl_pengesahan 
                SET 
                    nosiri_pertubuhan = :nsiri, 
                    nama_syarikat = :namasyarikat,
                    kodrespon = :kodrespon,
                    sebab = :sebab,
                    sukutahun = :suku,
                    tahun = :tahun,
                    tarikh_kemaskini = :tarikhkemaskini
                WHERE id = :id";
    }else{
        //insert
        $data = [
            "nsiri" => $nosiri_pertubuhan,
            "namasyarikat" => $_POST['nama_syarikat'],
            "kodrespon" => $_POST['lst_respon'],
            "sebab" => $_POST['sebab'],
            "suku" => $sukutahun,
            "tahun" => $tahun,
            "tarikhkemaskini" => $_POST['tterima']
        ];

        $sql = "INSERT INTO tbl_pengesahan (nosiri_pertubuhan, sukutahun, tahun, nama_syarikat, tarikh_kemaskini, kodrespon, sebab) 
                VALUES (:nsiri, :suku, :tahun, :namasyarikat, :tarikhkemaskini, :kodrespon, :sebab)"; //Jika nak insert
    }


    $stmt = $conn->prepare($sql);

    try {
        $conn->beginTransaction();
        $stmt->execute($data);

        $output["pengesahan_id"] = $conn->lastInsertId();
        $conn->commit();

        //Jika tiada error BE hantar mesej berjaya kepada FE
        $output["status"] = "success";   //kalau status tak ikut seperti harapkan.
        $output["msg"] = "Berjaya";

        if($kodrespon <> "11") {
            // replace key status dengan case baru
            // kalau nak redirect ni kena hantar id bagi data yang baru add.
            $output["status"] = "redirect";
            $output["href"] = "pengesahan";
        };
        //kita hantar satuy key lagi kepada A
    }catch (Exception $e){
        $conn->rollback();

        //Jika ada error masa Execute SQL so BE akan send mesej Error pada FE
        $output["status"] = "error";
        $output["msg"] = $e->getMessage();
    }
	
}else{
    $output = [
        "status" => "error",
        "msg" => "Ada kesilapaan"
    ];
}

    //contoh
header('Content-type: application/json');
echo json_encode($output);
		
?>