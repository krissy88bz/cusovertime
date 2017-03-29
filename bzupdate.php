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
            
                $sql = "UPDATE login SET fname = ? ,lname = ? , pw = ? , location= ? WHERE email = ? ";
          
                $params = array($_POST["fname"], $_POST["lname"], $_POST["pw"], $_POST["location"],$_POST["id"]);
                
                $stmt = sqlsrv_query( $conn, $sql, $params);

                if( $stmt === false ) {

                die( print_r( sqlsrv_errors(), true));

                }
                else{
                        echo"<script type='text/javascript'>\n";
                        echo"alert('Record UPDATED successfully!');\n";
                        echo"</script>";
            } 
            
            sqlsrv_close($conn);

         }