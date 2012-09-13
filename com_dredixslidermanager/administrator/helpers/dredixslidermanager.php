<?php


defined('_JEXEC') or die;

abstract class DredixSliderManagerHelper
{
	
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_CPANEL'),
			'index.php?option=com_dredixslidermanager',
			$vName == 'cpanel'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_SLIDES'),
			'index.php?option=com_dredixslidermanager&view=items',
			$vName == 'items'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_dredixslidermanager',
			$vName == 'categories'
		);

		if ($vName=='categories') {
			JToolBarHelper::title(
				JText::sprintf('COM_DREDIXSLIDERMANAGER_CATEGORIES_TITLE',JText::_('com_dredixslidermanager')),
				'slider-categories');
		}
	}
	
}
?>