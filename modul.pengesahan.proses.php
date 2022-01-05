<?php

$error = [];
$output = [];

ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Ini adalah penting untuk secure post method

    if (!isset($_POST["data_ID"])) $error[] = array('type' => 'ID', 'msg' => 'Parameter ID tidak lengkap.');
    //data_ID ni untuk data yg dah ada dlm database

    if (!isset($_POST["post_action"])) $error[] = array('type' => 'POST', 'msg' => 'Parameter ARAHAN tidak lengkap.');
    //post_action ni akan appear sebagai new / edit 

    if ($error) {
        //jika ada sebarang data yng tidak wujud akan menyebabkan error dikesan.
        foreach ($error as $ob)    // Where $list is the list containing the objects
        {
            $output["msg"] .= $ob["type"] . ' : ' . $ob["msg"];
        }

        $output["status"] = "error";
    } else {
        //Proses data dari form dan simpan dalam //Jika semua ok  //semak samada action new / edit 

        //Ad new data / edit
        $data = [
            'tarikh_hantar'    => htmlentities($_POST["dsend"]),
        ];

        switch ($_POST["post_action"]) {
            default: 

                //jika update medan tertentu sahaja
                $data = [
                    'tarikh_hantar'   => $_POST["dsend"],
                ];

                $data['id'] = $_POST["data_ID"];

                $sql = "UPDATE tbl_pengesahan 
                        SET 
                        tarikh_hantar=:tarikh_hantar                              
                        WHERE 
                            id = :id";

                $output["next"] = "close";      //to close modal
                break;
          
        }
    
        $stmt = $conn->prepare($sql);

            try {
                $conn->beginTransaction();
                $stmt->execute($data);

                $newid = ($_POST["post_action"] == 'edit') ? $_POST["data_ID"] : $conn->lastInsertId();
                $output["id"] = $newid;

                $conn->commit();

                $output["status"] = "success";
                $output["msg"] = "Berjaya";
            } catch (Exception $e) {
                $conn->rollback();
                $output["status"] = "error";
                $output["msg"] = $e->getMessage();
                //http_response_code(404);
            }
        }
    }
 else {
    $output["status"] = "error";
    $output["msg"] = "Sorry";
}

header('Content-type: application/json');
echo json_encode($output);

ob_end_flush();
