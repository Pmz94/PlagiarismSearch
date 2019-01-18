<?php

/* @var $api Reports */
require_once '../init-api.php';

$id = $_POST['id'];

$params = [
	//'show_relations' => 1
];

echo $api->viewAction($id, $params);