<?php


            
            include 'Credentials/Credentials.php'; 
            include 'update.php'; 

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
               $select_id = $_POST['id'];
               
                $sql="SELECT * FROM login WHERE email LIKE '$select_id'";

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
                            <th><input type='hidden' name='id' value='$row[0]'>
                            <input action='update.php' type='submit' value='Save Update' name='update'/>
                          
                            </th>
                        <td></td>
                       </tr> 
                      <tr>
                        <th>Email:</th>
                        <td><input type='text' name='email' id='myPass' value='$row[0]' disabled='disabled' /></td>
                       </tr>
                       <tr>
                        <th> First Name:</th>
                        <td><input type='text' name='fname' id='myPass' value='$row[2]' ' /></td>
                       </tr>
                       <tr>
                        <th> Last Name:</th>
                       <td><input type='text' name='lname' id='myPass' value='$row[3]' ' /></td>
                       </tr>
                       <tr>
                        <th>Password:</th>
                        <td><input type='password' name='pw' id='myPass' value='$row[1]' ' /></td>
                       </tr>
                       <th> Location:</th>
                        <td>
                            <select name='location' >
                      <option>Airport</option>
                      <option>Belize City - Administrator</option>
                      <option>Belize City - Administration</option>
                      <option>Belize City - Accounts</option>
                      <option>Belize City - Container / Examination</option>
                      <option>Belize City - CMIS</option>
                      <option>Belize City - Customs Port</option>
                      <option>Belize City - Enforcement</option>
                      <option>Belize City - Excise</option>
                      <option>Belize City - Post Audit</option>
                      <option>Belize City - Investigation</option>
                      <option>Belize City - Risk Management</option>
                      <option>Belize City - Shipping</option>
                      <option>Belize City - Training</option>
                      <option>Belize City - Private Ware House</option>
                      <option>Belize City - Security</option>
                      <option>Belize City - Tourist Village</option>
                      <option>Belize City - Compt. Secretary</option>
                       <option>Belize City - Post Office</option>
                      <option>Benque</option>
                      <option>Corozal</option>
                      <option>Punta Gorda</option>
                      <option>San Pedro</option>

                    
                            
                            </select>

                        </td>
                       </tr>
                      <th> Role:</th>
                        <td>
                           <input type='text' name='lname' id='myPass' value='$row[5]' disabled='disabled' /></td>
                           
                        </td>
                       </tr>
                       
                         </table> </form>"; 
                     
                      
                    }
                  // Free result set
                  sqlsrv_free_stmt($result);
                  
                }
                
          
           
            
                
             