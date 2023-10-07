<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $service_name = $_POST["service_name"];
    $description = $_POST["description"];
    $service_type = $_POST["service_type"];
    $status = $_POST["status"];

    if (isset($_POST["edit_mode"]) && $_POST["edit_mode"] === "true") {
        // Editing an existing service offer
        $service_id = $_POST["service_id"];
        // $sql = "UPDATE services_offer SET service_name=?, description=?, type=? WHERE service_id=?";
        $sql = "UPDATE services_offer SET status=?, description=?, type=? WHERE service_id=?";
        $stmt = mysqli_prepare($con, $sql);
        // mysqli_stmt_bind_param($stmt, "sssi", $service_name, $description, $service_type, $service_id);
        mysqli_stmt_bind_param($stmt, "sssi", $status, $description, $service_type, $service_id);
    } else {
        // Adding a new service offer
        // $sql = "INSERT INTO services_offer (service_name, description, type) VALUES (?, ?, ?)";
        $sql = "INSERT INTO services_offer (status, description, type) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        // mysqli_stmt_bind_param($stmt, "sss", $service_name, $description, $service_type);
        mysqli_stmt_bind_param($stmt, "sss", $status, $description, $service_type);
    }

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Service offer " . (isset($service_id) ? "updated" : "added") . " successfully!";
        // Redirect to Service_Offer.php
        header("Location: Service_Offer.php");
        exit(); // Make sure to exit to prevent further script execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
