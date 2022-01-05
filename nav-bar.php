
<?php include('config-alamsekitar-pdo.php'); 
ob_start();
ob_flush();
?>
<style>
textarea {
    resize: none;
}
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:#FFF;
	border-color:#000;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
	
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<html lang="en">
<head>

    <title>Alam Sekitar</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- <link href="css/bootstrap.css" rel="stylesheet">-->
	<script src="js/jquery.js"></script>
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/login.css" rel="stylesheet">

</head>

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div style="background-color: #381C5D">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
			<br />
			    <font color="#FFFFFF" size="4"><b>SISTEM SURVEI ALAM SEKITAR</b></font><br>
				<font color="#FFFFFF" size="3">PEMBENTUNGAN, PENGURUSAN SISA DAN AKTIVITI PEMULIHAN</font>
				
            	<!--<div style="float:left; padding-top:5px;"><img src="img/logojp.png" width="40" height="36" /> &nbsp;</div>     
                <a class="navbar-brand" href="main.php?load=1">SISTEM ALAM SEKITAR (alamsekitar)</a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <?php 
				//$userLevel=userLevel('level',$conn,$level);
				//1:hq ; 2:negeri
				if($levelUser==1){
				?>
					<li><a href="main.php?load=9">Tukar Kata Laluan</a></li>
<!--                    <li class="dropdown">
                        <a href="#">Laporan</a>
                          <div class="dropdown-content">
                             <a href="main.php?load=14">Export Respon</a>
                             <a href="main.php?load=11">Export Semua Data</a>
                          </div>
                    </li>
-->                    <li><a href="main.php?load=1">Carian</a></li>
				<?php 
				}
				else if($levelUser==2){
				?>
					<li><a href="main.php?load=9">Tukar Kata Laluan</a></li>
<!--                    <li class="dropdown"><a href="#">Laporan</a>
                        <div class="dropdown-content">
                            <a href="main.php?load=14">Export Respon</a>
                            <a href="main.php?load=11">Export Semua Data</a>
                        </div>                           
                    </li>
-->                    <li><a href="main.php?load=1">Carian</a></li>
				<?php } else {?>
				    <li><a href="main.php?load=2">Profile</a></li>
                    <li><a href="main.php?load=3">Borang</a></li>
                    <li><a href="main.php?load=10">Laporan</a></li>
				<?php } ?>
                    <li><button type="button" onclick="window.location.href='logout.php'" class="btn btn-danger navbar-btn">Log Keluar</button></li>
                </ul>
            </div>
            
            <div style="color:#CCCCFF; text-align:right;"><?php echo $NameUser.'|'.$levelUser.'|'.$kodNegUser;?></div>
            <!-- /.navbar-collapse -->
       </div>
 </nav>
 </html>