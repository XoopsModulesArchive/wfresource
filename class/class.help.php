<?php
/**
 * Name: class.help.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: class.help.php 0000 25/03/2009 21:18:26:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

/**
 * wpf_Help
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id$
 * @access public
 */
class wpf_Help {
	var $path;
	var $filename;
	/**
	 * wpf_Help::wpf_Help()
	 *
	 * @param string $aboutTitle
	 */
	function wpf_Help() {
	}

	/**
	 * XoopsAbout::display()
	 *
	 * @return
	 */
	function display() {
		$ts = &MyTextSanitizer::getInstance();

		$contents = '';
		$this->_path = XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar( 'dirname' ) . '/docs/';
		$this->_filename = 'help.txt';
		/**
		 */
		$contents = '';
		if ( file_exists( $file = $this->_path . $this->_filename ) ) {
			$contents = file_get_contents( $file );
		}
		echo $ts->displayTarea( $contents );
	}
}

?>