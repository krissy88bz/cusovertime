<?php

    
   
        include 'Credentials/Credentials.php'; 

      //phpinfo();
     $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
     $conn = sqlsrv_connect( $host, $connectionInfo);

     
     if( $conn === false ) 
         {
          die( print_r( sqlsrv_errors(), true));
         }  

         
   $social = $_POST['social'];      
         
   //check if employee exits already     
   $check = sqlsrv_query($conn, "SELECT * FROM employee WHERE social='$social'");
     $checkrows=  sqlsrv_has_rows($check);
   if($checkrows>0)
   {
        echo"<script type='text/javascript'>\n";
        echo"alert('Employee Profile Already Exits!');\n";
        echo"</script>";
        include_once 'addemployee.php';
   }
   
   
   else
   {
       $hrs = $_POST["hours"];
       $sal = (float)$_POST["salary"];
       $otrate =  (($sal/52)/$hrs);
    //insert results from the form input
       
      $sql = "INSERT INTO employee (social, fname, lname, rank, depnum, location, hours, salary, activity, program, otrate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $params = array($_POST["social"], $_POST["fname"], $_POST["lname"],$_POST["rank"], $_POST["depnum"], $_POST["location"], $_POST["hours"],(float)$_POST["salary"], $_POST["activity"], $_POST["program"], $otrate);	
       
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if($stmt === false){
           die(print_r(sqlsrv_errors(), true));            
        }else
        {    
       
        echo"<script type='text/javascript'>\n";
        echo"alert('You have Successfully Added a Employee Profile!');\n";
        echo"</script>";

         include_once 'addemployee.php';

   }
    sqlsrv_close($conn);
   }
   