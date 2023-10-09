<?php
     include('../connection.php');
     

     // Assuming you want to display data from the service_request table
   $query = "SELECT sr.request_id, c.fullname AS client_name, c.mobile_number, c.email, sr.car_brand, sr.car_model, sr.service_type
           FROM service_request sr
           INNER JOIN client c ON sr.client_id = c.client_id
           LEFT JOIN service_cost sc ON sr.request_id = sc.request_id
           WHERE sc.mechanic_id IS NOT NULL";
               // INNER JOIN services_offer so ON sr.service_id = so.service_id
               // tinanggal ko muna to kasi ayaw ma view nung table... may binura kasi ako diba sa service request tb

     $result = mysqli_query($con, $query);

     if (!$result) {
         die("Database query failed.");
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
          <title>Mechanic | Job Assignment</title>

          <style>
               .table-section {
                    margin-top: 0px;
                    background-color: rgba(0, 0, 0, 0.29);
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
               }

               .mechanic-head-txt {
                    margin: 20px;
                    color: white;
                    margin-top: 50px;
                    text-transform: uppercase;
                    padding: 10px 15px;
                    background-color: color(srgb 0.0472 0.1883 0.2773);
                    width: fit-content;
               }

               th, td {
                    text-align: center;
                    width: fit-content;
                    padding: 10px 15px;
                    
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
          </style>
     </head>

     <body>
          <?php include "../common/mechanic-side-nav.php" ?>

          <div>
               <div class="row">
                    <div class="col-xl-2 col-0"></div>
                    <div class="col-xl-10 col-12">
                         <div class="d-flex justify-content-center">
                              <h3 class="mechanic-head-txt mb-0">Job Assignment</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="table-section">
                                   <table>
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
                                                       echo "<td><a href='View_Job_Assignment.php?request_id={$row['request_id']}' class='btn-a btn'>View</a></td>";
                                                       echo "</tr>";
                                                  }
                                                  mysqli_close($con);
                                             ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         
                    </div>

               </div>
          </div>
     </body>
</html>