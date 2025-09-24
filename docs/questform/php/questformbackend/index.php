<?php
// header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT');
// header("Access-Control-Allow-Origin: http://blinc.q21.de");
// header("Access-Control-Allow-Origin: http://mahara_17_10.local");
// header("Access-Control-Allow-Origin: http://moodle.rebus.local");
// header("Access-Control-Allow-Origin: http://localhost:3000");
// header("Access-Control-Allow-Origin: http://wp_react_router.local");
// header("Access-Control-Allow-Origin: http://mahara.learningrebus.net");
// header("Access-Control-Allow-Origin: http://wp.questionnaire.local");
/*Load up wordpress externally*/
error_reporting(E_ALL);
require_once '../../config.php';
define('WP_USE_THEMES', false);
define('COOKIE_DOMAIN', false);
define('DISABLE_WP_CRON', true);

if (DATA_FROM_ANGULAR) {
    header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Credentials: true');
}

require_once '../../../../../wp-load.php';
require_once 'newxml.php';
require_once 'json_validate.php';
require_once 'xmlValidatorClass.php';
require_once 'xmlserializerClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['counter'])) {
    $counter = test_input($_POST['counter']);
    if ($counter === 'add') {
        if (isset($_POST['filename'])) {
            $filename = test_input($_POST['filename']);
        }
        handleDataFile($filename, 'add');
        exit;
    }
}

if (DEVELOPER_MODE || is_user_logged_in()) {
    $user = wp_get_current_user();
    // var_dump($user);
    // var_dump($user->caps['administrator']);
    if (DEVELOPER_MODE || $user->caps['administrator'] || $user->caps['editor']) {
        $filename = 'supergeneratetest2';
        $delete = false;
        $jsonstring = '';

        if (DEVELOPER_MODE || $_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['delete']) && $_POST['delete'] === 'true') {
                $delete = true;
            }

            if (isset($_POST['filename'])) {
                $filename = test_input($_POST['filename']);
            }

            if (isset($_POST['jsonstring'])) {
                // $jsonstring = $_POST['jsonstring'];
                $jsonstring = test_json($_POST['jsonstring']);
            }

            if (isset($_POST['counter'])) {
                $counter = test_input($_POST['counter']);
            }
        }

        
        // If we want to delete a file
        if ($delete) {
            $files = ['xmlfiles/' . $filename . '.xml', 'datafiles/' . $filename . '.xml'];
            $error = "";
            foreach ($files as $file) {
                if (file_exists($file)) {
                    if (!unlink($file)) {
                        $error .= "file $file not unlinkable";
                    }
                } else {
                    $error .= "file $file not exist";
                }
            }
            if ($error === '') {
                success('successfullyDeleted', $filename);
            } else {
                fail('ERROR' . $error);
            }
            exit;
        }
        $validator = new XmlValidator;

        // remove the // and @ from attributes
        // $jsonstring = str_replace('\\', '', $jsonstring);
        $jsonstring = str_replace('"@attributes"', '"attributes"', $jsonstring);

        $xml = json_to_xml($jsonstring); // dump $xml, or...
        $xmlString = $xml->asXML();
        $validated = $validator->validateFeeds($xmlString); // TODO: Edit xsd for maincolors
        if ($validated) {
            $error = "";
            $handle = fopen('xmlfiles/' . $filename . '.xml', 'w+');
            if (!fwrite($handle, $xml->asXML())) {
                $error .= "fehler beim schreiben $filename, ";
                // fail('fehler beim schreiben', $filename);
                $error .= "fehler beim schreiben $filename, ";
            }
            fclose($handle);

            // Now create the data file if it not exists
            if (!file_exists('datafiles/' . $filename . '.xml')) {

                if (!copy('xmlTemplates/data_template.xml', 'datafiles/' . $filename . '.xml')) {
                    $error .= "fehler beim kopieren $filename, ";
                    // fail('fehler beim kopieren', $filename);
                }
            }
            if ($error !== "") {
                fail('error', $error);
            }

        } else {
            fail('noValidXml', $filename);
            exit;
        }
        if (isset($counter)) {
            handleDataFile($filename, $counter);
            exit;
        }

    } else {
        fail('You are not an admin or editor!');
        // echo 'You are not an admin or editor!';
        exit;
    }

} else {
    // echo 'Please login';
    fail('Please login');
    exit;
}

/**
 * Convert JSON to XML
 * @param string    - json
 * @return string   - XML
 */
function json_to_xml($json) {
    include_once "XML/Serializer.php";

    $options = array(
        'addDecl' => TRUE,
        'encoding' => 'UTF-8',
        'indent' => '  ',
        'rootName' => 'questionnaire',
        'mode' => 'simplexml',
    );

    $serializer = new XML_Serializer_new($options);
    $obj = json_validate($json);
    // generate the array
    // $obj = json_decode($json);

    if ($serializer->serialize($obj)) {
        $xml = $serializer->getSerializedData();
        $xml = simplexml_load_string($xml);
        $attributes = $xml->xpath("//attributes"); // Get all attribute nodes
        foreach ($attributes as $attribute):
            $parent_el = $attribute->xpath("parent::*"); // Get the parent node of the attribute
            foreach ($attribute->children() as $key => $attribute_child) {
                $parent_el[0]->addAttribute($key, $attribute_child); // add the attribute to the parent
            }
            unset($parent_el[0]->attributes); // Delete the attribute element

        endforeach;

        // echo htmlspecialchars($xml->asXML());
        return $xml;

    } else {
        return null;
    }

}

function test_input($data) {
    if (strlen($data) > 100) {
        fail('Bitte nirgendwo mehr als 100 Zeichen eingeben!');
        // echo 'Bitte nirgendwo mehr als 100 Zeichen eingeben!';
        exit;
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_json($data) {
    // $data = trim($data);
    $data = rawurldecode($data);
    // $data = str_replace(array("+"), '%2B', $data);
    // $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    return $data;
}

function fail($message, $filename = '') {
    echo json_encode(array('status' => 'fail', 'message' => $message));
}

function success($message, $filename = '') {
    echo json_encode(array('status' => 'success', 'message' => $message, 'filename' => $filename));
}

function handleDataFile($filename, $mode) {
    $questionnaireData = simplexml_load_file('datafiles/' . $filename . '.xml');

    if ($questionnaireData) {
        $currentcount = $questionnaireData->resultWasViewed;

        if ($mode === 'change') {
            if (isset($_POST['counterValue'])) {
                $counterValue = test_input($_POST['counterValue']);
                $questionnaireData->resultWasViewed = $counterValue;
            } else {
                fail('No Counter value submitted', $filename);
                exit;
            }
            
        } else if ($mode === 'add') {
            $questionnaireData->resultWasViewed = ((int) $currentcount + 1);
        } else {
            fail('Please give correct paramters');
            exit;
        }

        $handle = fopen('datafiles/' . $filename . '.xml', 'w+');
        if (!$handle) {
            fail('Canot open file', $filename);
            exit;
        }
        if (!fwrite($handle, $questionnaireData->asXML())) {
            fail('fehler beim schreiben', $filename);
            exit;
        }
        fclose($handle);
        success('successfullySaved', $filename);
    } else {
        fail('no xml found for this file', $filename);
        exit;
    }
}
