<?php
                    
    
                $datetimefrom = $_POST['datetimefrom'];                       
                $datetimeto = $_POST['datetimeto'];
                
               $d1 = $datetimefrom->format('y-m-d h:i: A');
            //     2017-01-01 5:00:pm
                
           include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  

    //     $sql = "SELECT * FROM bz WHERE duplicate='$duplicate";
         
          $sql = "UPDATE bz SET timefrom = (?), hours = (?), amount = (?), serviceperform = (?) 
                  WHERE otid1 = (?) ";
          
                $params = array($datetimefrom, $_POST["hours"], $_POST["amount"], $_POST["serviceperform"], $_POST["otid"]);
                
                $stmt = sqlsrv_query( $conn, $sql, $params);

                if( $stmt === false ) {

                die( print_r( sqlsrv_errors(), true));

                }
                else{
                         echo"<script type='text/javascript'>\n";
                         echo"alert('Employee Over Time Record Updated!');\n";
                         echo"</script>";
                       include_once 'bzviewot.php';
            } 
            
            sqlsrv_close($conn);

   
   
   
  
  
  
 
   