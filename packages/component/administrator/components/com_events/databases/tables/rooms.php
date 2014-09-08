<?php

class ComEventsDatabaseTableRooms extends KDatabaseTableDefault {
	public function _initialize(KConfig $config) {
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'ancestors'     => array(
                    'venue' => array(
                        'identifier' => 'com://admin/events.model.venues',
                    )
                ),
			)
		);

		$config->append(array(
			'behaviors' => array(
				'lockable',
				'creatable',
				'modifiable',
				'orderable',
				'sluggable',
//				$relationable,
				'com://admin/translations.database.behavior.translatable',
			)
		));

		parent::_initialize($config);
	}
}