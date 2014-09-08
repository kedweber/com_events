<?php

class ComEventsDatabaseTableAttendees extends KDatabaseTableDefault {
	public function _initialize(KConfig $config) {
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'ancestors'     => array(
                    'organisations' => array(
                        'identifier' => 'com://admin/events.model.organisations',
                    )
                ),
				'descendants'   => array(
                    'events' => array(
                        'identifier' => 'com://admin/events.model.events',
                    )
                )
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