<?php
  require('Login_Submit.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../CSS/style.css">
     <link rel="stylesheet" href="../CSS/bg-style-a.css">
    <title>Login</title>
    <style>
        .login-section {
            height: fit-content;
            width: 400px;
            padding: 10px 30px;
            background-color: color(srgb 0.0472 0.1883 0.2773);
            color: white;
            margin: 100px 50px;
        }

        hr {
            color: white;
            opacity: 1;
        }

        .text-under-login {
            font-size: 13px;
            margin: 20px 0px;
        }

        .registration-input, .login-btn, .registration-input:active {
            background-color: color(srgb 0.9702 0.7395 0.3452) !important;
            border: none;
            color: white !important;
        }

        .login-btn:hover {
            background-color: color(srgb 0.9702 0.7395 0.3452);
            color: gray !important;
        }

        #login-message {
            font-size: 12px;
            text-align: center;
            color: red;
        }
        
    </style>
</head>
<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="d-flex justify-content-center">
        <div class="login-section">
            <div>
                <h6 class="text-center m-2">LOGIN</h6>
                <hr>
                <p id="login-message">
                    <?php if (isset($error_message)) {
                      echo $error_message;
                  } ?>
                </p>    
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="registration-input form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="registration-input form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary login-btn">Login</button>
                </form>
                <div class="text-under-login">
                    <p>Already have an account? <a href="Login.php" class="text-white link-style">Log in Here</a></p>
                </div>
            </div>
        </div>
    </div>


    <?php include "../common/footer-for-folder.php" ?>
    <script src="../js/input-only-number.js"></script>
</body>
</html>





