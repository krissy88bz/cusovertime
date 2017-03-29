<?php
   
// author: Kristen Gentle
//open connection and select database
         
    
      if(isset($_POST['delete'])) { 
             
           include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               } 
               
            
            $delete_id = $_POST['social'];
                       
            $stmt = "DELETE FROM employee WHERE social = '$delete_id' "; 
            $query = sqlsrv_query($conn,$stmt);
            
            
                        echo"<script type='text/javascript'>\n";
                        echo"alert('Employee Profile Deleted successfully!');\n";
                        echo"</script>";
           
              sqlsrv_close($conn);

            
      }