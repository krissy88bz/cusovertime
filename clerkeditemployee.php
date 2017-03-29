<?php

 $lifetime=120;
  session_set_cookie_params($lifetime);
            
         
            include 'clerkupdateemployee.php'; 

            include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  

                    
            if(isset($_POST['edit']))
            {
               $select_id = $_POST['social'];
               
                $sql="SELECT * FROM employee WHERE social LIKE '$select_id'";
                
                 $result=sqlsrv_query($conn,$sql);
                if($result === false){
                   die(print_r(sqlsrv_errors(),true)); 
                }
                
               // Fetch one and one row
                  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                    {
                                
                  echo "
                     <table id='t01'>
                      <tr>
                        
                            <form method='post'>
                            <th><input type='hidden' name='social' value='$row[0]'>
                            <input action='updateemployee.php' type='submit' value='Save Update' name='update'/>
                          
                            </th>
                        <td></td>
                       </tr> 
                      <tr>
                        <th>Social Security No.:</th>
                        <td><input type='text' name='social' id='myPass' value='$row[0]' disabled='disabled'/></td>
                       </tr>
                       <tr>
                        <th> First Name:</th>
                        <td><input type='text' name='fname' id='myPass' value='$row[1]' /></td>
                       </tr>
                       <tr>
                        <th> Last Name:</th>
                       <td><input type='text' name='lname' id='myPass' value='$row[2]' /></td>
                       </tr>
                       <tr>
                        <th>Rank:</th>
                        <td><input type='text' name='rank' id='myPass' value='$row[3]' /></td>
                       </tr>
                        <tr>
                       <th> Department No.:</th>
                        <td><input type='text' name='depnum' id='myPass' value='$row[4]' /></td>
                       </tr>
                        <tr>
                      <th> Location:</th>
                        <td>
                         <select name='location'>
                       
                         <option>$row[5]</option>
                         <option>Airport</option>
                      <option>Belize City - Administration</option>
                      <option>Belize City - Accounts</option>
                      <option>Belize City - Container / Examination</option>
                      <option>Belize City - CMIS</option>
                      <option>Belize City - Customs Port</option>
                      <option>Belize City - Enforcement</option>
                      <option>Belize City - Excise</option>
                      <option>Belize City - Post Audit</option>
                      <option>Belize City - Risk Management</option>
                      <option>Belize City - Shipping</option>
                      <option>Benque</option>
                      <option>Corozal</option>
                      <option>Punta Gorda</option>
                      <option>San Pedro</option>
                    
                     </select>


                        </td>
                       </tr>
                       <tr>
                      <th> Employee Hours:</th>
                        <td><input type='text' name='hours' id='myPass' value='$row[6]' /></td>
                       </tr>
                       <tr>
                      <th> Salary:</th>
                        <td><input type='text' name='salary' id='myPass' value='$row[7]'  /></td>
                       </tr>
                       <tr>
                      <th> Activity Program:</th>
                        <td><input type='text' name='activity' id='myPass' value='$row[8]'  /></td>
                       </tr>
                       <tr>
                       <tr>
                      <th> Program:</th>
                        <td><input type='text' name='program' id='myPass' value='$row[9]' /></td>
                       </tr>
                      <th> Over Time Rate:</th>
                        <td><input type='text' name='otrate' id='myPass' value='$row[10]' disabled='disabled' /></td>
                       </tr>
                       
                         </table> </form>"; 
                     
                      
                    }
                  // Free result set
                  sqlsrv_free_stmt($result);
                  
                  
                }
                
          
           
            
         
                
                
             