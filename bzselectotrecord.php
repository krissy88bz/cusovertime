<?php
     
            include 'bzdeleteotrecord.php'; 
            include 'bzeditotrecord.php';
            

            if(isset($_POST['select']))
            {
                
                 include 'Credentials/Credentials.php'; 

           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               } 
                
              $select_id = $_POST['social'];
               $otprofile = $_POST['fname']. ' '. $_POST['lname'];
               
               echo $view = "
                <table id='t01'>
                <tr> 
                  <td><strong> Employee Name: ".$otprofile." </strong></td>
                  <td><strong> Employee SSN: ".$select_id." </strong></td>
                 </table>
                ";
               
          
               $sql="SELECT * FROM bz WHERE social = '$select_id'ORDER BY timefrom ASC";
                 $result=sqlsrv_query($conn,$sql);
               // Fetch one and one row
                  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                    {
                                       
                       $date = date_format($row[5], "Y-m-d");
                       $timefrom = date_format($row[5], "g:i:a");
                       $timeto = date_format($row[6], "g:i:a");
                                             
                       
                  echo $results = "
                 <table width=5000' border='1'>
                <form method='post'>   
                <tr> 

                  <td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>  
                  <td><strong><font color='#000000'>Date</font></strong></td>
                  <td><strong><font color='#000000'>Time From</font></strong></td>
                  <td><strong><font color='#000000'>Time To</font></strong></td>
                  <td><strong><font color='#000000'>Hours</font></strong></td>
                  <td><strong><font color='#000000'>Service Performed</font></strong></td>
                  <td><strong><font color='#000000'>Firm</font></strong></td>
                  <td><strong><font color='#000000'>Amount</font></strong></td>
               </tr>
                                
                <tr>
                  <td> 
                       <input type='hidden' name='otid' value='$row[0]'> 
                       <input action='bzdeleteotrecord.php' type='submit' value='Delete' name='delete' style='height:20px;width:60px'/> 
                       <input action='bzeditotrecord.php' type='submit' value='Edit' name='edit'  style='height:20px;width:60px'/></td>  
                  <td width='13%'>". $date." </td>
                  <td>".$timefrom."</td>
                  <td>".$timeto."</td>    
                  <td>$row[7]</td>
                  <td>$row[9]</td>    
                  <td>$row[8]</td>    
                  <td>$row[18]</td>   
               </tr></form>
  
               </table>    
                        
                    ";    
                  
                   }
                   
                       sqlsrv_free_stmt($result);
                  
                }
                
          