<?php
/**
 * WebChecker tests bootstrap php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebCheckerTests
 * @filesource config.php
 */

$currentErrorLevel = error_reporting();

if ( ! ( $currentErrorLevel == -1 || $currentErrorLevel == ( E_ALL | E_STRICT ) ) )
{
    echo "Your error reporting setting is not E_ALL | E_STRICT, please change\nthis in your php.ini.\n";
    die();
}

require_once 'config.php';

?>
