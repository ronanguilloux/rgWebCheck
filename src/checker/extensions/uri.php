<?php
/**
 * chkBenchmarkUri Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource uri.php
 */

/**
 *  Uri checker Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class chkBenchmarkUri implements iBenchmarkable
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
        $this->options = new chkStructUriOptions();
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
                if ( !( $propertyValue instanceof chkStructUriOptions ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a chkStructUriOptions instance, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['options'] = $propertyValue;
                break;
            case 'url':
                if ( !is_string( $propertyValue ) )
                {
                    throw new ezcBaseValueException($propertyName, $propertyValue, $propertyName . ' is not a string, __set() impossible in ' . __CLASS__  );
                }
                $this->properties['url'] = $propertyValue;
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
     * Set up the process
     *
     * @param chkStructUriOptions $uriOptions
     * @see iBenchmarkable::setUp()
     */
    public function setUp( $uriOptions = null )
    {
        $urlBuilder = new ezcUrl();
        if( isset( $uriOptions ) ) $this->options = $uriOptions;
        //mandatory:
        if( isset( $uriOptions ) )
        {
            if( isset( $uriOptions->host ) ) $urlBuilder->host = $uriOptions->host;
            if( isset( $uriOptions->path ) ) $urlBuilder->path = $uriOptions->path;
        }
        $urlBuilder->scheme = 'http';

        //optionnals:
        if( isset( $uriOptions->scheme ) )
        {
            $urlBuilder->scheme = $uriOptions->scheme;
        }
        if( isset( $uriOptions->basedir ) )
        {
            $urlBuilder->basedir = $uriOptions->basedir;
        }
        if( isset( $uriOptions->query ) )
        {
            $urlBuilder->query = $uriOptions->query;
        }
        $this->url = $urlBuilder->buildUrl( false );

    }

    /**
     * Run the process
     *
     * @return array $result
     */
    public function run()
    {
        if ( !isset( $this->url ) )
        {
            return array( 'result' => false );
        }
        if( isset( $this->options->validateUrl )  && $this->options->validateUrl )
        {
            // TODO : url checking to be improved and documented
            // see http://us4.php.net/manual/en/function.get-headers.php
            // http://us3.php.net/manual/en/function.get-meta-tags.php
            // http://us3.php.net/manual/en/function.header.php
            // http://www.php.net/manual/en/curl.examples.php
            // http://fr.php.net/manual/fr/function.fsockopen.php
            // http://www.commentcamarche.net/forum/affich-226610-php-comment-verifier-qu-une-url-est-valide
            // http://www.phpsources.org/scripts92-PHP.htm
            // http://fr.php.net/parse_url
            // cURL : http://www.developpez.net/forums/d400885/php/langage/fonctions/reseau-tester-validite-url/
            // remote_file_exist in file_exist doc
            /*
            * if (PHP_VERSION >= 5)
            {
            $headers = get_headers("$url[scheme]://$url[host]:$url[port]$path");
            }
            else
            {
            $fp = @fsockopen($url['host'], $url['port'], $errno, $errstr, 5);
            if (!$fp)
            *
            */
            // http://www.presence-pc.com/forum/ppc/Programmation/test-presence-fichier-distant-is_file-sujet-1000-1.htm

            // on error return false
        }
        return $this->checkUrl();
    }

    /**
     * Acceptables HTTP Status return codes
     *
     * @see http://fr.wikipedia.org/wiki/Liste_des_codes_HTTP
     */
    public static function acceptablesHttpCodes()
    {
        return array(
            '200' => 'OK',
        	'301' => 'Moved Permanently',
            '304' => 'Not Modified',
        );
    }

    /**
     * Check if a remote file exists
     *
     * @see http://www.php.net/manual/en/function.file-exists.php#85246
     * @param string $url
     * @param string $password, see http://www.php.net/manual/en/function.curl-setopt.php
     * @param array(string/string) $acceptablesHttpCodes, see http://fr.wikipedia.org/wiki/Liste_des_codes_HTTP
     * @param string $tmpDir
     * @param bool $fetchBodyContent
     * @return mixed $connectable : CURLOPT_RETURNTRANSFER option is set, it will return the result on success, FALSE on failure
     */
    protected function checkUrl($acceptablesHttpCodes = null, $tmpDir = '/tmp', $fetchBodyContent = true) {
        $result = array();
        if( !filter_var( $this->url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED )
        || !filter_var( $this->url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED )
        )
        {
            throw new ezcUrlException("Can't fetch " . $this->url);
        }
        $result['url'] = $this->url;
        $handle = curl_init($this->url);
        $tmpFile = $tmpDir . DIRECTORY_SEPARATOR . 'phpcurl_' . date( 'Y-M-d-H-i-s-u' ) . '.tmp';
        $result['tmpFile'] = $tmpFile;
        $fp = fopen($tmpFile, "w");
        curl_setopt( $handle, CURLOPT_TIMEOUT, '30');
        curl_setopt( $handle, CURLOPT_FAILONERROR, true );  // this works
        curl_setopt( $handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
        curl_setopt( $handle, CURLOPT_FOLLOWLOCATION, true ); // will accepts 301
        curl_setopt( $handle, CURLOPT_HEADER, true );
        curl_setopt( $handle, CURLINFO_HEADER_OUT, true );
        curl_setopt( $handle, CURLOPT_NOBODY, !$fetchBodyContent );
        curl_setopt( $handle, CURLOPT_VERBOSE, true );
        curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $handle, CURLOPT_FILE, $fp);

        if( isset( $this->options->password ) && trim( $this->options->password !== '') )
        {
            curl_setopt( $handle, CURLOPT_USERPWD, $this->options->password);
        }
        if( ! $acceptablesHttpCodes )
        {
            $acceptablesHttpCodes = chkBenchmarkUri::acceptablesHttpCodes();
        }
        $result['status'] = curl_exec( $handle );
        if( !$result['status'] )
        {
            throw new ezcUrlException("Can't fetch " . $this->url);
        }
        $result['headerSent'] = curl_getinfo( $handle, CURLINFO_HEADER_OUT );
        $result['result'] = false;
        if( in_array( $result['status'], $acceptablesHttpCodes ) )
        {
            $result['result'] = true;
        }
        $result['code'] = curl_getinfo( $handle, CURLINFO_HTTP_CODE );
        $result['lastUrl'] = curl_getinfo( $handle, CURLINFO_EFFECTIVE_URL );
        $result['contentType'] = curl_getinfo( $handle, CURLINFO_CONTENT_TYPE );
        $result['contentLength'] = curl_getinfo( $handle, CURLINFO_CONTENT_LENGTH_DOWNLOAD );
        $result['fileTime'] = curl_getinfo( $handle, CURLINFO_FILETIME );
        curl_close( $handle );
        fclose($fp);

        $result['content'] = file_get_contents($tmpFile);
        unlink($tmpFile);

        return $result;
    }
}
