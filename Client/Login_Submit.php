<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the password from the database based on the email
    $stmt = mysqli_prepare($con, "SELECT client_id, fullname, password FROM client WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $client_id, $fullname, $stored_password);
    mysqli_stmt_fetch($stmt);

    if ($password === $stored_password) {
        // Passwords match, login successful
        $_SESSION['client_id'] = $client_id;
        $_SESSION['fullname'] = $fullname;
        header("Location: ../index.php"); // Redirect to client land page | index.php | Pag nasa labas ung file ../ 
        exit();
    } else {
        // Login failed
        $error_message = "Invalid email or password";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>
