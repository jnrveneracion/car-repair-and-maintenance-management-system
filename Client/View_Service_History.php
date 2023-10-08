
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
        echo '<h2>View Pending Service</h2>';
        echo '<h3>Pending Service Data</h3>';

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

// Now, fetch and display data from the service_cost table with mechanic's full name
$serviceCostSql = "SELECT sc.*, m.fullname AS mechanic_name FROM service_cost sc
                   INNER JOIN mechanic m ON sc.mechanic_id = m.mechanic_id
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

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No service cost data found for this request.";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../CSS/style.css">
     <link rel="stylesheet" href="../CSS/bg-style-a.css">
    <title>My Service Request</title>
</head>
<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <h1>My service request</h1>

    <?php include "../common/footer-for-folder.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>

