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

class ComEventsDatabaseBehaviorDateable extends KDatabaseBehaviorAbstract
{
	/**
	 * @param KCommandContext $context
	 */
	protected function _beforeTableInsert(KCommandContext $context)
	{
		$this->_saveDays();
	}

	protected function _beforeTableUpdate(KCommandContext $context)
	{
		$this->_saveDays();
	}

	protected function _saveDays()
	{
		//TODO: Delete old days.

		$ids = array();

		foreach($this->days as $day) {
			$row = $this->getService('com://admin/events.model.days')->id($day['id'])->getItem();
			$row->setData($day);
			$row->save();

			$ids[] = $row->taxonomy_taxonomy_id;
		}

		$this->setData(array(
			'days' => $ids,
		));
	}
}