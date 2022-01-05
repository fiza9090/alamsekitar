<?php

$output = [];
// ini adalah declare $output sebagai array


// kat sini apa yang awak buat dalam modul.status.prosess.php
// contohnya.




// last page tu.....
// dia akan response / echo maklumat ni...


//$output tu ada adalah array object.

// Apa yang kita perlu buat ialah agar dia echo sesuatu seperti berikut
// {status: 'success || error'}

// untuk itu kita kena masukkan satu key array pada $output
// sekarang ni $output tiada data.

// bila kita add key status pada array $output barula data status akan dihantar.

try {
    // code...
    // Jika tiadaa error maka ia akan berakhir dengan $output key status = success dan nyatakan key msg = ??


    //echo "$kalau HAHAHA";
    // sama juga kalau saya throw error

    // run_funct5ion();


    $output['status'] = 'success';
    $output['msg'] = "BERJAYA";

} catch (\Throwable $th) {
    //Jika beelaku sebarang error dalam proses

    $output['status'] = 'error';
    $output['msg'] = $th->getMessage();

}



// $output['status'] = 'not in case';        // JAWAPAN BAGI KEY STATUS
// $output['msg'] = 'Berjaya';   // JAWAPAN BAGI KEY MSG

// sebab dekat status ada d.status dan d.msg
// ada dua key yang kita hantar iaitu status, msg
// output dia akan jadi {status: 'error', msg: 'Contoh sahaja'}

header('Content-type: application/json');
echo json_encode($output);

?>