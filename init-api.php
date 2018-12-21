<?php

require_once 'Reports.php';

$config = [
	'apiUrl' => 'https://plagiarismsearch.com/api/v3',
	'apiUser' => 'pedrito_lindo_alokado@hotmail.com',
	'apiKey' => '1dry51f48ve5gejlausd7ew-29365771',
];

$api = new Reports($config);

header('Content-type: application/json; charset=UTF-8');