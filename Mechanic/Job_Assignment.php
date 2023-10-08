<?php
include('../connection.php');

// Assuming you want to display data from the service_request table
$query = "SELECT sr.request_id, c.fullname AS client_name, c.mobile_number, c.email, sr.car_brand, sr.car_model, sr.service_type
          FROM service_request sr
          INNER JOIN client c ON sr.client_id = c.client_id
          INNER JOIN services_offer so ON sr.service_id = so.service_id";

// $query = "
// SELECT sr.request_id, sr.car_brand, sr.car_model, sr.car_reg_num, sr.service_type, sr.status
// FROM service_request sr

// ";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Database query failed.");
}
?>

<h3>Job Assignment</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email</th>
      <th scope="col">Car Brand</th>
      <th scope="col">Car Model</th>
      <th scope="col">Service Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['request_id'] . "</td>";
        echo "<td>" . $row['client_name'] . "</td>";
        echo "<td>" . $row['mobile_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['car_brand'] . "</td>";
        echo "<td>" . $row['car_model'] . "</td>";
        echo "<td>" . $row['service_type'] . "</td>";
        echo "<td><a href='View_Job_Assignment.php?request_id={$row['request_id']}' class='btn btn-primary'>View</a></td>"; 
        echo "</tr>";
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>

