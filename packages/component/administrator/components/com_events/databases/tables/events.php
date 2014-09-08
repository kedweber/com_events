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
//				'com://site/documents.database.behavior.documentable',
				'lockable',
				'com://admin/moyo.database.behavior.creatable',
				'modifiable',
				'identifiable',
				'orderable',
				'com://admin/moyo.database.behavior.sluggable',
				'com://admin/cck.database.behavior.elementable',
				$relationable,
                'com://admin/translations.database.behavior.translatable',
//				'com://site/redis.database.behavior.cacheable',
			)
		));

		parent::_initialize($config);
	}
}