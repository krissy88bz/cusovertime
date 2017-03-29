<?php

session_start(); 
ob_start();
require('writeHTML/WriteHTML.php');

if(isset($_SESSION['id'])){
   echo $_SESSION['id'];
}
	 
            include 'Credentials/Credentials.php'; 

            //phpinfo();
           $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$passwd);
           $conn = sqlsrv_connect( $host, $connectionInfo);

            //$conn = sqlsrv_connect($host, $user, $passwd, $database);

           if( $conn === false ) 
               {
                die( print_r( sqlsrv_errors(), true));
               }  


	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
        
           
        
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition = "WHERE timefrom BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from cz " . $queryCondition . " ORDER BY social asc";
      
        
	$result=sqlsrv_query($conn,$sql);
                           
              
            if (isset($_POST['go'])) {
                                
                                $pdf = new FPDF();
                                $pdf->Open();
                                //$pdf->AddPage();
                                $pdf->SetFont('Arial','',10);
                                //Start Copy
                                $ssn_num = array();
                                    // Fetch one and one row
                                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                                        {
                                        $ssn_num = $row[2] = $row;
                                        
                                        foreach($ssn_num as $row => $value){
                                            
                                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
                                        {
                                                $pdf->AddPage();
                                        $month = date('M y', strtotime($post_at));  
                                        $ss = $row[2];
                                        $name = $row[3];
                                        $officerpost = $row[11];
                                        $salary = $row[10];
                                        $ccc = $row[12];
                                        $program = $row[13];
                                        $lic = $row[15];
                                        $ac = $row[14];
                                        
                                        }
                                     }
                                        
                                     /*   $date = date_format($row[5], "Y-m-d");
                                        $timefrom = date_format($row[5], "g:i:a");
                                        $timeto = date_format($row[6], "g:i:a");
                                        $serviceperform = $row[9];
                                        $hours = $row[7];
                                        $firm = $row[8];
                                        $amount = $row[18];*/
                                        
                                      $queryCondition2 = "SELECT * FROM cz WHERE cz.timefrom BETWEEN '".$fiy. "-".$fim. "-".$fid ."' and '". $post_at_todate . "' AND cz.social = '".$ssn_num."'";
                                      
                                       $result2=sqlsrv_query($conn,$queryCondition2);

                                          $data2 = array();
                                          
                                            while ($row2 = sqlsrv_fetch_array($result2))
                                            {
                                                  $date = date_format($row2[5], "Y-m-d");
                                                  $timefrom = date_format($row2[5], "g:i:a");
                                                  $timeto = date_format($row2[6], "g:i:a");
                                                  $serviceperform = $row2[9];
                                                  $hours = $row2[7];
                                                  $firm = $row2[8];
                                                  $amount = $row2[18]; 
                                        
                                      
                                        $pdf->SetY(12);
                                        $pdf->SetX(15);
                                        $pdf->Cell(200,6,"OfficerName:");
                                        $pdf->SetY(12);
                                        $pdf->SetX(36);                            
                                        $pdf->Cell(100,6,$name);

                                        $pdf->SetY(12);
                                        $pdf->SetX(80);
                                        $pdf->Cell(200,6,"SSN:");
                                        $pdf->SetY(12);
                                        $pdf->SetX(89);
                                        $pdf->Cell(200,6,$ss);
                                        
                                        $pdf->SetY(12);
                            $pdf->SetX(109);
                            $pdf->Cell(200,6,"OfficerPost:");
                            $pdf->SetY(12);
                            $pdf->SetX(129);
                            $pdf->Cell(200,6,$officerpost);
                            
                            $pdf->SetY(12);
                            $pdf->SetX(165);
                            $pdf->Cell(200,6,"Salary:");
                            $pdf->SetY(12);
                            $pdf->SetX(177);
                            $pdf->Cell(200,6,$salary);
                            //New Line
                            $pdf->SetY(18);
                            $pdf->SetX(15);
                            $pdf->Cell(200,6,"Claim For The Month Of:");
                            $pdf->SetY(18);
                            $pdf->SetX(56);
                            $pdf->Cell(200,6,$month);
                            
                             //new line
                            
                            $pdf->SetY(24);
                            $pdf->SetX(15);
                            $pdf->Cell(200,6,"CostCenterCode:");
                            $pdf->SetY(24);
                            $pdf->SetX(43);
                            $pdf->Cell(200,6,$ccc);
                            
                            $pdf->SetY(24);
                            $pdf->SetX(63);
                            $pdf->Cell(200,6,"Program:");
                            $pdf->SetY(24);
                            $pdf->SetX(79);
                            $pdf->Cell(200,6,$program);
                            
                            $pdf->SetY(24);
                            $pdf->SetX(92);
                            $pdf->Cell(200,6,"ActivityCode:");
                            $pdf->SetY(24);
                            $pdf->SetX(113);
                            $pdf->Cell(200,6,$ac);
                            
                            $pdf->SetY(24);
                            $pdf->SetX(128);
                            $pdf->Cell(200,6,"LineItemCode:");
                            $pdf->SetY(24);
                            $pdf->SetX(151);
                            $pdf->Cell(200,6,$lic);
                            
                            $pdf->SetY(34);
                            $pdf->SetX(15);
                            $pdf->Cell(200,6,"Date");
                            $pdf->SetY(34);
                            $pdf->SetX(35);
                            $pdf->Cell(200,6,"TimeFrom");
                            $pdf->SetY(34);
                            $pdf->SetX(55);
                            $pdf->Cell(200,6,"TimeTo");
                            $pdf->SetY(34);
                            $pdf->SetX(72);
                            $pdf->Cell(200,6,"ServicePerform");
                            $pdf->Ln();
                            $pdf->SetY(34);
                            $pdf->SetX(128);
                            $pdf->Cell(200,6,"Hours");
                            $pdf->SetY(34);
                            $pdf->SetX(142);
                            $pdf->Cell(200,6,"Firm");
                            $pdf->SetY(34);
                            $pdf->SetX(184);
                            $pdf->Cell(200,6,"Amount");
                            $increment = 38;
                             //NewLine
                            $pdf->SetY($increment);
                            $pdf->SetX(15);
                            $pdf->Cell(200,6,$date,0, 1);
                            
                            $pdf->SetY($increment);
                            $pdf->SetX(36);
                            $pdf->Cell(200,6,$timefrom,0, 1);
                            
                            $pdf->SetY($increment);
                            $pdf->SetX(55);
                            $pdf->Cell(200,6,$timeto,0, 1);
                            
                            $pdf->SetY($increment);
                            $pdf->SetX(72);
                            $pdf->Cell(200,6,$serviceperform,0, 1);
                            
                           $pdf->SetY($increment);
                            $pdf->SetX(128);
                            $pdf->Cell(200,6,$hours,0, 1);
                            
                            $pdf->SetY($increment);
                            $pdf->SetX(142);
                            $pdf->Cell(200,6,$firm,0, 1);
                            
                            $pdf->SetY($increment);
                            $pdf->SetX(184);
                            $pdf->Cell(200,6,$amount, 0, 1);
                            
                            $pdf->SetY(270);
                            $pdf->SetX(15);
                            $pdf->Cell(200,6,"Total IncomeTax:", 0, 1);
                            
                            $pdf->SetY(270);
                            $pdf->SetX(65);
                            $pdf->Cell(200,6,"Total OverTime:", 0, 1);
                            
                            $pdf->SetY(270);
                            $pdf->SetX(115);
                            $pdf->Cell(200,6,"Total Hours:" , 0, 1);
                            
                            $pdf->SetY(270);
                            $pdf->SetX(163);
                            $pdf->Cell(200,6,"Net Income:", 0, 1);
                            
                                    }
                            }        
                       
                                   $pdf->Output();    
                                }//go
                                          
                                
                                //
                           
                                        
                                        
                    
                                        //$pdf->Output();
                                        //$pdf->AddPage();
                                        
                            //End Copy            
                   
                                        //
                                        
                                         sqlsrv_free_stmt($result);
                                         ob_end_flush(); 
               
                       ?>
          
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
    
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
        .table-content{margin-left: 30px;}
        .table-content{margin-bottom: 50px;}    
	.table-content{border-top:lightblue 4px solid; width:90%;}
	.table-content th {padding:12px 10px; background: lightblue;vertical-align:top;} 
	.table-content td {padding:2px 10px; border-bottom: lightblue 1px solid;vertical-align:top;} 
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
                            
                            Search/Print Monthly Over Time Report from OverTime System
                            
                            </b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>    
      
    <!--search -->
            <div class="searchemployeetestbox" >
              

                     <div id="gradient"></div>         
            
            
                                    <h2 style="margin-left:30px">Search Over-Time Records By Date</h2>
                                    <form name="frmSearch" method="post" action="printreport.php">
                             
                                    <input type="text" placeholder="Date From" id="post_at" name="search[post_at]" style="margin-left:30px" value="<?php echo $post_at; ?>" class="input-control" />
                                <input type="text" placeholder="Date To" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:30px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
                                <input type="submit" name="go" value="Search" style="margin-left:20px;  height:30px; width:110px; " > <p></p>
                              
                                            
                      </table>
                    
                    </form>
                    </div>
                     </div>
            
            
          
            
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "assets/img/datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</body></html>
