<?php
/**
 * WebChecker config php file
 * Created on January, the 12th 2010 at 21:26:14 by ronan
 *
 * @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
 * @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3
 * @version //autogen//
 * @author Ronan Guilloux - coolforest.net
 * @package WebChecker
 * @filesource config.php
 */

// SPL autoloading for Zeta components
// see http://incubator.apache.org/zetacomponents/documentation/install.html
require_once 'src/zetacomponents/Base/base.php';
spl_autoload_register( array( 'ezcBase', 'autoload' ) );

// Zeta components autoloading for the all rest :
$options = new ezcBaseAutoloadOptions( array( 'debug' => true, 'preload' => false ) );
ezcBase::setOptions( $options );
//ezcBase::addClassRepository( dirname( __FILE__ ) . '/src/ezc', null, 'ezc' );
ezcBase::addClassRepository( dirname( __FILE__ ) . '/src/checker', null, 'checker' );
// here you can add your own libs using addClassRepository()

// App. settings
$reader = new ezcConfigurationIniReader();
$reader->init( dirname( __FILE__ ), 'settings' ); 
$ini = $reader->load();

?>