
<?php   

 //$lifetime=600;
  //session_set_cookie_params($lifetime);
  
session_start(); 

if(isset($_SESSION['id'])){
   echo $_SESSION['id'];
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
    <link rel="stylesheet" href="assets/css/sstyle.css"> <!-- Search -->
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    
    <style>

table {
    width:50%;
     margin-left: 220px;
     margin-bottom: 50px;
}
table, th, td {
    border: 1px ;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
   
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
  
    color: Black;
    
}



</style>
    
    
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
                <a class="navbar-brand" href="bzhome.php">
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
                        <a href="bzhome.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="bzAddUserAcc.php">Add User Account</a>
                            </li>
                            <li>
                                <a href="bzsearchuseracc.php">Search User Account</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     
                                       
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Employee<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="bzaddemployee.php">Add New</a>
                            </li>
                            <li>
                                <a href="bzsearchemployee.php">View Employee Profile</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Over Time<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="bzaddot.php">Add New</a>
                            </li>
                            <li>
                                <a href="bzviewot.php">View Records</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                         <a href="bzcreatereport.php"><i class="fa fa-files-o fa-fw"></i>Create Report<span></span></a>
                        
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
                            
                            View, Edit or Delete User Profile from OverTime System
                            
                            </b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>    
      

  <!--search -->
            <div class="searchtestbox" >
              

                     <div id="gradient"></div>
                     
                     <form class="searchbox"  method="post" action="bzsearchuseracc.php">
                <input type="search" placeholder="Search by Email or Name"  name="find"/>


                <button type="submit" name="search" value="Search" class="button"> 
                <img src="assets/img/searchbutton.jpg" width="25" height="25"/>
              </button>
               </form>
                  
              <hr>
             
               <?php
            include 'delete.php'; 
            include 'editpage.php'; 
            
            include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  

            
                    
            if(isset($_POST['search']))
            {
                $find =$_POST['find'];
                
                if ($find == "")
                {
                echo "<p>You forgot to enter a search term!!!";
                exit;
                }
            
                $sql="SELECT * FROM login WHERE email LIKE '$find' or fname LIKE '$find' or lname LIKE '$find'";

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
                          
                            <input action='delete.php' type='submit' value='Delete' name='delete'/>
                            <input action='editpage.php' type='submit' value='Edit' name='edit'/>
                          
                            </th>
                        <td></td>
                       </tr> 
                      <tr>
                        <th>Email:</th>
                        <td>$row[0]</td>
                       </tr>
                       <tr>
                        <th> First Name:</th>
                        <td><input type='text' name='fname' id='myPass' value='$row[2]' disabled='disabled' /></td>
                       </tr>
                       <tr>
                        <th> Last Name:</th>
                       <td><input type='text' name='lname' id='myPass' value='$row[3]' disabled='disabled' /></td>
                       </tr>
                       <tr>
                        <th>Password:</th>
                        <td><input type='password' name='pw' id='myPass' value='$row[1]' disabled='disabled' /></td>
                       </tr>
                       <th> Location:</th>
                        <td><input type='text' name='location' id='myPass' value='$row[4]' disabled='disabled' /></td>
                       </tr>
                      <th> Role:</th>
                        <td><input type='text' name='role' id='myPass' value='$row[5]' disabled='disabled' /></td>
                       </tr>
                       
                    </table> </form>"; 
                     
                      
                    }
                  // Free result set
                 sqlsrv_free_stmt($result);
                  
                  
                }
                
                          
            
            ?>
               </div> 
  
             
               <!--end  search -->

               
               
               
               

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