<?php
 session_start();

// Check if the user is logged in
if (isset($_SESSION['fullname'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header("Location: ../Client/Login.php"); // Replace 'login.php' with the actual login page URL
    exit();
} else {
    // If the user is not logged in, you can redirect them to the homepage or any other desired page
    header("Location: ../index.php"); // Replace 'index.php' with the desired page URL
    exit();
}
?>
