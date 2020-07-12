<?php
/**
 * Name: validate_string.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: validate_string.php 0000 02/04/2009 22:21:06:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

/**
 * xo_Filters_Validate_String
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class xo_Filters_Validate_Float extends wfp_Request {
	/**
	 * xo_Filters_Validate_String::doRender()
	 *
	 * @param mixed $method
	 * @param mixed $key
	 * @param array $options
	 * @return
	 */
	function doRender( $float = null ) {
		$valid_float = filter_var( $float, FILTER_VALIDATE_FLOAT );
		if ( $valid_float !== false ) {
			return true;
		}
		return false;
	}
}

?>