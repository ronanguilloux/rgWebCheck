<?php
/**
 * chkBenchmarkContent Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource content.php
 */

/**
 *  Uri checker Class.
 *
 * @package WebChecker
 * @version //autogen//
 */
class chkBenchmarkContent extends chkBenchmarkUri implements iBenchmarkable
{

    /**
     * .Ctor
     */
    public function __construct( )
    {
        parent::__construct();
    }

    /**
     * Set up the process
     *
     * @param chkStructUriOptions $uriOptions
     * @param chkStructContentOptions $contentOptions
     * @see iBenchmarkable::setUp()
     */
    public function setUp( $uriOptions = null, $contentOptions = null )
    {
        parent::setUp($uriOptions);
        if( isset( $contentOptions ) )
        {
            $this->options = $contentOptions;
        }
    }

    /**
     * Check a a remote resource's content
     *
     */
    protected function checkContent( $urlResult ) {

        $result = array();
        $result['result'] = true;
        if( isset( $this->options->notExpectedStrings ) )
        {
            $result['result'] = true;
            foreach( $this->options->notExpectedStrings as $i=>$notExpected )
            {
                $result['result'] = true;
                if ( strpos( $urlResult['content'], $notExpected ) !== false)
                {
                    $result['errors']['notExpectedStrings'][$i] = $notExpected . " unexpectidly found";
                    $result['result'] = false;
                }
            }
        }

        if( isset( $this->options->expectedStrings ) )
        {
            foreach( $this->options->expectedStrings as $i=>$expected )
            {
                $result['result'] = false;
                $result['errors']['expectedStrings'][$i] = $expected . " not found";
                if ( strpos( $urlResult['content'], $expected ) !== false)
                {
                    unset($result['errors']['expectedStrings'][$i]);
                    $result['result'] = true;
                }
            }
        }
        return $result;
    }

    /**
     * Run the process
     *
     * @return array $result
     */
    public function run()
    {
        $urlResult = parent::checkUrl();
        return $this->checkContent($urlResult);
    }
}
