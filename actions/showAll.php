<?php

/* @var $api Reports */
require_once '../init-api.php';

$data = [
	//'page' => 1,
	'limit' => 50,
	//'show_relations' => 1,
];

echo $api->show(null, $data);