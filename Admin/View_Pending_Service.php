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
          <title>Admin | Service Offer</title>
          <style>
               .admin-section {
                    margin-top: 0px;
                    margin-bottom: 100px;
                    background-color: rgba(236, 250, 254, 1);
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
                    width: 850px;
               }

               .table-section {
                    margin-top: 0px;
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px 0px;
               }


               th,
               td {
                    text-align: start;
                    width: fit-content;
                    padding: 10px 15px;
               }

               th {
                    background-color: transparent !important;
                    color: black !important;
                    font-weight: 400;
                    border: 1px solid black;
                    font-weight: bolder;
               }

               td {
                    background-color: transparent !important;
                    color: black !important;
                    border: 1px solid black;
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

               .btn-a.buttons {
                    background-color: color(srgb 0.2706 0.7121 0.9729);
               }

               .btn-b.buttons {
                    background-color: red;
                    text-decoration: none;
                    color: black;
                    padding: 8px 20px;
                    margin: 0px 10px;
               }

               .buttons {
                    padding: 5px 20px;
                    border: 1px solid black !important;
               }

               .buttons:hover {
                    filter: brightness(.9)
               }

               input {
                    border: none !important;
                    background-color: transparent !important;
                    border-radius: 0px !important;
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
                              <h3 class="admin-head-txt mb-0">Pending Service</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div>
                                        <p>Update Pending Service</p>
                                        <hr style="color: black; opacity: 1; padding: 3px;">
                                        <?php
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

                                                  echo '<form method="POST" action="Pending_Service_Submit.php?request_id=' . $request_id . '">';

                                                  echo '<tr>';
                                                  echo '<th scope="row"><label for="service_cost" class="form-label">Service Cost</label></th>';
                                                  echo '<td><input type="text" placeholder="Enter service cost" class="form-control" id="service_cost" name="service_cost" required></td>';
                                                  echo '</tr>';

                                                  echo '<tr>';
                                                  echo '<th scope="row"><label for="labor_cost" class="form-label">Labor Cost</label></th>';
                                                  echo '<td><input type="text" placeholder="Enter labor cost" class="form-control" id="labor_cost" name="labor_cost" required></td>';
                                                  echo '</tr>';
                                                  echo '<tr>';
                                                  echo '<th scope="row"><label for="parts_cost" class="form-label">Parts Cost</label></th>';
                                                  echo '<td><input type="text" placeholder="Enter parts cost" class="form-control" id="parts_cost" name="parts_cost" required></td>';
                                                  echo '</tr>';
                                                  echo '<tr>';
                                                  echo '<th scope="row"><label for="total_cost" class="form-label">Total Cost</label></th>';
                                                  echo '<td><input type="text" placeholder="Total cost" class="form-control" id="total_cost" name="total_cost" required></td>';
                                                  echo '</tr>';
                                                  echo '<tr>';

                                                  // Retrieve mechanic names from the mechanic table
                                                  $sqlMechanics = "SELECT mechanic_id, fullname FROM mechanic";
                                                  $resultMechanics = mysqli_query($con, $sqlMechanics);

                                                  if (!$resultMechanics) {
                                                  die("Query failed: " . mysqli_error($con));
                                                  }

                                                  // Check if there are any mechanics
                                                  $mechanics = [];
                                                  if (mysqli_num_rows($resultMechanics) > 0) {
                                                  while ($mechanicRow = mysqli_fetch_assoc($resultMechanics)) {
                                                       $mechanics[$mechanicRow['mechanic_id']] = $mechanicRow['fullname'];
                                                  }
                                                  }

                                                  echo '<th scope="row"><label for="assigned_mechanic" class="form-label">Assigned Mechanic</label></th>';
                                                  echo '<td><select class="form-select" id="assigned_mechanic" name="assigned_mechanic" required>
                                                  <option value="" disabled selected>Select Assigned Mechanic</option>'; 
                                                  foreach ($mechanics as $mechanicId => $mechanicName) {
                                                       echo "<option value='$mechanicId'>$mechanicName</option>";
                                                       }
                                                  echo '</td>';
                                                  echo '</tr>';
                                                  echo '<tr>';
                                                  echo '<th scope="row"><label for="comment" class="form-label">Comment</label></th>';
                                                  echo '<td><input type="text" placeholder="Enter comment" class="form-control" id="comment" name="comment" required></td>';
                                                  echo '</tr>';

                                                  echo '</tbody>';
                                                  echo '</table>';

                                                  echo '<div style="float: right;">
                                                       <button type="submit" class="btn-a buttons">Update</button>
                                                       <a href="Pending_Service.php" class="btn-b buttons">Cancel</a>
                                                       </div>';
                                             
                                                  echo '</form>';
                                                  // Forms end here

                                             } else {
                                                  echo "No records found for the specified request ID.";
                                             }

                                             mysqli_free_result($resultMechanics);
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
          <script>document.getElementById('pending-service-nav').style = "border: 3px solid black;";</script>
     </body>
</html>

<script>
    // Function to calculate and update the Total Cost
    function calculateTotalCost() {
        // Get the values of Service Cost, Labor Cost, and Parts Cost
        const serviceCost = parseFloat(document.getElementById('service_cost').value) || 0;
        const laborCost = parseFloat(document.getElementById('labor_cost').value) || 0;
        const partsCost = parseFloat(document.getElementById('parts_cost').value) || 0;

        // Calculate the Total Cost
        const totalCost = serviceCost + laborCost + partsCost;

        // Update the Total Cost field with the calculated value
        document.getElementById('total_cost').value = totalCost.toFixed(2);
    }

    // Add event listeners to the input fields to trigger the calculation
    document.getElementById('service_cost').addEventListener('input', calculateTotalCost);
    document.getElementById('labor_cost').addEventListener('input', calculateTotalCost);
    document.getElementById('parts_cost').addEventListener('input', calculateTotalCost);

    // Initial calculation when the page loads
    calculateTotalCost();
</script>
