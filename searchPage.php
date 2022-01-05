<script type="text/javascript" language="javascript" src="datatables/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="datatables/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.min.css">
<script>
$(document).ready(function() {
    $('#alamsekitar').DataTable();
} );

$(function() {
  $('#go').click(function() {
    $.ajax({
      type: 'POST',
      data: 'id=17446',
      cache:false
    });
  });
});

jQuery(document).ready(function($){
                $(".post").on("click",function(){
                    $.ajax({
                        url: "http://staging.stats.gov.my/alamsekitar/main.php?load=1",
                        type: "POST",
                        data: { name: "John", location: "Boston" },
                        success: function(response){
                              //do action  
                        },
                        error: function(){
                              // do action
                        }
                    });
                });
            });
</script>

<?php 
$yearNow=date("Y");
if($SurveyUser==NULL) //07042021 edit kat sini
//$kodNegUser get from allFunction.php 
	if($levelUser == 2)
	{
		
			$sql = "select nosiri_pertubuhan,nama_syarikat,tahun from tbl_rangka where kod_negeri='$kodNegUser'";
		
		if(isset($_POST['submit'])){

			$yearSelect=$_POST['some_year'];

			echo $sql = "select nosiri_pertubuhan,nama_syarikat,tahun from tbl_rangka where kod_negeri='$kodNegUser' and tahun='$yearSelect'";
		}

	}
	else if($levelUser == 1)
	{
			 $sql = "select nosiri_pertubuhan,nama_syarikat,tahun from tbl_rangka where kod_negeri='$kodNegUser'";

		if(isset($_POST['submit'])){

			$yearSelect=$_POST['some_year'];

			$sql = "select nosiri_pertubuhan,nama_syarikat,tahun from tbl_rangka where kod_negeri='$kodNegUser' and tahun='$yearSelect'";
		}
	}
	$sqlquery = $conn->prepare($sql);
	$sqlquery->execute();
	$arrValues = $sqlquery->fetchAll(PDO::FETCH_ASSOC);
	
	//echo $levelUser;
	// set header name
	$arrHeader = array("No Siri Pertubuhan", "Nama Syarikat", "Tahun");
	reset($arrHeader);
?>
<div class="container">
<div class="row">

<br /><br /><br /><br />
<form method="post" action="#"> 
<?php
// set start and end year range
$yearArray = range(date('Y'), 2020);
?>
<!-- displaying the dropdown list -->
<select name="some_year">
    <option value="">Pilih Tahun</option>
    <?php
    foreach ($yearArray as $year) {
        // if you want to select a particular year
        $selected = ($year == $yearSelect) ? 'selected' : '';
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    }
    ?>
</select>
		&nbsp;&nbsp;
		<input type="submit" value="Pilih Tahun" name="submit" />
</form>

<?php 
if($yearSelect==""){ $yearSelect="Semua Tahun";}else { $yearSelect="tahun ".$yearSelect;}
    echo "<div align='center'><b>Senarai Syarikat Bagi  $yearSelect</div>"; 
?>

<table id="alamsekitar" class="display medium" cellspacing="0" width="100%">
<?php 
print "<thead><tr>\n";
// add the table headers	
foreach ($arrHeader as $key => $setName){
    print "<th ><div align='left'>$setName</div></th>";	}
	print "<th></th>";
    print "</tr> </thead>";
// display data
foreach ($arrValues as $row){
    print "<tr>";
    foreach ($row as $key => $val)
    {
        print "<td align='left'>$val</td>";		
   	}
	 	$realEncrpt='SerialID='.$row['nosiri_pertubuhan'];
		$realEncrptYear='IDyear='.$row['tahun'];
		print "<td><a href='main.php?load=2&$realEncrpt&$realEncrptYear'><img src = 'img/edit-button.png' title='Kemaskini'></a></td>";	
        print "</tr>\n";
}
?>        
</table>
</div></div>
