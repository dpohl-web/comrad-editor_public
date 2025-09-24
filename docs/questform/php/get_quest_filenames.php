<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');
// header("Access-Control-Allow-Origin: http://localhost:4200");
// header("Access-Control-Allow-Origin: http://wp.questionnaire.local");
// header("Access-Control-Allow-Origin: *");

$path    = './questformbackend/xmlfiles';
$files = array_diff(scandir($path), array('.', '..'));
$out = array_values($files);
$json = json_encode($out);
echo $json;
