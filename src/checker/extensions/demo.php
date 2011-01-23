<?php
/**
 * checkerBenchmarkDemo Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource demo.php
 */

/**
 *  checkerBenchmarkDemo Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class checkerBenchmarkDemo implements iBenchmarkable
{

    /**
     * Holds the properties of this class.
     *
     * @var array(string=>mixed)
     */
    protected $properties = array();

    /**
     * .Ctor
     */
    public function __construct( )
    {
        $this->options = array();
    }

    /**
     * Returns the value of the property $name.
     *
     * @throws ezcBasePropertyNotFoundException if the property does not exist.
     * @param string $name
     * @ignore
     */
    public function __get( $name )
    {
        if ( isset( $this->properties[$name] ) )
        {
            return $this->properties[$name];
        }
        throw new ezcBasePropertyNotFoundException( $name . ' property unknown in ' . __CLASS__ . ' definition.' );
    }
     
    /**
     * Sets the $propertyName to $propertyValue.
     *
     * @throws ezcBaseValueException if the property does not exist.
     * @param string $propertyName
     * @param mixed $propertyValue
     * @ignore
     */
    public function __set( $propertyName, $propertyValue )
    {
        switch ( $propertyName )
        {
            case 'options':
                if ( !is_array( $propertyValue ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a benchmarkSuite object, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['options'] = $propertyValue;
                break;
            default:
                throw new ezcBasePropertyNotFoundException( $propertyName . ' property is unknown, __setting impossible in ' . __CLASS__ );
        }
    }

    /**
     * Returns true if the property $name is set, otherwise false.
     *
     * @param string $name
     * @return bool
     * @ignore
     */
    public function __isset( $name )
    {
        return array_key_exists( $name, $this->properties );
    }

    /**
     * toString() implementation
     *
     * @return string class name
     */
    public function __toString()
    {
        return get_class( $this );
    }

    /**
     * (non-PHPdoc)
     * @see iBenchmarkable::setUp()
     */
    public function setUp($options = array())
    {
        //...
    }

    /**
     * (non-PHPdoc)
     * @see iBenchmarkable::run()
     */
    public function run()
    {
        $result = array();
        $result['status'] = true;
        return $result;
    }
}
