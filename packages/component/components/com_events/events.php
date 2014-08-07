<?php

KService::get('com://site/events.aliases')->setAliases();

echo KService::get('com://site/events.dispatcher')->dispatch();