<?php

defined('KOOWA') or die('Protected resource');

class ComEventsDatabaseRowEvent extends ComTaxonomyDatabaseRowDefault
{
	public function setData($data, $modified = true)
	{
		parent::setData($data, $modified);

		if($this->days && !$this->start_date && ! $this->end_date) {
			$first = reset($this->days);
			$end = end($this->days);

			$this->start_date = $first['date'];
			$this->end_date = $end['date'];
		}

		return $this;
	}
}