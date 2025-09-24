<?php
namespace Pdfcreator;
function test_input($data) {
    // if (strlen($data) > 100) {
    //     fail('Bitte nirgendwo mehr als 100 Zeichen eingeben!');
    //     // echo 'Bitte nirgendwo mehr als 100 Zeichen eingeben!';
    //     exit;
    // }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_json($data) {
    // $data = trim($data);
    $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    return $data;
}

function fail($message) {
    echo json_encode(array('status' => 'fail', 'message' => $message));
}

function success($message, $filename = '') {
    echo json_encode(array('status' => 'success', 'message' => $message, 'filename' => $filename));
}