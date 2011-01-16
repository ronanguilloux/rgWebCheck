<?php
/**
 * checkerAllTests Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebCheckerTests
 * @filesource alltests.php
 */

/**
 * checkerAllTests class for checker.
 * Generated by PHPUnit on 2011-01-12 at 23:50:17.
 *
 * @package WebCheckerTests
 * @version //autogen//
 */
class checkerAllTests
{

    /**
     * Set up a PHPUnit_Framework_TestSuite instance
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite( 'PHPUnit Framework' );
        $suite->addTestSuite( 'checkerProcessTest' );
        $suite->addTestSuite( 'checkerBenchmarkSuiteTest' );
        $suite->addTestSuite( 'checkerBenchmarkDemoTest' );
        $suite->addTestSuite( 'checkerBenchmarkUriTest' );
        return $suite;
    }
}