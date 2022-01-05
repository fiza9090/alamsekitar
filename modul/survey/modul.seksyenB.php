<link href="css/design.css" rel="stylesheet" type="text/css">

<script src="js/jquery.min.js" type="text/javascript"></script>  

<script type="text/javascript" src="js/javascript-lang.js"></script>
<script src="js/jquery-lang.js" charset="utf-8" type="text/javascript"></script>
<script src="js/langpack/en.js" charset="utf-8" type="text/javascript"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script type="text/javascript">

window.lang = new jquery_lang_js();
	$().ready(function () {
		window.lang.run();
	});

jQuery(document).ready(function(){
$(".010202").prop("disabled", true);
		$("#radio_010202g").click(function () {
			if($('#radio_010202g').is(':checked')) 			            { 
				$(".010202").prop("disabled", false);
    		}
		});
		
		$("010201a").click(function () {
			if($('#010202a').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
		
		$("#010201b").click(function () {
			if($('#010201b').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
		
		$("#010201c").click(function () {
			if($('#010201c').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
		
		$("#010201d").click(function () {
			if($('#010201d').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
		
		$("#010201e").click(function () {
			if($('#010201e').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
		
		$("#010201f").click(function () {
			if($('#010201f').is(':checked')) 			            { 
				$(".010202").prop("disabled", true);
				$('#010202').val('');
    		}
		});
});

</script>

<style> 
.lastmonth {
	
	color:blue;
	text-align:left;
}

.notafont{
font-size:10px;
font-family: Verdana, Arial, Helvetica, sans-serif;
}

.style1 {font-weight: bold}
</style>


<?php 
// old
// $getYear=$_GET['IDyear'];
// $getMonth_this=$_GET['month'];

// new
$noSiri = $_GET['nosiri'];
$getYear = $_GET['tahun'];
$sukutahun = $_GET['sukutahun'];

// $getQuarter=($getMonth_this / 3);


// $glastmonth=$getMonth_this-1;

// if($getMonth_this==1){
// 	$monthSet=12;
// 	$yyYear=$getYear-1;
// 	}
// else{
// 	$monthSet=$getMonth_this - 1;
// 	$yyYear=$getYear;
// 	}

// $noSiriB=select_rangka('nosiri_pertubuhan',$conn,$valNoSiri1);

// $whereS="WHERE nosiri_pertubuhan='$noSiriB' AND bulan='$getMonth_this' AND tahun='$getYear'";

function selectB($fieldName,$conn,$whereS) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_survei ".$whereS);
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}

/*echo $getYear;
echo $getMonth_this;
echo $monthSet;*/
?>

<form action="main.php?load=7" class="form-inline" method="post" onsubmit="return v2();" id="bRP">
<input name="nosiri" type="hidden" value="<?php echo $noSiri;?>" />
<input name="sukutahun" type="hidden" value="<?php echo $_GET['sukutahun'];?>" />
<input name="tahun" type="hidden" value="<?php echo $_GET['tahun'];?>" />
<input name="userlevel" type="hidden" value="<?php echo $levelUser;?>" />

<br /><br /><br /><br /><br /><br />
<div class="table-responsive">
<table style="max-width:400px;">
  <tr class="info">
    <td><strong>Quarter Rujukan :</strong></td>
    <td><?php echo $sukutahun.'-'.$getYear;
	

	?></td>
  </tr>
 <tr>
    <td><strong>No. Siri :</strong></td>
    <td><?php echo $noSiri;?></td>
  </tr>
<input name="bulan_ganti" type="hidden" value="<?php echo $monthSet;?>" />


  <tr style="background:#0F9;">
    <td><strong>Tarikh Kemaskini :</strong></td>
	    <td><?php echo selectB('tarikh_kemaskini',$conn,$whereS) ?></td>


  </tr>
</table>
<BR />
<div align="center">
  <table width="361" class="table">
    <tr class="info">
      <td width="361"><div align="center"><b>JABATAN PERANGKAAN MALAYSIA</b></td>
    </tr>
  </table>
</div>
<div align="center">
  <table class="table">
    <tr class="info">
      <td><div align="center"><b>SURVEI SUKU TAHUNAN PERTANIAN DAN ALAM SEKITAR</b><BR />
          <em>QUARTERLY AGRICULTURE AND ENVIRONMENT SURVEY</em></div></td>
    </tr>
  </table>
</div><br />
<table width="90%" align="center">
  <tr>
    <td><div align="justify"></div>
      <table width="100%">
        <tr class="style1" > </tr>
  
  <tr bgcolor="#9494b8">
    <td colspan="7"><strong>5. PEKERJA (PADA AKHIR SUKU TAHUN)</strong><br /> 
      <em>&nbsp;&nbsp;&nbsp;&nbsp;PERSON ENGAGED (AS AT END QUARTERS)</em></td>
  </tr>
 
 <tr bgcolor="#3d3d5c">
	<td colspan="7" align="center"><strong><font color="#FFFFFF">BULAN 1 QUARTER x</font></strong>	</td>
 </tr>
 
    <tr>
	<td colspan="3" rowspan="2"><div align="center"> <strong>Kategori pekerja</strong><br />
    <em>Category of workers</em></div></td>
    <td width="153" align="center"><strong>Lelaki</strong><br /><em>Male</em></td>
    <td width="159" align="center"><strong>Perempuan</strong><br /><em>Female</em></td>
    <td width="154" align="center"><strong>Jumlah </strong><br /><em>Total</em></td>
	<td width="154" align="center"><strong>Gaji & upah </strong><br /><em>Salaries & wages</em></td>
  </tr> 
  
  <tr>
    <td><div align="center"><font size="1">0541</font></div></td>
    <td><div align="center"><font size="1">0542</font></div></td>
	<td><div align="center"><font size="1">0543</font></div></td>
	<td><div align="center"><font size="1">0544</font></div></td>
  </tr>
 
  <tr>
    <td><strong>a.</strong></td>
    <td width="50%" colspan="2"><div align="right"><font size="1">01</font></div><strong>Pemilik yang bekerja, rakan niaga yang aktif dan pekerja keluarga tidak bergaji </strong> <br />
	<em>Working proprietors, active business partners and unpaid family workers</em></td>
    <td><div align="center"><input align="right" name="054101" type="text" id="054101" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054201" type="text" id="054201" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054301" type="text" id="054301" size="10" value="0"/></div></td>
	 <td bgcolor="#47476b">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong>b.</strong></td>
    <td colspan="2"><div align="right"><font size="1">02</font></div><strong>Pekerja bergaji (sepenuh masa)</strong> <br />
	<em>Paid employees (full-time)</em></td>
    <td><div align="center"><input align="right" name="054102" type="text" id="054102" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054202" type="text" id="054202" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054302" type="text" id="054302" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="054402" type="text" id="054402" size="10" value="0"/></div></td>
  </tr>
  
  <tr>
    <td><strong>c.</strong></td>
    <td colspan="2"><div align="right"><font size="1">03</font></div><strong>Pekerja bergaji (sambilan)</strong> <br />
	<em>Paid employees (part-time)</em></td>
    <td><div align="center"><input align="right" name="054103" type="text" id="054103" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054203" type="text" id="054203" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054303" type="text" id="054303" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="054403" type="text" id="054403" size="10" value="0"/></div></td>
  </tr>  
  
  <tr>
    <td><strong>d.</strong></td>
    <td colspan="2"><div align="right"><font size="1">04</font></div><strong>JUMLAH BESAR</strong> <br />
	<em>GRAND TOTAL</em></td>
    <td><div align="center"><input align="right" name="054104" type="text" id="054104" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054204" type="text" id="054204" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="054304" type="text" id="054304" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="054404" type="text" id="054404" size="10" value="0"/></div></td>
  </tr>
  
   <tr bgcolor="#3d3d5c">
	<td colspan="7" align="center"><strong><font color="#FFFFFF">BULAN 2 QUARTER x</font></strong>	</td>
   </tr>
 
    <tr>
	<td colspan="3" rowspan="2"><div align="center"> <strong>Kategori pekerja</strong><br />
    <em>Category of workers</em></div></td>
    <td width="153" align="center"><strong>Lelaki</strong><br /><em>Male</em></td>
    <td width="159" align="center"><strong>Perempuan</strong><br /><em>Female</em></td>
    <td width="154" align="center"><strong>Jumlah </strong><br /><em>Total</em></td>
	<td width="154" align="center"><strong>Gaji & upah </strong><br /><em>Salaries & wages</em></td>
  </tr> 
  
  <tr>
    <td><div align="center"><font size="1">0551</font></div></td>
    <td><div align="center"><font size="1">0552</font></div></td>
	<td><div align="center"><font size="1">0553</font></div></td>
	<td><div align="center"><font size="1">0554</font></div></td>
  </tr>
 
  <tr>
    <td><strong>a.</strong></td>
    <td colspan="2"><div align="right"><font size="1">01</font></div><strong>Pemilik yang bekerja, rakan niaga yang aktif dan pekerja keluarga tidak bergaji </strong> <br />
	<em>Working proprietors, active business partners and unpaid family workers</em></td>
    <td><div align="center"><input align="right" name="055101" type="text" id="055101" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055201" type="text" id="055201" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055301" type="text" id="055301" size="10" value="0"/></div></td>
	 <td bgcolor="#47476b">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong>b.</strong></td>
    <td colspan="2"><div align="right"><font size="1">02</font></div><strong>Pekerja bergaji (sepenuh masa)</strong> <br />
	<em>Paid employees (full-time)</em></td>
    <td><div align="center"><input align="right" name="055102" type="text" id="055102" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055202" type="text" id="055202" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055302" type="text" id="055302" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="055402" type="text" id="055402" size="10" value="0"/></div></td>
  </tr>
  
  <tr>
    <td><strong>c.</strong></td>
    <td colspan="2"><div align="right"><font size="1">03</font></div><strong>Pekerja bergaji (sambilan)</strong> <br />
	<em>Paid employees (part-time)</em></td>
    <td><div align="center"><input align="right" name="055103" type="text" id="055103" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055203" type="text" id="055203" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055303" type="text" id="055303" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="055403" type="text" id="055403" size="10" value="0"/></div></td>
  </tr>  
  
  <tr>
    <td><strong>d.</strong></td>
    <td colspan="2"><div align="right"><font size="1">04</font></div><strong>JUMLAH BESAR</strong> <br />
	<em>GRAND TOTAL</em></td>
    <td><div align="center"><input align="right" name="055104" type="text" id="055104" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055204" type="text" id="055204" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="055304" type="text" id="055304" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="055404" type="text" id="055404" size="10" value="0"/></div></td>
  </tr>

   <tr bgcolor="#3d3d5c">
	<td colspan="7" align="center"><strong><font color="#FFFFFF">BULAN 3 QUARTER x</font></strong>	</td>
   </tr>

    <tr>
	<td colspan="3" rowspan="2"><div align="center"> <strong>Kategori pekerja</strong><br />
    <em>Category of workers</em></div></td>
    <td width="153" align="center"><strong>Lelaki</strong><br /><em>Male</em></td>
    <td width="159" align="center"><strong>Perempuan</strong><br /><em>Female</em></td>
    <td width="154" align="center"><strong>Jumlah </strong><br /><em>Total</em></td>
	<td width="154" align="center"><strong>Gaji & upah </strong><br /><em>Salaries & wages</em></td>
  </tr> 
  
  <tr>
    <td><div align="center"><font size="1">0561</font></div></td>
    <td><div align="center"><font size="1">0562</font></div></td>
	<td><div align="center"><font size="1">0563</font></div></td>
	<td><div align="center"><font size="1">0564</font></div></td>
  </tr>
 
  <tr>
    <td><strong>a.</strong></td>
    <td colspan="2"><div align="right"><font size="1">01</font></div><strong>Pemilik yang bekerja, rakan niaga yang aktif dan pekerja keluarga tidak bergaji </strong> <br />
	<em>Working proprietors, active business partners and unpaid family workers</em></td>
    <td><div align="center"><input align="right" name="056101" type="text" id="056101" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056201" type="text" id="056201" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056301" type="text" id="056301" size="10" value="0"/></div></td>
	 <td bgcolor="#47476b">&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong>b.</strong></td>
    <td colspan="2"><div align="right"><font size="1">02</font></div><strong>Pekerja bergaji (sepenuh masa)</strong> <br />
	<em>Paid employees (full-time)</em></td>
    <td><div align="center"><input align="right" name="056102" type="text" id="056102" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056202" type="text" id="056202" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056302" type="text" id="056302" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="056402" type="text" id="056402" size="10" value="0"/></div></td>
  </tr>
  
  <tr>
    <td><strong>c.</strong></td>
    <td colspan="2"><div align="right"><font size="1">03</font></div><strong>Pekerja bergaji (sambilan)</strong> <br />
	<em>Paid employees (part-time)</em></td>
    <td><div align="center"><input align="right" name="056103" type="text" id="056103" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056203" type="text" id="056203" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056303" type="text" id="056303" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="056403" type="text" id="056403" size="10" value="0"/></div></td>
  </tr>  
  
  <tr>
    <td><strong>d.</strong></td>
    <td colspan="2"><div align="right"><font size="1">04</font></div><strong>JUMLAH BESAR</strong> <br />
	<em>GRAND TOTAL</em></td>
    <td><div align="center"><input align="right" name="056104" type="text" id="056104" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056204" type="text" id="056204" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="056304" type="text" id="056304" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="056404" type="text" id="056404" size="10" value="0"/></div></td>
  </tr>

    <tr bgcolor="#9494b8">
    <td colspan="7"><strong>6. PERBELANJAAN MODAL (HANYA DIISI PADA AKHIR BULAN SUKU TAHUN SEMASA)</strong><BR /> 
      <em>&nbsp;&nbsp;&nbsp;&nbsp;CAPITAL EXPENDITURE (CURRENT QUARTER)</em></td>
  </tr>
  
  <tr>
	<td colspan="3" rowspan="2"><div align="center"><strong></strong> <br />
    <em></em></div></td>
    <td width="153"><div align="center"><strong>Belian (baru)*</strong><br /><em>Acquisition ( New)*</em></div></td>
    <td width="159"><div align="center"><strong>Belian (Terpakai)</strong><br /><em>Acquisition ( Used)</em></div></td>
    <td width="154"><div align="center"><strong>Membuat/membina sendiri</strong><br /><em>Self-produced/built</em></div></td>
	 <td width="154"><div align="center"><strong>Membuat/membina sendiri</strong><br /><em>Self-produced/built</em></div></td>
  </tr> 
  
  <tr>
    <td><div align="center"><font size="1">0601</font></div></td>
    <td><div align="center"><font size="1">0602</font></div></td>
	<td><div align="center"><font size="1">0603</font></div></td>
    <td><div align="center"><font size="1">0604</font></div></td> 	
  </tr>
  
  <tr>
    <td><strong>6.1</strong></td>
    <td colspan="2"><div align="right"><font size="1">01</font></div><strong>Tanah</strong><br />
      <em>Land</em></td>
    <td><div align="center"><input align="right" name="060101" type="text" id="060101" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060201" type="text" id="060201" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060301" type="text" id="060301" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060401" type="text" id="060401" size="10" value="0"/></div></td>
  </tr>
  
  <tr>
    <td><strong>6.2</strong></td>
    <td colspan="2"><div align="right"><font size="1">02</font></div>	<strong>Bangunan dan pembinaan lain</strong><br />
      <em>Buildings and other construction</em></td>
    <td><div align="center"><input align="right" name="060102" type="text" id="060102" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060202" type="text" id="060202" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060302" type="text" id="060302" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060402" type="text" id="060402" size="10" value="0"/></div></td>
  </tr>
  
    <tr>
    <td><strong>6.3</strong></td>
    <td colspan="2"><div align="right"><font size="1">03</font></div>	<strong>Pembangunan tanah</strong><br />
      <em>Land improvement</em></td>
    <td><div align="center"><input align="right" name="060103" type="text" id="060103" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060203" type="text" id="060203" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060303" type="text" id="060303" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060403" type="text" id="060403" size="10" value="0"/></div></td>
  </tr>
  
    <tr>
    <td><strong>6.4</strong></td>
    <td colspan="2"><div align="right"><font size="1">04</font></div>	<strong>Alat pengangkutan</strong><br />
      <em>Transport equipment</em></td>
    <td><div align="center"><input align="right" name="060104" type="text" id="060104" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060204" type="text" id="060204" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060304" type="text" id="060304" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060404" type="text" id="060404" size="10" value="0"/></div></td>
  </tr>
  
  <tr>
    <td><strong>6.5</strong></td>
    <td colspan="2"><div align="right"><font size="1">05</font></div> <strong>Komputer (perkakasan & perisian)</strong> <br />
	  <em>Computer (hardware & software)</em></td>
    <td><div align="center"><input align="right" name="060105" type="text" id="060105" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060205" type="text" id="060205" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060305" type="text" id="060305" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060405" type="text" id="060405" size="10" value="0"/></div></td>
	</tr>

  <tr>
    <td><strong>6.6</strong></td>
    <td colspan="2"><div align="right"><font size="1">06</font></div> <strong>Jentera dan kelengkapan</strong> <br />
	  <em>Machinery and equipment</em></td>
    <td><div align="center"><input align="right" name="060106" type="text" id="060106" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060206" type="text" id="060206" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060306" type="text" id="060306" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060406" type="text" id="060406" size="10" value="0"/></div></td>
	</tr>

  <tr>
    <td><strong>6.7</strong></td>
    <td colspan="2"><div align="right"><font size="1">07</font></div> <strong>Perabot dan pemasangan</strong> <br />
	  <em>Furniture and fittings </em></td>
    <td><div align="center"><input align="right" name="060107" type="text" id="060107" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060207" type="text" id="060207" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060307" type="text" id="060307" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060407" type="text" id="060407" size="10" value="0"/></div></td>
	</tr>

  <tr>
    <td><strong>6.8</strong></td>
    <td colspan="2"><div align="right"><font size="1">08</font></div> <strong>Harta-harta lain</strong> <br />
	  <em>Other assets</em></td>
    <td><div align="center"><input align="right" name="060108" type="text" id="060108" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060208" type="text" id="060208" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060308" type="text" id="060308" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060408" type="text" id="060408" size="10" value="0"/></div></td>
	</tr>
 
   <tr>
    <td><strong>6.9</strong></td>
    <td colspan="2"><div align="right"><font size="1">09</font></div> <strong>JUMLAH / </strong> <em>TOTAL </em> <br />
	  <strong>(6.1 + 6.2 + 6.3 + 6.4 + 6.5 + 6.6 + 6.7 + 6.8)</strong></td>
    <td><div align="center"><input align="right" name="060109" type="text" id="060109" size="10" value="0"/> </div></td>
    <td><div align="center"><input align="right" name="060209" type="text" id="060209" size="10" value="0"/></div></td>
    <td><div align="center"><input align="right" name="060309" type="text" id="060309" size="10" value="0"/></div></td>
	<td><div align="center"><input align="right" name="060409" type="text" id="060409" size="10" value="0"/></div></td>
	</tr>
	
	<tr>
	<td colspan="7"><div class="notafont"><strong><br />* Termasuk aset yang diimport ( baru/ terpakai)</strong><br /> 
    <em>&nbsp;&nbsp;&nbsp;Including imports of asset ( New / used) </em> </div></td>
	</tr>
 
   <tr bgcolor="#9494b8">
    <td colspan="7"><strong>7. PERBELANJAAN PERLINDUNGAN ALAM SEKITAR</strong><BR /> 
      <em>&nbsp;&nbsp;&nbsp;&nbsp;ENVIRONMENTAL PROTECTION EXPENDITURE</em></td>
  </tr>
  
  <tr>
    <td width="33"><strong>7.1</strong></td>
    <td colspan="6"><p><strong>Jumlah perbelanjaan perlindungan alam sekitar </strong><br />
          <em>Total of environmental protection expenditure </em></p> </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td colspan="6"><div align="right"><font size="1">070101</font></div>
      <strong> <input type="text" name="070101" size="50" /> </strong> </td>
  <tr>
	<tr bgcolor="#e0e0eb">
	<td colspan="7"><div><strong><br />Termasuk perbelanjaan pengurusan pencemaran, pengurusan sisa, perlindungan & pemuliharaan hidupan liar & habitat,  penilaian & audit alam sekitar dan caj alam sekitar, dan perbelanjaan lain untuk perlindungan alam sekitar.</strong><br /> 
    <em>Including expenditure for pollution management, waste management, protection & conservation of wildlife & habitat, environmental assessment & audit and environmental charges and other environmental protection expenditure.</em> </div></td>
	</tr>
 </table>
  <br />
  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan & Hantar" tabindex="5" style="height:50px; width:160px;" />
  <br />
<br/></td>
  </tr>
</table>
</div>
</form>
<br/>




	