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
class xo_Filters_Sanitize_Addslashes extends wfp_Request {
	/**
	 * xo_Filters_Validate_String::render()
	 *
	 * @param mixed $value
	 * @return
	 */
	function doRender( $method, $key ) {
		if ( !empty( $method ) && is_int( $method ) ) {
			$ret = filter_input( $method, $key, FILTER_SANITIZE_MAGIC_QUOTES );
		} else {
			$method = ( is_array( $method ) && isset( $method[$key] ) ) ? $method[$key] : $method;
			$ret = filter_var( $method, FILTER_SANITIZE_MAGIC_QUOTES );
		}
		if ( $ret === false ) {
			return false;
		}
		return $ret;
	}
}

?>