<?php
/**
 * iBenchmarkable interface PHP file
 * Created on 8 January 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource ibenchmarkable.php
 */

/**
 * Define an interface for benchmarkable classes
 *
 * @package WebChecker
 * @version //autogen//
 *
 */
interface iBenchmarkable
{
   
    /**
     * Set up the process
     * 
     * @param chkStructUriOptions $uriOptions
     * @see iBenchmarkable::setUp()
     */
    public function setUp( $uriOptions = null );
    
    /**
     * Run the process
     * 
     * @return array $result
     */
    public function run();
        
}


?>