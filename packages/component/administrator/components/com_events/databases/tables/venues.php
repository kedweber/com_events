<?php

class ComEventsDatabaseTableVenues extends KDatabaseTableDefault {
	public function _initialize(KConfig $config) {
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'ancestors'       => array('event'),
				'descendants'     => array('rooms')
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