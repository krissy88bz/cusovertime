<?php
    $gerenaredReport = 'http://192.168.3.108/cusovertime/reports/cusOT.pdf';
	$error = null;
	$dfrom = '';
	$dto = '';
	
	//if(isset($_POST['sent']) && $_POST['sent']==1){
	require_once 'ReportCreator.php';
		try{
                    $dfrom = date("Y-m-d",strtotime($_POST["search"]["post_at"]));
                    $dto = date("Y-m-d", strtotime($_POST["search"]["post_at_to_date"]));
                    
			$reportCreator = new ReportCreator();
			$reportCreator->createReport($dfrom,$dto);
		}catch (Exception $e){
			$error = $e->getMessage();
         }
                
		
	//}

	if(!is_null($error)) echo "<p>{$error}</p>";
	
	if(!is_null($gerenaredReport)){
            //echo "<p>Report created <a href =\"{$gerenaredReport}\" target=\"_blank\"> {$gerenaredReport}</a></p>";
            //header("Content-type: application/pdf");
            //header("Content-Length: " . filesize($gerenaredReport));
            //@readfile('reports/cusOT.pdf');
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=cusOT.pdf");
			@readfile('reports/cusOT.pdf');

        }
?>