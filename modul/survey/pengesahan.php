<br /><br />
<style>
.CSSTableGenerator {
	width:50%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	background-color:#d9d9f2;
		

}
.CSSTableGenerator td{
	vertical-align:middle;
		background:-o-linear-gradient(bottom, #d9d9f2 5%, #d9d9f2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d9d9f2), color-stop(1, #d9d9f2) ); 
	background:-moz-linear-gradient( center top, #d9d9f2 5%, #d9d9f2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#d9d9f2", endColorstr="#d9d9f2");	background: -o-linear-gradient(top,#d9d9f2,d9d9f2);

	background-color:#d9d9f2;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #333399 5%, #7979d2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #7070db), color-stop(1, #7979d2) );
	background:-moz-linear-gradient( center top, #333399 5%, #7979d2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#333399", endColorstr="#7979d2");	background: -o-linear-gradient(top,#333399,7979d2);

	background-color:#333399;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #333399 5%, #7979d2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #333399), color-stop(1, #7979d2) );
	background:-moz-linear-gradient( center top, #333399 5%, #7979d2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#333399", endColorstr="#7979d2");	background: -o-linear-gradient(top,#333399,7979d2);

	background-color:#333399;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<?php 
$idSerial=$_GET['SerialID'];
function select_forID($fieldName,$conn,$idSerial) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_rangka where nosiri_pertubuhan='$idSerial'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}

function select_getLevel($fieldName,$conn,$idSerial) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_pengguna where name='$idSerial'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}


$syarikatNama=select_forID('nama_syarikat',$conn,$idSerial);
$Getlevel=select_getLevel('level',$conn,$idSerial);

?>
<br /><br /><br />
<form method="post" action="main.php?load=7a">
<table class="CSSTableGenerator" align="center">
  <tr>
    <td colspan="3">Saya mengaku bahawa semua data yang telah di isi adalah benar.</td>
  </tr>
  <tr>
    <td width="124" >Dihantar Oleh</td>
    <td width="7" >:</td>
    <td width="253" ><input type="text" disabled="disabled" name="nama" value="<?php echo $NameUser;?>" readonly="readonly"/></td>
    </tr>
    <tr>
    <td>No Siri</td>
    <td>:</td>
    <td><input type="text" disabled="disabled" name="siri" value="<?php echo $idSerial;?>" readonly="readonly"/>
    <input type="text" disabled="disabled" name="bulan" value="<?php echo $_GET["month"];?>" readonly="readonly" style="width:20px;"/>
    <input type="text" disabled="disabled" name="tahun" value="<?php echo $_GET["IDyear"];?>" readonly="readonly" style="width:40px;"/></td>
  </tr>
  <tr>
    <td>Nama Syarikat</td>
    <td>:</td>
    <td><input type="text" disabled="disabled" name="syarikat" value="<?php echo $syarikatNama; ?>" style="width:300px;" readonly="readonly" /></td>
   </tr>
 <tr>
    <td>Tarikh Penghantaran</td>
    <td>:</td>
    <td><input type="text" disabled="disabled" name="date" value="<?php echo date('l jS \of F Y h:i:s A');?>" style="width:300px;" readonly="readonly"/></td>
  </tr>
  <tr>
    <td colspan="3">
    <div align="center">   
      <input type="submit" class="member" name="hantar" id="hantar" value="Hantar" style="height:30px; width:180px; border:5px medium #000;" onclick="return confirm('Terima kasih atas kerjasama anda. Adakah anda pasti untuk menghantar data ini?')" />
      </div>
     
</td>
  </tr>
</table> </form>

