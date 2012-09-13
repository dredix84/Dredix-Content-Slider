<?php


// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

class DredixSliderManagerController extends JController
{
	protected $default_view = 'cpanel';
	
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/dredixslidermanager.php';
		DredixSliderManagerHelper::addSubmenu(JRequest::getCmd('view', 'cpanel'));
		parent::display();

		return $this;
	}
}