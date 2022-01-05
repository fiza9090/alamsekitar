<?php
include('config-alamsekitar-pdo.php');

//database server
define('DB_SERVER', $hostname_conndb);

//database login name
define('DB_USER', $username_conndb);
//database login password
define('DB_PASS', $password_conndb);

//database name
define('DB_DATABASE', $database_conndb);

//smart to define your table names also
define('TABLE_USERS', "tbl_pengguna");
define('TABLE_FRAME', "tbl_rangka");

//define('TABLE_A_RE', "tblA_RE");
//define('TABLE_B_RE', "tblB_RE");
//define('TABLE_C_RE', "tblC_RE");
//define('TABLE_D_RE', "tblD_RE");
//
//define('TABLE_A_RC', "tblA_RC");
//define('TABLE_B_RC', "tblB_RC");
//define('TABLE_C_RC', "tblC_RC");
//
//define('TABLE_A_RP', "tblA_RP");
//define('TABLE_B_RP', "tblB_RP");
define('TABLE_SAH', "tbl_pengesahan");


?>