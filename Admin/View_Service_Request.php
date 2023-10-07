<?php
include('../connection.php');

// Check if the request_id parameter is set in the URL
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // SQL query to fetch data for the specific request ID
    $sql = "SELECT * FROM service_request WHERE request_id = $request_id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if there is a row with the specified request ID
    if (mysqli_num_rows($result) > 0) {
        echo '<h2>View Service Request</h2>';
        echo '<h3>Service Request Data</h3>';

        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Field Name</th>';
        echo '<th scope="col">Data</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Fetch and display the data for the specific request ID
        $row = mysqli_fetch_assoc($result);
        echo '<tr>';
        echo '<th scope="row">Request ID</th>';
        echo '<td>' . $row['request_id'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Car Model</th>';
        echo '<td>' . $row['car_model'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Car Brand</th>';
        echo '<td>' . $row['car_brand'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Car Registered Number</th>';
        echo '<td>' . $row['car_reg_num'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Service Type</th>';
        echo '<td>' . $row['service_type'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Car Problem</th>';
        echo '<td>' . $row['car_problem'] . '</td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';

        echo '<a href="Approve_Service_Request.php?request_id=' . $row['request_id'] . '" class="btn btn-primary">Approve</a>';
    } else {
        echo "No records found for the specified request ID.";
    }

    mysqli_free_result($result);
} else {
    echo "Request ID not specified.";
}

mysqli_close($con);
?>