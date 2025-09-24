<?php
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
header('Content-Type: application/json');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT');
// header("Access-Control-Allow-Origin: http://blinc.q21.de");
// header("Access-Control-Allow-Origin: http://mahara_17_10.local");
// header("Access-Control-Allow-Origin: http://moodle.rebus.local");
// header("Access-Control-Allow-Origin: http://localhost:4200");
// header("Access-Control-Allow-Origin: http://localhost:3000");
// header("Access-Control-Allow-Origin: http://wp_react_router.local");
// header("Access-Control-Allow-Origin: http://mahara.learningrebus.net");
// header("Access-Control-Allow-Origin: http://wp.questionnaire.local");
// header("Access-Control-Allow-Origin: *");
error_reporting(0);

/*Load up wordpress externally*/
define('WP_USE_THEMES', false);
define('COOKIE_DOMAIN', false);
define('DISABLE_WP_CRON', true);
// require_once '../../../../wp-load.php';

// if (is_user_logged_in()) {
//     $user = wp_get_current_user();
//     // var_dump($user);
//     // var_dump($user->caps['administrator']);
//     if ($user->caps['administrator']) {
//         $fileContents = file_get_contents("../xml/radar.xml");
//         $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
//         $fileContents = trim(str_replace('"', "'", $fileContents));
//         $fileContents = trim($fileContents);
//         $simpleXml = simplexml_load_string($fileContents);
//         $json = json_encode($simpleXml);
//         echo $json;
//     } else {
//         exit;
//     }

// } else {
//     exit;
// }
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['folder'])) {
    $folder = $_POST['folder'];
} else {
    $folder = 'xmlfiles';
}
$fileContents = file_get_contents("./questformbackend/".$folder . "/". $name.".xml");
$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
$fileContents = trim(str_replace('"', "'", $fileContents));
$fileContents = trim($fileContents);
$simpleXml = simplexml_load_string($fileContents, null, LIBXML_NOCDATA);
$json = json_encode($simpleXml);
$json = str_replace(array("\":{}"), '":""', $json);
// $json = str_replace(array("%2B"), '+', $json);
// error_log('json decoded #######################');
// error_log($json);
echo $json;
