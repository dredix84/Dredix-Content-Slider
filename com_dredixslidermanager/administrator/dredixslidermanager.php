<?php


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include dependancies
jimport('joomla.application.component.controller');
require_once (JPATH_COMPONENT.DS.'lib'.DS.'image.php');

$db = &JFactory::getDBO();
$db->setQuery("SELECT manifest_cache FROM #__extensions WHERE element='com_dredixslidermanager' LIMIT 1");
$version = json_decode($db->loadResult());
$version = $version->version;

define('DREDIXSLIDERMANAGERFOOTER', '<div style="text-align: center; margin: 10px 0;">Dredix Slider Manager (version '.$version.'), &copy; 2010-2012 Copyright by <a target="_blank" href="http://www.dredix.net">dredix.net</a>, All Rights Reserved.<br /><a target="_blank" href="http://www.dredix.net"><img src="'.JURI::base().'components/com_dredixslidermanager/assets/logo.png" alt="dredix.net" /></a></div>');

$controller	= JController::getInstance('dredixslidermanager');

// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
$controller->redirect();

?>