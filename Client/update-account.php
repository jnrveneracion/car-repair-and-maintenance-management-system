<?php
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $client_id = $_POST['client_id'];
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $username = mysqli_real_escape_string($con, $_POST['username']);

    // Update the user's information in the database
    $sql = "UPDATE client SET fullname='$fullname', email='$email', mobile_number='$mobile_number', address='$address', username='$username' WHERE client_id=$client_id";

    if (mysqli_query($con, $sql)) {
        // Redirect back to the account page after successful update
        header('Location: my-account.php');
        exit();
    } else {
        // Handle database update error
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Handle invalid request method (e.g., accessing the script directly)
    echo "Invalid request method.";
}
?>
