<?php
include('../connection.php');

$query = "
SELECT sr.request_id, sr.car_brand, sr.car_model, sr.car_reg_num, sr.service_type, sr.status
FROM service_request sr

";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<h3>My Service Request</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Request ID</th>
            <th scope="col">Car Brand</th>
            <th scope="col">Car Model</th>
            <th scope="col">Registration No</th>
            <th scope="col">Service Type</th>
            <th scope="col">Request Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
                echo "<td>{$row['request_id']}</td>";
                echo "<td>{$row['car_brand']}</td>";
                echo "<td>{$row['car_model']}</td>";
                echo "<td>{$row['car_reg_num']}</td>";
                echo "<td>{$row['service_type']}</td>";
                echo "<td>" . ($row['status'] == 0 ? 'Pending' : 'Confirmed') . "</td>";
                echo "<td><a href='View_Service_History.php?request_id={$row['request_id']}' class='btn btn-primary'>View</a></td>"; 
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
