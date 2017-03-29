<?php


 if(isset($_POST['update'])) { 
           
    

 include 'Credentials/Credentials.php'; 

    $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
                $conn = sqlsrv_connect( $host, $connectionInfo);

                 //$conn = sqlsrv_connect($host, $user, $passwd, $database);

                if( $conn === false ) 
                    {
                     die( print_r( sqlsrv_errors(), true));
                    } 
       $hrs = $_POST["hours"];
       $sal = (float)$_POST["salary"];
       $otrate =  (($sal/52)/$hrs);
    //insert results from the form input
      
                    
          $sql = "UPDATE employee SET fname = ? ,lname = ? , rank = ? , depnum= ? , location= ? , hours= ? , salary= ? , activity= ? , program= ? , otrate= ? WHERE social= ? ";
          
          $params = array($_POST["fname"], $_POST["lname"], $_POST["rank"], $_POST["depnum"],$_POST["location"], $_POST["hours"], (float)$_POST["salary"], $_POST["activity"], $_POST["program"], $otrate, $_POST["social"]);
               
                $stmt = sqlsrv_query( $conn, $sql, $params);

                if( $stmt === false ) {

                die( print_r( sqlsrv_errors(), true));

                } else{
                
                        echo"<script type='text/javascript'>\n";
                        echo"alert('Employee Profile UPDATED successfully!');\n";
                        echo"</script>";
            
            }
           sqlsrv_close($conn);

 }             
 