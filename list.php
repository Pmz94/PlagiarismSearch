<?php

/* @var $api Reports */
require_once 'init-api.php';

$data = [
	'page' => 1,
	'limit' => 20,
	'show_relations' => 0,
];

echo $api->indexAction($data);