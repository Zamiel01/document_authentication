<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Authentication System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1.5rem;
            padding: 15px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-size: 1.5rem;
            padding: 15px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            font-size: 1.5rem;
            padding: 15px;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .fa-file-alt, .fa-check-circle, .fa-eye {
            margin-right: 10px;
        }
        h1 {
            font-size: 3rem;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Document Authentication System</h1>
                <div class="card mt-5">
                    <div class="card-body">
                        <button class="btn btn-primary btn-block mb-3" onclick="handleSecureDocument()">
                            <i class="fas fa-file-alt"></i> Secure Document
                        </button>
                        <button class="btn btn-secondary btn-block mb-3" onclick="handleVerifyDocument()">
                            <i class="fas fa-check-circle"></i> Verify Document
                        </button>
                        <button class="btn btn-info btn-block" onclick="handleViewDocuments()">
                            <i class="fas fa-eye"></i> View Documents
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleSecureDocument() {
            window.location.href = "upload.php";
        }

        function handleVerifyDocument() {
            window.location.href = "verify.php";
        }

        function handleViewDocuments() {
            window.location.href = "table.php";
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
