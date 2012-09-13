<?php

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class DredixSliderManagerControllerItems extends JControllerAdmin
{
	public function getModel($name = 'Item', $prefix = 'DredixSliderManagerModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}