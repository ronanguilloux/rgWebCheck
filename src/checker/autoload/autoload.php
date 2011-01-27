<?php
/**
 * File containing the places lib's autoload array, matching files to PHP Classes
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource autoload.php
 */

return array(
	'chkGlobalException'	                => 'classes/exceptions.php',
    'chkEmptyOptionsCheckException'	        => 'classes/exceptions.php',
    'chkMissingOptionsCheckException'	    => 'classes/exceptions.php',
    'chkMissingParameterCheckException'	    => 'classes/exceptions.php',
    'chkMissingPHPExtensionCheckException'	=> 'classes/exceptions.php',
    'chkFilterVarException'	                => 'classes/exceptions.php',
    'chkSiteAccessCrawlerException'	        => 'classes/exceptions.php',
    'chkPermissionsCheckException'      	=> 'classes/exceptions.php',
    'chkExternalCheckException'	            => 'classes/exceptions.php',
    'chkW3CPearCheckException'	            => 'classes/exceptions.php',
    'chkSEOCheckException'	                => 'classes/exceptions.php',
    'chkMetaCheckException'	                => 'classes/exceptions.php',
    'chkNoDebugCheckException'	            => 'classes/exceptions.php',
    'chkModuleViewPolicyCheckException'	    => 'classes/exceptions.php',
    'chkSettingsCheckException'	            => 'classes/exceptions.php',
    'chkTooLongLogsCheckException'	        => 'classes/exceptions.php',
    'chkeZDBIntegrityCheckException'	    => 'classes/exceptions.php',
    'chkSysInfoCheckException'	            => 'classes/exceptions.php',
    'chkGoogleCheckException'	            => 'classes/exceptions.php',
    'chkWebsite2dot0CheckException'         => 'classes/exceptions.php',
    'chkPerformanceCheckException'	        => 'classes/exceptions.php',
    'chkRedirectCheckException'	            => 'classes/exceptions.php',
    'chkCanonicalCheckException'	        => 'classes/exceptions.php',
    'chkTmpDirSizeCheckException'	        => 'classes/exceptions.php',
    'chkGenerateCheckSummaryException'	    => 'classes/exceptions.php',
    'chkAllTests'	                        => 'tests/alltests.php',
	'chkProcessTest'	                    => 'tests/processtest.php',
	'chkBenchmarkDemoTest'    	        	=> 'tests/benchmarkdemotest.php',
	'chkBenchmarkLogTest'	 	            => 'tests/benchmarklogtest.php',
	'chkBenchmarkUriTest'	 	            => 'tests/benchmarkuritest.php',
	'chkBenchmarkSuiteTest'  	          	=> 'tests/benchmarksuitetest.php',
	'chkBenchmarkW3CTest'	 	            => 'tests/benchmarkw3ctest.php',
    'iProcessable'                          => 'interfaces/iprocessable.php',    
	'iListable'	                            => 'interfaces/ilistable.php',
	'iBenchmarkable'	                    => 'interfaces/ibenchmarkable.php',
	'iStructurable'	                        => 'interfaces/istructurable.php',
	'chkProcess'                            => 'classes/process.php',
	'chkBenchmarkSuite'                     => 'classes/benchmarksuite.php',
	'chkStructUriOptions'                   => 'classes/structurioptions.php',
	'chkBenchmarkDemo'                      => 'extensions/demo.php',
    'chkBenchmarkUri'                       => 'extensions/uri.php',
	'chkBenchmarkW3C'                       => 'extensions/w3c.php',

);
?>