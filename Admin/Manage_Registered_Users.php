<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_POST["edit_mode"]) && $_POST["edit_mode"] === "true") {
        // Editing an existing service offer
        $client_id = $_POST["client_id"];
        // $sql = "UPDATE services_offer SET service_name=?, description=?, type=? WHERE service_id=?";
        $sql = "UPDATE client SET fullname = ?, email = ?, mobile_number = ?, address = ?, username = ?, password = ? WHERE client_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        // mysqli_stmt_bind_param($stmt, "sssi", $service_name, $description, $service_type, $service_id);
        mysqli_stmt_bind_param($stmt, "ssssssi", $fullname, $email, $mobile_number, $address, $username, $password, $client_id);
    } else {
         // Adding a new client
         $sql = "INSERT INTO client (fullname, email, mobile_number, address, username, password ) VALUES (?, ?, ?, ? ,?, ?)";
         $stmt = mysqli_prepare($con, $sql);
         mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $email, $mobile_number, $address, $username, $password);
    }

    // Execute the prepared statement
   
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Client " . ($client_id ? "updated" : "added") . " successfully!";
        // Redirect to Mechanic.php
        header("Location: Registered_Users.php");
        exit(); // Make sure to exit to prevent further script execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>

