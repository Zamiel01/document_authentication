<?php
// Including FPDF and FPDI
require_once 'lib/fpdf/fpdf.php';
require_once 'lib/fpdi/src/autoload.php';
// Including PHP QR Code Library
require_once 'lib/phpqrcode/qrlib.php';

use setasign\Fpdi\Fpdi;

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allowed file types
$allowedTypes = ['pdf'];
if (!in_array($fileType, $allowedTypes)) {
    die("Sorry, only PDF files are allowed.");
}

// Move uploaded file to target directory
if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    die("Sorry, there was an error uploading your file.");
}

// Generate hash of the document
$hash = hash_file('sha256', $target_file);

// Generate QR code for the hash
$qrFilePath = $target_dir . 'qrcode_' . basename($_FILES["file"]["name"], ".$fileType") . '.png';
QRcode::png($hash, $qrFilePath, QR_ECLEVEL_L, 10); // Adjust size and error correction level as needed

// Embed QR code in the PDF document
$originalPdf = $target_file;
$updatedPdf = $target_dir . 'updated_' . basename($target_file);

$pdf = new FPDI();
$pageCount = $pdf->setSourceFile($originalPdf);
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);
    $pdf->AddPage();
    $pdf->useTemplate($tplIdx);

    // Get the width and height of the page
    $pageWidth = $pdf->GetPageWidth();
    $pageHeight = $pdf->GetPageHeight();

    // Place the QR code in the bottom-right corner
    $qrSize = 30; // Size of the QR code
    $pdf->Image($qrFilePath, $pageWidth - $qrSize - 10, $pageHeight - $qrSize - 10, $qrSize, $qrSize);
}

$pdf->Output($updatedPdf, 'F');

// Store hash in the database
$sql = "INSERT INTO documents (file_name, file_hash) VALUES ('" . basename($target_file) . "', '$hash')";
if ($conn->query($sql) === TRUE) {
    echo "The file has been uploaded and processed successfully.";
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

// Close the database connection
$conn->close();

// Redirect to table.php
header('Location: table.php');
exit;
?>
