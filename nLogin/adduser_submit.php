<?php
/*** begin our session ***/
session_start();
//include('config-eictv2.php');

/*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['phpro_username'], $_POST['phpro_password'], $_POST['form_token']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the form token is valid ***/
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['phpro_username']) > 20 || strlen($_POST['phpro_username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['phpro_password']) > 20 || strlen($_POST['phpro_password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
//elseif (ctype_alnum($_POST['phpro_username']) != true)
//{
    /*** if there is no match ***/
//    $message = "Username must be alpha numeric";
//}
/*** check the password has only alpha numeric characters ***/
//elseif (ctype_alnum($_POST['phpro_password']) != true)
//{
        /*** if there is no match ***/
 //       $message = "Password must be alpha numeric";
//}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['phpro_username'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['phpro_password'], FILTER_SANITIZE_STRING);
	
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING); //add baru 10062020
	$jawatan = filter_var($_POST['jawatan'], FILTER_SANITIZE_STRING);
	$bahagian = filter_var($_POST['bahagian'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);
	$kod_negeri = filter_var($_POST['kod_negeri'], FILTER_SANITIZE_STRING);
	$kod_survey = filter_var($_POST['kod_survey'], FILTER_SANITIZE_STRING);
	$kod_po = filter_var($_POST['kod_po'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $phpro_password = sha1( $phpro_password );
    
    /*** connect to database ***/
	//include('config-ebgb.php'); remove 
	include('config-ebgb-pdo.php');

    try
    {
        $dbh = new PDO("mysql:host=$hostname_conndb;dbname=$database_conndb", $username_conndb, $password_conndb);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        // $stmt = $dbh->prepare("INSERT INTO tbl_pengguna (username, password ) VALUES (:phpro_username, :phpro_password )");
		 $stmt = $dbh->prepare("INSERT INTO tbl_pengguna (username, password, name, jawatan, bahagian, email, level, kod_negeri, kod_survey, kod_po) VALUES (:phpro_username, :phpro_password, :name, :jawatan, :bahagian, :email, :level, :kod_negeri, :kod_survey, :kod_po )"); //add baru 10062020

        /*** bind the parameters ***/
        $stmt->bindParam(':phpro_username', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_password', $phpro_password, PDO::PARAM_STR, 40);
		
		$stmt->bindParam(':name', $name, PDO::PARAM_STR); //add baru 10062020
		$stmt->bindParam(':jawatan', $jawatan, PDO::PARAM_STR);
		$stmt->bindParam(':bahagian', $bahagian, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':level', $level, PDO::PARAM_STR);
		$stmt->bindParam(':kod_negeri', $kod_negeri, PDO::PARAM_STR);
		$stmt->bindParam(':kod_survey', $kod_survey, PDO::PARAM_STR);
		$stmt->bindParam(':kod_po', $kod_po, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
        $message = 'New user added';
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later"';
        }
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>
