<?php

/* @var $api Reports */
require_once '../init-api.php';

$id = $_POST['id'];
$data = [];

echo $api->statusAction($id, $data);

//Estados de reporte en variable "status" del JSON
//{
//  "-11": "server error",
//  "-10": "error",
//  "-4": "processing storage", // in progress
//  "-3": "storage check", // in progress
//  "-2": "processing files", // in progress
//  "-1": "files check", // in progress
//  "0": "processing", // in progress
//  "1": "pre-checked", // in progress
//  "4": "post-checked", // in progress
//  "3": "sources", // in progress
//  "5": "snippets", // in progress
//  "6": "reserved", // in progress
//  "7": "reserved", // in progress
//  "8": "reserved", // in progress
//  "9": "reserved", // in progress
//  "2": "checked" // finish
//}