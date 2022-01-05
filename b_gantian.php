<br><br><br>
<script type="text/javascript" src="js/rotator.js"></script>

<?php 
$nosiriA=$_GET['SerialID'];
$month=$_GET['month'];
$year=$_GET['IDyear'];

require("dbClass/config.inc.php");
require("dbClass/Database.class.php");
require("controlBulanGantian.php");// $monthA get from here
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect();

if (isset($_POST['salin_data'])) {
echo $kodsurvey;

$whr_count="bulan_rujuk='$month' and tahun='$year' and no_siri='$nosiriA'";
$whr="bulan_rujuk='$monthA' and tahun='$yearA' and no_siri='$nosiriA'"; 
		if($kodsurvey=='01'){
			
			
			$countResult=select_countNoSiri('tblA_RE',$conn,$whr_count); // get from allFunction.php
			
			$countResult;
			
		/*	echo "No Siri:".$nosiriA.'<br>';
			echo "Bulan Rujuk:".$month.' '.$yearA.'<br>';
			echo "Bulan Gantian:".$monthB.' '.$yearB.'<br>';
			echo "Salin data selesai";*/
			
			if($countResult=='1')
				{ 
				echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}
			else
				{ 
			
				 $queryBGantian= "INSERT INTO `tblA_RE`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`,  `m0101`, `m0102`, `J0103`, `m0104`, `m0105`, `m0106`, `J0107`, `JB0108`, `m0201`, `m0202`, `J0203`, `m0301`, `m0302`, `J0303`, `m0401`, `m0402`, `J0403`, `J0501`, `J0502`, `JB0503`, `m0601`, `m0602`, `m0603`, `m0604`, `m0605`, `m0606`, `m0606_nyatakan`, `m0701`, `m0702`, `m0703`, `J0704`) 
				select '$nosiriA', '$month', '$monthA', '$year',  `m0101`, `m0102`, `J0103`, `m0104`, `m0105`, `m0106`, `J0107`, `JB0108`, `m0201`, `m0202`, `J0203`, `m0301`, `m0302`, `J0303`, `m0401`, `m0402`, `J0403`, `J0501`, `J0502`, `JB0503`, `m0601`, `m0602`, `m0603`, `m0604`, `m0605`, `m0606`, `m0606_nyatakan`, `m0701`, `m0702`, `m0703`, `J0704` 
				from tblA_RE where $whr";
				//$queryBGantian->execute();
				$result = mysql_query($queryBGantian);
				
				$queryBGantian1= "INSERT INTO `tblB_RE`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`, `m0801`, `26_nyatakan`, `J0810`, `m0902`, `m0903`, `m0904`, `m0905`, `m0906`, `m0907`, `m0908`, `J0910`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `m1008`, `J1010`, `J1101`, `J1102`, `J1103`, `J1104`, `J1105`, `J1106`, `J1107`, `J1108`, `JB1110`) 
				
				select '$nosiriA', '$month', '$monthA', '$year', `m0801`, `26_nyatakan`, `J0810`, `m0902`, `m0903`, `m0904`, `m0905`, `m0906`, `m0907`, `m0908`, `J0910`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `m1008`, `J1010`, `J1101`, `J1102`, `J1103`, `J1104`, `J1105`, `J1106`, `J1107`, `J1108`, `JB1110`
				from tblB_RE where $whr";
				//$queryBGantian->execute();
				$result1 = mysql_query($queryBGantian1);

				 $queryBGantian2= "INSERT INTO `tblC_RE`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`,  `m1201`, `m1202`, `m1203`, `m1204`, `m1205`, `m1206`, `m1207`, `07_nyatakan`, `m1210`, `m1211`, `m1212`, `m1213`, `m1214`, `m1215`, `m1216`, `m1217`, `m1219`, `m1220`, `20_nyatakan`, `J1222`, `m1301`, `m1302`, `m1303`, `m1304`, `m1305`, `m1306`, `m1307`, `m1310`, `m1311`, `m1312`, `m1313`, `m1314`, `m1315`, `m1316`, `m1317`, `m1319`, `m1320`, `J1322`, `m1401`, `m1402`, `m1403`, `m1404`, `m1405`, `m1406`, `m1407`, `m1410`, `m1411`, `m1412`, `m1413`, `m1414`, `m1415`, `m1416`, `m1417`, `m1419`, `m1420`, `J1422`, `m1501`, `m1502`, `m1503`, `m1504`, `m1505`, `m1506`, `m1507`, `m1510`, `m1511`, `m1512`, `m1513`, `m1514`, `m1515`, `m1516`, `m1517`, `m1519`, `m1520`, `J1522`, `J1601`, `J1602`, `J1603`, `J1604`, `J1605`, `J1606`, `J1607`, `J1610`, `J1611`, `J1612`, `J1613`, `J1614`, `J1615`, `J1616`, `J1617`, `J1619`, `J1620`, `JB1622`) 
				
				select '$nosiriA', '$month', '$monthA', '$year', `m1201`, `m1202`, `m1203`, `m1204`, `m1205`, `m1206`, `m1207`, `07_nyatakan`, `m1210`, `m1211`, `m1212`, `m1213`, `m1214`, `m1215`, `m1216`, `m1217`, `m1219`, `m1220`, `20_nyatakan`, `J1222`, `m1301`, `m1302`, `m1303`, `m1304`, `m1305`, `m1306`, `m1307`, `m1310`, `m1311`, `m1312`, `m1313`, `m1314`, `m1315`, `m1316`, `m1317`, `m1319`, `m1320`, `J1322`, `m1401`, `m1402`, `m1403`, `m1404`, `m1405`, `m1406`, `m1407`, `m1410`, `m1411`, `m1412`, `m1413`, `m1414`, `m1415`, `m1416`, `m1417`, `m1419`, `m1420`, `J1422`, `m1501`, `m1502`, `m1503`, `m1504`, `m1505`, `m1506`, `m1507`, `m1510`, `m1511`, `m1512`, `m1513`, `m1514`, `m1515`, `m1516`, `m1517`, `m1519`, `m1520`, `J1522`, `J1601`, `J1602`, `J1603`, `J1604`, `J1605`, `J1606`, `J1607`, `J1610`, `J1611`, `J1612`, `J1613`, `J1614`, `J1615`, `J1616`, `J1617`, `J1619`, `J1620`, `JB1622`
				from tblC_RE where $whr";
				//$queryBGantian->execute();
				$result2 = mysql_query($queryBGantian2);
				
				 $queryBGantian3= "INSERT INTO `tblD_RE`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`, `m1701`, `m1702`, `m1703`, `m1704`, `m1705`, `m1706`, `m1707`, `m1708`, `m1709`, `m1710`, `m1711`, `m1712`, `J1713`, `m1801`, `m1802`, `m1803`, `m1804`, `m1805`, `m1806`, `m1807`, `m1808`, `m1809`, `m1810`, `m1811`, `m1812`, `J1813`, `J1901`, `J1902`, `J1903`, `J1904`, `J1905`, `J1906`, `J1907`, `J1908`, `J1909`, `J1910`, `J1911`, `J1912`, `JB1913`, `m2003`, `m2004`, `m2005`, `m2006`, `m2007`, `m2008`, `m2009`, `m2010`, `m2011`, `m2012`, `J2013`, `m2101`, `m2102`, `m2201`, `m2202`) 
				
				select '$nosiriA', '$month', '$monthA', '$year',  `m1701`, `m1702`, `m1703`, `m1704`, `m1705`, `m1706`, `m1707`, `m1708`, `m1709`, `m1710`, `m1711`, `m1712`, `J1713`, `m1801`, `m1802`, `m1803`, `m1804`, `m1805`, `m1806`, `m1807`, `m1808`, `m1809`, `m1810`, `m1811`, `m1812`, `J1813`, `J1901`, `J1902`, `J1903`, `J1904`, `J1905`, `J1906`, `J1907`, `J1908`, `J1909`, `J1910`, `J1911`, `J1912`, `JB1913`, `m2003`, `m2004`, `m2005`, `m2006`, `m2007`, `m2008`, `m2009`, `m2010`, `m2011`, `m2012`, `J2013`, `m2101`, `m2102`, `m2201`, `m2202`
				from tblD_RE where $whr";
				//$queryBGantian->execute();
				$result3 = mysql_query($queryBGantian3);
				
				echo "Data telah dikemaskini";
				
				echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}
		}
		else if($kodsurvey=='03')
			{
			//$whereStatment1=" no_siri='$nosiriA' AND bulan_rujuk='$month' AND tahun='$year'";	
			$countResult1=select_countNoSiri('tblA_RC',$conn,$whr_count); // get from allFunction.php
				
				if($countResult1=='1')
				{
					echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}
				else
				{ 
						 $q1= "INSERT INTO `tblA_RC`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`,  
						  `m0101`, `m0102`, `m0103`, `m0105`, `m0106`, `m0107`, `m0108`, `m0109`, `m0110`, `m0111`, 
						 `m0112`, `m0113`, `12_nyatakan`, `13_nyatakan`, `J0115`, `m0116`, `m0117`, `J0120`, `m0201`, `m0202`, `m0203`, `m0205`, 
						 `m0206`, `m0207`, `m0208`, `m0209`, `m0210`, `m0211`, `m0212`, `m0213`, `J0215`, `m0216`, `m0217`, `J0220`, `m0301`, 
						 `m0302`, `m0303`, `m0305`, `m0306`, `m0307`, `m0308`, `m0309`, `m0310`, `m0311`, `m0312`, `m0313`, `J0315`, `m0316`, 
						 `m0317`, `J0320`, `J0401`, `J0402`, `J0403`, `J0405`, `J0406`, `J0407`, `J0408`, `J0409`, `J0410`, `J0411`, `J0412`, 
						 `J0413`, `JB0415`, `J0416`, `J0417`, `JB0420`) 
						 select '$nosiriA', '$month', '$monthA', '$year',  
						 `m0101`, `m0102`, `m0103`, `m0105`, `m0106`, `m0107`, `m0108`, `m0109`, `m0110`, `m0111`, 
						 `m0112`, `m0113`, `12_nyatakan`, `13_nyatakan`, `J0115`, `m0116`, `m0117`, `J0120`, `m0201`, `m0202`, `m0203`, `m0205`, 
						 `m0206`, `m0207`, `m0208`, `m0209`, `m0210`, `m0211`, `m0212`, `m0213`, `J0215`, `m0216`, `m0217`, `J0220`, `m0301`, 
						 `m0302`, `m0303`, `m0305`, `m0306`, `m0307`, `m0308`, `m0309`, `m0310`, `m0311`, `m0312`, `m0313`, `J0315`, `m0316`, 
						 `m0317`, `J0320`, `J0401`, `J0402`, `J0403`, `J0405`, `J0406`, `J0407`, `J0408`, `J0409`, `J0410`, `J0411`, `J0412`, 
						 `J0413`, `JB0415`, `J0416`, `J0417`, `JB0420`
						  from tblA_RC where $whr";						  
						  $result_1 = mysql_query($q1);
						  

						  
						  $q2= "INSERT INTO `tblB_RC`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`, `m0501`, `m0502`, `m0503`, `m0504`, `m0505`, `m0506`, `m0507`, `m0508`, `m08_nyatakan`, `J0513`, `m0601`, `m0602`, `m0603`, `m0604`, `m0605`, `m0606`, `m0607`, `m0608`, `J0613`, `m0701`, `m0702`, `m0703`, `m0704`, `m0705`, `m0706`, `m0707`, `m0708`, `J0713`, `m0801`, `m0802`, `m0803`, `m0804`, `m0805`, `m0806`, `m0807`, `m0808`, `J0813`, `J0901`, `J0902`, `J0903`, `J0904`, `J0905`, `J0906`, `J0907`, `J0908`, `JB0913`) 
						 select '$nosiriA', '$month', '$monthA', '$year', `m0501`, `m0502`, `m0503`, `m0504`, `m0505`, `m0506`, `m0507`, `m0508`, `m08_nyatakan`, `J0513`, `m0601`, `m0602`, `m0603`, `m0604`, `m0605`, `m0606`, `m0607`, `m0608`, `J0613`, `m0701`, `m0702`, `m0703`, `m0704`, `m0705`, `m0706`, `m0707`, `m0708`, `J0713`, `m0801`, `m0802`, `m0803`, `m0804`, `m0805`, `m0806`, `m0807`, `m0808`, `J0813`, `J0901`, `J0902`, `J0903`, `J0904`, `J0905`, `J0906`, `J0907`, `J0908`, `JB0913`
						  from tblB_RC where $whr";						  
						  $result_2 = mysql_query($q2);
						  
						  	  $q3= "INSERT INTO `tblC_RC`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`,  `m1001`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `m1008`, `m1009`, `m1010`, `m1011`, `m1012`, `m1013`, `m1014`, `m1015`, `m1016`, `m1017`, `m1018`, `m1019`, `m1020`, `m1021`, `m1022`, `m1023`, `m1024`, `m1025`, `m1026`, `m1027`, `J1040`, `m1101`, `m1102`, `m1103`, `m1104`, `m1105`, `m1106`, `m1107`, `m1108`, `m1109`, `m1110`, `m1111`, `m1112`, `m1113`, `m1114`, `m1115`, `m1116`, `m1117`, `m1118`, `m1119`, `m1120`, `m1121`, `m1122`, `m1123`, `m1124`, `m1125`, `m1126`, `m1127`, `J1140`, `m1201`, `m1202`, `m1203`, `m1204`, `m1205`, `m1206`, `m1207`, `m1208`, `m1209`, `m1210`, `m1211`, `m1212`, `m1213`, `m1214`, `m1215`, `m1216`, `m1217`, `m1218`, `m1219`, `m1220`, `m1221`, `m1222`, `m1223`, `m1224`, `m1225`, `m1226`, `m1227`, `J1240`, `m1301`, `m1302`, `m1303`, `m1304`, `m1305`, `m1306`, `m1307`, `m1308`, `m1309`, `m1310`, `m1311`, `m1312`, `m1313`, `m1314`, `m1315`, `m1316`, `m1317`, `m1318`, `m1319`, `m1320`, `m1321`, `m1322`, `m1323`, `m1324`, `m1325`, `m1326`, `m1327`, `J1340`, `lain22`, `lain23`, `lain24`, `lain25`, `lain26`, `lain27`) 
						 select '$nosiriA', '$month', '$monthA', '$year',`m1001`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `m1008`, `m1009`, `m1010`, `m1011`, `m1012`, `m1013`, `m1014`, `m1015`, `m1016`, `m1017`, `m1018`, `m1019`, `m1020`, `m1021`, `m1022`, `m1023`, `m1024`, `m1025`, `m1026`, `m1027`, `J1040`, `m1101`, `m1102`, `m1103`, `m1104`, `m1105`, `m1106`, `m1107`, `m1108`, `m1109`, `m1110`, `m1111`, `m1112`, `m1113`, `m1114`, `m1115`, `m1116`, `m1117`, `m1118`, `m1119`, `m1120`, `m1121`, `m1122`, `m1123`, `m1124`, `m1125`, `m1126`, `m1127`, `J1140`, `m1201`, `m1202`, `m1203`, `m1204`, `m1205`, `m1206`, `m1207`, `m1208`, `m1209`, `m1210`, `m1211`, `m1212`, `m1213`, `m1214`, `m1215`, `m1216`, `m1217`, `m1218`, `m1219`, `m1220`, `m1221`, `m1222`, `m1223`, `m1224`, `m1225`, `m1226`, `m1227`, `J1240`, `m1301`, `m1302`, `m1303`, `m1304`, `m1305`, `m1306`, `m1307`, `m1308`, `m1309`, `m1310`, `m1311`, `m1312`, `m1313`, `m1314`, `m1315`, `m1316`, `m1317`, `m1318`, `m1319`, `m1320`, `m1321`, `m1322`, `m1323`, `m1324`, `m1325`, `m1326`, `m1327`, `J1340`, `lain22`, `lain23`, `lain24`, `lain25`, `lain26`, `lain27`
						  from tblC_RC where $whr";
				//$queryBGantian->execute();
						$result_3 = mysql_query($q3);
						
						echo "Data telah dikemaskini";
						
						echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}

			}
		else if($kodsurvey=='04')
			{
								
			
			$countResult2=select_countNoSiri('tblA_RP',$conn,$whr_count); // get from allFunction.php
				
				if($countResult2=='1')
				{ 
					echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}
				else
				{
							$a1= "INSERT INTO `tblA_RP`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`, `08_nyatakan`, `11_nyatakan`, `m0101`, `J0112`, `m0202`, `m0203`, `m0204`, `m0205`, `m0206`, `m0207`, `m0208`, `m0211`, `J0212`, `m0302`, `m0303`, `m0304`, `m0305`, `m0306`, `m0307`, `m0308`, `m0311`, `J0312`, `m0402`, `m0403`, `m0404`, `m0405`, `m0406`, `m0407`, `m0408`, `m0411`, `J0412`, `m0502`, `m0503`, `m0504`, `m0505`, `m0506`, `m0507`, `m0508`, `m0511`, `J0512`, `J0601`, `J0602`, `J0603`, `J0604`, `J0605`, `J0606`, `J0607`, `J0608`, `J0611`, `JB0612`) 
						 select '$nosiriA', '$month', '$monthA', '$year',`08_nyatakan`, `11_nyatakan`, `m0101`, `J0112`, `m0202`, `m0203`, `m0204`, `m0205`, `m0206`, `m0207`, `m0208`, `m0211`, `J0212`, `m0302`, `m0303`, `m0304`, `m0305`, `m0306`, `m0307`, `m0308`, `m0311`, `J0312`, `m0402`, `m0403`, `m0404`, `m0405`, `m0406`, `m0407`, `m0408`, `m0411`, `J0412`, `m0502`, `m0503`, `m0504`, `m0505`, `m0506`, `m0507`, `m0508`, `m0511`, `J0512`, `J0601`, `J0602`, `J0603`, `J0604`, `J0605`, `J0606`, `J0607`, `J0608`, `J0611`, `JB0612`
						  from tblA_RP where $whr";						  
						  $r_1 = mysql_query($a1);
						  
							$a2= "INSERT INTO `tblB_RP`(`no_siri`, `bulan_rujuk`, `bulan_gantian`, `tahun`,   `m0701`, `m0702`, `m0703`, `m0704`, `m0705`, `m0706`, `m0707`, `07_nyatakan`, `J0710`, `m0801`, `m0802`, `m0803`, `m0804`, `m0805`, `m0806`, `m0807`, `J0810`, `m0901`, `m0902`, `m0903`, `m0904`, `m0905`, `m0906`, `m0907`, `J0910`, `m1001`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `J1010`, `m1101`, `m1102`, `m1103`, `m1104`, `m1105`, `m1106`, `m1107`, `J1110`, `J1201`, `J1202`, `J1203`, `J1204`, `J1205`, `J1206`, `J1207`, `J1210`, `m0711`, `m0712`, `m0713`, `m0714`, `m0715`, `m0716`, `m0717`, `m0718`, `m0720`, `m0721`, `m0722`, `22_nyatakan`, `J0724`, `JB0725`, `m0811`, `m0812`, `m0813`, `m0814`, `m0815`, `m0816`, `m0817`, `m0818`, `m0820`, `m0821`, `m0822`, `J0824`, `JB0825`, `m0911`, `m0912`, `m0913`, `m0914`, `m0915`, `m0916`, `m0917`, `m0918`, `m0920`, `m0921`, `m0922`, `J0924`, `JB0925`, `m1011`, `m1012`, `m1013`, `m1014`, `m1015`, `m1016`, `m1017`, `m1018`, `m1020`, `m1021`, `m1022`, `J1024`, `JB1025`, `m1111`, `m1112`, `m1113`, `m1114`, `m1115`, `m1116`, `m1117`, `m1118`, `m1120`, `m1121`, `m1122`, `J1124`, `JB1125`, `J1211`, `J1212`, `J1213`, `J1214`, `J1215`, `J1216`, `J1217`, `J1218`, `J1220`, `J1221`, `J1222`, `J1224`, `JB1225`, `m1301`, `m1302`, `m1303`) 
						 select '$nosiriA', '$month', '$monthA', '$year', `m0701`, `m0702`, `m0703`, `m0704`, `m0705`, `m0706`, `m0707`, `07_nyatakan`, `J0710`, `m0801`, `m0802`, `m0803`, `m0804`, `m0805`, `m0806`, `m0807`, `J0810`, `m0901`, `m0902`, `m0903`, `m0904`, `m0905`, `m0906`, `m0907`, `J0910`, `m1001`, `m1002`, `m1003`, `m1004`, `m1005`, `m1006`, `m1007`, `J1010`, `m1101`, `m1102`, `m1103`, `m1104`, `m1105`, `m1106`, `m1107`, `J1110`, `J1201`, `J1202`, `J1203`, `J1204`, `J1205`, `J1206`, `J1207`, `J1210`, `m0711`, `m0712`, `m0713`, `m0714`, `m0715`, `m0716`, `m0717`, `m0718`, `m0720`, `m0721`, `m0722`, `22_nyatakan`, `J0724`, `JB0725`, `m0811`, `m0812`, `m0813`, `m0814`, `m0815`, `m0816`, `m0817`, `m0818`, `m0820`, `m0821`, `m0822`, `J0824`, `JB0825`, `m0911`, `m0912`, `m0913`, `m0914`, `m0915`, `m0916`, `m0917`, `m0918`, `m0920`, `m0921`, `m0922`, `J0924`, `JB0925`, `m1011`, `m1012`, `m1013`, `m1014`, `m1015`, `m1016`, `m1017`, `m1018`, `m1020`, `m1021`, `m1022`, `J1024`, `JB1025`, `m1111`, `m1112`, `m1113`, `m1114`, `m1115`, `m1116`, `m1117`, `m1118`, `m1120`, `m1121`, `m1122`, `J1124`, `JB1125`, `J1211`, `J1212`, `J1213`, `J1214`, `J1215`, `J1216`, `J1217`, `J1218`, `J1220`, `J1221`, `J1222`, `J1224`, `JB1225`, `m1301`, `m1302`, `m1303`
						  from tblB_RP where $whr";						  
						  $r_2 = mysql_query($a2);
						  
						  echo "Data telah dikemaskini";
						  
						  echo("<script>location.href = 'main.php?load=4&SerialID=$nosiriA&month=$month&IDyear=$year&tab=A';</script>");
				}
			}

}
$db->close();
?>
<link rel="stylesheet" type="text/css" href="css/bgantian.css">


<form name="form1" method="post" action="" class="form-style-5">
<legend><span class="number">#</span> Info Gantian</legend>
<table width="378" border="0" align="center" style="font-size:14px;">
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td width="75">No Siri </td>
    <td width="8">:</td>
    <td width="273"><?php echo $nosiriA;?></td>
  </tr>
  <tr>
    <td>Bulan Rujuk</td>
    <td>:</td>
    <td><?php echo $month.' - '.$year ?></td>
  </tr>
  <tr>
    <td>Bulan Gantian</td>
    <td>:</td>
    <td><?php echo $monthA.' - '.$yearA ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><div align="center" id="rotator" style="height:50px;width:50px"></div></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      <input type="submit" name="salin_data" id="salin_data" value="Salin data"><div align=
    </td>
  </tr>
</table>

</form>

<script>
$("#salin_data").on("click",function() { 
$("#rotator").rotator({
starting: 0,
ending: 100,
percentage: true,
color: 'green',
lineWidth: 7,
timer: 1,
radius: 20,
fontStyle: 'Calibri',
fontSize: '10pt',
fontColor: 'darkblue',
backgroundColor: 'lightgray',
callback: function () { 
}
});        
});
</script>
