<!-- This page adds the service cost  Services Cost (Add service charge, extra part fees)  Gumawa ng form na ilalagay ang Services Cost   -->
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
        echo '<h2>View Pending Request</h2>';
        echo '<h3>Pending Request Data</h3>';

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

        //The Service Cost Form is here
        echo '<form method="POST" action="Pending_Service_Submit.php?request_id=' . $request_id . '">';
        echo '<div class="mb-3">';
        echo '<label for="service_cost" class="form-label">Service Cost</label>';
        echo '<input type="text" class="form-control" id="service_cost" name="service_cost" required>';
        echo '</div>';

        echo '<div class="mb-3">';
            echo '<label for="labor_cost" class="form-label">Labor Cost</label>';
            echo '<input type="text" class="form-control" id="labor_cost" name="labor_cost" required>';
        echo '</div>';

        echo '<div class="mb-3">';
            echo '<label for="parts_cost" class="form-label">Parts Cost</label>';
            echo '<input type="text" class="form-control" id="parts_cost" name="parts_cost" required>';
        echo '</div>';

        echo '<div class="mb-3">';
            echo '<label for="total_cost" class="form-label">Total Cost</label>';
            echo '<input type="text" class="form-control" id="total_cost" name="total_cost" required>';
        echo '</div>';

        echo '<div class="mb-3">';
            echo '<label for="assigned_mechanic" class="form-label">Assigned Mechanic</label>';
            echo '<input type="text" class="form-control" id="assigned_mechanic" name="assigned_mechanic" required>';
        echo '</div>';

        echo '<div class="mb-3">';
            echo '<label for="comment" class="form-label">Comment</label>';
            echo '<input type="text" class="form-control" id="comment" name="comment" required>';
        echo '</div>';

        
        echo '<button type="submit" class="btn btn-primary">Submit</button>';

        echo '</form>';
        //Forms ends here

    } else {
        echo "No records found for the specified request ID.";
    }

    mysqli_free_result($result);
} else {
    echo "Request ID not specified.";
}

mysqli_close($con);
?>