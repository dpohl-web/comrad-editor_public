<?php
use mikehaertl\wkhtmlto\Pdf;
error_reporting(0);
require_once 'lib.php';
header('Content-type: text/html; charset=utf-8');
class PdfCreator {

    protected $needsHead = false;
    protected $needsWrapper = false;
    protected $htmlString = '';
    protected $pdfcss = '';

    function __construct($needsHead, $needsWrapper, $htmlString, $pdfcss) {
        $this->needsHead = $needsHead;
        $this->needsWrapper = $needsWrapper;
        $this->htmlString = $htmlString;
        $this->pdfcss = $pdfcss;
    }

    public function create_pdf() {

        require_once 'vendor/autoload.php';
        require_once 'html_heredocs.php';
        require_once 'head_heredocs.php';
        require_once 'lib.php';
        // You can pass a filename, a HTML string or an URL to the constructor
        if($this->needsHead) {
            $complete_html_string = <<<"EOF"
            <!DOCTYPE html>
            <html>
            $head_complete
            <body>
            $this->htmlString
            </body>
            </html>
EOF;
            $pdf = new Pdf($complete_html_string);
        } else {
            $pdf = new Pdf($this->htmlString);
        }
        
        if ($this->pdfcss !== '') {
            $pdf->setOptions(array(
                'orientation' => 'Landscape',
                'user-style-sheet'=> "css/$this->pdfcss.css"
            ));
        } else {
            $pdf->setOptions(array(
                'orientation' => 'Landscape'
            ));
        }
        
        // $pdf->setPageOptions(array('user-style-sheet'=>'wp-content/plugins/questform/pdf_create/css/custom.css'));

        $fileName = $this->create_filename();

        $fullFileName = "generated_pdfs/$fileName.pdf";

        if (!$pdf->saveAs($fullFileName)) {
            Pdfcreator\fail($pdf->getError());
        } else {
            Pdfcreator\success('PDF successfully created!', "$fileName.pdf");
        }

    }

    protected function create_filename() {
                // $date = new DateTime();
                $token = "";
                $characterArray = [
                    "0123456789",
                    "abcdefghijklmnopqrstuvwxyz",
                ];
                $i = 0;
        
                for ($i; $i < 10; $i++) {
                    $char = substr($characterArray[0], mt_rand(0, strlen($characterArray[0]) - 1), 1);
                    $token .= $char;
                }
                $i = 0;
                for ($i; $i < 15; $i++) {
                    $char = substr($characterArray[1], mt_rand(0, strlen($characterArray[1]) - 1), 1);
                    $token .= $char;
                }
                $shuffledToken = str_shuffle($token);
                $token = $this->milliseconds() . '_' . $shuffledToken;
                return $token;
        
    }

    protected function milliseconds() {
        $mt = explode(' ', microtime());
        return ((int) $mt[1]) * 1000 + ((int) round($mt[0] * 1000));
    }
}

$needsHead = false;
$needsWrapper = false;
$htmlString = '';
$pdfcss = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['needsHead'])) {
    $needsHead = Pdfcreator\test_input($_POST['needsHead']);
}

if (isset($_POST['needsWrapper'])) {
    $needsWrapper = Pdfcreator\test_input($_POST['needsWrapper']);
}

if (isset($_POST['htmlString'])) {
    $htmlString = Pdfcreator\test_json($_POST['htmlString']);
}

if (isset($_POST['pdfcss'])) {
    $pdfcss = Pdfcreator\test_input($_POST['pdfcss']);
}

$oPdf = new PdfCreator($needsHead, $needsWrapper, $htmlString, $pdfcss);

$oPdf->create_pdf();
} else {
    // Bad method
    http_response_code(405);
    exit();
}




