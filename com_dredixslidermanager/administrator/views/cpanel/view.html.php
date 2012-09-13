<?php 


defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport( 'joomla.application.categories');
jimport('joomla.html.pane');

class DredixSliderManagerViewCpanel extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title( JText::_('COM_DREDIXSLIDERMANAGER'));
		parent::display($tpl);
	}
}
