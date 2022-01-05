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
    }else{
        //Proses data dari form dan simpan dalam 
        //Jika semua ok
        //semak samada action new / edit 
        // die();

        //semak duplicate   1.
        // KENA TENTUKAN DUPLICATE DATA APA?
        // KAT SINI KENA BAWA SUKU DAN TAHUN SEKALI
        $st = $conn->prepare("SELECT * FROM tbl_survei WHERE nosiri_pertubuhan=?");
        $st->execute([$_POST["no_siri"]]); //nak semak no siri mana? samada duplicate atau tak?
        $rs = $st->fetchAll(PDO::FETCH_ASSOC);
        //echo json_encode($st);
        
        switch($_POST["post_action"])
        {
            case "delete":
                $data = [
                    'nosiri_pertubuhan' => $_POST["no_siri"]
                ];
                $sql = "DELETE FROM tbl_survei WHERE nosiri_pertubuhan=:nosiri_pertubuhan";
                $output["next"] = "close";      //to close modal
                break;
            case "edit":

                //jika update medan tertentu sahaja
                //Ad new data / edit
                $data = [
                    'nosiri_pertubuhan' => htmlentities($_POST["no_siri"]),
                    '010101'    => htmlentities($_POST["data_010101"]),
                    '010201'    => htmlentities($_POST["data_010201"]),
                    '010202'    => htmlentities($_POST["data_010202"]),
        
                ];

                // ni dia uji data baru ngan data lama sama tak... kalau sama ia anggap duplicate.
                if($rs) // check ada dalam db, so buat proses update
                {
                    if($_POST["no_siri"] !== $rs[0]['nosiri_pertubuhan']){
                        $exist = true;
                    }

                    if($_POST["no_siri"] == $rs[0]['nosiri_pertubuhan'])
                    {
                        $sql = "UPDATE tbl_survei 
                        SET 
                            `010101`=:d010101, `010201`=:d01001, `010202`=:d010202
                                      
                        WHERE 
                        nosiri_pertubuhan = :nosiri_pertubuhan";
                    } 
                    
                }
                else // insert data baru sebab takde data
                {
                    $sql = "INSERT INTO tbl_survei (
                        nosiri_pertubuhan, `010101`, `010201`, `010202`
                    ) VALUES (
                        :nosiri_pertubuhan, :d010101, :d010201, :d010202
                    )";
                }            

                $output["next"] = "close";      //to close modal

                break;
            
                if($rs){
                    $exist = true;
                }
    
        }

        $stmt = $conn->prepare($sql);

        if($exist){
            //Data HID berulang
            $output["msg"] = 'No HID Berulang - Sila semak';
            $output["status"] = "error";
            
        }else{
            try {
                $conn->beginTransaction();
                $stmt->execute($data);

                $newid = ($_POST["post_action"]=='edit')? $_POST["data_ID"] : $conn->lastInsertId();
                $output["id"] = $newid;
                $conn->commit();

                $output["status"] = "success";
                $output["msg"] = "Berjaya";
            }catch (Exception $e){
                $conn->rollback();
                $output["status"] = "error";
                $output["msg"] = $e->getMessage();
                
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



