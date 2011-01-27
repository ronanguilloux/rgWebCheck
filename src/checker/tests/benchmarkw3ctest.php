<?php
/**
 * chkBenchmarkDemoTest Class PHP File
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebCheckerTests
 * @filesource benchmarkw3ctest.php
 */

/**
 * Test class for chkBenchmarkW3C
 * Generated by PHPUnit on 2011-01-12 at 23:50:17.
 *
 * @package WebCheckerTests
 * @version //autogen//
 */
class chkBenchmarkW3CTest extends PHPUnit_Framework_TestCase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @group WebCheckerTests
     */
    protected function setUp()
    {
        $this->object = new chkBenchmarkW3C();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @group WebCheckerTests
     */
    public function testSet()
    {
        $this->object->options = array();
        $this->object->urls = array();
    }

    /**
     * @group WebCheckerTests
     */
    public function testGet()
    {
        $this->object->options = array();
        $foo = $this->object->options;
    }

    /**
     * @group WebCheckerTests
     */
    public function testToString()
    {
        $this->assertSame( (string)$this->object, 'chkBenchmarkW3C');
    }

    /**
     * @expectedException ezcBasePropertyNotFoundException
     * @group WebCheckerTests
     */
    public function testGetException()
    {
        $foo = $this->object->bar;
    }

    /**
     * @expectedException ezcBaseValueException
     * @group WebCheckerTests
     */
    public function testSetException_1()
    {
        $this->object->options = -1;
    }

    /**
     * @expectedException ezcBasePropertyNotFoundException
     * @group WebCheckerTests
     */
    public function testSetException_2()
    {
        $this->object->foo = 'bar';
    }

    /**
     * @expectedException ezcBaseValueException
     * @group WebCheckerTests
     */
    public function testSetException_3()
    {
        $this->object->urls = 'foo:bar';
    }

    /**
     * @expectedException ezcBaseValueException
     * @group WebCheckerTests
     */
    public function testSetException_4()
    {
        $this->object->stopOnError = 'foo:bar';
    }

    /**
     * @group WebCheckerTests
     */
    public function testIsset()
    {
        $options = array();
        $this->object->setUp( $options );
        $this->assertTrue( isset( $this->object->options ) );
    }

    /**
     * @group WebCheckerTests
     */
    public function testSetUp_1()
    {
        $options = array( 'urls' => array( 'http://foo.bar' ) );
        $this->object->setUp( $options );
        $this->assertSame( $this->object->urls, $options['urls'] );
    }

    /**
     * @group WebCheckerTests
     */
    public function testSetUp_2()
    {
        $options = array( 'stopOnError' => true );
        $this->object->setUp( $options );
        $this->assertSame( $this->object->stopOnError, $options['stopOnError'] );
    }

    /**
     * @group WebCheckerTests
     */
    public function testRun_1()
    {
//        $options = array( 'urls' => array( 'http://www.csszengarden.com' ) );
//        $this->object->setUp( $options );
//        $result = $this->object->run();
//        $this->assertTrue( $result );
    }

    /**
     * @group WebCheckerTests
     */
    public function testRun_2()
    {
        $options = array( 'urls'=> array( 'http://www.google.com' ) );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run( ) );
    }

    /**
     * @group WebCheckerTests
     */
    public function testRun_3()
    {
        $options = array(
        	'urls'=> array( 'http://www.google.com' ), 
        	'stopOnError' => true );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run( ) );
    }

    /**
     * @group WebCheckerTests
     */
    public function testRun_4()
    {
        $options = array(
        	'urls'=> array( 'http://www.google.com' ), 
        	'stopOnError' => false );
        $this->object->setUp( $options );
        $this->assertTrue( $this->object->run( ) );
    }


    /**
     * @expectedException chkMissingOptionsCheckException
     * @group WebCheckerTests
     */
    public function testRunException_1()
    {
        $options = array();
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run( ) );
    }

    /**
     * @expectedException chkMissingOptionsCheckException
     * @group WebCheckerTests
     */
    public function testRunException_2()
    {
        $options = array( 'foo' => array() );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run() );
    }


    /**
     * @expectedException chkMissingOptionsCheckException
     * @group WebCheckerTests
     */
    public function testRunException_3()
    {
        $options = array( 'urls' => array() );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run() );
    }

    /**
     * @expectedException chkFilterVarException
     * @group WebCheckerTests
     */
    public function testRunException_4()
    {
        $options = array( 'urls' => array( 'foo.bar') );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run() );
    }

    /**
    * @expectedException chkMissingOptionsCheckException
    * @group WebCheckerTests
    */
    public function testRunException_5()
    {
        $options = array( 'stopOnError' => false );
        $this->object->setUp( $options );
        $this->assertFalse( $this->object->run() );
    }


}
?>
