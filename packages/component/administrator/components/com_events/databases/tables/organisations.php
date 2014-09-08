<?php

class ComEventsDatabaseTableOrganisations extends KDatabaseTableDefault {
	public function _initialize(KConfig $config) {
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'descendants'     => array(
                    'attendees' => array(
                        'identifier' => 'com://admin/events.model.attendees',
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
				$relationable,
				'com://admin/translations.database.behavior.translatable',
				'com://admin/cck.database.behavior.elementable',
			)
		));

		parent::_initialize($config);
	}
}