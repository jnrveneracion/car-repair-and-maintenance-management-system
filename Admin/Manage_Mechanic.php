<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $skill = $_POST["skill"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $mobile_number = $_POST["mobile_number"];

    if (isset($_POST["edit_mode"]) && $_POST["edit_mode"] === "true") {
        // Editing an existing service offer
        $mechanic_id = $_POST["mechanic_id"];
        // Update an existing mechanic
        $sql = "UPDATE mechanic SET fullname = ?, skill = ?, username = ?, email = ?, password = ?, address = ?, mobile_number = ? WHERE mechanic_id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $fullname, $skill, $username, $email, $password, $address, $mobile_number, $mechanic_id);
    } else {
        // Adding a new Mechanic
        $sql = "INSERT INTO mechanic (fullname, skill, username, email, password, address, mobile_number ) VALUES (?, ?, ?, ? ,?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $skill, $username, $email, $password, $address, $mobile_number);
    }

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Mechanic " . ($mechanic_id ? "updated" : "added") . " successfully!";
        // Redirect to Mechanic.php
        header("Location: Mechanic.php");
        exit(); // Make sure to exit to prevent further script execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>

