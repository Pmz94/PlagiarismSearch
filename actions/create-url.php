<?php

/* @var $api Reports */
require_once '../init-api.php';

$data = [
	'title' => $_POST['title'],
	'url' => $_POST['url'],
    //'url' => 'http://che.org.il/wp-content/uploads/2016/12/pdf-sample.pdf', // public url
];

echo $api->createAction($data);