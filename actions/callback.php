<?php
/**
 * Created by PhpStorm.
 * User: Pedro Muñoz
 * Date: 26/12/2018
 * Time: 02:40 PM
 */

$callback = $_POST;
$json = file_get_contents('php://input');

file_put_contents('C:/xampp/htdocs/Proyectos/Webhooks/respuestas/plagiarism.txt', $callback);
echo '<hr>';
file_put_contents('C:/xampp/htdocs/Proyectos/Webhooks/respuestas/plagiarismjson.txt', $json);