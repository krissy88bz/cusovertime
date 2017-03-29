<?php 
  $lifetime=120;
  session_set_cookie_params($lifetime);

session_start();  

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
    <link href="assets/css/regUser.css" rel="stylesheet" />
    
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
   
  <body>
      
   <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                    <img src="assets/img/logo.png" alt="" />
                </a>
            </div>
         
        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                
                                
                               <?php
                                    if(!isset($_SESSION['use'])) // If session is not set that redirect to Login Page                            {
                                         header("Location:Login.php");  


                                        echo $_SESSION['use'];

                                        echo "<a href='logout.php'> Logout</a> "; 
                              ?>
                                
                                
                                
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    
                    <li class="sidebar-search">
                        
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                              <img src="assets/img/cuslogo.png" width="98" height="119" alt="cuslogo"/>
 
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="home.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="AddUserAcc.php">Add User Account</a>
                            </li>
                            <li>
                                <a href="searchuseracc.php">Search User Account</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
                                       
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Employee<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addemployee.php">Add New</a>
                            </li>
                            <li>
                                <a href="searchemployee.php">View Employee Profile</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Over Time<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addot.php">Add New</a>
                            </li>
                            <li>
                                <a href="viewot.php">View Records</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                         <a href="createreport.php"><i class="fa fa-files-o fa-fw"></i>Create Report<span></span></a>
                        
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Custom's Over Time System</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>
                            
                            Register User to OverTime System
                            
                            </b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
            <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

            <div class="regtestbox">
              <h1>Registration</h1>

              <form action="register.php" method="POST" id="myform">
                  <hr>
                <div class="accounttype">
                    <center>Account Type: 
                    <select name="role" required>
                        <option>Clerk</option>
                        <option>Administrator</option>
                        
                    </select> 
                     Location: 
                     <select name="location" required>
                      
                      <option>Airport</option>
                      <option>Belize City</option>
                      <option>Benque</option>
                      <option>Corozal</option>
                      <option>Punta Gorda</option>
                      <option>San Pedro</option>
                    </select> 
                    </center>
                  <br /><br /> 
                  <label id="icon" for="name"><i class="icon-envelope "></i></label>
                  <input type="text" name="email" class="right" id="field" placeholder="Email" required/>
                  
                  
                    <br />
                  <label id="icon" for="name"><i class="icon-user"></i></label>
                  <input type="text" name="fname" id="name" placeholder="First Name" required/>
                  
                  <label id="icon" for="name"><i class="icon-user"></i></label>
                  <input type="text" name="lname" id="name" placeholder="Last Name" required/>
                   <br />
                  <label id="icon" for="name"><i class="icon-shield"></i></label>
                  <input type="password" name="pw" id="name" placeholder="Password" required/>
               
                  <label id="icon" for="name"><i class="icon-shield"></i></label>
                  <input type="password" name="pw2" id="name" placeholder="Enter Password Again" required/>
                  
                <br /><br />
                       
                 
                <input type="submit" value="Register" class="myButton" onclick="errormsg()"/>
                
                <?php if(isset($_GET['msg']))
                        echo $_GET['msg'];
                
                ?>
               
                </div>
                  </form>
              
              
              <hr>
             
               </div> 
               
              
              
            </div>
            

            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>    
      
      
</body>
</html>