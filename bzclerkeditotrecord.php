<?php

           include 'Credentials/Credentials.php'; 
         

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

       
           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  
            
               
            if(isset($_POST['edit']))
            {
               $select_id = $_POST['otid'];
               
                $sql="SELECT * FROM bz WHERE otid1 LIKE '$select_id'";

                 $result=sqlsrv_query($conn,$sql);
                if($result === false){
                   die(print_r(sqlsrv_errors(),true)); 
                }
                
               // Fetch one and one row
                  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                    {
                       
                     
                       $timefrom = date_format($row[5], " Y-m-d g:i:a");
                       $timeto = date_format($row[6], "Y-m-d g:i:a");
                       $ot_rate = floatval($row[16]);
                       $wkly_hrs = floatval($row[17]);
                  echo "
                     
                     <?php



?>

<!DOCTYPE>
<html>
<head>
<title>Under Construction</title>
</head>
<bodyd>
<p>This page is under construction. Please come back soon!</p>
</body>
</html>
                    "
                     ;
                      
                    }
                    
                    
                  // Free result set
                  sqlsrv_free_stmt($result);
                  
                  
                }
                
        
                
             ?>   
             <script> 

                    function timediff(){

                         var start = document.forms[0].timefromList.value;

                         var end = document.forms[0].timetoList.value;

                       s = start.split(':');
                       e = end.split(':');

                       min = e[1]-s[1];
                       hour_carry = 0;

                       if(min < 0)
                       {
                           min += 60;
                           hour_carry += 1;
                       }

                       hour = e[0]-s[0]-hour_carry;
                       min = ((min/60)*100).toString()
                       diff = hour + ':' + min.substring(0,2);


                            document.getElementById('hours').value = diff;

                    }

                    </script>