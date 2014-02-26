<?php

class ComEventsDatabaseTableEvents extends KDatabaseTableDefault
{
	/**
	 * @param KConfig $config
	 */
	public function _initialize(KConfig $config)
	{
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
//				'ancestors'     => array('event', 'attendees', 'regions', 'days'),
//				'descendants'     => array('events', 'venue', 'rooms', 'blocks'),
				'ancestors'     => array(
					'days' => array(
						'identifier' => 'com://admin/events.model.days',
						'state' => array(
							'sort' => 'date',
							'direction' => 'asc'
						)
					),
					'regions' => array(
						'identifier' => 'com://admin/regions.model.regions'
					)
				)
			)
		);

		$config->append(array(
			'behaviors' => array(
				'dateable',
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