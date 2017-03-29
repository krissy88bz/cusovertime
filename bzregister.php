<?php

    $role = $_POST['role'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname =  $_POST['lname'];
    $pw =  $_POST['pw'];
    $pw2 =  $_POST['pw2'];
    
include 'Credentials/Credentials.php'; 

 //phpinfo();
$connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
$conn = sqlsrv_connect( $host, $connectionInfo);

 //$conn = sqlsrv_connect($host, $user, $passwd, $database);

if( $conn === false ) 
    {
     die( print_r( sqlsrv_errors(), true));
    }  

    $sql = "SELECT * FROM login WHERE email='$email'";
    
   //check if email exits already     
   $check = sqlsrv_query($conn, "SELECT * FROM login WHERE email='$email'");
   $checkrows=  sqlsrv_has_rows($check);
   if($checkrows>0)
   {
         $email_exists = "Email Profile Already Exits!";
        include_once 'bzAddUserAcc.php';
   }
   else
       if($pw!==$pw2)
    {
        $pw_not_same = "Passwords are not the Same!";
        include_once 'bzAddUserAcc.php';
       
    }   
   
   else
   {
    //insert results from the form input	
	$sql = "INSERT INTO login (role, location, email, fname,lname,pw) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array($_POST["role"], $_POST["location"], $_POST["email"],$_POST["fname"], $_POST["lname"], $_POST["pw"]);	
       
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if($stmt === false){
           die(print_r(sqlsrv_errors(), true));            
        }else
        {   
        $msg = "You have Successfully Registered a System User!";

        include_once 'bzAddUserAcc.php';
        }
        
        sqlsrv_close($conn);
       
   }
   