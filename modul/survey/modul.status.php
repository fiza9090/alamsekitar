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

$st = $conn->prepare("SELECT * FROM tbl_rangka WHERE id=?"); //ambil data dari table rangka bagi id...
$st->execute([$_POST["id"]]);
$rs = $st->fetch(PDO::FETCH_OBJ); //FETCH_OBJ
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h6 class="modal-title"><b></b><br></h6>
</div>
<div class="modal-body">
    <small class="error alert-danger m-0 mr-1 p-2" style="display: none"></small>
    <form>
        <style>
            .zui-table {
                border: solid 1px #066;
                border-collapse: collapse;
                border-spacing: 0;
                font: normal 13px Arial, sans-serif;
                margin: 50 0 0 0;

            }

            .zui-table thead th {
                background-color: #DDEFEF;
                border: solid 1px #066;
                color: #336B6B;
                padding: 10px;
                text-align: left;
                text-shadow: 1px 1px 1px #fff;
            }

            .zui-table tbody td {
                border: solid 1px #066;
                color: #333;
                padding: 10px;
                text-shadow: 1px 1px 1px #fff;
            }

            .myButton {
                -moz-box-shadow: inset 0px 1px 0px 0px #9acc85;
                -webkit-box-shadow: inset 0px 1px 0px 0px #9acc85;
                box-shadow: inset 0px 1px 0px 0px #9acc85;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
                background: -moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
                background: -webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
                background: -o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
                background: -ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
                background: linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#74ad5a', endColorstr='#68a54b', GradientType=0);
                background-color: #74ad5a;
                border: 1px solid #3b6e22;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: Arial;
                font-size: 14px;
                font-weight: bold;
                padding: 15px 55px;
                text-decoration: none;
            }

            .myButton:hover {
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #68a54b), color-stop(1, #74ad5a));
                background: -moz-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
                background: -webkit-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
                background: -o-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
                background: -ms-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
                background: linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#68a54b', endColorstr='#74ad5a', GradientType=0);
                background-color: #68a54b;
            }

            .myButton:active {
                position: relative;
                top: 1px;
            }
        </style>
        <div align="center">

            <?php
            $nSiri = $rs->nosiri_pertubuhan;
            $nYear = $rs->tahun;                //ni tahun dia daftar atau semasa??
            $nSuku = $_POST['sukutahun'];      //dia ambil sukutahun yg dia pilih kat select kan??
            ?>

            <input name="nosiri_pertubuhan" type="hidden" value="<?php echo $nSiri ?>" />
            <input name="sukutahun" type="hidden" value="<?php echo $nSuku ?>" />
            <input name="tahun" type="hidden" value="<?php echo $nYear ?>" />
            <input name="nama_syarikat" type="hidden" value="<?php echo $rs->nama_syarikat ?>" />

            <table width="100%" border="1" class="zui-table" style="margin: 0;">
                <thead>
                    <tr>
                        <th colspan="3" align="center">Status Syarikat Mengikut Suku</th>
                    </tr>
                </thead>
                <tr>
                    <?php

                    $smt2 = $conn->prepare('select * From lookup_kodrespon order by kodrespon ASC');
                    $smt2->execute();
                    $data2 = $smt2->fetchAll();

                    //  komen	
                    //$tarikhTerima=SELECT('tarikh_kemaskini','tbl_pengesahan',$conn,$nSiri,$nSuku,$nYear);
                    $codeRespon = SELECT('kodrespon', 'tbl_pengesahan', $conn, $nSiri, $nSuku, $nYear);
                    $cSebab = SELECT('sebab', 'tbl_pengesahan', $conn, $nSiri, $nSuku, $nYear);
                    ?>

                <tr>
                    <td>No Siri </td>
                    <td>:</td>
                    <td colspan="3"><?php echo $nSiri;  ?></td>
                </tr>
                <tr>
                    <td>Nama Syarikat</td>
                    <td>:</td>
                    <td colspan="3"><?php echo $rs->nama_syarikat ?></td>
                </tr>
                <tr>
                    <td>MSIC</td>
                    <td>:</td>
                    <td colspan="3"><?php echo $rs->msic ?></td>
                </tr>
                <tr>
                    <td>Tarikh Terima</td>
                    <td>:</td>
                    <td><input type="date" name="tterima" id="tterima" value="<?php echo date("Y-m-d") ?>" />
                        <p id="terima"></p>
                    </td>
                </tr>
                <tr>
                    <td>Kod Respon</td>
                    <td>:</td>
                    <td>
                        <select required name="lst_respon" id="lst_respon" onchange="changeTextBox()" class="form-control form-control-md">
                            <option value="">-- Sila Pilih --</option>
                            <?php foreach ($data2 as $row2) : ?>
                                <?php if (!empty($codeRespon) && $codeRespon == $row2["kodrespon"]) { ?>
                                    <option value="<?php echo $row2["kodrespon"]; ?>" selected><?php echo $row2["kodrespon"] . ' - ' . $row2["keterangan"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row2["kodrespon"]; ?>"><?php echo $row2["kodrespon"] . ' - ' . $row2["keterangan"]; ?></option>
                                <?php } ?>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr class="reason">
                    <td>Sebab</td>
                    <td>:</td>
                    <td><input type="textbox" id="sebab" name="sebab" value="<?php echo $cSebab; ?>" style="width:630px; height:50px" /></td>
                </tr>
            </table>

    </form>
</div>
<div class="modal-footer">
    <div class="btn-toolbar hidden-print" role="toolbar" aria-label="Toolbar with button group">
        <button type="button" id="toolbars-save" class="btn btn-primary btn-sm" onclick="_MODAL_.save()">Teruskan</button>
    </div>
</div>

<script type='text/javascript'>
    $.validator.messages.required = "";
    $form = $("#modal-action");

    $.validator.setDefaults({
        ignore: ":hidden:not(.chosen-select)"
    });
    var validator = $('form', $form).validate({
        rules: {
            //sebab: {required: true},
            lst_respon: {
                required: true
            }
        },
        invalidHandler: function(e, validator) {
            //console.log("invalid Handler");
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1 ? 'Masih ada 1 medan wajib perlu diisi. Sila semak' : 'Sila isikan medan yang wajib.  ' + errors + ' medan.  Bertanda Merah.';
                $("small.error").html(message);
                $("small.error").show();
            } else {
                $("small.error").hide();
            }
        },
        submitHandler: function(form) {
            console.log("SUBMIT HANDLER");
            $.ajax({
                method: "POST",
                url: "moduls.php?load=survey/status/proses",
                data: $(form).serialize(),
                success: function(d) {
                    //console.log(d);
                    //var d = result.responseJSON;

                    //disini dia harap server reply status = error|success jika tiada keduanya maka defaul ialah hubungi pegawai
                    //jika server reply status = error maka paparkan msg ralat
                    //jika server reply status = success maka laksanakan arahan seterusnya.
                    switch (d.status) {
                        case "error": //samada error
                            alert("!! RALAT !!\n" + d.msg);
                            break;
                        case "success": //success
                            alert(d.msg);
                            view.modal("hide");
                            break;
                        case "redirect":
                            view.find(".modal-content").load("moduls.php?load=survey/" + d.href, {
                                "id": d.pengesahan_id
                            }, function(response, status, xhr) {
                                //console.log(response);
                            });
                            break;
                        default: //atau lain-lain
                            alert("Rujuk pegawai terlibat.");
                    }
                }
            });
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            //error.addClass("help-block");
            //error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {

            if (element.type == "radio") {
                $(element).closest(".btn-group").addClass("is-invalid").removeClass(validClass);
            } else if (element.type == "select-one") {
                $('#' + element.name + '_chzn').addClass("is-invalid").removeClass(validClass);
            } else {
                $(element).addClass("is-invalid").removeClass(validClass);
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            if (element.type == "radio") {
                $(element).closest(".btn-group").addClass(validClass).removeClass("is-invalid");
            } else if (element.type == "select-one") {
                $('#' + element.name + '_chzn').addClass(validClass).removeClass("is-invalid");
            } else {
                $(element).addClass(validClass).removeClass("is-invalid");
            }
        }
    });

    _MODAL_.save = function() {
        console.log('SAVE', $('form', $form));
        if (validator.form()) $('form', $form).submit();
    }

    function changeTextBox() {
        var val = $('#lst_respon').val();

        if (val != '11') {
            $('.reason').show();
        } else {
            $('.reason').hide();
        }
    }

    $(document).ready(function() {
        var val = $('#lst_respon').val();

        if (val != '11') {
            $('.reason').show();
        } else {
            $('.reason').hide();
        }

        /* Rasanya tak perlu kalau guna konsep modal ni.
    function GetURLParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) 
            {
                var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam) 
                    {
                        return sParameterName[1];
                    }
            }
    }
	
	var IDs = GetURLParameter('SerialID');
	var SukuS = GetURLParameter('sukutahun');
	var YearS = GetURLParameter('IDyear');
    */

        //////////////////////////////////////////////////////

        // $("#lst_cterima").change(function(){


        // 	var cterima=$("#lst_cterima").val();

        // 	var dataString = "idCTerima="+cterima+"&idTerima="+IDs+"&monthID="+SukuS+"&yearID="+YearS;

        // 		$.ajax({
        // 		type: "POST",
        // 		url: "internalUser/ajaxCterima.php",
        // 		data: dataString,
        // 		cache: false,
        // 		success: function(html)
        // 				   {              
        // 						//alert(html);					
        // 						$("#terima").empty();
        // 						$("#terima").append(html);
        // 						$("#tterima").hide();
        // 				   }
        // 				});
        // 		});        
    });
</script>