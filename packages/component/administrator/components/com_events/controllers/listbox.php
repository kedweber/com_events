<?php

class ComEventsControllerListbox extends ComDefaultControllerResource {
	public function getRequest() {
		$this->_request->layout = 'default';

		return parent::getRequest();
	}
}