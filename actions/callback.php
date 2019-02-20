<?php
/**
 * Created by PhpStorm.
 * User: Pedro Muñoz
 * Date: 26/12/2018
 * Time: 02:40 PM
 */

$callback = json_decode($_POST['report']);

file_put_contents('C:\xampp\htdocs\proyectos\webhooks\respuestas\callback.json', json_encode($callback, JSON_PRETTY_PRINT));