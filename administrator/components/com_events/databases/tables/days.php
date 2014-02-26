<?php

class ComEventsDatabaseTableDays extends KDatabaseTableDefault
{
	public function _initialize(KConfig $config)
	{
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
//				'ancestors'     => array('event'),
//				'descendants'     => array('blocks'),
			)
		);

		$config->append(array(
			'behaviors' => array(
				'lockable',
				'creatable',
				'modifiable',
				'identifiable',
				'orderable',
				'sluggable',
				'com://admin/cck.database.behavior.elementable',
				$relationable
			)
		));

		parent::_initialize($config);
	}
}