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
            ->insert('sort',        'cmd', 'created_on')
//            ->insert('direction',   'word', 'asc')
        ;
    }
}