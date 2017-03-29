<?php


 if(isset($_POST['saveeditot'])) { 
           
    $otid= $_POST['otid'];
    
    $empssn = $_POST['empssn'];
    
    $name = $_POST['fname']. ' '. $_POST['lname'];
    
    $dtimefrom = $_POST['datetimefrom'];
    
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

   
  

 include 'Credentials/Credentials.php'; 

            $link = new mysqli("$host", "$user", "$passwd", "$database") or die("Error" . mysqli_error($link));
            
            $sql = "UPDATE bz SET social='$empssn',name='$name', fname='$fname',lname='$lname', timefrom='$dtimefrom', "
                    . "lineitemcode='$licode',timeto='$dtimeto',firm='$firm',hours='$hours',amount='$amount',serviceperform='$serviceperform',"
                    . "salary='$salary',officerpost='$officerpost',costcentercode='$costcentercode',program='$program',activitycode='$activitycode',"
                    . "otrate='$otrate',wklyhrs='$wklyhrs',duplicate='$duplicate'WHERE otid=$otid";
            
            if (mysqli_query($link, $sql)) {
                        echo"<script type='text/javascript'>\n";
                        echo"alert('Over Time Record UPDATED successfully!');\n";
                        echo"</script>";
                        
                        include_once 'bzviewot.php'; 
            } else {
                echo "Error updating record: " . mysqli_error($link);
            }

            mysqli_close($link);

         }
         
 if(isset($_POST['verify'])) { 
           
       
$datetimefrom = new DateTime($_POST['datetimefrom']);
$datetimeto = new DateTime($_POST['datetimeto']);

$interval = $datetimefrom->diff($datetimeto);


 $login = strtotime($_POST['datetimefrom']);
  $current_time = strtotime($_POST['datetimeto']);
  $minsdiff = (((($current_time-$login)%3600)/60)*60)/3600;
  
  $testdeci = $interval->format('%H') + $minsdiff;
  
  

  
  

         }