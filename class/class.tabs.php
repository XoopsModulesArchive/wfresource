<?php
/**
 * $Id$ Untitled 5.php v0.0 17/08/2007 03:24:56 John
 *
 * @Zarilia - 	PHP Content Management System
 * @copyright 2007 Zarilia
 * @Author : 	John (AKA Catzwolf)
 * @URL : 		http://zarilia.com
 * @Project :	Zarilia CMS
 */

class xoops_Tabs {
    /**
     *
     * @var int Use cookies
     */
    var $_useCookies = true;
    var $_echo = false;
    var $_contents;
    /**
     * Constructor
     * Includes files needed for displaying tabs and sets cookie options
     *
     * @param int $ useCookies, if set to 1 cookie will hold last used tab between page refreshes
     */
    function xoops_Tabs( $useCookies = true, $echo = false ) {
		$this->_useCookies = ( ( int )$useCookies ) == 1 ? 1 : 0;
        $this->_echo = ( ( int ) $echo == 1 ) ? true : false;
        //$GLOBALS['xoTheme']->addStylesheet( '/include/javascript/tabs/tabpane.css', array( 'id="luna-tab-style-sheet"' ) );
        //$GLOBALS['xoTheme']->addScript( '/include/javascript/tabs/tabpane.js' );
        //$this->contents[] = "<script type=\"text/javascript\" src=\"" . XOOPS_URL . "/include/javascript/tabs/tabpane.js\"></script>";
    }

    function setEcho( $value ) {
        $this->_echo = $value;
    }

    /**
     * creates a tab pane and creates JS obj
     *
     * @param string $ The Tab Pane Name
     */
    function startPane( $id ) {
		$output = "<div class=\"tab-pageouter\" id=\"" . $id . "\">
        	<script type=\"text/javascript\">\n
        	var tabPane1 = new WebFXTabPane( document.getElementById( \"" . $id . "\" ), " . $this->_useCookies . " )\n
        </script>\n";
        $this->contents[] = $output;
    }

    /**
     * Ends Tab Pane
     */
    function endPane() {
        $output = "</div>";
        $this->contents[] = $output;
    }

    /**
     * Creates a tab with title text and starts that tabs page
     *
     * @param tabText $ - This is what is displayed on the tab
     * @param paneid $ - This is the parent pane to build this tab on
     */
    function startTab( $tabText, $paneid ) {
        $output = "<div class=\"tab-page\" id=\"" . $paneid . "\">
        	<h2 class=\"tab\">" . $tabText . "</h2>
        	<script type=\"text/javascript\">\n
        	tabPane1.addTabPage( document.getElementById( \"" . $paneid . "\" ) );
    	  </script>";
        $this->contents[] = $output;
    }

    /**
     * Ends a tab page
     */
    function endTab() {
        $output = "</div>";
        $this->contents[] = $output;
    }

    function addContent( $value = null ) {
        $this->contents[] = $value;
    }

    function render() {
        $cont = '';
        foreach( $this->contents as $contents ) {
            $cont .= $contents;
        }
        if ( $this->_echo == false ) {
            return $cont;
        } else {
            echo $cont;
        }
    }
}

?>