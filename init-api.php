<?php

require_once 'Reports.php';

$config = [
	'apiUrl' => 'https://plagiarismsearch.com/api/v3',
	'apiUser' => 'programacion@csweb.com.mx',
	'apiKey' => 'nez4ot0vgkl0bhstb02f90n-32978001',
];

$api = new Reports($config);

header('Content-type: application/json; charset=UTF-8');