<?php
session_start();
$errmsg_arr = array();
$errflag = false;

include ('config-alamsekitar-pdo.php');

// database connection
//$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// new data
if(isset( $_SESSION['user_id'] ))
{
    $errmsg_arr[] = 'Users is already logged in';
	$errflag = true;
	session_destroy();
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['phpro_username'], $_POST['phpro_password']))
{
     $errmsg_arr[] = 'Please enter a valid username and password';
	 $errflag = true;
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
     $phpro_username = filter_var($_POST['phpro_username'], FILTER_SANITIZE_STRING);
     $phpro_password = filter_var($_POST['phpro_password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/ //update 05042021
    $phpro_password = sha1( $phpro_password ); 
    
    /*** connect to database ***/
	include('config-alamsekitar-pdo.php');

    try
    {
        $dbh = new PDO("mysql:host=$hostname_conndb;dbname=$database_conndb", $username_conndb, $password_conndb);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT id_user,username,password FROM tbl_pengguna 
                    WHERE username = :phpro_username AND password = :phpro_password");
		

        /*** bind the parameters ***/
        $stmt->bindParam(':phpro_username', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_password', $phpro_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        
		
		if($user_id == false) 
        {
                $errmsg_arr[] = "Please enter the correct username and password";
				$errflag = true;
				
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                 $_SESSION['user_id'] = $user_id;
				//$_SESSION['username'] = $username;
				
                /*** tell the user we are logged in ***/
               //$message = 'You are now logged in';
			   	header("location: main.php?load=1");
				
        }

    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
         $errmsg_arr[] = 'We are unable to process your request. Please try again later"';
    }
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
}

?>
