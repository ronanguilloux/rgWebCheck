<?php
/**
 * chkBenchmarkW3C Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource w3c.php
 */

/**
 *  chkBenchmarkW3C Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class chkBenchmarkW3C implements iBenchmarkable
{

    const W3C_URL_CHECKER = 'http://validator.w3.org/check?uri=';

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
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not an array, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['options'] = $propertyValue;
                break;
            case 'urls':
                if ( !is_array( $propertyValue ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not an array, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['urls'] = $propertyValue;
                break;
            case 'stopOnError':
                if ( !is_bool( $propertyValue ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a boolean, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['stopOnError'] = $propertyValue;
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
    public function setUp( $options = array() )
    {
        if( isset( $options['urls'] ) )
        {
            $this->urls = $options['urls'];
        }
        $this->stopOnError = true;
        if( isset( $options['stopOnError'] ) )
        {
            $this->stopOnError = $options['stopOnError'];
        }
    }

    /**
     * Check W3C compliance check
     *
     * @param array $this->options - array('url'=>string, 'urls'=>array, 'fromPage'=>string)
     * @see http://pear.php.net/manual/en/package.webservices.services-w3c-htmlvalidator.examples.php
     * @see validator.w3.org/docs/api.html
     * @see iBenchmarkable::run()
     * @return boolean
     */
    public function run()
    {
        //TODO : RETURN an ARRAY :
        $result = array();

        $log = '';
        if ( !isset($this->urls ) ) {
            throw new chkMissingOptionsCheckException( __METHOD__.' : urls array is missing in $this->options parameter' );
        }

        if ( count($this->urls ) === 0 ) {
            throw new chkMissingOptionsCheckException( __METHOD__.' : urls array is empty in $this->options parameter' );
        }

        foreach ($this->urls as $url) {
            if ( !filter_var($url, FILTER_VALIDATE_URL ) ) {
                throw new chkFilterVarException( __METHOD__.' : '. $url . ' is not a valid URL' );
            }
        }

        // @codeCoverageIgnoreStart
        if ( class_exists('Services_W3C_HTMLValidator' ) ) {
            throw new chkW3CPearCheckException( __METHOD__.' : Please uncomment this piece of code below  in ' . __FILE__. ', line ' . __LINE__ . ' :' );

            //<PEAR's Services_W3C_HTMLValidator>
            //require_once 'Services/W3C/HTMLValidator.php';
            //$v = new Services_W3C_HTMLValidator();
            //$r = $v->validate($this->options['url'] );
            //return $r->isValid();
            //</PEAR's Services_W3C_HTMLValidator>
        }
        // @codeCoverageIgnoreEnd

        // @codeCoverageIgnoreStart
        if( !function_exists( 'curl_init' ) )
        {
            throw new chkMissingPHPExtensionCheckException( __METHOD__.' : is php-curl installed ? :' );
        }
        // @codeCoverageIgnoreEnd

        $success = true;

        foreach ($this->urls as $url) {
            if( $success )
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt( $ch, CURLOPT_URL, chkBenchmarkW3C::W3C_URL_CHECKER . $url );
            $html = curl_exec( $ch );
            curl_close( $ch );
            if(strpos( $html,"Passed" ) === false)
            {
                $message = "\n" . chkBenchmarkW3C::W3C_URL_CHECKER. $url  . " : ERRORS FOUND at the W3C validator check";
                $exception = new chkGlobalException();
                $exception->log( $message );
                $success = false;
                if( $this->stopOnError )
                {
                    break;
                }

            }
            $message = "\n" . chkBenchmarkW3C::W3C_URL_CHECKER . $url  . " : OK at the W3C validator check";
            $exception = new chkGlobalException();
            $exception->log( $message );
            $success = true;
        }
        return $success;
    }
}
