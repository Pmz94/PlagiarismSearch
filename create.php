<?php

/* @var $api Reports */
require_once 'init-api.php';

$data = [
	'title' => $_POST['title'],
	'text' => $_POST['text'],
	'language' => strtolower($_POST['language'])
];

echo $api->createAction($data);