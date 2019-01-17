<?php

/* @var $api Reports */
require_once '../init-api.php';

$data = [
	'title' => $_POST['title'],
	'text' => $_POST['text']
];

echo $api->createAction($data);