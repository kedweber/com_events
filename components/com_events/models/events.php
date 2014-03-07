<?php

class ComEventsModelEvents extends ComRedisModelDefault
{
	/**
	 * @param KConfig $config
	 */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('ctas_involvement'	,	'string')
			->insert('start_date'		,	'string')
			->insert('end_date'			,	'string')
			->insert('sort'				,	'cmd', 'id')
            ->insert('direction'		,   'word', 'desc')
		;
	}

	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		parent::_buildQueryWhere($query);

		if($state->search) {
			$query->where('tbl.title', 'LIKE', '%'. $state->search .'%');
		}

		if($state->ctas_involvement) {
			$query->join('INNER', '#__cck_values AS cck', 'cck.cck_fieldset_id = tbl.cck_fieldset_id AND cck.row = tbl.'.$this->getTable()->getIdentityColumn().' AND cck.table = LOWER(\'' . strtoupper($this->getTable()->getName()) . '\')');
			$query->where('cck.value', '=', $state->ctas_involvement);
			$query->where('cck.cck_element_id', '=', 34, 'AND');
		}

//		if($state->start_date) {
//			$query->join('INNER', '#__cck_values AS cck', 'cck.cck_fieldset_id = tbl.cck_fieldset_id AND cck.row = tbl.'.$this->getTable()->getIdentityColumn().' AND cck.table = LOWER(\'' . strtoupper($this->getTable()->getName()) . '\')');
//			$query->where('cck.value', '=', $state->start_date);
//			$query->where('cck.cck_element_id', '=', 30, 'AND');
//		}
	}

	/**
	 * Specialized to NOT use a count query since all the inner joins get confused over it
	 *
	 * @see KModelTable::getTotal()
	 */
	public function getTotal()
	{
		// Get the data if it doesn't already exist
		if (!isset($this->_total)) {
			if ($this->isConnected()) {
				$query = $this->getTable()->getDatabase()->getQuery();

				$this->_buildQueryColumns($query);
				$this->_buildQueryFrom($query);
				$this->_buildQueryJoins($query);
				$this->_buildQueryWhere($query);
				$this->_buildQueryGroup($query);
				$this->_buildQueryHaving($query);

				$total = count($this->getTable()->select($query, KDatabase::FETCH_FIELD_LIST));
				$this->_total = $total;
			}
		}

		return $this->_total;
	}
}