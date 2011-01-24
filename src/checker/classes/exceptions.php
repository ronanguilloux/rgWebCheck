<?php
/**
 * Exceptions Classes php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource exceptions.php
 */

ini_set("log_errors_max_len",0);
error_reporting(E_ALL-E_NOTICE);

/**
 *  chkGlobalException Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class chkGlobalException extends Exception
{
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
		echo $this->Log($this->ShortTrace());
	}

	/**
	 * 
	 * @param string $outputFormat : (default:) cli, html (TODO : xml, json)
	 */
	public function longTrace($outputFormat = 'cli')
	{
		$longString = '';
		switch ($outputFormat)
		{
			case "html":
				$longString .= '<br />Message: ' . $this->getMessage();
				$longString .= '<br />Code: ' . $this->getCode();
				$longString .= '<br />File: ' . $this->getFile();
				$longString .= '<br />Line: ' . $this->getLine();
				break;
			default:

				$longString .= "\nMessage: " . $this->getMessage();
				$longString .= "\nCode: " . $this->getCode();
				$longString .= "\nFile: " . $this->getFile();
				$longString .= "\nLine: " . $this->getLine();
		}
		return $longString;
	}

	public function shortTrace()
	{
		return "Managed ". get_class($this)." raised in {$this->file} on line {$this->line} : [{$this->code}] {$this->message}";
	}

	/**
	 * 
	 * @param string $message
	 */
	public static function log($message, $severity = null)
	{
	    $message = date('Y-m-d H:i:s') . ' : ' . $message;
	    $filter = new ezcLogFilter();
	    $filter->severity = ezcLog::INFO;
	    if( $severity !== null )
	    {
	        $filter->severity = $severity;
	    }
        if( $log === null )
        {		
	        $log = ezcLog::getInstance();	        
        }
        $log->getMapper()->appendRule( new ezcLogFilterRule( $filter, new ezcLogUnixFileWriter( "/tmp/", "error.log" ), true ) );
        $log->log( $message, $severity );
	}
	
}

class chkEmptyOptionsCheckException extends chkGlobalException { }
class chkMissingOptionsCheckException extends chkGlobalException { }
class chkMissingParameterCheckException extends chkGlobalException { }
class chkMissingPHPExtensionCheckException extends chkGlobalException { }
class chkFilterVarException extends chkGlobalException { }
class chkSiteAccessCrawlerException extends chkGlobalException { }
class chkPermissionsCheckException extends chkGlobalException { }
class chkExternalCheckException extends chkGlobalException { }
class chkW3CPearCheckException extends chkGlobalException { }
class chkSEOCheckException extends chkGlobalException { }
class chkMetaCheckException extends chkGlobalException { }
class chkNoDebugCheckException extends chkGlobalException { }
class chkModuleViewPolicyCheckException extends chkGlobalException { }
class chkSettingsCheckException extends chkGlobalException { }
class chkTooLongLogsCheckException extends chkGlobalException { }
class chkeZDBIntegrityCheckException extends chkGlobalException { }
class chkSysInfoCheckException extends chkGlobalException { }
class chkGoogleCheckException extends chkGlobalException { }
class chkWebsite2dot0CheckException extends chkGlobalException { }
class chkPerformanceCheckException extends chkGlobalException { }
class chkRedirectCheckException extends chkGlobalException { }
class chkCanonicalCheckException extends chkGlobalException { }
class chkTmpDirSizeCheckException extends chkGlobalException { }
class chkGenerateCheckSummaryException extends chkGlobalException { }

?>