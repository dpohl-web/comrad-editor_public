<?php
require_once 'lib.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="result.pdf"');
    http_response_code(200);
    if (isset($_POST['pdfName'])) {
        $pdfName = Pdfcreator\test_input($_POST['pdfName']);
        $content = readfile("generated_pdfs/$pdfName");
        unlink("generated_pdfs/$pdfName");
        return $content;
    }
}

// Bad method
http_response_code(405);
exit();
