<?php
/**
 * iStructurable interface PHP file
 * Created on 8 January 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource istructurable.php
 */

/**
 * Define an interface for structurable classes
 * 
 * @see http://qafoo.com/blog/016_struct_classes_in_php.html
 * @package WebChecker
 * @version //autogen//
 *
 */
interface iStructurable
{
   
    /**
     * Getters
     * 
     * @param string $property
     */
    public function __get( $property );
    
    /**
     * Setters
     * 
     * @param string $property
     * @param mixed $value
     */
    public function __set( $property, $value );
            
}


?>