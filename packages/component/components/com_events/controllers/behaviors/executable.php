<?php
/**
 * Com
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Socialhub
 * @subpackage  ...
 * @uses        Com_
 */
 
defined('KOOWA') or die('Protected resource');

class ComEventsControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
	public function canBrowse()
	{
		$result = false;

		if(parent::canBrowse())
		{
			if(version_compare(JVERSION,'1.6.0','ge')) {
				$result = JFactory::getUser()->authorise('core.create') === true;
			} else {
				$result = JFactory::getUser()->get('gid') > 18;
			}
		}

		return $result;
	}

	protected function _checkToken()
	{
		return true;
	}
}