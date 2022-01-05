<?php
require_once("modul.object.php");

use app\Module\Survey as survey;

if (!isset($_POST["id"]))
    die(survey\modal_error("Parameter ID tidak lengkap."));
//ni dia akan cakap error jika tiada data id

//if (!isset($_POST["Negeri"]))  die(survey\modal_error("Parameter NEGERI tidak lengkap."));
//ni nak guna ke?
//kalau nak guna boleh guna kaedah.... dalam file moduls.php 
//echo json_encode($user);
$negeri = $user["kod_negeri"];  //klu nak guna

$st = $conn->prepare("SELECT * FROM tbl_pengesahan WHERE id=?"); //ambil data dari table rangka bagi id...
$st->execute([$_POST["id_suku"]]);
$rs = $st->fetch(PDO::FETCH_OBJ); //FETCH_OBJ
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h1 class="modal-title"><b>SURVEI SUKU TAHUNAN PERTANIAN DAN ALAM SEKITAR</b><br><small class="text-muted">QUARTERLY AGRICULTURE AND ENVIRONMENT SURVEY</small></b><br></h1>
</div>
<div class="modal-body">

    <?php


    $nSiri = $rs->nosiri_pertubuhan;
    $nYear = $rs->tahun;                //ni tahun dia daftar atau semasa??
    $nSuku = $rs->sukutahun;      //dia ambil sukutahun yg dia pilih kat select kan??

    // function selectA($fieldName, $conn, $whereS)
    // {

    //     $sqlquery = $conn->prepare("select " . $fieldName . " from tbl_survei " . $whereS);
    //     $sqlquery->execute();

    //     $result = $sqlquery->fetchColumn();
    //     return $result;
    // }

    ?>

    <div class="table">
        <div class="row col-md-5">
            <table class="table table-condensed table-bordered">
                <tr class="info">
                    <td><strong>Quarter Rujukan :</strong></td>
                    <td><?php echo $nSuku . '-' . $nYear; ?></td>
                </tr>

                <tr>
                    <td><strong>No. Siri :</strong></td>
                    <td><?php echo $nSiri; ?></td>
                </tr>

                <tr style="background:#0F9;">
                    <td><strong>Tarikh Kemaskini :</strong></td>
                    <td><?php echo $rs->tarikh_kemaskini ?></td>
                </tr>
            </table>
        </div>

        <br>
        <div align="center">
            <table width="361" class="table">
                <tr class="info">
                    <td width="361">
                        <div align="center"><b>JABATAN PERANGKAAN MALAYSIA</b>
                    </td>
                </tr>
            </table>
        </div>
        <br>

        <style>
            .nav-tabs {
                border-bottom: 2px solid #DDD;
            }

            .nav-tabs>li.active>a,
            .nav-tabs>li.active>a:focus,
            .nav-tabs>li.active>a:hover {
                border-width: 0;
            }

            .nav-tabs>li>a {
                border: none;
                color: #ffffff;
                background: #5a4080;
            }

            .nav-tabs>li.active>a,
            .nav-tabs>li>a:hover {
                border: none;
                color: #5a4080 !important;
                background: #fff;
            }

            .nav-tabs>li>a::after {
                content: "";
                background: #5a4080;
                height: 2px;
                position: absolute;
                width: 100%;
                left: 0px;
                bottom: -1px;
                transition: all 250ms ease 0s;
                transform: scale(0);
            }

            .nav-tabs>li.active>a::after,
            .nav-tabs>li:hover>a::after {
                transform: scale(1);
            }

            .tab-nav>li>a::after {
                background: #5a4080 none repeat scroll 0% 0%;
                color: #fff;
            }

            .tab-pane {
                padding: 15px 0;
            }

            .tab-content {
                padding: 20px
            }

            .nav-tabs>li {
                width: 20%;
                text-align: center;
            }

            .card {
                background: #FFF none repeat scroll 0% 0%;
                box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
                margin-bottom: 30px;
            }

            body {
                background: #EDECEC;
                padding: 50px
            }

            @media all and (max-width:724px) {
                .nav-tabs>li>a>span {
                    display: none;
                }

                .nav-tabs>li>a {
                    padding: 5px 5px;
                }
            }
        </style>
        <div class="row">
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#seksyenA" aria-controls="seksyenA" role="tab" data-toggle="tab"><span>Soalan 1 - Soalan 3</span></a></li>
                    <li role="presentation"><a href="#seksyenB" aria-controls="seksyenB" role="tab" data-toggle="tab"><span>Soalan 4 - Soalan 5</span></a></li>
                    <li role="presentation"><a href="#seksyenC" aria-controls="seksyenC" role="tab" data-toggle="tab"><span>Soalan 6 - Soalan 7</span></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="seksyenA">
                        <?php include("modul.tab.seksyenA.php"); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seksyenB">
                        <?php include("modul.tab.seksyenB.php"); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seksyenC">
                        <?php include("modul.tab.seksyenC.php"); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end div responsive -->
    <br />
</div>
<!-- end div modal -->

<div class="modal-footer">
    <input type="hidden" id="data_ID_SUKU" name="data_ID_SUKU" value="<?= $_POST["id_suku"] ?>">
    <div class="btn-toolbar hidden-print" role="toolbar" aria-label="Toolbar with button group">
        <?php if ($_POST["kod_negeri"] != 'hq') { ?>
            <button type="button" id="toolbars-save" class="btn btn-primary btn-sm" onclick="_SAVE_A()">Simpan</button>
        <?php } ?>
    </div>
</div>
<!-- Fungsi JS kita letak last. -->
<!-- ini css yg ganggu -->
<!-- <link href="css/design.css" rel="stylesheet" type="text/css"> -->
<!-- <script src="js/jquery.min.js" type="text/javascript"></script>   -->
<!-- <script type="text/javascript" src="js/javascript-lang.js"></script>
<script src="js/jquery-lang.js" charset="utf-8" type="text/javascript"></script>
<script src="js/langpack/en.js" charset="utf-8" type="text/javascript"></script> -->
<!-- <script type="text/javascript" src="js/chosen.jquery.js"></script> -->
<!-- <script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script> -->


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
                url: "moduls.php?load=survey/seksyenABC/proses",
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