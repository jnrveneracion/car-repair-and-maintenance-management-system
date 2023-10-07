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
    $assigned_mechanic = $_POST['assigned_mechanic'];
    $comment = $_POST['comment'];

    // Insert the data into the service_cost table
    $insert_sql = "INSERT INTO service_cost (service_type, labor_cost, parts_cost, comment, request_id, mechanic_id) VALUES (?, ?, ?, ?, ?, ?)";
    
    //Palitan. Dapat dito ung sa dropdownlist ng mechanic or tanggalin na to????? nalito ako bigla sa foreign keys
    $mechanic_id = '17'; 

    // Prepare the SQL statement
    $stmt = mysqli_prepare($con, $insert_sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ssssii', $service_cost, $labor_cost, $parts_cost, $comment, $request_id, $mechanic_id);

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
