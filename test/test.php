<?php
require_once dirname(__FILE__).'/../ZeninoLoader.php';
ZeninoLoader::register();


echo ZeninoIntervalToolkit::getInterval('F#', 2, 'G');