

<?php  

  $lifetime=600;
  session_set_cookie_params($lifetime);

session_start(); ?>  


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

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $email = $_POST['email'];
     $pass =  $_POST['password'];
     
      $sel_user = "select * from login where email='$email' AND pw='$pass'";

      
    $run_user = sqlsrv_query($conn, $sel_user);
    
   
    

    $check_user = sqlsrv_has_rows($run_user);
    
    if($check_user>0){
                
          $_SESSION['use']=$email;
          $_SESSION['last_time'] = time();
          
         while ($row = sqlsrv_fetch_array($run_user, SQLSRV_FETCH_NUMERIC))
        {
        $role = $row[5];
        $location = $row[4];
            
        }
        
         if($location === 'Corozal'){
                if($role === 'Administrator'){
                    
               echo '<script type="text/javascript"> window.open("czhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
            } 
            elseif ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("clerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
            } 
            elseif ($location === 'Belize City - Administrator') {
                
               echo '<script type="text/javascript"> window.open("bzhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                      
                
            }
            
            elseif ($location === 'Belize City - Administration') {
              
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            
                
            }
            
            
            elseif ($location === 'Belize City - Accounts') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Container / Examination') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - CMIS') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Customs Port') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Enforcement') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Excise') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Post Audit') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
                     
            elseif ($location === 'Belize City - Risk Management') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            
            elseif ($location === 'Belize City - Shipping') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
             
            elseif ($location === 'Belize City - Investigation') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
             elseif ($location === 'Belize City - Training') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Private Ware House') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Security') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Tourist Village') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Compt. Secretary') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Belize City - Post Office') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Benque') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
            }
                
            elseif ($location === 'Corozal') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'Punta Gorda') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            elseif ($location === 'San Pedro') {
              
                if ($role === 'Clerk') {
                echo '<script type="text/javascript"> window.open("bzclerkhome.php","_self");</script>';            //  On Successfull Login redirects to home.php
                
            }
                
            }
            
            
                       
                
            
            //-----------------------
            
            
         

        }

        else
        {
                
          
            echo "<script>alert('Invalid UserName or Password')</script>";        
        }
}




 ?>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customs Overtime System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/logo.png" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id= "email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id = "password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <input type="submit" value="Login" name="login"  class="btn btn-lg btn-success btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>
</html>