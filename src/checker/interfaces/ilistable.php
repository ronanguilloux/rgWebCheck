<?php
/**
 * iSuitable (!) interface PHP file
 * Created on 8 January 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource suitable.php
 */

/**
 * Define an interface for processable classes
 *
 * @package WebChecker
 * @version //autogen//
 *
 */
interface iListable
{
   
    /**
     * add an item to a suite
     * 
     * @param string $item
     */
    
    /**
     * Add a benchmark, accept only iBenchmarkable objects
     * 
     * @param iBenchmarkable object $value
     * @param string $key
     * @return array $result
     */
    public function add($value, $key=null);
    
}


?>