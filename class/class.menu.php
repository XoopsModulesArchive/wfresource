<?php
// $Id: addonmenu.php,v 1.1 2007/03/16 02:39:10 catzwolf Exp $
// ------------------------------------------------------------------------ //
// Xoops - PHP Content Management System                      			//
// Copyright (c) 2007 Xoops                           				//
// //
// Authors: 																//
// John Neill ( AKA Catzwolf )                                     			//
// Raimondas Rimkevicius ( AKA Mekdrop )									//
// //
// URL: http:www.Xoops.com 												//
// Project: Xoops Project                                               //
// -------------------------------------------------------------------------//
defined( 'XOOPS_ROOT_PATH' ) or die( 'You do not have permission to access this file!' );

/**
 * wfp_MenuHandler
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2006
 * @version $Id: addonmenu.php,v 1.1 2007/03/16 02:39:10 catzwolf Exp $
 * @access public
 */
class wfp_MenuHandler {
	/**
	 *
	 * @var string
	 */
	var $_menutop = array();
	var $_menutabs = array();
	var $_menuicons = array();
	var $_obj;
	var $_header;
	var $_subheader;

	/**
	 *
	 * @var string
	 */
	// var $adminmenu;
	/**
	 * Constructor
	 */
	function wfp_MenuHandler() {
		$this->_obj = &$GLOBALS['xoopsModule'];
	}

	/**
	 * wfp_MenuHandler::addMenuTop()
	 *
	 * @param mixed $value
	 * @param string $name
	 * @return
	 */
	function addMenuTop( $value, $name = '' ) {
		if ( $name != '' ) {
			$this->_menutop[$value] = $name;
		} else {
			$this->_menutop[$value] = $value;
		}
	}

	/**
	 * wfp_MenuHandler::addMenuTopArray()
	 *
	 * @param mixed $options
	 * @param mixed $multi
	 * @return
	 */
	function addMenuTopArray( $options, $multi = true ) {
		if ( is_array( $options ) ) {
			if ( $multi == true ) {
				foreach ( $options as $k => $v ) {
					$this->addOptionTop( $k, $v );
				}
			} else {
				foreach ( $options as $k ) {
					$this->addOptiontop( $k, $k );
				}
			}
		}
	}

	/**
	 * wfp_MenuHandler::addMenuTabs()
	 *
	 * @param mixed $value
	 * @param string $name
	 * @return
	 */
	function addMenuTabs( $value, $name = '' ) {
		if ( $name != '' ) {
			$this->_menutabs[$value] = $name;
		} else {
			$this->_menutabs[$value] = $value;
		}
	}

	/**
	 * wfp_MenuHandler::addMenuTabsArray()
	 *
	 * @param mixed $options
	 * @param mixed $multi
	 * @return
	 */
	function addMenuTabsArray( $options, $multi = true ) {
		if ( is_array( $options ) ) {
			if ( $multi == true ) {
				foreach ( $options as $k => $v ) {
					$this->addMenuTabsTop( $k, $v );
				}
			} else {
				foreach ( $options as $k ) {
					$this->addMenuTabsTop( $k, $k );
				}
			}
		}
	}

	/**
	 * xo_Adminmenu::addMenuIcons()
	 *
	 * @param mixed $value
	 * @param string $name
	 * @return
	 */
	function addMenuIcons( $value, $name = '' ) {
		if ( $name != '' ) {
			$this->_menuicons[$value] = $name;
		} else {
			$this->_menuicons[$value] = $value;
		}
	}

	/**
	 * xo_Adminmenu::addMenuIconsArray()
	 *
	 * @param mixed $options
	 * @param mixed $multi
	 * @return
	 */
	function addMenuIconsArray( $options, $multi = true ) {
		if ( is_array( $options ) ) {
			if ( $multi == true ) {
				foreach ( $options as $k => $v ) {
					$this->addMenuicons( $k, $v );
				}
			} else {
				foreach ( $options as $k ) {
					$this->addMenuicons( $k, $k );
				}
			}
		}
	}

	/**
	 * wfp_MenuHandler::addHeader()
	 *
	 * @param mixed $value
	 * @return
	 */
	function addHeader( $value ) {
		$this->_header = $value;
	}

	/**
	 * wfp_MenuHandler::addSubHeader()
	 *
	 * @param mixed $value
	 * @return
	 */
	function addSubHeader( $value ) {
		$this->_subheader = $value;
	}

	/**
	 * xo_Adminmenu::addIcon()
	 *
	 * @param mixed $value
	 * @return
	 */
	function addIcon( $value = '' ) {
		$this->_icon = $value;
	}

	/**
	 * xo_Adminmenu::getIcon()
	 *
	 * @return
	 */
	function getIcon() {
		return $this->_icon . '_admin.png';
	}

	/**
	 * xo_Adminmenu::getNavMenuIcons()
	 *
	 * @return
	 */
	function getNavMenuIcons() {
		$menu = '';
		if ( !empty( $this->_menuicons ) ) {
			foreach ( $this->_menuicons as $k => $v ) {
				$menu .= '<a href="' . $v . '">' . wfp_showImage( 'cpanel_' . $k, $k, '', 'png' ) . '</a>';
			}
		}
		return $menu;
	}

	/**
	 * wfp_MenuHandler::render()
	 *
	 * @param integer $currentoption
	 * @param mixed $display
	 * @return
	 */
	function render( $currentoption = 1, $display = true ) {
		global $modversion;

		/**
		 * Menu Top Links
		 */
		$menuTopLinks = "<a class='nobutton' href='" . XOOPS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $GLOBALS['xoopsModule']->getVar( 'mid' ) . "'>" . _MA_WFP_ADMINPREFS . "</a>";
		foreach ( $this->_menutop as $k => $v ) {
			$menuTopLinks .= ' | <a href="' . htmlentities( $k ) . '"><span>' . $v . '</span></a>';
		}
		/**
		 * Menu Items
		 */
		foreach ( $this->_menutabs as $k => $menus ) {
			$menuItems[] = $menus;
		}
		$breadcrumb = $menuItems[$currentoption];
		$menuItems[$currentoption] = 'current';

		$i = 0;
		$menuBottomTabs = '';
		foreach ( $this->_menutabs as $k => $v ) {
			$menuBottomTabs .= '<li id="' . strtolower( str_replace( ' ', '_', $menuItems[$i] ) ) . '"><a href="' . htmlentities( $k ) . '"><span>' . $v . '</span></a></li>';
			$i++;
		}

		include_once XOOPS_ROOT_PATH . '/class/template.php';
		$tpl = new XoopsTpl();
		$tpl->assign( array( 'menu_links' => $menuTopLinks,
				'menu_tabs' => $menuBottomTabs,
				'menu_subheader' => $this->_subheader,
				'menu_header' => $this->_header,
				'menu_icons' => $this->getNavMenuIcons(),
				'menu_module' => $GLOBALS['xoopsModule']->getVar( 'name' )
				) );
		$tpl->display( XOOPS_ROOT_PATH . '/modules/wfresource/templates/wfp_adminmenu.html' );
		return true;
	}
}

?>