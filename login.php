<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="login-form" class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <form id="loginForm" action="log.php" method="POST">
                            <div class="form-group">
                                <label for="loginEmail">Email address</label>
                                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3">Don't have an account? <a href="#" onclick="showRegistrationForm()">Register here</a></p>
                    </div>
                </div>

                <div id="registration-form" class="card mt-5" style="display:none;">
                    <div class="card-body">
                        <h3 class="card-title text-center">Register</h3>
                        <form id="registrationForm" action="reg.php" method="POST">
                            <div class="form-group">
                                <label for="regEmail">Email address</label>
                                <input type="email" class="form-control" id="regEmail" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="regPassword">Password</label>
                                <input type="password" class="form-control" id="regPassword" name="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <p class="text-center mt-3">Already have an account? <a href="#" onclick="showLoginForm()">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
