<?php
    $dateentered = date("Y-m-d") . ' '.date("h:i:s A");
    $empssn = $_POST['empssn'];
    $name = $_POST['fname']. ' '. $_POST['lname'];
    $datetimefrom = $_POST['datetimefrom'];
    $licode = $_POST['lineitemcode'];
    $dtimeto = $_POST['datetimeto'];
    $firm = $_POST['firm'];
    $hours = $_POST['hours'];
    $amount = $_POST['amount'];
    $serviceperform = $_POST['serviceperform'];
   
   //hidden values
   $salary = $_POST['salary'];
   $officerpost = $_POST['officerpost'];
   $costcentercode = $_POST['costcentercode'];
   $program = $_POST['program'];
   $activitycode = $_POST['activitycode'];
   $otrate = $_POST['otrate'];
   $wklyhrs = $_POST['wklyhrs'];
   
   $duplicate = $_POST['empssn']. ' '. $_POST['datetimefrom']. ' '. $_POST['datetimeto'];
   $fname = $_POST['fname'];
   $lname =$_POST['lname'];
  // $officer = $POST_[$_SESSION['id']];
   
   
           include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  

         $sql = "SELECT * FROM BZ WHERE duplicate='$duplicate";
            
       //check if employee ot exits already  
        $check = sqlsrv_query($conn, "SELECT * FROM cz WHERE duplicate='$duplicate'");
        $checkrows= sqlsrv_has_rows($check);
        if($checkrows>0)
        {
             echo"<script type='text/javascript'>\n";
             echo"alert('Employee Over Time Record Already Exits!');\n";
             echo"</script>";
           include_once 'clerkaddot.php';
        }
      
   else
   {
        //insert results from the form input	
	$sql = "INSERT INTO cz (duplicate,social,name,timefrom,timeto,hours,firm,serviceperform,salary,officerpost,costcentercode,program,activitycode,otrate,wklyhrs,fname,lname,lineitemcode,amount,dateentered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($duplicate, $empssn, $name,$datetimefrom, $dtimeto, $hours, $firm, $serviceperform, $salary, $officerpost, $costcentercode, $program, $activitycode, $otrate, $wklyhrs, $fname, $lname, $licode, $amount, $dateentered);	
       
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if($stmt === false){
           die(print_r(sqlsrv_errors(), true));            
        }else
        {   
  
        echo"<script type='text/javascript'>";
        echo"alert('Employee Overtime Record Saved!');\n";
        echo"</script>";
        include_once 'clerkaddot.php';

        }

        sqlsrv_close($conn);
   }
   
   
  
  
  
 
   