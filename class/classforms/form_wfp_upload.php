<?php
/**
 * Name: form_wfp_upload.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: form_wfp_upload.php 0000 25/03/2009 14:43:42:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

include_once _WFP_RESOURCE_PATH. '/class/xooslaforms/xoosla_formselectimage.php';

$safemode = ( ini_get( 'safe_mode' ) ) ? _MA_WFP_ON . _MA_WFP_SAFEMODEPROBLEMS: _MA_WFP_OFF;
$downloads = ( ini_get( 'enable_dl' ) ) ? _MA_WFP_ON : _MA_WFP_OFF;

$rootpath = wfp_Request::doRequest( $_REQUEST, 'rootpath', 1, 'int' );
$channelfile = wfp_Request::doRequest( $_REQUEST, 'channelfile', '', 'textbox' );

$dirarray = array( 1 => $GLOBALS['xoopsModuleConfig']['uploaddir'], 2 => $GLOBALS['xoopsModuleConfig']['linkimages'], 3 => $GLOBALS['xoopsModuleConfig']['htmluploaddir'] );
$namearray = array( 1 => _MA_WFP_CHAN_UPLOADDIR , 2 => _MA_WFP_CHAN_LINKIMAGES, 3 => _MA_WFP_CHAN_HTMLUPLOADDIR );
$listarray = array( 1 => _MA_WFP_UPLOADCHANLOGO , 2 => _MA_WFP_UPLOADLINKIMAGE, 3 => _MA_WFP_UPLOADCHANHTML );
$displayimage = '';

echo '<div>
	<span style="font-weight: bold;">' . _MA_WFP_SAFEMODE . '</span>
	<span style="margin-left: 50px;">' . $safemode . '</span></div>
	<div><span style="font-weight: bold;">' . _MA_WFP_UPLOADS . '</span>
	<span style="margin-left: 18px;">' . $downloads . '</span>
	</div>';
if ( ini_get( 'enable_dl' ) ) {
	echo '<div><span style="font-weight: bold;">' . _MA_WFP_ANDTHEMAX . '</span><span style="margin-left: 11px;">' . ini_get( 'upload_max_filesize' ) . '</span></div>';
}
echo '<div style="padding: 0px 0px 12px 0px;"><span style="font-weight: bold;">' . _MA_WFP_UPLOADPATH . '</span> <span style="margin-left: 40px;">' . XOOPS_URL . '/' . $dirarray[$rootpath] . '</span></div>';
// if ( $rootpath ) {
// echo '<b>' . _MA_WFP_ANDTHEMAX . '</b> ' . ini_get( 'upload_max_filesize' ) . '<br />';
// }
$form = new XoopsThemeForm( _MA_WFP_UPLOADIMAGE . $listarray[$rootpath], 'op', 'upload.php' );
$form->setExtra( 'enctype="multipart/form-data"' );
$upload_select = new XoopsFormSelect( _MA_WFP_DIRSELECT, 'rootpath', $rootpath );
$upload_select->addOptionArray( $namearray );
$upload_select->setExtra( "onchange='location.href=\"upload.php?rootpath=\"+this.options[this.selectedIndex].value'" );
$form->addElement( $upload_select );
if ( $rootpath > 0 ) {
	if ( !isset( $channelfile ) ) {
		$channelfile = 'blank.png';
	}
	$graph_array = &XoopsLists::getImgListAsArray( XOOPS_ROOT_PATH . '/' . $dirarray[$rootpath] );
	if ( $rootpath != 3 ) {
		$smallimage_select = new XoopsFormSelectImage( _MA_WFP_VIEWIMAGE, 'channelfile', $channelfile, 'imagefile', 0, $size = 5 );
		$smallimage_select->setCategory( $dirarray[$rootpath] );
		$form->addElement( $smallimage_select, false );
	} else {
		$html_array = &XoopsLists::getHtmlListAsArray( XOOPS_ROOT_PATH . '/' . $dirarray[$rootpath] );
		$htmlfile_select = new XoopsFormSelect( _MA_WFP_CHANHTML, 'channelfile', '' );
		$htmlfile_select->setDescription( _MA_WFP_FILE_DSC );
		$htmlfile_select->addOption( '', '------------------------' );
		$htmlfile_select->addOptionArray( $html_array );
		$form->addElement( $htmlfile_select );
	}
	$form->addElement( new XoopsFormFile( _MA_WFP_UPLOADLINKIMAGE, 'uploadfile', $GLOBALS['xoopsModuleConfig']['maxfilesize'] ) );
	/**
	 * Buttons
	 */
	$form->addElement( new XoopsFormHiddenToken() );
	$form->addElement( new xoopsFormHidden( 'op', 'upload' ) );
	$form->addElement( new xoopsFormHidden( 'uploadpath', $dirarray[$rootpath] ) );
	$form->addElement( new xoopsFormHidden( 'rootnumber', $rootpath ) );
	$form->addElement( new XoopsFormButtontray( 'submit', _SUBMIT, '', '', true ) );
}
$form->display();

?>