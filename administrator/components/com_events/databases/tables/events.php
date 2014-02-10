<?php

class ComEventsDatabaseTableEvents extends KDatabaseTableDefault
{
	public function _initialize(KConfig $config) {
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'ancestors'     => array('event', 'attendees'),
				'descendants'     => array('events', 'venue', 'days', 'rooms', 'blocks'),
			)
		);

		$config->append(array(
			'behaviors' => array(
				'lockable',
				'com://admin/moyo.database.behavior.creatable',
				'modifiable',
				'identifiable',
				'orderable',
				'sluggable',
				'com://admin/cck.database.behavior.elementable',
				$relationable,
                'com://admin/translations.database.behavior.translatable',
			)
		));

		parent::_initialize($config);
	}
}