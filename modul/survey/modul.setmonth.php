<?php
require_once("modul.object.php");

use app\Module\Survey as survey;

if (!isset($_POST["id"]))  die(survey\modal_error("Parameter ID tidak lengkap."));
//ni dia akan cakap error jika tiada data id


//if (!isset($_POST["Negeri"]))  die(survey\modal_error("Parameter NEGERI tidak lengkap."));
//ni nak guna ke?
//kalau nak guna boleh guna kaedah.... dalam file moduls.php 
//echo json_encode($user);
$negeri = $user["kod_negeri"];  //klu nak guna

$st = $conn->prepare(
    "SELECT A.nosiri_pertubuhan, A.tahun, A.nama_syarikat, B.tarikh_kemaskini as sTime, B.tarikh_hantar as sHantar, B.sukutahun, B.kodrespon, B.id as id_suku
     FROM tbl_rangka as A 
        JOIN tbl_pengesahan as B ON B.nosiri_pertubuhan = A.nosiri_pertubuhan AND B.tahun = A.tahun
     WHERE A.id=?"
); //ambil data dari table rangka bagi id...
$st->execute([$_POST["id"]]);
$rs = $st->fetchAll(PDO::FETCH_OBJ); //FETCH_OBJ
?>

<div id="indiv-frame" class="box">
    <div class="btn-toolbar sticky-top bg-white justify-content-start hidden-print" role="toolbar" aria-label="Toolbar with button group">
        <div class="btn-group btn-group-sm">
            <button type="button" id="individu-back" class="btn btn-sm btn-outline-primary detail"><i class="icon-home text-warning"></i></button>
            <button type="button" id="individu-HS2" data-url="hs2" class="hs btn btn-outline-secondary" style="display: none;">HS2</button>
            <button type="button" id="individu-HS3" data-url="hs3" class="hs btn btn-outline-secondary" style="display: none;">HS3</button>
            <button type="button" id="individu-HS4" data-url="hs4" class="hs btn btn-outline-secondary" style="display: none;">HS4</button>
            <button type="button" id="individu-delete" data-url="delete" class="btn btn-danger" style="display: none;">Padam</button>
        </div>
        <div class="btn-group btn-group-sm">
            <button type="button" id="individu-hantar" data-url="hantar" class="btn btn-info" style="display: none;">Hantar Borang</button>
        </div>
    </div>
    <h4 class="modal-title"><b>BUTIRAN SYARIKAT MENGIKUT SUKU TAHUN</b></h4>
        <div class="form-group row">
            <br>
            <!-- 
                setiap row ada 12 column. col-sm-3 mewakili 3 column, col-sm-9 mewakili 9 column.
                Boleh je kalau tak nak cukupkan jadi 12. tapi dia akan jadi space kosong.
            -->
            <table width="551" border="0" align="left">
                <tr>
                  <td class="col-sm-5 col-form-label text-right">Pilih Suku Tahun :</td>
                  <td>
                      <select required id="data_dSuku" name="data_dSuku" class="form-control form-control-md" style="width: 100%">
                        <option value="0">Sila pilih</option>
                        <option value="1">Suku Tahun Pertama</option>
                        <option value="2">Suku Tahun Kedua</option>
                        <option value="3">Suku Tahun Ketiga</option>
                        <option value="4">Suku Tahun Keempat</option>
                      </select> 
                  </td>
                  <td><button type="submit" class="btn btn-success" onclick="_SUBMIT_()">Tambah Suku</button></td>                  
              </tr>
            </table>
				</div> 
        <br><br>
        <div class="form-group">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No. Siri Pertubuhan</th>
                        <th>Nama Syarikat</th>
                        <th>Suku / Tahun</th>
                        <th>Status Penghantaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $bulan = [1 => 'Suku Tahun Pertama', 2 => 'Suku Tahun Kedua', 3 => 'Suku Tahun Ketiga', 4 => 'Suku Tahun Keempat'];
                    $suku_yg_dah_ada = [];
                    foreach ($rs as $link) { 
                        if ($link->sukutahun !== null) {
                            if (! in_array($link->sukutahun, $suku_yg_dah_ada)) {
                                $suku_yg_dah_ada[] = $link->sukutahun;
                            }
                        }

                        $suku = $bulan[$link->sukutahun] !== null ? $bulan[$link->sukutahun] : 'NULL';
                        // if($i == '1')
                        //     $bulan = "Suku Tahun Pertama";
                        // else if($i == '2')
                        //     $bulan = "Suku Tahun Kedua";
                        // else if($i == '3')
                        //     $bulan = "Suku Tahun Ketiga";
                        // else if($i == '4')
                        //     $bulan = "Suku Tahun Keempat";

                        //tukarkan dalam format Array
                        //tapi nilai bagi bulan tidak bermula 0. Array value bermula 0
                        //nyatakan key bagi array:
                        
                        //bila kita panggil $bulan[1] maka hasilnya Suku Tahun Pertama dan seterusnya
                    ?>
                    <tr>
                        <td><?= $link->nosiri_pertubuhan ?></td>
                        <td><?= $link->nama_syarikat ?></td>
                        
                        <td>
                    <?php if($link->kodrespon == 11) { ?>
                            <button type="button" class="btn btn-default" aria-label="Center Align" onClick="_SUKU_ONCLICK_(<?= $link->id_suku; ?>);" >
                             	<span class="glyphicon glyphicon-pencil" aria-hidden="true"> <?= $suku.' '.$link->tahun; ?> </span>
                            </button>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-default" aria-label="Center Align" disabled>
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"> <?= $suku.' '.$link->tahun; ?> </span>
                        </button>
                    <?php } ?>
                        </td>
                        <td><?= $link->sHantar ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>

<script type="text/javascript">
    
    var _MODAL_ = { suku : <?= json_encode($suku_yg_dah_ada) ?> };
    function _SUBMIT_() {
        //semak kewujudan data suku sebelum papar form... kan?       
        if(_MODAL_.suku.includes($('#data_dSuku').val())){
            alert('Suku Ini Sudah Wujud');
        }else if ($('#data_dSuku').val() == "0"){ 
            alert('Sila Pilih Suku Tahunan');
        }else{
            view = $("#modal-action")
                .modal({backdrop:"static"})
                .on("hidden.bs.modal", function(e){
                    $('#individu').load("moduls.php?load=survey/setmonth", {"id":$data[0]}, function(response, status, xhr){
                        //console.log(response);
                    });			
                });
            
            view.find(".modal-content").load("moduls.php?load=survey/status", {"id":$data[0], "sukutahun": $('#data_dSuku').val()}, function(response, status, xhr){
                //console.log(response);
            });	
        }	

    }

    function _SUKU_ONCLICK_(id_suku) {
        view = $("#modal-action")
            .modal({backdrop:"static"})
            .on("hidden.bs.modal", function(e){
                // $('#individu').load("moduls.php?load=survey/setmonth", {"id":$data[0]}, function(response, status, xhr){
                //     //console.log(response);
                // });			
            });
            
        view.find(".modal-content").load("moduls.php?load=survey/seksyenA", {"id":$data[0], "id_suku": id_suku}, function(response, status, xhr){
            //console.log(response);
        });	
    }

    $(document).ready(function() {  
        $('#indiv-frame .btn-toolbar').on('click','button', function(){
            switch(this.id)
            {
                case 'individu-back':
                    $('#MyTab a[href="#home"]').tab('show');
                    break;
                default:
                    console.log("click", this.id);
                    break;
            }
        });	
    // $(function () {
    //     $('#form_id').on('submit', function (e) {

    //         e.preventDefault();

    //         $.ajax({
    //             type: 'post',
    //             url: 'modul/status.php',
    //             data: $('#form_id').serialize(),
    //             success: function (data)
    //             {
    //                 window.location.href = 'main.php?' + data;
    //             }
    //         });

    //     });

    // });

    });

   
</script>