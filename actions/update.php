<?php

/* @var $api Reports */
require_once '../init-api.php';

$id = $_POST['id'];

$updateReportFields = [
	'title' => $_POST['title'],
	'text' => $_POST['text'],
	'notified' => time(),
	'modified' => time()
];

$data = ['report' => $updateReportFields];

echo $api->update($id, $data);