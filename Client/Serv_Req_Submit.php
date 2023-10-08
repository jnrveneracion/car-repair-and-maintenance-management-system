<?php
require('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $client_id = $_POST['client_id']; 
    $car_model = $_POST['car_model'];
    $car_brand = $_POST['car_brand'];
    $car_reg_num = $_POST['car_reg_num'];
    $service_type = $_POST['service_type'];
    $car_problem = $_POST['car_problem'];

    // You might want to add validation and sanitization here

    // Insert data into the service_request table
    // $query = "INSERT INTO service_request (car_model, car_brand, car_reg_num, service_type, car_problem, request_date, client_id, service_id, cost_id) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?)";
    $query = "INSERT INTO service_request (car_model, car_brand, car_reg_num, service_type, car_problem, request_date, client_id) VALUES (?, ?, ?, ?, ?, NOW(), ? )";


    $stmt = mysqli_prepare($con, $query);
    // mysqli_stmt_bind_param($stmt, 'ssssiiii', $car_model, $car_brand, $car_reg_num, $service_type, $car_problem, $client_id, $service_id, $cost_id);
    mysqli_stmt_bind_param($stmt, 'ssssii', $car_model, $car_brand, $car_reg_num, $service_type, $car_problem, $client_id);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        echo "Service request submitted successfully!"; //i-try iredirect sa form and refresh para di maduplicate
    } else {
        // Error occurred during insertion
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>
