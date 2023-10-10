<?php
include('../connection.php');

// Check if the request_id parameter is set in the URL
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // SQL query to fetch data for the specific request ID
    $sql = "SELECT * FROM service_request WHERE request_id = $request_id";
    $result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
               crossorigin="anonymous">
          <link rel="stylesheet" href="../CSS/style.css">
          <link rel="stylesheet" href="../CSS/bg-style-a.css">
          <title>Admin | View Service Request</title>
          <style>
               .admin-section {
                    margin-top: 0px;
                    margin-bottom: 100px;
                    background-color: rgba(0, 0, 0, 0.29);
                    min-width: 200px;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
                    width: 600px;
               }

               .table-section {
                    margin-top: 0px;
                    min-width: 200px;
               }


               th,
               td {
                    text-align: center;
                    width: fit-content;
                    padding: 10px 15px;
               }

               th {
                    background-color: transparent !important;
                    color: white !important;
                    font-weight: bold;
                    border: 1px solid white;
               }

               td {
                    background-color: transparent !important;
                    color: white !important;
                    border: 1px solid white;
                    vertical-align: middle;
               }

               .admin-head-txt {
                    margin: 20px;
                    color: white;
                    margin-top: 50px;
                    text-transform: uppercase;
                    padding: 10px 35px;
                    background-color: color(srgb 0.9702 0.7395 0.3452);
                    width: fit-content;
               }

               .sec-head {
                    background-color: color(srgb 0.1294 0.2682 0.2997);
                    color: white;
                    padding: 10px;
                    width: fit-content;
               }

               .btn-a, .btn-edit, .btn-delete  {
                    border-radius: 0px;
                    color: white;
                    margin: 5px !important;
                    text-decoration: none;
                    padding: 10px 20px;
               }

               .btn-edit {
                    font-size: 12px;
                    padding: 5px 10px !important;
               }

               .btn-a:hover, .btn-edit:hover, .btn-delete:hover  {
                    filter: brightness(.9);
               }
               
               
               .btn-a, .btn-edit {
                    background-color: color(srgb 0.2706 0.7121 0.9729);
               }

               .btn-a:hover, .btn-edit:hover, .btn-b:hover {
                    filter: brightness(.9);
               }

               .buttons {
                    padding: 5px 20px;
               }

               .btn-b.buttons {
                    background-color: red;
                    text-decoration: none;
                    color: black;
                    padding: 5px 20px;
               }

               .buttons:hover {
                    filter: brightness(.9)
               }

               .Active {
                    color: rgb(0, 208, 0) !important;
               }

               .Inactive {
                    color: red !important;
               }
          </style>
     </head>

     <body>
          <?php include "../common/admin-side-nav.php" ?>
          <div>
               <div class="row">
                    <div class="col-xl-2 col-0"></div>
                    <div class="col-xl-10 col-12">
                         <div class="d-flex justify-content-center">
                              <h3 class="admin-head-txt mb-0">Update Request Status</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div class="table-section">
                                   <?php
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
                                             echo '<th scope="row">Vehicle Model</th>';
                                             echo '<td>' . $row['car_model'] . '</td>';
                                             echo '</tr>';
                                   
                                             echo '<tr>';
                                             echo '<th scope="row">Vehicle Brand</th>';
                                             echo '<td>' . $row['car_brand'] . '</td>';
                                             echo '</tr>';
                                   
                                             echo '<tr>';
                                             echo '<th scope="row">Vehicle Registered Number</th>';
                                             echo '<td>' . $row['car_reg_num'] . '</td>';
                                             echo '</tr>';
                                   
                                             echo '<tr>';
                                             echo '<th scope="row">Service Type</th>';
                                             echo '<td>' . $row['service_type'] . '</td>';
                                             echo '</tr>';
                                   
                                             echo '<tr>';
                                             echo '<th scope="row">Vehicle Problem</th>';
                                             echo '<td>' . $row['car_problem'] . '</td>';
                                             echo '</tr>';

                                             echo '<tr>';
                                             echo '<th scope="row">Status</th>';
                                             echo '<td><a href="Approve_Service_Request.php?request_id=' . $row['request_id'] . '" class="btn-a buttons">Approve</a></td>';
                                             echo '</tr>';

                                             echo '</tbody>';
                                             echo '</table>';
                              
                                             echo '<a href="Service_Request.php" class="btn-b buttons">Cancel</a>';
                                        } else {
                                             echo "<div class='text-white'>No records found for the specified request ID.</div>";
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
          </div>
          <script>document.getElementById('service-request-nav').style = "border: 3px solid black;";</script>
     </body>
</html>