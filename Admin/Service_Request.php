<?php //FEELING KO MALI TO AT DI NEED NG TABLE 
include('../connection.php');

// Fetch data from the service_request table
$sql = "SELECT * FROM service_request";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        // echo '<table class="table">
        //         <thead>
        //             <tr>
        //                 <th scope="col">Request ID</th>
        //                 <th scope="col">Car Model</th>
        //                 <th scope="col">Car Brand</th>
        //                 <th scope="col">Car Registered Number</th>
        //                 <th scope="col">Service Type</th>
        //                 <th scope="col">Car Problem</th>
        //             </tr>
        //         </thead>
        //         <tbody>';
        
        // Loop through the rows and populate the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['request_id'] . '</td>
                    <td>' . $row['car_model'] . '</td>
                    <td>' . $row['car_brand'] . '</td>
                    <td>' . $row['car_reg_num'] . '</td>
                    <td>' . $row['service_type'] . '</td>
                    <td>' . $row['car_problem'] . '</td>
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