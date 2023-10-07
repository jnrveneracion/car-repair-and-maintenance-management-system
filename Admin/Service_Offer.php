<?php
include('../connection.php');

// Add the header and button
echo '<h2>Service Offer</h2>';
echo '<a href="Service_Offer_Form.php" class="btn btn-success">Add Service</a>';
// Fetch data from the services_offer table
$sql = "SELECT * FROM services_offer";
$result = mysqli_query($con, $sql);


if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
        
        // Loop through the rows and populate the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['service_id'] . '</td>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>' . $row['status'] . '</td>
                    <td>
                    <a href="Service_Offer_Form.php?service_id=' . $row['service_id'] . '" class="btn btn-primary">Edit</a>
                    <a href="Delete_Service_Offer.php?service_id=' . $row['service_id'] . '" class="btn btn-danger">Delete</a>
                </td>
                  </tr>';
        }
        
        echo '</tbody></table>';
    } else {
        echo "No records found.";
    }
    
    mysqli_free_result($result);
}

mysqli_close($con);
?>