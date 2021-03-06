<?php
/**
 * Name: class.dummy.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: class.dummy.php 0000 25/03/2009 14:44:34:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

wfp_getObjectHander();

/**
 * wfp_Dummy
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class wfp_Dummy extends wfp_Object {
	function wfp_Dummy() {
		$this->XoopsObject();
	}
}

/**
 * wfp_DummyHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class wfp_DummyHandler extends wfp_ObjectHandler {
	function wfp_DummyHandler( &$db ) {
		$this->wfp_ObjectHandler( $db, '', 'wfp_Dummy' );
	}
}

?>