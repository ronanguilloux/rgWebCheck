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
    'iProcessable'              => 'interfaces/iprocessable.php',
    'checkerProcess'            => 'classes/process.php',
	'iListable'	                => 'interfaces/ilistable.php',
	'iBenchmarkable'	        => 'interfaces/ibenchmarkable.php',
    'checkerBenchmark'	        => 'classes/benchmark.php',
	'checkerBenchmarkDemo'      => 'classes/benchmark/demo.php',
    'checkerBenchmarkUri'       => 'classes/benchmark/uri.php',
	'checkerBenchmarkSuite'	    => 'classes/benchmarksuite.php',
    'checkerAllTests'	        => 'tests/alltests.php',
	'checkerProcessTest'	    => 'tests/processtest.php',
	'checkerBenchmarkDemoTest'	=> 'tests/benchmarkdemotest.php',
	'checkerBenchmarkUriTest'	=> 'tests/benchmarkuritest.php',
	'checkerBenchmarkSuiteTest'	=> 'tests/benchmarksuitetest.php',
);
?>