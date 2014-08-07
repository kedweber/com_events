<?php

class ComEventsDispatcher extends ComDefaultDispatcher
{
    /**
     * @param KConfig $config
     */
    public function _initialize(KConfig $config)
    {
		$config->append(array(
			'controller' => 'events'
		));

		parent::_initialize($config);
	}
}