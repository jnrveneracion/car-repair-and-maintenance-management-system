
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
        echo '<h3>Service Request</h3>';

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

        echo '<tr>';
        echo '<th scope="row">Request Status</th>';
        echo "<td>" . ($row['status'] == 0 ? 'Pending' : 'Confirmed') . "</td>";
        echo '</tr>';


        echo '</tbody>';
        echo '</table>';

// Now, fetch and display data from the service_cost table with mechanic's full name
$serviceCostSql = "SELECT sc.*, m.fullname AS mechanic_name, ss.service_status_name
FROM service_cost sc
INNER JOIN mechanic m ON sc.mechanic_id = m.mechanic_id
INNER JOIN service_status ss ON sc.service_status_id = ss.service_status_id
WHERE sc.request_id = $request_id";

$serviceCostResult = mysqli_query($con, $serviceCostSql);

if (!$serviceCostResult) {
    die("Query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($serviceCostResult) > 0) {
    echo '<h3>Service Cost</h3>';

    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Field Name</th>';
    echo '<th scope="col">Data</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Fetch and display the data from the service_cost table
    $serviceCostRow = mysqli_fetch_assoc($serviceCostResult);

    // Display the service_cost fields
    echo '<tr>';
    echo '<th scope="row">Cost ID</th>';
    echo '<td>' . $serviceCostRow['cost_id'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Service Cost</th>';
    echo '<td>' . $serviceCostRow['service_cost'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Labor Cost</th>';
    echo '<td>' . $serviceCostRow['labor_cost'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Parts Cost</th>';
    echo '<td>' . $serviceCostRow['parts_cost'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Total Cost</th>';
    echo '<td>' . $serviceCostRow['total_cost'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Comment</th>';
    echo '<td>' . $serviceCostRow['comment'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Mechanic Name</th>';
    echo '<td>' . $serviceCostRow['mechanic_name'] . '</td>'; // Display mechanic's full name
    echo '</tr>';

    echo '<tr>';
    echo '<th scope="row">Service Status</th>';
    echo '<td>' . ($serviceCostRow['service_status_id'] == '1' ? 'Pending' : $serviceCostRow['service_status_name']) . '</td>';
    
    
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';

      // Display the "Update Service Status" section
      echo '<h3>Update Service Status</h3>';
      echo '<form method="post" action="Update_Service_Status.php">';
        echo '<input type="hidden" name="request_id" value="' . $request_id . '">';
        echo '<label for="new_status">New Status:</label>';
        echo '<select name="new_status" id="new_status">';
            echo '<option value="1">Pending</option>';
            echo '<option value="2">Ongoing</option>';
            echo '<option value="3">Rejected</option>';
            echo '<option value="4">Completed</option>';
        echo '</select>';
        echo '<button type="submit" name="update_status">Update</button>';
      echo '</form>';
} else {
    echo "Wait for service cost for this request.";
}

mysqli_free_result($serviceCostResult);
     } else {
         echo "Request ID not specified.";
     }
 
     mysqli_free_result($result);
 } else {
     echo "Request ID not specified.";
 }
 
 mysqli_close($con);
 ?>



