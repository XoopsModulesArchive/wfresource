<?php
/**
 * Name: class.captcha.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: class.captcha.php 0000 31/03/2009 07:50:29:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

require( XOOPS_ROOT_PATH . '/modules/wfresource/class/captcha/php-captcha.inc.php' );
/**
 * wfp_captcha
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2007
 * @version $Id$
 * @access public
 */
class wfp_captcha extends PhpCaptcha {
	var $_font;
	var $_errors;

	/**
	 * wfp_captcha::wfp_captach()
	 *
	 * @return
	 */
	function wfp_captach() {
		$this->_font = array( XOOPS_ROOT_PATH . '/modules/wfresource/class/media/VeraMoBd.ttf' );
	}

	/**
	 * wfp_captcha::loadFont()
	 *
	 * @param array $value
	 * @return
	 */
	function loadFont( $value = array() ) {
	}

	/**
	 * wfp_captcha::create()
	 *
	 * @return
	 */
	function create() {
		$oVisualCaptcha = new PhpCaptcha( $aFonts, 150, 40 );
		$oVisualCaptcha->SetFileType( 'png' );
		$oVisualCaptcha->UseColour( true );
		$oVisualCaptcha->Create( 'visual-captcha.php' );
	}

	function validate() {
	}
}

?>