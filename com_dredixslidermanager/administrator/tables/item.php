<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

class DredixSliderManagerTableItem extends JTable
{
	public function __construct(&$db) {
		parent::__construct('#__dredixslidermanager', 'id', $db);
	}

	function bind($array, $ignore = '')
	{
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
		}
		
		if(empty($array['alias'])) {
			$array['alias'] = $array['title'];
		}
		$array['alias'] = JFilterOutput::stringURLSafe($array['alias']);
		if(trim(str_replace('-','',$array['alias'])) == '') {
			$array['alias'] = JFactory::getDate()->format("Y-m-d-H-i-s");
		}
		
		return parent::bind($array, $ignore);
	}
	
}
