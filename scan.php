<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hash_found = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $scanned_hash = $_POST['scanned_hash'];

    // Check if the scanned hash matches any hash in the database
    $sql = "SELECT * FROM documents WHERE file_hash = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $scanned_hash);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $hash_found = true;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        #preview {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .result {
            margin-top: 20px;
        }
        .result .alert {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Scan QR Code</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <video id="preview"></video>
                        <form method="post" id="scanForm" class="mt-4">
                            <input type="hidden" name="scanned_hash" id="scanned_hash">
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                            <?php if ($hash_found): ?>
                                <div class="alert alert-success result">Document is authentic.</div>
                            <?php else: ?>
                                <div class="alert alert-danger result">Document is not authentic.</div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            $('#scanned_hash').val(content);
            $('#scanForm').submit();
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
</body>
</html>
