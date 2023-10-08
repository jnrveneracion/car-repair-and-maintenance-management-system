<?php
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['request_id'])) {
    // Get the request_id from the URL
    $request_id = $_GET['request_id'];

    // Get the form data
    $service_cost = $_POST['service_cost'];
    $labor_cost = $_POST['labor_cost'];
    $parts_cost = $_POST['parts_cost'];
    $total_cost = $_POST['total_cost'];
    $comment = $_POST['comment'];
    $assigned_mechanic = $_POST['assigned_mechanic'];

    // Set the service_status_name_id to 1
    $service_status_id = 1;

    // Insert the data into the service_cost table
    $insert_sql = "INSERT INTO service_cost (service_cost, labor_cost, parts_cost, total_cost, comment, request_id, mechanic_id, service_status_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($con, $insert_sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ssisiiii', $service_cost, $labor_cost, $parts_cost, $total_cost, $comment, $request_id, $assigned_mechanic, $service_status_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Service cost data saved successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
