<?php
require_once("modul.object.php");

use app\Module\Survey as survey;

if (!isset($_POST["id"]))  die(survey\modal_error("Parameter ID tidak lengkap."));
//ni dia akan cakap error jika tiada data id


//if (!isset($_POST["Negeri"]))  die(survey\modal_error("Parameter NEGERI tidak lengkap."));
//ni nak guna ke?
//kalau nak guna boleh guna kaedah.... dalam file moduls.php 
//echo json_encode($user);
$negeri = $user["kod_negeri"];  //kot-kot nak guna

$st = $conn->prepare("SELECT * FROM tbl_rangka WHERE id=?"); //ambil data dari table rangka bagi id...
$st->execute([$_POST["id"]]);
$rs = $st->fetch(PDO::FETCH_ASSOC); //FETCH_OBJ

?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><b>PROFIL PERTUBUHAN SYARIKAT</b></h4>
</div>
<div class="modal-body">
    <form>
        <div class="form-group row">
            <!-- 
                setiap row ada 12 column. col-sm-3 mewakili 3 column, col-sm-9 mewakili 9 column.
                Boleh je kalau tak nak cukupkan jadi 12. tapi dia akan jadi space kosong.
            -->
            <label for="data_dPertubuhan" class="col-sm-3 col-form-label">No. Siri Pertubuhan</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control input-sm" id="data_dPertubuhan" name="data_dPertubuhan" value="<?= $rs["nosiri_pertubuhan"] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dSyarikat" class="col-sm-3 col-form-label">Nama Syarikat</label>
            <div class="col-sm-9">
                <input disabled type="text" class="form-control input-sm" id="data_dSyarikat" name="data_dSyarikat" value="<?= $rs["nama_syarikat"] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dMSIC" class="col-sm-3 col-form-label">Kod MSIC</label>
            <div class="col-sm-9">
                <input disabled type="text" class="form-control input-sm" id="data_dMSIC" name="data_dMSIC" value="<?= $rs["msic"] ?>">
            </div>
        </div>
        <div class="form-group">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pegawai</th>
                        <th>Emel</th>
                        <th>No. Telefon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td><input type="text" class="form-control input-sm" id="data_dPic1" name="data_dPic1" value="<?= ($rs["pic1"]) ?>"></td>
                        <td><input type="text" class="form-control input-sm" id="data_dEmel1" name="data_dEmel1" value="<?= $rs["emel1"] ?>"></td>
                        <td><input type="text" class="form-control input-sm" id="datadNotel1" name="datadNotel1" value="<?= $rs["notel1"] ?>"></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><input type="text" class="form-control input-sm" id="data_dPic2" name="data_dPic2" value="<?= ($rs["pic2"]) ?>"></td>
                        <td><input type="text" class="form-control input-sm" id="data_dEmel2" name="data_dEmel2" value="<?= $rs["emel2"] ?>"></td>
                        <td><input type="text" class="form-control input-sm" id="datadNotel2" name="datadNotel2" value="<?= $rs["notel2"] ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- dua value ini perlu untuk fungsi edit data jika sudah wujud -->
        <input type="hidden" id="data_ID" name="data_ID" value="<?= $_POST["id"] ?>">
        <input type="hidden" id="post_action" name="post_action" value="<?= ($rs) ? 'edit' : 'new' ?>">
        <!-- 
            =($rs)?'edit':'new' fungsi ini akan tentukan samada data form ini new atau edit 
            Jika $rs tiada value, dia akan beritahu new, jika ada value dia beritahu edit.
         -->
    </form>
