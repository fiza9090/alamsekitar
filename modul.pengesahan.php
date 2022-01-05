<?php
require_once("modul.object.php");

use app\Module\Survey as survey;
//echo json_encode($user);
//$negeri = $user["kod_negeri"]; 

if (!isset($_POST["id"]))  die(survey\modal_error("Parameter ID tidak lengkap."));
//ni dia akan cakap error jika tiada data id

//echo $_POST["id"];  
$modul = $_POST["modul"];
$datesend = date("Y-m-d H:i:s");


//if (!isset($_POST["Negeri"]))  die(survey\modal_error("Parameter NEGERI tidak lengkap."));
//ni nak guna ke?
//kalau nak guna boleh guna kaedah.... dalam file moduls.php 
//echo json_encode($user);
//$negeri = $user["kod_negeri"];  //kot-kot nak guna

$st = $conn->prepare(
	"SELECT A.nosiri_pertubuhan, A.tahun, A.nama_syarikat, B.tarikh_kemaskini as sTime, B.sukutahun
     FROM tbl_rangka as A 
         JOIN tbl_pengesahan as B ON B.nosiri_pertubuhan = A.nosiri_pertubuhan AND B.tahun = A.tahun
     WHERE B.id=?"
);
//$st = $conn->prepare("SELECT * FROM tbl_pengesahan WHERE id=?"); //ambil data dari table pengesahan bagi id...
$st->execute([$_POST["id"]]);
$rs = $st->fetch(PDO::FETCH_ASSOC); //FETCH_OBJ
//die (json_encode($_POST["id"]));
//echo json_encode($negeri);

?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><b>PENGESAHAN BORANG UNTUK DIHANTAR</b></h4>
</div>

<div class="modal-body">
	<form>
		<div class="form-group row">
			<label for="data_dPertubuhan" class="col-sm-3 col-form-label">No. Siri Pertubuhan</label>
			<div class="col-sm-3">
				<input type="text" readonly class="form-control input-sm" id="data_dPertubuhan" name="data_dPertubuhan" value="<?= $rs["nosiri_pertubuhan"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="data_dSuku" class="col-sm-3 col-form-label">Suku Tahun Penyiasatan</small></label>
			<div class="col-sm-3">
				<input readonly type="text" class="form-control form-control-sm" id="data_dSuku" name="data_dSuku" style="margin:0;outline:0;width:100%" value="<?= $rs["sukutahun"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="data_dTAHUN" class="col-sm-3 col-form-label">Tahun Penyiasatan</label>
			<div class="col-sm-3">
				<input readonly type="text" maxlength="4" class="form-control form-control-sm" id="data_dTAHUN" name="data_dTAHUN" style="margin:0;outline:0;width:100%" value="<?= $rs["tahun"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="data_dNama" class="col-sm-3 col-form-label">Nama Pegawai</label>
			<div class="col-sm-3">
				<input readonly type="text" class="form-control form-control-sm" id="data_dNama" name="data_dNama" style="margin:0;outline:0;width:100%" value="<?= $user["name"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="dJawatan" class="col-sm-3 col-form-label">Jawatan</label>
			<div class="col-sm-3">
				<input readonly type="text" class="form-control form-control-sm" id="dJawatan" name="dJawatan" style="margin:0;outline:0;width:100%" value="<?= $user["jawatan"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="d" class="col-sm-3 col-form-label">Tarikh & Masa</label>
			<div class="col-sm-3">
				<input readonly type="text" class="form-control form-control-sm" id="dsend" name="dsend" style="margin:0;outline:0;width:100%" value="<?= $datesend ?>">
			</div>
		</div>
		<p>
		<h5>Saya mengaku bahawa maklumat yang diberikan dalam borang ini adalah benar, betul dan lengkap. Terima kasih atas kerjasama anda.</h5>
		</P>
		<input type="hidden" id="data_ID" name="data_ID" value="<?= $_POST["id"] ?>">
		<input type="hidden" id="post_action" name="post_action" value="hantar">
	</form>
</div>

<div class="modal-footer">
    <div class="btn-toolbar hidden-print" role="toolbar" aria-label="Toolbar with button group">
            <button type="button" id="toolbars-save" class="btn btn-primary btn-sm" onclick="_SAVE_()">Hantar</button>
    </div>
</div>

<script type="text/javascript">

	function _SAVE_() {
        if (validator.form()) $('form', $form).submit();
    }
</script>