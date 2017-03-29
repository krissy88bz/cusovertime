<?php

            include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  

            
            
            
            if(isset($_POST['verifyot']))
            {
                
                $datetimefrom = new DateTime($_POST['datetimefrom']);
                $datetimefrom2 = $_POST['datetimefrom'];
              
                $datetimeto = new DateTime($_POST['datetimeto']);
                $datetimeto2 = $_POST['datetimeto'];

                $interval = $datetimefrom->diff($datetimeto);


                 $login = strtotime($_POST['datetimefrom']);
                  $current_time = strtotime($_POST['datetimeto']);
                  $minsdiff = (((($current_time-$login)%3600)/60)*60)/3600;
                  
                $testdeci = $interval->format('%H') + $minsdiff;
                $d1 = $datetimefrom->format('y-m-d h:i A');
                $d2 = $datetimeto->format('y-m-d h:i A');
             
                
                
                 $datetimes = ($_POST['datetimefrom']);
                 //$date = substr($datetimes, 0, 4); 
                 $dt = strtotime($datetimes);
                 $date = date("y-m-d", $dt);
                 
                  $otdate = ($_POST['otdate']);
                  $otdate1 = "16-12-25" ;
                  $otdate2 = "16-03-25";
                  $otdate3 = "16-03-28";
                  //$d3 = $otdate->format('y-m-d');
                  

                       
            if (($date === $otdate1) || ($date === $otdate3) || ($date === $otdate3)){
                $status = "Double Time";
                $otrate = $_POST["otrate"];
                $amount = ($otrate*2)*$testdeci;
               //---------------------------------------------------------
            }
            else {
                $status = "Regular Time";
                $otrate = $_POST["otrate"];
                $amount = ($otrate*1.5)*$testdeci;
            }
                
                
               // Fetch one and one row
                  while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                    {
                                                  
                  echo "
                     
                     <table id='t01'>
                      <tr>
                        
                            <form action='bzverifyot.php' method='POST'>
                            
                            <th>
                                <input type='hidden' name='salary' value='$row[7]'>
                                <input type='hidden' name='officerpost' value='$row[3]'>
                                <input type='hidden' name='costcentercode' value='$row[4]'>
                                <input type='hidden' name='program' value='$row[9]'>
                                <input type='hidden' name='activitycode' value='$row[8]'>
                                <input type='hidden' name='otrate' value='$row[10]'>
                                <input type='hidden' name='wklyhrs' value='$row[6]'>
                                <input type='hidden' name='datetimefrom' value='$datetimefrom2'>
                                <input type='hidden' name='datetimeto' value='$datetimeto2'>  
                                    
                                                        
                                <input type='submit' name='saveot' value='Save' />
                            
                          
                            </th>
                        <td></td>
                       </tr> 
                      <tr>
                    
                        <th>Social Security No.:</th>
                        <td><input type='text' name='empssn' id='myPass' value='$row[0]' readonly/></td>
                       </tr>
                       <tr>
                        <th> First Name:</th>
                        <td><input type='text' name='fname' id='myPass' value='$row[1]' readonly/></td>
                       </tr>
                       <tr>
                        <th> Last Name:</th>
                       <td><input type='text' name='lname' id='myPass' value='$row[2]' readonly/></td>
                       </tr> 
                         </table> 
                         
                         
                        <table id='tfhover' class='tftable'>
                        </tr>
                        <td>DATE :</td>
                         <td><input type='text' name='otdate' value=' $date' readonly/></td>
                       </tr> 
                        <tr><td>DATE-TIME FROM:</td><td>
                       
                        <input type='datetime' name='dtimfrom' value=' $d1' readonly/>
                        </td><td>LINE ITEM CODE:</td><td><input type='text' name='lineitemcode' value='230-02' readonly/>
                        </td><td></td><td></td></tr>
                            

                        <tr><td>DATE-TIME TO:</td><td>
                        <input type='datetime' name='dtimto' value='$d2'  readonly/>



                        </td><td>FIRM:</td><td><input type='text' name='firm' value='CUSTOMS AND EXCISE' readonly/>
                        </td><td></td><td></td></tr>
                        
                        <tr><td>HOURS:</td><td><input type='text' name='hours' size='6' value='";  echo $testdeci
                                
                                
                                ."' readonly></td>
                        
                    <td>OVERTIME STATUS:</td><td><input type='text' name='status' value='$status' size='10'readonly/>

                        </td><td></td><td></td><td>
                        </td>
                        <td> </td>

                        </tr>
                        
                       
                        <tr><td>AMOUNT:</td><td><input type='text' name='amount' value='$amount' size='10'readonly/></td>
                        <td>SERVICE PERFORM:</td>
                        <td>
                            
                            <input list='serviceperform' name='serviceperform' size='35'required>
                            <datalist id='serviceperform'>
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