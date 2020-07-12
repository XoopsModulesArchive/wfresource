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
class xo_Filters_Sanitize_Array extends wfp_Request {
	/**
	 * xo_Filters_Validate_String::render()
	 *
	 * @param mixed $value
	 * @return
	 */
	function doRender( $method, $key, $options = array() ) {
		$ret = ( isset( $method[$key] ) ) ? $method[$key]: '';
#		$options = $this->checkOption( $options );
#		filter_input_array(INPUT_POST, $args);
#
#		if ( is_int( $method ) ) {
#			$ret = filter_input_array( $method, $key, FILTER_SANITIZE_ENCODED, $options );
#		} else {
#			$method = ( is_array( $method ) ) ? $method[$key] : $method;
#			$ret = filter_var( $method, FILTER_SANITIZE_ENCODED, $options );
#		}
#		if ( $ret === false ) {
#			return false;
#		}
		return $ret;
	}

	/**
	 * xo_Filters_Validate_String::checkOption()
	 *
	 * @param mixed $options
	 * @return
	 */
	function checkOption( $options = array() ) {
		return $options = array( 'options' => $options );
	}
}

?>