</div>
<div class="modal-footer">
    <div class="btn-toolbar hidden-print" role="toolbar" aria-label="Toolbar with button group">
        <?php if ($_POST["kod_negeri"] != 'hq') { ?>
            <button type="button" id="toolbars-save" class="btn btn-primary btn-sm" onclick="_SAVE_()">Simpan</button>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    var $form;
    $.validator.messages.required = "";

    <?php
    //bila kita comment kat atas maka kat sini kena comment
    // if ($rs) {
    //     echo 'var dt = ' . json_encode($rs) . ';';
    // }
    ?>
    $.validator.setDefaults({
        ignore: ":hidden:not(.chosen-select)"
    });
    var validator = $('form', $form).validate({
        rules: {
            data_BNO: {
                required: true
            },
            data_DP: {
                required: true,
                digits: true
            },
            data_DB: {
                required: true,
                digits: true
            },
            data_BP: {
                required: true,
                digits: true
            },
            data_ST: {
                required: true,
                digits: true
            },
            data_NOTK: {
                required: true,
                digits: true
            },
            data_NOIR: {
                required: true,
                digits: true
            },
            data_BULAN: {
                required: true,
                digits: true
            },
            data_TAHUN: {
                required: true,
                digits: true
            },
            data_dTelefon: {
                digits: true
            }
        },
        invalidHandler: function(e, validator) {
            //console.log("invalid Handler");
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1 ? 'Masih ada 1 medan wajib perlu diisi. Sila semak' : 'Sila isikan medan yang wajib.  ' + errors + ' medan.  Bertanda Merah.';
                $("div.error").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        },
        submitHandler: function(form) {
            console.log('profile.submitHandler');
            $.ajax({
                method: "POST",
                url: "moduls.php?load=survey/profile/proses",
                data: $(form).serialize(),
                success: function(d) {
                    //console.log(d);
                    //var d = result.responseJSON;
                    switch (d.status) {
                        case "error":
                            alert("!! RALAT !!\n" + d.msg);
                            break;
                        case "success":
                            alert(d.msg);
                            //console.log(result.responseJSON.data);
                            table.row.add(result.responseJSON.data).draw();
                            table.clearPipeline().draw();
                            if (d.next == "close") {
                                view.modal("hide");
                            } else {
                                view.find(".modal-content").load(d.next, {
                                    "id": d.id
                                }, function(response, status, xhr) {
                                    //console.log(response);
                                });
                            }
                            /*
                            view.find(".modal-content").load("modul.php?load=survey/hs2", {
                                "id": result.responseJSON.id
                            }, function(response, status, xhr) {
                                //console.log(response);
                            });
                            */
                            break;
                        default:
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
        //highlight: function(element, errorClass, validClass) {
        //if (element.type == "radio") {
        //$(element).closest(".btn-group").addClass("is-invalid").removeClass(validClass);
        // } else {
        // $(element).addClass("is-invalid").removeClass(validClass);
        // }
        //},
        //unhighlight: function(element, errorClass, validClass) {
        // if (element.type == "radio") {
        // $(element).closest(".btn-group").addClass(validClass).removeClass("is-invalid");
        //} else {
        //$(element).addClass(validClass).removeClass("is-invalid");
        //}
        //}

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

    function _SAVE_() {
        if (validator.form()) $('form', $form).submit();
    }

    $(document).ready(function() {
        $form = $("#modal-action");

        // $('#data_dSyarikat', $form).val((table.row('.selected').data())[2]); //saya off yg js


        // $(".chosen-select").chosen({
        //     allow_single_deselect: true,
        //     inherit_select_classes: true,
        // });

        //$("#modal-action #toolbars-save").on("click", function() {
        //console.log("Save Click");
        //if (validator.form()) $('form', $form).submit();
        //});

        <?php
        //inipun sama... part yang rs kat atas
        // if ($rs) {
        //     echo '$.each(dt[0], function(idx, obj) {
        //         if(idx.charAt(0)=="o") {
        //             //untuk radio
        //             $("#data_"+ idx +"_"+ obj).attr( "checked", true ).parent().button("toggle")
        //         }else{
        //             $el = $("#data_" + idx);
        //             $el.val(obj);
                    
        //             //untuk chosen-select
        //             if($el.hasClass("chosen-select")) $el.trigger("liszt:updated");
        //         }

    	// 		//console.log(idx, obj);
		//  })';
        // }
        ?>


    });
</script>