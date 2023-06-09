<?php
$filePath = '../uploads/ProjectN.zip';
$fileName = 'ProjectN.zip';

if (file_exists($filePath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . filesize($filePath));
    header('Cache-Control: public');
    header('Pragma: public');
    header('Expires: 0');
    header('Content-Transfer-Encoding: binary');

    readfile($filePath);
    exit;
}
?>