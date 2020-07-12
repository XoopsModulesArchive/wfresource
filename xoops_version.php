<?php
/**
 * Name: xoops_version.php
 * Description:
 *
 * @package : Xoosla Modules
 * @Module :
 * @subpackage :
 * @since : v1.0.0
 * @author John Neill <catzwolf@xoosla.com>
 * @copyright : Copyright (C) 2009 Xoosla. All rights reserved.
 * @license : GNU/LGPL, see docs/license.php
 * @version : $Id: xoops_version.php 0000 01/04/2009 07:30:46:000 Catzwolf $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

$modversion['name'] = _MA_WF_RESOURCE;
$modversion['version'] = 1.05;
$modversion['description'] = _MA_WF_RESOURCE_DSC;
$modversion['author'] = 'Catzwolf';
$modversion['credits'] = 'Mark Boyden';
$modversion['releasedate'] = 'Thursday 13.5.2010';
$modversion['status'] = '1.05 Beta. First public beta release';

$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['dirname'] = 'wfresource';
$modversion['image'] = 'images/wfresource_logo.png';
// Admin things
$modversion['hasAdmin'] = 0;

$modversion['templates'][1]['file'] = 'wfp_addto.html';
$modversion['templates'][1]['description'] = 'Displays an AddTo bar';

?>