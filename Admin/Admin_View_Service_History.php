<?php include('../connection.php'); ?>


   
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


                                   // Now, fetch and display data from the service_cost table
                                   $serviceCostSql = "SELECT sc.*, m.fullname AS mechanic_name FROM service_cost sc
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
     
    



