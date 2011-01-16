<?php
/**
 * checkerBenchmarkSuite Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource checkerbenchmarksuite.php
 */

/**
 *  checkerBenchmarkSuite Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class checkerBenchmarkSuite implements iListable
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
        $this->suite = array();
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
            case 'suite':
                if ( !is_array( $propertyValue ) )
                {
                    throw new ezcBaseValueException( $propertyName, $propertyValue, $propertyName . ' is not a benchmarkSuite object, __set() impossible in ' . __CLASS__ );
                }
                $this->properties['suite'] = $propertyValue;
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
     * @see iListable::add()
     */
    public function add( $value, $key=null )
    {

        if ( !( $value instanceof iBenchmarkable ) )
        {
            throw new ezcBaseValueException( 'value', 'the $value param is not a checkerBenchmark instance', 'checkerBenchmark' );
        }

        if ( $key === null)
        {
            // PHPUnit implementing : preventing Indirect modification of overloaded property benchmarkSuite::$suite has no effect error
            $suite = $this->suite;
            $suite[(string)$value] = $value;
            return $this->suite = $suite;
        }
        // PHPUnit implementing : preventing Indirect modification of overloaded property benchmarkSuite::$suite has no effect error
        $suite = $this->suite;
        $suite[$key] = $value;
        return $this->suite = $suite;
    }

    /**
     * Run a benchmark suite, optionnaly excluding certain items
     * 
     * @param array $options. Ex : $options['excluded'] = array('BenchmarkClassNameTobeExcluded');
     */
    public function run( $options = array() )
    {
        $suite = $this->suite;
        if( isset( $options['excluded'] ) )
        {
            foreach ( $options['excluded'] as $excludable )
            {
                unset( $suite[$excludable] );
            }
        }
        foreach ($suite  as $key=>$benchmark ) {
            $benchmark->run();
        }
        $this->suite = $suite;
    }
}
