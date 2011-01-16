<?php
/**
 * WebChecker Process Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource process.php
 */

/**
 * checkerProcess Class
 *
 * @package WebChecker
 * @version //autogen//
 */
class checkerProcess implements iProcessable
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
        //...
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
            case 'logger':
                if ( !( $propertyValue instanceof ezcLog ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a logger object, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['logger'] = $propertyValue;
                break;
            case 'benchmarkSuite':
                if ( !( $propertyValue instanceof checkerBenchmarkSuite ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a logger object, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['benchmarkSuite'] = $propertyValue;
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
     * @see iProcessable::setUp()
     */
    public function setUp($logger = 'ezcLog', $settings = array())
    {
        switch ($logger) {
            default:
                $this->logger = ezcLog::getInstance();
                break;
        }
    }

    /**
     * (non-PHPdoc)
     * @see iProcessable::run()
     */
    public function run($benchmarkSuite = null)
    {
        if($benchmarkSuite)
        {
            $benchmarkSuite->run();
        }

        $result = array();
        $result['status'] = true;
        return $result;
    }

}
