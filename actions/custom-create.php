<?php

/* @var $api Reports */
require_once '../init-api.php';

$data = [
	'title' => $_POST['title'],
	'observations' => $_POST['text']
];

$files = [
	'file' => $_FILES['file-0'],
];
//$files = [
//	'file' => realpath('pdf-sample.pdf'),
//];

echo $api->createAction($data, $files);
