<?php
/**
 * 
 * Bridge class calling java tool to populate compiled jasper reports
 * @author Zdenek Machek, LoftDigital.com
 *
 */
class ReportCreator{
	
	const REPORT_INVALID_PARAMS = 8;
	const REPORT_DOESNOT_EXISTS = 2;
	const REPORT_CREATED_REPORT_EXISTS = 3;
	const REPORT_NOT_SUPORTED_OUTPUT_FORMAT = 4;
	const REPORT_INVALID_CONFIGURATION_FILE = 5;
	const REPORT_INVALID_REPORT_PARAMETERS = 6;
	const REPORT_ERROR_EXECUTION = 7;
	const REPORT_ITERNAL_ERROR = 1;
        const DATABASE_CONNECTION = 9;
	
	protected $reportName = 'cusOT.jasper';
	protected $generatedReportName = 'cusOT.pdf';
	protected $reportFormat = 'pdf';
	protected $availableExporters = array('pdf','xls','docx','ods','odt','html');
	protected $reportsDir = 'C:\\Apache\\htdocs\\cusovertime\\';
	protected $reportsExportDir = 'C:\\Apache\\htdocs\\cusovertime\\reports\\';
		
	/**
	 * 
	 * 
	 * @param string $reportName
	 * @param string $generatedReportName
	 * @param string $reportFormat
	 */
	function __construct(){
		$this->init();
	}
	
	private function init(){
		if(!file_exists($this->reportsDir.$this->reportName)){
			throw new InvalidArgumentException("Report doesn't exists ".$this->reportsDir.$this->reportName);
		}
		
		$pathInfo = pathinfo($this->reportsDir.$this->reportName);
		
		if($pathInfo['extension'] != "jasper") throw new InvalidArgumentException(" .jasper must be provided and same jasperreports version used.");
				
		if(!in_array($this->reportFormat, $this->availableExporters)){
			throw new InvalidArgumentException("Unsupported export format");
		}
	}
	
	/**
	 * 
	 * Calling java .jar creator and population report
	 * @param array $parameters
	 * @throws Exception
	 */
	public function createReport($dfrom, $dto){
		
		$config = new MyConfig();
		$output = array();
                       if(!file_exists("reporting.jar")) throw new Exception("reporting.jar file not found");
		 
		$command = "java -jar reporting.jar ".$dfrom." ".$dto." cusOT.jasper";
		//echo $command;
		
		//if(!is_null($parameters)){
			//$serialliazedParams = addslashes(json_encode($parameters));
			//$command .= " \"".$serialliazedParams."\"";
		//}
echo $command;
		
		exec($command, $output, $returnValue);
		if(is_array($output)) $output = implode($output,' ');
		echo $returnValue;
		switch($returnValue){
			case self::REPORT_DOESNOT_EXISTS:
				throw new Exception("ERROR - report doesn't exists \n".$output, self::REPORT_DOESNOT_EXISTS);
			break;
			case self::REPORT_CREATED_REPORT_EXISTS:
				throw new Exception("ERROR - generated report already exists \n".$output, self::REPORT_CREATED_REPORT_EXISTS);
			break;
			case self::REPORT_NOT_SUPORTED_OUTPUT_FORMAT:
				throw new Exception("ERROR - not supported output format \n".$output, self::REPORT_NOT_SUPORTED_OUTPUT_FORMAT);
			break;
			case self::REPORT_INVALID_PARAMS:
				throw new Exception("ERROR - invalid parameters for report creation \n".$output, self::REPORT_INVALID_PARAMS);
			break;
			case self::REPORT_INVALID_CONFIGURATION_FILE:
				throw new Exception("ERROR - not valid configuration file \n".$output, self::REPORT_INVALID_CONFIGURATION_FILE);
			break;
			case self::REPORT_INVALID_REPORT_PARAMETERS:
				throw new Exception("ERROR - invalid report parameters \n".$output, self::REPORT_INVALID_REPORT_PARAMETERS);
			break;
			case self::REPORT_ERROR_EXECUTION:
				throw new Exception("ERROR - problem during executing report \n".$output, self::REPORT_ERROR_EXECUTION);
			break;
			case self::REPORT_ITERNAL_ERROR:
				throw new Exception("ERROR - iternal error, something wrong with report population - invalid params? \n".$output, self::REPORT_ITERNAL_ERROR);
			break;
                        case self::DATABASE_CONNECTION:
				throw new Exception("Database connection \n".$output, self::DATABASE_CONNECTION);
			break;
			default:
				return(true);
			break;
		}
	}
}

class MyConfig{
	public $db_user = 'sa';
	public $db_pass = '2hard4u2get(*)!';
	public $db_host = '192.168.4.9';
	public $db_name = 'cusot';
   }