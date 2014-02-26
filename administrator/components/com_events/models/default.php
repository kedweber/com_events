<?php

class ComEventsModelDefault extends ComDefaultModelDefault
{
    /**
     * @param KConfig $config
     */
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('sort',					'cmd', 'created_on')
            ->insert('taxonomy_taxonomy_id',	'int')
        ;
    }

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		parent::_buildQueryWhere($query);

		if(is_array($state->taxonomy_taxonomy_id)) {
			$query->where('taxonomy_taxonomy_id', 'IN', $state->taxonomy_taxonomy_id);
		}
	}
}