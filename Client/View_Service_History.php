<?php include('../connection.php'); ?>

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
    <style>
        .head-section-txt {
            width: fit-content;
            float: right;
            background-color: color(srgb 0.9702 0.7395 0.3452);
            padding: 10px 20px;
            font-weight: 500;
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: black !important;
            color: white !important;
            font-weight: 400;
            border: 1px solid white;
        }

        td {
            background-color: rgb(12, 48, 71) !important;
            color: white !important;
            border: 1px solid white;
            vertical-align: middle;
        }

        .btn-a {
            background-color: color(srgb 0.325 0.325 0.325);
            border: none;
            color: white !important;
        }

        .table-section {
            min-width: 200px;
            overflow: scroll;
            margin:  0 auto;
            width: 450px;
        }

        a {
          text-decoration: none;
          color: white;
        }
    </style>
</head>
<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="f-height d-flex justify-content-center" style="margin-bottom: 50px;">
          <div class="text-white section">
               <div>
                    <div>
                        <a href="Service_History.php"><div class="head-section-txt">MY SERVICE HISTORY</div></a>
                    </div>
                    <div style="padding: 50px 0px;;">
                        <div class="table-section">
                        <?php
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


                                   // Now, fetch and display data from the service_cost table
                                   $serviceCostSql ="SELECT sc.*, m.fullname AS mechanic_name FROM service_cost sc
                                   LEFT JOIN mechanic m ON sc.mechanic_id = m.mechanic_id
                                   WHERE sc.request_id = $request_id";
                                   $serviceCostResult = mysqli_query($con, $serviceCostSql);
                              
                                   if (!$serviceCostResult) {
                                        die("Query failed: " . mysqli_error($con));
                                   }
                              
                                   if (mysqli_num_rows($serviceCostResult) > 0) {
                              
                              
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
                                        echo '<td>' . $serviceCostRow['mechanic_name'] . '</td>';
                                        echo '</tr>';
                              
                                        echo '</tbody>';
                                        echo '</table>';
                                   } else {
                                        echo '</tbody>';
                                        echo '</table>';
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
                        </div>
                    </div>
               </div>
          </div>
     </div>
    

    <?php include "../common/footer-for-folder.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>

