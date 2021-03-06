<?php
/**
 * Name: class.objectmagic.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: class.objectmagic.php 0000 27/03/2009 00:22:05:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

wfp_loadLangauge( 'errors', 'wfresource' );

/**
 * xo_ObjectMagicHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class xo_ObjectMagicHandler extends xo_PersistableObjectHandler {
	var $handler;
	var $mhandler;

	var $obj_table;
	var $obj_class;
	var $obj_keyname;
	var $obj_idname; //identifierName
	var $obj_groups;
	var $obj_id;
	var $obj_url;
	/**
	 * xo_ObjectMagicHandler::__construct()
	 */
	function __construct() {
	}

	/**
	 * xo_ObjectMagicHandler::loadHandler()
	 *
	 * @return
	 */
	function loadHandler( &$handler, &$mhandler ) {
		if ( !is_object( $handler ) ) {
			trigger_error( 'Handler: ' . get_class( $handler ) . ' is not of the required type. Object expected but not given' );
			return false;
		}
		/**
		 */
		$this->handler = $handler;
		$this->mhandler = $mhandler;
	}
}

?>