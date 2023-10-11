<?php
require('../connection.php'); //Lahat ng page is kailangan ng session?

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the email already exists in the database
    $email_check_query = "SELECT * FROM client WHERE email=?";
    $stmt_email_check = mysqli_prepare($con, $email_check_query);
    mysqli_stmt_bind_param($stmt_email_check, "s", $email);
    mysqli_stmt_execute($stmt_email_check);
    mysqli_stmt_store_result($stmt_email_check);

    if (mysqli_stmt_num_rows($stmt_email_check) > 0) {
        $_SESSION['registration_message'] = 'Email already exists. Please use a different email.';
    } else {
        // Create a prepared statement
        $stmt = mysqli_prepare($con, "INSERT INTO client (fullname, email, mobile_number, address, username, password) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $email, $mobile_number, $address, $username, $password); // No need to hash the password

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['registration_message'] = 'Registration successful!';
            $_SESSION['message_txt_color'] = 'color(srgb 0.1742 0.5859 0.85)';
            header('Location: Client_Register.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }

    // Close the email check statement
    mysqli_stmt_close($stmt_email_check);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/bg-style-a.css">
    <title>Register</title>

    <style>
        .register-section {
            height: fit-content;
            width: 400px;
            padding: 10px 30px;
            background-color: color(srgb 0.0472 0.1883 0.2773);
            color: white;
            margin: 50px;
        }

        hr {
            color: white;
            opacity: 1;
        }

        .text-under-register {
            font-size: 13px;
            margin: 20px 0px;
        }

        .registration-input,
        .register-btn,
        .registration-input:active {
            background-color: color(srgb 0.9702 0.7395 0.3452) !important;
            border: none;
            color: white !important;
        }

        .register-btn:hover {
            background-color: color(srgb 0.9702 0.7395 0.3452);
            color: gray !important;
        }

        #registration-message {
            font-size: 12px;
            text-align: center;
            color: color(srgb 0.1742 0.5859 0.85);
        }
    </style>
</head>

<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="d-flex justify-content-center">
        <div class="register-section">
            <div>
                <h6 class="text-center m-2">REGISTER</h6>
                <hr>
                <p id="registration-message"
                style="color: <?php echo isset($_SESSION['message_txt_color']) ? $_SESSION['message_txt_color'] : 'red'; ?> !important;">
                    <?php
                    if (isset($_SESSION['registration_message'])) {
                        echo $_SESSION['registration_message'];
                        unset($_SESSION['registration_message']); // Clear the message so it won't be displayed again
                    }
                    ?>
                </p>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name:</label>
                        <input type="text" class="registration-input form-control" id="fullname" name="fullname"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="registration-input form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="text" class="registration-input form-control input-number-only" id="mobile_number"
                            name="mobile_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="registration-input form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="registration-input form-control" id="username" name="username"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="registration-input form-control" id="password" name="password"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary register-btn">Register</button>
                </form>
                <div class="text-under-register">
                    <p>Already have an account? <a href="Login.php" class="text-white link-style">Log in Here</a></p>
                </div>
            </div>
        </div>
    </div>


    <?php include "../common/footer-for-folder.php" ?>
    <script src="../js/input-only-number.js"></script>
</body>

</html>