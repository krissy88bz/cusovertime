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
               
                $sql="SELECT * FROM cz WHERE otid LIKE '$select_id'";

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
                     
                     <table id='t01'>
                      <tr>
                        
                            <form action='clerkupdateotrecord.php' method='POST'>
                            
                            <th>
                                <input type='hidden' name='salary' value='$row[7]'>
                                <input type='hidden' name='officerpost' value='$row[3]'>
                                <input type='hidden' name='costcentercode' value='$row[4]'>
                                <input type='hidden' name='program' value='$row[9]'>
                                <input type='hidden' name='activitycode' value='$row[8]'>
                                <input type='hidden' name='otrate' value='$ot_rate'>
                                <input type='hidden' name='wklyhrs' value='$wkly_hrs]'>
                                    
                                <input type='hidden' name='fname' value='$row[19]'>
                                <input type='hidden' name='lname' value='$row[20]'>    
                                    
                            <input type='hidden' name='otid' value='$row[0]'>        
                            <input type='submit' name='saveeditot' value='Update' />
                            <input action='verifyot.php'type='submit' name='verifyot' value='Verify' />
                          
                            </th>
                        <td></td>
                       </tr> 
                      <tr>
                      
                        <th>Social Security No.:</th>
                        <td><input type='text' name='empssn' id='myPass' value='$row[2]' readonly/></td>
                       </tr>
                       <tr>
                        <th> Employee Name:</th>
                        <td><input type='text' name='name' id='myPass' value='$row[3]' readonly/></td>
                       </tr>
                      
                         </table> 
                         
                         
                        <table id='tfhover' class='tftable'>
                        
                        <tr><td>DATE-TIME FROM:</td><td>
                        <input type='datetime' name='datetimefrom' value='$timefrom' placeholder='yyyy-mm-dd hh:mm AMPM' />
                        </td><td>LINE ITEM CODE:</td><td><input type='text' name='lineitemcode' value='230-02' />
                        </td><td></td><td></td></tr>
                            


                        <tr><td>DATE-TIME TO:</td><td>
                        <input type='datetime' name='datetimeto' value='$timeto' placeholder='yyyy-mm-dd hh:mm AMPM'  />



                        </td><td>FIRM:</td><td><input type='text' name='firm' value='$row[8]' readonly/>
                        </td><td></td><td></td></tr>
                        
                        <tr><td>HOURS:</td><td><input type='text' name='hours' size='6' value='$row[7]' readonly></td>
                        <td>OVERTIME STATUS:</td><td><input type='text' name='otstatus' value='' size='10' readonly/>

                        </td><td></td><td></td><td>
                        </td>
                        <td> </td>

                        </tr>
                        
                       
                        <tr><td>AMOUNT:</td><td><input type='text' name='amount' value='$$row[18]' size='10'readonly/></td>
                        <td>SERVICE PERFORM:</td>
                        <td>
                            
                            <input list='serviceperform' name='serviceperform' size='35' value='$row[9]'>
                            <datalist id='serviceperform' >
                              <option value='Office Duties'>
                              <option value='Patrol'>
                              <option value='Preventative Duties'>
                              <option value='Desk Duties'>
                              <option value='Back Gate'>
                              <option value='Border Duties'>
                              <option value='ASYCUDA WORLD Duties'>
                              <option value='Official Duties'>
                              <option value='Examination Duties'>
                              <option value='Excise Duties'>
                              <option value='Security Duties'>
                              <option value='Risk Management Duties'>
                              <option value='Boarding Duties'>
                              <option value='Trainig Duties'>
                              <option value='Cashier Duties'>
                              <option value='Check Cashier'>
                              <option value='Driving Duties'>
                              <option value='Queens Bond Duties'>
                            </datalist>
                            
                            </select>
                        </td><td></td></tr>
                        </table>    
                        
                    </form>
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