<?php
/**
 * chkStructUriOptions Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource structurioptions.php
 */

/**
 *  chkStructUriOptions class.
 *
 * @see http://qafoo.com/blog/016_struct_classes_in_php.html
 * @package WebChecker
 * @version //autogen//
 */
class chkStructUriOptions extends ezcBaseStruct implements iStructurable
{

    /**
     * Protocol scheme : http, https, ftp, etc. or null
     *
     * @var string
     */
    public $scheme;

    /**
     * Hostname or null
     *
     * @var string
     */
    public $host;

    /**
     * Base directory (the part before the script name) or null
     *
     * @var string
     */
    public $basedir;

    /**
     * Complete path as an array
     *
     * @var array
     */
    public $path;

    /**
     * Script
     *
     * @var string
     */
    public $script;

    /**
     * Complete query string as an associative array
     *
     * @var array(string=>mixed)
     */
    public $query;

    /**
     * Must url be validated before being used ?
     *
     * @var bool
     */
    public $validateUrl;

    /**
     * See curl's CURLOPT_USERPWD option
     *
     * @var string 'foo:bar' formatted
     */
    public $password;

    /**
     * Expected strings in content output rendering
     *
     * @var array
     */
    public $expectedStrings;

    /**
     * NOT expected strings in content output rendering
     *
     * @var array
     */
    public $notExpectedStrings;  

    /**
     * Constructor
     *
     * @param string $scheme
     * @param string $host
     * @param string $basedir
     * @param string $path
     * @param string $script
     * @param string $query
     * @param bool $validateUrl
     * @param string $password
     */
    public function __construct(
    $scheme = 'http',
    $host = null,
    $basedir = null,
    $path = null,
    $script = null,
    $query = null,
    $validateUrl = null,
    $password = null
    )
    {
        if( isset( $scheme ) ) $this->scheme = $scheme;
        if( isset( $host ) ) $this->host = $host;
        if( isset( $basedir ) ) $this->basedir = $basedir;
        if( isset( $path ) ) $this->path = $path;
        if( isset( $script ) ) $this->script = $script;
        if( isset( $query ) ) $this->query = $query;
        if( isset( $validateUrl ) ) $this->validateUrl = $validateUrl;
         
        if( isset( $password ) && trim( $password ) !== '' )
        {
            $this->password = $password;
        }

        if( isset( $url ) ) $this->url = $url;
    }

}
