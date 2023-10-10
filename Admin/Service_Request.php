<?php
include('../connection.php');

// SQL query to fetch data from the client and service_request tables with status '0'
$sql = "SELECT sr.request_id, c.fullname, sr.car_model, sr.service_type
        FROM service_request sr
        INNER JOIN client c ON sr.client_id = c.client_id
        WHERE sr.request_status = '0'";

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
          <title>Admin | Service Request</title>
          <style>
               .admin-section {
                    margin-top: 0px;
                    margin-bottom: 100px;
                    background-color: rgba(0, 0, 0, 0.29);
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
                    width: 1000px;
               }

               .table-section {
                    margin-top: 0px;
                    min-width: 200px;
                    overflow: scroll;
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

               .btn-a:hover, .btn-edit:hover {
                    filter: brightness(.9);
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
                              <h3 class="admin-head-txt mb-0">Service Request</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div class="table-section">
                                   <?php
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
                                                        <td><a href="View_Service_Request.php?request_id=' . $row['request_id'] . '" class="btn-edit">Update</a></td>
                                                    </tr>';
                                            }
                                    
                                            echo '</tbody></table>';
                                        } else {
                                            echo "<div class='text-white'>No records found.</div>";
                                        }
                                    
                                        mysqli_free_result($result);
                                    }
                                    
                                    mysqli_close($con);
                                   ?>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </body>
</html>