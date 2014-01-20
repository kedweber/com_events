<?php

class ComEventsDispatcher extends ComDefaultDispatcher {
	public function _initialize(KConfig $config) {
		$config->append(array(
			'controller' => 'venues'
		));

		parent::_initialize($config);
	}
}