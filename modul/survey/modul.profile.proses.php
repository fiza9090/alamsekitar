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

    if($error){
        //jika ada sebarang data yng tidak wujud akan menyebabkan error dikesan.
        foreach($error as $ob)    // Where $list is the list containing the objects
        {
            $output["msg"] .= $ob["type"] .' : '. $ob["msg"];
        }

        $output["status"] = "error";
        // http_response_code(404);
    }else{
        //Proses data dari form dan simpan dalam 
        //Jika semua ok
        //semak samada action new / edit 

        //Ad new data / edit
        $data = [
            'nosiri_pertubuhan' => "", //value no siri dari mana??
            'pic1'    => htmlentities($_POST["data_dPic1"]),
            'emel1'  => htmlentities($_POST["data_dEmel1"]),
            'notel1'  => htmlentities($_POST["datadNotel1"]),
            'pic2' => htmlentities($_POST["data_dPic2"]),
            'notel2'  => htmlentities($_POST["data_dEmel2"]),
            'emel2'    => htmlentities($_POST["datadNotel2"]),
            
        ];

        //semak duplicate
        $st = $conn->prepare("SELECT * FROM tbl_rangka WHERE nosiri_pertubuhan=?");
        $st->execute([$data["nosiri_pertubuhan"]]); //nak semak no siri mana? samada duplicate atau tak?
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        

        switch($_POST["post_action"])
        {
            case "delete":
                $data = [
                    'id' => $_POST["data_ID"]
                ];
                $sql = "DELETE FROM tbl_rangka WHERE id=:id";
                $output["next"] = "close";      //to close modal
                break;
            case "edit":

                //jika update medan tertentu sahaja
                $data = [
                    //'dNoSiri' => $data["dBNO"] . $data["dNG"] . $data["dDP"] . $data["dDB"] . $data["dBP"] . $data["dST"] . $data["dNTK"] . $data["dNIR"],
                    'pic1'   => $_POST["data_dPic1"],
                    'emel1'    => $_POST["data_dEmel1"],
                    'notel1'    => $_POST["datadNotel1"],
                    'pic2'    => $_POST["data_dPic2"],
                    'emel2'  => $_POST["data_dEmel2"], 
                    'notel2'    => $_POST["data_dEmel2"],                       
                ];

                $data['id'] = $_POST["data_ID"];

                $sql = "UPDATE tbl_rangka 
                        SET 
                            pic1=:pic1, emel1=:emel1, 
                            notel1=:notel1, pic2=:pic2,
                            notel2=:notel2, emel2=:emel2                               
                        WHERE 
                            id = :id";

                $output["next"] = "close";      //to close modal

                // ni dia uji data baru ngan data lama sama tak... kalau sama ia anggap duplicate.
                if($rs){
                    if($data['id'] !== $rs[0]['id']){
                        $exist = true;
                    }
                }

                break;
            /*default:    //new
                //Jika belum ada
                $sql = "INSERT INTO tbl_rangka (
                    dNoSiri, dBNO, dNG, dDP, dDB, dBP, dST, 
                    dNTK, dNIR, dTahun, dBulanPenyiasatan, dBandarMukim, dNama, 
                    dEtnik, dAlamat, dTelefon, oElektrik, dRespon
                ) VALUES (
                    :dNoSiri, :dBNO, :dNG, :dDP, :dDB, :dBP, :dST,
                    :dNTK, :dNIR, :dTahun, :dBulanPenyiasatan, :dBandarMukim, :dNama,
                    :dEtnik, :dAlamat, :dTelefon, :oElektrik, :dRespon
                )";*/
                
                //fungsi next akan beritahu script apa action seterusnya
                $output["next"] = "moduls.php?load=survey/setmonth"; 
                if($rs){
                    $exist = true;
                }
    
        }

        $stmt = $conn->prepare($sql);

        if($exist){
            //Data HID berulang
            $output["msg"] = 'No HID Berulang - Sila semak';
            $output["status"] = "error";
            //http_response_code(404);
        }else{
            try {
                $conn->beginTransaction();
                $stmt->execute($data);

                $newid = ($_POST["post_action"]=='edit')? $_POST["data_ID"] : $conn->lastInsertId();
                $output["id"] = $newid;

                //$stmt = $conn->prepare('SELECT * FROM A.id, A.dNoSiri')
                //if($data['dRespon'] !== '01') $output["next"] = 'close';

                //$output['data'] = array(
                    //$newid, $data["dNoSiri"], $data["dNG"],
                    //$data["dBulanPenyiasatan"], $data["dTahun"], $data["dNama"],
                   // $data["dRespon"], date('Y-m-d H:i:s'), "",
               // );

                $conn->commit();

                $output["status"] = "success";
                $output["msg"] = "Berjaya";
            }catch (Exception $e){
                $conn->rollback();
                $output["status"] = "error";
                $output["msg"] = $e->getMessage();
                //http_response_code(404);
            }
        }
    }

}else{
    $output["status"] = "error";
    $output["msg"] = "Sorry";
}

header('Content-type: application/json');
echo json_encode($output);

ob_end_flush();



