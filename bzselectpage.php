



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
     margin-left: 120px; 
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
//NEW OTTABLE
table.tftable {
    font-size:12px;
    color:#ebebeb;
    width:100%;
    border-width: 1px;
    border-color: #ebebeb;
    border-collapse: collapse;
    
}

table.tftable tr {
    font-size:16px;
    font-weight: bold;
    background-color:#ebebeb;
     
}
table.tftable td {
    font-size:14px;
    border-width: 1px;
    padding: 8px;
    border-color: #ebebeb;
   
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
                            
                           Add Employee Overtime Record to OverTime System
                            
                            </b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>    
      

  <!--overtime info -->
            <div class="addottestbox" >
              

                     <div id="gradient"></div>
                     
                     <form class="searchbox"  method="post" action="addot.php">
                <input type="search" placeholder="Search by Social Security No. or Name"  name="find"/>


                <button type="submit" name="search" value="Search" class="button"> 
                <img src="assets/img/searchbutton.jpg" width="25" height="25"/>
              </button>
               </form>
                  
              <hr>
             
               <?php
      
            include 'select.php'; 
            
            include 'Credentials/Credentials.php'; 

            $link = new mysqli("$host", "$user", "$passwd", "$database") or die("Error" . mysqli_error($link));
            
              ?>      
         <table id='t01'>
                      <tr>
                        
                            <form action='saveot.php' method='POST'>
                            
                            <th>
                                <input type='hidden' name='salary' value='$row[7]'>
                                <input type='hidden' name='officerpost' value='$row[3]'>
                                <input type='hidden' name='costcentercode' value='$row[4]'>
                                <input type='hidden' name='program' value='$row[9]'>
                                <input type='hidden' name='activitycode' value='$row[8]'>
                                <input type='hidden' name='otrate' value='$row[10]'>
                                <input type='hidden' name='wklyhrs' value='$row[6]'>
                                    
                                <input type='submit' name='cal' value='Verify'  />                            
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
                        
                        <tr><td>DATE-TIME FROM:</td><td>
                        <input type='datetime-local' name='datetimefrom' value='2016-06-27 15:36:25' required/>
                        </td><td>LINE ITEM CODE:</td><td><input type='text' name='lineitemcode' value='230-02' readonly/>
                        </td><td></td><td></td></tr>
                            


                        <tr><td>DATE-TIME TO:</td><td>
                        <input type='datetime-local' name='datetimeto' value=''  required/>



                        </td><td>FIRM:</td><td><input type='text' name='firm' value='CUSTOMS AND EXCISE' readonly/>
                        </td><td></td><td></td></tr>
                        
                        <tr><td>HOURS:</td><td><input type='text' name='hours' size='6' value='";  echo @$testdeci ."' ></td>
                        
                        <td>OVERTIME STATUS:</td><td><input type='text' name='otstatus' value='' size='10'/>

                        </td><td></td><td></td><td>
                        </td>
                        <td> </td>

                        </tr>
                        
                       
                        <tr><td>AMOUNT:</td><td><input type='text' name='amount' value='' size='10'required/></td>
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