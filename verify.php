<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .menu-container {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .menu-container h1 {
            margin-bottom: 30px;
            font-size: 36px;
            color: #343a40;
        }
        .btn-custom {
            width: 250px;
            margin: 15px;
            padding: 15px;
            font-size: 18px;
        }
        .btn-custom i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Document Management</h1>
        <button class="btn btn-primary btn-custom" onclick="scanQRCode()">
            <i class="fas fa-qrcode"></i> Scan QR
        </button>
    </div>

    <script>
        function scanQRCode() {
            // Redirect to scan QR page
            window.location.href = "scan.php";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
