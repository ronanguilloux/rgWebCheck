<?php
/**
 * chkStructContentOptions Class php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource structcontentoptions.php
 */

/**
 *  chkStructContentOptions class.
 *
 * @see http://qafoo.com/blog/016_struct_classes_in_php.html
 * @package WebChecker
 * @version //autogen//
 */
class chkStructContentOptions extends ezcBaseStruct implements iStructurable
{

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
     * @param array $expectedStrings
     * @param array $notExpectedStrings
     */
    public function __construct(
        $expectedStrings = null,
        $notExpectedStrings = null
    )
    {
        if( isset( $expectedStrings ) ) $this->expectedStrings = $expectedStrings;
        if( isset( $notExpectedStrings ) ) $this->notExpectedStrings = $notExpectedStrings;
    }

}
