<?php 
/*$url=$_SERVER['REQUEST_URI'];
$url=parse_url($url);
$arrayUrl=$url['query'];
$valueX=explode('&',$arrayUrl);
$realEncrpt=$valueX['1'];*/

//echo '<br><div style="color:red;">'.$aa.$realEncrpt.$bb.'</div>';


function valUser($fieldName,$conn,$user_id) {

	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_pengguna where id_user='$user_id'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;


}

$getTahun=$_GET['IDyear'];

$levelUser=valUser('level',$conn,$user_id);
$kodNegUser=valUser('kod_negeri',$conn,$user_id);
$NameUser=valUser('name',$conn,$user_id);
//$SurveyUser=valUser('kod_survey',$conn,$user_id);

if($levelUser=="0"){
	$valNo=valUser('name',$conn,$user_id);
	$valNoSiri1="where nosiri_pertubuhan='$valNo' and tahun='$getTahun'";
}else {
	//$idEncrpt=trim($decoded);
	$valNoSiri=$_GET["SerialID"];
	//$valNoSiri1="where no_siri='$valNoSiri' AND tahun='$getTahun'";
	$valNoSiri1="where nosiri_pertubuhan='$valNoSiri' and tahun='$getTahun'";
}

//include("mcrypt.php");

function select_rangka($fieldName,$conn,$valNoSiri1) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_rangka $valNoSiri1");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}

$noSiri=$_GET["SerialID"];
$syarikat=select_rangka('nama_syarikat',$conn,$valNoSiri1);

//$kodsurvey=select_rangka('kp',$conn,$valNoSiri1); update 07042021

/*function select_kodUtamaRC($fieldName,$conn,$noSiri) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from lookup_kodUtamaRC where no_siri=".$noSiri);
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}

function select_kp($fieldName,$conn,$kodsurvey) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from lookup_penyiasatan where kod_p='$kodsurvey'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}*/


function monthDropdown($name="month", $selected=1)
{
        $dd = '<select name="'.$name.'" id="'.$name.'" class="seleCT">';

        $months = array(	
				//0 => 'Semua Bulan',		
                1 => 'January',
                2 => 'February',
                3 => 'March',
                4 => 'April',
                5 => 'May',
                6 => 'June',
                7 => 'July',
                8 => 'August',
                9 => 'September',
                10 => 'October',
                11 => 'November',
                12 => 'December');
        /*** the current month ***/
        $selected = is_null($selected) ? date('n', time()) : $selected;

        for ($i = 0; $i <= 12; $i++)
        {
                $dd .= '<option value="'.$i.'"';
                if ($i == $selected)
                {
                        $dd .= " selected ";
                }
                /*** get the month ***/
                $dd .= '>'.$months[$i].'</option>';
        }
        $dd .= '</select>';
        return $dd;
}

function yearDropdown($id,  $selected=NULL){ 
    //start the select tag 
    $yy='<select id="'.$id.'" name="'.$id.'" class="seleCT" >'; 
          $d = date("Y");
		  $dBefore = date("Y");
		   $selected = is_null($selected) ? date('n', time()) : $selected;
        //echo each year as an option 
		
        for ($i=2019;$i<=$d;$i++){ 
        
		$yy.='<option value="'.$i.'">'.$i.'';   
		  
        } 
      
    //close the select tag 
    $yy .= '</select>'; 
	return $yy;
} 

function yearDropdown2($id,  $selected=NULL){ 
    //start the select tag 
    $yy='<select id="'.$id.'" name="'.$id.'" class="seleCT" >'; 
          $d = date("Y");
		  $dBefore = date("Y");
		   $selected = is_null($selected) ? date('n', time()) : $selected;
        //echo each year as an option 
		
        for ($i=2019;$i<=$d;$i++){ 
        
		$yy.='<option value="'.$i.'">'.$i.'';   
		  
        } 
      
    //close the select tag 
    $yy .= '</select>'; 
	return $yy;
} 



// function myDropdown($intIdField, $strNameField, $strTableName, $strNameOrdinal, $strMaskName, $strOrderField, $strMethod="asc") {

//    echo "<select name=\"$strNameOrdinal\">\n";
//    echo "<option value=\"NULL\">".$strMaskName."</option>\n";

// //$conn->prepare("SELECT * FROM lookup_kerjaluar");
//    $strQuery=$conn->prepare("select $intIdField, $strNameField
//                from $strTableName
//                order by $strOrderField $strMethod");
// 	$strQuery->execute();
// 	$strQuery->debugDumpParams();
//    $rsrcResult = $strQuery->fetchAll();


//    while($arrayRow = mysql_fetch_assoc($rsrcResult)) {
//       $strA = $arrayRow["$intIdField"];
//       $strB = $arrayRow["$strNameField"];
//       echo "<option value=\"$strA\">$strB</option>\n";
//    }

//    echo "</select>";
//     $rsrcResult->debugDumpParams();

// }
function select_profile($fieldName,$conn,$SerialID) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from tbl_rangka where nosiri_pertubuhan='$SerialID'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;

}

	function select_countNoSiri($tablename,$conn,$whereStatment) {
		$sql = "SELECT count(*) FROM ".$tablename." WHERE ".$whereStatment; 
		$result = $conn->prepare($sql); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn();
		return $number_of_rows;
	}

function SELECT($fieldName,$tablename,$conn,$valNoSiri,$month,$year) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from ".$tablename." where nosiri_pertubuhan='$valNoSiri' AND sukutahun='$month' AND tahun='$year'");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;
}

function select_NegDaerah($fieldName,$fieldName2,$andWhere,$conn,$val) {
	
	$sqlquery=$conn->prepare("select ".$fieldName." from lookup_negdaerah where $fieldName2='$val' $andWhere");
	$sqlquery->execute();
	
	$result = $sqlquery->fetchColumn();
	return $result;

}

?>