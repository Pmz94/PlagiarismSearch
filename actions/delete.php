<?php

/* @var $api Reports */
require_once '../init-api.php';

$id = $_POST['id'];
$data = [];

echo $api->delete($id, $data);
