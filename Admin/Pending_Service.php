<!-- Dito mapupunta kapag naapprove ung service request para malagay ung cost and stuff .  -->

<?php
include('../connection.php');

// SQL query to fetch data from the client and service_request tables with status '1'
$sql = "SELECT sr.request_id, c.fullname, sr.car_model, sr.service_type
        FROM service_request sr
        INNER JOIN client c ON sr.client_id = c.client_id
        WHERE sr.status = '1'";

$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody>';

        // Loop through the result set and populate the table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['request_id'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td>' . $row['car_model'] . '</td>
                    <td>' . $row['service_type'] . '</td>
                    <td><a href="View_Pending_Service.php?request_id=' . $row['request_id'] . '" class="btn btn-primary">View</a></td>
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