<link rel="stylesheet" href="css/style1.css">
<style>
.style1{
background: rgba(226,226,226,1);
background: -moz-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 0%, rgba(209,209,209,1) 25%, rgba(254,254,254,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226,226,226,1)), color-stop(0%, rgba(219,219,219,1)), color-stop(25%, rgba(209,209,209,1)), color-stop(100%, rgba(254,254,254,1)));
background: -webkit-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 0%, rgba(209,209,209,1) 25%, rgba(254,254,254,1) 100%);
background: -o-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 0%, rgba(209,209,209,1) 25%, rgba(254,254,254,1) 100%);
background: -ms-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 0%, rgba(209,209,209,1) 25%, rgba(254,254,254,1) 100%);
background: linear-gradient(to bottom, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 0%, rgba(209,209,209,1) 25%, rgba(254,254,254,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0 );
 padding: 10px;	
}
</style>
	<script>
    $(document).ready(function() {
    //     $("#tab1").click(function(){    
    //         //alert("clicked");   
    //    });
    
		// $('input[type="text"]').keydown(function (e) {
		//   // Allow: backspace, delete, tab, escape, enter and .
		//   if ($.inArray(e.keyCode, [8, 9, 13]) !== -1 ||
		// 	   // Allow: Ctrl+A, Command+A
		// 	  (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		// 	   // Allow: home, end, left, right, down, up
		// 	  (e.keyCode >= 35 && e.keyCode <= 40)) {
		// 		   // let it happen, don't do anything
		// 		   return;
		//   }
		//   // Ensure that it is a number and stop the keypress
		//   if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		// 	  e.preventDefault();
		//   }
		// });
    });
    </script>
<body style="background-color:#666;"> 
<script src="js/tab.js"></script>
<br><div style="text-align:center;margin-top:50px;font-family:arial;" role="tabpanel">
<br>
<div class="container">
<div class="row"> 

<?php
    $tab=$_GET['tab'];
    $SID = $_GET['nosiri'];
    $yr=$_GET['tahun'];
    $suku = $_GET['sukutahun'];
    
$smt2 = $conn->prepare("select * From tbl_pengesahan where nosiri_pertubuhan = '$SID' and sukutahun = '$suku' and tahun = '$yr'");
$smt2->execute();

while($row = $smt2->fetch())
{
	$kodrespon = $row['kodrespon'];
}
	
if(($kodrespon == '11')){ 

	$tab=$_GET['tab'];?>
    <br>
    <ul class="tabs">
        <li>
            <input type="radio" name="tabs" id="tab1" <?php if($tab=="A") { echo "checked";}else {echo " ";}?> />
            <label for="tab1">Seksyen A</label>
            <div id="tab-content1" class="tab-content">
              <p><?php include("seksyenA_new.php");?></p>
            </div>
        </li>
        <li>
            <input type="radio" name="tabs" id="tab2" <?php if($tab=="B") { echo "checked";}else {echo " ";}?>/>
            <label for="tab2">Seksyen B</label>
            <div id="tab-content2" class="tab-content">
              <p><?php include("seksyenB.php");?></p>
            </div>
        </li>
    </ul>

<?php } else {
		header("location:main.php?load=8");
		echo'<script>window.location="main.php?load=8";</script>';
		}
?>    
<br style="clear: both;" />
</div></div></div></body>

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>