<!DOCTYPE html>
<html lang="en">
<?php
//session_destroy();
session_unset();
//date_default_timezone_set('Asia/Kuala_Lumpur');

session_start();
?>

<style>
    /* Solid border */
    hr.solid {
        border-top: 3px solid #bbb;
    }
</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alam Sekitar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


    <body class="size-1140">
        <!-- HEADER -->
        <header>
            <div class="line">
                <div class="box" style="
        /* IE10 Consumer Preview */ 
        background-image: -ms-linear-gradient(bottom, #FFFFFF 0%, #88c2ef 100%);

        /* Mozilla Firefox */ 
        background-image: -moz-linear-gradient(bottom, #FFFFFF 0%, #88c2ef 100%);

        /* Opera */ 
        background-image: -o-linear-gradient(bottom, #FFFFFF 0%, #88c2ef 100%);

        /* Webkit (Safari/Chrome 10) */ 
        background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #FFFFFF), color-stop(1, #88c2ef));

        /* Webkit (Chrome 11+) */ 
        background-image: -webkit-linear-gradient(bottom, #FFFFFF 0%, #88c2ef 100%);

        /* W3C Markup, IE10 Release Preview */ 
        background-image: linear-gradient(to top, #FFFFFF 0%, #88c2ef 100%);
        ">
                    <!-- Navigation -->

                    <link href="css/login.css" rel="stylesheet">

                    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div style="background-color: #381C58">
                            <div class="container">
                                <!-- Brand and toggle get grouped for better mobile display -->

                                <div class="navbar-header">
                                    <div class="navbar-header">
                                        <font color="#FFFFFF" size="4"><b>SISTEM SURVEI ALAM SEKITAR</b></font><br>
                                        <font color="#FFFFFF" size="4">PEMBENTUNGAN, PENGURUSAN SISA DAN AKTIVITI PEMULIHAN</font>
                                    </div>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->

                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <br>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <form method="post" action="login_submit.php">
                                                <input id="phpro_username" name="phpro_username" value="" type="text" autocomplete="off" placeholder="username">
                                                <input id="phpro_password" name="phpro_password" value="" type="password" placeholder="password" autocomplete="off">
                                                <input type="submit" class="btn btn-primary" value="Log Masuk">
                                            </form>

                                            <p>
                                                <?php
                                                if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
                                                    echo '<p style="padding:0; color:red; text-align:left; font-size:0.8em;;">';
                                                    foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                                                        echo $msg;
                                                    }
                                                    echo '</p>';
                                                    unset($_SESSION['ERRMSG_ARR']);
                                                }
                                                ?>
                                            </p>
                                            <!-- /.navbar-collapse -->
                                </div>
                    </nav>
                    <!-- /.container -->
                    <br><br><br>
                    <!-- Page Content -->
                    <div class="container">
                        <!-- Marketing Icons Section -->
                        <div class="col-md-16">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:#9494b8">
                                    <h4><i class="fa fa-fw fa-leaf"></i> <b>MAKLUMAN AM</b> / <i>GENERAL INFORMATION</i> </h4>
                                </div>
                                <div class="panel-body" align="justify" style="background-color:#e0e0eb">
                                    <p align="justify">
                                    <ol type="a">
                                        <li> Survei Suku Tahunan Pertanian dan Alam Sekitar. </li>
                                        <li> Tujuan utama ialah untuk menyediakan maklumat agregat dan profil sektor ini yang diperlukan oleh kerajaan bagi membentuk program dan polisi ekonomi di peringkat nasional. </li>
                                       
                                    </ol>
                                    </p>
                                    <hr class="solid">
                                    <p align="justify">
                                        <i>
                                            <ol type="a">
                                                <li> Quarterly Agriculture and Environment Survey. </li>
                                                <li> The main objective is to provide aggregated information and profile of the sectors required by the government to formulate national economic programmes and policies. </li>
                                                
                                            </ol>
                                        </i>
                                    </p>
                                    <hr class="solid">
                                    <p align="center">
                                    <p align="center"><b>Bagi sebarang pertanyaan, sila hubungi :</b></p>
                                    <p align="center"><i>For enquiries, please contact : </i></p>
                                    <p align="center"><b>Tel </b>/ <i>Tel. </i>: +603-8888 0000</p>
                                    <p align="center"><b>Faks </b>/ <i>Fax </i>: +603-8888 0000</p>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Call to Action Section -->

                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <p align="center">Aplikasi ini boleh dilayari menggunakan <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank" rel="alternate">Internet Explorer 10+</a>, <a href="https://www.google.com/chrome/browser/desktop/" target="_blank" rel="alternate">Chrome 39+</a>, <a href="https://www.mozilla.org/en-US/" target="_blank" rel="alternate">Firefox 30-39</a>, <a href="https://support.apple.com/downloads/safari" rel="alternate">Safari 5+</a> dan Chrome for Android</p>
                        </div>
                    </div>
            </div>
            </footer>

            </div>
            <!-- /.container -->
            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Script to Activate the Carousel -->
            <script>
                $('.carousel').carousel({
                    interval: 5000 //changes the speed
                })
            </script>
    </body>

</html>